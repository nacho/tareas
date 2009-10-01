<?php

class DB
{
	/********* Atributos *********/
	private $dbserver; 	//servidor da base de datos
	private $dbname;	//nome da base de datos
	private $dbuser;	//nome do usuario para acceder á base de daos
	private $dbpass;	//contrasinal do usuario


	private $dbi;//Almacena a información da conexión coa Base de Datos unha vez establecida
	
	/********* Métodos *********/
	public function __construct($dbserver,$dbname,$dbuser,$dbpass)
	{
		//Asignamos os valores aos atributos da clase
		$this->dbserver = $dbserver;
		$this->dbname = $dbname;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
	
		$this->dbi = null;
	}//constructor
	
	public function setDBServer($dbserver)
	{
		$this->dbserver = $dbserver;
	}//setDBServer
	
	public function setDBName($dbname)
	{
		$this->dbname = $dbname;
	}//setDBName
	
	public function setDBUser($dbuser)
	{
		$this->dbuser = $dbuser;
	}//setDBUser
	
	public function setDBPass($dbpass)
	{
		$this->dbpass = $dbpass;
	}//setDBPass
	
	public function getDBI()
	{
		return $this->dbi;
	}
	
	public function dbConnect()
	{
		if($this->dbi = mysql_connect($this->dbserver, $this->dbuser, $this->dbpass)) {
			if(mysql_select_db($this->dbname, $this->dbi)) {
				return true;
			} else {
				die("Non existe a base de datos");
			}//if-else
		} else {
			die("Non se puido conectar co servidor MySQL");
		}//if-else
	}//dbConnect()
}//clase DB
?>
