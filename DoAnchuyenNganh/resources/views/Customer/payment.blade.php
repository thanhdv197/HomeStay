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
								<div class="number">
									<div class="inner">1</div>
								</div>
								<p>Select Room </p>
							</div>

						</a>

					</div>

				</div>

				<div class="col-xs-12 col-sm-4">
					<div class="step-item active">

						<div class="line"></div>
						<div class="step-item">
							<div class="number">
								<div class="inner">2</div>
							</div>
							<p>Booking Details</p>
						</div>

					</div>

				</div>

				<div class="col-xs-12 col-sm-4">
					<div class="step-item">

						<div class="line"></div>
						<div class="step-item">
							<div class="number">
								<div class="inner">3</div>
							</div>
							<p>Confirmation</p>
						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="two-tone-layout">

		<div class="equal-content-sidebar">

			<div class="container">

				{{-- info post --}}
				<div id="sticky-sidebar" class="sidebar-wrapper ">

					<aside>

						<div class="mb-10"></div>

						<div class="room-page-right-sidebar alt">

							<div class="room-page-heading">

								<div class="meta-option clearfix mt-10">
									<div class="raty-wrapper sp-2 mb-5">
										<div class="star-rating-12px-alt" data-rating-score="4"></div>
									</div>
								</div>
								<h4>{{ $post->accommodation_name }}</h4>
								<p><i class="fa fa-map-marker"></i> {{ $post->city->city_name }}</p>
								<p> {{ $post->accommodation_address }}</p>

							</div>

							<div class="image">
								<img src="{{ $post->accommodation_img }}" alt="Top Destinations">
							</div>
		
							<div class="content mb-30">
								<h5>Price</h5>
								<ul class="inverse">

									@foreach ($post->room as $item)
										
									<li class="clearfix">
										<span class="absolute">{{ $item->price }} VND/ Day</span>
										{{ $item->room_name }}
									</li>

									@endforeach

								</ul>
							</div>

						</div>

						<div class="mb-30"></div>

					</aside>

				</div>

				<div class="content-wrapper">

					<div class="mb-10"></div>

					<div class="success-box">

						<div class="icon">

							<span><i class="ri ri-check-square"></i></span>

						</div>

						<div class="content">
							<h4>Great choice! You’re just 1 minute away from booking. </h4>
							<p>Fill in your details below to complete the booking. The host will then have 24 hours to
								accept your booking request. Once your booking is accepted, we will send you a
								confirmation email with the host’s contact details and the exact address of the
								property. </p>
						</div>

					</div>
					@if(session('thongbao'))
						<div class="alert alert-success">{{session('thongbao')}}</div>
					@endif
					<div class="metro-box-wrapper">
						@if(count($errors)>0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $item) 
									<li>{{$item}}</li>
								@endforeach
							</ul>
				
						</div>
						@endif
					</div>

					{{-- form --}}
					<form method="post" action="{{ route('booking-process') }}">
						@csrf
						{{-- customer information --}}
						<div class="metro-box-wrapper">

							<div class="heading">
								<h3>Billing Information</h3>
								@if (!Auth::check())
								<a data-toggle="modal" href="#loginModal">Already registered with Roomspoint? Login</a>
								@endif
							</div>

							<div class="content">

								<div class="form-horizontal">
									{{-- name --}}
									<div class="form-group">
										<label class="col-sm-4 col-md-2 control-label">Full Name</label>
										<div class="col-sm-6 col-md-6">
											<input type="text" class="form-control mb-0" placeholder="Full Name" value="{{Auth::user()->name??''}}"
												name="name">
										</div>
									</div>
									{{-- address --}}
									<div class="form-group">
										<label class="col-sm-4 col-md-2 control-label">Address</label>
										<div class="col-sm-6 col-md-6">
											<input type="text" class="form-control mb-0" placeholder="Adđress" value="{{Auth::user()->address??''}}"
												name="address">
										</div>
									</div>
									{{-- email --}}
									<div class="form-group">
										<label class="col-sm-4 col-md-2 control-label">Email Address</label>
										<div class="col-sm-6 col-md-6">
											<input type="email" class="form-control mb-0" placeholder="Email Address" value="{{Auth::user()->email??''}}"
												name="email">
										</div>
									</div>
									{{-- phonenumber --}}
									<div class="form-group">
										<label class="col-sm-4 col-md-2 control-label">Phone Number</label>
										<div class="col-sm-6 col-md-6">
											<input type="text" name="phonenumber" class="form-control mb-0" placeholder="Phone Number" value="{{Auth::user()->phonenumber??''}}">
										</div>
									</div>
									
								</div>

							</div>

						</div>

						{{-- room information --}}
						<div class="metro-box-wrapper">

							<div class="heading">
								<h3>Rooms and Guests</h3>
							</div>

							<div class="content">

								<p class="line18">You can choose the room which you want to stay with this vacation!</p>

								<div class="form-horizontal mt-15">
									<div class="form-group">
										<label class="col-sm-4 col-md-3"></label>
										<div class="col-sm-6 col-md-6">
											<h5 class="font700 mb-0 line20 uppercase">Room</h5>
										</div>
									</div>
									{{-- choose room --}}
									<div class="form-group">
										<label class="col-sm-4 col-md-3 control-label">Room </label>
										<div class="col-sm-6 col-md-6">
											<select class="custom-select" name="room_id">

												@foreach ($room as $item)
													
												<option value="{{ $item->id }}">{{ $item->room_name }}</option>

												@endforeach
												
											</select>
										</div>
									</div>
									{{-- receive room --}}
									<div class="form-group">
										<label class="col-sm-4 col-md-3 control-label">Receive room day</label>
										<div class="col-sm-6 col-md-6">
											<input type="date" name="receive_day" class="form-control mb-0" placeholder="Receive room">
										</div>
									</div>
									{{-- return room --}}
									<div class="form-group">
										<label class="col-sm-4 col-md-3 control-label">Return room day</label>
										<div class="col-sm-6 col-md-6">
											<input type="date" name="return_day" class="form-control mb-0" placeholder="Return room">
										</div>
									</div>
								</div>

							</div>

						</div>

						<div class="payment-congrate">

							<div class="inner">

								<input type="submit" class="btn" value="Book Now">

							</div>

						</div>

					</form>

					<div class="mb-40"></div>

				</div>

			</div>

		</div>

	</div>

	<div class="clear"></div>

</div>

@endsection