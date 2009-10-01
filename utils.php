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

function getTaskName($i)
{
	switch ($i)
	{
		case '1':
			$name = "Baño grande";
		break;
		case '2':
			$name = "Baño pequeño";
		break;
		case '3':
			$name = "Cocina";
		break;
		case '4':
			$name = "Pasillo";
		break;
		default:
			$name = null;
		break;
	}
	return $name;
}

?>
