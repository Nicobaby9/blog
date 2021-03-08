<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="{{ asset('uploads/user-photo/'.auth()->user()->photo) }}" class="rounded-circle mr-1" height="32">
      <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ route('profile.info', auth()->user()->profile->username) }}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="{{ route('profile.edit', auth()->user()->profile->username) }}" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
             <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
    </li>
  </ul>
</nav>