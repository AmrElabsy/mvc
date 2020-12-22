<?php

class Redirect
{
    public static function back() {
        $path = $_SERVER['HTTP_REFERER'];
        self::to($path);
    }

    public static function self() {
        $path = $_SERVER['REQUEST_URI'];
        self::to($path);
    }

    public static function home() {
        $path = BASE_URL;
        self::to($path);
    }

    public static function to($path) {
        header("Location: " . $path);
        exit();
    }
}