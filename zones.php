<?php 
	require_once ("__appconfig.php");
	require_once ("__pageconfig.php");
	require_once("class.core.php");
	session_start(); 
	require_once("class.user.php");
	$pageName="Neales::Zones"; 
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
		<link rel="stylesheet" type="text/css" href="css/zones.css">
		<?php googleAnalytics(GOOGLE_TRACKING_ID); ?>
		<?php pcaPredict(PCAPREDICT_KEY); ?>			
		<title><?=$pageName?></title>
	</head>

	<body>

		<style type="text/css">
			#map 	  {  width:100%;  min-height:900px; margin: 0;}
			#section1 { margin-top:55px;  }
		</style>

	    <div class="wrapper">

			<?php include "inc/navigation.php"; ?>

			<div id="section1">
				<h1>Neales Zones</h1>
			</div>
			<div id="map"></div>

		</div><!-- end wrapper -->

		<?php include "inc/footer.php"; ?>
		<?php include "inc/end_header.php"; ?>
		<?php //include "inc/zones(EH).php"; ?>

<!-- 
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCf6bDITip0oOGgF8H134MTqs8W5CVtSkg"></script>

		 <script src="js/zones.js"></script>

 -->		<script>
        $(document).ready(function() {
            appMaster.preLoader();
            appMaster.maps();
        });
        </script>

	</body>

</html>


