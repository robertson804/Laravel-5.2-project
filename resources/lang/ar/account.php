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
    'welcome' => 'مرحبا , <span class="blue">:fullname</span>',

    //Account Navigation
    'nav_packages' => 'الطرود الحالية',
    'nav_orders' => 'الطرود المرسلة',
    'nav_info' => 'معلومات الحساب',
    'nav_invoice' => 'الفواتير',

    //Packages page
    'unshipped_packages' => 'الطرود الحالية',
    'fast_shipping' => 'الشحن السريع',
    'slow_shipping' => 'الشحن الإقتصادي',
    'box_shipping' => 'صندوق التجميع',
    'shipping_notice' => 'السعر لا يتضمن الضرائب',
    'shipping_clearance_notice' => '+ <span class="force_ltr">7$</span> أجور تخليص',
    'ship_packages' => 'ادفع',
    'ship_confirmation_header' => 'اشحن الطلب?',
    'ship_confirmation_message' => ' USD سيتم خصمها من بطاقة الإئتمان الخاصة بك',
    'ship_confirmation_cancel' => 'الغاء',
    'ship_confirmation_confirm' => 'اشحن الآن!',
    'needs_resolve' => 'لديك طرد لايحتوي على قيمة, الرجاء إضافة قيمة السلعة حتى تتمكن من شحنها',
    'needs_consolidation' => 'طلبك مازال في طور التجهيز, سيتم إرسال بريد إلكتروني فور جاهزيته',
    'no_packages' => 'لا توجد طرود جاهزة للشحن',

    'package_id' => 'طرد #:',
    'package_weight' => 'الوزن:',
    'package_dimensions' => 'الأبعاد:',
    'package_arrived' => 'وصل: (:days يوم متبقي)',
    'package_overdue' => 'Overdue',
    'package_value' => 'قيمة السلعه:',
    'package_resolve' => 'إضافة سعر',
    'package_edit' => 'تعديل ',

    'package_resolve_amount' => 'السعر بالدولار الأمريكي',
    'package_resolve_help' => 'قبل أن تتمكن من شحن الطرد, يجب اضافة السعر بالدولار الأمريكي, لبيانات الجمارك والتخليص الجمركي ',
    'package_resolve_edit' => 'اذا كانت قيمة السلع غير صحيحة, الرجاء إضافة سعر جديد, بالدولار الإمريكي',
    'package_resolve_submit' => 'إضافة سعر',

    //Order List
    'order_id'=>'شحنة #',
    'shipped_at'=>'Order Placed',
    'order_cost'=>'عدد الشحنات',
    'package_count'=>'# عدد الطرود',
    'order_status'=>'حالة الشحنة',
    'order_weight'=>'وزن الشحنة',
    'customs_value'=>'قيمة المشتريات',
    'shipping_method'=>'نوعية الشحن',

    'no_orders' => 'لاتوجد شحنات',
    'view_order'=>'شاهد الشحنات',
    'track_order'=>'تتبع الشحنة',

    //Order Status Bar messages
    //'statusbar_pending' => 'Gathering Packages',
    'statusbar_consolidated' => 'جمعت للشحن',
    'statusbar_ready' => 'جمعت للشحن',
    'statusbar_shipped' => 'شحنت من المستودع',
    'statusbar_arrived' => 'وصلت للمركز المحلي',
    'statusbar_delivered' => 'وصلت',

    'order_packages' => 'الصناديق في الشحنة',

    // Order Tracking
    'tracking_at'=>'اليوم',
    'tracking_location'=>'المكان',
    'tracking_description'=>'الوصف',
    'warehouse'=>'PostShipper مستودع',
    'created_with'=>'تجميع الشحنة مع :عدد الطرود',
    'shipped_at' => 'تم طلب الشحن',
    'shipping_address' => 'عنوان الشحن',
    'shipped' => 'شحنت من المستودع',

    //User

    'info_header' => 'معلومات:',
    'us_address' => 'عنوان الشحن الأمريكي:',
    'edit_user' => 'تعديل المستخدم',
    'edit_pass' => 'تغيير كلمة السر',
    'edit_billing' => 'تغيير بطاقة الإئتمان',

    //edit user
    'user_info' => 'معلوماتي:',
    'address' => 'العنوان:',
    'address_2' => 'العنوان 2:',
    'country' => 'الدولة:',
    'state' => 'المحافظة:',
    'city' => 'المنطقة:',
    'postal' => 'الرمز البريدي:',
    'company_name' => 'اسم الشركة:',
    'first_name' => 'الإسم الأول:',
    'last_name' => 'الإسم الأخير:',
    'phone' => 'الهاتف:',
    'my_address' => 'عنواني:',

    //edit password
    'change_password' => 'غير كلمة السر',
    'password' => 'كلمة السر:',
    'confirm_password' => 'تأكيد كلمة السر:',
    'save_changes' => 'حفظ التغييرات',

    //Flash Messages
    'flash_billing' => 'تغيير عنوان البطاقة',
    'flash_info' => 'تغيير تفاصيل الحساب',
    'flash_password' => 'تم تغيير كلمة السر',
    'flash_order_created' => 'تم إنشاء الطلب',
    'flash_update_package' => 'تم إضافة السعر',
    'flash_update_package_error' => 'لايمكن أن تكون القيمة 0$ أو فارغة',

    //Registration Confirmation
    'registrated' => 'تم إنشاء حسابك',

    //Statuses
    'pending' => 'قيد الإنتظار',
    'consolidated' => 'مجمعة',
    'ready' => 'جاهزة للشحن',
    'shipped' => 'أرسلت',
    'arrived' => 'وصلت للمركز المحلي',
    'delivered' => 'تم التوصيل',

    //Invoices
    'invoice_date' => 'التاريخ:',
    'invoice_cost' => 'القيمة:',
    'invoice_status' => 'الحاله:',
    'invoice_paid' => 'تم الدفع',
    'invoice_refunded' => 'استرجاع المبلغ',
    'invoice_receipt' => 'عرض الفاتورة',
    'invoice_none' => 'لا توجد فاتورة',

    //Invoice
    'invoice_title' => 'PostSipper فاتورة',
    'invoice_created' => 'أنشأت في:',
    'invoice_item' => 'بند',
    'invoice_price' => 'السعر',
    'invoice_shipped' => ' رقم الشحنة#:شحنة_id',

    //Confirmation messages
    'confirm_title' => 'هل تريد إرسال الشحنة',
    'confirm_text' => 'سيتم استقطاع ملبغ من بطاقتك الإئتمانية',
    'confirm_button' => 'أرسل!',
    'confirm_cancel' => 'إلغاء',

    //Custom error messages
    'integer_error' => 'يجب أن لاتقل قيمة البضاعةعن دولار واحد ومن غير كسور'
];
