<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<?php include 'config_landing.php'; 
	
	if($_GET['c_id']!='')
	{
		$c_id=$_GET['c_id'];
	}
	else
		$c_id='all';
	
	$sel_cm="select cm_id from campaign where c_id='".$c_id."'";
	$ptr_cm=mysqli_query($sel_cm,$conn);
	$data_cm=mysqli_fetch_array($ptr_cm);
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
	<meta name="keywords" content="isasbeautyschool,beauty salon,makeup,hair classes,beauty classes">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>ISAS Beautyschool</title>
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
        <link rel="stylesheet" href="css/header-basic-light.css">
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
		 {	// var text = frm.mobile_no.value;
	 
			 var reg = /^\d{10}$/;
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
					url: 'submitform_landing.php',
					data: { name: name,email:email,mobile_no:mobile_no,c_name:'Cidesco',c_id:'<?php echo $c_id; ?>',cm_id:cm_ids,s_code:security_code },
				}).done(function(responseData) {
					
			   // $("#showdiv").html(responseData);
			   alert("Successfully Submitted");
			    //var sep=responseData.split('#');
				//if(sep[0]=='1')
				//{
					//$(this).hide();
					/*$('.window').hide();
					$('#mask').hide(); // Changes made on 5/7/19*/
					//alert(sep[1]);
					
					//setTimeout('document.location.href="https://isasbeautyschool.com/"');
				//}
				//else
				//{
					//alert(sep[1]);
				//}
				}).fail(function() {
					console.log('Failed');
				});
		
			}
		}

		</script>
    
	</head>
	<body >
    <?php
	$user_ip=$_SERVER['REMOTE_ADDR'];
	$c_id=$_GET['c_id'];
	$check_ip = mysqli_query("select userip from web_counter_pageview where userip='".$user_ip."' and c_id='".$c_id."'",$conn);
  	if(mysqli_num_rows($check_ip)>=1)
	{
	}
	else
	{
		$insertview = mysqli_query("insert into web_counter_pageview (`userip`,`c_id`) values('".$user_ip."','".$c_id."')",$conn);
		$updateview = mysqli_query("update web_counter_totalview set totalvisit = totalvisit+1 where c_id='".$c_id."' ",$conn);
	}
  	?>
    
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
                <input type="hidden" name="c_name" id="c_name" value="<?php //echo $_REQUEST['c_name']; ?>"/>
                <br /><br />
                <div id="popupfoot"><a onClick="submitform();" style="padding:6px;border: 2px solid #AA8278; border-radius: 4px;color:white;background-color:#582F2E;cursor:pointer;">I Agree </a></div>
            </form>
            </center>
        </div>
    </div>
    <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
</div>-->
<div id="boxes" <?php if($_REQUEST['is_form']=="show") echo 'style="display:block"'; else if($_REQUEST['is_form']=="hide") echo 'style="display:none"'; else echo 'style="display:block"';?>>
    <div style="display: none;" id="dialog" class="window"> 
       <!-- <div style="background-color:#AA8278;border-radius:10px;"><b style="color:white;"> Fill Details </b></div><br />-->
        <div id="lorem">
