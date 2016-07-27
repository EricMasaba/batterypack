<?php
  require_once ("__appconfig.php");
  require_once ("__pageconfig.php");
  require_once("class.core.php");
  require_once("class.user.php");
  require_once("session.php");
  //session_start();
  $auth_user = new USER();
  $user_id = $_SESSION['user_session'];
  $stmt = $auth_user->runQuery("SELECT * FROM logins WHERE user_id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  $debug = (isset($_GET['debug']) && !empty($_GET['debug'])) ? max(1, intval($_GET['debug'])) : 0;
?>
<!DOCTYPE html>
<html>
  <head>
      <?php include "inc/head.php"; ?>
      <?php // include "inc/responsiveGridSystem.php"; ?>      
      <?php googleAnalytics(GOOGLE_TRACKING_ID); ?>
      <?php pcaPredict(PCAPREDICT_KEY); ?>
      <title>Book::<?php print($userRow['user_name']); ?></title>

      <script>
	      function jimmykrankie(){
	      	console.log("Sturgeon");
	      }
      </script>
  </head>

	<body>

		 <?php
		      $list = [
		          "//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js",
		          "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js",
		          "js/jquery-ui.js",
		          "js/jquery.postcodes.min.js",
		          "js/jquery.timepicker.js",
		          "js/simplecounter.js",
		          "js/mapGeoloc.js",
		          "js/book5listeners.js",
		          googleMapsAPI(GOOGLE_MAPS_KEY)."&callback=jimmykrankie"
		          //"https://maps.googleapis.com/maps/api/js?key=AIzaSyCf6bDITip0oOGgF8H134MTqs8W5CVtSkg&callback=pol"          
		      ];

		      addScripts($list);
		  ?>

	</body>
</html>