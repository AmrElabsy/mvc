<!DOCTYPE html>
<html>
<head>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php getTitle() ?></title>

    <?php Asset::linkCssFiles(); ?>

</head>
<body data-sidebar="dark">
     <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
    <?php if(Auth::is("Admin")): ?>
    <div id="layout-wrapper">
            
    <?php endif; ?>

            
   