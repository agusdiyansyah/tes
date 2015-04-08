<?php 
/**
* 
Database
*/

class Db_class
{
	var $HOSTNAME = 'localhost';
	var $USERNAME = 'root';
	var $PW;
	var $DB;

	public function db_connect($HostName, $UserName, $pw, $db)
	{
		
		$this->HOSTNAME = $HostName;
		$this->USERNAME = $UserName;
		$this->PW 		= $pw;
		$this->DB 		= $db;

		return mysqli_connect($this->HOSTNAME , $this->USERNAME , $this->PW , $this->DB);

		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}

}