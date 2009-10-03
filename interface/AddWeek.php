<?php

	include_once("../app.class.php");
	include_once("../TaskStore.class.php");
	include_once("../utils.php");

	//get the q parameter from URL
	$q = $_GET["q"];
	
	$app = getAPP();
	$store = new TaskStore($app->getDB());
	
	echo "<ul class='menu'>";
	for ($i = 1; $i < 5; $i++)
	{
		$task = new Task(getTaskName($i), $q);
		$store->addTask($task);
		
		echo "<li id='".$task->getName()."' onClick='taskMade();>".$task->getName()."<br>User: None </li>";
	}
	echo "</ul>";
?>
