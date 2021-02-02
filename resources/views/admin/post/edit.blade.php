@extends('layouts.backend.home')

@section('title', 'Edit Post')

@section('content')
<div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 main">

          <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           <div class="form-group">
                <label class="font-weight-bold">Title</label>
                <input name="title" type="text" class="form-control" placeholder="Title" value="{{ $post->title }}" required="">
            </div>
            <div class="row">
              <div class="col-xs-9 col-sm-9 col-md-8">
                  <label class="font-weight-bold">Konten</label>
                <div class="form-group">
                  <textarea name="content" style="color: black;" rows="19" cols="89" placeholder="Isi dari konten"> {{ $post->content }}</textarea>
                </div>
              </div>
              <div class="col-xs-5 col-md-4">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
                <div class="form-group" >
                    <label for="category">Categories</label>
                    <select name="category_id" required>
                        <option value="{{ $post->category_id }}"> {{ $post->category->name }} </option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" >
                    <label for="tag">Tags</label>
                    <select name="tags[]" id="tag" multiple required>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" 
                                @foreach($post->tags as $value)
                                    @if($tag->id == $value->id)
                                        selected
                                    @endif
                                @endforeach
                            >
                            {{ $tag->name }}</option>
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
                      <img id="preview_img" src="{{ asset('storage/post-image/'. $post->image) }}" class="img-fluid">
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

<script>
    $(function() {
        $('#tag').selectize();
    });

    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(300).height(149);
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection