<div id="nav">
	<!-- Top Nav -->
	<div id="nav-top">
		<div class="container">
			<!-- social -->
			<ul class="nav-social">
				<li><a href="https://{{ $web->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li><a href="http://{{ $web->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<li><a href="http://{{ $web->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
			</ul>
			<!-- /social -->

			<!-- logo -->
			<div class="nav-logo" style="width: 250px;">
				<a href="/" class="logo"><img src="{{ asset('uploads/web-logo/'. $web->web_logo) }}"></a>
			</div>
			<!-- /logo -->

			<!-- search & aside toggle -->
			<div class="nav-btns">
				<button class="aside-btn"><i class="fa fa-bars"></i></button>
				<button class="search-btn"><i class="fa fa-search"></i></button>
				<div id="nav-search">
					<form action="{{ route('blog.search') }}" method="GET">
						<input class="input" name="search" placeholder="Masukkan pencarian...">
					</form>
					<button class="nav-close search-close">
						<span></span>
					</button>
				</div>
			</div>
			<!-- /search & aside toggle -->
		</div>
	</div>
	<!-- /Top Nav -->

	<!-- Main Nav -->
	<div id="nav-bottom">
		<div class="container">
			<!-- nav -->
			<ul class="nav-menu">
				<li><a href="{{ url('/') }}">Beranda</a></li>
				<li class="has-dropdown">
					<a href="{{ route('list.category') }}">Kategori</a>
					<div class="dropdown">
						<div class="dropdown-body">
							<ul class="dropdown-list">
								<li><a href="{{ route('list.category') }}" title="">Semua Kategori</a></li>
								@foreach($categories as $category)
								<li><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</li>
				@foreach($navCategories as $navCategory)
				<li><a href="{{ route('blog.category', $navCategory->slug) }}">{{ $navCategory->name }}</a></li>
				@endforeach
			</ul>
			<!-- /nav -->
		</div>
	</div>
	<!-- /Main Nav -->

	<!-- Aside Nav -->
	<div id="nav-aside">
		<ul class="nav-aside-menu">
			@if(auth()->guest())
			<li><a href="{{ route('login') }}">Login</a></li>
			@else
			<li><a href="{{ route('profile.info', auth()->user()->profile->username) }}">Hi, {{ auth()->user()->name }}</a></li>
			<li>
				<a class="dropdown-item" href="{{ route('logout') }}"
	             onclick="event.preventDefault();
		                           document.getElementById('logout-form').submit();">
		             <i class="fas fa-sign-out-alt"></i> Logout
		          </a>

		          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		              @csrf
		          </form>
			</li>
			@endif
			<li><a href="{{ url('/') }}">Beranda</a></li>
			<li class="has-dropdown"><a>Kategori</a>
				<ul class="dropdown">
					@foreach($categories as $category)
						<li><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a></li>
					@endforeach
				</ul>
			</li>
			<li><a href="/about-us">About Us</a></li>
			<li><a href="/contact">Contacts</a></li>
			
		</ul>
		<button class="nav-close nav-aside-close"><span></span></button>
	</div>
	<!-- /Aside Nav -->
</div>