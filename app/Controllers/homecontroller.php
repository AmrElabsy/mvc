<?php

include "abstractcontroller.php";

class home extends AbstractController
{
    public function index()
    {
        global $page;
        global $title;

        $page = 'home';
        $title =  getLang("الصفحة الرئيسية ", ' Home');

        $user = new userModel(1);
        $roles = $user->getRoles();
        var_dump( $user->hasPermission("edit post") );
        $this->data['doctors'] = doctorModel::getDoctorsByLimit(6);
        $this->data['clinics'] = clinicModel::getClinicsByLimit(6);
        $this->data['countOfClinics'] = clinicModel::getCount();
        $this->data['countOFDoctors'] = doctorModel::getCount();
        $this->data['countOfPatients'] = patientModel::getCount();

        $this->view();
    }

    public function signup()
    {
        if (isVisitor()) {
            global $title;
            global $page;

            $title =  getLang("صفحة التسجيل", 'Sign Up');
            $page = 'signup';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validation = new proxy();

                if (isset($_POST['done-patient'])) {
                    $engname = $_POST['engname'];
                    $arabname = $_POST['arabname'];
                    $mail = $_POST['mail'];
                    $pass = $_POST['pass'];
                    $re_pass = $_POST['re-pass'];
                    $national_id = $_POST['national_id'];
                    $phone = $_POST['phone'];
                    $birth_date = $_POST['birth-date'];
                    $birth_place = $_POST['birth_place'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];

                    $engname = $validation->validString($engname);
                    $arabname = $validation->validString($arabname);
                    $mail = $validation->validEmail($mail);
                    $pass = $validation->validString($pass);
                    $re_pass = $validation->validString($re_pass);
                    $national_id = $validation->validNumber($national_id);
                    $phone = $validation->validNumber($phone);
                    $birth_place = $validation->validString($birth_place);
                    $address = $validation->validString($address);

                    if (!$validation->isArabic($arabname)) {
                        $this->setMsg(getLang("الرجاء كتابة الاسم باللغة العربية.", "Write The Arabic Name"));
                        $this->setError();
                    }

                    if (!$validation->isEnglish($engname)) {
                        $this->setMsg(getLang("الرجاء كتابة الاسم باللغة الإنجليزية.", "Write The English Name"));
                        $this->setError();
                    }

                    if (!$validation->isMatched($pass, $re_pass)) {
                        $this->setMsg(getLang("كلمتا السر غير متطابقتين", "Both Passwords Must Match"));
                        $this->setError();
                    }

                    if (!$validation->isEmail($mail)) {
                        $this->setMsg(getLang('الرجاء كتابة البريد الإلكتروني', 'Write The E-Mail Address'));
                        $this->setError();
                    }

                    if (!$validation->isdDate($birth_date)) {
                        $this->setMsg(getLang('الرجاء كتابة تاريخ الميلاد', 'Write The Birth Date'));
                        $this->setError();
                    }

                    if (!$validation->isNationalid($national_id)) {
                        $this->setMsg(getLang('الرجاء كتابة الرقم القومي', 'Write The National ID'));
                        $this->setError();
                    }

                    if (!$validation->isSelected($gender)) {
                        $this->setMsg(getLang('الرجاء إختيار النوع', 'Select Gender'));
                        $this->setError();
                    }

                    if (patientModel::isFound('national_id', $national_id)) {
                        $this->setMsg(getLang('هذا الرقم القومي مسجل من قبل', 'This National ID is Duplicated'));
                        $this->setError();
                    }

                    if (patientModel::isFound('phone', $phone)) {
                        $this->setMsg(getLang('هذا الهاتف المحمول مسجل من قبل', 'This Mobile Phone is Duplicated'));
                        $this->setError();
                    }

                    if ($this->isSetError()) {
                        redirect('self');
                    } else {
                        $pass_arr = $this->setHashed($pass);
                        $pass = $pass_arr['pass'];
                        $salt = $pass_arr['salt'];

                        $data = array(
                            'arabname' => $arabname,
                            'engname' => $engname,
                            'mail' => $mail,
                            'pass' => $pass,
                            'salt' => $salt,
                            'national_id' => $national_id,
                            'phone' => $phone,
                            'birth_date' => $birth_date,
                            'birth_place' => $birth_place,
                            'address' => $address,
                            'gender' => $gender
                        );
                        patientModel::signUp($data);
                        redirect('/home/signin');
                    }

                } elseif (isset($_POST['done-doctor'])) {

                    $engname = $_POST['engname'];
                    $arabname = $_POST['arabname'];
                    $mail = $_POST['mail'];
                    $pass = $_POST['pass'];
                    $re_pass = $_POST['re-pass'];
                    $national_id = $_POST['national_id'];
                    $phone = $_POST['phone'];
                    $clinic = $_POST['clinic'];


                    $engname = $validation->validString($engname);
                    $arabname = $validation->validString($arabname);
                    $mail = $validation->validEmail($mail);
                    $pass = $validation->validString($pass);
                    $re_pass = $validation->validString($re_pass);
                    $national_id = $validation->validNumber($national_id);
                    $phone = $validation->validNumber($phone);

                    if (!$validation->isArabic($arabname)) {
                        $this->setMsg(getLang("الرجاء كتابة الاسم باللغة العربية.", "Write The Arabic Name"));
                        $this->setError();
                    }

                    if (!$validation->isEnglish($engname)) {
                        $this->setMsg(getLang("الرجاء كتابة الاسم باللغة الإنجليزية.", "Write The English Name"));
                        $this->setError();
                    }

                    if (!$validation->isMatched($pass, $re_pass)) {
                        $this->setMsg(getLang("كلمتا السر غير متطابقتين", "Both Passwords Must Match"));
                        $this->setError();
                    }

                    if (!$validation->isSelected($clinic)) {
                        $this->setMsg(getLang('الرجاء إختيار النوع', 'Select Gender'));
                        $this->setError();
                    }

                    if (!$validation->isEmail($mail)) {
                        $this->setMsg(getLang('الرجاء كتابة البريد الإلكتروني', 'Write The E-Mail Address'));
                        $this->setError();
                    }

                    if (!$validation->isNationalid($national_id)) {
                        $this->setMsg(getLang('الرجاء كتابة الرقم القومي', 'Write The National ID'));
                        $this->setError();
                    }


                    if (doctorModel::isFound('national_id', $national_id)) {
                        $this->setMsg(getLang('هذا الرقم القومي مسجل من قبل', 'This National ID is Duplicated'));
                        $this->setError();
                    }

                    if (doctorModel::isFound('phone', $phone)) {
                        $this->setMsg(getLang('هذا الهاتف المحمول مسجل من قبل', 'This Mobile Phone is Duplicated'));
                        $this->setError();
                    }

                    if ($this->isSetError()) {
                        redirect('self');
                    } else {
                        $pass_arr = $this->setHashed($pass);
                        $pass = $pass_arr['pass'];
                        $salt = $pass_arr['salt'];

                        $data = array(
                            'arabname' => $arabname,
                            'engname' => $engname,
                            'mail' => $mail,
                            'pass' => $pass,
                            'salt' => $salt,
                            'national_id' => $national_id,
                            'phone' => $phone,
                            'clinic' => $clinic
                        );
                        doctorModel::signUp($data);
                        redirect('home/signin');
                    }
                }
            } else {
                $this->data['clinics'] = clinicModel::getAll();
                $this->view();
            }
        } else {
            redirect();
        }
    }

    public function signin()
    {
        if (isVisitor()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validation = new proxy();
                $name = $_POST['name'];
                $pass = $_POST['pass'];

                $name = $validation->validString($name);
                $pass = $validation->validString($pass);

                if (doctorModel::isValidSignIn($name, $pass) > 0) {
                    $id = doctorModel::isValidSignIn($name, $pass);
                    $doctor = new doctorModel($id);
                    if ($doctor->isActivated) {
                        $_SESSION['doc_id'] = $id;
                        //$this->setMsg($id);
                        $_SESSION['auth'][] = 'doctor';
                        if ($doctor->access == 1) {
                            $_SESSION['auth'][] = 'admin';
                            $_SESSION['admin_id'] = $id;
                        }
                        header('location: /home');
                        exit();
                    } else {
                        $this->setMsg(getLang("لم يتم تفعيل هذا الحساب بعد", "This Account is not Activated."));
                        header('location: /home/signin');
                        exit();
                    }
                } elseif (patientModel::isValidSignIn($name, $pass) > 0) {
                    $id = patientModel::isValidSignIn($name, $pass);
                    $_SESSION['pat_id'] = $id;
                    $_SESSION['auth'][] = 'patient';
                    header('location: /home');
                    exit();
                } elseif (receptionistModel::isValidSignIn($name, $pass) > 0) {
                    $id = receptionistModel::isValidSignIn($name, $pass);
                    $_SESSION['rec_id'] = $id;
                    $_SESSION['auth'][] = 'receptionist';
                    header('location: /home');
                    exit();
                } else {
                    $this->setMsg(getLang("البيانات غير صحيحة", "Data is not Valid"));
                    redirect('/home/signin');
                }
            } else {
                global $title;
                global $page;
                $page = 'login';
                $title = getLang("تسجيل الدخول", ' Login');
                $this->view();
            }
        } else {
            redirect();
        }
    }

    public function makeappointment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Insert New Appointment
        } else {
            $this->view();
        }
    }

    public function logout()
    {

        if (isArabic()) {
            $lang = 'arabic';
        } else if (isEnglish()) {
            $lang = 'english';
        } else {
            $lang = 'arabic';
        }
        session_unset();
        session_destroy();

        switch ($lang) {
            case 'arabic':
                setArabic();
                break;
            case 'english':
                setEnglish();
                break;
        }
        redirect();
    }
}