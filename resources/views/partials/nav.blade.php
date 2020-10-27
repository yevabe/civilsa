<nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm fixed-top">
	<div class="container">
		<!-- Brand -->
		<a class="navbar-brand" href="{{ route('home') }}">
			<img class="img-fluid" src="/img/logo.jpg" width="150">
		</a>
		<!-- Toggler -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Collapse -->
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<!-- Toggler -->
			<button class="navbar-toggler z-index-200" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<i class="fas fa-times text-dark"></i>
			</button>


			<!-- Navigation -->
			<ul class="nav nav-pills navbar-nav">
				<li class="nav-item d-none d-block d-sm-block d-md-none">
					<a class="navbar-brand d-none d-block d-sm-block d-md-none text-center" href="{{ route('home') }}">
						{{ config('app.name') }}
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ setActive('home') }}" href="{{ route('home') }}">
						@lang('Home')
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ setActive('about') }}" href="{{ route('about') }}">
						@lang('About')
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ setActive('projects.*') }}" href="{{ route('projects.index') }}">
						@lang('Projects')
					</a>
				</li>
				<li class="nav-item d-none d-sm-none d-md-block ">
					<a class="nav-link {{ setActive('contact') }}" href="{{ route('contact') }}">
						@lang('Contact')
					</a>
				</li>
			</ul>
			<ul class="nav navbar-nav  d-flex justify-content-between align-items-center">
				<li class="nav-item">
					@guest
					<a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}">
						<i class="fas fa-sign-in-alt fa-lg text-gray-200"></i>
					</a>
					@else
					<a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<i class="fas fa-sign-out-alt fa-lg text-gray-200"></i>
					</a>
					@endguest
				</li>
			</ul>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
			<!-- Button -->
			<a class="navbar-btn btn btn-sm btn-primary lift ml-auto d-block d-sm-block d-md-none" href="{{ route('contact') }}">
				Contáctenos
			</a>

		</div>
	</div>
</nav>