<?php

class User
{
	private $id;
	private $name;
	private $pass;
	private $email;
	
	public function __construct($id, $name, $pass, $email)
	{
		$this->id = $id;
		$this->name = $name;
		$this->pass = $pass;
		$this->email = $email;
	}
	
	public function getID()
	{
		return $this->id;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setPass($pass)
	{
		$this->pass = $pass;
	}

	public function getPass($pass)
	{
		return $this->pass;
	}
	
	public function getMail()
	{
		return $this->email;
	}
	
	public function setMail($email)
	{
		$this->email = $email;
	}
}

?>
