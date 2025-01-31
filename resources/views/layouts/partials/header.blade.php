
	<header class="header">
	@if(Request::is('admin*'))
		<a href="index.html" class="logo"><i class="ico mdi mdi-cube-outline"></i>MyAdmin</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		
		<div class="user">
			<a href="#" class="avatar"><img src="{{ asset('assets/backend/images/avatar-sm-5.jpg') }}" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="profile.html">Denise Emily</a></h5>
			<h5 class="position">Administrator</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="profile.html"><i class="fa fa-user"></i> Profile</a></div>
					<div class="control-item"><a href="#"><i class="fa fa-gear"></i> Settings</a></div>
					<div class="control-item"><a href="#"><i class="fa fa-sign-out"></i> Log out</a></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		@endif
		<!-- /.user -->
	</header>
	<!-- /.header -->