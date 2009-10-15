<?php

include_once("app.class.php");

function getAPP()
{
	$app = null;

	session_start();
	if (!isset($_SESSION['appblah3']))
	{
		$app = new App;
		$_SESSION['appblah3'] = $app;
	}
	else
	{
		$app = $_SESSION['appblah3'];
	}
	
	return $app;
}

function getTaskName($i)
{
	switch ($i)
	{
		case '1':
			$name = "Bathroom";
		break;
		case '2':
			$name = "Toilet";
		break;
		case '3':
			$name = "Kitchen";
		break;
		case '4':
			$name = "Corridor";
		break;
		default:
			$name = null;
		break;
	}
	return $name;
}

?>
