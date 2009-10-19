<?php

include_once("Store.class.php");
include_once("debt.class.php");

#doc
#	classname:	DebtStore
#	scope:		PUBLIC
#
#/doc

class DebtStore extends Store
{
	#	Constructor
	function __construct ($db)
	{
		parent::__construct($db);
	}
	###

	public function getDebts()
	{
		$debts = array();
		
		$this->dbQuery("SELECT * FROM debt ORDER BY idDebt");
		
		while ($r = $this->getResult())
		{
			$userStore = new UserStore($this->db);
			$user1 = $userStore->getUserFromID($r['idUser1']);
			$user2 = $userStore->getUserFromID($r['idUser2']);
			$debt = new Debt($r['idDebt'], $user1, $user2, $r['amount']);
			$debt->setDescription($r['description']);
			
			array_push($debts, $debt);
		}
		
		return $debts;
	}
	
	public function addDebt($user1, $user2, $amount, $description)
	{
		$userStore = new UserStore($this->db);
		
		$idUser1 = $userStore->getIDFromName($user1);
		$idUser2 = $userStore->getIDFromName($user2);
		
		$this->dbQuery("INSERT INTO `tareas`.`debt` (`idDebt`, `idUser1`, `idUser2`, `amount`, `description`) VALUES (NULL, '".$idUser1."', '".$idUser2."', '".$amount."', '".$description."')");
	}
}
###

?>
