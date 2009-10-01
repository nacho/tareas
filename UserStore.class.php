<?php

include_once("user.class.php");
include_once("Store.class.php");

class UserStore extends Store
{
	public function __construct($db)
	{
		parent::__construct($db);
	}
	
	# This returns an User or null if there is no user
	public function checkUser($name, $pass)
	{
		$result;
		$user;
		
		$result = $this->dbQuery("SELECT * FROM user WHERE name='".$name."' AND ".
					 "pass='".$pass."'");
	
		if ($result = false)
			$user = null;
		else
		{
			$r = $this->getResult();
			
			$user = new User($r['name'], $r['pass'], $r['email']);
		}
		
		return $user;
	}
	
	public function getUserFromID($id)
	{
		$r = $this->dbQuery("SELECT * FROM user WHERE id='".$id."'");
		
		if ($r = false)
			$user = null;
		else
		{
			$result = $this->getResult();
			$user = new User($result['nombre'], $result['pass'], $result['email']);
		}
		
		return $user;
	}
}

?>
