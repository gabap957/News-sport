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
                <a href="#"><img src="{{asset('/img/logo2.jpg')}}" alt=""></a>
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
                                        <a class="tablinks" >{{$itemchilld->name}}</a>
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
                </form>
                <div class="header-right-btn d-none d-lg-block mr-3 ml-2 col-1">
                    <button href="" class="btn header-btn btn-success">Đăng nhập</button>
                </div>
            </div>
        </div>
    </nav>
</div><!-- end container-fluid -->
<!-- Header End -->
