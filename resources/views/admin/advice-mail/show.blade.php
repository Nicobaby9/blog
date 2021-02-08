@extends('layouts.backend.home')

@section('title', 'Detail Pesan')

@section('content')
<div class="container">
    <a href="{{ route('mail.index') }}" class="btn btn-sm btn-info" style="width: 160px;">Back</a>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-12 main">
            <form action="" method="get" accept-charset="utf-8">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="{{ $mail->email }}" disabled>
                </div>  
                <div class="form-group">
                    <label>Subject</label>
                    <input class="form-control" type="text" name="email" value="{{ $mail->email }}" disabled>
                </div>
                <div class="form-group">
                    <label>Pesan</label>
                    <textarea class="form-control" rows="5" disabled>{{ $mail->message }}</textarea>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection