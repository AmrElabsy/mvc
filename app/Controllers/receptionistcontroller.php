<?php

include 'abstractcontroller.php';

class receptionist extends AbstractController
{
    public function index()
    {
        if (true) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            } else {
                $this->view();
            }
        }
    }

    public function newappointment()
    {
        if (isReceptionist()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            } else {
                $this->view();
            }
        }
    }

    public function doctor()
    {
        if (isReceptionist()) {
            $this->data['attendanceDoctors'] = doctorModel::getAttendanceDoctors();
            $this->view();
        }
    }

    public function setAttended()
    {
        if(isReceptionist()) {
            global $param;
            if (isset($param[0]) && is_numeric($param[0])) {
                $id = $param[0];
                $doc = new doctorModel($id);
                $doc->setAttended();
                redirect('back');
            } else {
                redirect('back');
            }
        }
    }

    public function setAbsent()
    {
        if(isReceptionist()) {
            global $param;
            if (isset($param[0]) && is_numeric($param[0])) {
                $id = $param[0];
                $doc = new doctorModel($id);
                $doc->setAbsent();
                redirect('back');
            } else {
                redirect('back');
            }
        }
    }

}