@extends('fe.layout.layout')
@section('content_web')
    <?php
    use App\Models\post;
    ?>

    <head>
        <link href="{{ asset('/homelte/css/home.css') }}" rel="stylesheet">
    </head>
    <section class="section first-section">
        <div class="container-fluid">
            <div class="masonry-blog clearfix">
                <div class="first-slot">
                    <div class="masonry-box post-media">
                        <img src="<?php
                        $path = DB::table('images')
                            ->where('id', $tindacbiet[0]->image_id)
                            ->first();
                        $categoryName = DB::table('categories')
                            ->where('id', $tindacbiet[0]->category_id)
                            ->first();
                        echo asset($path->path_url);
                        ?>
                " alt="">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange"><a href="tech-category-01.html"
                                            title="">{{ $categoryName->name }}</a></span>
                                    <h4><a href="tech-single.html" title="">{{ $tindacbiet[0]->name }}</a></h4>
                                    <small><a href="tech-single.html"
                                            title="">{{ $tindacbiet[0]->created_at }}</a></small>
                                    <small><a href="tech-author.html" title="">tac gia</a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div><!-- end first-side -->
                <div class="row display">
                    @foreach ($tinNoibat as $key => $value)
                        <div class="col-6">
                            <div class="second-slot">
                                <div class="masonry-box post-media">
                                    <img src="<?php
                                    $path = DB::table('images')
                                        ->where('id', $value->image_id)
                                        ->first();
                                    $categoryName = DB::table('categories')
                                        ->where('id', $value->category_id)
                                        ->first();
                                    echo asset($path->path_url);
                                    ?>" alt="" class="img-fluid">
                                    <div class="shadoweffect">
                                        <div class="shadow-desc">
                                            <div class="blog-meta">
                                                <span class="bg-orange">
                                                    <a href="tech-category-01.html"
                                                        title="">{{ $categoryName->name }}</a></span>
                                                <h4 class="textNamepost"><a href="tech-single.html"
                                                        title="">{{ $value->name }}</a></h4>
                                                <small><a href="tech-single.html"
                                                        title="">{{ $value->created_at }}</a></small>
                                                <small><a href="tech-author.html" title="">tac gia</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end shadow-desc -->
                                    </div><!-- end shadow -->
                                </div><!-- end post-media -->
                            </div><!-- end second-side -->
                        </div>
                        @if ($key == 1)
                            <div class="w-100"></div>
                        @endif
                    @endforeach
                </div>
            </div><!-- end masonry -->
        </div>
    </section>
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pr-3">
                    <div class="whats-news-wrapper">
                        <div class="row justify-content-between align-items-end">
                            <div class="col-xl-4 col-md-5 col-sm-5 col-auto px-4">
                                <div class="section-tittle mb-30">
                                    <h3 class="ml-1">Tin Nóng</h3>
                                </div>
                            </div>
                            <div
                                class="col-xl-8 col-md-6 col-sm-4 d-none d-md-block d-lg-block d-xl-block d-xxl-block px-4">
                                <div class="properties__button mb-4" style="display: flex; justify-content: end;">
                                    <div class="tabs">
                                        @foreach ($categoryMain as $key => $value)
                                            <a <?php if ($key == 0) {
                                                echo 'class="tab active"';
                                            } else {
                                                echo 'class="tab"';
                                            } ?>
                                                onclick="showTab(nav{{ $key }})">{{ $value->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach ($categoryMain as $key => $value)
                                        <?php
                                        $postDB = post::where('category_id', $value->id)
                                            ->orderBy('created_at', 'desc')
                                            ->first();
                                        $postcate = post::where('category_id', $value->id)
                                            ->orderBy('created_at', 'desc')
                                            ->skip(1)
                                            ->take(4)
                                            ->get();
                                        ?>
                                        <div <?php
                                        if ($key == 0) {
                                            echo 'class="tab-pane fade show active"';
                                        } else {
                                            echo 'class="tab-pane fade "';
                                        }
                                        ?> id="nav{{ $key }}">
                                            <div class="row">
                                                <div class="col-xl-6 px-4">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="{{ $postDB->image->path_url }}" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="latest_news.html">{{ $postDB->name }}</a></h4>
                                                            <span>{{ $postDB->created_at }}</span>
                                                            <p><?php echo $postDB->title; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12 px-4">
                                                    <div class="row">
                                                        @foreach ($postcate as $item)
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <img src="{{ $item->image->path_url }}"
                                                                            style="width: 124px; height: 102px"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <span
                                                                            class="colorb">{{ $item->category->name }}</span>
                                                                        <h4><a
                                                                                href="latest_news.html">{{ $item->name }}</a>
                                                                        </h4>
                                                                        <p>{{ $item->created_at }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="banner-one mt-20 mb-30">
                        <img src="assets/img/gallery/body_card1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="most-recent-area">

                        <div class="small-tittle mb-30">
                            <h3 style="font-size: 28px">Tin Mới Nhất</h3>
                        </div>
                        <?php
                        $postNew1 = post::orderBy('created_at', 'desc')->first();
                        $postNew2 = post::orderBy('created_at', 'desc')
                            ->skip(1)
                            ->take(2)
                            ->get();
                        ?>
                        <div class="most-recent mb-40">
                            <div class="most-recent-img mx-auto">
                                <img src="{{ $postNew1->image->path_url }}" class="img-fluid" alt="">
                                <div class="most-recent-cap">
                                    <span class="bgbeg">{{ $postNew1->category->name }}</span>
                                    <h4><a href="latest_news.html">{{ $postNew1->name }}</a></h4>
                                    <p>Jhon | 2 hours ago</p>
                                </div>
                            </div>
                        </div>
                        @foreach ($postNew2 as $item)
                            <div class="most-recent-single">
                                <div class="most-recent-images">
                                    <img src="{{ $item->image->path_url }}" style="width: 85px; height: 80px"
                                        alt="">
                                </div>
                                <div class="most-recent-capt">
                                    <h4><a href="latest_news.html">{{ $item->name }}</a></h4>
                                    <p>Jhon | 2 hours ago</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="weekly3-news-area pt-80 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Tin Mới</h3>
                    </div>
                </div>
            </div>
            <div class="row">
               </div class="col-lg-12">
                  <div class="slider autoplay slick-initialized slick-slider slick-dotted" role="toolbar">
                      <div aria-live="polite" class="slick-list draggable">
                        <div class="slick-track"
                        style="opacity: 1; width: 2560px; transition: transform 500ms ease 0s; transform: translate3d(-1309px, 0px, 0px);"
                        role="listbox">
                        @foreach ($postNews as $key => $item)
                            <div <?php
                            if ($key == 3 || $key == 4 || $key == 5 || $key == 6) {
                                echo 'class="slick-slide slick-active" aria-hidden="false"';
                            } else {
                                echo 'class="slick-slide" aria-hidden="true"';
                            }
                            ?> class="slick-slide slick-active"
                                data-slick-index="{{$key-3}}" aria-hidden="false" style="width: 220px;"
                                tabindex="-1" role="option" aria-describedby="slick-slide{{$key+1}}">
                                <div class="weekly3-img2">
                                    <img src="{{ $item->image->path_url }}" style="width: 230px; max-height: 150px"  alt="">
                                </div>
                                <div class="weekly3-caption2">
                                    <span class="bgbeg">{{$item->category->name}}</span>
                                    <h4><a href="latest_news.html" tabindex="0">{{$item->name}}</a></h4>
                                    <p>19 Jan 2020</p>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
