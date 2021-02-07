@extends('layouts.frontend.home')

@section('content')

<!-- row -->
<div id="hot-post" class="row hot-post">
	<div class="col-md-8 hot-post-left">
		<!-- post -->
		<div class="post post-thumb">
			<a class="post-img" href="{{ route('blog.show', $main_post->slug) }}"><img src="{{ asset('storage/post-image/'.$main_post->image) }}" alt="" height="507"></a>
			<div class="post-body">
				<div class="post-category">
					<a href="{{ route('blog.category', $main_post->category->slug) }}">{{ \Illuminate\Support\Str::title($main_post->category->name) }}</a>
				</div>
				<h3 class="post-title title-lg"><a href="{{ route('blog.show', $main_post->slug) }}">{{ \Illuminate\Support\Str::words($main_post->title, 11) }}</a></h3>
				<ul class="post-meta">
					<li><a href="author.html">{{ \Illuminate\Support\Str::words($main_post->user->name, 2) }}</a></li>
					<li>{{ $main_post->created_at->diffForHumans() }}</li>
				</ul>
			</div>
		</div>
		<!-- /post -->
	</div>
	<div class="col-md-4 hot-post-right">
		<!-- post -->
		@foreach($second_main_post as $second_post)
		<div class="post post-thumb">
			<a class="post-img" href="{{ route('blog.show', $second_post->slug) }}"><img src="{{ asset('storage/post-image/'.$second_post->image) }}" alt="" height="250"></a>
			<div class="post-body">
				<div class="post-category">
					<a href="{{ route('blog.category', $second_post->category->slug) }}">{{ \Illuminate\Support\Str::title($second_post->category->name) }}</a>
				</div>
				<h3 class="post-title title-md"><a href="{{ route('blog.show', $second_post->slug) }}">{{ \Illuminate\Support\Str::words($second_post->title, 11) }}</a></h3>
				<ul class="post-meta">
					<li><a href="author.html">{{ \Illuminate\Support\Str::words($second_post->user->name, 2) }}</a></li>
					<li>{{ $second_post->created_at->diffForHumans() }}</li>
				</ul>
			</div>
		</div>
		@endforeach
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
					<a href="{{ route('blog.category', $post->category->slug) }}">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
				</div>
				<h3 class="post-title"><a href="{{ route('blog.show', $post->slug) }}">{{ \Illuminate\Support\Str::words($post->title, 4) }}</a></h3>
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

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="section-title">
			<h2 class="title">Semua Post</h2>
		</div>
	</div>
	<div class="col-md-12">
		<!-- post -->
		@foreach($all_posts as $post)
		<div class="post post-row">
			<a class="post-img" href="{{ route('blog.show', $post->slug) }}"><img src="{{ asset('storage/post-image/'. $post->image) }}" alt="" style="height: 180px;"></a>
			<div class="post-body">
				<div class="post-category">
					<a href="{{ route('blog.category', $post->category->slug) }}">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
				</div>
				<h3 class="post-title"><a href="{{ route('blog.show', $post->slug) }}">{{ \Illuminate\Support\Str::words($post->title, 8, '...') }}</a></h3>
				<ul class="post-meta">
					<li><a href="author.html">{{ \Illuminate\Support\Str::words($post->user->name, 2) }}</a></li>
					<li>{{ $post->created_at->diffForHumans() }}</li>
				</ul>
				<p>{!! \Illuminate\Support\Str::words($post->content, 10, '...') !!}</p>
			</div>
		</div>
		@endforeach
		<!-- /post -->
		<center>{{ $all_posts->links() }}</center>

		<!-- <div class="section-row loadmore text-center">
			<a href="#" class="primary-button">Load More</a>
		</div> -->
	</div>
</div>
<!-- /row -->

@endsection
