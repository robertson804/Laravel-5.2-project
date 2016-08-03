<?php
return array(
    // AutoloadManager options
    'autoloader' => array(

        // Only scan once when a class is not found in the class map (this should be set to SCAN_NONE on production environment
        'scanOptions' => autoloadManager::SCAN_ONCE,

        // complete path to autoload file that contains the class map
        'dir' => sys_get_temp_dir() . '/dhl-api-autoload.php',
    ),

    // DHL related settings
    'dhl' => array(
        // ID to use to connect to DHL
        'id' => 'postship',

        // Password to use to connect to DHL
        'pass' => '8JAjtOMWwd',

        // Shipper, Billing and Duty Account numbers
        'shipperAccountNumber' => 'YOUR_NUMBER',
        'billingAccountNumber' => 'YOUR_NUMBER',
        'dutyAccountNumber' => 'YOUR_NUMBER',
    ),
);
