<?php

class clinicModel extends AbstractModel
{

    public $id;
    public $name;
    public $arabname;
    public $engname;
    public $image;
    protected static $tableName = 'clinics';


    public function __construct($id)
    {
        global $con;

        $this->id = $id;
        $stmt = $con->prepare('SELECT * FROM clinics WHERE id = ?');
        $stmt->execute(array($id));
        $row = $stmt->fetch();

        $this->arabname = $row['arabname'];
        $this->engname = $row['engname'];
        $this->name = getLang($this->arabname, $this->engname);
        $this->image = IMAGES_PATH . "clinics/" . $row['image'];

    }


    public function edit($arabname, $engname, $newImage = false, $noImage = null, $extension = null)
    {
        global $con;

        if (!$newImage){
            $stmt = $con->prepare('UPDATE clinics SET arabname = ?, engname = ? WHERE id = ?');
            $stmt->execute(array($arabname, $engname, $this->id));
        } else {
            $image = $noImage . "." . $extension;

            $stmt = $con->prepare('UPDATE clinics SET arabname = ?, engname = ?, image = ? WHERE id = ?');
            $stmt->execute(array($arabname, $engname, $image, $this->id));
        }
    }

    public static function getAll()
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM clinics");
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public static function getClinicsByLimit($limit)
    {
        global $con;

        $stmt = $con->prepare("SELECT * FROM clinics LIMIT 0, ?");

        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetchAll();
        $arr = array();
        $i = 0;
        foreach ($result as $row) {
            $arr[$i]['id'] = $row['id'];
            $arr[$i]['name'] = $row[getLang('arabname', 'engname')];
            $arr[$i]['image'] = IMAGES_PATH . 'clinics/' . $row['image'];
            $i++;
        }
        return $arr;
    }

    public static function addClinic($data)
    {
        global $con;

        $arabname = $data['arabname'];
        $engname = $data['engname'];
        $image = $data['image'];

        $stmt = $con->prepare("INSERT INTO clinics(engname, arabname, image) VALUE (?, ?, ?)");
        $stmt->execute(array($engname, $arabname, $image));
    }

    public static function updata($data, $isSetImage = false)
    {
        global $con;

        $id= $data['id'];
        $arabname = $data['arabname'];
        $engname = $data['engname'];

        if ($isSetImage){

        } else {
            $stmt = $con->prepare('UPDATE');
        }
    }

}