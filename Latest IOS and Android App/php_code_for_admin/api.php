<?php 	
	include("config.php");
	include("connect_class.php");
	$db= new database();
	function pr($arr){
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}
if($_REQUEST['action']=='insert_regId'){	
	
	$qry ="SELECT *  FROM ".TABLE_PREFIX."reg_device where 	regId='".$_REQUEST['regID']."'";
	$res=$db->query($qry);
	$row=$db->fetch_rows($res);
	if(empty($row)){
			$sql="INSERT INTO  ".TABLE_PREFIX."reg_device SET 	regId='".$_REQUEST['regID']."', date_curr=NOW(), deviceType='".$_REQUEST['deviceType']."' ";
			$res=$db->query($sql);
		}
		
}

?>