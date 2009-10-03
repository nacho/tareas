<?php

include_once("task.class.php");
include_once("UserStore.class.php");
include_once("Store.class.php");
include_once("utils.php");

class TaskStore extends Store
{
	function __construct($db)
	{
		parent::__construct($db);
	}
	
	public function getTasks()
	{
		$tasks = array();
		
		$this->dbQuery("SELECT * FROM task");
		
		while ($r = $this->getResult())
		{
			$task = new Task($r['name'], $r['week']);
			if ($r['IdUser'] != 0)
			{
				$userStore = new UserStore($this->db);
				$user = $userStore->getUserFromID($r['IdUser']);
				$task->setUser($user);
			}
			array_push($tasks, $task);
		}
		
		return $tasks;
	}
	
	public function addTask($task)
	{
		$this->dbQuery("INSERT INTO task (idTask, IdUser, name, week) VALUES (NULL, '', '".$task->getName()."', '".$task->getWeek()."')");
	}
	
	public function weekHasUser($week, $user)
	{
		$userStore = new UserStore ($this->db);
		
		$id = $userStore->getIDFromName($user);
	
		$this->dbQuery("SELECT IdUser FROM task WHERE IdUser='".$id."' AND week='".$week."'");
		
		$r = $this->getResult();
		if ($r['IdUser'] == '')
			return false;
		else
			return true;
	}
	
	public function modifyTask($user, $week, $task)
	{
		$userStore = new UserStore ($this->db);
		
		$id = $userStore->getIDFromName($user);
		
		$this->dbQuery("UPDATE task SET `IdUser` = '".$id."' WHERE week='".$week."' AND name='".$task."'");
	}
}

?>
