<?php
    require_once "__appconfig.php";
    require_once "__pageconfig.php";
    session_start();
    require_once("class.user.php");
    $login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect($commandands['home']['url']);
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect($commandands['home']['url']);
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include "inc/header.php"; ?>
    <link rel="stylesheet" href="css/signinform.css" type="text/css" /> 

    <title>Neales DRT ::</title>
</head>

<body>

    <div class="signin-form">

        <div class="nealescontainer">

            <form class="form-signin" method="post" id="login-form">

                <h2 class="form-signin-heading">Sign In</h2>
                <hr />

                <div id="error">
                    <?php if(isset($error)) { ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;
                        <?php echo $error; ?> !
                    </div>
                    <?php } ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
                    <span id="check-e"></span>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
                </div>

                <hr />

                <div class="form-group">
                    <button type="submit" name="btn-login" class="btn btn-default">
                        <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
                    </button>
                </div>
                <br />
                <label>Don't have account yet?
                    <a href="signup.php" class="btn btn-primary" name="btn-signin">
                        <i class="fa fa-envira" aria-hidden="true"></i>&nbsp;SIGN UP
                    </a>
                </label>
            </form>

        </div>

    </div>

</body>

</html>
