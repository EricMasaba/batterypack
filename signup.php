<?php
	require_once "__appconfig.php";
	require_once "__pageconfig.php";
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
				$error[] = "provide mobile number !";	
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
						$error[] = "sorry mobile number already taken !";
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
		<?php 
			$pageName = FIRM_NAME."::Signup";
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
			                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='<?=$commandands['index']['url']?>'>login</a> here
			                </div>
			                <?php } ?>
			                <div class="form-group">
			                    <input type="text" class="form-control" name="txt_uname" placeholder="Enter mobile number" />
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
			                    <a href="<?=$commandands['index']['url']?>" class="btn btn-success" name="btn-signin">
			                        <i class="fa fa-envira" aria-hidden="true"></i>&nbsp;SIGN IN
			                    </a>
			                </label>

			            </form>
			        </div>
			    </div>

				</div><!-- end wrapper -->

				<?php include "inc/footer.php"; ?>
			</body>
		</html>

