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
        <div class="col-8 d-flex" style="align-items: center;">
            <div class="logo">
                <a href="#"><img src="{{asset('/img/logo.jpg')}}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
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
                        <a <?php if($categoryChild->count() > 0){
                            echo 'class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"';
                            }
                            else{
                            echo 'class="nav-link"';
                            }?>
                            href="#">{{$item->name}}</a>
                        @if($categoryChild->count() > 0)
                        <ul class="dropdown-menu" aria-labelledby="dropdown01" style="top: 114%;">
                            @foreach($categoryChild as $item)
                            <li class="nav-item hover">
                                <div class=" clearfix">
                                    <div class="tab">
                                        <a class="tablinks" href="#">{{$item->name}}</a>
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
        <div class="col-3 d-none d-lg-block">
            <div class="d-flex">
                <form class="card card-sm col">
                    <div class="card-body row no-gutters align-items-center">
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-borderless" type="search" placeholder="Tìm kiếm">
                        </div>
                        <!--end of col-->
                        <div class="col-xl-2 col-xxl-1 col-lg-2">
                            <button style="background-color: #fff; border: none" type="button">
                                <svg class="my-auto" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25"
                                    height="25" viewBox="0 0 50 50">
                                    <path
                                        d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <!--end of col-->
                    </div>
                </form>
                <div class="header-right-btn d-none d-lg-block mr-3 ml-2 col-1">
                    <a href="" class="btn header-btn btn-success">Đăng nhập</a>
                </div>
            </div>
        </div>
    </nav>
</div><!-- end container-fluid -->
<!-- Header End -->