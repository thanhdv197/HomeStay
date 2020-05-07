@extends('Layout.layout')
@section('content')
<div class="main-wrapper">

	<div class="breadcrumb-wrapper">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-8">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
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

						<div class="container">
							<div class="row">
								<div class="well col-xs-10 col-sm-10 col-md-6">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-6">
											<address>
												<strong>{{ $tran->customer_name }}</strong>
												<br>
												{{ $tran->customer_address }}
												<br>
												<abbr title="Phone">P:</abbr> {{ $tran->customer_phonenumber }}
											</address>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6 text-right">
											<p>
												<em>Date: {{ Carbon\Carbon::now() }}</em>
											</p>
											<p>
												<em>Receipt #: {{ $tran->id }}</em>
											</p>
										</div>
									</div>
									<div class="row">
										<div class="text-center">
											<h1>Receipt</h1>
										</div>
										</span>
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Room Name</th>
													<th>Receive day</th>
													<th>Return day</th>
													<th class="text-center">Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="col-md-9"><em>{{ $tran->room->room_name }}</em></h4>
													</td>
													<td class="col-md-1" style="text-align: center">
														{{ $tran->receive_room_day }} </td>
													<td class="col-md-1" style="text-align: center">
														{{ $tran->return_room_day }} </td>
													<td class="col-md-1 text-center">{{ $tran->room->price }}</td>
												</tr>
												<tr>
													<td>   </td>
													<td>   </td>
													<td class="text-right">
														<h4><strong>Total: </strong></h4>
													</td>
													<td class="text-center text-danger">
														<h4><strong>{{ $tran->total }}</strong></h4>
													</td>
												</tr>
											</tbody>
										</table>
										<a href="{{ route('post-print', $tran->id) }}" class="btn btn-success btn-lg btn-block">
											Export PDF   <span class="glyphicon glyphicon-chevron-right"></span>
										</a>
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