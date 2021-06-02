@include('partials.header')
<div class="loader"></div>
@include('sweet::alert')

<div id="app">
	<div class="main-wrapper main-wrapper-1">
		<div class="navbar-bg"></div>
		@include('layouts.navbar')
		@include('layouts.sidebar')
		<div class="main-content">
			@yield('content')
			@include('layouts.setting')

		</div>
		@include('layouts.footer')

	</div>
</div>

@include('partials.footer')