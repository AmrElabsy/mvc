<?php

    class receptionistModel extends AbstractModel
    {
        protected static $tableName = 'receptionists';

        protected $id;
        public $name;
        public $image;

        public function __construct($id)
        {
            global $con;
            $stmt = $con->prepare('SELECT * FROM receptionists WHERE id = ?');
            $stmt->execute(array($id));
            $row = $stmt->fetch();

            $this->id = $id;
            $this->name = $row[getLang('arabname', 'engname')];
            $this->image =  IMAGES_PATH . "receptionists/" . $row['image'];
        }
    }