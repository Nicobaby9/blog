@extends('layouts.backend.home')

@section('title', 'Edit User')

@section('content')
<div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 main">

          <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
           <div class="form-group">
                <label class="font-weight-bold">Name</label>
                <input name="name" type="text" class="form-control" placeholder="Name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email" value="{{ $user->email }}" readonly>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Role</label>
                <select name="role" class="form-control">
                    <option value="0" 
                        @if($user->role == 0) 
                            selected
                        @endif
                    >Author</option>
                    <option value="1" 
                        @if($user->role == 1) 
                            selected
                        @endif
                    >Administrator</option>
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="photo">Image</label>
                <div class="custom-file">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    <input name="photo" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);">
                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                <br>
                </div>
                <label for="photo">Image Preview</label>
                <br>
                <div class="text-center">
                    <a href="#" class="thumbnail">
                      <img id="preview_img" src="{{ asset('storage/user-photo/'.$user->photo) }}" class="rounded-circle" width="235" height="235">
                    </a>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update User</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    
@endsection

@section('js')

<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(215).height(215);;
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection