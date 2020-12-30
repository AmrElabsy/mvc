<?php

include 'abstractcontroller.php';

class permissions extends AbstractController
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
            $name = Request::post("name");
            permissionModel::add($name);

            Redirect::to("permissions");
        } else {
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