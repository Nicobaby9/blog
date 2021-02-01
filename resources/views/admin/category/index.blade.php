@extends('layouts.backend.home')

@section('title', 'Kategori')

@section('content')
<a class="btn btn-primary" data-toggle="collapse" href="#addCategory" role="button" aria-expanded="false" aria-controls="addCategory">Tambah Kategori</a>
	<div class="card-body">
		<div class="tab-content">
		    <div class="collapse multi-collapse" id="addCategory">
		    	<form role="form" action="{{ route('category.store') }}" method="post">
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
	<table class="table table-hover table-light table-bordered">
		<thead class="table-primary">
			<tr>
				<th scope="col">No.</th>
				<th scope="col">Name</th>
				<th scope="col">Slug</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse($categories as $key => $category)
			<tr>
				<td>{{ $key+=1 }}</td>
				<td>{{ $category->name }}</td>
				<td>{{ $category->slug }}</td>
				<td>
					<a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
					<button class="btn btn-danger btn-flat btn-sm remove-category" data-id="{{ $category->id }}" data-action="{{ route('category.destroy',$category->id) }}"> Delete </button>
				</td>
			</tr>
			@empty
				<td>Tidak ada data.</td>
			@endforelse
		</tbody>
	</table>

	{{ $categories->links() }}

@endsection

@section('js')
<script type="text/javascript">
  $('body').on("click",".remove-category",function(){
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