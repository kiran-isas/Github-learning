<!DOCTYPE html>
<html lang="en">
<head>
	<title>convForm - example</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/jquery.convform.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="demo.css">
	
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>

<div class="container">
	<a id="modal_trigger" href="#modal" class="btn">Click here to Login or register</a>

	<div id="modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Fill Details</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Social Login -->
			<div class="social_login">
				<form>
					<label>Email </label>
					<br />
					<input type="text" />
					<br />

					<label>Mobile Number</label>
					<br />
					<input type="password" />
					<br /><br />

					

					<div class="action_btns">
						<div class="one_half last"><a href="#" class="btn btn_red">Login</a></div>
					</div>
				</form>
			</div>

		</section>
	</div>
</div>
	<section id="demo" style="background-color:#AA8278;">
	    <div class="vertical-align" style="background-color:#AA8278;">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0">
	                    <div class="card no-border">
	                        <div id="chat" class="conv-form-wrapper">
	                            <form action="" method="GET" class="hidden">
	                                <!-- <select conv-question="Hello! I'm a bot created from a HTML form. Can I show you some features? (this question comes from a select)">
	                                    <option value="yes">Yes</option>
	                                    <option value="sure">Sure!</option>
	                                </select>
	                                <input type="text" name="name" conv-question="Alright! First, tell me your full name, please.|Okay! Please, tell me your name first.">
	                                <input type="text" conv-question="Howdy, {name}:0! It's a pleasure to meet you. (note that this question doesn't expect any answer)" no-answer="true">
	                                <input type="text" conv-question="This plugin supports multi-select too. Let's see an example." no-answer="true">
	                                <select name="multi[]" conv-question="What kind of music do you like?" multiple>
	                                    <option value="Rock">Rock</option>
	                                    <option value="Pop">Pop</option>
	                                    <option value="Country">Country</option>
	                                    <option value="Classic">Classic</option>
	                                </select> -->
									
			<!------------------------ Hair  ----------------------------->
									
			<?php if($_REQUEST['type']=='basic_hair' || $_REQUEST['type']=='advance_hair' || $_REQUEST['type']=='creative_hair' || $_REQUEST['type']=='dip1_hair' || $_REQUEST['type']=='dip2_hair') {?>
			<select name="programmer" callback="hair" conv-question="Thanks For Showing intrest in <?php echo " :-> ".$_REQUEST['c_name']; ?>.">
			  <option value="<?php $_REQUEST['type'] ?>" callback="<?php $_REQUEST['type'] ?>">Know More</option>
			  <option value="all_hair">All Hair Courses</option>
			</select>
			<div conv-fork="programmer">
			 <div conv-case="yes">
			  <input type="text" conv-question="A fellow programmer! Cool." no-answer="true">
			 </div>
			<div conv-case="all_hair">
			 <select conv-question="Show All Hair Related Courses Here. Click to course Know More.">
			   <option value="basic_hair" callback="basic_hair">Basic Hair Dressing</option>
			   <option value="advance_hair" callback="advance_hair">Advance Hair Dressing</option>
			   <option value="creative_hair" callback="creative_hair">Creative Course in Hair Dressing</option>
			   <option value="dip1_hair" callback="dip1_hair">Dip in Hair dressing (Level 1 to 3)</option>
			   <option value="dip2_hair" callback="dip2_hair">Dip in Hair dressing (level – 2 & 3)</option>
			 </select>
			</div>
			</div>
			<?php } ?>
									
			<!------------------------end Hair  ----------------------------->
									
	                               <!--  <input type="text" conv-question="convForm also supports regex patterns. Look:" no-answer="true">
	                                <input conv-question="Type in your e-mail" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="email" type="email" name="email" required placeholder="What's your e-mail?">
	                                <input conv-question="Now tell me a secret (like a password)" type="password" data-minlength="6" id="senha" name="password" required placeholder="password">
									<select conv-question="Selects also support callback functions. For example, try one of these:">
											<option value="google" callback="google">Google</option>
											<option value="bing" callback="bing">Bing</option>
									</select> 
	                                <select name="callbackTest" conv-question="You can do some cool things with callback functions. Want to rollback to the 'programmer' question before?">
	                                    <option value="yes" callback="rollback">Yes</option>
	                                    <option value="no" callback="restore">No</option>
	                                </select>
	                                <select conv-question="This is it! If you like me, consider donating! If you need support, contact me. When the form gets to the end, the plugin submits it normally, like you had filled it." id="">
	                                    <option value="">Awesome!</option>
	                                </select> -->
									
			<!------------------------ Beauty  ----------------------------->

			<?php if($_REQUEST['type']=='basic_beauty' || $_REQUEST['type']=='advance_beauty' || $_REQUEST['type']=='cidesco_beauty' || $_REQUEST['type']=='dip_beauty') {?>
			 <select name="programmer1" callback="beauty" conv-question="Thanks For Showing interest in <?php echo " :-> ".$_REQUEST['c_name']; ?> " >
			   <option value="<?php echo $_REQUEST['type']; ?>" callback="<?php echo $_REQUEST['type']; ?>">Know More</option>
			   <option value="all_beauty">All Beauty Courses</option>
			 </select>
			<div conv-fork="programmer1">
			 <div conv-case="yes">
			   <input type="text" conv-question="A fellow programmer! Cool." no-answer="true">
			 </div>
			<div conv-case="all_beauty">
			  <select conv-question="Show All Hair Related Courses Here. Click to course Know More.">
			    <option value="basic_beauty" callback="basic_beauty">Basic Beauty Therapy Course</option>
			    <option value="advance_beauty" callback="advance_beauty">Advance Beauty Therapy Course</option>
			    <option value="cidesco_beauty" callback="cidesco_beauty">CIDESCO – Diploma in Beauty Therapy</option>
			    <option value="dip_beauty" callback="dip_beauty">Dip. in Beauty Therapy – Level (2 & 3) ( MCG – Manipal City & Guilds – India)</option>

			  </select>
			 </div>
			</div>
			<?php } ?>

			<!------------------------end Beauty  ----------------------------->


			<!------------------------ Integrated Long Term  ----------------------------->

			<?php if($_REQUEST['type']=='master_program' || $_REQUEST['type']=='post_graduate_diploma' || $_REQUEST['type']=='diploma_in_cosmetology') {?>
			  <select name="programmer2" callback="long_term" conv-question="Thanks For Showing interest in <?php echo " :-> ".$_REQUEST['c_name']; ?> " >
			    <option value="<?php echo $_REQUEST['type']; ?>" callback="<?php echo $_REQUEST['type']; ?>">Know More</option>
			    <option value="all_long_term">All Long Term Courses</option>
			  </select>
			<div conv-fork="programmer2">
			 <div conv-case="yes">
			  <input type="text" conv-question="A fellow programmer! Cool." no-answer="true">
			 </div>
			<div conv-case="all_long_term">
			  <select conv-question="Show All Integrated Long Term Related Courses Here. Click to course Know More.">
			    <option value="master_program" callback="master_program">Masters Program In Cosmetology</option>
			    <option value="post_graduate_diploma" callback="post_graduate_diploma">Post Graduate Diploma in Cosmetology</option>
			    <option value="diploma_in_cosmetology" callback="diploma_in_cosmetology">Diploma in Cosmetology</option>

			  </select>
			 </div>
			</div>
			<?php } ?>

			<!------------------------End Integrated Long Term  ----------------------------->
			
			<!------------------------ Integrated short Term  ----------------------------->

			<?php if($_REQUEST['type']=='short_term') {?>
			  <select name="programmer3" callback="short_term_course" conv-question="Thanks For Showing interest in <?php echo " :-> ".$_REQUEST['c_name']; ?> " >
			    <option value="<?php echo $_REQUEST['type']; ?>" callback="<?php echo $_REQUEST['type']; ?>">Know More</option>
			  </select>
			<?php } ?>
			
			<!------------------------End Integrated Long Term  ----------------------------->
			
			<!------------------------ Spa  ----------------------------->

			<?php if($_REQUEST['type']=='western_therapies' || $_REQUEST['type']=='asian_therapies' || $_REQUEST['type']=='foot_massage' || $_REQUEST['type']=='spa_therapy') {?>
			 <select name="programmer4" callback="spa" conv-question="Thanks For Showing interest in <?php echo " :-> ".$_REQUEST['c_name']; ?> " >
			   <option value="<?php echo $_REQUEST['type']; ?>" callback="<?php echo $_REQUEST['type']; ?>">Know More</option>
			   <option value="all_spa">All Spa Courses</option>
			 </select>
			<div conv-fork="programmer4">
			 <div conv-case="yes">
			   <input type="text" conv-question="A fellow programmer! Cool." no-answer="true">
			 </div>
			<div conv-case="all_spa">
			  <select conv-question="Show All Spa Related Courses Here. Click to course Know More.">
			    <option value="western_therapies" callback="western_therapies">Certificate course in Western Therapies</option>
			    <option value="asian_therapies" callback="asian_therapies">Certificate course in Asian Therapies</option>
			    <option value="foot_massage" callback="foot_massage">Certificate course in Foot massage and reflexology</option>
			    <option value="spa_therapy" callback="spa_therapy">Diploma in Spa Therapy</option>

			  </select>
			 </div>
			</div>
			<?php } ?>

			<!------------------------end spa  ----------------------------->
			
			<!------------------------ nail  ----------------------------->

			<?php if($_REQUEST['type']=='nail_art' || $_REQUEST['type']=='nail_extension') {?>
			 <select name="programmer5" callback="nail" conv-question="Thanks For Showing interest in <?php echo " :-> ".$_REQUEST['c_name']; ?> " >
			   <option value="<?php echo $_REQUEST['type']; ?>" callback="<?php echo $_REQUEST['type']; ?>">Know More</option>
			   <option value="all_nail">All Nail Courses</option>
			 </select>
			<div conv-fork="programmer5">
			 <div conv-case="yes">
			   <input type="text" conv-question="A fellow programmer! Cool." no-answer="true">
			 </div>
			<div conv-case="all_nail">
			  <select conv-question="Show All Nail Related Courses Here. Click to course Know More.">
			    <option value="nail_art" callback="nail_art">Nail Art</option>
			    <option value="nail_extension" callback="nail_extension">Nail Extension</option>
			    

			  </select>
			 </div>
			</div>
			<?php } ?>

			<!------------------------end nail  ----------------------------->
			
									<select name="callbackTest" conv-question="Want to go back">
	                                    <option value="yes" callback="rollback">Yes</option>
	                                    <option value="no" callback="restore">No</option>
	                                </select>
	                                <select conv-question="This is it! If you like me, consider donating! If you need support, contact me. When the form gets to the end, the plugin submits it normally, like you had filled it." id="">
	                                    
	                                </select>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	
	<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		$("#login_form").click(function(){
			$(".social_login").show();
			$(".user_login").hide();
			return false;
		});
	})
