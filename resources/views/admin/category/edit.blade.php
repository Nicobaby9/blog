@extends('layouts.backend.home')

@section('title', 'Edit Kategori')

@section('content')

<form action="{{ route('category.update', $category->id)  }}" method="post" accept-charset="utf-8">
	@csrf
	@method('PATCH')
	<div class="form-group">
		<label for="category">Kategori</label>
		<input name="name" type="text" class="form-control" value="{{ $category->name }}"></input>
	</div>
	<div class="form-group">
		<button class="btn btn-primary btn-block">Update Kategori</button>
	</div>
</form>

@endsection