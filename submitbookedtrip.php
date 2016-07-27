<?php 
	date_default_timezone_set('UTC');
/*  ---------------
	This handles submission requests from AJAX, GET or POST.
	In the case of GET, arbitrary values are generated.
	From $_POST, an array is created with the submitted variables. it is important
*/
	require_once 'appconfig.php';
	include_once 'class.core.php';
	require_once 'class.MCAPI.php';

	$conn = "";
	$logName = "injectDB.log";
	$scriptName = "injectDB";
	$x = strtolower($_SERVER['REQUEST_METHOD']);
	echo sprintf("%s: %s<br><hr>","Server-Method",$x);

//	GET OR POST

	if ($x=="post"){
		$tripArray = [];
	    foreach ($_POST as $key => $value) {
		    $tripArray[$key] = $value;
		}
		var_dump($tripArray);
	} else {
		$tripArray = generateTrip();
	}

      $r = $tripArray["customer_unid"];
      $format = "\r%s (%s): - Adding trip %s to DB (context: %s)\n";
      $logMessage = sprintf($format,date("F j, Y, g:i a e O"), time(),$r,$_SERVER['REQUEST_METHOD']);

      error_log($logMessage,3,$logName);

	try {
	  $conn = new PDO('mysql:host=localhost;dbname='.$dbname, $username, $password);
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	  $statement = constructInsert($tripArray,"bookings"); // INSERT INTO `login` VALUES etc
      $stmt = $conn->prepare($statement);
      $stmt->execute();

      $r = $tripArray["unid"];
      $format = "\r%s (%s): - Added trip %s to DB (context: %s)\n";
      $logMessage = sprintf($format,date("F j, Y, g:i a e O"), time(),$r,$_SERVER['REQUEST_METHOD']);

	  error_log($logMessage,3,$logName);
      echo sprintf("%s\n<br>%s",$statement,$logMessage);

      $conn = NULL;

	} 
	catch(PDOException $e) {
		$output = sprintf("%s | %s",$scriptName, $e->getMessage() );
		error_log( $output,0);
		error_log( $output,3,$logName);
	  
	}
