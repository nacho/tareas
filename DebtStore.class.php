<?php

include_once("Store.class.php")

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
		
		$this->dbQuery("SELECT * FROM debts");
		
		while ($r = $this->getResult())
		{
			$userStore = new UserStore($this->db);
			$user1 = $userStore->getUserFromID($r['idUser1']);
			$user2 = $userStore->getUserFromID($r['idUser2']);
			$debt = new Debt($user1, $user2, $r['amount']);
			$debt->setDescription($r['description']);
			
			array_push($debts, $debt);
		}
		
		return $debts;
	}
}
###

?>
