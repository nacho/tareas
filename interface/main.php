<?php

	$app;

	include_once("../TaskStore.class.php");
	include_once("../app.class.php");
	include_once("../utils.php");

	$app = getAPP();
	$db = $app->getDB();
	
	$taskStore = new TaskStore($db);
	$tasks = $taskStore->getTasks();


function fillDiv($global_user, $t)
{
	$new_week = false;
	$prev = null;

	foreach($t as $task)
	{
		$is_user = false;

		if ($prev != $task->getWeek())
		{
			echo "<div class='week' id='".$task->getWeek()."'>";
			echo "<ul class='menu'>";
			$new_week = true;
		}
		
		if ($task->getUser() == null)
		{
			$user = "None";
			$c = "no-user";
		}
		else
		{
			$user = $task->getUser()->getName();
			$c = "selected";
			if ($user == $global_user->getName())
			{
				$is_user = true;
			}
		}
		
		if ($is_user == true)
			echo "<li class='".$c."'><b>".$task->getName()."<br>User: ".$user."</b></li>";
		else
			echo "<li class='".$c."'>".$task->getName()."<br>User: ".$user."</li>";
		$prev = $task->getWeek();
		
		if ($prev != $task->getWeek() && $new_week)
		{
			echo "</ul>";
			echo "</div>";
			$new_week = false;
		}
	}
}

?>

<head>
	<link rel="stylesheet" type="text/css" href="tasks.css">
	<script src="UtilJavaScript.js"></script>
</head>

<html>
	<body>
		<div id="messages"></div>
		<button type="button" onClick="addWeek();">Add Week</button>
		<div id="weeks">
		<?php
	
			fillDiv($app->getUser(), $tasks);
	
		?>
		</div>
	</body>
</html>