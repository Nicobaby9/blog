@extends('layouts.backend.home')

@section('title', 'Profile')

@section('content')
<div class="row mt-sm-4">
  <div class="col-12 col-md-12 col-lg-5">
    <div class="card profile-widget">
      <div class="profile-widget-header">
        <img alt="image" src="{{ asset('storage/user-photo/'. $user->photo) }}" class="rounded-circle profile-widget-picture" height="110">
        <div class="profile-widget-items">
          <div class="profile-widget-item">
            <div class="profile-widget-item-label">Posts</div>
            <div class="profile-widget-item-value">{{ $user->posts->count() }}</div>
          </div>
          <!-- <div class="profile-widget-item">
            <div class="profile-widget-item-label">Followers</div>
            <div class="profile-widget-item-value">6,8K</div>
          </div>
          <div class="profile-widget-item">
            <div class="profile-widget-item-label">Following</div>
            <div class="profile-widget-item-value">2,1K</div>
          </div> -->
        </div>
      </div>
      <div class="profile-widget-description">
        <div class="profile-widget-name">{{ \Illuminate\Support\Str::title($user->name) }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ \Illuminate\Support\Str::title($user->profile->headline) }}</div></div>
        {{ $user->profile['bio'] }}
      </div>
    </div>

    <div class="card profile-widget">
      <div class="profile-widget-header">
      	<br>
    	<center><h5>Foto Profil</h5></center>
      </div>
      <form action="{{ route('profile.update', $profile->username) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      	@csrf
      	@method('PATCH')
			<div class="profile-widget-description">
				<center><img id="preview_img" src="{{ asset('storage/user-photo/'.$user->photo) }}" class="rounded-circle profile-picture" height="150" width="150"></center>
			</div>
	      	<center><label for="photo" class="profile-widget">Foto</label></center>
	        <div class="custom-file">
	            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
	            <input name="photo" type="file" class="custom-file-input" id="exampleInputFile" onchange="loadPreview(this);">
	            <p class="text-danger">{{ $errors->first('photo') }}</p>
	        	<br>
	        </div>
	        <button class="btn btn-primary btn-block">Ganti Foto</button>
      </form>
    </div>
  </div>
  <div class="col-12 col-md-12 col-lg-7">
    <div class="card">
      <form method="post" class="needs-validation" action="{{ route('profile.update', $profile->username) }}" enctype="multipart/form-data">
      	@csrf
      	@method('PATCH')
        <div class="card-header">
          <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                <div class="invalid-feedback">
                  Please fill in the name
                </div>
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{ $user->profile['username'] }}" disabled>
                <div class="invalid-feedback">
                  Please fill in the username
                </div>
              </div>
	            <div class="form-group col-md-8 col-12">
	                <label>Headline</label>
	                <input type="tel" name="headline" class="form-control" value="{{ $user->profile->headline }}">
	            </div>
            </div>
            <div class="row">
              <div class="form-group col-md-7 col-12">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                <div class="invalid-feedback">
                  Please fill in the email
                </div>
              </div>
              <div class="form-group col-md-5 col-12">
                <label>Phone</label>
                <input type="tel" name="phone" class="form-control" value="{{ $user->profile->phone }}">
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Password</label>
                <input id="password" type="password" name="password" class="form-control pwstrength @error('password') is-invalid @enderror" value="{{ \Illuminate\Support\Str::limit($user->password, 6) }}" data-indicator="pwindicator" name="password" autocomplete="new-password">
                <div id="pwindicator" class="pwindicator">
				    <div class="bar"></div>
				    <div class="label"></div>
				</div> 
      </div>
              <div class="form-group col-md-6 col-12">
                <label>Password Confirmation</label>
                <input id="password2" type="password" class="form-control" name="password_confirmation" autocomplete="new-password"> 
              </div>
              <div class="form-group col-md-8 col-12">
                <label>Facebook</label>
                <input type="tel" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
              </div>
              <div class="form-group col-md-8 col-12">
                <label>Instagram</label>
                <input type="tel" name="instagram" class="form-control" value="{{ $user->profile->instagram }}">
              </div>
              <div class="form-group col-md-8 col-12">
                <label>Twitter</label>
                <input type="tel" name="twitter" class="form-control" value="{{ $user->profile->twitter }}">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label>Bio</label>
                <textarea name="bio" class="form-control summernote-simple" rows="5" style="height: 150px;">{{ $user->profile['bio'] }}</textarea>
              </div>
            </div>
            <!-- <div class="row">
              <div class="form-group mb-0 col-12">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                  <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                  <div class="text-muted form-text">
                    You will get new information about products, offers and promotions
                  </div>
                </div>
              </div>
            </div> -->
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')

<!-- JS Libraies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pwstrength-bootstrap/3.0.9/pwstrength-bootstrap.js"></script>
<script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('stisla/js/page/auth-register.js') }}"></script>
<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(150).height(150);;
            };
     
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection