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
		
		$this->dbQuery("SELECT * FROM user WHERE id='".$id."'");
		
		$result = $this->getResult();
		
		if ($result != null)
		{
			$user = new User($result['name'], $result['pass'], $result['email']);
		}
		
		return $user;
	}
	
	public function getIDFromName($name)
	{
		$id = null;
		
		$this->dbQuery("SELECT id FROM user WHERE name='".$name."'");
		
		$result = $this->getResult();
		
		if ($result != null)
		{
			$id = $result['id'];
		}
		
		return $id;
	}
	
	public function getUsers()
	{
		$users = array();
	
		$this->dbQuery("SELECT * FROM user");
		
		while ($r = $this->getResult())
		{
			$user = new User($r['name'], $r['pass'], $r['email']);
			array_push($users, $user);
		}
		
		return $users;
	}
}

?>
