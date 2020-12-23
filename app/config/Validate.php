<?php

class Validate 
{
    public static function is( $var, $validations, $noRedirect = false ) {
        if ( is_array( $validations ) ) {
            foreach( $validations as $validation ) {
                return self::is( $var, $validation, $noRedirect);
            }
        } else {
            if ( strpos( $validations, "|" ) === false ) {
                echo "";
            }


        }

    }
}