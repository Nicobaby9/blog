@extends('layouts.backend.home')

@section('title', 'Tambah User')

@section('content')
<div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 main">

          <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           <div class="form-group">
                <label class="font-weight-bold">Name</label>
                <input name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Role</label>
                <select name="role" class="form-control" required>
                    <option value="" holder>Pilih Role User</option>
                    <option value="0">Author</option>
                    <option value="1">Administrator</option>
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <label for="photo">Image</label>
                <div class="custom-file">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    <input name="photo" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);" required>
                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                <br>
                </div>
                <label for="photo">Image Preview</label>
                <br>
                <div class="text-center">
                    <a href="#" class="thumbnail text-center">
                      <img id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Buat User</button>
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