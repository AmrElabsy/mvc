<?php

    class permissionModel extends AbstractModel
    {
        protected static $tableName = 'permissions';

        protected $id;
        private $permission;

        public function __construct($id)
        {
            global $con;

            $stmt = $con->prepare("SELECT * FROM " . self::$tableName . " WHERE id = ?");
            $stmt->execute([$id]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $id;
            $this->permission = $row['permission'];

        }

        public function getPermission() {
            return $this->permission;
        }

        public function getId() {
            return $this->id;
        }

        public static function getAll() {
            global $con;

            $stmt = $con->prepare("SELECT * FROM " . self::$tableName);
            $stmt->execute();

            $permissions = $stmt->fetchAll( PDO::FETCH_ASSOC );
            $tempPermissions = [];

            foreach( $permissions as $permission ) {
                $tempPermission = new permissionModel( $permission['id'] );
                $tempPermissions[] = $tempPermission;
            }

            return $tempPermissions;
        }
    }