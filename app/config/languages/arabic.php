<?php

function lang($word) {
    $arr = array(
        # Configuration
        'DBname' => 'arabname',

        # Navigation Bar
        "KFS_Hos" => "مستشفى جامعة كفر الشيخ",
        "home_page" => "الصفحة الرئيسية",
        "doctors" => "الأطباء",
        "appointments" => "المواعيد",
        "clinics" => "العيادات",
        'make_appointment' => "حجز ميعاد",
        "login" => "تسجيل الدخول",
        "lang" => "اللغة",
        "arabic_lang" => "اللغة العربية",
        "english_lang" => "اللغة الإنجليزية",

        'view_profile' => 'عرض الصفحة الشخصية',
        'patients' => 'المرضى',

        # Footer
        "important_links" => 'روابط هامة',
        "recent_news" => "آخر الأخبار",
        'contact_us' => 'اتصل بنا',
        'sign_up' => 'تسجيل',

        # Sign in Form
        'user_name' => 'اسم المستخدم',
        'password' => 'كلمة المرور',

        # Make Appointment
        'enter_your_name' => 'ادخل اسمك',


        'patient_number_now' => 'رقم المريض الحالي ',
        'patients_attend' => 'المرضي الذين دخلوا ',
        'patients_wait' => 'المرضي المنتظرين ',
        'no' => 'الرقم',
        'national_id' => 'الرقم القومي ',
        'birth_date' => 'تاريخ الميلاد ',
        'birth_province' => 'محل الميلاد ',
        'manage' => 'ادارة البيانات',
        'type' => 'النوع',
        'attend' => 'الحضور',
        'new' => 'جديد',
        'old' => 'قديم',
        'name' => 'الاسم',
        'today_patients' => 'مرضي اليوم',
        'dashboard' => 'صفحة التحكم',
        'data_of_all_doctors' => 'بيانات الأطباء',
        'accept_new_doctor' => 'قبول طبيب جديد',
        'image' => 'صورة',
        'specialization' => 'التخصص',
        'age' => 'السن',
        'email' => 'البريد الالكتروني',
        'phone_number' => 'رقم التليفون',
        'contacts' => 'جهات الاتصال',
        'activation' => 'تفعيل',
        'deactivation' => 'عدم التفعيل',
        'edit' => 'تعديل',
        'address' => 'العنوان',
        'personal_info' => 'البيانات الشخصية',
        'patientprofile' => 'صفحة المريض',
        'all_doctors' => 'جميع الأطباء',
        'choose_a_clinic' => 'اختار العيادة',
        'search' => 'البحث',


        'enter' => 'ادخل',
        'your_eng_name' => 'اسمك باللغة الإنجليزية',
        'your_arab_name' => 'اسمك باللغة العربية',
        'your_email' => 'بريدك الإلكتروني',
        'your_national_id' => 'رقمك القومي',
        'your_phone' => 'رقم هاتفك',
        'gender' => 'النوع',
        'male' => 'ذكر',
        'female' => 'أنثى',
        'your_address' => 'عنوانك',
        'pass_confirm' => 'كلمة المرور مرة أخرى',
        'patient' => 'مريض',
        'doctor' => 'طبيب',
        'done' => 'تم',
        'if_you_sign_up' => 'هل أنت مسجل بالفعل؟',
        'users' => "المستخدمين"


    );
    return isset($arr[$word]) ? $arr[$word] : $word;

}