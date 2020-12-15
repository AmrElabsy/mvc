<?php
include 'proxy.php';
include 'singleton.php';

class AbstractController
{
    protected $data = array();

    public function __construct()
    {
        global $myAcc;
        if (isDoctor()) {
            $this->data['myAcc'] = new doctorModel($_SESSION['doc_id']);
        } elseif (isAdmin()) {
            $this->data['myAcc'] = new doctorModel($_SESSION['admin_id']);
        } elseif (isPatient()) {
            $this->data['myAcc'] = new doctorModel($_SESSION['pat_id']);
        } elseif (isReceptionist()) {
            $this->data['myAcc'] = new receptionistModel($_SESSION['rec_id']);
        }
    }

    public function notfound()
    {
        $this->view();
    }

    public function view()
    {
        global $controller;
        global $action;
        global $notFound;

        $view = APP_PATH . 'views/' . $controller . "/" . $action . ".view.php";

        if (file_exists($view)) {
            $footer = singleton::getInstance();
            include TEMP_PATH . "header.temp.php";
            include TEMP_PATH . "nav.temp.php";
            include $view;
            $footer->getFooter();
        } else {
            $controller = $notFound;
            $action = $notFound;
            $this->view();
        }
    }

    protected function setHashed($pass)
    {
        $salt = substr(md5(mt_rand()), 0, 10);
        $pass = $pass . $salt;
        $hashed = sha1($pass);
        $arr = array(
            'pass' => $hashed,
            'salt' => $salt
        );

        return $arr;
    }

    protected function setMsg($msg, $type = 'danger')
    {
        $_SESSION['msg'][] = "<div class='col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4'>
                                    <div class='alert alert-" . $type . "'>
                                        " . $msg . "
                                    </div>
                                </div>";
    }

    protected function setError()
    {
        $_SESSION['err'] = "Error";
    }

    protected function isSetError()
    {
        if (isset($_SESSION['err'])){
            unset($_SESSION['err']);
            return true;
        } else {
            return false;
        }
    }
    protected function getMsg()
    {
        if (isset($_SESSION['msg'])) {
            foreach ($_SESSION['msg'] as $msg) {
                echo $msg;
            }
            unset($_SESSION['msg']);
        }
    }

    public function isAuthorized(array $alloweds)
    {
        if (isset($_SESSION['auth'])) {
            $auths = $_SESSION['auth'];
        } else {
            $auths = array();
        }
        foreach ($auths as $auth) {
            foreach ($alloweds as $allowed) {
                if ($auth == $allowed) {
                    return true;
                }
            }
        }
        return false;
    }

    protected function JSON($array)
    {
        $file = fopen("public/json/file.json", 'w');
        $str = json_encode($array);
        fwrite($file, $str);
        fclose($file);
    }

    protected function patientPage(array $pateintData = array())
    {
        global $param;

        if (isset($param[0])) {
            $patientId = $param[0];
            if (patientModel::isExist($patientId)) {
                if ((isDoctor()) || (isPatient() && getID() == $patientId)) {
                    $patient = new patientModel($patientId);
                    $this->data['patient'] = $patient;
                    $this->data['id'] = $patientId;
                    if (isset($pateintData)) {
                        foreach ($pateintData as $datum => $value){
                            $this->data[$datum] = $patient->$value();
                        }
                    }
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
    }
}