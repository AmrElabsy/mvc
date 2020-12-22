<?php

class Asset
{
    private static $cssFiles = [];
    private static $jsFiles = [];

    public static function addCss( $cssFile ) {
        self::$cssFiles[] = $cssFile;
    }

    public static function addJs($jsFile) {
        self::$jsFiles[] = $jsFile;
    }

    public static function linkCssFiles() {
        foreach ( self::$cssFiles as $cssFile ) {
            echo "<link href=" . asset($cssFile) . " rel='stylesheet' type='text/css'/>\n";
        }
    }

    public static function linkJsFiles() {
        foreach ( self::$jsFiles as $jsFile ) {
            echo "<script src=" . asset($jsFile) . "></script>\n";
        }
    }

}