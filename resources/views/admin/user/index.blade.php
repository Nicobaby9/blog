@extends('layouts.backend.home')

@section('title', 'User')

@section('content')
<a class="btn btn-primary" href="{{ route('user.create') }}" role="button" aria-expanded="false">Tambah User</a>
<hr>
<table class="table table-hover table-light table-bordered">
	<thead class="table-primary">
		<tr>
			<th scope="col">No.</th>
			<th scope="col">Nama</th>
			<th scope="col">Email</th>
			<th scope="col">Role</th>
			<th scope="col">Photo</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse($users as $key => $user)
		<tr>
			<td>{{ $key+=1 }}</td>
			<td>{{ \Illuminate\Support\Str::title($user->name) }}</td>
			<td>{{ $user->email }}</td>
			<td>
				@if($user->role == 99)
					<span class="badge badge-dark">Administrator</span> 
				@elseif($user->role == 1)
					<span class="badge badge-success">Author</span>
				@else
					<span class="badge badge-info">User</span>  
				@endif
			</td>
			<td><img src="{{ asset('storage/user-photo/'. $user->photo) }}" class="rounded-circle" width="80" height="80"></td>
			<td>
				<a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
				<button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $user->id }}" data-action="{{ route('user.destroy',$user->id) }}"> Banned </button>
			</td>
		</tr>
		@empty
			<td>Tidak ada data.</td>
		@endforelse
	</tbody>
</table>

{{ $users->links() }}

@endsection

@section('js')
<script type="text/javascript">
  $('body').on("click",".remove-user",function(){
    var current_object = $(this);
    swal({
        title: "Apakah anda yakin?",
        text: "User akan dibekukan, dan dapat diaktifkan kembali di menu Banned List!",
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