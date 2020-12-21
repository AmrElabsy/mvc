<?php

/** ************** **/
/** Head Functions **/
/** ************** **/
/* Function To put The Title in The Tab */
/* Needs the variable $title to be assigned */
function getTitle()
{
    global $title;
    if (isset($title)) {
        echo $title;
    }
}

/* Function to set class .active in the nav */
/* Needs the variable $page to be assigned and called in the nav */
function setActive($pageName)
{
    global $page;
    if ($page == $pageName) {
        echo "active";
    }
}

/** ****************** **/
/** Language Functions **/
/** ****************** **/

/* Function to change the Language of the sentence. */
/* The First Argument is the Arabic Word to return. */
/* The Second Argument is the English one to return. */
function getLang($arab, $eng)
{
    if (!isset($_SESSION['lang'])) {
        return $arab;
    } else {
        if ($_SESSION['lang'] == "arabic") {
            return $arab;
        } else {
            return $eng;
        }
    }
}

/* Function returns True or False */
function isArabic()
{
    if (!isset($_SESSION['lang'])) {
        return true;
    } else {
        if ($_SESSION['lang'] == 'arabic'){
            return true;
        } else {
            return false;
        }
    }
}

/* Function returns True or False */
function isEnglish()
{
    if (!isset($_SESSION['lang'])) {
        return false;
    } else {
        if ($_SESSION['lang'] == 'english'){
            return true;
        } else {
            return false;
        }
    }
}

function setArabic()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['lang'] = 'arabic';
}

function setEnglish()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['lang'] = 'english';
}


/** ************************** **/
/** Password Hashing Functions **/
/** *************************  **/

/* Function to set hashed value of given password */
/* The Argument is the Password wanted to be hashed */
/* The return is an Associative array */
/* ['pass'] ==> is the hashed value of the password and salt */
/* ['salt'] ==> is the salt to be added in a separate column */
function setHashed($pass)
{
    $salt = substr(md5(mt_rand()), 0, 10);
    $pass = $pass . $salt;
    $hashed = sha1($pass);
    $arr = array(
        'pass' => $hashed,
        'salt' => $salt
    );

    return $arr;
}

/* Function to return hashed value of gives password and salt */
/* The first Argument is the password the user typed */
/* The Second Argument is the salt from database */
/* It returns the result of the hashed password the should be already stored in database */
function getHashed($pass, $salt)
{
    $myPass = $pass . $salt;
    $result = sha1($myPass);
    return $result;
}


/** ************************* **/
/** Image Uploading Functions **/
/** ************************  **/

/* Function that returns the extension of the image */
/* The Argument is the image from $_FILES */
/* If there's no uploaded image it returns False  */
function imageExtension($image)
{
    if (!empty($image['name'])){
        $name = $image['name'];
        $arr = explode('.', $name);
        $end = end($arr);
        return strtolower($end);
    }
    return false;
}


/* Function that uploads an Image */
/* The First Argument is the folder to be uploaded into */
/* The Second Argument is the number of the Image */
/* The number of the image is its name which is set from the last image in database */
/* The Third Argument is the image from $_FILES */

/* It returns on of three Values */
/* 'success' in case of no errors at all */
/* 'not extension' in case of not allowed extension */
/* 'no image' in case of the user didn't upload an image */
function uploadImage($folder, $number, $image)
{
    if (!empty($image['name'])) {
        $imgName = $image['name'];
        $tmpName = $image['tmp_name'];

        $allowedExtentions = array('jpeg', 'jpg', 'png' , 'gif');
        $name = $imgName;
        $arr = explode('.', $name);
        $end = end($arr);
        $extension = strtolower($end);
        if (in_array($extension, $allowedExtentions)) {
            $destination = IMAGES_PATH . $folder. "/" . $number . "." . $extension;
            move_uploaded_file($tmpName, $destination);
            return 'success';
        } else {
            return 'not extension';
        }
    }
    return 'no image';
}


/** ********************************************** **/
/** Functions of Server actions and authentication **/
/** ********************************************** **/

/* function to redirect to a specific path */
/* if the argument is not set, then the function redirects to home page */
/* Special cases: */
/* 'self' ==> the same page */
/* 'back' ==> the page that user comes from before that page */
function redirect($path = '/mvc')
{
    if ($path == 'back') {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } elseif ($path == 'self'){
        header('location: ' . $_SERVER['REQUEST_URI']);
    } else {
        header('location: /mvc/' . $path);
    }
    exit();
}

function path( $path = "" ) {
    return BASE_URL . $path;
}

function asset($file = "") {
    return STATIC_PATH . $file;
}

function isPatient()
{
    return isset($_SESSION['pat_id']);
}

function isDoctor()
{
    return isset($_SESSION['doc_id']);
}

function isAdmin()
{
    return isset($_SESSION['admin_id']);
}

function isReceptionist()
{
    return isset($_SESSION['rec_id']);
}

function getID()
{
    if (isPatient()) {
        return $_SESSION['pat_id'];
    }

    if (isDoctor()) {
        return $_SESSION['doc_id'];
    }

    if (isReceptionist()) {
        return $_SESSION['rec_id'];
    }
}

function isVisitor()
{
    return !(isDoctor() || isPatient() || isAdmin() || isReceptionist());
}
