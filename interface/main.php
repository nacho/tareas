<?php

	$app;

	include_once("../TaskStore.class.php");
	include_once("../DebtStore.class.php");
	include_once("../app.class.php");
	include_once("../utils.php");

	$app = getAPP();
	$db = $app->getDB();
	
	$taskStore = new TaskStore($db);
	$tasks = $taskStore->getTasks();
	$debtStore = new DebtStore($db);
	$debts = $debtStore->getDebts();

function fillDiv($global_user, $t)
{
	$new_week = false;
	$prev = null;
	$i = 0;

	while ($t[$i] != null)
	{
		$task = $t[$i];
		$is_user = false;

		if ($prev != $task->getWeek())
		{
			echo "<div class='week' id='".$task->getWeek()."'>\n";
			echo "<ul class='menu'>\n";
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
			echo "<li id='".$task->getName().$task->getWeek()."' class='".$c."' onClick=\"taskMade('".$global_user->getName()."', '".$task->getWeek()."', '".$task->getName()."');\"><b>".$task->getName()."<br>User: ".$user."</b></li>\n";
		else
			echo "<li id='".$task->getName().$task->getWeek()."' class='".$c."' onClick=\"taskMade('".$global_user->getName()."', '".$task->getWeek()."', '".$task->getName()."');\">".$task->getName()."<br>User: ".$user."</li>\n";
		
		if ($t[$i + 1] == null || $t[$i + 1]->getWeek() != $task->getWeek())
		{
			echo "</ul>\n";
			echo "</div>\n";
		}
		
		$prev = $task->getWeek();
		$i++;
	}
}

function fillDebts($d)
{
	$i = 0;
	
	while ($d[$i] != null)
	{
		$debt = $d[$i];
		$user1 = $debt->getUser1();
		$user2 = $debt->getUser2();
		
		echo "<div id='debt' class='debt'>";
		echo "<ul class='menu'>";
		
		($debt->getPayed() == true) ? $c = "selected" : "blah";
		
		echo "<li id='".$debt->getId()."' onClick=\"debtPayed(".$debt->getId().");\">".$user1->getName()." ---> ".$user2->getName()." : ".$debt->getAmount()."<br>Description: ".$debt->getDescription()."</li>";
		
		echo "</ul>";
		echo "</div>";
		
		$i++;
	}
}

function fillUsers($users)
{
	foreach($users as $user)
	{
		echo "<option value='".$user->getName()."'>".$user->getName()."</option>";
	}
}

function createDebtForm($db)
{
	$userStore = new UserStore($db);
	
	$users = $userStore->getUsers();
	
	echo "<select id='debtUser1'>";
	fillUsers($users);
	echo "</select>";
	
	echo "<select id='debtUser2'>";
	fillUsers($users);
	echo "</select>";
	
	echo "<input type='text' id='debtAmount' value='' />";
	echo "<input type='text' id='debtDescription' value='' />";
	
	echo "<button type='button' onClick='addDebt();'>Add debt</button>";
}

?>

<head>
	<link rel="stylesheet" type="text/css" href="tasks.css">
	<script src="UtilJavaScript.js"></script>
</head>

<html>
	<body>
		<div id="title">
			<img src="title.png">
		</div>
		<div id="messages"></div>
		<div id="weeks">
			<button type="button" onClick="addWeek();">Add Week</button>
			<?php
			
				fillDiv($app->getUser(), $tasks);
			
			?>
		</div>
		<div id="debts">
			<div id="formDebt">
				<?php
				
					createDebtForm($db);
				
				?>
			</div>
			<div id='debts'>
				<?php
				
					fillDebts($debts);
				
				?>
			</div>
		</div>
	</body>
</html>
