<!-- comment -->
@foreach($comments as $comment)

<div class="media media-author">
	<div class="media-left">
		<img class="media-object" src="{{ asset('storage/user-photo/'.$comment->user->photo) }}" height="50">
	</div>
	<div class="media-body">
		<div class="media-heading">
			<h4>{{ $comment->user->name }}</h4>
			<span class="time">{{ $comment->created_at->diffForHumans() }}</span>
		</div>
		<p>{{ $comment->body }}</p>
	</div>
</div>
@endforeach