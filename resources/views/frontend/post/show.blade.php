@extends('layouts.frontend.home')

@section('header')
	<!-- Alert Message -->
    @include('layouts.backend.partials.message')
    <!-- //@include('sweetalert::alert') -->
	<div id="post-header" class="page-header">
		<div class="page-header-bg" style="background-image: url('{{ asset('storage/post-image/'. $post->image)  }}');" data-stellar-background-ratio="0.5"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="post-category">
						<a href="category.html" style="font-weight: bold">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
					</div>
					<h1>{{ \Illuminate\Support\Str::title($post->title) }}</h1>
					<ul class="post-meta">
						<li><a href="author.html">{{ \Illuminate\Support\Str::title($post->user->name) }}</a></li>
						<li>{{ \Carbon\Carbon::parse($post->created_at)->format('d-M-Y') }}</li>
						<li><i class="fa fa-comments"></i> {{ $post->comments->count() }}</li>
						<li><i class="fa fa-eye"></i> {{ $post->view_count }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('second-content')

<div class="row">
	<div class="col-md-12">
		<!-- post share -->
		<div class="section-row">
			<div class="post-share">
				<label>Category : </label>
				<a href="{{ route('blog.category', $post->category->slug) }}" class="btn btn-sm btn-success" style="background-color: black; width: 30%;">{{ $post->category->name }}</a>
			</div>
		</div>
		<!-- /post share -->

		<!-- post content -->
		<div class="section-row">
			<p>{!! \Illuminate\Support\Str::afterLast($post->content, '...') !!}</p>
		</div>
		<!-- /post content -->

		<!-- post tags -->
		<div class="section-row">
			<div class="post-tags">
				<ul>
					<li>TAGS:</li>
					@foreach($post->tags as $tag)
					<li>
						<a href="{{ route('blog.tag', $tag->slug) }}" class="btn btn-sm btn-success" style="background-color: transparent; color: black;">{{ $tag->name }}</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<!-- /post tags -->

		<!-- post nav -->
		<!-- <div class="section-row">
			<div class="post-nav">
				<div class="prev-post">
					<a class="post-img" href="blog-post.html"><img src="" alt=""></a>
					<h3 class="post-title"><a href="#">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
					<span>Previous post</span>
				</div>

				<div class="next-post">
					<a class="post-img" href="blog-post.html"><img src="" alt=""></a>
					<h3 class="post-title"><a href="#">Postea senserit id eos, vivendo periculis ei qui</a></h3>
					<span>Next post</span>
				</div>
			</div>
		</div> -->
		<!-- /post nav  -->

		<!-- post author -->
		<!-- <div class="section-row">
			<div class="section-title">
				<h3 class="title">About <a href="author.html">John Doe</a></h3>
			</div>
			<div class="author media">
				<div class="media-left">
					<a href="author.html">
						<img class="author-img media-object" src="" alt="">
					</a>
				</div>
				<div class="media-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<ul class="author-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div> -->
		<!-- /post author -->

		<!-- /related post -->
		<div>
			<div class="section-title">
				<h3 class="title">Related Posts</h3>
			</div>
			<div class="row">
				<!-- post -->
				@foreach($related_post as $post)
				<div class="col-md-4">
					<div class="post post-sm">
						<a class="post-img" href="{{ route('blog.show', $post->slug) }}"><img src="{{ asset('storage/post-image/'.$post->image) }}" height="145"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
							</div>
							<h3 class="post-title title-sm"><a href="{{ route('blog.show', $post->slug) }}">{{ \Illuminate\Support\Str::title($post->title) }}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{ \Illuminate\Support\Str::title($post->user->name) }}</a></li>
								<li>{{ \Carbon\Carbon::parse($post->created_at)->format('d-M-Y') }}</li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
				<!-- /post -->
			</div>
		</div>
		<!-- /related post -->

		<!-- post comments -->
		<div class="section-row">
			<div class="section-title">
				<h3 class="title">{{ $post->comments->count() }} Comments</h3>
			</div>
			@forelse($post->comments as $comment)
			<div class="post-comments">
				<!-- comment -->
				<div class="media">
					<div class="media-left">
						<img class="media-object" src="{{ asset('storage/user-photo/'.$comment->user->photo) }}" height="50">
					</div>
					<div class="media-body">
						<div class="media-heading">
							<h4>{{ $comment->user->name }}</h4>
							<span class="time">{{ $comment->created_at->diffForHumans() }}</span>
						</div>
						<p>{{ $comment->body }}</p>
						<button class="reply btn btn-dark" id="reply" onclick="reply('{{ $comment->id }}')">Replies ( <span>{{ $comment->replies->count() }}</span> )</button>
						<hr>
						<div class="reply-{{ $comment->id }} hidden">
							@include('frontend.post.partials.comment_replies', ['comments' => $comment->replies->take(6)])
							<form action="{{ route('reply.add') }}" class="post-reply " method="POST" id="reply">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
							                <input type="hidden" name="post_id" value="{{ $post->id }}" />
							                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
							            </div>
										<div class="form-group">
											<textarea class="input" name="comment_body" placeholder="Message" required>{{ old('comment_body') }}</textarea>
										</div>
									</div>
									<div class="col-md-12">
										<button class="primary-button">Reply</button>
									</div>
								</div>
							</form>
							<br>
						</div>
						<!-- /comment -->
					</div>
				</div>
				<!-- /comment -->
			</div>
			@empty
			<h5>Belum ada komentar.</h5>
			@endforelse
		</div>
		<!-- /post comments -->

		<!-- post reply -->
		<div class="section-row">
			<div class="section-title">
				<h3 class="title">Beri Komentar</h3>
			</div>
			<form action="{{ route('comment.add') }}" class="post-reply" method="POST">
				@csrf
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
                            <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                        </div>
						<div class="form-group">
							<textarea class="input" name="comment_body" placeholder="Message" required="">{{ old('comment_body') }}</textarea>
						</div>
					</div>
					<div class="col-md-12">
						<button class="primary-button">Komen</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /post reply -->
	</div>
</div>
@endsection

@section('js')

<!-- SweetAlert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
	function reply(commentId){
        $('.reply-'+commentId).toggleClass('hidden');
    }

</script>
@endsection