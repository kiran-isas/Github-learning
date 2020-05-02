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
	<meta name="keywords" content="isasbeautyschool,beauty salon,makeup,hair classes,beauty classes">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Salon Services - Innocent Salon</title>
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
		 {	  var reg = /^\d{10}$/;
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
					data: {name: name,email:email,mobile_no:mobile_no,c_name:'Cidesco',c_id:'<?php echo $_GET['c_id']; ?>',cm_id:cm_ids,s_code:security_code,type:'service' },
				}).done(function(responseData) {
					
			   // $("#showdiv").html(responseData);
			    var sep=responseData.split('#');
				if(sep[0]=='1')
				{
					$(this).hide();
					/*$('.window').hide();
					$('#mask').hide(); // Changes made on 5/7/19*/
					alert(sep[1]);
					
					setTimeout('document.location.href="http://isasbeautyschool.com/certificate-course-in-salonspa-management-2/"');
				}
				else
				{
					alert(sep[1]);
				}
				}).fail(function() {
					console.log('Failed');
				});
		
			}
		}
		</script>
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
    <div id="suggestPost"><a target="_blank" href="convForm-master/index.php?type=diploma_in_cosmetology&c_name=Dipoma In Cosmetology" ></a></div>
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
    </div>
    <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
</div> -->
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
					<div class="row justify-content-center height align-items-center" style="background-image: url('img/Innocent Pune.jpg');background-repeat: no-repeat;background-size: cover;background-size: 100% auto;"><!---->
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
			
            
            <section class="subscription-area" style="background:cornsilk;">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="section-title text-center">
								<h3>OUR AIM TO PROVIDE BEAUTY SERVICES WITH A TOUCH OF INNOCENCE AS YOU ALWAYS LONGED FOR.</h3>
							
							</div>
						</div>
					</div>
					<center>Innocent beauty salon is a genuine effort to render high quality, result oriented, international beauty treatment at affordable rates. Innocent takes pride in communicating that it is the only salon in Pune to render beauty treatment with 9 different International cosmetic brands.</center> 


<center> Known for it's Signature Treatments, Innocent has a variety of services that will suit all of your pampering needs. We offer best of best Facials, Hair Services, Spa  Treatments, Nail Services using international Cosmetics only. We also Specialise in Bridal Makeup and take large scale bridal and Pre-Bridal orders.

</center> 
					
                    <div class="row">
                   
				   <div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<div class="thumb" style="background: url(img/e_hail.jpg);height: 16rem !important;">
									<!--<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/cidesco-swiss/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>-->
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">EXOTIC HAIR SPA - BIO TOP - USA</h6>
									<b>Details :-</b>
									<p>Treatments using exotic oils and pastes can be a boon for thinning, heated tresses this time of the year
It's certainly hot and while you're watching your diet and eating right, also ensure you take care of your hair, which faces damage due to the heat.</p>
									</br>
									<b> Other Hair Spa Treatments </b>
									<p class="text-black">*Cellular Repair</p>
									<p class="text-black">*Power Dose</p>
									<p class="text-black">*Force Refill​</p>
									<p class="text-black">*Pro Keratin</p>
									<p class="text-black">*Scalp Treatment</p>
									<p class="text-black">*Head Massage</p>
									<p class="text-black">*Waxing</p>
									<p class="text-black">*Hair Smoothening / Straightening</p>
									<p class="text-black">*​Rebonding</p>
									<p class="text-black">*Kerating</p>
									<p class="text-black">*​Perming</p>
                                  
								</div>
							</div>
						</div>
				   
				   
                   <div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<div class="thumb" style="background: url(img/body_polish.jpg);height: 16rem !important;">
									<!--<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/cidesco-swiss/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>-->
								</div>
								<div class="desc">
									<h6 class="text-uppercase text-black">CLEOPATRA BODY POLISH - OLIGODEMIE - FRANCE</h6>
									<b>Details :-</b>
									<p>The presence of active ingredients reduces water loss from the body, and moisturizes
