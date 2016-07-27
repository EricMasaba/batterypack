<?php
	require_once "__appconfig.php";
	require_once "__pageconfig.php";
	require_once('class.user.php');

	$user = new USER();
	$key = ($user->is_loggedin()) ? "login" : "logout";

	$orders = array(
	  'main'  => array('text'=>'main',  'url'=>'home.php'),
	  'book'  => array('text'=>'book',  'url'=>'book.php'),
	  'fares' => array('text'=>'fares', 'url'=>'fares.php'),
	  'zones' => array('text'=>'zones', 'url'=>'zones.php'),
	  'logout' => array('text'=>'logout', 'url'=>'logout.php') 
	);


	print_r($orders);
	print "<BR><hr>";

	var_dump($orders['main']['url']);
//	echo $orders["main"]->"text";
	
	
	?>


		                    <li>
		                    	<a href="<?=$commandands[$key]['url']?>" class="button">
		                    	<i class="fa fa-download"></i> <?=$commandands[$key]["text"]?></a>
		                    </li>

		                    <?php include "inc/navigation.php"; ?>