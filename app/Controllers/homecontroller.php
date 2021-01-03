<?php

include "abstractcontroller.php";

class home extends AbstractController
{
    public function index()
    {
        if (Auth::isSignedIn()) {
            global $page;
            global $title;

            $page = 'home';
            $title =  getLang("الصفحة الرئيسية ", ' Home');

            Asset::addJs("js/a/dashboard.init.js");

            $this->view();
        } else {
            Redirect::to("home/signin");
        }
    
    }

    public function signup()
    {
        $this->view();
    }

    public function signin()
    {
        if (!Auth::isSignedIn()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = Request::post("name");
                $pass = Request::post("pass");

                if (userModel::isValidSignIn($name, $pass)) {
                    Auth::SignIn();
                    Redirect::home();
                } else {
                    $msg = userModel::getSignInErrorMsg($name);
                    Message::addErrorMsg($msg);
                    Redirect::self();
                }
            } else {
                $this->view();
            }
        } else {
            Redirect::home();
        }
    }

    public function logout()
    {
        Auth::logout();
        Redirect::home();
    }
}
