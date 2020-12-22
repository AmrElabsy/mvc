<?php
include 'proxy.php';

class AbstractController
{
    protected $data = array();

    public function __construct() {
        Asset::addCss("css/a/c3/c3.min.css");
        Asset::addCss("css/a/bootstrap.min.css");
        Asset::addCss("css/a/icons.min.css");
        Asset::addCss("css/a/app-rtl.min.css", "css/a/app.min.css", Language::directionIsRtl() );
        
        Asset::addJs("js/libs/jquery/jquery.min.js");
        Asset::addJs("js/libs/bootstrap/js/bootstrap.bundle.min.js");
        Asset::addJs("js/libs/metismenu/metisMenu.min.js");
        Asset::addJs("js/libs/simplebar/simplebar.min.js");
        Asset::addJs("js/libs/node-waves/waves.min.js");
        Asset::addJs("js/libs/peity/jquery.peity.min.js");
        Asset::addJs("js/libs/d3/d3.min.js");
        Asset::addJs("js/libs/c3/c3.min.js");
        Asset::addJs("js/libs/jquery-knob/jquery.knob.min.js");
        

    }

    public function notfound() {
        $this->view();
    }

    public function view()
    {
        global $controller;
        global $action;
        global $notFound;

        $view = APP_PATH . 'views/' . $controller . "/" . $action . ".view.php";

        if (file_exists($view)) {
            Asset::addCss("css/style.css");

            Asset::addJs("js/script.js");
            Asset::addJs("js/a/app.js");
            include TEMP_PATH . "header.temp.php";
            include TEMP_PATH . "nav.temp.php";
            foreach($this->data as $key => $value) {
                $$key = $value;
            }
            include $view;
            include TEMP_PATH . "footer.temp.php";
        } else {
            $controller = $notFound;
            $action = $notFound;
            $this->view();
        }
    }

    protected function setMsg($msg, $type = 'danger') {
        $_SESSION['msg'][] = "<div class='col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4'>
                                    <div class='alert alert-" . $type . "'>
                                        " . $msg . "
                                    </div>
                                </div>";
    }

    protected function setError() {
        $_SESSION['err'] = "Error";
    }

    protected function isSetError() {
        if (isset($_SESSION['err'])){
            unset($_SESSION['err']);
            return true;
        } else {
            return false;
        }
    }
    protected function getMsg() {
        if (isset($_SESSION['msg'])) {
            foreach ($_SESSION['msg'] as $msg) {
                echo $msg;
            }
            unset($_SESSION['msg']);
        }
    }
}