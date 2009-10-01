<?php

include_once("app.class.php");

function getAPP()
{
	$app = null;

	session_start();
	if (!isset($_SESSION['app2']))
	{
		$app = new App;
		$_SESSION['app'] = $app;
	}
	else
	{
		$app = $_SESSION['app'];
	}
	
	return $app;
}

?>
