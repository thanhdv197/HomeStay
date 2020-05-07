@extends('Layout.layout')

@section('content')

<!-- start Main Wrapper -->
		<div class="main-wrapper">

			<div class="breadcrumb-wrapper">
			
				<div class="container">

					<div class="row">
					
						<div class="col-xs-12 col-sm-8">
							<ol class="breadcrumb">
								<li><a href="#">Home</a></li>
								<li class="active">Contact Us</li>
							</ol>
						</div>
						
						<div class="col-xs-12 col-sm-4 hidden-xs">
							<p class="hot-line"> <i class="fa fa-phone"></i> Hot Line: 1-222-33658</p>
						</div>
						
					</div>

				</div>

			</div>

			<div class="full-contact-map-wrapper map-wrapper">
				<div id="contact-map" class="full-contact-map"></div>
				<div class="absolute-contact-info">
					<div class="container">
						<div class="content clearfix">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="item">
										<i class="fa fa-map-marker"></i> 324 Yarang Road, T.Chabangtigo, Muanng Pattani 9400
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="item">
										<i class="fa fa-phone"></i> +66-2-998-985
									</div>
								</div>
								<div class="col-xs-12 col-sm-3">
									<div class="pull-right xs-pull-left">
									<div class="item more-pl">
										<i class="fa fa-envelope"></i> <a href="#">support@extrition.com</a>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container mt-50 mb-50">
			
				<div class="section-title-3">
					<h2>Contact Us</h2>
					<p class="font500">We love to we hear from you. Keep in touch</p>
				</div>
				
				<div class="clear mb-10"></div>
				
				<form class="contact-form" id="contactForm" method="get" action="#">
				
					<div class="row">
					
						<div class="col-sm-6">
						
							<div class="form-group mb-25">
								<input type="text" class="form-control" placeholder="Your Name" name="yourname">
							</div>

							<div class="form-group mb-25">
								<input type="email" class="form-control" placeholder="Email Address" name="contactEmail">
							</div>
							
							<div class="form-group mb-25">
								<input type="text" class="form-control" placeholder="Your Subject" name="subject">
							</div>
							
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Your Phone Number" name="Phone">
							</div>
							
						</div>
						
						<div class="col-sm-6">
						
							<div class="form-group">
								<textarea class="form-control" rows="8" placeholder="Message" name="contactMessage"></textarea>
							</div>
							
						</div>
						
					</div>

					<div class="clear"></div>
					
					<div class="pull-right">
						<input type="submit" class="btn btn-danger" value="Submit">
					</div>
				
				</form>
				
				<div class="clear"></div>
				
				<div class="travel-quote-banner mt-50" style="background-image:url('extretion/images/travel-quote-banner/01.jpg');">
				
					<div class="content">
					
						<p class="saying">"A journey is best measured in friends, rather than miles."</p>
						<p class="sayer"><span>Tim Cahill</span></p>
						
						<div class="text-center mt-40">
							<a href="#">Search Your Trip</a>
						</div>
						
					</div>
					
				</div>
				
			</div>
			
			<div class="clear"></div>

			<footer class="main-footer">
			
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-12 col-sm-5 col-md-6">
						
							<div class="row">
								<div class="footer-about col-sm-10 col-md-8">
									<div class="footer-logo">
										<a href="#home">EXTRETION</a>
									</div>
								
								<p class="about-us-footer">Abilities or he perfectly pretended so strangers be exquisite. Oh to another chamber pleased imagine do in. Went me rank at last loud shot an draw. Excellent so to no sincerity smallness... <a href="#" class="font-italic bb-dotted">read more</a></p>
								
								<p class="copy-right font12">&#169; Copyright 2015 EXTRETION - Responsive Template.</p>
								
								</div>
							</div>
						
						</div>
						
						<div class="col-sm-12 col-sm-7 col-md-6">

							<div class="row gap-20">
							
								<div class="col-xss-6 col-xs-4 col-sm-4 mt-30-xs">
								
									<h4 class="footer-title">Company</h4>
									
									<ul class="menu-footer">
										<li><a href="#">About</a></li>
										<li><a href="#">Careers</a></li>
										<li><a href="#">Partners</a></li>
										<li><a href="#">Community</a></li>
										<li><a href="#">Terms</a></li>
										<li><a href="#">Privacy</a></li>
									</ul>
									
								</div>
								
								<div class="col-xss-6 col-xs-4 col-sm-4 mt-30-xs">
								
									<h4 class="footer-title">Discover</h4>
									
									<ul class="menu-footer">
										<li><a href="#">Adventure</a></li>
										<li><a href="#">Beach</a></li>
										<li><a href="#">City</a></li>
										<li><a href="#">Pack Pack</a></li>
										<li><a href="#">Honeymoon</a></li>
										<li><a href="#">Trekking</a></li>
									</ul>
									
								</div>
								
								<div class="col-xss-12 col-xs-4 col-sm-4 mt-30-xs">
								
									<h4 class="footer-title">Socials</h4>
									
									<ul class="menu-footer for-social">
										<li><a href="#"><i class="fa fa-facebook-official mr-5"></i> Facebook</a></li>
										<li><a href="#"><i class="fa fa-twitter mr-5"></i> Twitter</a></li>
										<li><a href="#"><i class="fa fa-google-plus mr-5"></i> Google Plus</a></li>
										<li><a href="#"><i class="fa fa-codepen mr-5"></i> Codepen</a></li>
										<li><a href="#"><i class="fa fa-behance mr-5"></i> Behance</a></li>
										<li><a href="#"><i class="fa fa-github mr-5"></i> Github</a></li>
									</ul>
									
								</div>
							
							</div>
						
						</div>
						
					</div>
					
				</div>
				
			</footer>
			
		</div>

@endsection