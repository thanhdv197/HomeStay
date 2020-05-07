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

								<div class="dashboard-content">

									<div class="row">
									
										<div class="col-xs-12 col-sm-10 col-md-9">
											
											<div class="dashboard-heading">
											
												<h3>Password</h3>
												<p>You shoud change password about once a month</p>
										
											</div>
											
										</div>

									</div>
									@if(session('thongbao'))
										<div class="alert alert-success">{{session('thongbao')}}</div>
									@endif
									<div class="row">
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
									<form method="POST" action="{{ route('update-password') }}">
									@csrf
										<div class="row">
											
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
											
												<div class="form-group">
												
													<label>New Password</label>
													<input type="password" name="new_password" class="form-control" placeholder="your new password" />
												</div>
												
											</div>
											
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
											
												<div class="form-group">
												
													<label>Confirm New Password</label>
													<input type="password" name="new_password_confirm" class="form-control" placeholder="your new password" />
												</div>
												
											</div>
										
											<div class="clear"></div>
											
											<div class="col-xs-12 col-sm-6 col-md-5">
											
												<button type="submit" class="btn btn-danger">Save</button>
											
											</div>
											
										</div>
										
									</form>
									
								</div>

							</div>
							
						</div>

						</div>
						
					</div>
					
				</div>
				
				<div class="clear"></div>
				
			</div>
@endsection