<div class='bold-line-popup'></div>
<div class='container_popup'>
  <div class='window_popup'>
    <div class='overlay_popup'></div>
    <div class='content_popup'>
      <!--<div class='welcome_popup' style="margin-top: 30px;"><b style="color:white;"><span style="color:#F00">H</span><span style="color:#33F">e</span>l<span style="color:#0F0">l</span><span style="color:#FF6">o</span> <span style="color:#F3C">T</span><span style="color:#900">h</span><span style="color:#6C3">e</span><span style="color:#CC3">r</span><span style="color:#F93">e</span><span style="color:#003">!</span></b></div>-->
      
      <div class='welcome_popup' style="margin-top: 30px;"><b style="color:white;"><span style="color:#003">HELLO THERE </span></b></div>
      
      <div class='subtitle_popup' style="margin-top: 15px;"><b style="color:#003;">We would like to send you better information, so kindly share your email address and whatsapp mobile number.</b></div>
      <form method="post" name="jqueryForm" id="jqueryForm" enctype="multipart/form-data" >
      <div class='input-fields-popup'>
        <input type='text' name="name" id="name" placeholder='Fullname' class='input-line full-width-popup input_popup'></input>
        <input type='email' placeholder='Email' name="email" id="email" class='input-line full-width-popup input_popup'></input>
        <input type='text' placeholder='Mobile Number' name="mobile_no" id="mobile_no"  class='input-line full-width-popup input_popup'></input>
       <span class="text-form"><font color="#333333" size="2"> </font></span> 
       <img  src="captcha/captcha.php" id="captcha" height="35px"/>
       <img src="captcha/refresh.png" id="change-image" style="cursor: pointer; padding: 8px 26px;" onClick="document.getElementById('captcha').src='captcha/captcha.php?'+Math.random();">
       	<input type='text' placeholder='Sequrity Code' name="captcha1" id="captcha1" class='input-line full-width-popup input_popup'></input>
      </div>
     <center> <div style="padding:2px 0px 20px 0px;"><a onClick="submitform();" class='ghost-round full-width-popup button_popup' style="padding:10px 30px 10px 30px;">I Agree </a></div></center>
     <center> <div style="padding:0px 0px 0px 0px;"><a onClick="javascript:$('.window').hide();$('#mask').hide();" class='ghost-round full-width-popup button_popup' style="padding:5px 20px 5px 20px;">Close</a></div></center> <!--window.location.href='https://isasbeautyschool.com'-->
      </form>
    </div>
  </div>
</div>
        </div>
    </div>
    <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
