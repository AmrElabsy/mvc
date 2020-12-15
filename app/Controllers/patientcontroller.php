<?php

include 'abstractcontroller.php';

class patient extends AbstractController
{
    public function index()
    {
        if (isDoctor()) {
            $this->data['patients'] = patientModel::getAll();
            $this->view();
        }
    }

    public function profile()
    {
        global $patPage;
        global $page;
        global $title;
        global $param;

        $page = 'profile';
        $title = getlang(" صفحة المريض  ", " Patient Profile ");
        $patPage = "home";

        $this->patientPage();
        /*
        if (isset($param[0])) {
            $patientId = $param[0];
            if (patientModel::isExist($patientId)) {
                if ((isDoctor()) || (isPatient() && getID() == $patientId)) {
                    $this->data['patient'] = new patientModel($patientId);
                    $this->data['id'] = $patientId;
                    $this->view();
                } else {
                    redirect();
                }
            } else {
                redirect();
            }
        } else {
            if (isPatient()){
                $patientId = getID();

                $this->data['patient'] = new patientModel($patientId);
                $this->data['id'] = $patientId;
                $this->view();
            } else {
                redirect();
            }
        }
        */
    }

    public function examination()
    {
        global $patPage;
        global $param;

        $patPage = 'examinations';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        } else {
            $data = array('examination' => 'getExaminations');
            $this->patientPage($data);
        }
    }

    public function scan()
    {
        global $patPage;
        global $param;

        $patPage = "scans";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        } else {
            $data = array('scans' => 'getScans');
            $this->patientPage($data);
        }
    }

    public function diagnosis()
    {
        global $patPage;
        global $param;

        $patPage = "diagnosis";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        } else {
            $data = array('diagnoses' => 'getDiagnoses');
            $this->patientPage($data);
        }
    }

    public function analysis()
    {
        global $patPage;
        global $param;

        $patPage = "analysis";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        } else {
            $data = array('analyses' => 'getAnalyses');
            $this->patientPage($data);
        }
    }

    public function prescription()
    {
        global $patPage;
        global $param;

        $patPage = "prescriptions";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        } else {
            $data = array('prescriptions' => 'getPrescriptions');
            $this->patientPage($data);
        }
    }

    public function edit()
    {
        global $param;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        } else {
            $this->patientPage();
        }
    }

}