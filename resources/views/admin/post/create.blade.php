@extends('layouts.backend.home')

@section('title', 'Tambah Post')

@section('content')
<div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 main">

          <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           <div class="form-group">
                <label class="font-weight-bold">Title</label>
                <input name="title" type="text" class="form-control" placeholder="Title" value="{{ old('title') }}" required="">
            </div>
            <div class="row">
              <div class="col-xs-9 col-sm-9 col-md-8">
                  <label class="font-weight-bold">Konten</label>
                <div class="form-group">
                  <textarea name="content"style="color: black;" rows="19" cols="89" placeholder="Isi dari konten" id="content"></textarea>
                </div>
              </div>
              <div class="col-xs-5 col-md-4">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Buat</button>
                </div>
                <div class="form-group" >
                    <label for="category">Categories</label>
                    <select name="category_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" >
                    <label for="tag">Tags</label>
                    <select name="tags[]" id="tag" multiple required>
                        <option value="">Pilih Tags</option>
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);" required>
                        <p class="text-danger">{{ $errors->first('photo') }}</p>
                    <br>
                    </div>
                    <label for="image">Image Preview</label>
                    <br>
                    <a href="#" class="thumbnail">
                      <img id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="img-fluid">
                    </a>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
    
@endsection

@section('js')
<!-- CKeditor 4 -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    $(function() {
        $('#tag').selectize();
    });

    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(300).height(149);;
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }

    CKEDITOR.replace( 'content' );
</script>
@endsection