and soothes the body. The body wrapping with cotton extract, has a delicious jasmine
fragrance. It soothes the body and spirit and gives total relaxation. Lifts the moisture level
& leaves the body with lustrous glow and silky texture skin. Enjoy a skin brightening
experience.</p></br>
									<b> Other Body Treatments </b>
									<p class="text-black">* Body Ex foliation </p>
									<p class="text-black">* Minero Body Relaxing Treatment </p>
									<p class="text-black">* Shiatsu Massage </p>
									<p class="text-black">* Back Detox Treatment </p>
									<p class="text-black">* Cellulite Breaker Treatment </p>
									<p class="text-black">* Body Firming Treatment </p><p class="text-black">* Moisturizing Body Treatment </p><p class="text-black">* Lava Shells Body Treatment </p><p class="text-black">* Hot Stone Body Treatment </p>
                                    
								</div>
							</div>
						</div>
                        
                        
                        <div class="col-lg-4 col-sm-6" >
                                <div class="single-service">
                                    <div class="thumb" style="background: url(img/bridal.jpg);height: 16rem !important;">
                                        <!--<div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                            <a href="http://isasbeautyschool.com/vtct/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                        </div>-->
                                    </div>
                                    <div class="desc">
                              
                                         <h6 class="text-uppercase text-black">BRIDAL AIR BRUSH MAKEUP - TEMPTU - USA</h6>
										 <b>Details :-</b>
										 <p> Customize your beauty look with our one-of-a-kind, buildable airbrush makeup engineered to mimic flawless skin.Achieve a natural-looking, skin-perfecting finish with our iconic, professional 4-in-1 formula that is designed to work as foundation, primer, concealer and corrector. </br>
												1. Natural-looking, skin-perfecting finish </br>
												2. Superior imperfection correction </br>
												3. Customizable levels of coverage
										</p>
										 </br>
										<b>Other Makeup Services</b>
										<p class="text-black">*   Party Makeup </p>
										<p class="text-black">* Engagement / Roka Makeup </p>
										<p class="text-black">* Reception Makeup </p>
										<p class="text-black">* Groom Makeup </p>

										<p class="text-black">* Pre Bridal Makeup </p>
										<p class="text-black">* ​Bridal Makeup (Kryolan) </p>
										<p class="text-black">* Bridal Makeup (Mac) </p>
										<p class="text-black">* Air Brush Makeup </p>
                                        
                                    </div>
                                </div>
                            </div>
                        
						  <div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<div class="thumb" style="background: url(img/facial.jpg);height: 16rem !important;">
									<!--<div class="overlay overlay-content d-flex justify-content-center align-items-center">
										<a href="http://isasbeautyschool.com/cidesco-swiss/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
									</div>-->
								</div>
								<div class="desc">
								
                                        <h6 class="text-uppercase text-black"> SNOW WHITE BRIGHTENING FACIAL - REMY LAURE - FRANCE</h6>
										<b> Details :-</b><p>It is highly effective melanin inhibitor complex (based on botanical) returns
your skin to its fairest and most translucent look. This brightening program
contains two masks providing a flawless radiance while protecting the skin
as it contains 90% UV filters.</p></br>
										<b> Other Brightening Facial </b>
                                        <p class="text-black">* Sheer Magic Treatment </p>
										<p class="text-black">*	Optimum Magic Treatment</p>
										<p class="text-black">*	Whitening Treatment</p>
										<p class="text-black">*	​Lava Shells Instant Brightening</p>
                                    
                                    
								</div>
							</div>
						</div>
                        <!--For mobile view don't show-->
                            <div class="col-lg-4 col-sm-6" >
                                <div class="single-service">
                                    <div class="thumb" style="background: url(img/n_ext.jpg);height: 16rem !important;">
                                        <!--<div class="overlay overlay-content d-flex justify-content-center align-items-center">
                                            <a href="http://isasbeautyschool.com/vtct/" class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Know More</span><span class="lnr lnr-arrow-right"></span></a>
                                        </div>-->
                                    </div>
                                    <div class="desc">
                                         <h6 class="text-uppercase text-black">GEL NAIL EXTENTIONS - ORLY - USA</h6>
										 <b>Details :- </b>
										 <p>The Orly GelFx Manicure system ensures incredibly durable, chip-free manicures for 2 weeks with superior shine and easy removal. Gel FX also dries in half the time.</p>
										 </br>
										 <b>Other Nail Services</b>
                                        <p class="text-black">* Nail Art </p>
										 <p class="text-black">*	Nail Extension (Acrylic)</p>
										 <p class="text-black">*	Nail Extension (Gel)</p>
										 <p class="text-black">*	​Gelicure</p>
										 <p class="text-black">*	Stick on Nail Extension</p>
										 <p class="text-black">*	​Nail Art Stickers</p>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                           
                           
                          
                            
                            
						<!--</div>For mobile view don't show-->
                        
					</div>
					
				</div>
			</section>
            
         
            
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
							<div class="thumb" style="background: url(img/mic1.jpg);"></div>
							<div class="caption text-center">
								<h6 class="text-uppercase">Diploma in Cosmetology</h6>
								<!--<p>Pune Fashion Week 2017</p>-->
							</div>
						</div>
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
