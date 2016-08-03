#!/usr/local/bin/php
<?php
set_time_limit(0);
require 'vendor/autoload.php';

use PostShipper\Shipping\Tracking;

$filter = [
  "DHL facility" => 'facility'
];

$db = new PDO('mysql:host=127.0.0.1;dbname=postship_prod', 'postship_user', 'Jayz6041!');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$selectShipmentsSQL = <<<SQL
 SELECT s.id, s.tracking_code, sp.name
 From shipments s inner join shipping_providers sp on s.shipping_provider = sp.id
 WHERE s.complete = 0
SQL;
$selectShipmentLastUpdateSQL = <<<SQL
 SELECT updated_at
 From shipments
 WHERE id = :id
SQL;
$selectOrdersSQL = <<<SQL
 SELECT o.id
 FROM orders o inner join shipments s on o.shipment_id = s.id
 WHERE s.complete = 0 and s.id = :id
 Order by s.id
SQL;
$updateOrdersSQL = <<<SQL
 UPDATE orders
 SET status = 'delivered'
 WHERE shipment_id = :id
SQL;
$updatePackagesSQL = <<<SQL
 UPDATE packages
 SET status = 'delivered'
 WHERE order_id = :id
SQL;
$insertTrackingSQL = <<<SQL
  INSERT INTO `trackings` (`id`, `location`, `description`, `trackable_id`,
    `trackable_type`, `created_at`, `updated_at`, `tracking_at`)
  VALUES (NULL, :country, :desc, :id, :type, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :trackAt)
SQL;
$updateShipmentsSQL = <<<SQL
 UPDATE shipments
 SET complete = :complete, updated_at = :datetime
 WHERE id = :id
SQL;


$selectShipments = $db->prepare($selectShipmentsSQL);
$selectShipments->execute();
while ($record = $selectShipments->fetch(PDO::FETCH_OBJ)) {
  $track = new Tracking($record->name);
  $result = $track->getUpdate($record->tracking_code);

  if(!empty($result['lastUpdate'])) {
    $result['lastUpdate'] = str_replace(array_keys($filter), $filter,
      $result['lastUpdate']);

    $selectShipmentLastUpdate = $db->prepare($selectShipmentLastUpdateSQL);
    $selectShipmentLastUpdate->execute([':id'=>$record->id]);

    if($lastUpdatedAt = $selectShipmentLastUpdate->fetch(PDO::FETCH_OBJ)) {

      if($lastUpdatedAt->updated_at != $result['eventAt']) {
        $selectOrders = $db->prepare($selectOrdersSQL);
        $selectOrders->execute([':id'=>$record->id]);
        $ordersIds = $selectOrders->fetchAll(PDO::FETCH_COLUMN, 0);

        $insertTracking = $db->prepare($insertTrackingSQL);

        if(strtoupper($result['country']) == 'KUWAIT' && ($result['eventCode'] != 'AF' ||
          $result['eventCode'] != 'I' ))
          continue;

        foreach ($ordersIds as $id) {
          $insertTracking->execute([':country'=>$result['country'],
            ':desc'=>$result['lastUpdate'], ':id'=>$id,
            ':type'=>'App\Order', ':trackAt'=> $result['eventAt'] ]);
        }
        $updateShipments = $db->prepare($updateShipmentsSQL);
        $updateShipments->execute([':id'=>$record->id,
          ':datetime' =>$result['eventAt'], ':complete' => 0]);
        if($result['eventCode'] == 'OK' || $result['eventCode'] == 'D') {
          $updateShipments->execute([':id'=>$record->id,
            ':datetime' =>$result['eventAt'], ':complete' => 1]);
          if(strtoupper($result['country']) == 'KUWAIT') {
            continue;
          }
          $updateOrders = $db->prepare($updateOrdersSQL);
          $updateOrders->execute([':id'=>$record->id]);

          $updatePackages = $db->prepare($updatePackagesSQL);
          foreach ($ordersIds as $id) {
            $updatePackages->execute([':id'=>$id]);
          }
        }

      }
    }
  }
}
