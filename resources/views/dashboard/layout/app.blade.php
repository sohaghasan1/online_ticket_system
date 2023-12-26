
@include('dashboard.components.header')
	<div class="wrapper">

	@include('dashboard.components.sidebar')
		<div class="main">
			
		@include('dashboard.components.topheader')
			
        @yield('content')


@include('dashboard.components.footer')