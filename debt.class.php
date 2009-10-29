<?php

#doc
#	classname:	Debt
#	scope:		PUBLIC
#
#/doc

class Debt
{
	private $id;
	private $user1;
	private $user2;
	private $amount;
	private $description;
	private $payed;
	
	#	Constructor
	function __construct($id, $user1, $user2, $amount)
	{
		$this->id = $id;
		$this->user1 = $user1;
		$this->user2 = $user2;
		$this->amount = $amount;
		$this->payed = false;
	}
	###

	public function setDescription($desc)
	{
		$this->description = $desc;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getUser1()
	{
		return $this->user1;
	}
	
	public function getUser2()
	{
		return $this->user2;
	}
	
	public function getAmount()
	{
		return $this->amount;
	}
	
	public function setAmount($amount)
	{
		$this->amount = $amount;
	}
	
	public function getPayed()
	{
		return $this->payed;
	}
	
	public function setPayed($payed)
	{
		$this->payed = $payed;
	}
}
###

?>
