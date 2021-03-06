@extends('layouts.backend.home')

@section('title', 'Tags')

@section('content')
<div class="card">
  <div class="card-header">
	<a class="btn btn-primary" data-toggle="collapse" href="#addTag" role="button" aria-expanded="false" aria-controls="addTag">Tambah Tag</a>
	<hr>
    <div class="card-header-action">
      <form >
        <div class="input-group">
          <input id="tagSearch" type="text" class="form-control" placeholder="Search" value="{{ old('search') }}">
          <div class="input-group-btn">
            <button class="btn btn-primary" disabled><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
	<div class="card-body">
		<div class="tab-content">
		    <div class="collapse multi-collapse" id="addTag">
		    	<form role="form" action="{{ route('tag.store') }}" method="post">
			        @csrf
			        <div class="form-group">
			            <label>Name</label>
			            <input name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
			        </div>
			        <input type="submit" class="btn btn-info" value="Save">
			        <input type="reset" class="btn btn-danger" value="Reset">
			    </form>
		    </div>
		</div>
	</div>
  <div class="card-body p-0">
    <div class="table-responsive">
		<table class="table table-hover table-light table-bordered">
			<thead class="table-primary">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Name</th>
					<th scope="col">Slug</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody id="myTagSearch">
				@forelse($tags as $key => $tag)
				<tr>
					<td>{{ $key+=1 }}</td>
					<td>{{ $tag->name }}</td>
					<td>{{ $tag->slug }}</td>
					<td>
						<a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm btn-primary">Edit</a>
						<button class="btn btn-danger btn-flat btn-sm remove-tag" data-id="{{ $tag->id }}" data-action="{{ route('tag.destroy',$tag->id) }}"> Delete </button>
					</td>
				</tr>
				@empty
					<td class="blockquote">Tidak ada data.</td>
				@endforelse
			</tbody>
		</table>
    </div>
  </div>
</div>

{{ $tags->links() }}

@endsection

@section('js')
<script type="text/javascript">
	// SEARCH
	$(document).ready(function(){
	  $("#tagSearch").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#myTagSearch tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});

	$('body').on("click",".remove-tag",function(){
		var current_object = $(this);
		swal({
		    title: "Apakah anda Yakin?",
		    text: "You will not be able to recover this imaginary file!",
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