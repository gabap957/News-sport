<!-- Header Start -->
<?php
use App\Models\category;
?>
<div class="container-fluid">
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-7 col-xl-8 d-flex" style="align-items: center;">
            <div class="logo">
                <a href="#"><img src="{{asset('/img/logo2.png')}}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home')}}">Home</a>
                    </li>
                    @foreach($categoryParent as $item)
                    <?php
                    if($item->parent_id == 0){
                    $categoryChild = category::where('parent_id',$item->id)->get();
                    }
                    else{
                    $categoryChild = 0;
                    }
                    ?>
                    <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                        <div onclick="window.location='{{ URL::route('findbycategory', $item->id)}}'">
                            <a <?php if($categoryChild->count() > 0){
                                echo 'class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"';
                                }
                                else{
                                echo 'class="nav-link"';
                                }?>>{{$item->name}}</a>
                        </div>
                        @if($categoryChild->count() > 0)
                        <ul class="dropdown-menu" aria-labelledby="dropdown01" style="top: 114%;">
                            @foreach($categoryChild as $itemchilld)
                            <li class="nav-item hover" onclick="window.location='{{ URL::route('findbycategory', $itemchilld->id)}}'">
                                <div class=" clearfix">
                                    <div class="tab">
                                        <a class="tablinks">{{$itemchilld->name}}</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-4 col-xl-3 d-none d-lg-block">
            <div class="d-flex">
                <form class="card card-sm col m-auto">
                    <div class="card-body row no-gutters align-items-center">
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-borderless" type="search" id="search_input" placeholder="Tìm kiếm">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button style="background-color: #fff; border: none" type="button">
                            <i style="font-size: 20px;" class="fa fa-search"></i>
                            </button>
                        </div>
                        <!--end of col-->
                    </div>
                    <div class="search_result" style="position: absolute; top: 100%; overflow: auto; height: 470px;">
                    </div>
                </form>

                <div class="header-right-btn d-none d-lg-block mr-3 ml-3 col-1">
                    @if (Auth::check())
                    <li class="nav-item dropdown no-arrow mt-1">
                        <a class="nav-link " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-profile rounded-circle" src="{{asset('/img/undraw_profile.svg')}}">
                            <span class="d-none d-lg-inline text-gray-600 small" style="color: #fff; font-size: 17px">{{ Auth::user()->name }}</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    @else
                    <button type="button" onclick="window.location='{{ route('login')}}'" class="btn header-btn btn-success">Đăng nhập</button>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div><!-- end container-fluid -->
<!-- Header End -->
