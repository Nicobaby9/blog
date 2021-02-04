@extends('layouts.frontend.home')

@section('second-content')

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="section-title">
			<h2 class="title">Semua Kategori</h2>
		</div>
	</div>
	<div class="col-md-11">
		@foreach($all_categories as $category)
		<div class="post-meta">
			<a href="{{ route('blog.category', $category->slug) }}" class="btn btn-block btn-info btn-lg" style="color: black; font-weight: bold;">{{ \Illuminate\Support\Str::title($category->name) }}</a>
		</div>
		<hr>
		@endforeach
	</div>
</div>
<!-- /row -->

@endsection
