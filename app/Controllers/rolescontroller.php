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
            $permissions = Request::post("permission");

        } else {

            global $con;

            $stmt = $con->prepare("SELECT `COLUMN_NAME` 
            FROM `INFORMATION_SCHEMA`.`COLUMNS` 
            WHERE `TABLE_SCHEMA`='his' 
                AND `TABLE_NAME`='users';");

                $stmt->execute();

                $users_columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

                echo "<pre>";
                foreach ( $users_columns as $clm ) {
                    var_dump($users_columns);
                    break;
                }

                echo "</pre>";

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