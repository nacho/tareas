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
		$user = null;
		
		$result = $this->dbQuery("SELECT * FROM user WHERE name='".$name."' AND ".
					 "pass='".$pass."'");
	
		$r = $this->getResult();
		
		if ($r != null)
		{
			$user = new User($r['name'], $r['pass'], $r['email']);
		}
		
		
		return $user;
	}
	
	public function getUserFromID($id)
	{
		$user = null;
		
		$r = $this->dbQuery("SELECT * FROM user WHERE id='".$id."'");
		
		$result = $this->getResult();
		
		if ($result != null)
		{
			$user = new User($result['name'], $result['pass'], $result['email']);
		}
		
		return $user;
	}
}

?>
