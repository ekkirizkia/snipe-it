<?php

return [
    'custom_fields'		        => 'حقول مخصصة',
    'manage'                    => 'إدارة',
    'field'		                => 'حقل',
    'about_fieldsets_title'		=> 'حول مجموعة الحقول',
    'about_fieldsets_text'		=> 'مجموعات الحقول تسمح لك بإنشاء مجموعات من الحقول المخصصة التي يعاد استخدامها في كثير من الأحيان لأنواع معينة من نماذج الأصول.',
    'custom_format'             => 'تنسيق Regex المخصص...',
    'encrypt_field'      	        => 'تشفير قيمة هذا الحقل في قاعدة البيانات',
    'encrypt_field_help'      => 'تحذير: تشفير الحقل يجعله غير قابل للبحث.',
    'encrypted'      	        => 'مشفّر',
    'fieldset'      	        => 'مجموعة حقول',
    'qty_fields'      	      => 'الحقول الكمية',
    'fieldsets'      	        => 'مجموعات الحقول',
    'fieldset_name'           => 'إسم مجموعة الحقول',
    'field_name'              => 'إسم الحقل',
    'field_values'            => 'قيم الحقول',
    'field_values_help'       => 'اضف خيارات قابلة للاختيار، واحد في كل سطر. سيتم تجاهل الأسطر الفارغة ما عدا السطر الأول.',
    'field_element'           => 'عنصر النموذج',
    'field_element_short'     => 'عنصر',
    'field_format'            => 'صيغة',
    'field_custom_format'     => 'صيغة Regex مخصصة',
    'field_custom_format_help'     => 'هذا الحقل يسمح لك باستخدام تعبير regex للتحقق من صحة النص. فإنه ينبغي أن تبدأ مع ":regex" - على سبيل المثال، للتحقق من أن قيمة الحقل المخصص يحتوي IMEI صالحة (15 خانة رقمية)، يمكنك استخدام <code>regex:/^[0-9]{15}$/</code>.',
    'required'   		          => 'إجباري',
    'req'   		              => 'اجباري',
    'used_by_models'   		    => 'مستخدم في الموديلات',
    'order'   		            => 'طلب',
    'create_fieldset'         => 'مجموعة حقول جديدة',
    'update_fieldset'         => 'تحديث مجموعة الحقول',
    'fieldset_does_not_exist'   => 'مجموعة الحقل :id غير موجود',
    'fieldset_updated'         => 'تم تحديث مجموعة الحقول',
    'create_fieldset_title' => 'إنشاء مجموعة حقول جديدة',
    'create_field'            => 'حقل جديد مخصص',
    'create_field_title' => 'إنشاء حقل مخصص جديد',
    'value_encrypted'      	        => 'هذا الحقل مشفر في قاعدة البيانات. يمكن قرائته من قبل مدراء النظام فقط',
    'show_in_email'     => 'هل تريد تضمين قيمة هذا الحقل في رسائل البريد الإلكتروني المرسلة إلى المستخدم؟ لا يمكن تضمين الحقول المشفرة في رسائل البريد الإلكتروني',
    'show_in_email_short' => 'تضمين في رسائل البريد الإلكتروني',
    'help_text' => 'نص المساعدة',
    'help_text_description' => 'هذا نص اختياري سيظهر أدناه عناصر النموذج أثناء تحرير الأصل لتوفير السياق في الحقل.',
    'about_custom_fields_title' => 'حول الحقول المخصصة',
    'about_custom_fields_text' => 'الحقول المخصصة تسمح لك بإضافة خصائص اعتباطية إلى الأصول.',
    'add_field_to_fieldset' => 'إضافة حقل إلى مجموعة الحقول',
    'make_optional' => 'مطلوب - انقر لصنع اختياري',
    'make_required' => 'اختياري - انقر لجعل مطلوب',
    'reorder' => 'إعادة ترتيب',
    'db_field' => 'حقل DB',
    'db_convert_warning' => 'تحذير. هذا الحقل موجود في جدول الحقول المخصصة ك <code>:db_العمود</code> ولكن يجب أن يكون <code>:expected</code>.',
    'is_unique' => 'يجب أن تكون هذه القيمة فريدة من نوعها عبر جميع الأصول',
    'unique' => 'غير مكرر',
    'display_in_user_view' => 'السماح للمستخدم المحدد لعرض هذه القيم في صفحة عرض الأصول المعينة الخاصة به',
    'display_in_user_view_table' => 'مرئي للمستخدم',
    'auto_add_to_fieldsets' => 'إضافة هذا تلقائياً إلى كل مجموعة حقول جديدة',
    'add_to_preexisting_fieldsets' => 'إضافة إلى أي مجموعة حقول موجودة',
    'show_in_listview' => 'إظهار في قائمة المشاهدات بشكل افتراضي. سيظل المستخدمون المأذون لهم قادرين على إظهار/الإخفاء عبر منتقي الأعمدة',
    'show_in_listview_short' => 'إظهار في القوائم',
    'show_in_requestable_list_short' => 'إظهار في قائمة الأصول القابلة للطلب',
    'show_in_requestable_list' => 'إظهار القيمة في قائمة الأصول القابلة للطلب. لن تظهر الحقول المشفرة',
    'encrypted_options' => 'هذا الحقل مشفّر، لذلك لن تتوفر بعض خيارات العرض.',
    'display_checkin' => 'Display in checkin forms',
    'display_checkout' => 'Display in checkout forms',

];
