<div id="nav">
	<!-- Top Nav -->
	<div id="nav-top">
		<div class="container">
			<!-- social -->
			<ul class="nav-social">
				<li><a href="{{ $web->facebook }}"><i class="fa fa-facebook"></i></a></li>
				<li><a href="{{ $web->twitter }}"><i class="fa fa-twitter"></i></a></li>
				<li><a href="{{ $web->instagram }}"><i class="fa fa-instagram"></i></a></li>
			</ul>
			<!-- /social -->

			<!-- logo -->
			<div class="nav-logo" style="width: 250px;">
				<a href="index.html" class="logo"><img src="{{ asset('storage/web-logo/'. $web->web_logo) }}"></a>
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
					<a href="{{ url('/') }}">Kategori</a>
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
				<li><a href="#">{{ $navCategory->name }}</a></li>
				@endforeach
			</ul>
			<!-- /nav -->
		</div>
	</div>
	<!-- /Main Nav -->

	<!-- Aside Nav -->
	<div id="nav-aside">
		<ul class="nav-aside-menu">
			<li><a href="index.html">Home</a></li>
			<li class="has-dropdown"><a>Categories</a>
				<ul class="dropdown">
					<li><a href="#">Lifestyle</a></li>
					<li><a href="#">Fashion</a></li>
					<li><a href="#">Technology</a></li>
					<li><a href="#">Travel</a></li>
					<li><a href="#">Health</a></li>
				</ul>
			</li>
			<li><a href="about.html">About Us</a></li>
			<li><a href="contact.html">Contacts</a></li>
			<li><a href="#">Advertise</a></li>
		</ul>
		<button class="nav-close nav-aside-close"><span></span></button>
	</div>
	<!-- /Aside Nav -->
</div>