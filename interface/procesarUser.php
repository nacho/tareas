<?php
	$app;

	include_once("../UserStore.class.php");
	include_once("../app.class.php");
	include("../utils.php");
	
	$app = getAPP();
	$db = $app->getDB();
	
	$store = new UserStore($db);

	$user = $store->checkUser($_POST['name'], $_POST['pass']);

	if ($user != null)
	{
		$app->setUser($user);
		header("Location: week.php");
		exit;
	}
?>

<html>
<body>
	<?php
		if ($user == null)
		{
			echo "<h1>ERROR: el usuario es incorrecto</h1>";
		}
	?>
</body>
</html>
