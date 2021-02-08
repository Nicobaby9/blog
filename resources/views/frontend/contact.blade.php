@extends('layouts.frontend.app')

@section('header')
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<h2 style="color: silver;">Contact Us</h2>
				<h1 class="text-uppercase">{{ $web->web_name }}</h1>
				<p class="lead">{{ $web->web_desc }}</p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="section-row">
			<div class="section-title">
				<h2 class="title">Contact Information</h2>
			</div>
			<ul class="contact">
				<li><i class="fa fa-phone"></i> {{ $contact->phone }}</li>
				<li><i class="fa fa-envelope"></i> <a href="#">{{ $contact->email }}</a></li>
				<li><i class="fa fa-map-marker"></i>{{ $contact->location }}</li>
			</ul>
		</div>

		<div class="section-row">
			<div class="section-title">
				<h2 class="title">Mail us</h2>
			</div>
			<form>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<input class="input" type="text" name="subject" placeholder="Subject">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<textarea class="input" name="message" placeholder="Message"></textarea>
						</div>
						<button class="primary-button">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
		<!-- social widget -->
		<div class="aside-widget">
			<div class="section-title">
				<h2 class="title">Social Media</h2>
			</div>
			<div class="social-widget">
				<ul>
					<li>
						<a href="#" class="social-facebook">
							<i class="fa fa-facebook"></i>
							<span>21.2K<br>Followers</span>
						</a>
					</li>
					<li>
						<a href="#" class="social-twitter">
							<i class="fa fa-twitter"></i>
							<span>10.2K<br>Followers</span>
						</a>
					</li>
					<li>
						<a href="#" class="social-google-plus">
							<i class="fa fa-google-plus"></i>
							<span>5K<br>Followers</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- /social widget -->

		<!-- newsletter widget -->
		<div class="aside-widget">
			<div class="section-title">
				<h2 class="title">Newsletter</h2>
			</div>
			<div class="newsletter-widget">
				<form>
					<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
					<input class="input" name="newsletter" placeholder="Enter Your Email">
					<button class="primary-button">Subscribe</button>
				</form>
			</div>
		</div>
		<!-- /newsletter widget -->
	</div>
</div>
@endsection