<?php 

class Request {
    public static function post($key, $filterType = "string") {
        $var = $_POST[$key];
        if ( is_array( $var ) ) {
            return self::filterArray($var, $filterType);
        } else {
            return self::filter($var, $filterType);
        }
    }

    public static function get($key, $filterType = "string") {
        $var = $_GET[$key];
        return self::filter($var, $filterType);
    }

    public static function files( $key, $type = null ) {
        if ( $type == null ) {
            return $_FILES[$key];
        }
    }

    private static function filter($var, $filterType) {
        switch ( $filterType ){
            case "string":
                $var = filter_var($var, FILTER_SANITIZE_STRING);
            break;
            
            case "email":
                $var = filter_var($var, FILTER_SANITIZE_EMAIL);
            break;

            default:
                $var = filter_var($var, FILTER_SANITIZE_STRING);

        }
        return $var;
    }

    private static function filterArray($array, $filterType) {
        $output = [];
        foreach ( $array as $var ) {
            $output[] = self::filter($var, $filterType);
        }
        return $output;

    }

    public static function isPost() {
        if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
            return true;
        }
        return false;
    }

    public static function isGet() {
        if ( $_SERVER['REQUEST_METHOD'] == "GET" ) {
            return true;
        }
        return false;
    }
}