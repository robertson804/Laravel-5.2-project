<?php
namespace PostShipper\Shipping;
require 'vendor/autoload.php';

use DHL\Entity\EA\KnownTrackingRequest as DHLTracking;
use DHL\Client\Web as DHLWebserviceClient;
use DHL\Entity\EA\TrackingResponse as DHLTrackingResponse;
use Ups\Tracking as UPSTracking;
use Alcohol\ISO3166\ISO3166;

class Tracking {
  private $shipper;
  public function __construct($shipper) {
    switch ($shipper) {
      case 'DHL':
        $this->shipper = new DHLFacade();
        break;
      case 'UPS':
        $this->shipper = new UPSFacade();
        break;
      default:
        $this->shipper = false;
    }
  }
  public function getUpdate($trackid) {
    if($this->shipper == false) return false;
    return $this->shipper->lastUpdate($trackid);
  }
}

class DHLFacade {
  private $request;

  public function __construct() {

    $this->request = new DHLTracking();
    $this->request->SiteID = 'postship';
    $this->request->Password = '8JAjtOMWwd';
    $this->request->MessageReference = date('Ymdhsi').mt_rand(10000000000000,99999999999999);
    $now = new \DateTime('NOW');
    $this->request->MessageTime = $now->format(\DateTime::ATOM);
    $this->request->LanguageCode = 'en';
    $this->request->LevelOfDetails = 'LAST_CHECK_POINT_ONLY';
    $this->request->PiecesEnabled = 'P';
  }
  public function lastUpdate($trackid) {
    $this->request->AWBNumber = $trackid;
    $client = new DHLWebserviceClient();
    $xml = $client->call($this->request);
    $result = new DHLTrackingResponse();
    $result->initFromXML($xml);

    $doc = new \DOMDocument();
    $doc->loadXML($result->toXML());
    $xpath = new \DOMXpath($doc);
    $pathBase = '/req:TrackingResponse/AWBInfo/TrackingPieces/PieceInfo/PieceEvent';
    $eventDateXML = $xpath->query($pathBase."/Date");
    $eventTimeXML = $xpath->query($pathBase."/Time");
    $eventCodeXML = $xpath->query($pathBase."/ServiceEvent/EventCode");
    $descriptionXML = $xpath->query($pathBase."/ServiceEvent/Description");

    $eventDate = $eventDateXML->item(0)->nodeValue;
    $eventTime = $eventTimeXML->item(0)->nodeValue;
    $eventCode = $eventCodeXML->item(0)->nodeValue;

    $description = preg_replace('/\s+/', ' ',$descriptionXML->item(0)->nodeValue);
    $items = explode('-',$description);
    $lastUpdate = trim($items[0]);
    $country = trim($items[1]);

    return ['eventAt'=> $eventDate.' '.$eventTime,'eventCode'=>$eventCode,
      'country'=>$country, 'lastUpdate'=>$lastUpdate];
  }
}

class UPSFacade {
  private $request;

  public function __construct() {
    $accessKey = '4D0AF3B89E6184A5';
    $userId = 'mdoos';
    $password = 'CanBeHome1234&';
    $this->request = new UPSTracking($accessKey, $userId, $password);
  }
  public function lastUpdate($trackid) {
    try {
        $shipment = $this->request->track($trackid,'Last Activity');
        $activity = $shipment->Package->Activity;
        $eventAt = date('Y-m-d H:i:s',strtotime($activity->Date.' '.$activity->Time));
        $eventCode = $activity->Status->StatusType->Code;
        $countryCode = $activity->ActivityLocation->Address->CountryCode;
        $iso3166 = new ISO3166();
        $country = $iso3166->getByAlpha2($countryCode)['name'];
        $lastUpdate = $activity->Status->StatusType->Description.' '.$activity->ActivityLocation->Address->City;
        if($activity->ActivityLocation->Address->StateProvinceCode) $lastUpdate .= ','.$activity->ActivityLocation->Address->StateProvinceCode;
        return ['eventAt'=> $eventAt,'eventCode'=>$eventCode,'country'=>$country, 'lastUpdate'=>$lastUpdate];

    } catch (\Exception $e) {
    }
  }
}
