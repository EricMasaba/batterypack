<?php 
    require_once ("__appconfig.php");
    require_once ("__pageconfig.php");
    require_once("class.user.php");
    session_start(); 
    require_once("class.core.php");

	$pageName="Neales::Home"; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>
	    <?php include "inc/header.php"; ?>
		<?php include "inc/responsiveGridSystem.php"; ?>
		<?php googleAnalytics(GOOGLE_TRACKING_ID); ?>
		<?php pcaPredict(PCAPREDICT_KEY); ?>		
		<link rel="stylesheet" type="text/css" href="css/zones.css">
		<title><?=$pageName?></title>
	</head>

	<body>
	    <div class="wrapper">

			<?php include "inc/navigation.php"; ?>

			<div id="section1">
				<h1>Neales Zones</h1>
			</div>
			<div id="map"></div>

		</div><!-- end wrapper -->

		<?php include "inc/footer.php"; ?>
		<?php include "inc/end_header.php"; ?>

		<script>
        $(document).ready(function() {
            appMaster.preLoader();
            appMaster.maps();
        });
        </script>

	</body>

</html>


