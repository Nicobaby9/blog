@extends('layouts.backend.home')

@section('title', 'Edit Tag')

@section('content')

<form action="{{ route('tag.update', $tag->id)  }}" method="post" accept-charset="utf-8">
	@csrf
	@method('PATCH')
	<div class="form-group">
		<label for="tag">Tag</label>
		<input name="name" type="text" class="form-control" value="{{ $tag->name }}"></input>
	</div>
	<div class="form-group">
		<button class="btn btn-primary btn-block">Update Tag</button>
	</div>
</form>

@endsection