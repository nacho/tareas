<?php

include_once("db.class.php");

#doc
#	classname:	App
#	scope:		PUBLIC
#
#/doc

class App
{
	private $db;
	private $user;
	
	#	Constructor
	function __construct ()
	{
		$this->db = new DB("localhost", "tareas", "root", "IvXu5ir");
		#FIXME: Create db if it does not exists
		
		$this->user = null;
	}
	###

	public function setUser($user)
	{
		$this->user = $user;
	}
	
	public function getUser()
	{
		return $this->user;
	}
	
	public function getDB()
	{
		return $this->db;
	}
}
###

?>
