<?php

#doc
#	classname:	Debt
#	scope:		PUBLIC
#
#/doc

class Debt
{
	private $user1;
	private $user2;
	private $amount;
	private $description;
	
	#	Constructor
	function __construct($user1, $user2, $amount)
	{
		$this->user1 = $user1;
		$this->user2 = $user2;
		$this->amount = $amount;
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
}
###

?>
