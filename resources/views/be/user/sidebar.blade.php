
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="logo">
       <a href="{{ URL::route('home')}}"> <img src="{{asset('/img/logo.jpg')}}" style="width: 40%"/></a>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item"  onclick="window.location='{{ URL::route('admin.user.list')}}'">
        <a class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý giao diện
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" onclick="window.location='{{ URL::route('admin.category.list')}}'">
        <a class="nav-link collapsed" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý chuyên mục</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item" onclick="window.location='{{ URL::route('admin.post.list')}}'">
        <a class="nav-link collapsed" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý bài viết </span>
        </a>
    </li>
    <li class="nav-item" onclick="window.location='{{ URL::route('admin.album.list')}}'">
        <a class="nav-link collapsed" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Kho ảnh</span>
        </a>
    </li>
    <li class="nav-item" onclick="window.location='{{ URL::route('admin.category.list')}}'">
        <a class="nav-link collapsed" >
            <i class="fas fa-fw fa-cog"></i>
            <span>quản lý người dùng</span>
        </a>
    </li>
    <li class="nav-item" onclick="window.location='{{ URL::route('admin.category.list')}}'">
        <a class="nav-link collapsed" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý tài khoản </span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
