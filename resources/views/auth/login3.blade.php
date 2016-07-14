
<!DOCTYPE html>

<html lang="en">
<head>

<!-- Html Page Specific -->
<!--BEGIN header -->
<meta charset="utf-8">
<title>SARIS</title>
<meta name="description" content="Kamuzu college of nursing malawi saris">
<meta name="author" content="kcn development team">

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

<!--[if lt IE 9]>
    <script type="text/javascript" src="scripts/html5shiv.js"></script>
<![endif]--> 

<!-- CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
<link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
<link rel="stylesheet" href="{{asset('css/simple-line-icons.css')}}"/>
<link rel="stylesheet" href="{{asset('css/style.css')}}"/>

<!-- Favicons -->
<link rel="icon" href="{{asset('images/favicon.ico')}}">
<link rel="apple-touch-icon" href="{{asset('images/apple-touch-icon.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/apple-touch-icon-114x114.png')}}">

</head>

<body>

<!-- PRELOADER -->
<div id="preloader">
	<div class="clock">
		<div class="arrow_sec"></div>
		<div class="arrow_min"></div>
	</div>
</div>

<div id="wrap"> 
	
	
	<header id="header">
		<div class="container"> <a href="#" class="logo"> <img src="{{asset('images/logo.png')}}" alt="Kamuzu College of Nursing" height="40" width="45" /> </a> <a class="login_btn" href="{URL}">Register</a>
			<ul class="soc_nav">
				<li><a href="#" class="icon-social-dribbble"></a></li>
				<li><a href="#" class="icon-social-facebook"></a></li>
				<li><a href="#" class="icon-social-twitter"></a></li>
			</ul>
		</div>
	</header>
	<!--END header -->
	
	<!--BEGIN login -->
	<section id="intro">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-7 col-sm-6">
					<div class="slogan" >
						<h2 class="wow fadeInRight" data-wow-delay="0.6s" data-wow-duration="0.5s">SARIS</h2>
						<h3 class="wow fadeInLeft" data-wow-delay="0.9s" data-wow-duration="0.5s">Student Academic Records Information System</h3>
						<p class="wow fadeInRight" data-wow-delay="1.2s">This is an opensource system for Kamuzu College of Nursing to assist in registration of students, financial recording, examination grades records, transcript generation, student accommodation management, and keeping student records.</p>
					</div>
				</div>
				
				<div class="col-lg-4 col-lg-offset-2 col-md-5 col-sm-6">
					
					
					<form  name="login" action="{ACTION}" method="POST">
						<div class="title wow flipInX" data-wow-duration="0.6s">  Login </div>
						<div class="form-group">
							<input type="text" class="form-control wow flipInX" data-wow-delay="0.8s" data-wow-duration="0.2s" id="username" placeholder="Username/Email" name="username">
						</div>
						<div class="form-group">
							<input type="password" class="form-control wow flipInX" data-wow-delay="1.4s" data-wow-duration="0.2s" id="password" placeholder="Password" name="password">
						</div>
						<button type="submit" class="btn btn_start wow flipInX" data-wow-delay="1.6s" data-wow-duration="0.2s">Start</button>
						<input type="hidden" name="loginform" value="login">
					</form>
					
				</div>
			</div>
		</div>
		<div id="slides" data-stellar-ratio="0.4">
			<div class="slides-container" > <img src="images/1.jpg" alt=""> <img src="images/2.jpg" alt=""> <img src="images/3.jpg" alt=""> </div>
		</div>
	</section>
	<!--END login -->


		<!--BEGIN footer -->
		<section id="services">
			<div class="container">
				<div class="row">
					<div class="col-md-4 service"> <i class="icon-screen-desktop"></i>
						<h4>Saris Demo Tutorial</h4>
						<p>For tutorial walk through on how to use Saris <a href="https://drive.google.com/file/d/0B-myFvx6NCRWaWJLcHNTU2dDQlE/edit?usp=sharing">click this here</a> </p>
					</div>
					<div class="col-md-4 service"> <i class="icon-doc"></i>
						<h4>Saris Mobile</h4>
						<p>The Mobile app enable you to access saris on your android phone, it is easy to use and navigate <a href="#">click here for more details </a> </p>
					</div>
					<div class="col-md-4 service"> <i class="icon-chemistry"></i>
						<h4>New Improvements</h4>
						<p>Saris have been redisigned to suit KCN new dynamic need. check on features </p>
					</div>
					<div class="clearfix visible-lg visible-md"></div>
				
				</div>
			</div>
		</section>
		<!-- SERVICES END --> 
	
		<!-- FEATURES BEGIN -->
		<section id="features">
			<div id="feature_img"> </div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3>Fresh features</h3>
						<ul class="triangle_list">
							<li>New outlook and feel</li>
							<li>Improved finance module to check fees balances</li>
							<li>Improved Students Voting </li>
							<li>Mobile android version</li>
						</ul>
						<a href="" class="round_btn_dark">More features</a> </div>
					<div class="col-md-6"> </div>
				</div>
			</div>
		</section>
		<!-- FEATURES END --> 
	
	
		<!-- FAQ BEGIN-->
		<section id="faq">
			<div class="container">
				<h3>FAQ</h3>
				<div class="row">
					<div class="col-md-6">
							<div class="panel">
								<a class="panel-heading" data-toggle="collapse" href="#question1">Failing to log into Saris</a> 
								<div id="question1" class="panel-collapse collapse in">
									<div class="panel-body">
										This is due to several factors, you have forgotten your password.... 
									</div>
								</div>
							</div>
							<div class="panel">
								<a class="panel-heading collapsed" data-toggle="collapse" href="#question2">Forgotten my Password</a>
								<div id="question2" class="panel-collapse collapse">
									<div class="panel-body">
										reset password, you have to provide your registration number and date of birth here is the link
									</div>
								</div>
							</div>
							<div class="panel">
								<a class="panel-heading collapsed" data-toggle="collapse" href="#question3">I can not see my exam results</a>
								<div id="question3" class="panel-collapse collapse">
									<div class="panel-body">
									
									</div>
								</div>
							</div>
					</div>
					<div class="col-md-6">
							<div class="panel">
								<a class="panel-heading collapsed" data-toggle="collapse" href="#question4">I have accidentally dropped a course</a> 
								<div id="question4" class="panel-collapse collapse">
									<div class="panel-body">
									 
									</div>
								</div>
							</div>
							<div class="panel">
								<a class="panel-heading collapsed" data-toggle="collapse" href="#question5">How to vote for student representative</a>
								<div id="question5" class="panel-collapse collapse">
									<div class="panel-body">
									
									</div>
								</div>
							</div>
							<div class="panel">
								<a class="panel-heading" data-toggle="collapse" href="#question6">How can i register courses</a>
								<div id="question6" class="panel-collapse collapse  in">
									<div class="panel-body">
									
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</section>
		<!-- FAQ END-->

	
		<!-- CONTACT BEGIN-->
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h4>Contact us</h4>
							<ul class="contact_data_list">
								<li><i class="icon-call-in"></i>In Lilongwe +26517..., In Blantyre +26518..</li>
								<li><i class="icon-pointer"></i> Address,  Postal code,  City,  Country</li>
								<li><i class="icon-envelope"></i> ictsupport@kcn.unima.mw</li>
							</ul>
					</div>
					<div class="col-md-5">
						<h4>Subscribe</h4>
						<form action="scripts/subscribe.php" method="post" id="subscribe_form">
	                                <div class="input-group">
	                                    <input class="form-control" type="email" name="email" id="subscribe_email" placeholder="Enter your email here">
	                                    <div class="input-group-btn">
	                                        <button class="btn" type="submit" id="subscribe_submit"><i class="icon-envelope"></i></button>
	                                    </div>
	                                </div>
	                     </form>
						 <p>Subscribe to our newsletter, actions and updates</p>
					</div>
					<div class="col-md-3">
						<h4>Follow us</h4>
						<ul class="soc_nav">
							<li><a href="#" class="icon-social-dribbble"></a></li>
							<li><a href="#" class="icon-social-facebook"></a></li>
							<li><a href="#" class="icon-social-twitter"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- CONTACT END-->
	
	
	
		<!-- FOOTER BEGIN -->
		<footer id="footer">
			<div class="container">
				<a href="#" class="logo"> <img src="{{asset('images/logo_dark.png')}}" alt="Best start for your business" height="40" width="45" /> </a>
				<p>&copy; {FOOTER_TITTLE} <br> Designed by kcn ICT development team</p>
			</div>
		</footer>
		<!-- FOOTER END --> 
	
	</div>

	<!-- JavaScript -->
	<script src="{{asset('scripts/jquery-1.8.2.min.js')}}"></script> 
	<script src="{{asset('scripts/bootstrap.min.js')}}"></script> 
	<script src="{{asset('scripts/owl.carousel.min.js')}}"></script> 
	<script src="{{asset('scripts/jquery.validate.min.js')}}"></script> 
	<script src="{{asset('scripts/wow.min.js')}}"></script> 
	<script src="{{asset('scripts/smoothscroll.js')}}"></script>
	<script src="{{asset('scripts/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('scripts/jquery.superslides.min.js')}}"></script>
	<script src="{{asset('scripts/placeholders.jquery.min.js')}}"></script>
	<script src="{{asset('scripts/custom.js')}}"></script>

	<!--[if lte IE 9]>
		<script src="scripts/respond.min.js"></script>	
	<![endif]--> 
	</body>
	</html>
	<!--END footer -->
	
	
	
	