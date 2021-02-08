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
                <label>Phone</label>
                <input name="phone" type="text" class="form-control" value="{{ $contact->phone }}" disabled>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="text" class="form-control" value="{{ $contact->email }}" disabled>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input name="location" type="text" class="form-control" value="{{ $contact->location }}" disabled>
            </div>
        </form>
    </div>

    <div class="tab-pane" id="edit">
        <form class="form-horizontal" method="POST" action="{{ route('contact-setting.update', $contact->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" type="text" class="form-control" value="{{ $contact->phone }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="text" class="form-control" value="{{ $contact->email }}">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input name="location" type="text" class="form-control" value="{{ $contact->location }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary col-md-12" value="post" >Update</button> 
            </div>
        </form>
    </div>
<!-- /.tab-pane -->
</div>
@endsection