@extends('layouts.backend.home')

@section('title', 'Post Recycle Bin')

@section('content')
<h2 class="section-title">Trash Post</h2>
<p class="section-lead">
  Halaman trash post.
</p>

<div class="tab-content">
	<!-- ALL POST -->
	<div class="tab-pane active" id="all">
		<div class="row mt-4">
		  <div class="col-12">
		    <div class="card">
		      <div class="card-header">
		        <h4>Trash POST</h4>
		      </div>
		      <div class="card-body">
		        <div class="float-right">
		          <form>
		            <div class="input-group">
		              <input id="mySearch" type="text" class="form-control" placeholder="Search" value="{{ old('search') }}">
		              <div class="input-group-append">
		                <button class="btn btn-primary" disabled><i class="fas fa-search"></i></button>
		              </div>
		            </div>
		          </form>
		        </div>

		        <div class="clearfix mb-3"></div>

		        <div class="table-responsive">
		          <table class="table table-striped">
		          	<thead class="table-primary">
			            <tr>
			              	<th scope="col">No.</th>
							<th scope="col">Judul</th>
							<th scope="col">Kategory</th>
							<th scope="col">Author</th>
							<th scope="col">Thumbnail</th>
							<th scope="col">Action</th>
			            </tr>
		        	</thead>
		        	<tbody id="myTable">
			            @forelse($posts as $key => $post)
						<tr>
							<td>{{ $key+=1 }}</td>
							<td>{{ $post->title }}</td>
							<td>{{ $post->category->name }}</td>
							<td><a href="" title="">{{ $post->user->name }}</a></td>	
							<td><img src="{{ asset('storage/post-image/'. $post->image) }}" class="img-fluid" width="99"></td>
							<td>
								<a href="{{ route('post.restore', $post->id) }}" class="btn btn-sm btn-primary btn-block" onclick="return confirm('Apakah anda yakin?')">Restore</a>
								<button class="btn btn-danger btn-flat btn-sm btn-block remove-post" data-id="{{ $post->id }}" data-action="{{ route('post.clean',$post->id) }}"> Delete </button>
							</td>
						</tr>
						@empty
							<td>Tidak ada data.</td>
						@endforelse
		        	</tbody>
		          </table>
		        </div>
		        <div class="float-right">
		          <nav>
		            <ul class="pagination">
						{{ $posts->links() }}
		            </ul>
		          </nav>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<!-- END ALL POST -->
</div>

{{ $posts->links() }}

@endsection

@section('js')
<script type="text/javascript">

	$(document).ready(function(){
	  $("#mySearch").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#myTable tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});

	$('body').on("click",".remove-post",function(){
	    var current_object = $(this);
	    swal({
	        title: "Apakah anda Yakin?",
	        text: "Post yang akan dihapus tidak akan bisa di restore!",
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