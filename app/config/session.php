<?php

    class Session
    {
        private static $user;

        public static function userId() {
            if ( isset ( $_SESSION['id'] ) ) {
                return $_SESSION['id'];
            } else {
                return null;
            }
        } 
        public static function User($key = null) {
            if ( session::userId() ) {
                self::$user = new userModel( session::userId() );
                if ($key == null) {
                    return self::$user;
                } else {
                    return self::UserKey($key);
                }
            } else {
                return null;
            }
        }

        public static function setTempSession($id) {
            $_SESSION['tempSession'] = $id;
        }

        public static function isSetTemp() {
            return isset( $_SESSION['tempSession'] );
        }

        public static function getTemp() {
            return $_SESSION['tempSession'];
        }

        public static function signIn($id) {
            $_SESSION['id'] = $id;
        }

        private static function UserKey($key) {
            $key = "get" . ucfirst($key);
            return self::$user->$key();
        }

    }