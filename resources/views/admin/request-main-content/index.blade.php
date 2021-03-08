@extends('layouts.backend.home')

@section('css')
	<style type="text/css" media="screen">
		table.dataTable thead .sorting:after,
		table.dataTable thead .sorting:before,
		table.dataTable thead .sorting_asc:after,
		table.dataTable thead .sorting_asc:before,
		table.dataTable thead .sorting_asc_disabled:after,
		table.dataTable thead .sorting_asc_disabled:before,
		table.dataTable thead .sorting_desc:after,
		table.dataTable thead .sorting_desc:before,
		table.dataTable thead .sorting_desc_disabled:after,
		table.dataTable thead .sorting_desc_disabled:before {
		bottom: .5em;
		}
	</style>
@endsection

@section('title', 'Request Main Content')

@section('content')

<div class="card">
  <!-- <div class="card-header">
	<hr>
    <div class="card-header-action">
      <form action="" method="get">
        <div class="input-group">
          <input name="search" type="text" class="form-control" placeholder="Search" value="{{ old('search') }}">
          <div class="input-group-btn">
            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div> -->
  <div class="card-body p-0">
    <div class="table-responsive">
		<table id="selectedColumn" class="table table-hover table-light table-bordered" cellspacing="0">
			<thead class="table-primary">
				<tr>
					<th scope="col" class="th-sm">No.</th>
					<th scope="col" class="th-sm">Judul</th>
					<th scope="col" class="th-sm">Author</th>
					<th scope="col" class="th-sm">Jumlah Tayangan</th>
					<th scope="col" class="th-sm">Thumbnail</th>
					<th scope="col" class="th-sm">Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($requestMainContents as $key => $post)
				<tr>
					<td>{{ $key+=1 }}</td>
					<td>{{ \Illuminate\Support\Str::title($post->post->title) }}</td>
					<td>{{ \Illuminate\Support\Str::title($post->post->user->name) }}</td>
					<td>{{ $post->post->view_count }}</td>
					<td><img src="{{ asset('uploads/post-image/'. $post->post->image) }}" class="img-fluid" width="99"></td>
					<td>
						<a href="{{ route('request-main-content.detail', $post->id) }}" class="btn btn-sm btn-info btn-block">Detail</a>
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

{{ $requestMainContents->links() }}

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

	$(document).ready(function () {
		$('#dtOrderExample').DataTable({
		"order": [[ 3, "desc" ]]
		});
		$('.dataTables_length').addClass('bs-select');
	});
</script>
@endsection