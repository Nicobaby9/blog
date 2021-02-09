@extends('layouts.frontend.app')

@section('header')
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<div class="author">
					<img class="author-img center-block" src="{{ asset('storage/user-photo/'. $profile->user->photo) }}" height="100" width="100">
					<h1 class="text-uppercase">{{ $profile->user->name }}</h1>
					<p class="lead">{{ $profile->headline }}</p>
					<ul class="author-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
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
				<h2 class="title">Profile</h2>
			</div>
			<table style="width:100%">
		  	<tr>
			    <th>Email </th>
			    <th> : &nbsp;</th>
			    <td> {{ $profile->user->email }}</td>
			</tr>
			<tr>
			    <th>Username</th>
			    <th> : &nbsp;</th>
			    <td> {{ '@'.$profile->username }}</td>
			</tr>
			<tr>
			    <th>Instagram</th>
			    <th> : &nbsp;</th>
			    <td> {{ '@'.$profile->instagram }}</td>
			</tr>
		</table>
			
			<p></p>
		</div>
	</div>
	<div class="col-md-7">
		<div class="section-row">
			<div class="section-title">
				<h2 class="title">Bio</h2>
			</div>
			<p>{{ $profile->bio }}</p>
		</div>
	</div>
</div>
@endsection