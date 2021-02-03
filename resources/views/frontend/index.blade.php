@extends('layouts.frontend.home')

@section('content')

<!-- row -->
<div id="hot-post" class="row hot-post">
	<div class="col-md-8 hot-post-left">
		<!-- post -->
		<div class="post post-thumb">
			<a class="post-img" href="blog-post.html"><img src="{{ asset('callie/img/hot-post-1.jpg') }}" alt=""></a>
			<div class="post-body">
				<div class="post-category">
					<a href="category.html">Lifestyle</a>
				</div>
				<h3 class="post-title title-lg"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
				<ul class="post-meta">
					<li><a href="author.html">John Doe</a></li>
					<li>20 April 2018</li>
				</ul>
			</div>
		</div>
		<!-- /post -->
	</div>
	<div class="col-md-4 hot-post-right">
		<!-- post -->
		<div class="post post-thumb">
			<a class="post-img" href="blog-post.html"><img src="{{ asset('callie/img/hot-post-2.jpg') }}" alt=""></a>
			<div class="post-body">
				<div class="post-category">
					<a href="category.html">Lifestyle</a>
				</div>
				<h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
				<ul class="post-meta">
					<li><a href="author.html">John Doe</a></li>
					<li>20 April 2018</li>
				</ul>
			</div>
		</div>
		<!-- /post -->

		<!-- post -->
		<div class="post post-thumb">
			<a class="post-img" href="blog-post.html"><img src="{{ asset('callie/img/hot-post-3.jpg') }}" alt=""></a>
			<div class="post-body">
				<div class="post-category">
					<a href="category.html">Fashion</a>
					<a href="category.html">Lifestyle</a>
				</div>
				<h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
				<ul class="post-meta">
					<li><a href="author.html">John Doe</a></li>
					<li>20 April 2018</li>
				</ul>
			</div>
		</div>
		<!-- /post -->
	</div>
</div>
<!-- /row -->

@endsection

@section('second-content')
<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="section-title">
			<h2 class="title">Recent posts</h2>
		</div>
	</div>
	<!-- post -->
	@foreach($recent_post as $post)
	<div class="col-md-6">
		<div class="post">
			<a class="post-img" href="{{ route('blog.show', $post->slug) }}"><img src="{{ asset('storage/post-image/'. $post->image) }}" alt="" height="190"></a>
			<div class="post-body">
				<div class="post-category">
					<a href="#">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
				</div>
				<h3 class="post-title"><a href="{{ route('blog.show', $post->slug) }}">{{ \Illuminate\Support\Str::title($post->title) }}</a></h3>
				<ul class="post-meta">
					<li><a href="author.html">{{ \Illuminate\Support\Str::words($post->user->name, 2) }}</a></li>
					<li>{{ $post->created_at->diffForHumans() }}</li>
				</ul>
			</div>
		</div>
	</div>
	<hr>
	@endforeach
	<!-- /post -->
</div>
<!-- /row -->
@endsection