@extends('layouts.backend.home')

@section('title')
	<h1>Dashboard</h1>
@endsection

@if(auth()->user()->role == 99)

@section('header')
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
	  <div class="card card-statistic-1">
	    <div class="card-icon bg-primary">
	      <i class="far fa-user"></i>
	    </div>
	    <div class="card-wrap">
	      <div class="card-header">
	        <h4>Total Author</h4>
	      </div>
	      <div class="card-body">
	        {{ $authors->count() }}
	      </div>
	    </div>
	  </div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
	  <div class="card card-statistic-1">
	    <div class="card-icon bg-danger">
	      <i class="fas fa-user"></i>
	    </div>
	    <div class="card-wrap">
	      <div class="card-header">
	        <h4>Total User</h4>
	      </div>
	      <div class="card-body">
	        {{ $users->count() }}
	      </div>
	    </div>
	  </div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
	  <div class="card card-statistic-1">
	    <div class="card-icon bg-warning">
	      <i class="far fa-newspaper"></i>
	    </div>
	    <div class="card-wrap">
	      <div class="card-header">
	        <h4>Total Post</h4>
	      </div>
	      <div class="card-body">
	        {{ $posts->count() }}
	      </div>
	    </div>
	  </div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
	  <div class="card card-statistic-1">
	    <div class="card-icon bg-success">
	      <i class="fas fa-inbox"></i>
	    </div>
	    <div class="card-wrap">
	      <div class="card-header">
	        <h4>Kotak Masuk</h4>
	      </div>
	      <div class="card-body">
	        {{ $mails->count() }}
	      </div>
	    </div>
	  </div>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-8 col-md-12 col-12 col-sm-12">
	  <div class="card">
	    <div class="card-header">
	      <h4>Authors</h4>
	    </div>
	    <div class="card-body">
	      <div class="row pb-2">
	      	@foreach($authors as $author)
	        <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
	          <div class="avatar-item mb-0">
	            <img alt="image" src="{{ asset('storage/user-photo/'.$author->photo) }}" class="img-fluid" data-toggle="tooltip" title="{{ $author->name }}">
	            <div class="avatar-badge" title="Author" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
	          </div>
	        </div>
	        @endforeach
	      </div>
	    </div>
	  </div>
	</div>
	<div class="col-lg-4 col-md-12 col-12 col-sm-12">
	  <div class="card">
	    <div class="card-header">
	      <h4>Akun Terbaru</h4>
	    </div>
	    <div class="card-body">
	      <ul class="list-unstyled list-unstyled-border">
	      	@foreach($latest_user as $user)
	        <li class="media" style="height: 76px;">
	          <img class="mr-3 rounded-circle" width="50" src="{{ asset('storage/user-photo/'.$user->photo) }}" alt="avatar" width="40" height="50">
	          <div class="media-body">
	            <div class="float-right text-primary">{{ $user->created_at->diffForHumans() }}</div>
	            <div class="media-title"><a href="{{ route('profile.info', $user->profile->username) }}" title="{{ $user->name }}">{{ $user->name }}</a></div>
	            <span class="text-medium text-muted">{{ $user->profile->headline }}</span>
	          </div>
	        </li>	
	        @endforeach
	      </ul>
	      <div class="text-center pt-1 pb-1">
	        <a href="{{ route('user.index') }}" class="btn btn-primary btn-lg btn-round">
	          View All
	        </a>
	      </div>
	    </div>
	  </div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-12 col-sm-12">
		<div class="card">
	        <div class="card-header">
	          <h4>Latest Posts</h4>
	          <div class="card-header-action">
	            <a href="{{ route('post.index') }}" class="btn btn-primary">View All</a>
	          </div>
	        </div>
	        <div class="card-body p-0">
	          <div class="table-responsive">
	            <table class="table table-striped mb-0">
	              <thead class="table-primary">
	                <tr>
	                  <th>Judul</th>
	                  <th>Author</th>
	                  <th>Action</th>
	                </tr>
	              </thead>
	              <tbody>
	              	@foreach($all_post as $post)
	                <tr>
	                  <td>
	                    {{ \Illuminate\Support\Str::words($post->title, 10, " ") }}
	                    <div class="table-links">
	                      Kategori <a href="{{ route('blog.category', $post->category->slug) }}" target="_blank">{{ $post->category->name }}</a>
	                      <div class="bullet"></div>
	                      <a href="{{ route('blog.show', $post->slug) }}" target="_blank">View</a>
	                    </div>
	                  </td>
	                  <td>
	                    <a href="{{ route('profile.info', $post->user->profile->username) }}" class="font-weight-600"><img src="{{ asset('storage/user-photo/'.$post->user->photo) }}" alt="avatar" height="30" width="30" class="rounded-circle mr-1"> {{ \Illuminate\Support\Str::title($post->user->name) }}</a>
	                  </td>
	                  <td>
	                    <a class="btn btn-primary btn-action mr-1" href="{{ route('post.edit', $post->id) }}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
	                    <a class="btn btn-danger btn-action" href="{{ route('post.destroy',$post->id) }}" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?| Post yang dihapus dapat dilihat di folder Post Recycle Bin" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
	                  </td>
	                </tr>
	                @endforeach
	              </tbody>
	            </table>
	          </div>
	        </div>
	    </div>
	</div>
</div>
@endsection

@elseif(auth()->user()->role == 1)

@section('content')
<div class="col-lg-12 col-md-12 col-12 col-sm-12 float-right">
	<div class="card">
        <div class="card-header">
          <h4>Latest Posts by {{ auth()->user()->name }}</h4>
          <div class="card-header-action">
            <a href="{{ route('post.index') }}" class="btn btn-primary">View All</a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead class="table-primary">
                <tr>
                  <th>Judul</th>
                  <th>Author</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($all_post as $post)
                <tr>
                  <td>
                    {{ \Illuminate\Support\Str::words($post->title, 10, " ") }}
                    <div class="table-links">
                      Kategori <a href="{{ route('blog.category', $post->category->slug) }}" target="_blank">{{ $post->category->name }}</a>
                      <div class="bullet"></div>
                      <a href="{{ route('blog.show', $post->slug) }}" target="_blank">View</a>
                    </div>
                  </td>
                  <td>
                    <a href="{{ route('profile.info', $post->user->profile->username) }}" class="font-weight-600"><img src="{{ asset('storage/user-photo/'.$post->user->photo) }}" alt="avatar" height="30" width="30" class="rounded-circle mr-1"> {{ \Illuminate\Support\Str::title($post->user->name) }}</a>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-action mr-1" href="{{ route('post.edit', $post->id) }}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-action" href="{{ route('post.destroy',$post->id) }}" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?| Post yang dihapus dapat dilihat di folder Post Recycle Bin" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection

@endif