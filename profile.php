<?php
	require_once("session.php");
	require_once("class.user.php");
	$auth_user = new USER();
	$user_id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM logins WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    $pageName = $userRow['user_name'];
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

        <div id="wrapper"><!-- wrapper -->

            <div class="container-fluid" style="margin-top:60px;">
                <div class="container">

                    <label class="h5">Welcome <?=$userRow[ 'user_name']?></label>
                    <hr />

                    <h2>
                        <a href="<?=$commands['home']?>"<i class="fa fa-home"></i></span> home</a>
                        &nbsp; 
                        <a href="<?=$commands['profile']?>"><i class="fa fa-user"></i></span> profile</a>
                    </h2>
                    <hr />

                    <p class="h4">Your Settings</p>
                    <p style="height:300px;"></p>

                 </div>
            </div>

        </div><!-- end wrapper -->

        <?php include "inc/footer.php"; ?>

    </body>
</html>