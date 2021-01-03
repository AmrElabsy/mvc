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
    $salt = generateSalt();
    $pass = $pass . $salt;
    $hashed = sha1($pass);
    $arr = array(
        'pass' => $hashed,
        'salt' => $salt
    );

    return $arr;
}

function generateSalt() {
    $salt = substr( md5( mt_rand() ), 0, 10 );
    return $salt;
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

function path( $path = "" ) {
    return BASE_URL . $path;
}

function asset($file = "") {
    return STATIC_PATH . $file;
}