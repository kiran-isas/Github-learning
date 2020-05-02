<?php include '../faculty_login/inc_classes.php';
$name=$_POST['name'];
$c_name=$_POST['c_name'];
$mobile_no=$_POST['mobile_no'];
$email=$_POST['email'];

$course="SELECT course_id,course_name FROM courses WHERE course_name LIKE '".$c_name."' ";
$course_name = $db->fetch_array($db->query($course));
//echo ">>>>>>>>>>>>>>>>>>>".$course_name['course_id'];
//----------- INSERT INTO INQUERY ----------------------
$insert_into_inquery= "insert into inquiry (`firstname`,`course_interested`,`mobile1`,`email_id`,`enquiry_source`,`enquiry_date`) values ('".$name."','".$course_name['course_id']."','".$mobile_no."','".$email."','Facebook','".date('Y-m-d')."')";
$ptr_certificate= mysql_query($insert_into_inquery);

//----------- INSERT INTO REGISTRATION ----------------------
$insert_into_regi= "insert into stud_regi (`name`,`course_id`,`contact`,`mail`,`enquiry_source`,`added_date`) values ('".$name."','".$course_name['course_id']."','".$mobile_no."','".$email."','Facebook','".date('Y-m-d')."')";
$ptr_certificate= mysql_query($insert_into_regi);


?>