<?php

    include "app/config/db.php";
    include "app/config/functions.php";

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
    define('CSS_PATH', "his/" .PUBLIC_PATH  . 'css/');
    define('JS_PATH',"his/" .PUBLIC_PATH . 'js/');
    define('JSON_PATH', "his/" .PUBLIC_PATH . 'json/');
    define('IMAGES_PATH', "his/" . PUBLIC_PATH . "images/");