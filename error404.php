<?php
    require_once ("__appconfig.php");
    require_once ("__pageconfig.php");
    require_once("class.core.php");
    $pageName="Error 404";
?>
<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <?php include "inc/header.php"; ?>
        <?php include "inc/responsiveGridSystem.php"; ?>
        <title><?=$pageName?></title>
    </head>

    <body>
            <?php include "inc/navigation.php"; ?>

        <div class="wrapper"><!-- wrapper -->
  
            <?php //include "inc/navigation.php"; ?>

            <div id="section1">
                <h1>404</h1>
            </div>

            <div class="clearfix"></div>

        </div><!-- end wrapper -->

        <?php include "inc/footer.php"; ?>
        <?php include "inc/end_header.php"; ?>

    </body>
</html>

