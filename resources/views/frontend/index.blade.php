@extends('layouts.frontend.home')

@section('content')
<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="section-title">
			<h2 class="title">Recent posts</h2>
		</div>
	</div>
	<!-- post -->
	@foreach($posts as $post)
	<div class="col-md-6">
		<div class="post">
			<a class="post-img-1" href="blog-post.html"><img src="{{ asset('storage/post-image/'. $post->image) }}" alt=""></a>
			<div class="post-body">
				<div class="post-category">
					<a href="#">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
				</div>
				<h3 class="post-title"><a href="blog-post.html">{{ \Illuminate\Support\Str::title($post->title) }}</a></h3>
				<ul class="post-meta">
					<li><a href="author.html">{{ $post->user->name }}</a></li>
					<li>{{ \Carbon\Carbon::parse($post->created_at)->format('d-M-Y') }}</li>
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