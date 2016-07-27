<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect($commandands['home']['url']);
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "provide username !";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM logins WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($uname,$umail,$upass)){	
					$user->redirect($commandands['signup']['url']);
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php include "inc/header.php"; ?>
		<link rel="stylesheet" href="css/signinform.css" type="text/css" />	
		<title>Neales DRT:Sign up</title>
	</head>

	<body>

	    <div class="signin-form">

	        <div class="nealescontainer">

	            <form autocomplete="off" method="post" class="form-signin">
	                <h2 class="form-signin-heading">Sign up.</h2>
	                <hr />
	                <?php if(isset($error)) { foreach($error as $error) { ?>
	                <div class="alert alert-danger">
	                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;
	                    <?php echo $error; ?>
	                </div>
	                <?php } } else if(isset($_GET[ 'joined'])) { ?>
	                <div class="alert alert-info">
	                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
	                </div>
	                <?php } ?>
	                <div class="form-group">
	                    <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" />
	                </div>

	                <div class="form-group">
	                    <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" />
	                </div>

	                <div class="form-group">
	                    <input autocomplete="off" type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
	                </div>

	                <div class="clearfix"></div>
	                <hr />

	                <div class="form-group">
	                    <button type="submit" class="btn btn-primary" name="btn-signup">
	                        <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
	                    </button>
	                </div>
	                <br />

	                <label>Have an account !
	                    <a href="index.php" class="btn btn-success" name="btn-signin">
	                        <i class="fa fa-envira" aria-hidden="true"></i>&nbsp;SIGN IN
	                    </a>
	                </label>

	            </form>
	        </div>
	    </div>

	    </div>


    <script src="assets/js/jquery-1.11.3-jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	</body>

</html>
