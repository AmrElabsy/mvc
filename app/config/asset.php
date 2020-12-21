<?php

class Asset
{
    public static $cssInstance = null;
    public static $jsInstance = null;

    private $cssFiles = [];
    private $jsFiles = [];


    private function __construct() {

    }

    public static function getCss() {
        if ( self::$cssInstance == null ) {
            self::$cssInstance = new Asset();
        }
        return self::$cssInstance;
    }

    public static function getScripts() {
        if ( self::$jsInstance == null ) {
            self::$jsInstance = new Asset();
        }
        return self::$jsInstance;
    }

    public function addCss( $cssFile ) {
        $this->cssFiles[] = $cssFile;
    }

    public function addJs($jsFile) {
        $this->jsFiles[] = $jsFile;
    }

}