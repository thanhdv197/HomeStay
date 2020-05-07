@extends('Layout.layout')

@section('content')

<!-- start Main Wrapper -->
		<div class="main-wrapper">

			<div class="breadcrumb-wrapper">
			
				<div class="container booking-step">

					<div class="row gap-0">

						<div class="col-xs-12 col-sm-4">
							<div class="step-item active">
							
								<a href="#">
									
									<div class="line"></div>
									<div class="step-item">
										<div class="number"><div class="inner">1</div></div>
										<p>Select Room </p>
									</div>
									
								</a>
								
							</div>

						</div>
						
						<div class="col-xs-12 col-sm-4">
							<div class="step-item active">
							
								<a href="#">
									
									<div class="line"></div>
									<div class="step-item">
										<div class="number"><div class="inner">2</div></div>
										<p>Booking Details</p>
									</div>
									
								</a>
								
							</div>
							
						</div>
						
						<div class="col-xs-12 col-sm-4">
							<div class="step-item active">
							
								<a href="#">
									
									<div class="line"></div>
									<div class="step-item">
										<div class="number"><div class="inner">3</div></div>
										<p>Confirmation</p>
									</div>
									
								</a>
								
							</div>
							
						</div>
						
					</div>
					
				</div>


			</div>

			<div class="container">

				<div class="confirm-summary clearfix">
				
					<div class="image">
						<img src="{{ $post->accommodation_img }}" alt="Top Destinations">
					</div>
					<div class="heading">
						<div class="raty-wrapper sp-2 mb-5">
							<div class="star-rating-12px" data-rating-score="4"></div>
						</div>
						<h4>{{ $post->accommodation_name }}</h4>
						<p>{{ $post->accommodation_address }} - <a href="#" class="font13"><i class="fa fa-map-marker"></i> view on map</a></p>
					</div>
					<div class="content">
						
						<div class="confirm-date">
						
							<div class="icon">
								<i class="fa fa-calendar"></i>
							</div>
							
							<div class="content">
								<ul>
									<li><span class="absolute">Check-in: </span>{{ session('receive_room_day') }}</li>
									<li><span class="absolute">Check-out: </span>{{ session('return_room_day') }}</li>
								</ul>
							</div>
							
						</div>
						
					</div>
				
				</div>
			
				<div class="row mt-30">

					<div class="col-sm-6 mb-30" data-match-height="confirm">

						<div class="metro-box-wrapper equal-height">
								
							<div class="heading">
								<h3>Billing Information</h3>
							</div>

							<div class="content">
							
								<ul class="confirm-list">
								
									<li><span class="absolute font600">Customer Name:</span> {{ session('customer_name') }}</li>
									<li><span class="absolute font600">Customer Address:</span> {{ session('customer_address') }}</li>
									<li><span class="absolute font600">Phone Number: </span> {{ session('customer_phonenumber') }}</li>
									<li><span class="absolute font600">Email: </span> {{ session('customer_email') }}</li>

								</ul>
								
							</div>
						
						</div>
						
					</div>
					
					<div class="col-sm-6 mb-30" data-match-height="confirm">
					
						<div class="metro-box-wrapper equal-height">
								
							<div class="heading">
								<h3>Price Information</h3>
							</div>

							<div class="content">
							
								<ul class="confirm-list inverse">

									<li>
										<span class="absolute">{{ $room->price }} VND</span> 
										<span class="font600">{{ $room->room_name }}:</span><br/>
										{{ $room->utilities }}<br/>
										<span class="font600">Room Type: </span>
										{{ $room->RoomType->room_type_name }}
									</li>
									
									<li class="total bt mb-20">
										<span class="absolute"><span class="text-primary">{{ session('total') }} VND</span><br/>{{ $day }} Days</span> 
										<strong>Total</strong><br/>
									</li>

								</ul>
								
							</div>
						
						</div>
						
						
					</div>

				</div>
			
				<div class="text-right mb-50">
				
					<a href="{{ route('booking-edit-confirm') }}" class="btn btn-primary btn-lg btn-icon">Confirm and Book<span class="icon"><i class="pe-7s-angle-right"></i></span></a>

				</div>
			
			</div>
			
			<div class="clear"></div>
			
		</div>

@endsection