<?php

	include_once("../DebtStore.class.php");
	include_once("../UserStore.class.php");
	include_once("../utils.php");

	$user1 = $_GET['user1'];
	$user2 = $_GET['user2'];
	$amount = $_GET['amount'];
	$description = $_GET['desc'];

	$app = getAPP();
	
	$debtStore = new DebtStore($app->getDB());
	$id = $debtStore->addDebt($user1, $user2, $amount, $description);
	
	echo "<ul class='menu'>";
	echo "<li id='".$id."' onClick=\"debtPayed(".$id.");\">".$user1." ---> ".$user2." : ".$amount."<br>Description: ".$description."</li>";
	echo "</ul>";
?>
