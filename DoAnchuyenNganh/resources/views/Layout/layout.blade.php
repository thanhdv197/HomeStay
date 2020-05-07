<!doctype html>
<html lang="en">

@include('Layout.head')

<body class="">
	{{-- {{dd(Auth::user())}} --}}
	{{-- Modal login and register --}}
	@include('Layout.login')

	<!-- start Container Wrapper -->
	{{-- container-wrapper --}}
	<div class="container-wrapper colored-navbar-brand">

		<!-- start Header -->
		@include('Layout.header')
		<!-- end Header -->
		
		<div class="clear"></div>
		
		<!-- start Main Wrapper -->
		<div class="main-wrapper">
		
			{{-- content --}}
			@yield('content')
			
		</div>
		<!-- end Main Wrapper -->

		{{-- footer --}}
		@include('Layout.footer')

	</div> <!-- / .wrapper -->
	<!-- end Container Wrapper -->

 <!-- start Back To Top -->
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->


 
<!-- jQuery Cores -->
{{-- <script type="text/javascript" src="extretion/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="extretion/js/jquery-migrate-1.2.1.min.js"></script> --}}

<script type="text/javascript" src="extretion/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="extretion/js/jquery-3.4.1.min.js"></script>

<!-- Bootstrap Js -->
<script type="text/javascript" src="extretion/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugins - serveral jquery plugins that use in this template -->
<script type="text/javascript" src="extretion/js/plugins.js"></script>

<!-- Custom js codes for plugins -->
<script type="text/javascript" src="extretion/js/customs.js"></script>

<!-- Custom filer - a custom file input -->
<script type="text/javascript" src="extretion/js/customs-filer.js"></script>

<!-- Date Piacker -->
<script type="text/javascript" src="extretion/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="extretion/js/customs-datepicker.js"></script>

<!-- Google map for detail page -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript" src="extretion/js/infobox.js"></script>
<script type="text/javascript" src="extretion/js/customs-detail-page.js"></script>

<!-- Contact Form Validate -->
<script type="text/javascript" src="extreion/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="extreion/js/customs-validate.js"></script>

<!-- Google map for Contact -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="extreion/js/customs-contact-map.js"></script>

{{-- jquery jquery-confirm --}}
<script type="text/javascript" src="jquery-confirm/dist/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="jquery-confirm/dist/jquery-confirm.min.css">

<script>
	$(document).ready(function(){
		/**
		 * Sign-in Modal
		 */
		var $formLogin = $('#login-form');
		var $formLost = $('#lost-form');
		var $formRegister = $('#register-form');
		var $divForms = $('#modal-login-form-wrapper');
		var $modalAnimateTime = 300;
		
		$('#login_register_btn').on("click", function () { modalAnimate($formLogin, $formRegister) });
		$('#register_login_btn').on("click", function () { modalAnimate($formRegister, $formLogin); });
		$('#login_lost_btn').on("click", function () { modalAnimate($formLogin, $formLost); });
		$('#lost_login_btn').on("click", function () { modalAnimate($formLost, $formLogin); });
		$('#lost_register_btn').on("click", function () { modalAnimate($formLost, $formRegister); });
		
		function modalAnimate ($oldForm, $newForm) {
			var $oldH = $oldForm.height();
			var $newH = $newForm.height();
			$divForms.css("height",$oldH);
			$oldForm.fadeToggle($modalAnimateTime, function(){
				$divForms.animate({height: $newH}, $modalAnimateTime, function(){
					$newForm.fadeToggle($modalAnimateTime);
				});
			});
		}

		// Login functin by ajax
		$('#login-form').on('submit',function(e){
			e.preventDefault();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				url: '{{route("login")}}',
				type: 'post',
				data: {
					'login_username': $('#login_username').val(),
					'login_password': $('#login_password').val()
				},
				success: function(data) {
					console.log(data);
					if (data.error == true) {
						console.log(data.message.login_username);
						console.log(data.message.login_password);
						if (data.message.login_username != undefined) {
							$.dialog({
								icon: 'fa fa-warning',
								title: 'Errors!',
								draggable: true,
    							dragWindowBorder: false,
								content: data.message.login_username
							});
						}
						if (data.message.login_password != undefined) {
							$.dialog({
								icon: 'fa fa-warning',
								title: 'Errors!',
								draggable: true,
    							dragWindowBorder: false,
								content: data.message.login_password
							});
						}
						if (data.message.errorlogin != undefined) {
							$.dialog({
								icon: 'fa fa-warning',
								title: 'Errors!',
								draggable: true,
    							dragWindowBorder: false,
								content: data.message.errorlogin
							});
						}

					} else {
						window.location.href = "{{ route('index') }}"
					}
				},
				error: function(data){
					console.log(data);
				}
			});

		});

		//Register ajax
		$('#register-form').on('submit', function(e){
			e.preventDefault();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			var form_data = new FormData($(this)[0]);
			form_data.append('username', $('#register_username').val());
			form_data.append('email', $('#register_email').val());
			form_data.append('password', $('#register_password').val());
			form_data.append('password_confirm', $('#register_password_confirm').val());
			form_data.append('name', $('#name').val());
			form_data.append('phonenumber', $('#phonenumber').val());
			form_data.append('address', $('#address').val());
			form_data.append('birthday', $('#birthday').val());

			$.ajax({
				url: "{{ route('register') }}",
				type: 'post',
				dataType:'json',
				async:false,
				processData: false,
				contentType: false,
				data: form_data,
				success: function(data) {
					console.log(data);
					if(data.error==true) {
						$.dialog({
							icon: 'fa fa-warning',
							title: 'Errors!',
							draggable: true,
							dragWindowBorder: false,
							content: 'Vui lòng kiểm tra lại thông tin đã nhập!'
						});
					}
					else{
						window.location.href = "{{ route('index') }}";
					}
				},
				error: function(data) {
					console.log(data);
				}

			});

		});

	});
</script>
</body>



<!-- Mirrored from crenoveative.com/envato/extretion/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 May 2019 19:25:27 GMT -->
</html>