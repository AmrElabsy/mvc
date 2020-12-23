<?php

class Language
{
    public static function setArabic() {
        $_SESSION['lang'] = "arabic";
    }

    public static function setEnglish() {
        $_SESSION['lang'] = "english";
    }

    public static function getLanguage() {
        if ( isset( $_SESSION['lang'] ) ) {
            return $_SESSION['lang'];
        } else {
            return "arabic";
        }
    }

    public static function isArabic() {
        if ( self::getLanguage() == 'arabic' ) {
            return true;
        } else {
            return false;
        }
    }

    public static function isEnglish() {
        if ( self::getLanguage() == 'english' ) {
            return true;
        } else {
            return false;
        }
    }

    public static function directionIsLtr() {
        return self::isEnglish();
    }

    public static function directionIsRtl() {
        return self::isArabic();
    }
}