<?php

	include_once("../TaskStore.class.php");
	include_once("../UserStore.class.php");
	include_once("../utils.php");

	$user = $_GET['user'];
	$week = $_GET['week'];
	$task = $_GET['task'];

	$app = getAPP();
	$taskStore = new TaskStore($app->getDB());

	if ($taskStore->weekHasUser($week, $user))
		echo "User already exists";
	else
	{
		$taskStore->modifyTask($user, $week, $task);
		
		echo "<li id='".$task.$week."' class='selected'><b>".$task."<br>User: ".$user."</b></li>";
	}
?>
