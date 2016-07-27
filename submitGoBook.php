<?php 

//put in database

/*---------------
This handles submission requests from AJAX
*/
	include_once 'appconfig.php';
	include_once 'class.core.php';
	require_once 'class.MCAPI.php';

	var_dump(generateTrip());