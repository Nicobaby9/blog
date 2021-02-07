@extends('layouts.frontend.app')

@section('header')
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<h3 style="color: silver;">About Us</h3>
				<h1 class="text-uppercase">{{ $web->web_name }}</h1>
				<p class="lead">{{ $web->web_desc }}</p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-md-5">
		<div class="section-row">
			<div class="section-title">
				<h2 class="title">Our story</h2>
			</div>
			<p>{{ $web->web_desc }}</p>
			<blockquote class="blockquote">
				<p>{{ $web->web_quotes }}</p>
				<footer class="blockquote-footer">{{ $web->web_quotes_creator }}</footer>
			</blockquote>
		</div>
	</div>
	<div class="col-md-7">
		<div class="section-row">
			<div class="section-title">
				<h2 class="title">Our Vision</h2>
			</div>
			<p>{{ $web->web_vision }}</p>
		</div>
	</div>
</div>
@endsection