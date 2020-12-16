<?php
include "abstractcontroller.php";

class doctor extends abstractcontroller
{

    public function index()
    {
        global $page;
        $page = 'doctors';
        $this->data['doctors'] = doctorModel::getAll();
        $this->view();
    }

    public function schedule() // may be deleted
    {
        if (isDoctor()) {
            $this->view();
        }
    }

    public function dashboard()
    {
        if (isDoctor()) {
            global $page;
            global $title;
            global $param;
            $doctor = new doctorModel($_SESSION['doc_id']);
            $id = $doctor->id;

            $this->data['todayPatients'] = $doctor->getTodayPatients();
            $this->data['todayPatientsCount'] = $doctor->todayPatientsCount();
            $this->data['waitingToday'] = $doctor->getWaitingToday();
            $this->data['attendedToday'] = $doctor->getAttendedToday();

            $page = 'doctor-dashboard';
            $title =  getLang(" لوحة إدارة الطبيب", ' Doctor-dashboard');

            $this->data['patientsdoc'] = patientModel::getPatientsByDoctorToday($id);
            $this->data['countwait'] = patientModel::countWait($id);
            $this->data['countattend'] = patientModel::countAttend($id);
            $this->data['countnumber'] = patientModel::patientNumber($id);

            if (isset($param[0])) {
                $type = $param[0];
                $examId = $param[1];
                $examination = new examinationModel($examId);

                switch ($type) {
                    case 'attend':
                        $examination->setAttented();
                        break;

                    case 'notattend':
                        $examination->setNotAttended();
                        break;
                }
                redirect('back');
            }
            $this->view();
        } else {
        	redirect();
        }
    }

    public function manage()
    {
        if (true) {
            global $param;
            global $page;
            global $title;

            $page = 'manage';
            $title = getLang("الإدارة","Manage");

            $this->data['doctor'] = doctorModel::getDoctors();

            if (isset($param[0])) {
                $docId = $param[0];
                $doctor = new doctorModel($docId);
                $isActivated = $doctor->isActivated;

                if ($isActivated) {
                    $doctor->deactivate();
                } else {
                    $doctor->activate();
                }
                redirect();
            }
            $this->view();
        } else {
            redirect();
        }

    }

    public function edit()
    {
        if (isAdmin()) {
            $docId = 6;
            $doctor = new doctorModel($docId);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $doctor->arabname = $_POST['arabname'];
                $doctor->engname = $_POST['engname'];
                $doctor->mail = $_POST['mail'];
                $doctor->national_id = $_POST['national_id'];
                $doctor->clinic_id = $_POST['clinic_id'];
                $doctor->phone = $_POST['phone'];

                if (!empty($_FILES[''])) {

                }

                $arabname = $this->arabname;
                $engname = $this->engname;
                $email = $this->mail;
                $national_id = $this->national_id;
                $clinic_id = $this->clinic_id;
                $image = $this->image;
                $phone = $this->phone;

                $doctor->update();

            } else {
                $this->data['doctor'] = $doctor;
                $this->view();
            }
        }
    }

    public function profile()
    {
        if (isDoctor()) {
            $id = $_SESSION['doc_id'];
            $doctor = new doctorModel($id);
            $this->data['doctor'] = $doctor;

            $this->view();
        } else {
            redirect();
        }

    }

}