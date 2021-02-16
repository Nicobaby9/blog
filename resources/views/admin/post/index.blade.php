@extends('layouts.backend.home')

@section('title', 'Post')

@section('content')

<div class="card">
  <div class="card-header">
	<a class="btn btn-primary" href="{{ route('post.create') }}" role="button" aria-expanded="false">Tambah Post</a>
	<hr>
    <div class="card-header-action">
      <form action="{{ route('post.search') }}" method="get">
        <div class="input-group">
          <input name="search" type="text" class="form-control" placeholder="Search" value="{{ old('search') }}">
          <div class="input-group-btn">
            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
		<table class="table table-hover table-light table-bordered">
			<thead class="table-primary">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Title</th>
					<th scope="col">Author</th>
					<th scope="col">Kategory</th>
					@if(auth()->user()->role == 99)
					<th scope="col">Main Post</th>
					@elseif(auth()->user()->role == 1)
					<th scope="col">Request Main Post</th>
					@endif
					<th scope="col">Thumbnail</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($posts as $key => $post)
				<tr>
					<td>{{ $key+=1 }}</td>
					<td>{{ \Illuminate\Support\Str::title($post->title) }}</td>
					<td>{{ \Illuminate\Support\Str::title($post->user->name) }}</td>
					<td>{{ \Illuminate\Support\Str::title($post->category->name) }}</td>
					@if(auth()->user()->role == 99)
					<td>
						@if($post->main_content == 1)
							<form action="{{ route('post.main.post', $post->id) }}" method="POST">  
								@csrf
								@method('PATCH')
		    					<input type="hidden" name="main_content" value="0"/>
								<button type="submit" class="btn btn-sm btn-success btn-block confirm-main" onclick="return confirm('Apakah anda yakin??')"> Main </button>
							</form>
						@else
							<form action="{{ route('post.main.post', $post->id) }}" method="POST">  
								@csrf
								@method('PATCH')
		    					<input type="hidden" name="main_content" value="1"/>
								<button type="submit" class="btn btn-sm btn-danger btn-block" onclick="return confirm('Apakah anda yakin??')"> No </button>
							</form>
						@endif
					</td>
					@elseif(auth()->user()->role == 1)
					<td>
						@if($post->main_content == 0)
							<form action="{{ route('request-main-content.updateMainContent', $post->id) }}" method="POST">  
								@csrf
								@method('PATCH')
		    					<input type="hidden" name="main_content" value="2"/>
								<button type="submit" class="btn btn-sm btn-primary btn-block" onclick="return confirm('Apakah anda yakin??')"> Request </button>
							</form>
						@elseif($post->main_content == 1)
							<button type="reset" class="btn btn-sm btn-success btn-block"> Main </button>
						@elseif($post->main_content == 2)
							<button type="reset" class="btn btn-sm btn-info btn-block"> Pending </button>
						@endif
					</td>
					@endif
					<td><img src="{{ asset('storage/post-image/'. $post->image) }}" class="img-fluid" width="99"></td>
					<td>
						<a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary btn-block">Edit</a>
						<button class="btn btn-danger btn-flat btn-sm btn-block remove-post" data-id="{{ $post->id }}" data-action="{{ route('post.destroy',$post->id) }}"> Delete </button>
					</td>
				</tr>
				@empty
					<td>Tidak ada data.</td>
				@endforelse
			</tbody>
		</table>
    </div>
  </div>
</div>

{{ $posts->links() }}

@endsection

@section('js')
<script type="text/javascript">

	$('#id').on('shown.bs.modal', function () {
	  $('#myInput').trigger('focus').show();
	});

  	$('body').on("click",".remove-post",function(){
	    var current_object = $(this);
	    swal({
	        title: "Apakah anda Yakin?",
	        text: "Post masih dapat dilihat di Post Recycle Bin.",
	        type: "error",
	        showCancelButton: true,
	        dangerMode: true,
	        cancelButtonClass: '#ffffff',
	        confirmButtonColor: '#dc3545',
	        confirmButtonText: 'Hapus',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});
</script>
@endsection