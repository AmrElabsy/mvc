<?php

    class roleModel extends AbstractModel
    {
        protected static $tableName = 'roles';

        protected $id;
        private $role;
        private $permissions;
        
        public function __construct($id) {
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

            $this->permissions = [];
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

        public function getId() {
            return $this->id;
        }

        public static function getAll() {
            global $con;

            $stmt = $con->prepare("SELECT * FROM " . self::$tableName);
            $stmt->execute();
            $roles = $stmt->fetchAll( PDO::FETCH_ASSOC );
            $tempRoles = [];

            foreach ( $roles as $role ) {
                $tempRole = new roleModel( $role['id'] );
                $tempRoles[] = $tempRole;
            }
            return $tempRoles;
        }

        public static function add( $name, array $permissions = [] ) {
            global $con;
            $con->beginTransaction();

            try {
                $stmt = $con->prepare("INSERT INTO " .  self::$tableName . "(role) VALUES(?)");
                $stmt->execute( [$name] );

                $id = $con->lastInsertId();

                $role = new roleModel( $id);
                $role->addPermissions( $permissions );
            } catch ( Throwable $e ) {
                $con->rollBack();
                throw $e;
            }
            $con->commit();
        }

        public function update($name, array $permissions) {
            $this->updateName($name);
            $this->updatePermissions($permissions);
        }

        public function updateName( $name ) {
            global $con;

            $stmt = $con->prepare("UPDATE roles SET role = ? WHERE id = ?");
            $stmt->execute([$name, $this->id]);
        }

        public function updatePermissions( array $permissions ) {
            global $con;
            $con->beginTransaction();
            try {
                $this->deletePermissions();
                $this->addPermissions($permissions); 
            } catch (Throwable $e) {
                $con->rollBack();
                throw $e;
            }
            $con->commit();

        }

        public function deletePermissions() {
            global $con;
            $stmt = $con->prepare("DELETE FROM role_permission WHERE role_id = ?");
            $stmt->execute([$this->id]);
        }

        public function addPermissions( array $permissions ) {
            global $con;
            foreach( $permissions as $permission ) {
                $stmt = $con->prepare("INSERT INTO role_permission(role_id, permission_id) VALUES(?, ?)");
                $stmt->execute([$this->id, $permission]);
            }
        }

        public function delete() {
            global $con;

            $stmt = $con->prepare("DELETE FROM " . self::$tableName . " WHERE id = ?");
            $stmt->execute([$this->id]);
        }
    }