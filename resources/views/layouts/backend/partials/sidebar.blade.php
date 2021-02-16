<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard') }}">{{ $web->web_name }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="active"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        @if(auth()->user()->role == 1)
        <li class="menu-header">Menu</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Post</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('post.index') }}">List Post</a></li>
            <li><a class="nav-link" href="{{ route('post.bin') }}">List Post Recycle Bin</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kategori</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('category.index') }}">List Kategori</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-hashtag"></i> <span>Tags</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('tag.index') }}">List Tags</a></li>
          </ul>
        </li>
        @elseif(auth()->user()->role == 99)
        <li class="menu-header">Menu</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Post</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('post.index') }}">List Post</a></li>
            <li><a class="nav-link" href="{{ route('post.bin') }}">List Post Recycle Bin</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i> <span>Inbox Mail</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('advice-mail.index') }}">List Mail</a></li>
            <li><a class="nav-link" href="{{ route('advice-mail.spam') }}">Spam</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i> <span>Request Main Post</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('request-main-content.index') }}">List Request</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kategori</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('category.index') }}">List Kategori</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-hashtag"></i> <span>Tags</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('tag.index') }}">List Tags</a></li>
          </ul>
        </li>
        <li class="menu-header">Special</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-info-circle"></i> <span>Kontak</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('contact-setting.index') }}">Setting</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>User</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('user.index') }}">List User</a></li>
            <li><a class="nav-link" href="{{ route('user.create') }}">Tambah User</a></li>
            <li><a class="nav-link" href="{{ route('user.banned-list') }}">Banned User</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>Web</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('web-setting.index') }}">Setting</a></li>
          </ul>
        </li>
        <!-- <li class="active"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> -->
        @endif
      </ul>
  </aside>
</div>