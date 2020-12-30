<?php

include 'abstractcontroller.php';

class beauty extends AbstractController
{
    public function index() {
        if ( Auth::is("Admin") ) {
            $this->data['permissions'] = permissionModel::getAll();
        
            $this->view();
        } else {
            Redirect::to("home/signin");
        }        
    }

    public function edit() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $id = Request::post("id");
            $name = Request::post("name");

            $permission = new permissionModel($id);
            $permission->update($name);

            Redirect::to("permissions");
        } else {
            global $param;
            $id = $param[0];
            $permission = new permissionModel( $id );
            
            $this->data['permission'] = $permission;

            $this->view();
        }
    }

    public function add() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $id = Request::post("id");
            $name = Request::post("name");
            $phone = Request::post("phone");
            $email = Request::post("email");
            $paying = Request::post("paying");
           
        } else {
            Asset::addCss("css/dropzone.min.css");
            Asset::addJs("js/dropzone.min.js");

            $this->view();
        }
    }

    public function delete() {
        global $param;
        if ( isset($param[0]) ) {
            $id = $param[0];

            $permission = new permissionModel($id);
            $permission->delete();
        }
        Redirect::to("permissions");    
    }
}