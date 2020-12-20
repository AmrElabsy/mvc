<?php 

class Request {
    public static function post($key, $filterType = "string") {
        $var = $_POST[$key];
        return self::filter($var, $filterType);
    }

    public static function get($key, $filterType = "string") {
        $var = $_GET[$key];
        return self::filter($var, $filterType);
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
}