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
}