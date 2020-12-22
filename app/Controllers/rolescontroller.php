<?php

include 'abstractcontroller.php';

class roles extends AbstractController
{
    public function index() {
        $this->data['roles'] = roleModel::getAll();
        
        $this->view();
    }

    public function edit() {
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

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
}