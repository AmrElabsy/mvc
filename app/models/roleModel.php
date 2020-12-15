<?php

    class roleModel extends AbstractModel
    {
        protected static $tableName = 'roles';

        private $id;
        private $role;
        private $permssions;

        public function __construct($id)
        {
            global $con;

            $stmt = $con->prepare("SELECT * FROM " . self::$tableName . " WHERE id = ?");
            $stmt->execute([$id]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $id;
            $this->role = $row['role'];

            $this->setPermissions();
        }

        private function setPermissions() {
            global $con;

            $stmt = $con->prepare("SELECT permissions.id, permissions.permission FROM role_permission INNER JOIN permissions ON role_permission.permission_id = permissions.id WHERE role_id = ?");
            $stmt->execute([$this->id]);

            $permssions = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->permissions = $permssions;
        }

        public function getPermissions() {
            return $this->permissions;
        }

        public function hasPermission($permssion) {
            foreach ($this->permissions as $RolePermssion) {
                if ( $permssion == $RolePermssion['permission'] ) {
                    return true;
                }
            }
            return false;
        }

    }