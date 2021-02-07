@extends('layouts.frontend.home')

@section('second-content')

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="section-title">
			@if(request()->is('/tag/{tag}'))
			<h2 class="title">Tag : {{ $tag->name }}</h2>
			@elseif(request()->is(route('blog.search')))
			<h2 class="title">Search</h2>
			@endif
		</div>
	</div>
	<div class="col-md-12">
		<!-- post -->
		@forelse($posts as $post)
		<div class="post post-row">
			<a class="post-img" href="{{ route('blog.show', $post->slug) }}"><img src="{{ asset('storage/post-image/'. $post->image) }}" alt=""></a>
			<div class="post-body">
				<div class="post-category">
					<a href="category.html">{{ \Illuminate\Support\Str::title($tag->name) }}</a>
				</div>
				<h3 class="post-title"><a href="{{ route('blog.show', $post->slug) }}">{{ \Illuminate\Support\Str::words($post->title, 8, '...') }}</a></h3>
				<ul class="post-meta">
					<li><a href="author.html">{{ \Illuminate\Support\Str::words($post->user->name, 2) }}</a></li>
					<li>{{ $post->created_at->diffForHumans() }}</li>
				</ul>
				<p>{!! \Illuminate\Support\Str::words($post->content, 10, '...') !!}</p>
			</div>
		</div>
		@empty
		<hr>
		<center><h2 class="title">Tidak ada artikel terkait.</h2></center>
		@endforelse
		<!-- /post -->

		<!-- <div class="section-row loadmore text-center">
			<a href="#" class="primary-button">Load More</a>
		</div> -->
	</div>
</div>
<!-- /row -->

@endsection
