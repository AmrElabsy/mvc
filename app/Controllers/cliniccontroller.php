<?php

include "abstractcontroller.php";

class clinic extends AbstractController
{
    public function index()
    {
        global $title;
        global $page;

        $page = 'clinics';
        $title =  getLang("العيادات", 'Clinics');;
        $this->data['clinics'] = clinicModel::getAll();
        $this->view();
    }

    public function add()
    {
        if (isAdmin()) {
            global $title;
            $title = getLang("إضافة عيادة", 'Add a new Clinic');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validation = new proxy();
                $engname = $_POST['engname'];
                $arabname = $_POST['arabname'];
                $image = $_FILES['image'];

                $extention = imageExtension($image);
                $noImage = clinicModel::getNewImageNumber();

                $arabname = $validation->validString($arabname);
                $engname = $validation->validString($engname);

                if (!$validation->isArabic($arabname)) {
                    $this->setMsg(getLang('الرجاء كتابة الاسم باللغة العربية', 'Write The Arabic Name'));
                    $this->setError();
                }

                if (!$validation->isEnglish($engname)) {
                    $this->setMsg(getLang('الرجاء كتابة الاسم باللغة الإنجليزية', 'Write The English Name'));
                    $this->setError();
                }

                if (!$this->isSetError()) {
                    if (uploadImage('clinics', $noImage, $image) == 'success') {
                        uploadImage('clinics', $noImage, $image);
                        $data = array(
                            'arabname' => $arabname,
                            'engname' => $engname,
                            'image' => $noImage . '.' . $extention
                        );
                        clinicModel::addClinic($data);
                        $this->setMsg(getLang('تم إضافة العيادة بنجاح','Clinic was Added successfully'),'success');
                        redirect('self');
                    } else if (uploadImage('clinics', $noImage, $image) == 'not extension') {
                        $this->setMsg(getLang('هذا الامتداد غير مسموح به', 'This Extension is not Allowed'));
                        $this->setError();
                    } else if (uploadImage('clinics', $noImage, $image) == 'no image') {
                        $this->setMsg(getLang('الرجاء اختيار صورة', 'Upload an Image'));
                        $this->setError();
                    }
                } else {
                    redirect('/clinic/add');
                }
                $this->view();
            } else {
                $this->view();
            }
        } else {
            redirect();
        }
    }

    public function edit()
    {
        if (isAdmin()) {
            global $title;
            global $param;
            $title = getLang("تعديل بيانات عيادة", 'Edit a Clinic');

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validation = new proxy();

                $id = $_POST['id'];
                $arabname = $_POST['arabname'];
                $engname = $_POST['engname'];
                $image = $_FILES['image'];

                $extention = imageExtension($image);
                $noImage = clinicModel::getNewImageNumber();

                $arabname = $validation->validString($arabname);
                $engname = $validation->validString($engname);

                if (!$validation->isArabic($arabname)) {
                    $this->setMsg(getLang("الرجاء كتابة الاسم باللغة العربية.", "Write The Arabic Name"));
                    $this->setError();
                }

                if (!$validation->isEnglish($engname)) {
                    $this->setMsg(getLang("الرجاء كتابة الاسم باللغة الإنجليزية.", "Write The English Name"));
                    $this->setError();
                }

                if (uploadImage('clinics', $noImage, $image) == 'success') {
                    uploadImage('clinics', $noImage, $image);
                    $newImage = true;
                } else if (uploadImage('clinics', $noImage, $image) == 'not extension') {
                    $this->setMsg(getLang('هذا الامتداد غير مسموح به', 'This Extension is not Allowed'));
                    $this->setError();
                } else if (uploadImage('clinics', $noImage, $image) == 'no image') {
                    $newImage = false;
                }

                if ($this->isSetError()) {
                    redirect('self');
                } else {
                    $clinic = new clinicModel($id);

                    $clinic->edit($arabname, $engname, $newImage, $noImage, $extention);
                    redirect('/clinic');
                }
            } else {
                if (isset($param[0])) {
                    $id = $param[0];
                    $clinic = new clinicModel($id);
                    $this->data['clinic'] = $clinic;
                    $this->view();
                } else {
                    redirect();
                }
            }
        } else {
            redirect();
        }
    }

}