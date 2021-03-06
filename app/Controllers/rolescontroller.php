<?php

include 'abstractcontroller.php';

class roles extends AbstractController
{
    public function index() {
        if ( Auth::is("Admin") ) {
            $this->data['roles'] = roleModel::getAll();
        
            $this->view();
        } else {
            Redirect::to("home/signin");
        }        
    }

    public function edit() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $id = Request::post("id");
            $name = Request::post("name");
            $permissions = Request::post("permissions");

            $role = new roleModel($id);
            $role->update($name, $permissions);

            Redirect::to("roles");
        } else {
            global $param;
            $id = $param[0];
            $role = new roleModel( $id );
            $permissions = permissionModel::getAll();

            $this->data['role'] = $role;
            $this->data['permissions'] = $permissions;

            $this->view();
        }
    }

    public function add() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $name = Request::post("name");
            $permissions = Request::post("permissions");

            roleModel::add($name, $permissions);

            Redirect::to("roles");
        } else {
            $permissions = permissionModel::getAll();
            $this->data['permissions'] = $permissions;

            $this->view();
        }
    }

    public function delete() {
        global $param;
        if ( isset($param[0]) ) {
            $id = $param[0];

            $role = new roleModel($id);
            $role->delete();
        }
        Redirect::to("roles");    
    }
}