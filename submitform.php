<?php include 'config_landing.php';
$name=$_POST['name'];
$c_name=$_POST['c_name'];
$mobile_no=$_POST['mobile_no'];
$email=$_POST['email'];
$c_id=$_POST['c_id'];
$type=$_POST['type'];

if(trim($_POST['cm_id']) !='')
	$cm_id=$_POST['cm_id'];
else
	$cm_id='2';

$captcha_code=$_SESSION['captcha'];
$security_code=$_POST['s_code'];
if($captcha_code == $security_code)
{
	$selc="select campaign_id from campaign where c_id='".$c_id."'";
	$ptrcmp=mysqli_query($selc,$conn);
	if(mysqli_num_rows($ptrcmp))
	{
		$datsc=mysqli_fetch_array($ptrcmp);
		$src_id=$datsc['campaign_id'];
	}
	else
		$src_id='0';
		
	if($type=="service")
	{
		//--------------------------------------------------- INSERT INTO SERVICE INQUERY ----------------------------------------------------------------
		echo "1#";
		$sele_inq="select inquiry_id from service_inquiry where mobile1='".$mobile_no."' or email_id='".$email."'";
		$ptr_inq=mysqli_query($sele_inq,$conn);
		if(mysqli_num_rows($ptr_inq,$conn))
		{
			echo "Your enquiry is already exist.Thank You For Showing Your Interest With Us. We will Get touch with you very soon...!";
		}
		else
		{
			"\n".$insert_into_inquery="insert into service_inquiry (`name`,`mobile1`,`email_id`,`enquiry_src`,`inquiry_date`,`campaign_id`,`cm_id`,`status`) values ('".$name."','".$mobile_no."','".$email."','".$src_id."','".date('Y-m-d H:i:s')."','".$c_id."','".$cm_id."','Enquiry')";
			$ptr_certificate= mysqli_query($insert_into_inquery,$conn);
			$stud_id=mysqli_insert_id();
			echo "Thank You For Showing Your Interest With Us. We will Get touch with you very soon...!";
		}
	}
	else
	{
		$course="SELECT course_id,course_name FROM courses WHERE course_name LIKE '".$c_name."' ";
		$ptr_course=mysqli_query($course,$conn);
		$course_name =mysqli_fetch_array($ptr_course);
		//echo ">>>>>>>>>>>>>>>>>>>".$course_name['course_id'];
		if($course_name['course_id'] !='')
			$course_id=$course_name['course_id'];
		else
			$course_id="0";
		//--------------------------------------------------- INSERT INTO INQUERY ----------------------------------------------------------------
		echo "1#";
		$sele_inq="select inquiry_id from inquiry where mobile1='".$mobile_no."' or email_id='".$email."'";
		$ptr_inq=mysqli_query($sele_inq,$conn);
		if(mysqli_num_rows($ptr_inq))
		{
			echo "Your enquiry is already exist.Thank You For Showing Your Interest With Us. We will Get touch with you very soon...!";
		}
		else
		{
			"\n".$insert_into_inquery="insert into inquiry (`firstname`,`course_interested`,`mobile1`,`email_id`,`enquiry_source`,`enquiry_date`,`campaign_id`,`cm_id`,`status`,`response`) values ('".$name."','".$course_id."','".$mobile_no."','".$email."','".$src_id."','".date('Y-m-d H:i:s')."','".$c_id."','".$cm_id."','Enquiry','3')";
			$ptr_certificate= mysqli_query($insert_into_inquery,$conn);
			$stud_id=mysqli_insert_id();
		//-------------------------------------------------- INSERT INTO REGISTRATION ------------------------------------------------------------
			"\n".$insert_into_regi= "insert into stud_regi (`class_id`,`name`,`course_id`,`contact`,`mail`,`enquiry_source`,`added_date`,`campaign_id`,`cm_id`,`status`,`response`) values ('".$stud_id."','".$name."','".$course_id."','".$mobile_no."','".$email."','".$src_id."','".date('Y-m-d H:i:s')."','".$c_id."','".$cm_id."','Enquiry','3')";
			$ptr_certificate= mysqli_query($insert_into_regi,$conn);
			echo "Thank You For Showing Your Interest With ISAS. We will Get touch with you very soon...!";
		}
	}
}
else
{
	echo "0#";
	echo "Please Enter Valid Security Code";
}
?>