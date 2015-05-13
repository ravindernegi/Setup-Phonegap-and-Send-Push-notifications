<?php
/*** 
	Author : R.S Negi   
	Date   : OCT 5, 2010
	Email  : r.singh.negi85@gmail.com              	 
**/
class database{
	

	
	private $connectlink;	
	private $resultlink;	
	private $rows;		
 
	public function __construct() {
		$this->connectlink = mysql_connect(HOST,USER,PASSWORD);
		if(!($this->connectlink)) {
			die("Database: could not connect");
		}
		else {
			mysql_select_db(DATABASE) or die(mysql_error());
		}
	}
	 
	public function __destruct() {
		@mysql_close($this->connectlink);
	}
	 
	public function query($sql,$msg='') {
		$this->resultlink = mysql_query($sql) or die($msg."<Br>".mysql_error());;
		return $this->resultlink;
	}
	 
	public function fetch_rows($result) {
		$rows = array();
		if($result) {
			while($row = mysql_fetch_assoc($result)) {
				$rows[] = $row;
			}
		}
		else {
			$rows = null;
		}
		return $rows;
	}
	
	public function get_row($result) {
		$row = mysql_fetch_assoc($result);
		return $row;
	}
	
	public function insertData($table_name,$arrField){
		$qrySTR="INSERT INTO ".$table_name." SET ";
		$fieldsSTR="";
		if(count($arrField)>0){
			foreach($arrField as $key=>$val){
				$fieldsSTR.=$key."='".$val."', ";
			}
			$qrySTR.=substr($fieldsSTR,0,-2);
			
			$result=$this->query($qrySTR);
			if($result){
				return mysql_insert_id($this->connectlink);
			}	
		}
	}
	
	public function updateData($table_name,$arrField,$conditon){
		$qrySTR="UPDATE ".$table_name." SET ";
		$fieldsSTR="";
		if(count($arrField)>0){
			foreach($arrField as $key=>$val){
				$fieldsSTR.=$key."='".$val."', ";
			}
			$qrySTR.=substr($fieldsSTR,0,-2)." where ".$conditon;
			$result=$this->query($qrySTR);
			if($result){
				return mysql_affected_rows($this->connectlink);
			}
		}	
	}
	
	public function deleteData($table_name,$conditon){
		$qrySTR="DELETE FROM ".$table_name." where ".$conditon; 
		if($table_name!=""){
			$result=$this->query($qrySTR);
		}	
	}
}
 

 
?>