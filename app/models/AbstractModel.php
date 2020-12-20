<?php

class AbstractModel
{
    protected $id;
    protected static $tableName;

    public static function getCount()
    {
        global $con;

        $stmt = $con->prepare("SELECT COUNT(*) FROM " . static::$tableName);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public static function isFound($column, $value)
    {
        global $con;

        $stmt = $con->prepare("SELECT * FROM " . static::$tableName . " WHERE " . $column . " = ?");
        $stmt->execute(array($value));
        $count = $stmt->rowCount();

        return $count > 0 ? true : false;
    }

    public static function getNewImageNumber()
    {
        global $con;
        $stmt = $con->prepare('SELECT image FROM ' . static::$tableName . ' ORDER BY CAST(image as int) DESC LIMIT 1');
        $stmt->execute();
        $row = $stmt->fetch();
        $oldImage = $row['image'];
        $image = explode(".", $oldImage);
        $imageNo = $image[0];
        $newImage = $imageNo + 1;

        return $newImage;
    }

    public static function isValidSignIn($name, $pass) {
        global $con;

        $stmt = $con->prepare('SELECT * FROM ' . static::$tableName . ' WHERE name = ?');
        $stmt->execute( [$name] );
        $count = $stmt->rowCount();

        if ($count > 0) {
            $row = $stmt->fetch();
            $salt = $row['salt'];

            $hashed = getHashed($pass, $salt);

            $stmt = $con->prepare('SELECT * FROM ' . static::$tableName . ' WHERE name = ? AND password = ?');
            $stmt->execute( [$name, $hashed] );
            $row = $stmt->fetch();
            $count = $stmt->rowCount();
            if ($count > 0) {
                Session::setTempSession($row['id']);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getSignInErrorMsg( $name ) {
        global $con;

        $stmt = $con->prepare('SELECT name FROM ' . static::$tableName . ' WHERE name = ?');
        $stmt->execute( [$name] );
        $count = $stmt->rowCount();

        if ($count > 0) {
            return "No User With Such a Name";
        } else {
            return "Wrong Password";
        }

    }

    public function getId() {
        return $this->id;
    }

}