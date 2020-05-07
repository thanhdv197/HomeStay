@extends('Layout.layout')
@section('content')
<!-- start Main Wrapper -->
<div class="main-wrapper">

	<div class="breadcrumb-wrapper">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-8">
					<ol class="breadcrumb">
						<li><a href="{{ url('/index') }}">Home</a></li>
						<li><a href="#">Room Details</a></li>
						<li class="active">Feature Rooms</li>
					</ol>
				</div>

				<div class="col-xs-12 col-sm-4 hidden-xs">
					<p class="hot-line"> <i class="fa fa-phone"></i> Hot Line: 1-222-33658</p>
				</div>

			</div>

		</div>

	</div>

	<div class="two-tone-layout">

		<div class="equal-content-sidebar">

			<div class="container">

				<div id="sticky-sidebar" class="sidebar-wrapper ">

					<aside>

						<div class="mb-10 mb-5-sm"></div>

						<div class="detail-right-sidebar">

							<div class="price">

								<div class="clear mb-10"></div>

								<a href="{{ route('book-room', $post->id) }}"
									class="btn btn-block btn-danger btn-icon anchor mt-5">Select room <span
										class="icon"><i class="fa fa-check-square-o"></i></span></a>

								<div class="or-text"><span><span>or change your search</span></span></div>

							</div>

							{{-- search and booking --}}
							<div class="detail-search-form">
								<div class="inner">
									<form class="gap-10">
										<div class="col-xs-12 col-sm-12">
											<div class="form-group form-icon-right mb-10">
												<label>Where do you want to go?</label>
												<input type="text" class="form-control mb-0"
													placeholder="City or Airport">
												<i class="fa fa-map-marker"></i>
											</div>
										</div>
										<div class="col-xs-6 col-sm-6">
											<div class="form-group form-icon-right mb-10">
												<label>Check-in</label>
												<input name="arrival_date" class="form-control mb-0" id="dpd1"
													placeholder="Check-in" type="text">
												<i class="fa fa-calendar"></i>
											</div>
										</div>
										<div class="col-xs-6 col-sm-6">
											<div class="form-group form-icon-right mb-10">
												<label>Check-out</label>
												<input name="departure_date" class="form-control mb-0" id="dpd2"
													placeholder="Check-out" type="text">
												<i class="fa fa-calendar"></i>
											</div>
										</div>
										<div class="col-xs-4 col-sm-4">
											<div class="form-group">
												<label>Rooms</label>
												<select class="custom-select" id="change-search-room">
													<option value="0">Room</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4‎</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-4">

											<div class="form-group">
												<label>Adults</label>
												<select class="custom-select" id="change-search-adult">
													<option value="0">Adult</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4‎</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-xs-4 col-sm-4">

											<div class="form-group">
												<label>Children</label>
												<select class="custom-select" id="change-search-child">
													<option value="0">Child</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4‎</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>

										<div class="clear"></div>

										<div class="col-sm-12">
											<button class="btn btn-block btn-primary btn-icon mt-5">Search <span
													class="icon"><i class="fa fa-search"></i></span></button>
										</div>

										<div class="clear mb-10"></div>

										<div class="tooltip-light">
											<p class="price-guarantee text-center hoover-help mb-0"
												data-toggle="tooltip" data-placement="top"
												title="Had denoting properly jointure you occasion directly raillery. In said to of poor full be post face snug.">
												<i class="fa fa-check-square-o text-success"></i> EXTERION.com price
												guarantee</p>
										</div>

										<div class="clear"></div>

									</form>
								</div>

							</div>

						</div>

						<div class="mb-30 mb-5-sm"></div>

					</aside>

				</div>

				<div class="content-wrapper">

					<div class="mb-10"></div>

					<div class="detail-header">

						<div class="row gap-5">
							<div class="col-xs-12 col-sm-8 col-md-9">

								<h2> {{ $post->accommodation_name }} <span class="star-rate rated-40"></span></h2>
								<p class="mb-0"> {{ $post->accommodation_address }}

							</div>
						</div>


					</div>

					<div class="multiple-sticky hidden-sm hidden-xs">

						<div class="multiple-sticky-inner">

							<div class="multiple-sticky-container">

								<div class="multiple-sticky-item clearfix">

									<ul id="multiple-sticky-menu" class="multiple-sticky-nav clearfix">
										<li>
											<a href="#detail-content-sticky-nav-01">Gallery</a>
										</li>
										<li>
											<a href="#detail-content-sticky-nav-02">Hotel Info</a>
										</li>
										<li>
											<a href="#detail-content-sticky-nav-05">Rooms &amp; Availabilities</a>
										</li>
									</ul>

								</div>

							</div>

						</div>

					</div>

					<div class="detail-content-for-sticky-menu mb-50">

						<div class="clear"></div>

						{{-- images --}}
						<div id="detail-content-sticky-nav-01" class="pt-30">

							<div class="slick-gallery-slideshow">

								<div class="slider gallery-slideshow">
									<div>
										<div class="image"><img src="{{$post->accommodation_img}}" alt="Images" /></div>
									</div>
									@foreach($post->PostImgs as $item)
									<div>
										<div class="image"><img src="{{$item->post_img_link}}" alt="Images" /></div>
									</div>
									@endforeach
								</div>

							</div>


						</div>

						{{-- detail --}}
						<div id="detail-content-sticky-nav-02" class="pt-30">

							<div class="section-title-3 mb-40">
								<h3>Detail Information</h3>
							</div>

							<h5 class="font400 text-uppercase mb-15 font16">About This Accommodation:</h5>

							<p> {{ $post->accommodation_describe }}</p>

							<div class="mb-30"></div>

							<h5 class="font400 text-uppercase mb-15 font16">Accommodation key facts:</h5>

							<ul class="hotel-featured-list">
								<li>
									<span class="absolute">Arriving/leaving:</span>
									- Check-in time starts at 2:00 PM <br />
									- Check-out time is 11:00 AM
								</li>
								<li>
									<span class="absolute">Required at check in:</span>
									- Credit card or cash deposit required <br />
									- Government-issued photo ID required <br />
									- Minimum check-in age is 18
								</li>
								<li>
									<span class="absolute">Children:</span>
									- One child (11 years old and younger) stays free when occupying the parent or
									guardian's room, using existing bedding <br />
									- Babysitting/childcare
								</li>
							</ul>

							<div class="mb-30"></div>

							<div class=" row gap-20 clearfix">
								<div class="col-xs-12 col-sm-8">
									<h5 class="font400 text-uppercase mb-15 font16">Service:</h5>
									<ul class="list-col-2 list-with-icon">
										@foreach ($post->ServicePosts as $item)	
										
										<li><i class="fa fa-check text-primary"></i>{{ $item->service->service_name }}</li>

										@endforeach

									</ul>
								</div>
								<div class="col-xs-12 col-sm-4">
									<h5 class="font400 text-uppercase mb-15 font16">What’s around</h5>
									<p>{{$post->scenery_around}}</p>
								</div>
							</div>

							<div class="bb mt-10"></div>

						</div>

						{{-- room --}}
						<div id="detail-content-sticky-nav-05" class="pt-30">

							<div class="section-title-3">
								<h3>Rooms &amp; Availabilities</h3>
							</div>

							<div class="room-type-wrapper">

								@foreach ($post->room as $item)
									
								<div class="room-type-item">
									<div class="image">
										<img src="extretion/images/detail-gallery/thumb/01.jpg" alt="Image">
									</div>
									<div class="content">
										<h3>{{ $item->room_name }}</h3>
										<p><strong>Room Type</strong> : {{ $item->RoomType->room_type_name }}</p>
										<p><strong>Maxinum Adults</strong> : {{ $item->RoomType->number_adults }} Persons</p>
										<p><strong>Maxinum Children</strong> : {{ $item->RoomType->number_children }} Persons</p>
										<p><strong>Area</strong> : {{ $item->area }} m2</p>
										<p><strong>Utilities</strong> : {{ $item->utilities }}</p>
									</div>
									<div class="content-right">
										<span class="number">{{ $item->price }} VND</span>
										Total for 1 room/nights
										<div class="clear"></div>
									</div>
								</div>

								@endforeach

							</div>

						</div>

					</div>

					<div class="multiple-sticky hidden-sm hidden-xs">&#032;</div>
					<!-- is used to stop the above stick menu -->

					<div class="section-title-3">
						<h3>Why Extretion</h3>
					</div>

					<div class="row">

						<div class="col-sm-6">
							<div class="featured-item-2">
								<div class="icon">
									<i class="ion-card"></i>
								</div>
								<p>100% Payment Protection</p>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="featured-item-2">
								<div class="icon">
									<i class="ion-chatboxes"></i>
								</div>
								<p>Real Guest Reviews</p>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="featured-item-2">
								<div class="icon">
									<i class="ion-images"></i>
								</div>
								<p>Real Photos and Videos</p>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="featured-item-2">
								<div class="icon">
									<i class="ion-pricetags"></i>
								</div>
								<p>Always Cheaper Than Others</p>
							</div>
						</div>

					</div>

					<div class="mb-40"></div>

				</div>

			</div>

		</div>

	</div>

	<div class="clear"></div>

</div>
@endsection