</div>
<div id="suggestPost"><a target="_blank" href="convForm-master/index.php?type=all" ></a></div>
		<div class="main-wrapper-first">
			<!--<header>
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
			</header>-->
            <header class="header-basic-light">
                <div class="header-limiter text-uppercase">
                    <a href="index_home.html"><img src="img/logo.png" style="margin:5px" alt="Home"></a>
                    <nav>
                        <a href="http://isasbeautyschool.com/">GO TO HOME</a>
                        <a href="http://isasbeautyschool.com/about-us/">About us</a>
                        <a href="http://isasbeautyschool.com/awards/">Award</a>
                        <a href="http://isasbeautyschool.com/gallery/">Gallery</a>
                        <a href="http://isasbeautyschool.com/event/">Event</a>
                        <a href="http://isasbeautyschool.com/contact-us/">Contact us</a>
                    </nav>
                </div>
            </header>
			<div class="banner-area">
				<div class="container">
					<div class="row justify-content-center height align-items-center" style="background-image: url('img/banner1.jpeg');background-repeat: no-repeat;background-size: cover;background-size: 100% auto;"><!---->
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
            <section class="featured-area" style="background:#CD2122;">
				<div class="container">
					<div class="row">
                    	<div class="col-md-12">
						<h5 style="color:#FFF">Our Mission is to  render highest quality training services in the Beauty Domain at competitive price and to elevate the beauty culture across the globe. Making ISAS a mark of Genuinely & trust and making a sincere effort to change people's lives... <a style="color:#8A8AFF" href="http://isasbeautyschool.com/about-us/" target="_blank">Read more</a></h5>
                        </div>
					</div>
				</div>
			</section>
            <!--End Mission Content-->
			
            <!-- Start Subscription Area -->
			<section class="subscription-area" style="background: url(img_online/bgimg1.jpg); ">
				<div class="container">
					<!--<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3>ACCREDITATION / AFFILIATION</h3>
								<span class="text-uppercase">All Courses Follow National & International Qualifications.</span>
							</div>
						</div>
					</div>-->
                    <div class="row">
						<div class="col-lg-6 col-sm-6">
							<div class="single-service">
								<div class="thumb2" style="background: url(img_online/content1c.png);">
									<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<!--<a href="http://isasbeautyschool.com" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>-->
									</div>
								</div>
							</div>
						</div>
                        <!--For mobile view don't show-->
                       
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/59.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/60.png);">
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-lg-6 col-sm-6">
                        	<div class="single-service">
								<div class="desc">
                                <h4 class="text-uppercase text-black">ISAS</h4>
									<p class="text-black" >- ISAS Is the first school to start the - CIDESCO Beauty & Spa Management Diploma in 2015. <br/> 
                                    - ISAS has conducted 9 Batches of CIDESCO Beauty & Spa Management Diploma since 2015. <br/>
                                    - ISAS has Highest Number of students Graduating for this course as yet. <br/>
                                    - ISAS has 100% Success/Passout rate as yet for this Diploma. <br/>
                                    - ISAS has vast experience in Online Training for this Diploma since 2016. <br/>
                                    - We are proud to have lots of success stories of graduated Students, securing top of the line international jobs and venturing into Beauty Business</p>
								</div>
							</div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                        	<div class="single-service">
								<div class="desc">
                                    <h4 class="text-uppercase text-black">Aim of the course</h4>
                                    <p class="text-black">To give candidates the required information to be able to efficiently
                                    and effectively operate in a business where fundamental basic
                                    managerial skills and techniques are required. The course is designed
                                    to give candidates a more comprehensive understanding of how to
                                    manage all aspects within a beauty salon and/or spa environment.
                                    Pre‐requisite.</p>
                                    <p>The Beauty & Spa Management diploma is available to any person
                                    wishing to obtain a higher understanding of the management within
                                    the Beauty and Spa Industry. No prior Beauty or Spa training is
                                    required for this diploma, although an understanding of the Beauty
                                    and Spa industry is an advantage.</p>
                                </div>
							</div>
                        </div>
                        
                        
                        
                        <!--<div class="col-lg-4 col-sm-6 show_courses">
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
                        </div>-->
                        
					
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
                    <!--<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3>ACCREDITATION / AFFILIATION</h3>
								<span class="text-uppercase">All Courses Follow National & International Qualifications.</span>
							</div>
						</div>
					</div>-->
                    
				</div>
			</section>
            <section class="subscription-area" style="background: url(img_online/bgimg1.jpg); ">
            	<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="section-title text-center">
                                <h2>CIDESCO DIPLOMA IN BEAUTY AND SPA MANAGEMENT</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-lg-3 col-sm-3 show_courses">
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/58.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <div class="single-service">
                                <div class="desc">
                                    <p class="text-black" >
                                    The most Prestigious Cidesco Diploma in Beauty &
                                    Spa Management is now available online 100%.
                                    ISAS, The Gurukul of Beauty, welcomes you to the
                                    Paradigm of Holistic Salon/ Spa Business
                                    Management Practises. ISAS is the only Beauty
                                    School in the world to have completed 9 Batches
                                    of of this Diploma since the Year 2015. Are you the
                                    Chosen one to take up the Salon / Spa Manager
                                    Position? Learn from the Masters and get eligible
                                    for this Challenging Role.Beauty Industry employs
                                    thousands of New Salon / Spa Manager every year,
                                    you could be one of the them, But will you?Cidesco
                                    Beauty & Spa Management Diploma covers all the
                                    aspects to make you a complete manager or
                                    Business Owner. 100% of the course will be
                                    conducted Online, even the exams. You need not
                                    come to the Institute to learn or Give Exams. ISAS
                                    also guides students post course completion for
                                    opening of their own salon. ISAS also gives
                                    continuous Mentorship guidance to students
                                    throughout their career and entrepreneurial
                                    journey.ISAS has lot of student success storing
                                    and placement overseas as well have loads of
                                    student starting their own venture. I S A S
                                    International beauty School has branches in India,
                                    Dubai and Saudi Arabia. ISAS graduated more than
                                    120 students last year for Cidesco Diploma
                                    Courses. ISAS is the Top Ranking Cidesco School in
                                    India.
                                    
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </setion>
			<!-- End SubscriptionCIDESCO Content Area -->
            
            
           <section class="subscription-area" style="background: url(img_online/bgimg1.jpg);">
            	<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="section-title text-center">
                                <h2>Syllabus</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-lg-6 col-sm-6">
                            <div class="single-service2">
                                <div class="desc">
                                	 <span class="text-uppercase"><h5>INTRODUCTION</h5></span>
                                     <hr/>
                                     <span class="text-uppercase"><h5>INTERNATIONAL AND NATIONAL SPA TRENDS AND TECHNOLOGY</h5></span>
                                        <p class="text-black" >
                                        Beauty and Spa Terminology
                                        Origin of Beauty Salon and Spa (History)<br/>
                                        Hydrotherapy<br/>
                                        The Four Cornerstones<br/>
                                        Latest Technologies<br/>
                                        Beauty, Spa and Wellness Industry <br/>
                                        Latest Research<br/>
                                        Beauty Salon and Spa Trends
                                        </p>
                                       <hr/>
                                     	<span class="text-uppercase"><h5>OPERATIONAL MANAGEMENT</h5></span>
                                     	<p class="text-black" >
                                        Time Management<br/>
                                        Analysing and Optimisin g Daily Bookings<br/>
                                        Treatment Menu and Recipes<br/>
                                        Beauty Salon and Spa Environme ntal Awareness<br/>
                                        Water Management<br/>
                                        Beauty Salon and Spa D aily Routine<br/>
                                        Hygiene<br/>
                                        The Importance of Front Office/Reception<br/>
                                       	Mystery Guest Reports<br/>
                                        Types of Client Feedback<br/>
                                        Occupational Health and Safety
                                        </p>
                                       <hr/>
                                       <span class="text-uppercase"><h5>LEADERSHIP</h5></span>
                                     	<p class="text-black" >
                                        Dealing with Staff<br/>
                                        Team and Leadership Values<br/>
                                        Team Building<br/>
                                        Delegation<br/>
                                        Priority Management<br/>
                                        Setting Goals<br/>
                                        Listening Skills<br/>
                                       	Dealing with Complaints<br/>
                                        Conducting Meetings<br/>
                                        Understanding Expectations<br/>
                                        Duty Roster Management
                                        </p>
                                       <hr/>
                                       <span class="text-uppercase"><h5>CONTINUED PROFESSIONAL DEVELOPLMENT</h5></span>
                                        <p class="text-black" >
                                        Internal and External Training<br/>
                                        Training Plan
                                        </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-service2">
                                <div class="desc">
                                	 	<span class="text-uppercase"><h5>STOCK CONTROL</h5></span>
                                     	<p class="text-black" >
                                        Value of Strict Control Measures<br/>
                                        Distributor/Product House Support and Advice<br/>
                                        Stock Counting<br/>
                                        Stock Take Timing<br/>
                                        Managing your Stock Room<br/>
                                        Stock Control in the Treatment Room<br/>
                                        Retail Stock<br/>
                                        Professional Stock<br/>
                                       	Controlling Theft and Cross-Checking
                                        </p>
                                       <hr/>
                                       <span class="text-uppercase"><h5>MARKETING AND CUSTOMER RELATIONS</h5></span>
                                     	<p class="text-black" >
                                        Establishing Customer Relationships/Service<br/>
                                        Advertising Mediums/Social Media<br/>
                                        Market Research and Analysis<br/>
                                        Business Success versus Failure<br/>
                                        Market Trends<br/>
                                        Branding<br/>
                                       	Retail and Sales Techniques
                                        </p>
                                       <hr/>
                                       <span class="text-uppercase"><h5>HUMAN RESOURCES</h5></span>
                                     	<p class="text-black" >
                                        Terminology and Job Descriptions<br/>
                                        Laws, Rules and Regulations<br/>
                                        Recruitment – Scree ning and Selection<br/>
                                        Methods of Interviewing<br/>
                                        Employment Process and Induction<br/>
                                        Exit Interviews<br/>
                                       	Performance Appraisals
                                        </p>
                                       <hr/>
                                       <span class="text-uppercase"><h5>FINANCE</h5></span>
                                     	<p class="text-black" >
                                        Daily Financial Responsibilities<br/>
                                        Petty Cash <br/>
                                        Target Management and Incentive
                                        </p>
                                       <hr/>
                                       <span class="text-uppercase"><h5>BUSINESS PLAN</h5></span>
                                     	<p class="text-black" >
                                        Planning and Starting the Business Plan<br/>
                                        The Key to Business Success<br/>
                                        The Business Plan
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </setion>
            
            <!--===================================OUR SUCCESS STORY==================================-->
           
			<section class="subscription-area" style="background: url(img_online/bgimg1.jpg); ">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h2>OUR STUDENT'S SUCCESS STORIES</h2>
								</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/61.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/62.png);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/63.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/64.png);">
                                </div>
                            </div>
                        </div>
                	</div>
                    <div class="row">
						<div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/65.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/66.png);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/67.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/68.png);">
                                </div>
                            </div>
                        </div>
                	</div>
                    <div class="row">
						<div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/69.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/70.png);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/71.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/72.png);">
                                </div>
                            </div>
                        </div>
                	</div>
                    <div class="row">
						<div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/73.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/74.png);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/75.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/76.png);">
                                </div>
                            </div>
                        </div>
                	</div>
                    
				</div>
			</section>
            <!--=========================================================================================-->
            <!-- Start Subscription Area -->
			<!--===================================ISAS at a Glance==================================-->
           
			<section class="subscription-area" style="background: url(img_online/bgimg1.jpg); ">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h2>ISAS at a Glance</h2>
								</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/78.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/79.png);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/80.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/81.png);">
                                </div>
                            </div>
                        </div>
                	</div>
                    <div class="row">
						<div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/82.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/86.png);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/84.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/85.png);">
                                </div>
                            </div>
                        </div>
                	</div>
                    <!--<div class="row">
						<div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/86.png);">
                                </div>                                    
                            </div>
                        </div>
                        
                	</div>-->
                </div>
			</section>
            <!--========================================End Subscription Area=================================================-->
			<!--===============================================OUR GRADUATE STUDENT===========================-->
           	<section class="subscription-area" style="background: url(img_online/bgimg1.jpg); ">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h2>Our CIDESCO Graduates</h2>
								</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-6 col-sm-6 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/47.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/48.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-8 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/50.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/49.jpeg);">
                                </div>
                            </div>
                        </div>
                	
						<div class="col-lg-7 col-sm-7 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/77.png);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/51.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/52.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/53.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/54.jpeg);">
                                </div>
                            </div>
                        </div>
                	
						<div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/43.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/44.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/45.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/46.jpeg);">
                                </div>
                            </div>
                        </div>
                	</div>
                    
                    
				</div>
			</section>
            
            <!----=========================================END==================================================-->
            
			<!-- Start Service Area -->
			<!--<section class="service-area">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3 class="text-white">Programs We Offers</h3>
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
									<p class="text-white">WordPress, the premier free open-source blogging utility, has gone through several upgrades in</p>
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
			</section>-->
			<!-- End Service Area -->
            
			<!-- Start Amazing Works Area -->
		</div>
		<div class="main-wrapper">
			<section class="amazing-works-area" style="background: url(img_online/bgimg1.jpg); ">
            		<div class="row justify-content-center">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2>International Certifications</h2>
								
							</div>
						</div>
					</div>
					<div class="active-works-carousel mt-40">
						<div class="item">
							<div class="thumb" style="background: url(img_online/41.jpeg);"></div>
							<div class="caption text-center">
								<h6 class="text-uppercase">CIDESCO</h6>
								
							</div>
						</div>
						<div class="item">
							<div class="thumb" style="background: url(img_online/42.jpeg);"></div>
							<div class="caption text-center">
								<h6 class="text-uppercase">VTCT</h6> 
								<!--<p>LCD screens are uniquely modern in style, and the liquid crystals that make them work have allowed humanity to</p>-->
							</div>
						</div>
					</div>
			</section>
            
            
            <!--===================================ISAS at a Glance==================================-->
           
			<section class="subscription-area" style="background: url(img_online/bgimg1.jpg); ">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h2>Campus Recruiters</h2>
								</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-2 col-sm-2 " >
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/1.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 " >
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/2.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 " >
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/3.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 " >
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/4.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 " >
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/5.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 " >
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/6.jpeg);">
                                </div>
                            </div>
                        </div>
                	</div>
                    <div class="row">
						<div class="col-lg-2 col-sm-2 " >
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/7.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 " >
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/8.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/9.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/10.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/11.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/12.jpeg);">
                                </div>
                            </div>
                        </div>
                	</div>
                    <div class="row">
						<div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/13.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/14.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/15.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/16.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/17.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/18.jpeg);">
                                </div>
                            </div>
                        </div>
                	</div>
                    <div class="row">
						
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/19.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/20.jpeg);">
                                </div>
                            </div>
                        </div>
                		<div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/21.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/22.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/23.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/24.jpeg);">
                                </div>
                            </div>
                        </div>
                	</div>
                    <div class="row">
						<div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/25.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/26.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/27.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/28.jpeg);">
                                </div>
                            </div>
                        </div>
                		<div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/29.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 ">
                            <div class="single-service">
                                <div class="thumb4" style="background: url(img_online/30.jpeg);">
                                </div>
                            </div>
                        </div>
                        
                	</div>
				</div>
			</section>
            <!--=========================================================================================-->
            <!--===============================================ISAS Ambiance===========================-->
           	<section class="subscription-area" style="background: url(img_online/bgimg1.jpg); ">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h2>ISAS Ambiance</h2>
								</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-4 col-sm-4 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/31.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/32.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/33.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/34.jpeg);">
                                </div>
                            </div>
                        </div>
                	
						<div class="col-lg-4 col-sm-4 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/35.jpg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 ">
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/36.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/37.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/39.jpeg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/38.jpeg);">
                                </div>
                            </div>
                        </div>
                	
						<div class="col-lg-6 col-sm-6 " >
                            <div class="single-service">
                                <div class="thumb2" style="background: url(img_online/87.jpeg);">
                                </div>                                    
                            </div>
                        </div>
                       
                	</div>
                    
                    
				</div>
			</section>
            
            <!----=========================================END==================================================-->
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
			<!--<section class="featured-area">
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
			</section>-->
			<!-- End Feature Area -->
			<!-- Start Footer Widget Area -->
			<section class="footer-widget-area">
				<div class="container">
					<div class="row">
						<div class="col-md-3 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Pune Branch (Head Office)</h6>
									<p>International School of Aesthetics and Spa 1st, 2nd & 3rd Floor,<br/> The Greens, North Main Road, Koregoan Park, Pune, Maharashtra, India 411001<br/>Contact No:+91 20 2615 0616, +91 91589 85007, +91 9545337869. </p>
								</div>
							</div>
						</div>
                        <div class="col-md-3 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Pune Branch (East)</h6>
									<p>Hari A1,Next to ABS Gym<br/>Pimple Nilakh, Pune, Maharashtra, India 411027.<br/>Contact No: 9607785007</p>
								</div>
							</div>
						</div>
                        <div class="col-md-3 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Dubai</h6>
									<p>ISAS Beauty School, Dubai, 308, 3rd Floor, Montano Commercial Center, Za'abeel street, Al Karama. www.isasbeauty.com <br/>+971 55 503 6328 </p>
								</div>
							</div>
						</div>
                        <div class="col-md-3 show_address">
							<div class="single-widget d-flex flex-wrap justify-content-between">
								<!--<div class="icon d-flex align-items-center justify-content-center">
									<span class="lnr lnr-pushpin"></span>
								</div>-->
								<div class="desc">
									<h6 class="title text-uppercase">Saudi Arebia</h6>
									<p>Velouté Academy, Prince Fawaz Bin Abdulaziz St, Ar Rabwah, Riyadh 12813, Saudi Arabia</p>
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
						<div class="col-md-3 show_address">
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
                        <div class="col-md-3 show_address">
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
                        <div class="col-md-3 show_address">
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
                        <div class="col-md-3 show_address">
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
                                    <a href="http://isasbeauty.com/contact-us/"><h6 class="title text-uppercase">Dubai Branch</h6></a>
                                    <a href="http://isasbeautyschool.com/contact-us/"><h6 class="title text-uppercase">Saudi Arebia Branch</h6></a>
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

	</body>
</html>
