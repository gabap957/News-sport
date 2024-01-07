@extends('fe.layout.layout')
@section('content_web')
    <?php
    use App\Models\post;
    use App\Models\category;
    use Carbon\Carbon;
    $parent = false;
    if ($category->parent_id != 0) {
        $category_parent = category::where('id', $category->parent_id)->first();
        $parent = true;
    }
    ?>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb" data-wow-duration="2s">
                        <li>
                            <img class="ts-icon" onclick="window.location='{{ URL::route('home') }}'" width="17"
                                height="17" src="https://img.icons8.com/material-rounded/24/home.png" alt="home" />
                            <a href="{{ route('home') }}">Home</a>
                            <img width="17" height="17"
                                src="https://img.icons8.com/material-rounded/24/chevron-right.png" alt="chevron-right" />
                        </li>
                        @if ($parent == true)
                            <li>
                                <a
                                    href="{{ route('findbycategory', $category_parent->id) }}">{{ $category_parent->name }}</a>
                                <img width="17" height="17"
                                    src="https://img.icons8.com/material-rounded/24/chevron-right.png"
                                    alt="chevron-right" />
                            </li>
                            <li>
                                <a href="{{ route('findbycategory', $category->id) }}">{{ $category->name }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('findbycategory', $category->id) }}">{{ $category->name }}</a>
                            </li>
                        @endif

                    </ol>
                </div>
            </div>
        </div>
        <section id="main-content" class="blog main-container whats-news-area" role="main">
            <div class="container">
                <div class="row">
                    @if ($parent == true)
                        <div class="col-lg-8 pr-3 sidebar-right">
                            <?php
                            $posts = post::where('category_id', $category->id)
                                ->orderBy('id', 'desc')
                                ->take(6)
                                ->get();
                            ?>
                            <div class="main-content-inner category-layout2">
                                <div class="row container">
                                    <div class="category-main-desc">
                                        <div class="section-tittle mb-30">
                                            <a href="{{ route('findbycategory', $category->id) }}">
                                                <h3 class="ml-3">{{ $category->name }}</h3>
                                            </a>
                                        </div>
                                    </div>
                                    @foreach ($posts as $post)
                                        <div class="post-block-style row mb-30 ">
                                            <div class="col-5 px-4">
                                                <div class="post-media post-image">
                                                    <a href="{{ route('getpostbyid', $post->id) }}">
                                                        <img class="img-fluid" src="{{ asset($post->image->path_url) }}"
                                                            alt=" Best garden wing supplies for the horticu ltural hopeless">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-7 pr-3">
                                                <div class="post-content">
                                                    <div class="entry-blog-header">
                                                        <h2 class="post-title md">
                                                            <a href="{{ route('getpostbyid', $post->id) }}">
                                                                {{ $post->name }}
                                                            </a>
                                                        </h2>
                                                    </div>
                                                    <div class="post-meta">
                                                        <div class="post-meta">
                                                            <span class="post-author">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="15" height="15" x="0" y="0"
                                                                        viewBox="0 0 512 512"
                                                                        style="enable-background:new 0 0 15 15"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <path
                                                                                d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"
                                                                                fill="#707b8e" opacity="1"
                                                                                data-original="#000000"></path>
                                                                        </g>
                                                                    </svg>
                                                                <a style="color: #707b8e;font-size: 15px">{{ $post->user->name }}</a></span>
                                                            <span class="post-meta-date ml-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="15" height="15" x="0" y="0"
                                                                        viewBox="0 0 551.13 551.13"
                                                                        style="enable-background:new 0 0 20 20"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <path
                                                                                d="m275.531 172.228-.05 120.493c0 4.575 1.816 8.948 5.046 12.177l86.198 86.181 24.354-24.354-81.153-81.136.05-113.361z"
                                                                                fill="#707b8e" opacity="1"
                                                                                data-original="#000000" class="">
                                                                            </path>
                                                                            <path
                                                                                d="M310.011 34.445c-121.23 0-221.563 90.033-238.367 206.674H0l86.114 86.114 86.114-86.114h-65.78C122.925 143.53 207.803 68.891 310.011 68.891c113.966 0 206.674 92.707 206.674 206.674s-92.707 206.674-206.674 206.674c-64.064 0-123.469-28.996-162.978-79.555l-27.146 21.192c46.084 58.968 115.379 92.808 190.124 92.808 132.955 0 241.119-108.181 241.119-241.119S442.966 34.446 310.011 34.445z"
                                                                                fill="#707b8e" opacity="1"
                                                                                data-original="#000000" class="">
                                                                            </path>
                                                                        </g>
                                                                    </svg>
                                                                <a title=""
                                                                    style="color: #707b8e;font-size: 15px"><?php
                                                                    $date = new DateTime($post->created_at);
                                                                    echo $date->format('d-m-Y');
                                                                    ?></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="entry-blog-summery">
                                                        <?php echo substr($post->title, 0, 100); ?>
                                                        <a class="readmore-btn" href="">
                                                            Read
                                                            More
                                                            <i class="ts-icon ts-icon-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div><!-- .col-md-8 -->
                    @else
                        <div class="col-lg-8 pr-3 sidebar-right">
                            <div class="main-content-inner category-layout2">
                                <?php
                                $categorychilld = category::where('parent_id', $category->id)
                                    ->orderBy('id', 'desc')
                                    ->take(3)
                                    ->get();
                                ?>
                                @foreach ($categorychilld as $category)
                                    <div class="category-main-desc">
                                        <div class="section-tittle mb-30">
                                            <h3 class="ml-3">{{ $category->name }}</h3>
                                        </div>
                                    </div>
                                    <div class="row container">
                                        <?php
                                        $posts = post::where('category_id', $category->id)
                                            ->take(6)
                                            ->get();
                                        ?>
                                        @foreach ($posts as $post)
                                            <div class="post-block-style row container mb-30">
                                                <div class="col-5 px-4">
                                                    <div class="post-media post-image text-center"
                                                        style="border: 1px solid;">
                                                        <a href="{{ route('getpostbyid', $post->id) }}">
                                                            <img class="img-fluid imgfindpost"
                                                                src="{{ asset($post->image->path_url) }}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-7 pr-3">
                                                    <div class="post-content">
                                                        <div class="entry-blog-header">
                                                            <h2 class="post-title md">
                                                                <a
                                                                    href="{{ route('getpostbyid', $post->id) }}">{{ $post->name }}</a>
                                                            </h2>
                                                        </div>
                                                        <div class="post-meta">
                                                            <div class="post-meta">
                                                                <span class="post-author">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="15" height="15" x="0" y="0"
                                                                        viewBox="0 0 512 512"
                                                                        style="enable-background:new 0 0 15 15"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <path
                                                                                d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"
                                                                                fill="#707b8e" opacity="1"
                                                                                data-original="#000000"></path>
                                                                        </g>
                                                                    </svg>
                                                                    <a
                                                                        style="color: #707b8e;font-size: 15px">{{ $post->user->name }}</a></span>
                                                                <span class="ml-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="15" height="15" x="0" y="0"
                                                                        viewBox="0 0 551.13 551.13"
                                                                        style="enable-background:new 0 0 20 20"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <path
                                                                                d="m275.531 172.228-.05 120.493c0 4.575 1.816 8.948 5.046 12.177l86.198 86.181 24.354-24.354-81.153-81.136.05-113.361z"
                                                                                fill="#707b8e" opacity="1"
                                                                                data-original="#000000" class="">
                                                                            </path>
                                                                            <path
                                                                                d="M310.011 34.445c-121.23 0-221.563 90.033-238.367 206.674H0l86.114 86.114 86.114-86.114h-65.78C122.925 143.53 207.803 68.891 310.011 68.891c113.966 0 206.674 92.707 206.674 206.674s-92.707 206.674-206.674 206.674c-64.064 0-123.469-28.996-162.978-79.555l-27.146 21.192c46.084 58.968 115.379 92.808 190.124 92.808 132.955 0 241.119-108.181 241.119-241.119S442.966 34.446 310.011 34.445z"
                                                                                fill="#707b8e" opacity="1"
                                                                                data-original="#000000" class="">
                                                                            </path>
                                                                        </g>
                                                                    </svg>
                                                                    <a title=""
                                                                        style="color: #707b8e;font-size: 15px"><?php
                                                                        $date = new DateTime($post->created_at);
                                                                        echo $date->format('d-m-Y');
                                                                        ?></a>

                                                                </span>

                                                            </div>
                                                        </div>
                                                        <div class="entry-blog-summery">
                                                            <?php echo substr($post->title, 0, 100); ?>
                                                            <a class="readmore-btn" href="">
                                                                Read
                                                                More
                                                                <i class="ts-icon ts-icon-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- .col-md-8 -->
                    @endif

                    <section class="col-lg-4 px-4">
                        <div class="most-recent-area" style="padding: 0 10px;">
                            <div class="col-auto">
                                <div class="section-tittle mb-30">
                                    <h3 class="ml-1">Xem Nhiều</h3>
                                </div>
                            </div>
                            <?php
                            $postNew1 = post::orderByDesc('view')->first();
                            $postNew2 = post::orderByDesc('view')
                                ->skip(1)
                                ->limit(2)
                                ->get();
                            ?>
                            <div class="most-recent mb-40">
                                <div class="most-recent-img mx-auto">
                                    <img src="{{ asset($postNew1->image->path_url) }}" class="img-fluid" alt="">
                                    <div class="most-recent-cap">
                                        <a href="{{ route('findbycategory', $postNew1->category_id) }}"><span
                                                class="bgbeg">{{ $postNew1->category->name }}</span></a>
                                        <h4><a href="{{ route('getpostbyid', $postNew1->id) }}">{{ $postNew1->name }}</a>
                                        </h4>
                                        <p>{{ Carbon::parse($postNew1->created_at)->diffInMinutes() < 1
                                            ? '1 phút'
                                            : Carbon::parse($postNew1->created_at)->locale('vi')->diffForHumans(null, true) }}
                                            trước</p>
                                    </div>
                                </div>
                            </div>
                            @foreach ($postNew2 as $item)
                                <div class="most-recent-single">
                                    <div class="most-recent-images">
                                        <img src="{{ asset($item->image->path_url) }}"
                                            style="width: 125px; height: 120px; object-fit: cover" alt="">
                                    </div>
                                    <div class="most-recent-capt">
                                        <a href="{{ route('findbycategory', $item->category_id) }}">
                                            <span class="bgbeg"
                                                style="margin-bottom: 10px">{{ $item->category->name }}</span>
                                        </a>
                                        <h4>
                                            <a href="{{ route('getpostbyid', $item->id) }}">{{ $item->name }}</a>
                                        </h4>
                                        <p>{{ Carbon::parse($item->created_at)->diffInMinutes() < 1
                                            ? '1 phút'
                                            : Carbon::parse($item->created_at)->locale('vi')->diffForHumans(null, true) }}
                                            trước</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="digiqole-category-list-1" class="widget digiqole-category-list my-30">
                            <div id="sidebar" class="sidebar" role="complementary">
                                <div class="widgets_category ts-category-list-item">
                                    <ul class="ts-category-list">
                                        <li>
                                            <a style="background-image:url('/img/test.jpg');background-position: bottom;">
                                                <span>Sports</span>
                                                <span class="bar"></span>
                                                <span class="category-count">4</span>
                                            </a>
                                        </li>
                                        <li class="active-cat">
                                            <a style="background-image:url('/img/test2.jpg');background-position: bottom;">
                                                <span>Tech</span>
                                                <span class="bar"></span>
                                                <span class="category-count">5</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a style="background-image:url('/img/test3.jpg');background-position: bottom">
                                                <span>Travel</span>
                                                <span class="bar"></span>
                                                <span class="category-count">6</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="tag_cloud-1" class="widget widget_tag_cloud mb-30">
                            <h3 class="widget-title"> <span class="title-angle-shap">Tags</span></h3>
                            <div class="tagcloud"><a href="https://demo-themewinter.com/digiqole/blog/tag/bitcoin/"
                                    class="tag-cloud-link tag-link-11 tag-link-position-1" style="font-size: 8pt;"
                                    aria-label="bitcoin (1 item)">bitcoin</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/business/"
                                    class="tag-cloud-link tag-link-12 tag-link-position-2" style="font-size: 8pt;"
                                    aria-label="business (1 item)">business</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/canada/"
                                    class="tag-cloud-link tag-link-13 tag-link-position-3" style="font-size: 8pt;"
                                    aria-label="canada (1 item)">canada</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/cricket/"
                                    class="tag-cloud-link tag-link-14 tag-link-position-4" style="font-size: 8pt;"
                                    aria-label="cricket (1 item)">cricket</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/crypto/"
                                    class="tag-cloud-link tag-link-15 tag-link-position-5"
                                    style="font-size: 11.405405405405pt;" aria-label="crypto (2 items)">crypto</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/desert/"
                                    class="tag-cloud-link tag-link-16 tag-link-position-6" style="font-size: 8pt;"
                                    aria-label="desert (1 item)">desert</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/died/"
                                    class="tag-cloud-link tag-link-17 tag-link-position-7"
                                    style="font-size: 13.675675675676pt;" aria-label="died (3 items)">died</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/drink/"
                                    class="tag-cloud-link tag-link-18 tag-link-position-8" style="font-size: 8pt;"
                                    aria-label="drink (1 item)">drink</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/drinks/"
                                    class="tag-cloud-link tag-link-19 tag-link-position-9" style="font-size: 8pt;"
                                    aria-label="drinks (1 item)">drinks</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/fashion/"
                                    class="tag-cloud-link tag-link-20 tag-link-position-10"
                                    style="font-size: 19.351351351351pt;" aria-label="fashion (7 items)">fashion</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/food/"
                                    class="tag-cloud-link tag-link-21 tag-link-position-11"
                                    style="font-size: 18.405405405405pt;" aria-label="food (6 items)">food</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/foods/"
                                    class="tag-cloud-link tag-link-22 tag-link-position-12" style="font-size: 8pt;"
                                    aria-label="foods (1 item)">foods</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/football/"
                                    class="tag-cloud-link tag-link-23 tag-link-position-13"
                                    style="font-size: 11.405405405405pt;" aria-label="football (2 items)">football</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/gadget/"
                                    class="tag-cloud-link tag-link-24 tag-link-position-14" style="font-size: 8pt;"
                                    aria-label="gadget (1 item)">gadget</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/gold/"
                                    class="tag-cloud-link tag-link-25 tag-link-position-15" style="font-size: 8pt;"
                                    aria-label="gold (1 item)">gold</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/health/"
                                    class="tag-cloud-link tag-link-26 tag-link-position-16"
                                    style="font-size: 17.081081081081pt;" aria-label="health (5 items)">health</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/kids/"
                                    class="tag-cloud-link tag-link-27 tag-link-position-17"
                                    style="font-size: 13.675675675676pt;" aria-label="kids (3 items)">kids</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/litcoin/"
                                    class="tag-cloud-link tag-link-28 tag-link-position-18" style="font-size: 8pt;"
                                    aria-label="litcoin (1 item)">litcoin</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/market/"
                                    class="tag-cloud-link tag-link-29 tag-link-position-19" style="font-size: 8pt;"
                                    aria-label="market (1 item)">market</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/money/"
                                    class="tag-cloud-link tag-link-30 tag-link-position-20" style="font-size: 8pt;"
                                    aria-label="money (1 item)">money</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/music/"
                                    class="tag-cloud-link tag-link-31 tag-link-position-21" style="font-size: 8pt;"
                                    aria-label="music (1 item)">music</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/news/"
                                    class="tag-cloud-link tag-link-32 tag-link-position-22" style="font-size: 8pt;"
                                    aria-label="news (1 item)">news</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/recipie/"
                                    class="tag-cloud-link tag-link-33 tag-link-position-23" style="font-size: 8pt;"
                                    aria-label="recipie (1 item)">recipie</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/sketing/"
                                    class="tag-cloud-link tag-link-34 tag-link-position-24" style="font-size: 8pt;"
                                    aria-label="Sketing (1 item)">Sketing</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/sports/"
                                    class="tag-cloud-link tag-link-35 tag-link-position-25" style="font-size: 22pt;"
                                    aria-label="sports (10 items)">sports</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/stock/"
                                    class="tag-cloud-link tag-link-36 tag-link-position-26" style="font-size: 8pt;"
                                    aria-label="stock (1 item)">stock</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/surfing/"
                                    class="tag-cloud-link tag-link-37 tag-link-position-27" style="font-size: 8pt;"
                                    aria-label="surfing (1 item)">surfing</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/technology/"
                                    class="tag-cloud-link tag-link-38 tag-link-position-28"
                                    style="font-size: 19.351351351351pt;" aria-label="technology (7 items)">technology</a>
                                <a href="https://demo-themewinter.com/digiqole/blog/tag/travel/"
                                    class="tag-cloud-link tag-link-39 tag-link-position-29" style="font-size: 22pt;"
                                    aria-label="travel (10 items)">travel</a>
                            </div>
                        </div>
                    </section>
                </div><!-- .row -->
            </div><!-- .container -->
        </section>
    </div>
@endsection
