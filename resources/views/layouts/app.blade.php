<!DOCTYPE html>
<html lang="en">

<!-- head -->
@include('layouts.partials.head')

<body>
<div class="main-menu">

    <!-- Header -->
	@include('layouts.partials.header')
    
	<!-- side bar -->
	@include('layouts.partials.sidebar')
</div>
<!-- /.main-menu -->
@if(Request::is('admin*'))
<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">@yield('pageTitle')</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="mdi mdi-magnify button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
        <a href="{{ route('logout')}}" 
		onclick="event.preventDefault();
		document.getElementById('logout-form').submit();"
		class="ico-item mdi mdi-logout js__logout"></a>
		<form id="logout-form" action="{{ route('logout')}}" method="POST">@csrf</form>
	</div>
	<!-- /.pull-right -->
</div>
@else
@if(Request::is('login'))
<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">login</h1>
		<!-- /.page-title -->
	</div>
</div>
@endif
@if(Request::is('register'))
<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Registation</h1>
		<!-- /.page-title -->
	</div>
</div>
@endif
@endif
<!-- /.fixed-navbar -->
<div id="wrapper">
	<div class="main-content">

		@yield('content')

		<!-- footer -->
		@include('layouts.partials.footer')
</body>
</html>