@extends('layouts.backend.home')

@section('title', 'Post')

@section('content')

<h2 class="section-title">Posts</h2>
<p class="section-lead">
  Halaman manajemen post.
</p>

<div class="row">
  <div class="col-12">
    <div class="card mb-0">
      <div class="card-body">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="#all" data-toggle="tab">All <span class="badge badge-white">{{ $all_post->count() }}</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#published" data-toggle="tab">Published <span class="badge badge-primary">{{ $published_posts->count() }}</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#draft" data-toggle="tab">Draft <span class="badge badge-primary">{{ $draft_posts->count() }}</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pending" data-toggle="tab">Pending <span class="badge badge-primary">{{ $pending_posts->count() }}</span></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="tab-content">
	<!-- ALL POST -->
	<div class="tab-pane active" id="all">
		<div class="row mt-4">
		  <div class="col-12">
		    <div class="card">
		      <div class="card-header">
		        <h4>Semua Post</h4>
		      </div>
		      <div class="card-body">
		        <div class="float-left">
		            <div class="input-group">
			          <a class="btn btn-primary btn-block" href="{{ route('post.create') }}" role="button" aria-expanded="false">Tambah Post</a>
			          <hr>
		            </div>
		        </div>
		        <div class="float-right">
		          <form>
		            <div class="input-group">
		              <input id="allSearch" type="text" class="form-control" placeholder="Search" value="{{ old('search') }}">
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
							@if(auth()->user()->role == 99)
							<th scope="col">Main Content</th>
							@elseif(auth()->user()->role == 1)
							<th scope="col">Request Main Content</th>
							@endif
							<th scope="col">Status</th>
			            </tr>
		        	</thead>
		        	<tbody id="myAllSearch">
			            @forelse($all_post as $key => $post)
			            <tr>
			            	<td>{{ $key+=1 }}</td>
				              <td>{{ \Illuminate\Support\Str::words($post->title, 6, " ") }}
				                <div class="table-links">
				                  <a href="{{ route('blog.show', $post->slug) }}" target="_blank">View</a>
				                  <div class="bullet"></div>
				                  <a href="{{ route('post.edit', $post->id) }}">Edit</a>
				                  <div class="bullet"></div>
				                  <a href="" class="text-danger trash-post" data-id="{{ $post->id }}" data-action="{{ route('post.destroy',$post->id) }}">Trash</a>
				                </div>
				              </td>
				              <td>
				                <a href="{{ route('blog.category', $post->category->slug) }}" target="_blank">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
				              </td>
				              <td>
				                <a href="{{ route('profile.info', $post->user->profile->username) }}">
				                  <img alt="image" src="{{ asset('uploads/user-photo/'.$post->user->photo) }}" class="rounded-circle" height="25" width="25" data-toggle="{{ $post->user->name }}" title=""> <div class="d-inline-block ml-1 font-weight-bold">{{ \Illuminate\Support\Str::title($post->user->name) }}</div>
				                </a>
				              </td>
				              @if(auth()->user()->role == 99)
								<td>
									@if($post->main_content == 1)
										<form action="{{ route('post.main.post', $post->id) }}" method="POST">  
											@csrf
											@method('PATCH')
					    					<input type="hidden" name="main_content" value="0"/>
											<button type="submit" class="btn btn-sm btn-success btn-block confirm-main" onclick="return confirm('Apakah anda ingin menghapus dari Main Content??')"> Main </button>
										</form>
									@else
										<form action="{{ route('post.main.post', $post->id) }}" method="POST">  
											@csrf
											@method('PATCH')
					    					<input type="hidden" name="main_content" value="1"/>
											<button type="submit" class="btn btn-sm btn-danger btn-block" onclick="return confirm('Apakah anda ingin menjadikan sebagai Main Content?')"> No </button>
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
				              <td>
				              	@if($post->status == 0)
				              	<div class="badge badge-warning btn-block">Draft</div>
				              	@elseif($post->status == 1)
				              	<div class="badge badge-primary btn-block">Published</div>
				              	@elseif($post->status == 2)
				              	<div class="badge badge-info btn-block">Pending</div>
				              	@endif
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
						{{ $all_post->links() }}
		            </ul>
		          </nav>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<!-- END ALL POST -->

	<!-- Published Post -->
	<div class="tab-pane" id="published">
		<div class="row mt-4">
		  <div class="col-12">
		    <div class="card">
		      <div class="card-header">
		        <h4>Published Post</h4>
		      </div>
		      <div class="card-body">
		        <div class="float-left">
		            <div class="input-group">
			          <a class="btn btn-primary btn-block" href="{{ route('post.create') }}" role="button" aria-expanded="false">Tambah Post</a>
			          <hr>
		            </div>
		        </div>
		        <div class="float-right">
		          <form>
		            <div class="input-group">
		              <input id="publishedSearch" type="text" class="form-control" placeholder="Search" value="{{ old('search') }}">
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
							@if(auth()->user()->role == 99)
							<th scope="col">Main Post</th>
							@elseif(auth()->user()->role == 1)
							<th scope="col">Request Main Post</th>
							@endif
							<th scope="col">Status</th>
			            </tr>
		        	</thead>
		        	<tbody id="myPublishedSearch">
			            @forelse($published_posts as $key => $post)
			            <tr>
			            	<td>{{ $key+=1 }}</td>
				              <td>{{ \Illuminate\Support\Str::words($post->title, 6, " ") }}
				                <div class="table-links">
				                  <a href="{{ route('blog.show', $post->slug) }}" target="_blank">View</a>
				                  <div class="bullet"></div>
				                  <a href="{{ route('post.edit', $post->id) }}">Edit</a>
				                  <div class="bullet"></div>
				                  <a href="" class="text-danger trash-post" data-id="{{ $post->id }}" data-action="{{ route('post.destroy',$post->id) }}">Trash</a>
				                </div>
				              </td>
				              <td>
				                <a href="{{ route('blog.category', $post->category->slug) }}" target="_blank">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
				              </td>
				              <td>
				                <a href="#">
				                  <img alt="image" src="{{ asset('uploads/user-photo/'.$post->user->photo) }}" class="rounded-circle" height="25" width="25" data-toggle="title" title=""> <div class="d-inline-block ml-1 font-weight-bold">{{ \Illuminate\Support\Str::title($post->user->name) }}</div>
				                </a>
				              </td>
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
				              <td>
				              	@if($post->status == 0)
				              	<div class="badge badge-warning btn-block">Draft</div>
				              	@elseif($post->status == 1)
				              	<div class="badge badge-primary btn-block">Published</div>
				              	@elseif($post->status == 2)
				              	<div class="badge badge-info btn-block">Pending</div>
				              	@endif
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
						{{ $published_posts->links() }}
		            </ul>
		          </nav>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<!-- END Published Post -->

	<!-- DRAFT POST -->
	<div class="tab-pane" id="draft">
		<div class="row mt-4">
		  <div class="col-12">
		    <div class="card">
		      <div class="card-header">
		        <h4>Draft Post</h4>
		      </div>
		      <div class="card-body">
		        <div class="float-left">
		            <div class="input-group">
			          <a class="btn btn-primary btn-block" href="{{ route('post.create') }}" role="button" aria-expanded="false">Tambah Post</a>
			          <hr>
		            </div>
		        </div>
		        <div class="float-right">
		          <form>
		            <div class="input-group">
		              <input id="draftSearch" type="text" class="form-control" placeholder="Search" value="{{ old('search') }}">
		              <div class="input-group-append">
		                <button class="btn btn-primary" disabled><i class="fas fa-search"></i></button>
		              </div>
		            </div>
		          </form>
		        </div>

		        <div class="clearfix mb-3"></div>

		        <div class="table-responsive">
		          <table class="table table-striped table-light table-hover">
		          	<thead class="table-primary">
			            <tr>
			              	<th scope="col">No.</th>
							<th scope="col">Judul</th>
							<th scope="col">Kategory</th>
							<th scope="col">Author</th>
							<th scope="col">Thumbnail</th>
							<th scope="col">Status</th>
			            </tr>
		        	</thead>

		        	<tbody id="myDraftSearch">
			            @forelse($draft_posts as $key => $post)
			            <tr>
			            	<td>{{ $key+=1 }}</td>
								<td>{{ \Illuminate\Support\Str::words($post->title, 6, " ") }}
								<div class="table-links">
								  <a href="{{ route('blog.show', $post->slug) }}" target="_blank">View</a>
								  <div class="bullet"></div>
								  <a href="{{ route('post.edit', $post->id) }}">Edit</a>
								  <div class="bullet"></div>
								  <a href="" class="text-danger remove-post" data-id="{{ $post->id }}" data-action="{{ route('post.destroy',$post->id) }}">Trash</a>
								</div>
								</td>
								<td>
								<a href="{{ route('blog.category', $post->category->slug) }}" target="_blank">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
								</td>
								<td>
								<a href="#">
								  <img alt="image" src="{{ asset('uploads/user-photo/'.$post->user->photo) }}" class="rounded-circle" height="25" width="25" data-toggle="title" title=""> <div class="d-inline-block ml-1 font-weight-bold">{{ \Illuminate\Support\Str::title($post->user->name) }}</div>
								</a>
								</td>
				              	<td><img src="{{ asset('uploads/post-image/'. $post->image) }}" height="50" width="99"></td>
				              	<td>
					              	@if($post->status == 0)
					              	<div class="badge badge-warning btn-block">Draft</div>
					              	@elseif($post->status == 1)
					              	<div class="badge badge-primary btn-block">Published</div>
					              	@elseif($post->status == 2)
					              	<div class="badge badge-info btn-block">Pending</div>
					              	@endif
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
						{{ $draft_posts->links() }}
		            </ul>
		          </nav>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<!-- END DRAFT POST -->

	<!-- PENDING -->
	<div class="tab-pane" id="pending">
		<div class="row mt-4">
		  <div class="col-12">
		    <div class="card">
		      <div class="card-header">
		        <h4>Pending Post</h4>
		      </div>
		      <div class="card-body">
		        <div class="float-left">
		            <div class="input-group">
			          <hr>
		            </div>
		        </div>
		        <div class="float-right">
		          <form>
		            <div class="input-group">
		              <input id="pendingSearch" type="text" class="form-control" placeholder="Search" value="{{ old('search') }}">
		              <div class="input-group-append">
		                <button class="btn btn-primary" disabled><i class="fas fa-search"></i></button>
		              </div>
		            </div>
		          </form>
		        </div>

		        <div class="clearfix mb-3"></div>

		        <div class="table-responsive">
		          <table class="table table-striped table-light table-hover">
		          	<thead class="table-primary">
			            <tr>
			              	<th scope="col">No.</th>
							<th scope="col">Judul</th>
							<th scope="col">Kategory</th>
							<th scope="col">Author</th>
							<th scope="col">Thumbnail</th>
							<th scope="col">Status</th>
			            </tr>
		        	</thead>

		        	<tbody id="myPendingSearch">
			            @forelse($pending_posts as $key => $post)
			            <tr>
			            	<td>{{ $key+=1 }}</td>
							<td>{{ \Illuminate\Support\Str::words($post->title, 6, " ") }}
							<div class="table-links">
							  <a href="{{ route('blog.show', $post->slug) }}" target="_blank">View</a>
							  <div class="bullet"></div>
							  <a href="{{ route('post.edit', $post->id) }}">Edit</a>
							  <div class="bullet"></div>
							  <a href="" class="text-danger remove-post" data-id="{{ $post->id }}" data-action="{{ route('post.destroy',$post->id) }}">Trash</a>
							</div>
							</td>
							<td>
							<a href="{{ route('blog.category', $post->category->slug) }}" target="_blank">{{ \Illuminate\Support\Str::title($post->category->name) }}</a>
							</td>
							<td>
							<a href="#">
							  <img alt="image" src="{{ asset('uploads/user-photo/'.$post->user->photo) }}" class="rounded-circle" height="25" width="25" data-toggle="title" title=""> <div class="d-inline-block ml-1 font-weight-bold">{{ \Illuminate\Support\Str::title($post->user->name) }}</div>
							</a>
							</td>
			              	<td><img src="{{ asset('uploads/post-image/'. $post->image) }}" height="50" width="99"></td>
			              	<td>
				              	@if($post->status == 0)
				              	<div class="badge badge-warning btn-block">Draft</div>
				              	@elseif($post->status == 1)
				              	<div class="badge badge-primary btn-block">Published</div>
				              	@elseif($post->status == 2)
				              	<div class="badge badge-info btn-block">Pending</div>
				              	@endif
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
						{{ $pending_posts->links() }}
		            </ul>
		          </nav>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<!-- END PENDING -->
</div>

@endsection

@section('js')
<script type="text/javascript">

	$('#id').on('shown.bs.modal', function () {
	  $('#myInput').trigger('focus').show();
	});

	$('body').on("click",".trash-post",function(){
	    var current_object = $(this);
	    swal({
	        title: "Apakah anda Yakin?",
	        text: "Post yang dihapus tidak akan bisa dilihat kembali!",
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

	// ALL POST SEARCH
	$(document).ready(function(){
	  $("#allSearch").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#myAllSearch tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});

	// PUBLISHED POST SEARCH
	$(document).ready(function(){
	  $("#publishedSearch").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#myPublishedSearch tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});

	// DRAFT POST SEARCH
	$(document).ready(function(){
	  $("#draftSearch").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#myDraftSearch tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});

	// PENDING POST SEARCH
	$(document).ready(function(){
	  $("#pendingSearch").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#myPendingSearch tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});
</script>
@endsection