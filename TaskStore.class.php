<?php

include_once("task.class.php");
include_once("Store.class.php");

class TaskStore extends Store
{
	function __construct($db)
	{
		parente::__construct($db);
	}
	
	public function getNumWeeks()
	{
		$this->dbQuery ("SELECT count(*) FROM task group by week");
		
		$result = $this->getResult();
		return $result[0];
	}
	
	public function getTasks()
	{
		$tasks = array();
	
		$this->dbQuery ("SELECT * FROM task");
		
		while ($r = $this->getResult())
		{
			$task = new Task($r['name'], $r['week']);
			if ($r['IdUser'] != 0)
			{
				$userStore = new UserStore(parent::$db);
				$user = $userStore.getUserFromID($r['IdUser']);
				$tarea->setUser($user);
			}
			array_push($tasks, $tarea);
		}
		
		return $tasks;
	}
}

?>
