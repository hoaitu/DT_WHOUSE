<?php
	
class model{
private $connection;
private $localhost;
private $username;
private $password;
private $database;
private $result;
private $queryResult=null;
public function __construct(){

include_once 'config/dbcon.php';

	$this->localhost=$db_localhost;
	$this->username=$db_username;
	$this->password=$db_password;
	$this->database=$db_database;
	$this->connect();
}	
public function connect(){
	$this->connection = mysql_connect($this->localhost, $this->username, $this->password) or die('kết nối không thành công');
	// die($this->connection);
	
	if(isset($this->connection)){	
		mysql_select_db($this->database,$this->connection);	
		mysql_query("set names 'UTF8'");	
	}
	else{	
		echo "kết nối không thành công";	
	}

}

	
public function select($sql){
	$this->result=mysql_query($sql,$this->connection);
	return $this->result; 
}

public function count_record(){	
	return mysql_num_rows($this->result);	
}
public function fetchArray($queryResult=NUll){
	
	if($queryResult==NULL){
		if(is_resource($this->result))
		{

			$mangArray=array();
			while($row=mysql_fetch_array($this->result)){
				$mangArray[]=$row;
			}
		return $mangArray;
		}	
	}
}

public function insert_cart($arrayDulieu){

 }
}
?>