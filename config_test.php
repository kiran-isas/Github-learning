<?php
echo "1";
error_reporting('E_All');
	//Email responses
	$domainName="isasbeautyschool.com";
	$adminEmail 		= "erp.isas@gmail.com";
    $pre_db            ="";
	//Databse configuration local server
   
	$host 			= "148.66.136.7";
	$dbuid			= "isasadmin";
	$dbpwd 			= "isasadmin007";
	$dbname			= "isasbeautyschool_org";
	     echo "2";
	$conn = mysql_connect($host ,$dbuid, $dbpwd);
	if (!$conn) {  
		die('Not connected : ' . mysql_error());  
		echo "Not connected";
	}  
	else
	{
		echo "connected";
	}
	$db_selected=mysql_select_db($dbname,$conn );
	if (!$db_selected) {  
		die ('Cannot use database mydbname : ' . mysql_error());  
	} 
	else
	{
		echo "COnnected";
	}
echo "3";
?>
