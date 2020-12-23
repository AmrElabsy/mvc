<?php

class ColorMode
{
    public static function setDark() {
        $_SESSION['colorMode'] = "dark";
    }

    public static function setLight() {
        $_SESSION['colorMode'] = "light";
        
    }

    public static function isDark() {
        if ( isset( $_SESSION['colorMode'] ) ) {
            return $_SESSION['colorMode'] == "dark";
        } else {
            return false;
        }
    }

    public static function isLight() {
        if ( isset( $_SESSION['colorMode'] ) ) {
            return $_SESSION['colorMode'] == "light";
        } else {
            return true;
        }
    }
}