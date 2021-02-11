@extends('layouts.backend.home')

@section('title', 'Post')

@section('content')
<ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Detail</a></li>
    <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Edit</a></li>
</ul>
<div class="tab-content">
    <div class="active tab-pane active" id="detail">
        <form class="form-horizontal" method="POST">
            @csrf
            <div class="form-group">
                <label>Web Name</label>
                <input name="web_name" type="text" class="form-control" value="{{ \Illuminate\Support\Str::ucfirst($web->web_name) }}" disabled>
            </div>
            <div class="form-group text-center">
                <label>Web Logo</label>
                <br>
                <img src="{{ asset('storage/web-logo/'. $web->web_logo) }}" width="300" height="300">
            </div>
            <div class="form-group">
                <label>Web Desc</label>
                <textarea class="form-control" rows="4" style="height: 120px;" disabled>{!! $web->web_desc !!}</textarea>
            </div>
            <div class="form-group">
                <label>Web Story</label>
                <textarea class="form-control" rows="4" style="height: 120px;" disabled>{!! $web->web_story !!}</textarea>
            </div>
            <div class="form-group">
                <label>Web Vision</label>
                <textarea class="form-control" rows="4" style="height: 220px;" disabled>{!! $web->web_vision !!}</textarea>
            </div>
            <div class="form-group">
                <label>Web Quotes</label>
                <textarea class="form-control" rows="4" style="height: 120px;" disabled>{!! $web->web_quotes !!}</textarea>
            </div>
            <div class="form-group">
                <label>Quotes Creator</label>
                <textarea class="form-control" rows="4" disabled>{!! $web->web_quotes_creator !!}</textarea>
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input name="instagram" type="text" class="form-control" value="{{ $web->instagram }}" disabled>
            </div>
            <div class="form-group">
                <label>Facebook</label>
                <input name="facebook" type="text" class="form-control" value="{{ $web->facebook }}" disabled>
            </div>
            <div class="form-group">
                <label>Twitter</label>
                <input name="twitter" type="text" class="form-control" value="{{ $web->twitter }}" disabled>
            </div>
            <div class="form-group">
                
            </div>
        </form>
    </div>

    <div class="tab-pane" id="edit">
        <form class="form-horizontal" method="POST" action="{{ route('web-setting.update', $web->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Web Name</label>
                <input name="web_name" type="text" class="form-control" value="{{ \Illuminate\Support\Str::ucfirst($web->web_name) }}">
            </div>
            <div class="form-group">
                <label>Web Desc</label>
                <textarea name="web_desc" class="form-control" rows="4" style="height: 120px;">{!! $web->web_desc !!}</textarea>
            </div>
            <div class="form-group">
                <label>Web Story</label>
                <textarea name="web_story" class="form-control" rows="4" style="height: 120px;">{!! $web->web_story !!}</textarea>
            </div>
            <div class="form-group">
                <label>Web Vision</label>
                <textarea name="web_vision" class="form-control" rows="4" style="height: 220px;">{!! $web->web_vision !!}</textarea>
            </div>
            <div class="form-group">
                <label>Web Quotes</label>
                <textarea name="web_quotes" class="form-control" rows="4" style="height: 120px;">{!! $web->web_quotes !!}</textarea>
            </div>
            <div class="form-group">
                <label>Quotes Creator</label>
                <input name="web_quotes_creator" type="text" class="form-control" value="{{ \Illuminate\Support\Str::ucfirst($web->web_quotes_creator) }}">
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input name="instagram" type="text" class="form-control" value="{{ $web->instagram }}">
            </div>
            <div class="form-group">
                <label>Facebook</label>
                <input name="facebook" type="text" class="form-control" value="{{ $web->facebook }}">
            </div>
            <div class="form-group">
                <label>Twitter</label>
                <input name="twitter" type="text" class="form-control" value="{{ $web->twitter }}">
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    <input name="web_logo" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);"  value="{{ $web->web_logo }}">
                </div>
            </div>
            <div class="form-group" style="text-align: center;">
                <img id="preview_img" src="{{ asset('storage/web-logo/'. $web->web_logo) }}" class="" width="250" height="250"/>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary col-md-12" value="post" >Update</button> 
            </div>
        </form>
    </div>
<!-- /.tab-pane -->
</div>
@endsection

@section('js')
<script>
function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id).attr('src', e.target.result).width(250).height(250);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection