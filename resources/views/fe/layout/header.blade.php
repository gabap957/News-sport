<!-- Header Start -->
<div class="header-area">
    <div class="main-header ">
        <div class="header-top top-bg d-none d-lg-block">
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <img src="{{asset('/img/logo.jpg')}}" style="width: 100%" alt="">
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <div class="main-menu d-none d-lg-block mr-3">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="home" style=" padding: 8px; height: 40px;width: 40px;" href="/" 
                                            title="Trang chủ Bongdaplus" aria-label="Trang chủ Bongdaplus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32"
                                                        height="32" viewBox="0 0 64 64">
                                                        <path
                                                            d="M 32 3 L 1 28 L 1.4921875 28.654297 C 2.8591875 30.477297 5.4694688 30.791703 7.2304688 29.345703 L 32 9 L 56.769531 29.345703 C 58.530531 30.791703 61.140812 30.477297 62.507812 28.654297 L 63 28 L 54 20.742188 L 54 8 L 45 8 L 45 13.484375 L 32 3 z M 32 13 L 8 32 L 8 56 L 56 56 L 56 35 L 32 13 z M 26 34 L 38 34 L 38 52 L 26 52 L 26 34 z">
                                                        </path>
                                                    </svg>
                                                </a></li>
                                            @foreach($category as $item)
                                            <li><a href="#">{{$item->name}}</a></li>
                                            @endforeach
                                            <li><img width="25" height="25"
                                                    src="https://img.icons8.com/ios/50/expand-arrow--v2.png"
                                                    alt="expand-arrow--v2" /></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="">
                                    <div class="header-right-btn f-right d-none d-lg-block">
                                        <i class="fas fa-search special-tag"></i>
                                        <div class="search-box">
                                            <form action="#">
                                                <input class="form-control bg-light border-0 small"
                                                    style="margin-top:30px" type="text" placeholder="Search">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-right-btn d-none d-lg-block ml-20">
                                    <a href="" class="btn header-btn">Đăng nhập</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->