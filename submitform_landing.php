<?php include 'config_landing.php';
$name=$_POST['name'];
$c_name=$_POST['c_name'];
$mobile_no=$_POST['mobile_no'];
$email=$_POST['email'];
$c_id=$_POST['c_id'];
$type=$_POST['type'];


require 'PHPMailer-5.2.14/class.phpmailer.php';

$mail = new PHPMailer(true);
try {
		//$mail->IsSMTP();                                      // Set mailer to use SMTP
		$mail->SMTPDebug=1;   
		$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'erp.isas@gmail.com';                   // SMTP username
		$mail->Password = 'erp@frespa';                            // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'tls' also accepted
		$mail->Port = 465;
		$mail->setFrom('info@isasbeautyschool.com', 'ISAS');
		$mail->addAddress("info@isasbeautyschool.com"); 
		$emailss='santosh.sapke@gmail.com';
		$emailss1='erp.isas@gmail.com';
		$mail->addCC("$emailss");
		$mail->addCC("$emailss1"); 
		
		$message = "Dear Sir, <br/> Please find the student details details who has been followed our Facebook add and try to know more about <b>'Online COurse of Cidesco Diploma in Beauty and Spa Management'</b> <br/>";
		$message .= '<br/>Fullname - '.$name.'<br/>Mobile No. - '.$mobile_no.'<br/> Email Id - '.$email.'';
		///usr/local/bin/php -q /home/isasadmin007/isastest/faculty_login/dsr_mail.php?&send_mail=mail
		///bin/touch /home/isasadmin007/public_html/cron_test.txt >/dev/null 2>&1 && /bin/echo "Cron ran at: `date`" >> /home/isasadmin007/public_html/cron_test.txt
		$mail->Subject = 'Enquiry For Online Learning of Cidesco Diploma in Beauty and Spa Management- '.$date.'';
		
		$sendMessage=$GLOBALS['box_message_top'];
		$sendMessage.=$message;
		$sendMessage.=$GLOBALS['box_message_bottom'];
		
		$mail->WordWrap = 3000; 
		$mail->isHTML(true);                                  
		$mail->Body    = $sendMessage;
		 
		$mail->Send();
		echo "Email Sent Successfully.";
	} catch (phpmailerException $e) {
	  echo $e->errorMessage(); 
	} catch (Exception $e) {
	  echo $e->getMessage(); 
	}	
//================================================================================	
/*if(trim($_POST['cm_id']) !='')
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
}*/
?>