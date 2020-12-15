<?php

    class userModel extends AbstractModel
    {
        protected static $tableName = 'users';

        private $id;
        private $name;
        private $email;
        private $roles;
        private $permission;
        
        public function __construct($id)
        {
            global $con;
            $stmt = $con->prepare("SELECT * FROM ". self::$tableName . " WHERE id = ?");
            //var_dump($stmt);
            $stmt->execute(array($id));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($row);

            $this->id = $id;
            $this->name = $row["name"];
            $this->email =  $row['email'];
            $this->setRoles();
            $this->setPermissions();
        }

        private function setRoles()
        {
            global $con;

            $stmt = $con->prepare("SELECT roles.id, roles.role FROM user_role INNER JOIN roles ON user_role.role_id = roles.id WHERE user_id = ?");
            $stmt->execute([$this->id]);
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->roles = $roles;
        }

        private function setPermissions() {
            $userPermissions = [];
            foreach ($this->roles as $role) {
                $role = new roleModel($role['id']);
                $permissions = $role->getPermissions();
                foreach ($permissions as $permission) {
                    $userPermissions[] = $permission['permission'];
                }
            }
            $userPermissions = array_unique($userPermissions);
            $this->permissions = $userPermissions;
        }

        public function getRoles()
        {
            return $this->roles;
        }

        public function hasRole($role) {
            var_dump($this->roles);
            foreach ($this->roles as $userRole) {
                if ( $role == $userRole['role'] )
                    return true;
            }
            return false;
        }

        public function hasPermission($permission) {
            foreach($this->roles as $userRole) {
                $role = new roleModel($userRole['id']);
                if ( $role->hasPermission($permission) ) {
                    return true;
                }
            }
            return false;
        }

        
    }