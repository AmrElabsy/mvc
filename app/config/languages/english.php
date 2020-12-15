<?php

function lang($word)
{
    $arr = array(
        # Configuration
        'DBname' => 'engname',

        "KFS_Hos" => "Kafr El-Shiekh Hospital",
        "home_page" => "Home Page",
        "doctors" => "Doctors",
        "appointments" => "Appointments",
        "clinics" => "Clinics",
        'make_appointment' => "Make an Appointment",
        "login" => "Login",
        "lang" => "Language",
        "arabic_lang" => "Arabic",
        "english_lang" => "English",

        "view_profile" => 'View Profile',
        'patients' => 'Patients',


        'important_links' => 'Our Important Links',
        'recent_news' => "Recent News",
        'contact_us' => 'Contact Us',
        'sign_up' => 'Sign Up',
        'user_name' => 'User Name',
        'password' => 'Password',

        'patient_number_now' => 'Patient Number Now ',
        'patients_attend' => 'Patients Attended ',
        'patients_wait' => 'Patients Waiting ',
        'no' => 'No',
        'national_id' => 'National Id ',
        'birth_date' => 'Birth Date ',
        'birth_province' => 'Birth Province ',
        'manage' => 'Manage',
        'type' => 'Type',
        'attend' => 'Attend',
        'new' => 'New',
        'old' => 'Old',
        'name' => 'Name',
        'today_patients' => 'Today Patients',
        'data_of_all_doctors' => 'Data of All doctors',
        'accept_new_doctor' => 'Accept new doctor',
        'image' => 'Image',
        'specialization' => 'Specialization',
        'age' => 'Age',
        'email' => 'Email',
        'phone_number' => 'Phone Number',
        'contacts' => 'Contacts',
        'activation' => 'Activation',
        'deactivation' => 'Deactivation',
        'edit' => 'edit',
        'address' => 'Address',
        'personal_info' => 'Personal Information',
        'patientprofile' => 'Patient Profile',
        'all_doctors' => 'All Doctors',
        'choose_a_clinic' => 'Choose a Clinic',
        'search' => 'Search',

        'enter' => 'Enter',
        'your_eng_name' => 'Your English Name',
        'your_arab_name' => 'Your Arabic Name',
        'your_email' => 'Your E-Mail',
        'your_national_id' => 'Your National ID',
        'your_phone' => 'Your Phone Number',
        'gender' => 'Gender',
        'male' => 'Male',
        'female' => 'Female',
        'your_address' => 'Your Address',
        'pass_confirm' => 'Password Again',
        'patient' => 'Patient',
        'doctor' => 'Doctor',
        'done' => 'Done',
        'if_you_sign_up' => 'If You Sign Up',

        'users' => "Users"



    );
    return isset($arr[$word]) ? $arr[$word] : $word;

}