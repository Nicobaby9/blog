<!-- container -->
<div class="container">
	<!-- row -->
	<div class="row">
		<div class="col-md-3">
			<div class="footer-widget">
				<div class="footer-logo">
					<a href="{{ url('/') }}"><img src="{{ asset('uploads/web-logo/'. $web->web_logo) }}" width="250" height="250"></a>
				</div>
				<p>{{ $web->vision }}</p>
				<ul class="contact-social">
					<li><a href="https://{{ $web->facebook }}" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://{{ $web->twitter }}" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://{{ $web->instagram }}" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-3">
			<div class="footer-widget">
				<h3 class="footer-title">Categories</h3>
				<div class="category-widget">
					<ul>
						@foreach($categories as $category)
						<li><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }} <span>{{ $category->posts->count() }}</span></a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="footer-widget">
				<h3 class="footer-title">Tags</h3>
				<div class="tags-widget">
					<ul>
						@foreach($tags as $tag)
						<li><a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="footer-widget">
				<h3 class="footer-title">Newsletter</h3>
				<div class="newsletter-widget">
					<form>
						<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
						<input class="input" name="newsletter" placeholder="Enter Your Email">
						<button class="primary-button">Subscribe</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /row -->

	<!-- row -->
	<div class="footer-bottom row">
		<div class="col-md-6 col-md-push-6">
			<ul class="footer-nav">
				<li><a href="/">Home</a></li>
				<li><a href="/about-us">About Us</a></li>
				<li><a href="/contact">Contacts</a></li>
				<li><a href="#">Advertise</a></li>
				<li><a href="#">Privacy</a></li>
			</ul>
		</div>
		<div class="col-md-6 col-md-pull-6">
			<div class="footer-copyright">
				Copyright {{ $web->web_name }} &copy;<script>document.write(new Date().getFullYear());</script><i class="fa fa-heart-o" aria-hidden="true"></i><a href="https://colorlib.com" target="_blank"></a><a href="https://themeslab.org/" target="_blank"></a>
			</div>
		</div>
	</div>
	<!-- /row -->
</div>