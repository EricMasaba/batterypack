<?php

	require_once("session.php");
	require_once("class.user.php");
	$auth_user = new USER();
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM logins WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <?php include "inc/header.php"; ?>
      <link rel="stylesheet" href="css/signinform.css" type="text/css" />
      <title>Welcome - <?php print($userRow['user_name']); ?></title>
  </head>
  <body>

    <?php include "inc/navigation.php"; ?>
    <div class="clearfix"></div>
    <div class="container-fluid" sftyle="margin-top:80px;">
    	
        <div class="nealescontainer">
        
        	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
            <hr />
            
            <h3>
            <a href="home.php"><span class="glyphicon glyphicon-home"></span> home</a> &nbsp; 
            <a href="profile.php"><span class="glyphicon glyphicon-user"></span> profile</a></h1>
           	<hr />
            
            <p class="h4">User Home Page</p> 
           
            
        <p class="blockquote-reverse" style="margin-top:200px;">
        On Demand Travel.<br /><br />
        <a href="<?=$firmURL?>">Learn More</a>
        </p>
        
        </div>

    </div>

    <script src="assets/js/jquery-1.11.3-jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>