</script>
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="dist/autosize.min.js"></script>
	<script type="text/javascript" src="dist/jquery.convform.js"></script>

	<script>
	//---------------- hair -----------------
		function basic_hair() {
			window.open("http://isasbeautyschool.com/basic-hair-dressing/");
		}
		function advance_hair() {
			window.open("http://isasbeautyschool.com/advance-hair-dressing/");
		}
		function creative_hair() {
			window.open("http://isasbeautyschool.com/creative-course-in-hair-dressing-2/");
		}
		function dip1_hair() {
			window.open("http://isasbeautyschool.com/dip-in-hair-dressing-city-guilds-uk-level-1-to-3/");
		}
		function dip2_hair() {
			window.open("http://isasbeautyschool.com/dip-in-hair-dressing-level-2-3-mcg-manipal-city-guilds-india-2/");
		}
		
		//----------------end hair -----------------
		
		//---------------- beauty -----------------
		
			function basic_beauty() {
			window.open("http://isasbeautyschool.com/basic-beauty-therapy-course/");
		}
		function advance_beauty() {
			window.open("http://isasbeautyschool.com/advance-beauty-therapy-course/");
		}
		function cidesco_beauty() {
			window.open("http://isasbeautyschool.com/cidesco-diploma-in-beauty-therapy/");
		}
		function dip_beauty() {
			window.open("http://isasbeautyschool.com/dip-in-beauty-therapy-level-2-3-mcg-manipal-city-guilds-india-2/");
		}
		
		//----------------end beauty -----------------
		
		//---------------- long term -----------------
		
			function master_program() {
			window.open("http://isasbeautyschool.com/masters-program-in-cosmetology/");
		}
		function post_graduate_diploma() {
			window.open("http://isasbeautyschool.com/post-graduate-diploma-in-cosmetology/");
		}
		function diploma_in_cosmetology() {
			window.open("http://isasbeautyschool.com/diploma-in-cosmetology/");
		}
		
		//----------------end long term -----------------
		
		//---------------- short term -----------------
		
		function short_term() {
			window.open("http://isasbeautyschool.com/certificate-course-in-beauty-hair-and-make-up/");
		}		
		//----------------end short term -----------------
		
		//---------------- spa -----------------
		
			function western_therapies() {
			window.open("http://isasbeautyschool.com/certificate-course-in-western-therapies/");
		}
		function asian_therapies() {
			window.open("http://isasbeautyschool.com/certificate-course-in-asian-therapies/");
		}
		function foot_massage() {
			window.open("http://isasbeautyschool.com/certificate-course-in-foot-massage-and-reflexology-2/");
		}
		function spa_therapy() {
			window.open("http://isasbeautyschool.com/diploma-in-spa-therapy-2/");
		}
		
		//----------------end spa -----------------
		
		//---------------- nail -----------------
		
			function nail_art() {
			window.open("http://isasbeautyschool.com/nail-art-2/");
		}
		function nail_extension() {
			window.open("http://isasbeautyschool.com/nail-extension-temporary-permanent-with-gel-and-acrylic-2/");
		}
				
		//----------------end nail  -----------------
		
		var rollbackTo = false;
		var originalState = false;
		function hair(stateWrapper) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
		}
		function beauty(stateWrapper) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
		}
		function spa(stateWrapper) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
		}
		function long_term(stateWrapper) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
		}
		function short_term_course(stateWrapper) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
		}
		function nail(stateWrapper) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
		}
		function rollback(stateWrapper) {
			console.log("rollback called: ", rollbackTo, originalState);
			console.log("answers at the time of user input: ", stateWrapper.answers);
			if(rollbackTo!=false) {
				if(originalState==false) {
					originalState = stateWrapper.current.next;
						console.log('stored original state');
				}
				stateWrapper.current.next = rollbackTo;
				console.log('changed current.next to rollbackTo');
			}
		}
		function restore(stateWrapper) {
			if(originalState != false) {
				stateWrapper.current.next = originalState;
				console.log('changed current.next to originalState');
			}
		}
	</script>
</body>
</html>
