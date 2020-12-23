<?php

    class userModel extends AbstractModel
    {
        protected static $tableName = 'users';

        protected $id;
        private $name;
        private $email;
        private $roles;
        private $permissions;
        
        public function __construct($id) {
            global $con;
            $stmt = $con->prepare("SELECT * FROM ". self::$tableName . " WHERE id = ?");
            $stmt->execute(array($id));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $id;
            $this->name = $row["name"];
            $this->email =  $row['email'];
            $this->setRoles();
            $this->setPermissions();
        }

        public function getName() {
            return $this->name;
        }

        public function getEmail() {
            return $this->email;
        }

        private function setRoles() {
            global $con;

            $stmt = $con->prepare("SELECT roles.id, roles.role FROM user_role INNER JOIN roles ON user_role.role_id = roles.id WHERE user_id = ?");
            $stmt->execute([$this->id]);
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($roles as $role) {
                $role = new roleModel($role['id']);
                $this->roles[] = $role;
            }
        }

        private function setPermissions() {
            $userPermissions = [];
            foreach ($this->roles as $role) {
                $role = new roleModel($role->getId());
                $permissions = $role->getPermissions();
                foreach ($permissions as $permission) {
                    $userPermissions[] = $permission->getPermission();
                }
            }
            $userPermissions = array_unique($userPermissions);
            $this->permissions = $userPermissions;
        }

        public function getRoles() {
            return $this->roles;
        }

        public function getPermissions() {
            return $this->permissions;
        }

        public function hasRole($role) {
            foreach ($this->roles as $userRole) {
                if ( $role == $userRole->getRole() )
                    return true;
            }
            return false;
        }

        public function hasPermission($permission = "this page") {
            foreach($this->roles as $userRole) {
                $role = new roleModel( $userRole->getId() );
                if ( $role->hasPermission($permission) ) {
                    return true;
                }
            }
            return false;
        }


        
    }