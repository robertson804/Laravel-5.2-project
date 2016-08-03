<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Account Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language files are used exclusively in the backend, account
    | section of the website
    |
    */
    //Main Nav
    'welcome' => 'Welcome, <span class="blue">:fullname</span>',

    //Account Navigation
    'nav_packages' => 'Received Packages',
    'nav_orders' => 'Shipped Packages',
    'nav_info' => 'Account Info',
    'nav_invoice' => 'Invoices',

    //Packages page
    'unshipped_packages' => 'Recent Packages',
    'fast_shipping' => 'Fast Shipping',
    'slow_shipping' => 'Economy Shipping',
    'box_shipping' => 'Postshipper Big Box',
    'shipping_notice' => 'Price excludes your country tax if applicable',
    'shipping_clearance_notice' => '+ <span class="force_ltr">7$</span> clearance charges',
    'ship_packages' => 'Ship Packages',
    'ship_confirmation_header' => 'Ship the order?',
    'ship_confirmation_message' => ' USD will be charged against your account',
    'ship_confirmation_cancel' => 'Cancel',
    'ship_confirmation_confirm' => 'Ship it!',
    'needs_resolve' => 'You have packages with no set value, please add a price before shipping',
    'needs_consolidation' => 'Your order is still being packed, we will email you when it is ready to ship',
    'no_packages' => 'No packages are waiting to be shipped',

    'package_id' => 'Package #:',
    'package_weight' => 'Weight:',
    'package_dimensions' => 'Dimensions:',
    'package_arrived' => 'Arrived: (:days days left)',
    'package_overdue' => 'Overdue',
    'package_value' => 'Value:',
    'package_resolve' => 'Add Price',
    'package_edit' => 'edit',

    'package_resolve_amount' => 'Amount in dollars',
    'package_resolve_help' => 'Before you can ship the package, you must provide a price rounded to the nearest dollar, for customs documents and shipping information',
    'package_resolve_edit' => 'If the listed value is incorrect, please provide a new value, rounded to the nearest dollar',
    'package_resolve_submit' => 'Add Price',

    //Order List
    'order_id'=>'Order #',
    'shipped_at'=>'Order Placed',
    'order_cost'=>'Order Total',
    'package_count'=>'# of Packages',
    'order_status'=>'Order Status',
    'order_weight'=>'Order Weight',
    'customs_value'=>'Goods Value',
    'shipping_method'=>'Shipping Method',

    'no_orders' => 'No Orders Made',
    'view_order'=>'View Order',
    'track_order'=>'Track Order',

    'track_order'=>'Track Order',
    //Order Status Bar messages
    //'statusbar_pending' => 'Gathering Packages',
    'statusbar_consolidated' => 'Consolidated for shipping',
    'statusbar_ready' => 'Consolidated for shipping',
    'statusbar_shipped' => 'Shipped from warehouse',
    'statusbar_arrived' => 'Arrived at local facility',
    'statusbar_delivered' => 'Delivered',

    'order_packages' => 'Packages In Order',

    // Order Tracking
    'tracking_at'=>'Date',
    'tracking_location'=>'Location',
    'tracking_description'=>'Description',
    'warehouse'=>'PostShipper Warehouse',
    'created_with'=>'Order consolidated with :count packages',
    'shipped_at' => 'Order Created',
    'shipping_address' => 'Shipping Address',
    'shipped' => 'Shipped from warehouse',

    //User

    'info_header' => 'Info:',
    'us_address' => 'US Shipping Address:',
    'edit_user' => 'Edit User',
    'edit_pass' => 'Change Password',
    'edit_billing' => 'Change Credit Card',

    //edit user
    'user_info' => 'My Information:',
    'address' => 'Address:',
    'address_2' => 'Address 2:',
    'country' => 'Country:',
    'state' => 'State:',
    'city' => 'City:',
    'postal' => 'Postal Code / Zip:',
    'company_name' => 'Company Name:',
    'first_name' => 'First Name:',
    'last_name' => 'Last Name:',
    'phone' => 'Phone:',
    'my_address' => 'My Address:',

    //edit password
    'change_password' => 'Change Password',
    'password' => 'Password:',
    'confirm_password' => 'Confirm Password:',
    'save_changes' => 'Save Changes',

    //Flash Messages
    'flash_billing' => 'Billing Details Changed',
    'flash_info' => 'Account Details Changed',
    'flash_password' => 'Password Changed',
    'flash_order_created' => 'Order has been created',
    'flash_update_package' => 'Value added to package',
    'flash_update_package_error' => 'Value cannot be $0 or empty',

    //Registration Confirmation
    'registrated' => 'Your account has been created',

    //Statuses
    'pending' => 'Pending',
    'consolidated' => 'Consolidated',
    'ready' => 'Ready to ship',
    'shipped' => 'Shipped',
    'arrived' => 'Arrived at local warehouse',
    'delivered' => 'Delivered',

    //Invoices
    'invoice_date' => 'Date:',
    'invoice_cost' => 'Cost:',
    'invoice_status' => 'Status:',
    'invoice_paid' => 'Paid',
    'invoice_refunded' => 'Refunded',
    'invoice_receipt' => 'Show Receipt',
    'invoice_none' => 'No Invoices',

    //Invoice
    'invoice_title' => 'PostShipper Receipt',
    'invoice_created' => 'Created:',
    'invoice_item' => 'Item',
    'invoice_price' => 'Price',
    'invoice_shipped' => 'Shipped Order #:order_id',

    //Confirmation messages
    'confirm_title' => 'Ship the order?',
    'confirm_text' => 'USD will be charged against your credit card, by clicking "Confirm" you agree that PostShipper can charge your credit card for the amount specified.',
    'confirm_button' => 'Ship It!',
    'confirm_cancel' => 'Cancel',

    //Custom error messages
    'integer_error' => 'Package value must be greater than $0 and rounded to the nearest dollar'
];
