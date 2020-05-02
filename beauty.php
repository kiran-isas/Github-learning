<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<?php include 'config.php';
	$sel_cm="select cm_id from campaign where c_id='".$_GET['c_id']."'";
	$ptr_cm=mysql_query($sel_cm);
	$data_cm=mysql_fetch_array($ptr_cm);
	$cm_id=$data_cm['cm_id'];
	 ?>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="isasbeautyschool">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="isasbeautyschool,beauty,salon,makeup,hair classes,beauty classes">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Beauty Classes - IISAS</title>
	<?php include 'header.php';?>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/popup_style.css">
        <link rel="stylesheet" href="main.css">
        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109741410-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-109741410-2');
        </script>
		<script>
		function submitform() {
			
				frm = document.jqueryForm;
		error='';
		disp_error = 'Clear The Following Errors : \n\n';
		if(frm.name.value=='')
		{
			disp_error +='Enter First Name\n';
			document.getElementById('name').style.border = '1px solid #f00';
			frm.name.focus();
			error='yes';
	    }
		else  // validation for number
		{
			  
			  var reg = /^[A-Za-z\s]+$/;
			if (reg.test(document.getElementById("name").value) == false) 
			{
				disp_error +='Enter Valid First Name.Space and Symbols are not allowed\n';
				document.getElementById('name').style.border = '1px solid #f00';
			 	frm.name.focus();
				error='yes';
			}
		}
		
		
		 
		 if(frm.mobile_no.value=='')
		 {
			 disp_error +='Enter Mobile Number \n';
			 document.getElementById('mobile_no').style.border = '1px solid #f00';
			 frm.mobile_no.focus();
			 error='yes';
	     }
		 else
		 {	 var reg = /^\d{10}$/;
			if (reg.test(document.getElementById("mobile_no").value) == false) 
			{
					 disp_error +='Enter Valid Mobile Number \n';
					 document.getElementById('mobile_no').style.border = '1px solid #f00';
					 error='yes';
				}
		 }
		
		 if(frm.email.value=='')
		 {
			 disp_error +='Enter Email ID \n';
			 document.getElementById('email').style.border = '1px solid #f00';
			 frm.email.focus();
			 error='yes';
	     }
		 else
		 {
			/* disp_error +='Enter Email ID \n';
			 document.getElementById('email').style.border = '1px solid #f00';
			 frm.email.focus();
			 error='yes';*/
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if (reg.test(document.getElementById("email").value) == false) 
			{
				disp_error +='Invalid Email Address\n';
				document.getElementById('email').style.border = '1px solid #f00';
				frm.email.focus();
				error='yes';
			}
	     }
		
	
		 if(error=='yes')
		 {
			 alert(disp_error);
			 return false;
		 }
		 else
		{ 
		
		
 
			var mobile_no = $("#mobile_no").val();
			var email = $("#email").val();
			var name = $("#name").val();
			var c_name = $("#c_name").val();
			var security_code = $("#captcha1").val();
			var cm_ids='<?php echo $cm_id; ?>';
			
				$.ajax({ 
				//alert(staff+">>>>>>>>>"+month+">>>>>>>>>>>>>"+year);
					type: 'post',
					url: 'submitform.php',
					data: { name: name,email:email,mobile_no:mobile_no,c_name:'Cidesco',c_id:'<?php echo $_GET['c_id']; ?>',cm_id:cm_ids,s_code:security_code },
				}).done(function(responseData) {
				//alert(responseData);
			   // $("#showdiv").html(responseData);
			    var sep=responseData.split('#');
				if(sep[0]=='1')
				{
					$(this).hide();
					/*$('.window').hide();
					$('#mask').hide(); // Changes made on 5/7/19*/
					alert(sep[1]);
					
				
					setTimeout('document.location.href="http://isasbeautyschool.com/basic-beauty-therapy-course/"');
				}
				else
				{
					alert(sep[1]);
					setTimeout('document.location.href="http://isasbeautyschool.com/basic-beauty-therapy-course/"');
				}
				}).fail(function() {
					console.log('Failed');
				});
		
			}
		}

		</script>
	<style>
	nav a {
		color: black !important;
		font-size: 13px !important;
		font-weight: 800 !important;
	}
	.menu-bar span {
		color: black;
		font-size: 24px;
	}
	</style>
	</head>
	<body>
    <?php
	$user_ip=$_SERVER['REMOTE_ADDR'];
	$c_id=$_GET['c_id'];
	$check_ip = mysql_query("select userip from web_counter_pageview where userip='".$user_ip."' and c_id='".$c_id."'");
  	if(mysql_num_rows($check_ip)>=1)
	{
	}
	else
	{
		$insertview = mysql_query("insert into web_counter_pageview (`userip`,`c_id`) values('".$user_ip."','".$c_id."')");
		$updateview = mysql_query("update web_counter_totalview set totalvisit = totalvisit+1 where c_id='".$c_id."' ");
	}
  	?>
    <div id="suggestPost"><a target="_blank" href="convForm-master/index.php?type=basic_beauty&c_name=Basic Beauty" ></a></div>
    <!--<div id="boxes">
        <div style="top: 199.5px; left: 551.5px; display: none;" id="dialog" class="window"> 
            <div style="background-color:#AA8278;border-radius:10px;"><b style="color:white;"> Fill Details </b></div><br />
            <div id="lorem">
                <center>
                <form method="post" name="jqueryForm" id="jqueryForm" enctype="multipart/form-data" >
                    <label style="float:left;width:150px;">Name </label>               
                    <input type="text" name="name" id="name" required  style="border: 2px solid #AA8278;border-radius: 4px;"/>
                    <br /><br />
                    <label style="float:left;width:150px;">Email </label>
                    <input type="text" name="email" id="email" required  style="border: 2px solid #AA8278;border-radius: 4px;"/>
                    <br /><br />
                    <label style="float:left;width:150px;">Mobile Number</label>
                    <input type="text" name="mobile_no" id="mobile_no" required  style="border: 2px solid #AA8278;border-radius: 4px;"/>
                    <input type="hidden" name="c_name" id="c_name" value="<?php echo $_REQUEST['c_name']; ?>"/>
                    <br /><br />
                    <div id="popupfoot"><a onClick="submitform();" style="padding:6px;border: 2px solid #AA8278; border-radius: 4px;color:white;background-color:#582F2E;cursor:pointer;">I Agree </a></div>
                </form>
                </center>
            </div>
        </div>
        <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
    </div>-->
	<!-- <div id="boxes" <?php if($_REQUEST['is_form']=="show") echo 'style="display:block"'; else if($_REQUEST['is_form']=="hide") echo 'style="display:none"'; else echo 'style="display:block"';?>>
    <div style="display: none;" id="dialog" class="window"> 
       <!-- <div style="background-color:#AA8278;border-radius:10px;"><b style="color:white;"> Fill Details </b></div><br />
        <div id="lorem">
