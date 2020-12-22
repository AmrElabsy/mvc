<?php

class Asset
{
    private static $cssFiles = [];
    private static $jsFiles = [];

    public static function addCss( $cssFirstFile, $cssSecondFile = null, $condition = true ) {
        if ( $condition ) {
            if ( is_array( $cssFirstFile ) ) {
                foreach ( $cssFirstFile as $file ){
                    self::addCss( $file );
                }
            } else {
                self::$cssFiles[] = $cssFirstFile;
            }
        } else {
            self::addCss($cssSecondFile);
        }
    }

    public static function addJs($jsFirstFile, $jsSecondFile = null, $condition = true) {
        if ( $condition ) {
            if ( is_array( $jsFirstFile ) ) {
                foreach ( $jsFirstFile as $file ){
                    self::addjs( $file );
                }
            } else {
                self::$jsFiles[] = $jsFirstFile;
            }
        } else {
            self::addJs( $jsSecondFile );

        }
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