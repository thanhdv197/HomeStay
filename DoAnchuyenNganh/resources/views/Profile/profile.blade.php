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
												
													<h3>Profile</h3>
													<p>You can update your information</p>
											
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
										<form method="POST" enctype="multipart/form-data" action="{{ route('update_info') }}">
										@csrf
											<div class="row">
											
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
												
													<div class="form-group">
														<label>Name</label>
														<input type="text" name="name" class="form-control" placeholder="Your Name" />
													</div>
													
												</div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
												
													<div class="form-group">
													
														<label>Phone Number</label>
														<input type="text" name="phonenumber" class="form-control" placeholder="Your telephone number" />
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
												
													<div class="form-group">
													
														<label>Address</label>
														<input type="text" name="address" class="form-control" placeholder="Address" />
													</div>
													
												</div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
												
													<div class="form-group">
													
														<label>Birthday</label>
														<input type="date" name="birthday" class="form-control" />
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="clear"></div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
												
													<div class="form-group">
													
														<label>Avatar</label>
														<input type="file" name="avatar" accept="image/*" class="form-control" />
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