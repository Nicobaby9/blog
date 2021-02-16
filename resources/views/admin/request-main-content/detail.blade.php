@extends('layouts.backend.home')

@section('title', 'Accept Request')

@section('content')

<div class="card">
  <div class="card-header">
    <h4>{{ $requestMainContent->post->title }}</h4>
  </div>
  <div class="card-body">
    <p>{!! \Illuminate\Support\Str::words($requestMainContent->post->content, 63) !!}</p>
  </div>
  <div class="card-footer bg-whitesmoke">
    Category : {{ $requestMainContent->post->category->name }}
    ||
    Comment Total : {{ $requestMainContent->post->comments->count() }}
    ||
    Status : @if($requestMainContent->status == 2) Pending @endif
    <hr>
	<form action="{{ route('request-main-content.update', $requestMainContent->id) }}" method="POST">  
		@csrf
		@method('PATCH')
		<input type="hidden" name="main_content" value="1"/>
		<button type="submit" class="btn btn-sm btn-primary btn-block" onclick="return confirm('Apakah anda yakin??')"> Accept </button>
	</form>
	<br>
	<button class="btn btn-danger btn-flat btn-sm btn-block remove-request" data-id="{{ $requestMainContent->id }}" data-action="{{ route('request-main-content.destroy',$requestMainContent->id) }}"> Decline </button>
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
  	$('body').on("click",".remove-request",function(){
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