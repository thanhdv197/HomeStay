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

							@foreach ($trans as $item)

							<div class="hotel-item-list-2 clearfix">

								<div class="image">
									<img src="{{ $item->user->avatar??'' }}" >
								</div>

								<div class="content">
									<div class="heading">
										<h4>{{ $item->customer_name }}</h4>
										<p> <i	class="fa fa-map-marker text-primary"></i>
											{{ $item->customer_address }}</p>
									</div>
									<div class="short-info">
										<span class="absolute">Phone: </span>
										<span class="block">- {{ $item->customer_phonenumber }} </span>
									</div>
									<div class="short-info">
										<span class="absolute">Email: </span>
										<span class="block">- {{ $item->customer_email }} </span>
									</div>
									<div class="short-info">
										<span class="absolute">Room: </span>
										<span class="block">- {{ $item->room->room_name }} </span>
									</div>
									<div class="short-info">
										<span class="absolute">Type: </span>
										<span class="block">- {{ $item->room->RoomType->room_type_name }} </span>
									</div>
								</div>

								<div class="total-price">
									Total price: <span class="price">{{ $item->total }} VND</span>
								</div>

								<div class="absolute-right-top">

									<ul class="check-in-out clearfix">

										@php
										$receive_day = $item->receive_room_day;
										$day = Carbon\Carbon::createFromFormat('Y-m-d', $receive_day)->day;
										$month = Carbon\Carbon::createFromFormat('Y-m-d', $receive_day)->month;
										$year = Carbon\Carbon::createFromFormat('Y-m-d', $receive_day)->year;
										@endphp

										<li>
											<div class="check-in-out-item">
												Check-in
												<span class="date">{{ $day }}</span>
												<span class="month-year">{{ $month }} {{ $year }}</span>
											</div>
										</li>

										@php
										$return_day = $item->return_room_day;
										$day = Carbon\Carbon::createFromFormat('Y-m-d', $return_day)->day;
										$month = Carbon\Carbon::createFromFormat('Y-m-d', $return_day)->month;
										$year = Carbon\Carbon::createFromFormat('Y-m-d', $return_day)->year;
										@endphp

										<li>
											<div class="check-in-out-item">
												Check-in
												<span class="date">{{ $day }}</span>
												<span class="month-year">{{ $month }} {{ $year }}</span>
											</div>
										</li>

									</ul>

								</div>

								<div class="absolute-right-bottom">
									@if ($item->isPay == 0)
									<a href="{{ route('post-receipt', $item->id) }}"
										class="btn btn-info btn-sm">Receipt</a>
									@else
									<div class="heading">
										<h4>Paid</h4>
									</div>
									@endif

								</div>

							</div>

							@endforeach

						</div>

						<div class="result-paging-wrapper mt-40">

							<div class="row">

								<div class="col-sm-6">
									{{$trans->links()}}
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