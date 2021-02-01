@extends('layouts.backend.home')

@section('title', 'Kategori')

@section('content')
<a class="btn btn-primary" href="{{ route('post.create') }}" role="button" aria-expanded="false">Tambah Post</a>
<table class="table table-hover table-light table-bordered">
	<thead class="table-primary">
		<tr>
			<th scope="col">No.</th>
			<th scope="col">Title</th>
			<th scope="col">Kategory</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse($posts as $key => $post)
		<tr>
			<td>{{ $key+=1 }}</td>
			<td>{{ $post->title }}</td>
			<td>{{ $post->category->name }}</td>
			<td>
				<a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
				<button class="btn btn-danger btn-flat btn-sm remove-post" data-id="{{ $post->id }}" data-action="{{ route('post.destroy',$post->id) }}"> Delete </button>
			</td>
		</tr>
		@empty
			<td>Tidak ada data.</td>
		@endforelse
	</tbody>
</table>

{{ $posts->links() }}

@endsection