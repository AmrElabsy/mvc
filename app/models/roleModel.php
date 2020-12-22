<?php

    class roleModel extends AbstractModel
    {
        protected static $tableName = 'roles';

        protected $id;
        private $role;
        private $permissions;

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

            $permissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($permissions as $permission) {
                $per = new permissionModel($permission['id']);
                $this->permissions[] = $per;
            };
        }

        public function getPermissions() {
            return $this->permissions;
        }

        public function hasPermission($permission) {
            foreach ($this->permissions as $RolePermission) {
                if ( $permission == $RolePermission->getPermission() ) {
                    return true;
                }
            }
            return false;
        }

        public function getRole() {
            return $this->role;
        }

    }