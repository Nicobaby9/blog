@extends('layouts.backend.home')

@section('title', 'Kotak Masuk')

@section('content')

<div class="card">
  <!-- <div class="card-header">
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
		<table class="table table-hover table-light table-bordered">
			<thead class="table-primary">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Email</th>
					<th scope="col">Subject</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($mails as $key => $mail)
				<tr>
					<td>{{ $key+=1 }}</td>
					<td>{{ $mail->email }}</td>
					<td>{{ $mail->subject }}</td>
					<td>
						<a href="{{ route('advice-mail.show', $mail->id) }}" class="btn btn-sm btn-primary">Lihat Pesan</a>
						<button class="btn btn-danger btn-flat btn-sm remove-mail" data-id="{{ $mail->id }}" data-action="{{ route('advice-mail.destroy',$mail->id) }}"> Delete </button>
					</td>
				</tr>
				@empty
					<td><h4>Tidak ada pesan.</h4></td>
				@endforelse
			</tbody>
		</table>
    </div>
  </div>
</div>

{{ $mails->links() }}

@endsection

@section('js')
<script type="text/javascript">

	$('#id').on('shown.bs.modal', function () {
	  $('#myInput').trigger('focus').show();
	});

  	$('body').on("click",".remove-mail",function(){
	    var current_object = $(this);
	    swal({
	        title: "Apakah anda Yakin?",
	        text: "Pesan masih dapat dilihat di Spam.",
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