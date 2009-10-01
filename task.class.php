<?php

class Task
{
	private $name;
	private $user;
	private $week;

	public function __construct($name, $week)
	{
		$this->name = $name;
		$this->week = $week;
		$this->user = null;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getUser()
	{
		return $this->user;
	}
	
	public function setUser($user)
	{
		$this->user = $user;
	}

	public function isSetToUser()
	{
		$this->user != null;
	}
	
	public function getWeek()
	{
		return $this->week;
	}
}

?>
