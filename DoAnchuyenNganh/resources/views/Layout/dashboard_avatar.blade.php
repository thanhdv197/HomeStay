<div class="GridLex-col-3_sm-4_xs-12_xss-12">

	<aside class="sidebar-wrapper">

		<div class="dashboard-sidebar">

			<div class="dashboard-avatar">

				<div class="image">
					<img src="{{ Auth::user()->avatar }}" alt="Image" class="img-circle">
				</div>

				<div class="content">
					<h4>{{ Auth::user()->name }}</h4>
					<p class="texting">{{ Auth::user()->address }}</p>
					<span class="label label-primary">{{ Auth::user()->level }}</span>
				</div>

				<ul class="meta clearfix">
					<li>
						<div>
							Member since:
							<span>
								{{ Auth::user()->created_at }}
							</span>
						</div>
					</li>
					<li>
						<div>
							Member Birthday:
							<span>
								{{ Auth::user()->birthday }}
							</span>
						</div>
					</li>
				</ul>

			</div>

			<div class="dashboard-menu-wrapper">

				<div class="navbar-vertical">

					<ul class="navbar-vertical-menu dashboard-menu-list" id="responsive-menu-dashboard">
						<li>
							<a href="{{ route('profile') }}"><span class="icon"><i
										class="fa fa-pencil-square-o"></i></span> Profile</a>
						</li>
						<li>
							<a href="{{ route('password') }}"><span class="icon"><i class="fa fa-heart"></i></span> Password</a>
						</li>
						<li>
							<a href="{{ route('booking') }}"><span class="icon"><i class="fa fa-pencil-square-o"></i></span> Booking</a>
						</li>
						<li>
							<a href="{{ route('post') }}"><span class="icon"><i class="fa fa-pencil-square-o"></i></span> Posts</a>
						</li>
						<li>
							<a href="{{ route('posting') }}"><span class="icon"><i class="fa fa-pencil-square-o"></i></span> Posting</a>
						</li>
						<li>
							<a href="{{ route('logout') }}"><span class="icon"><i class="fa fa-sign-out"></i></span>
								Logout</a>
						</li>
					</ul>

				</div>

				<div class="relative">
					<div id="slicknav-mobile-dashboard"></div>
				</div>

			</div>

		</div>

	</aside>

</div>