<?php

    class Session
    {
        private static $user;

        public static function userId() {
            // return 1;
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

        private static function UserKey($key) {
            $key = "get" . ucfirst($key);
            return self::$user->$key();
        }


    }