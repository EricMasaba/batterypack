<?php
    require_once ("__appconfig.php");
    require_once ("__pageconfig.php");
    require_once("session.php");
    require_once("class.core.php");
    require_once("class.user.php");

	$auth_user = new USER();
	$user_id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM logins WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>
        <?php include "inc/head.php"; ?>
        <?php googleAnalytics(GOOGLE_TRACKING_ID); ?>
        <?php pcaPredict(PCAPREDICT_KEY); ?>
        <?php // include "inc/responsiveGridSystem.php"; ?>
        <title>Welcome - <?php print($userRow['user_name']); ?></title>	
    </head>

	<body>
        <?php include "inc/nav_main.php"; ?>

        <?php //include "inc/nav_main.php"; ?>

		<div id="wrapper"><!-- wrapper -->

            <p class="blockquote-reverse" style="display:none; margin-top:20px;"></p>
            <label class="h5">welcome : <?php print($userRow['user_name']); ?></label>

            <h5>
            <a class="button" href="<?=$commands['book']?>"><i class="fa fa-2x fa-book" aria-hidden="true"></i> Book</a> &nbsp; 
            <a class="button" href="<?=$commands['home']?>"><i class="fa fa-2x fa-home" aria-hidden="true"></i> Topup</a> &nbsp; 
            <a class="button" href="<?=$commands['profile']?>"><i class="fa fa-2x fa-user" aria-hidden="true"></i> Profile</a>
            </h5>
           	<hr />

            <p class="h4">User Home Page</p> 
                    
                <p class="blockquote-reverse" style="margin-top:200px;">
                On Demand Travel.<br /><br />
                <a href="<?=$commands['about']?>">Learn More</a>
                </p>

		</div><!-- end wrapper -->

        <?php include "inc/footer.php"; ?>
        <?php include "inc/end_header.php"; ?>

        <?php googleTagManager(GOOGLE_TAG_MANAGER);?>

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCf6bDITip0oOGgF8H134MTqs8W5CVtSkg"></script>
          <script src="js/zones.js"></script>

        <script>
        $(document).ready(function() {
            appMaster.preLoader();
            appMaster.maps();
        });
        </script>


	</body>
</html>
