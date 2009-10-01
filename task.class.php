<?php

class Tarea
{
	private $nombre;
	private $user;
	private $semana;

	public function __construct($nombre, $semana)
	{
		$this->nombre = $nombre;
		$this->semana = $semana;
		$this->user = null;
	}
	
	public function getNombre()
	{
		return $this->nombre;
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
	
	public function getSemana()
	{
		return $this->semana;
	}
}

?>
