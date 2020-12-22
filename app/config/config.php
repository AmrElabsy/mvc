<?php
    define("BASE_URL", "/mvc/");
    
    require_once "app/config/db.php";
    require_once "app/config/functions.php";

    if (!isset($_SESSION['lang'])) {
        include "app/config/languages/arabic.php";
    } else {
        include "app/config/languages/" . $_SESSION['lang'] . ".php";
    }

    # Define Paths
    define('APP_PATH', "app/");
    define('PUBLIC_PATH', "public/");
    define('LANG_PATH', APP_PATH . 'config/languages/');
    define('TEMP_PATH', PUBLIC_PATH . "templates/");
    define('STATIC_PATH', "mvc/" . PUBLIC_PATH);
    define('CSS_PATH', STATIC_PATH  . 'css/');
    define('JS_PATH',STATIC_PATH . 'js/');
    define('JSON_PATH', STATIC_PATH . 'json/');
    define('IMAGES_PATH', STATIC_PATH . "images/");

    require_once "session.php";
    require_once "auth.php";
    require_once "Message.php";
    require_once "Redirect.php";
    require_once "request.php";
    require_once "asset.php";