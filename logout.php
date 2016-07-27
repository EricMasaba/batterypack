<?php
	require_once "__appconfig.php";
	require_once "__pageconfig.php";
	require_once('session.php');
	require_once('class.user.php');

	$user = new USER();

	if($user->is_loggedin()!="")
	{
		$user->redirect($commandands['home']['url']);
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user->doLogout();
		$user->redirect($commandands['index']['url']);
	}
