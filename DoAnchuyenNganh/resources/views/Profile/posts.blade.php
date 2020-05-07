@extends('Layout.layout')
@section('content')
<div class="main-wrapper">

	<div class="breadcrumb-wrapper">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-8">
					<ol class="breadcrumb">
						<li><a href="{{ route('index') }}">Home</a></li>
						<li><a href="#">Page</a></li>
						<li class="active">About Us</li>
					</ol>
				</div>

			</div>

		</div>

	</div>

	<div class="clear"></div>

	<div class="equal-content-sidebar-by-gridLex">

		<div class="container">

			<div class="GridLex-grid-noGutter-equalHeight">

				{{-- Dashboard Avatar --}}
				@include('Layout.dashboard_avatar')
				{{-- Dashboard Avatar --}}

				<div class="GridLex-col-9_sm-8_xs-12_xss-12">

					<div class="content-wrapper">

						<div class="dashboard-content">

							<div class="row">

								<div class="col-xs-12 col-sm-10 col-md-9">

									<div class="dashboard-heading">

										<h3>My Post Lists</h3>
										<p>You can see your post list</p>

									</div>

								</div>

							</div>

						</div>

						<div class="hotel-item-wrapper-2">

							@if(session('thongbao'))
								<div class="alert alert-success">{{session('thongbao')}}</div>
							@endif

							@foreach ($post as $item)

							<div class="hotel-item-list">

								<div class="image" style="background-image:url('{{ $item->accommodation_img }}');"></div>

								<div class="content">
									<div class="heading">
										<h4>{{ $item->accommodation_name }}</h4>
										<p><span class="star-rate rated-40 mr-10"></span> <i
												class="fa fa-map-marker text-primary"></i> {{ $item->city->city_name }}
										</p>
									</div>
									<div class="short-info">
										{{ $item->accommodation_describe }}
									</div>
								</div>
								<div class="absolute-bottom">
									<p class="text-primary"><i class="fa fa-check-circle"></i> Breakfast Included <span
											class="mh-10">|</span> <i class="fa fa-check-circle"></i> Free Wifi in Room
									</p>
								</div>
								<div class="absolute-right">
									<div class="price-wrapper">
										<p class="text-danger font700 mb-6">{{ $item->room_count }} Rooms</p>
										{{-- <a href="{{ route('post-edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
										<a href="{{ route('post-tran', $item->id) }}" class="btn btn-info btn-sm">Trans</a>
										<a href="{{ route('delete-post', $item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
									</div>
								</div>
							</div>

							@endforeach

						</div>

						<div class="result-paging-wrapper mt-40">

							<div class="row">

								<div class="col-sm-6">
									{{$post->links()}}
								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="clear"></div>

</div>
@endsection