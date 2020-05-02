<?php
session_start();
	//Email responses
	$domainName="isasbeautyschool.com";
	$adminEmail 		= "erp.isas@gmail.com";
    $pre_db            ="";
	//Databse configuration local server
    if($_SERVER['HTTP_HOST']=="localhost" )//|| $_SERVER['HTTP_HOST']=="hindavi-1"
    {
	$host 			= "localhost";
	$dbuid			= "root";
	$dbpwd 			= "";
	$dbname			= "isasbeautyschool";
    }
    else
    {
	$host 			= "localhost";
	$dbuid			= "isas_land_page";
	$dbpwd 			= "isas@page007";
	$dbname			= "isas_landing";
	/*$host 			= "isasbeautyschool.org";
	$dbuid			= "isasadmin";
	$dbpwd 			= "isasadmin007";
	$dbname			= "isasbeautyschool_org";*/
    }
	// Create connection
	$conn = mysqli_connect($host, $dbuid, $dbpwd, $dbname);
	//Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		echo ' not connected';
	}
	
	
	//================================================
	/*$dbServerName = "148.66.136.7";
	$dbUsername = "isasadmin";
	$dbPassword = "isasadmin007";
	$dbName = "isasbeautyschool_org";
	
	// create connection
	$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
	
	// check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";*/
	//=========================================================
	
	
	//if selection fails output error message 
	
	/*$sql_stmt = "SELECT * FROM my_contacts"; 
    //SQL select query 
    $result = mysqli_query($dbh,$sql_stmt);
     //execute SQL statement 
    if (!$result)     
		die("Database access failed: " . mysqli_error()); 
    	//output error message if query execution failed 
    	$rows = mysqli_num_rows($result); 
   		// get number of rows returned 
    if ($rows) {     
    	while ($row = mysqli_fetch_array($result)) {         
			echo 'ID: ' . $row['id'] . '<br>';         
			echo 'Full Names: ' . $row['full_names'] . '<br>';        
			echo 'Gender: ' . $row['gender'] . '<br>';         
			echo 'Contact No: ' . $row['contact_no'] . '<br>';         
			echo 'Email: ' . $row['email'] . '<br>';         
			echo 'City: ' . $row['city'] . '<br>';         
			echo 'Country: ' . $row['country'] . '<br><br>';     
		} 
	}*/
	
	//$con1 = mysql_connect($host ,$dbuid, $dbpwd);
	//mysql_select_db($dbname,$con1 );
    /*$box_message_top='<br>
        <table style=" color:#FFFFFF; width:100%; background-color:#98BB49"><tr><td>
        <table align="center" width="100%" cellpadding="1" cellspacing="1">
        <tr><td style="color:#FFFFFF;padding-left:10px;	font-size:18px;	font-weight:600;padding-top:5px; padding-bottom:5px;">'.ucfirst($domainName).' Messages</td></tr>
        <tr><td style="color:#0F7ACD; padding:8px; background-color:#FFFFFF;" align="left"><img src="record.php?e=1" alt="Tracker" />';
    $box_message_bottom='</td></tr>
	</table></td></tr>
	</table>';*/

	//$show_records = 10;
    //$escapeCharacters=array('?','&','/','\\','%','"',':');    
?>
