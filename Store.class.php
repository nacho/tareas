<?php

include_once("db.class.php");

#doc
#	classname:	Store
#	scope:		PUBLIC
#
#/doc

class Store
{
	protected $db;
	private $result;//Almacena o resultado obtendo pola consulta á BD
	private $query;//Almacena a consulta realizada co metodo consultaBD();
	
	#	Constructor
	function __construct ($db)
	{
		$this->db = $db;
	}
	
	public function dbQuery($query)
	{
		if(empty($query))
			return false;
		
		$this->query = $query;
		
		return $this->result = mysql_query($this->query, $this->db->getDBI());
	}//dbQuery
	
	public function getResult()
	{
		return mysql_fetch_array($this->result);
	}//getResult
	
	public function querySize()
	{
		return mysql_num_rows($this->result);
	}//querySize
}
###

?>
