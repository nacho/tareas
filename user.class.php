<?php

class User
{
	private $name;
	private $pass;
	private $email;
	
	public function __construct($name, $pass, $email)
	{
		$this->name = $name;
		$this->pass = $pass;
		$this->email = $email;
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
