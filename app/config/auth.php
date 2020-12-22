<?php

class Auth 
{
    private $user;

    public static function can($permission) {
        if (  Session::User() !== null ) {
            return Session::User()->hasPermission($permission);
        } else {
            return false;
        }
    }

    public static function is($role) {
        if (  Session::User() !== null ) {
            return Session::User()->hasRole($role);
        } else {
            return false;
        }
    }

    public static function SignIn() {
        if ( Session::isSetTemp() ) {
            Session::SignIn( Session::getTemp() );
        }
    }

    public static function isSignedIn() {
        return Session::User() !== null;
    }

    public static function logout() {
        unset($_SESSION['id']);
    }
}