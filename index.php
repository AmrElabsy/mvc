<?php
    ob_start();
    session_start();
    include "app/config/config.php";

    # Configuration of The URL, to detect the 'Controller' and The 'Action'.
    $url = $_SERVER['REQUEST_URI'];

    $url = trim($url, "/");
    $url = explode("/", $url, 4);

    if ($url[0] == "mvc") {
        array_shift($url);
    }
    
    # Set The Value of $controller
    if (isset($url[0]) && $url[0] != "") {
        $controller = $url[0];
     } else {
        $controller = "home";
    }

    # Set The Value of $action
    if (isset($url[1]) && $url[1] != "") {
        $action = $url[1];
    } else {
        $action = "index";
    }

    # Set The value of $param
    # $param is an array
    if (isset($url[2])) {
        $param = explode("/", $url[2]);
    } else {
        $param = array();
    }


    # Check of The Controller and The Action are Available
    $notFound = "notfound";

    $file = "app/Controllers/" . $controller . "controller.php";
    if (!file_exists($file)) {
        $controller = $notFound;
    }


    include "app/Controllers/" . $controller . "controller.php";
    echo $action;
    if (!method_exists($controller, $action)) {
        $action = $notFound;
    }

    # Include any Model That We will use

    spl_autoload_register(function ($mdl){
        $modelFile = APP_PATH . "models/" . $mdl . ".php";
        include $modelFile;
    });

    # Execute The Action from The Controller
    $cont = new $controller();
    $cont->$action();

    ob_end_flush();