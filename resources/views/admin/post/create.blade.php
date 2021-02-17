@extends('layouts.backend.home')

@section('title', 'Tambah Post')

@section('content')
<h2 class="section-title">Tambah Post Baru</h2>
<p class="section-lead">
  Halaman untuk membuat post baru.
</p>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Tulis Postingan Anda</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
              <div class="col-sm-12 col-md-7">
                <input name="title" type="text" class="form-control" placeholder="Judul" value="{{ old('title') }}" required>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control selectric" name="category_id" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
              <div class="col-sm-12 col-md-7">
                <textarea name="content"style="color: black;" rows="19" cols="89" placeholder="Isi dari konten" id="content"></textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
              <div class="col-sm-12 col-md-7">
                <div id="image-preview" class="image-preview float-left" style="margin-right: 20px;"> 
                  <label for="image-upload" id="image-label">Choose File</label>
                  <input type="file" name="image" id="image-upload" onchange="loadPreview(this);" />
                </div>
                <div id="image-preview">
                    <a href="#" class="thumbnail">
                      <img id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="image-preview">
                    </a>
                </div>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Tags</label>
              <div class="col-sm-12 col-md-7">
                <select name="tags[]" id="tag" multiple required>
                    <option value="">Pilih Tags</option>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <!-- <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control selectric">
                  <option>Publish</option>
                  <option>Draft</option>
                  <option>Pending</option>
                </select>
              </div>
            </div> -->
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button class="btn btn-primary btn-block btn-sm">Create Post</button>
              </div>
            </div>
        </form>
      </div>
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
                $(id).attr('src', e.target.result).class('image-preview');
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }

    CKEDITOR.replace( 'content' );
</script>
@endsection