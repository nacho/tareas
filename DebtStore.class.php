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
			$debt->setPayed($r['payed']);
			
			array_push($debts, $debt);
		}
		
		return $debts;
	}
	
	private function debtExists($debts, $idUser1, $idUser2)
	{
		$i = 0;
		
		while ($debts[$i] != null)
		{
			$debt = $debts[$i];
			if ($debt->getUser1()->getID() == $idUser1 &&
			    $debt->getUser2()->getID() == $idUser2)
				return $i;
			$i++;
		}
		
		return -1;
	}
	
	public function getTotalDebtsForUser($user)
	{
		$debts = array();
		
		$this->dbQuery("SELECT * FROM debt WHERE idUser1='".$user->getID()."' AND payed='0' ORDER BY idUser2");
		
		while ($r = $this->getResult())
		{
			$i = $this->debtExists($debts, $r['idUser1'], $r['idUser2']);
			
			if ($i > -1)
			{
				$debt = $debts[$i];
				$amount = $debt->getAmount();
				$amount += $r['amount'];
				$debt->setAmount($amount);
			}
			else
			{
				$userStore = new UserStore($this->db);
				$user1 = $userStore->getUserFromID($r['idUser1']);
				$user2 = $userStore->getUserFromID($r['idUser2']);
				$debt = new Debt($r['idDebt'], $user1, $user2, $r['amount']);
				$debt->setDescription("Total to pay");
				
				array_push($debts, $debt);
			}
		}
		
		return $debts;
	}
	
	public function addDebt($user1, $user2, $amount, $description)
	{
		$userStore = new UserStore($this->db);
		
		$idUser1 = $userStore->getIDFromName($user1);
		$idUser2 = $userStore->getIDFromName($user2);
		
		$this->dbQuery("INSERT INTO `tareas`.`debt` (`idDebt`, `idUser1`, `idUser2`, `amount`, `description`) VALUES (NULL, '".$idUser1."', '".$idUser2."', '".$amount."', '".$description."')");
		
		return $this->getInsertID();
	}
	
	public function debtPayed($id)
	{
		$this->dbQuery("UPDATE debt SET `payed`='1' WHERE `idDebt`='".$id."'");
	}
}
###

?>
