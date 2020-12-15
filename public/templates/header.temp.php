<!DOCTYPE html>
<html>
<head>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php getTitle() ?></title>
    <link rel="shortcut icon" href="public/images/public/favicon.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>bootstrap.english.css">
    <?php
    $arabic = '<link rel="stylesheet" type="text/css" href="' . CSS_PATH . 'bootstrap.arabic.css">';
    echo getLang($arabic, "");
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>all.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH . getLang("style-ar.css","style-en.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>print.css">
</head>
<body>

