<?php

	include_once("../DebtStore.class.php");
	include_once("../utils.php");

	$debtId = $_GET['debtId'];

	$app = getAPP();
	$debtStore = new DebtStore($app->getDB());

	$debtStore->debtPayed($debtId);
	
	echo "selected";
?>
