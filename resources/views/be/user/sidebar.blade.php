
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="logo">
       <a href="{{ URL::route('home')}}"> <img src="{{asset('/img/logo2.png')}}" style="width: 40%"/></a>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item tapbar"  onclick="window.location='{{ URL::route('admin.user.list')}}'">
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
    <li class="nav-item tapbar">
        <a class="nav-link collapsed" href="{{route('admin.category.list')}}">
            <i class="fa fa-list-alt"></i>
            <span>Quản lý chuyên mục</span>
        </a>
    </li>
    <li class="nav-item tapbar" >
        <a class="nav-link collapsed" href="{{route('admin.type.list')}}">
            <i class="fa fa-bell"></i>
            <span>Phân loại tin tức </span>
        </a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item tapbar">
        <a class="nav-link collapsed" href="{{route('admin.post.list')}}">
            <i class="fa fa-book"></i>
            <span>Quản lý bài viết </span>
        </a>
    </li>
    <li class="nav-item tapbar">
        <a class="nav-link collapsed" href="{{route('admin.album.list')}}" >
            <i class="fa fa-folder-open"></i>
            <span>Kho ảnh</span>
        </a>
    </li>
    <li class="nav-item tapbar" >
        <a class="nav-link collapsed" href="{{route('admin.user.list')}}" >
            <i class="fa fa-user-circle"></i>
            <span>quản lý người dùng</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
