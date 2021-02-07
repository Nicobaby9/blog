@if(count($errors)>0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      <center>{{ $error }}</center>
    </div>
  @endforeach
@endif

@if(Session::has('success'))
  <div class="alert alert-success">
    <center>{{ Session('success') }}</center>
  </div>
@endif

@if(Session::has('error'))
  <div class="alert alert-danger">
    <center>{{ Session('error') }}</center>
  </div>
@endif