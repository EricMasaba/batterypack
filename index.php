<?php
    require_once "__appconfig.php";
    require_once "__pageconfig.php";
    session_start();
    require_once("class.user.php");
    $login = new USER();

    if($login->is_loggedin()!="")
    {
        $login->redirect($commandands['book']['url']);
    }

    if(isset($_POST['btn-login']))
    {
        $uname = strip_tags($_POST['txt_uname_email']);
        $umail = strip_tags($_POST['txt_uname_email']);
        $upass = strip_tags($_POST['txt_password']);
            
        if($login->doLogin($uname,$umail,$upass))
        {
            $login->redirect($commandands['book']['url']);
        }
        else
        {
            $error = "Wrong Details !";
        }   
    }
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
    <title>Neales::</title>
</head>

    <body>
        <?php include "inc/navigation.php"; ?>

        <div id="wrapper"><!-- wrapper -->

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
                    <input type="text" class="form-control" name="txt_uname_email" placeholder="mobile number or E mail ID" required />
                    <span id="check-e"></span>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
                </div>

                <hr />

                <div class="form-group">
                    <button type="submit" name="btn-login" class="btn btn-default">
                        <i class="fa fa-sign-in"></i>&nbsp; LOG IN
                    </button>
                </div>
                <br />
                <label>Don't have account yet?
                    <a href="<?=$commandands['signup']['url']?>" class="btn btn-primary" name="btn-signin">
                        <i class="fa fa-envira" aria-hidden="true"></i>&nbsp;SIGN UP
                    </a>
                </label>
            </form>

        </div>

    </div>

        </div><!-- end wrapper -->

        <?php include "inc/footer.php"; ?>
        <?php include "inc/end_header.php"; ?>
    </body>
</html>

