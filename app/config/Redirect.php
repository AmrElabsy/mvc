<?php

class Redirect
{
    public static function back() {
        if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
            $path = $_SERVER['HTTP_REFERER'];
            self::to($path);
        } else {
            self::home();
        }
    }

    public static function self() {
        $path = $_SERVER['REQUEST_URI'];
        self::to($path);
    }

    public static function home() {
        $path = "";
        self::to($path);
    }

    public static function to($path) {
        header("Location: " . BASE_URL . $path);
        exit();
    }
}