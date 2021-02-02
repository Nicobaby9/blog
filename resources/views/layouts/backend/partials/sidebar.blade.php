<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="active"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Menu</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Post</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('post.index') }}">List Post</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kategori</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('category.index') }}">List Kategori</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-hashtag"></i> <span>Tags</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('tag.index') }}">List Tags</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
          </ul>
        </li>
        <li class="active"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
      </ul>
  </aside>
</div>