<div class='bold-line-popup'></div>
<div class='container_popup'>
  <div class='window_popup'>
    <div class='overlay_popup'></div>
    <div class='content_popup'>
      <div class='welcome_popup' style="margin-top: 30px;"><b style="color:white;"><span style="color:#F00">H</span><span style="color:#33F">e</span>l<span style="color:#0F0">l</span><span style="color:#FF6">o</span> <span style="color:#F3C">T</span><span style="color:#900">h</span><span style="color:#6C3">e</span><span style="color:#CC3">r</span><span style="color:#F93">e</span><span style="color:#003">!</span></b></div>
      <div class='subtitle_popup' style="margin-top: 15px;"><b style="color:#C30;">We would like to send you, ISAS newsletters and informative videos, so kindly share your email address and whatsapp mobile number.</b></div>
      <form method="post" name="jqueryForm" id="jqueryForm" enctype="multipart/form-data" >
      <div class='input-fields-popup'>
        <input type='text' name="name" id="name"  placeholder='Fullname' class='input-line full-width-popup input_popup'></input>
        <input type='email' placeholder='Email' name="email" id="email" class='input-line full-width-popup input_popup'></input>
        <input type='text' placeholder='Mobile Number' name="mobile_no" id="mobile_no"  class='input-line full-width-popup input_popup'></input>
        <span class="text-form"><font color="#333333" size="2"> </font></span> 
       <img  src="captcha/captcha.php" id="captcha" height="35px"/>
       <img src="captcha/refresh.png" id="change-image" style="cursor: pointer; padding: 8px 26px;" onClick=			"document.getElementById('captcha').src='captcha/captcha.php?'+Math.random();">
       	<input type='text' placeholder='Sequrity Code' name="captcha1" id="captcha1" class='input-line full-width-popup input_popup'></input>
      </div>
     
     <center> <div style="padding:60px 0px 20px 0px;"><a onClick="submitform();" class='ghost-round full-width-popup button_popup' style="padding:10px 60px 10px 60px;">I Agree </a></div></center>
      </form>
    </div>
  </div>
</div>
        </div>
    </div> -->
    <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
