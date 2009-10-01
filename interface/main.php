<?php

	$app;

	include_once("../TaskStore.class.php");
	include_once("../app.class.php");
	include("../utils.php");

	$app = getAPP();
	$db = $app->getDB();
	
	$taskStore = new TaskStore($db);
	$tasks = $taskStore->getTasks();
	


function fillDiv($t)
{
	$new_week = false;
	$prev = null;

	foreach($t as $task)
	{
		
		if ($prev != $task->getWeek())
		{
			echo "<div id='".$prev."'>";
			$new_week = true;
		}
		
		($task->getUser() == null) ? $u = "None" : $u = $task->getUser()->getName();
		
		echo "<button type='button'>".$task->getName()."<br>User: ".$u."</button>";
		$prev = $task->getWeek();
		
		if ($prev == $task->getWeek() && $new_week)
		{
			echo "</div>";
			$new_week = false;
		}
	}
}

?>

<head>
	<script src="UtilJavaScript.js"></script>
</head>

<html>

	<div id="messages"></div>
	<button type="button" onClick="addWeek();">Add Week</button>
	<div id="weeks">
	<?php
	
		fillDiv($tasks);
	
	?>
	</div>
</html>
