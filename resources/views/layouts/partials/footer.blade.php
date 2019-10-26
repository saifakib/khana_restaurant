<footer class="footer">
			<ul class="list-inline">
				<li>2016 © NinjaAdmin.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{ asset('assets/backend/scripts/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/backend/scripts/modernizr.min.js') }}"></script>
	<script src="{{ asset('assets/backend/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/backend/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<script src="{{ asset('assets/backend/plugin/nprogress/nprogress.js') }}"></script>
	<script src="{{ asset('assets/backend/plugin/sweet-alert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('assets/backend/plugin/waves/waves.min.js') }}"></script>

	<script src="{{ asset('assets/backend/scripts/main.min.js') }}"></script>
	<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
	{!! Toastr::message() !!}
	<script>
		@if($errors->any())
			@foreach($errors->all() as $error)
				toastr.error('{{ $error }}','Error',{
					closeButton: true,
					progressButton: true
				});
			@endforeach
		@endif
	</script>
    @stack('js')