</div>
	
		<div class="main-wrapper-first">
			<header>
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
								<a href="index.html"><img src="img/logo.png" width="150" height="80" alt=""></a>
							</div>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<a href="http://isasbeautyschool.com/">ISAS home</a>
									<a href="http://isasbeautyschool.com/about-us/">About us</a>
									<a href="http://isasbeautyschool.com/awards/">Award</a>
                                    <a href="http://isasbeautyschool.com/gallery/">Gallery</a>
									<a href="http://isasbeautyschool.com/event/">Event</a>
									<a href="http://isasbeautyschool.com/contact-us/">Contact us</a>
								</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="banner-area">
				<div class="container">
					<div class="row justify-content-center height align-items-center" style="background-image: url('img/beauty.jpg');background-repeat: no-repeat;background-size: cover;background-size: 100% auto;"><!---->
						<div class="col-lg-12">
							<div class="banner-content text-center head-banner">
								<!--<span class="text-white top text-uppercase">isas beautyschool</span>
								<h3 class="text-white text-uppercase">Welcome To International School of Aesthetics and Spa (ISAS)</h3>
								<a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>-->
								<!--<img src="img/bgs.jpg" width="100%" height="100%" >-->
                                <!--<h1 class="text-white text-uppercase">Welcome To International School of Aesthetics and Spa (ISAS)</h1>-->
                            </div>
						</div>
                        
					</div>
				</div>	
			</div>
			<!--  Mission Content-->
            
            <!--End Mission Content-->
			
			 <!-- Start CIDESCO Course in management Area
			<section class="story-area" style="padding-top:20px;padding-bottom:20px;">
				<div class="container">
					<div class="row align-items-center">
						
						<div class="col-lg-6">
							<div class="story-box" style="padding:0px;" >
								<img src="img/beuty1.jpg" width="100%">
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="story-title">
								<h3 class="text-white">Basic Beauty Therapy Course</h3>
								<a href="http://isasbeautyschool.com/basic-beauty-therapy-course/" class="primary-btn hover d-inline-flex align-items-center" target="_blank"><span class="mr-10">Get Started</span><span class="lnr lnr-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
			</section>
		End Content-->
               
            <!-- Start CIDESCO – Diploma in Beauty Therapy Area 
			<section class="story-area" style="padding-top:20px;padding-bottom:20px;">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="story-title">
								<h3 class="text-white">Advance Beauty Therapy Course</h3>
								<a href="http://isasbeautyschool.com/advance-beauty-therapy-course/" class="primary-btn hover d-inline-flex align-items-center" target="_blank"><span class="mr-10">Get Started</span><span class="lnr lnr-arrow-right"></span></a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="story-box" style="padding:0px;" >
								<img src="img/adv-beauty.jpg" width="100%">
								
							</div>
						</div>
					</div>
				</div>
			</section>
		End Content-->
			   
			<!-- Start CIDESCO – Diploma in Beauty Therapy Area 
			<section class="story-area" style="padding-top:20px;padding-bottom:20px;">
				<div class="container">
					<div class="row align-items-center">
                    	<div class="col-lg-6">
							<div class="story-box" style="padding:0px;" >
								<img src="img/dbt.jpg" width="100%">
								
							</div>
						</div>
						<div class="col-lg-6">
							<div class="story-title">
								<h3 class="text-white">Dip. in Beauty Therapy – Level (2 & 3) ( MCG – Manipal City & Guilds – India)</h3>
								<a href="http://isasbeautyschool.com/dip-in-beauty-therapy-level-2-3-mcg-manipal-city-guilds-india-2/" class="primary-btn hover d-inline-flex align-items-center" target="_blank"><span class="mr-10">Get Started</span><span class="lnr lnr-arrow-right"></span></a>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			End Content-->
			  
			  
			<section class="subscription-area" style="background:cornsilk;">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3>List of all Courses Related to Beauty</h3>
								<span class="text-uppercase">All Courses Follow National & International Qualifications.</span>
							</div>
						</div>
					</div>
                    <div class="row">
                   
						<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<div class="thumb" style="background: url(img/beauty1.jpg);height: 16rem !important;">
									<!--<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/cidesco-swiss/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>-->
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">* Basic Beauty Therapy Course</h6>
									 <p class="text-black">* Cells & tissues</p>
									 <p class="text-black">* Skin Structure</p>
									 <p class="text-black">* Function & types of Skin</p>
									 <p class="text-black">* Muscular System</p>
									 <p class="text-black">* Skeleton System</p>
									 <p class="text-black">* Facial muscles</p>
									 <p class="text-black">* Skin Analysis</p>
									 <p class="text-black">* Skin Disorders</p>
									 <p class="text-black">* Nail Structure</p>
									 <p class="text-black">* Manicure/ Pedicure</p>
									 <p class="text-black">* Threading</p>
									 <p class="text-black">* Waxing</p>
								</div>
							</div>
						</div>
                        <!--For mobile view don't show-->
                            <div class="col-lg-4 col-sm-6" >
                                <div class="single-service">
                                    <div class="thumb" style="background: url(img/F.jpg);height: 16rem !important;">
                                        <!--<div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                            <a href="http://isasbeautyschool.com/vtct/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                        </div>-->
                                    </div>
                                    <div class="desc">
                                       
											<p class="text-black">* Bleaching</p>
											<p class="text-black">* Nail diseases & Disorders</p>
											<p class="text-black">* Theory of Massage</p>
											<p class="text-black">* Electrology</p>
											<p class="text-black">* Professional Ethics</p>
											<p class="text-black">* Communication Skills</p>
											<p class="text-black">* Cleanup</p>
											<p class="text-black">* Facials</p>
											<p class="text-black">* Mask & Packs</p>
											<p class="text-black">* Health & Safety</p>
											<p class="text-black">* Hygiene & Sanitization</p>
											<p class="text-black">* Personal Grooming</p>
                                        
                                        <p class="text-black"></p>
                                    </div>
                                </div>
                            </div>
							
							<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<div class="thumb" style="background: url(img/beauty_1.jpg);height: 16rem !important;">
									<!--<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/cidesco-swiss/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>-->
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">* Advance Beauty Therapy Course</h6>
									 <p class="text-black">* Lymphatic System- vacuum strokes</p>
									 <p class="text-black">* Electrology (7)</p>
									<p class="text-black">* Brand Learning</p>
									<p class="text-black">* Advance Facials</p>
									<p class="text-black">* Aromatherapy</p>
									<p class="text-black">* Temporary Nail Extensions</p>
									<p class="text-black">* Management & Business Ethics</p>
									<p class="text-black">* Wax Therapy</p>
									<p class="text-black">* Advanced Manicure/ Pedicure</p>
									<p class="text-black">* Administration & Management</p>
									 
									 
								</div>
							</div>
						</div>
                            
						<!--</div>For mobile view don't show-->
                        
					</div>
					
				</div>
			</section>
			
			
            <!-- Start Subscription Area -->
			<section class="subscription-area">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3>ACCREDITATION / AFFILIATION</h3>
								<span class="text-uppercase">All Courses Follow National & International Qualifications.</span>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<div class="thumb" style="background: url(img/acc7.png);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/cidesco-swiss/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">CIDESCO SWISS</h6>
									<p class="text-black">Founded in 1946 in Brussels with Head Office in Zurich, Switzerland, Comité International d'Esthétique et de Cosmétologie – CIDESCO is the World Standard for Beauty and Spa Therapy.... <a style="color:#8A8AFF" href="http://isasbeautyschool.com/cidesco-swiss/" target="_blank">Read more</a></p>
								</div>
							</div>
						</div>
                        <!--For mobile view don't show-->
                            <div class="col-lg-4 col-sm-6 show_courses" >
                                <div class="single-service">
                                    <div class="thumb" style="background: url(img/vtct-acc.jpg);">
                                        <div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                            <a href="http://isasbeautyschool.com/vtct/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <h6 class="text-uppercase text-black">VTCT, Vocational Training Charitable Trust</h6>
                                        <p class="text-black">VTCT, Vocational Training Charitable Trust, is a Government-approved awarding organisation which has awarded world class qualifications since 1962 and has been at the forefront of developing the vocational system of qualifications in the United Kingdom ever since..... <a style="color:#8A8AFF" href="http://isasbeautyschool.com/vtct/" target="_blank">Read more</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 show_courses">
                                <div class="single-service">
                                    <div class="thumb" style="background: url(img/city-and-guild-acc.jpg);">
                                        <div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                            <a href="http://isasbeautyschool.com/city-guilds/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <h6 class="text-uppercase text-black">CITY & GUILDS MANIPAL</h6>
                                        <p class="text-black">Manipal City & Guilds is a joint venture between Manipal Education and City & Guilds, UK...... <a style="color:#8A8AFF" href="http://isasbeautyschool.com/city-guilds/" target="_blank">Read more</a></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6 show_courses" >
                                <div class="single-service">
                                    <div class="thumb" style="background: url(img/acc3.png);">
                                        <div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                            <a href="http://isasbeautyschool.com/cidesco-swiss-2/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <h6 class="text-uppercase text-black">INDIA SKILLS</h6>
                                        <p class="text-black">With 26 years of experience in Human Resource and Skill Assessment group registered India Skills Pvt. Ltd. in June, 2009 and was empanelled as an Assessing Body for All States / UT's for ..... <a style="color:#8A8AFF" href="http://isasbeautyschool.com/cidesco-swiss-2/" target="_blank">Read more</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 show_courses">
                                <div class="single-service">
                                    <div class="thumb" style="background: url(img/mstb1acc.jpg);">
                                        <div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                            <a href="http://isasbeautyschool.com/mstb/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <h6 class="text-uppercase text-black">Maharashtra Self-employment Training Board</h6>
                                        <p class="text-black">Maharashtra Self-employment Training Board (MSTB) is actively working since last 15 years in generating employment & self-employment. To highlight its professional work ..... <a style="color:#8A8AFF" href="http://isasbeautyschool.com/mstb/" target="_blank">Read more</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 show_courses">
                                <div class="single-service">
                                    <div class="thumb" style="background: url(img/acc312.jpg);">
                                        <div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                            <a href="http://isasbeautyschool.com/nsdc/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <h6 class="text-uppercase text-black">NSDC</h6>
                                        <p class="text-black">The National Skill Development Corporation ( NSDC ) is a one-of-its-kind, Public Private Partnership ( PPP ) model in India, under the Ministry of Skill Development & Entrepreneurship ( MSDE )...... <a style="color:#8A8AFF" href="http://isasbeautyschool.com/nsdc/" target="_blank">Read more</a></p>
                                    </div>
                                </div>
                            </div>
						<!--</div>For mobile view don't show-->
                        <div class="col-lg-4 col-sm-6 hide_courses">
                        	<div class="single-service">
                        	
                                <div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                    <a href="http://isasbeautyschool.com/accreditations/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                </div>
                            
                            </div>
                        </div>
					</div>
					<!--<div class="row justify-content-center">
						<div class="col-lg-6">
							<div id="mc_embed_signup">
								<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01" method="get" class="subscription relative">
									<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required>
									<div style="position: absolute; left: -5000px;">
										<input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
									</div>
									<button class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></button>
									<div class="info"></div>
								</form>
							</div>
						</div>
					</div>-->
				</div>
			</section>
			<!-- End Subscription Area -->
            <!-- Start Subscription Area -->
			<section class="subscription-area" style="background:cornsilk;">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3>Awards</h3>
								<!--<span class="text-uppercase">All Courses Follow National & International Qualifications.</span>-->
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<div class="thumb1" style="background: url(img/Aw1.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<!--<a href="#" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>-->
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">"Best Beauty Training Institute of The Year" by Indian Education Awards 2016</h6>
									<!--<p class="text-black">"Best Beauty Training Institute of The Year" by Indian Education Awards 2016</p>-->
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 show_awards">
							<div class="single-service">
								<div class="thumb1" style="background: url(img/Aw2.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<!--<a href="#" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>-->
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">Best Institute for Diploma in Beauty Therapy & Cosmetology in Maharashtra By "Asia Education Summit & Awards 2016"</h6>
									<!--<p class="text-black"></p>-->
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 show_awards">
							<div class="single-service">
								<div class="thumb1" style="background: url(img/Aw3.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<!--<a href="#" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>-->
									</div>
								</div>
								<div class="desc">
								<h6 class="text-uppercase text-black">Ramabai Joshi Award for Women Entrepreneurs at the 69th "Innovation & Entrepreneurship Awards" from MCCIA</h6>
									<!--<p class="text-black">Ramabai Joshi Award for Women Entrepreneurs at the 69th "Innovation & Entrepreneurship Awards" from MCCIA</p>-->
								</div>
							</div>
						</div>
						
						<div class="col-lg-4 col-sm-6 show_awards">
							<div class="single-service">
								<div class="thumb1" style="background: url(img/Aw4.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<!--<a href="#" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>-->
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">Bharat Vibhushan Samman Puraskar</h6>
									<!--<p class="text-black">With 26 years of experience in Human Resource and Skill Assessment group registered India Skills Pvt. Ltd. in June, 2009 and was empanelled as an Assessing Body for All States / UT's for</p>-->
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 show_awards">
							<div class="single-service">
								<div class="thumb1" style="background: url(img/Aw5.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<!--<a href="#" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>-->
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">Mr. and Miss Personality Pune</h6>
									<!--<p class="text-black">Maharashtra Self-employment Training Board (MSTB) is actively working since last 15 years in generating employment & self-employment. To highlight its professional work</p>-->
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 show_awards">
							<div class="single-service">
								<div class="thumb1" style="background: url(img/Aw6.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<!--<a href="#" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>-->
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">Pune Festival Award</h6>
									<!--<p class="text-black">The National Skill Development Corporation ( NSDC ) is a one-of-its-kind, Public Private Partnership ( PPP ) model in India, under the Ministry of Skill Development & Entrepreneurship ( MSDE ).</p>-->
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 hide_awards">
                        	<div class="single-service">
                        	
                                <div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                    <a href="http://isasbeautyschool.com/awards/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                </div>
                            
                            </div>
                        </div>
					</div>
					<!--<div class="row justify-content-center">
						<div class="col-lg-6">
							<div id="mc_embed_signup">
								<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01" method="get" class="subscription relative">
									<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required>
									<div style="position: absolute; left: -5000px;">
										<input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
									</div>
									<button class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></button>
									<div class="info"></div>
								</form>
							</div>
						</div>
					</div>-->
				</div>
			</section>
			<!-- End Subscription Area -->
			<!-- Start Service Area -->
			<section class="service-area">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3 class="text-white">Programs We Offers</h3>
								<!--<span class="text-white text-uppercase">MASTERS PROGRAM IN COSMETOLOGY</span>-->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="single-service">
								<div class="thumb" style="background: url(img/cometology.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/post-graduate-diploma-in-cosmetology/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-white">POST GRADUATION DIPLOMA IN COSMETOLOGY</h6>
									<!--<p class="text-white">WordPress, the premier free open-source blogging utility, has gone through several upgrades in</p>-->
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 show_programs">
							<div class="single-service">
								<div class="thumb" style="background: url(img/beauty_theropy.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/dip-in-beauty-therapy-level-2-3-mcg-manipal-city-guilds-india-2/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-white">POST GRADUATION DIPLOMA IN BEAUTY THERAPIES</h6>
									<p class="text-white">The buying of large-screen TVs has absolutely skyrocketed lately. It seems that everyone wants one – ..... <a style="color:grey" href="http://isasbeautyschool.com/dip-in-beauty-therapy-level-2-3-mcg-manipal-city-guilds-india-2/" target="_blank">Read more</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 show_programs">
							<div class="single-service">
								<div class="thumb" style="background: url(img/spa-therapy.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/diploma-in-spa-therapy-2/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-white">POST GRADUATE DIPLOMA IN SPA THERAPIES & MANAGEMENT</h6>
									<p class="text-white">Having used discount toner cartridges for twenty years, there have been a lot of changes in the ..... <a style="color:grey" href="http://isasbeautyschool.com/diploma-in-spa-therapy-2/" target="_blank">Read more</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 show_programs">
							<div class="single-service">
								<div class="thumb" style="background: url(img/beauty-therapy.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/cidesco-diploma-in-beauty-therapy/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-white">CIDESCO - DIPLOMA IN BEAUTY THERAPY</h6>
									<p class="text-white">Every avid independent filmmaker has dre amed about making that special interest documentary, or ..... <a style="color:grey" href="http://isasbeautyschool.com/cidesco-diploma-in-beauty-therapy/" target="_blank">Read more</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 show_programs">
							<div class="single-service">
								<div class="thumb" style="background: url(img/hair-dressing.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/dip-in-hair-dressing-level-2-3-mcg-manipal-city-guilds-india-2/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-white">CITY & GUILDS - LEVEL 3 HAIR DRESSING COURSE</h6>
									<p class="text-white">Looking to buy a new computer Overwhelmed by all of the options available to you? Stressed by the ..... <a style="color:grey" href="http://isasbeautyschool.com/dip-in-hair-dressing-level-2-3-mcg-manipal-city-guilds-india-2/" target="_blank">Read more</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 show_programs">
							<div class="single-service">
								<div class="thumb" style="background: url(img/nail-course.png);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/nail-extension-temporary-permanent-with-gel-and-acrylic-2/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-white">MSTB - NAIL TECHNICIAN COURSE</h6>
									<p class="text-white">Shure’s Music Phone Adapter (MPA) is our favorite iPhone solution, since it lets you use the headphones ..... <a style="color:grey" href="http://isasbeautyschool.com/nail-extension-temporary-permanent-with-gel-and-acrylic-2/" target="_blank">Read more</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 show_programs">
							<div class="single-service">
								<div class="thumb" style="background: url(img/beauty-spa.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/cidesco-diploma-in-beauty-spa-management-2/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-white">CIDESCO - DIPLOMA IN BEAUTY & SPA MANAGEMENT</h6>
									<p class="text-white">Over 92% of computers are infected with Adware and spyware. Such software is rarely accompanied by..... <a style="color:grey" href="http://isasbeautyschool.com/cidesco-diploma-in-beauty-spa-management-2/" target="_blank">Read more</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 show_programs">
							<div class="single-service">
								<div class="thumb" style="background: url(img/dip-cosmetology.jpg);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/masters-program-in-cosmetology/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-white">MASTERS PROGRAM IN COSMETOLOGY</h6>
									<p class="text-white">Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in ..... <a style="color:grey" href="http://isasbeautyschool.com/masters-program-in-cosmetology/" target="_blank">Read more</a></p>
								</div>
							</div>
						</div>
                        <div class="col-lg-4 col-sm-6 hide_programs">
                        	<div class="single-service">
                        	
                                <div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                    <a href="http://isasbeautyschool.com/masters-program-in-cosmetology/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                </div>
                            
                            </div>
                        </div>
					</div>
				</div>
			</section>
			<!-- End Service Area -->
            
			<!-- Start Amazing Works Area -->
		</div>
		<div class="main-wrapper">
			<section class="amazing-works-area">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3>Our Amazing Works</h3>
								<span class="text-uppercase">Re-imagining the way</span>
							</div>
						</div>
					</div>
					<div class="active-works-carousel mt-40">
						<div class="item">
							<div class="thumb" style="background: url(img/gs1.jpg);"></div>
							<div class="caption text-center">
								<h6 class="text-uppercase">PFW Event 2017</h6>
								<p>Pune Fashion Week 2017</p>
							</div>
						</div>
						<div class="item">
							<div class="thumb" style="background: url(img/gs2.jpg);"></div>
							<div class="caption text-center">
								<!--<h6 class="text-uppercase">Vector Illustration</h6>
								<p>LCD screens are uniquely modern in style, and the liquid crystals that make them work have allowed humanity to</p>-->
							</div>
						</div>
						<div class="item">
							<div class="thumb" style="background: url(img/gs3.jpg);"></div>
							<div class="caption text-center">
								<!--<h6 class="text-uppercase">Vector Illustration</h6>
								<p>LCD screens are uniquely modern in style, and the liquid crystals that make them work have allowed humanity to</p>-->
							</div>
						</div>
						<div class="item">
							<div class="thumb" style="background: url(img/gs4.jpg);"></div>
							<div class="caption text-center">
								<!--<h6 class="text-uppercase">Vector Illustration</h6>
								<p>LCD screens are uniquely modern in style, and the liquid crystals that make them work have allowed humanity to</p>-->
							</div>
						</div>
						<div class="item">
							<div class="thumb" style="background: url(img/gs5.jpg);"></div>
							<div class="caption text-center">
								<!--<h6 class="text-uppercase">Vector Illustration</h6>
								<p>Description</p>-->
							</div>
						</div>
					</div>
			</section>
		</div>
		<div class="main-wrapper">
			<!-- End Amazing Works Area -->
			<!-- Start Story Area -->
			<!--<section class="story-area">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3">
							<div class="story-title">
								<h3 class="text-white">Our Untold Story</h3>
								<span class="text-uppercase text-white">Re-imagining the way</span>
							</div>
						</div>
                        <div class="col-lg-3">
                        <a href="http://isasbeautyschool.com/awards/" target="_blank" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                        </div>-->
						<!--<div class="col-lg-6">
							<div class="story-box">
								<h6 class="text-uppercase">From the part of beginning</h6>
								<p>Our Mission is to  render highest quality training services in the Beauty Domain at competitive price and to elevate the beauty culture across the globe. Making ISAS a mark of Genuinely & trust and making a sincere effort to change people's lives</p>
								<a href="http://isasbeautyschool.com/awards/" target="_blank" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
							</div>
						</div>-->
					<!--</div>
				</div>
			</section>-->
			<!-- End Story Area -->
			<!-- Start Feature Area -->
			<section class="featured-area">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-sun"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase"><a href="http://isasbeautyschool.com/upcoming-event/">Upcoming Events</a></h6>
									<p>PUNE FASHION WEEK - SEASON 7</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-code"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase"><a href="http://isasbeautyschool.com/workshop-details/">Upcoming Workshop</a></h6>
									<p>ISAS Workshop</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-clock"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase"><a href="http://isasbeautyschool.com/course-details/">CCHD Course</a></h6>
									<p>Creative Course of Hair Designing</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Feature Area -->
			<!-- Start Footer Widget Area -->
			<section class="footer-widget-area">
				<div class="container">
					<div class="row">
						<div class="col-md-4 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Pune Branch (Head Office)</h6>
									<p>International School of Aesthetics and Spa 1st, 2nd & 3rd Floor,<br/> The Greens, North Main Road, Koregoan Park, Pune 411001<br/>Contact No:+91 20 2615 0616, +91 91589 85007, +91 9545337869. </p>
								</div>
							</div>
						</div>
                        <div class="col-md-4 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Pune Branch (East)</h6>
									<p>Hari A1,Next to ABS Gym<br/>Pimple Nilakh, Pune 411027.<br/>Contact No: 9607785007</p>
								</div>
							</div>
						</div>
                        <div class="col-md-4 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Baramati Branch</h6>
									<p>3rd Floor, KVK Building Shardabai Pawar Mahila Mahavidyalaya,<br/>Shardanagar, Baramati.<br/>Contact No:+91-7722085007 </p>
								</div>
							</div>
						</div>
						<!--<div class="col-md-4">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-earth"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase">Email Address</h6>
									<div class="contact">
										<a href="mailto:info@dataarc.com">info@isasbeautyschool.com</a> <br>
										<a href="mailto:support@dataarc.com">info@isas-pune.com</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-phone"></span>
								</div>
								<div class="desc">
									<h6 class="title text-uppercase">Phone Number</h6>
									<div class="contact">
										<a href="tel:1545">+91 20 2615 0616 </a> <br>
										<a href="tel:54512"> +91 9158985007</a>
									</div>
								</div>
							</div>
						</div>-->
					</div>
                    <div class="row">
						<div class="col-md-4 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Mumbai Branch</h6>
									<p>Shop Number 6, Swastik House, Taikalwadi, Shivaji Park,<br/> Mahim (W), Taikalwadi Marg, Joshi Wadi,<br/>Matunga West, Mumbai, Maharashtra - 400016<br/>Contact No: 8806285007</p>
								</div>
							</div>
						</div>
                        <div class="col-md-4 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Ahmedabad Branch</h6>
									<p>First Floor, Zodiac Plaza, <br/>Near Nabard Flat, H.L. Comm. College Road, <br/>Navrangpura, Ahmedabad- 380 009.<br/>Contact No: 09909840007, 08469255255, 079-26300007</p>
								</div>
							</div>
						</div>
                        <div class="col-md-4 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Email Address</h6>
									<p>learn@isas-pune.com,<br/> info@isas-pune.com.</p>
								</div>
							</div>
						</div>
                     </div>
                     <div class="row ">
                     	<div class="col-md-4 hide_address">
                            <div class="single-widget d-flex flex-wrap justify-content-between">
                                <div class="desc">
                                	<a href="http://isasbeautyschool.com/contact-us/"><h6 align="center" class="title text-uppercase">Our Branches</h6></a>
                                    <a href="http://isasbeautyschool.com/contact-us/"><h6 class="title text-uppercase">Pune Branch (Head Office)</h6></a>
                                    <a href="http://isasbeautyschool.com/contact-us/"><h6 class="title text-uppercase">Pune Branch (East)</h6></a>
                                    <a href="http://isasbeautyschool.com/contact-us/"><h6 class="title text-uppercase">Ahmedabad Branch</h6></a>
                                    <a href="http://isasbeautyschool.com/contact-us/"><h6 class="title text-uppercase">Mumbai Branch</h6></a>
                                    <a href="http://isasbeautyschool.com/contact-us/"><h6 class="title text-uppercase">Baramati Branch</h6></a>
                                </div>
                         	</div>
                     	</div>
                     </div>
				</div>
			</section>
			<!-- End Footer Widget Area -->
			<!-- Start footer Area -->
			<footer>
				<div class="container">
					<div class="footer-content d-flex justify-content-between align-items-center flex-wrap">
						<div class="logo">
							<img src="img/logo.png" width="100" height="60" alt="">
						</div>
						<div class="copy-right-text">Copyright &copy; 2017  |  All rights reserved to isasbeautyschool.com. </div>
						<div class="footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->
		</div>
<?php include 'include_js.php'; ?>
<style>
.scrollToTop{
	width:30px; 
	height:30px;
	padding:10px; 
	text-align:center; 
	
	font-weight: bold;
	color: #444;
	text-decoration: none;
	position:fixed;
	top:440px;
	right:40px;
	display:none;
	
}
.scrollToTop:hover{
	text-decoration:none;
}
</style>

<a href="#" class="scrollToTop"><img src="arrow1.png" height="35" width="35"></a>
    
<script>
$(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});
</script>
	</body>
</html>
