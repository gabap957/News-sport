@extends('fe.layout.layout')
@section('content_web')
    <?php
    use App\Models\post;
    use App\Models\commentchildren;
    use App\Models\category;
    use Carbon\Carbon;
    $category_parent = category::where('id', $category['0']['parent_id'])->first();
    ?>

    <head>
        <link href="{{ asset('/homelte/css/comment.css') }}" rel="stylesheet">
    </head>
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
                        <li>
                            <a href="{{ route('findbycategory', $category_parent->id) }}">{{ $category_parent->name }}</a>
                            <img width="17" height="17"
                                src="https://img.icons8.com/material-rounded/24/chevron-right.png" alt="chevron-right" />
                        </li>
                        <li>
                            <a href="{{ route('findbycategory', $category['0']['id']) }}">{{ $category['0']['name'] }}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <section id="main-content" class="blog main-container" role="main">
            <div class="container">
                <div class="row container whats-news-area">
                    <div class="col-lg-8 col-md-12 pr-4">
                        <article
                            data-anchor="https://demo-themewinter.com/digiqole/blog/harbour-amid-a-slowen-down-in-the-city/"
                            id="post-96"
                            class="post-content post-single anchor post-96 post type-post status-publish format-standard has-post-thumbnail hentry category-tech tag-technology">
                            <!-- Article header -->
                            <header class="entry-header clearfix">
                                <h1 class="post-title lg">
                                    {{ $post['0']->name }}
                                </h1>
                                <ul class="post-meta">
                                    <li class="post-category">
                                        <a class="post-cat"
                                            href="https://demo-themewinter.com/digiqole/blog/category/lifestyle/tech/"
                                            style=" background-color:#007bff;color:#ffffff ">
                                            <span class="before" style="background-color:#007bff;color:#ffffff ">
                                            </span>{{ $post['0']->category->name }}<span class="after"
                                                style="background-color:#007bff;color:#ffffff"></span>
                                        </a>
                                    </li>
                                    <li class="post-author">
                                        <img alt="" src="{{ asset($post['0']->user->avatar) }}" class="img-profile"
                                            decoding="async">
                                        <a class="ml-2"
                                            style="font-size: 17px;color: #707b8e">{{ $post['0']->user->name }}</a>
                                    </li>
                                    <li class="post-meta-date">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            style="width: 15px; height: 15px;" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="512" height="512" x="0" y="0" viewBox="0 0 443.294 443.294"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M221.647 0C99.433 0 0 99.433 0 221.647s99.433 221.647 221.647 221.647 221.647-99.433 221.647-221.647S343.861 0 221.647 0zm0 415.588c-106.941 0-193.941-87-193.941-193.941s87-193.941 193.941-193.941 193.941 87 193.941 193.941-87 193.941-193.941 193.941z"
                                                    fill="#707b8e" opacity="1" data-original="#000000" class="">
                                                </path>
                                                <path
                                                    d="M235.5 83.118h-27.706v144.265l87.176 87.176 19.589-19.589-79.059-79.059z"
                                                    fill="#707b8e" opacity="1" data-original="#000000" class="">
                                                </path>
                                            </g>
                                        </svg>
                                        <a title="" style="color: #707b8e;font-size: 17px;"><?php
                                        $date = new DateTime($post['0']->created_at);
                                        echo $date->format('d-m-Y');
                                        ?></a>
                                    </li>
                                    <li class="post-comment">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            style="width:15px;height:15px;" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M303.392 61.393C271.597 41.783 233.92 31 195 31 89.054 31 0 109.933 0 211c0 35.435 11.008 69.404 31.918 98.741l-29.21 91.706C-.378 411.134 6.878 421 17.003 421a14.97 14.97 0 0 0 6.795-1.629l88.832-45.167a203.154 203.154 0 0 0 10.918 4.328C102.981 346.43 92 309.58 92 271c0-114.897 96.678-203.228 211.392-209.607z"
                                                    fill="#707b8e" opacity="1" data-original="#000000" class="">
                                                </path>
                                                <path
                                                    d="M480.082 369.741C500.992 340.404 512 306.435 512 271c0-101.104-89.092-180-195-180-105.946 0-195 78.933-195 180 0 101.104 89.092 180 195 180 28.417 0 56.732-5.791 82.365-16.798l88.837 45.169a15.001 15.001 0 0 0 21.091-17.923zM256 286c-8.284 0-15-6.716-15-15s6.716-15 15-15 15 6.716 15 15-6.716 15-15 15zm60 0c-8.284 0-15-6.716-15-15s6.716-15 15-15 15 6.716 15 15-6.716 15-15 15zm60 0c-8.284 0-15-6.716-15-15s6.716-15 15-15 15 6.716 15 15-6.716 15-15 15z"
                                                    fill="#707b8e" opacity="1" data-original="#000000" class="">
                                                </path>
                                            </g>
                                        </svg>
                                        <a href="#" class="comments-link"
                                            style="color: #707b8e;font-size: 18px">{{ $sumComment }} </a>
                                    </li>
                                    <li class="meta-post-view">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="width:17px;height:17px; vertical-align: middle;"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0"
                                            y="0" viewBox="0 0 461.312 461.312" style="enable-background:new 0 0 512 512"
                                            xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M230.656 156.416c-40.96 0-74.24 33.28-74.24 74.24s33.28 74.24 74.24 74.24 74.24-33.28 74.24-74.24-33.28-74.24-74.24-74.24zm-5.632 52.224c-9.216 0-16.896 7.68-16.896 16.896h-24.576c.512-23.04 18.944-41.472 41.472-41.472v24.576z"
                                                    fill="#707b8e" opacity="1" data-original="#000000"
                                                    class=""></path>
                                                <path
                                                    d="M455.936 215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464 184.064 5.376 215.296c-7.168 8.704-7.168 21.504 0 30.72 25.088 31.232 114.688 133.12 225.28 133.12s200.192-101.888 225.28-133.12c7.168-8.704 7.168-21.504 0-30.72zm-225.28 122.88c-59.392 0-107.52-48.128-107.52-107.52s48.128-107.52 107.52-107.52 107.52 48.128 107.52 107.52-48.128 107.52-107.52 107.52z"
                                                    fill="#707b8e" opacity="1" data-original="#000000"
                                                    class=""></path>
                                            </g>
                                        </svg>
                                       <a style="font-size: 18px; color: #707b8e"> {{$post['0']->view }}</a>
                                    </li>
                                    <li class="read-time">
                                        <span class="post-read-time">
                                            <i class="ts-icon ts-icon-eye-solid"></i>
                                            <span class="read-time" ><p style="color: #707b8e; font-size: 17px">{{ Carbon::parse($post['0']->created_at)->diffInMinutes() < 1? '1 phút': Carbon::parse($post['0']->created_at)->locale('vi')->diffForHumans(null, true) }}
                                                trước</p></span>
                                        </span>
                                    </li>
                                </ul>
                            </header><!-- header end -->

                            <div class="post-media post-image mb-30">
                                <img class="img-fluid" src="{{ asset($post['0']->image->path_url) }}"
                                    alt=" Harbour amid a Slowen down in singer city screening">

                            </div>

                            <div class="post-body clearfix">

                                <!-- Article content -->
                                <div class="entry-content clearfix">
                                    <?php
                                    echo $post['0']->content;
                                    ?>
                                    <div class="post-footer clearfix">
                                        <div class="post-tag-container">
                                            <div class="tag-lists"><span>Tags: </span><a
                                                    href="https://demo-themewinter.com/digiqole/blog/tag/technology/"
                                                    rel="tag">Bóng đá</a></div>
                                        </div>
                                        <div class="social-share pt-30">
                                            <div class="section-tittle d-flex">
                                                <h3>Share:</h3>
                                                <ul style="margin: -11px -37px;">
                                                    <li>
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="39" height="39" viewBox="0 0 64 64">
                                                                <radialGradient id="TGwjmZMm2W~B4yrgup6jda_119026_gr1"
                                                                    cx="32" cy="32.5" r="31.259"
                                                                    gradientTransform="matrix(1 0 0 -1 0 64)"
                                                                    gradientUnits="userSpaceOnUse">
                                                                    <stop offset="0" stop-color="#efdcb1"></stop>
                                                                    <stop offset="0" stop-color="#f2e0bb"></stop>
                                                                    <stop offset=".011" stop-color="#f2e0bc"></stop>
                                                                    <stop offset=".362" stop-color="#f9edd2"></stop>
                                                                    <stop offset=".699" stop-color="#fef4df"></stop>
                                                                    <stop offset="1" stop-color="#fff7e4"></stop>
                                                                </radialGradient>
                                                                <path fill="url(#TGwjmZMm2W~B4yrgup6jda_119026_gr1)"
                                                                    d="M58,54c-1.1,0-2-0.9-2-2s0.9-2,2-2h2.5c1.9,0,3.5-1.6,3.5-3.5S62.4,43,60.5,43H50c-1.4,0-2.5-1.1-2.5-2.5	S48.6,38,50,38h8c1.7,0,3-1.3,3-3s-1.3-3-3-3H42v-6h18c2.3,0,4.2-2,4-4.4c-0.2-2.1-2.1-3.6-4.2-3.6H58c-1.1,0-2-0.9-2-2s0.9-2,2-2	h0.4c1.3,0,2.5-0.9,2.6-2.2c0.2-1.5-1-2.8-2.5-2.8h-14C43.7,9,43,8.3,43,7.5S43.7,6,44.5,6h3.9c1.3,0,2.5-0.9,2.6-2.2	C51.1,2.3,50,1,48.5,1H15.6c-1.3,0-2.5,0.9-2.6,2.2C12.9,4.7,14,6,15.5,6H19c1.1,0,2,0.9,2,2s-0.9,2-2,2H6.2c-2.1,0-4,1.5-4.2,3.6	C1.8,16,3.7,18,6,18h2.5c1.9,0,3.5,1.6,3.5,3.5S10.4,25,8.5,25H5.2c-2.1,0-4,1.5-4.2,3.6C0.8,31,2.7,33,5,33h17v11H6	c-1.7,0-3,1.3-3,3s1.3,3,3,3l0,0c1.1,0,2,0.9,2,2s-0.9,2-2,2H4.2c-2.1,0-4,1.5-4.2,3.6C-0.2,60,1.7,62,4,62h53.8	c2.1,0,4-1.5,4.2-3.6C62.2,56,60.3,54,58,54z">
                                                                </path>
                                                                <radialGradient id="TGwjmZMm2W~B4yrgup6jdb_119026_gr2"
                                                                    cx="18.51" cy="66.293" r="69.648"
                                                                    gradientTransform="matrix(.6435 -.7654 .5056 .4251 -26.92 52.282)"
                                                                    gradientUnits="userSpaceOnUse">
                                                                    <stop offset=".073" stop-color="#eacc7b"></stop>
                                                                    <stop offset=".184" stop-color="#ecaa59"></stop>
                                                                    <stop offset=".307" stop-color="#ef802e"></stop>
                                                                    <stop offset=".358" stop-color="#ef6d3a"></stop>
                                                                    <stop offset=".46" stop-color="#f04b50"></stop>
                                                                    <stop offset=".516" stop-color="#f03e58"></stop>
                                                                    <stop offset=".689" stop-color="#db359e"></stop>
                                                                    <stop offset=".724" stop-color="#ce37a4"></stop>
                                                                    <stop offset=".789" stop-color="#ac3cb4"></stop>
                                                                    <stop offset=".877" stop-color="#7544cf"></stop>
                                                                    <stop offset=".98" stop-color="#2b4ff2"></stop>
                                                                </radialGradient>
                                                                <path fill="url(#TGwjmZMm2W~B4yrgup6jdb_119026_gr2)"
                                                                    d="M45,57H19c-5.5,0-10-4.5-10-10V21c0-5.5,4.5-10,10-10h26c5.5,0,10,4.5,10,10v26C55,52.5,50.5,57,45,57z">
                                                                </path>
                                                                <path fill="#fff"
                                                                    d="M32,20c4.6,0,5.1,0,6.9,0.1c1.7,0.1,2.6,0.4,3.2,0.6c0.8,0.3,1.4,0.7,2,1.3c0.6,0.6,1,1.2,1.3,2 c0.2,0.6,0.5,1.5,0.6,3.2C46,28.9,46,29.4,46,34s0,5.1-0.1,6.9c-0.1,1.7-0.4,2.6-0.6,3.2c-0.3,0.8-0.7,1.4-1.3,2 c-0.6,0.6-1.2,1-2,1.3c-0.6,0.2-1.5,0.5-3.2,0.6C37.1,48,36.6,48,32,48s-5.1,0-6.9-0.1c-1.7-0.1-2.6-0.4-3.2-0.6 c-0.8-0.3-1.4-0.7-2-1.3c-0.6-0.6-1-1.2-1.3-2c-0.2-0.6-0.5-1.5-0.6-3.2C18,39.1,18,38.6,18,34s0-5.1,0.1-6.9 c0.1-1.7,0.4-2.6,0.6-3.2c0.3-0.8,0.7-1.4,1.3-2c0.6-0.6,1.2-1,2-1.3c0.6-0.2,1.5-0.5,3.2-0.6C26.9,20,27.4,20,32,20 M32,17 c-4.6,0-5.2,0-7,0.1c-1.8,0.1-3,0.4-4.1,0.8c-1.1,0.4-2.1,1-3,2s-1.5,1.9-2,3c-0.4,1.1-0.7,2.3-0.8,4.1C15,28.8,15,29.4,15,34 s0,5.2,0.1,7c0.1,1.8,0.4,3,0.8,4.1c0.4,1.1,1,2.1,2,3c0.9,0.9,1.9,1.5,3,2c1.1,0.4,2.3,0.7,4.1,0.8c1.8,0.1,2.4,0.1,7,0.1 s5.2,0,7-0.1c1.8-0.1,3-0.4,4.1-0.8c1.1-0.4,2.1-1,3-2c0.9-0.9,1.5-1.9,2-3c0.4-1.1,0.7-2.3,0.8-4.1c0.1-1.8,0.1-2.4,0.1-7 s0-5.2-0.1-7c-0.1-1.8-0.4-3-0.8-4.1c-0.4-1.1-1-2.1-2-3s-1.9-1.5-3-2c-1.1-0.4-2.3-0.7-4.1-0.8C37.2,17,36.6,17,32,17L32,17z">
                                                                </path>
                                                                <path fill="#fff"
                                                                    d="M32,25c-5,0-9,4-9,9s4,9,9,9s9-4,9-9S37,25,32,25z M32,40c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6S35.3,40,32,40 z">
                                                                </path>
                                                                <circle cx="41" cy="25" r="2"
                                                                    fill="#fff"></circle>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="39" height="39" viewBox="0 0 48 48">
                                                                <path fill="#039be5"
                                                                    d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                                                                <path fill="#fff"
                                                                    d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="39" height="39" viewBox="0 0 30 30">
                                                                <path
                                                                    d="M 6 4 C 4.895 4 4 4.895 4 6 L 4 24 C 4 25.105 4.895 26 6 26 L 24 26 C 25.105 26 26 25.105 26 24 L 26 6 C 26 4.895 25.105 4 24 4 L 6 4 z M 8.6484375 9 L 13.259766 9 L 15.951172 12.847656 L 19.28125 9 L 20.732422 9 L 16.603516 13.78125 L 21.654297 21 L 17.042969 21 L 14.056641 16.730469 L 10.369141 21 L 8.8945312 21 L 13.400391 15.794922 L 8.6484375 9 z M 10.878906 10.183594 L 17.632812 19.810547 L 19.421875 19.810547 L 12.666016 10.183594 L 10.878906 10.183594 z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                width="39" height="39" viewBox="0 0 48 48">
                                                                <path fill="#FF3D00"
                                                                    d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z">
                                                                </path>
                                                                <path fill="#FFF" d="M20 31L20 17 32 24z"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> <!-- .entry-footer -->
                                </div> <!-- end entry-content -->
                            </div> <!-- end post-body -->
                        </article>
                    </div>
                    <section class="col-lg-4">
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
                                        <p>{{ Carbon::parse($postNew1->created_at)->diffInMinutes() < 1? '1 phút': Carbon::parse($postNew1->created_at)->locale('vi')->diffForHumans(null, true) }}
                                            trước</p>
                                    </div>
                                </div>
                            </div>
                            @foreach ($postNew2 as $item)
                                <div class="most-recent-single">
                                    <div class="most-recent-images">
                                        <img src="{{ asset($item->image->path_url) }}"
                                            style="width: 125px; height: 120px" alt="">
                                    </div>
                                    <div class="most-recent-capt">
                                        <a href="{{ route('findbycategory', $item->category_id) }}">
                                            <span class="bgbeg"
                                                style="margin-bottom: 10px">{{ $item->category->name }}</span>
                                        </a>
                                        <h4>
                                            <a href="{{ route('getpostbyid', $item->id) }}">{{ $item->name }}</a>
                                        </h4>
                                        <p>{{ Carbon::parse($item->created_at)->diffInMinutes() < 1? '1 phút': Carbon::parse($item->created_at)->locale('vi')->diffForHumans(null, true) }}
                                            trước</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="digiqole-category-list-1" class="widget digiqole-category-list mb-30">
                            <div class="widgets_category ts-category-list-item">
                                <ul class="ts-category-list">
                                    <li><a style="background-image:url(//demo.themewinter.com/wp/digiqole/wp-content/uploads/2019/06/sports_4.jpg)"
                                            href="https://demo-themewinter.com/digiqole/blog/category/lifestyle/sports/"><span>Sports</span><span
                                                class="bar"></span> <span class="category-count">4</span></a></li>
                                    <li class="active-cat"><a
                                            style="background-image:url(//demo.themewinter.com/wp/digiqole/wp-content/uploads/2019/06/tech_4.jpg)"
                                            href="https://demo-themewinter.com/digiqole/blog/category/lifestyle/tech/"><span>Tech</span><span
                                                class="bar"></span> <span class="category-count">5</span></a></li>
                                    <li><a style="background-image:url(//demo.themewinter.com/wp/digiqole/wp-content/uploads/2019/06/travel_3.jpg)"
                                            href="https://demo-themewinter.com/digiqole/blog/category/lifestyle/travel/"><span>Travel</span><span
                                                class="bar"></span> <span class="category-count">6</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="tag_cloud-1" class="widget widget_tag_cloud">
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
                    <section>
                        <div class="blog-comment">
                            <div class="container">
                                <div class="section-title mb-30">
                                    <h4>{{ $sumComment }} Bình luận</h4>
                                </div>
                                <ul class="list-unstyled media">
                                    @if (Auth::check())
                                        <form method="post" action="{{ route('comment.add') }}">
                                            @csrf
                                            <li class="row m-4" id="input-comment">
                                                <div>
                                                    <a href="#" class="col-1 w-10">
                                                        <img src="{{ asset('/img/undraw_profile.svg') }}" alt=""
                                                            class="rounded">
                                                    </a>
                                                    <h5 class="text-center">
                                                        <a id="userName">{{ Auth::user()->name }}</a>
                                                    </h5>
                                                </div>
                                                <div class="media-body col-11">
                                                    <div class="d-flex">
                                                        <input type="hidden" name="post_id"
                                                            value="{{ $post[0]->id }}">
                                                        <input class="form-control col-8"
                                                            style="padding: 7px 10px; font-size: 17px;"
                                                            placeholder="add comment" name="comment" type="text"
                                                            required>
                                                        <button class="btn btn-primary ml-2 col-1 comment"
                                                            type="submit">Gửi</button>
                                                    </div>
                                                </div>
                                            </li>
                                        </form>
                                    @endif
                                    @foreach ($comment as $item)
                                        <li class="row " id="comment" value="{{ $item->id }}">
                                            <a>
                                                <img src="{{ asset('/img/undraw_profile.svg') }}" alt=""
                                                    class="rounded">
                                            </a>
                                            <div class="media-body col-11">
                                                <h5><a href="#">{{ $item->user->name }}</a></h5>
                                                <span class="date">{{ $item->created_at }}</span>
                                                <p>{{ $item->comment }}</p>
                                                <a class="reply" onclick="reply({{ $item->id }})"
                                                    id="reply-comment">Reply
                                                    <img srcset="https://img.icons8.com/?size=26&amp;id=39803&amp;format=png 1x, https://img.icons8.com/?size=52&amp;id=39803&amp;format=png 2x,"
                                                        src="https://img.icons8.com/?size=52&amp;id=39803&amp;format=png"
                                                        alt="Right Arrow" loading="lazy" width="26" height="26"
                                                        style="width: 26px; height: 26px;" lazy="loaded">
                                                </a>
                                                <?php

                                                $commentchilds = commentchildren::where('comment_id', $item->id)
                                                    ->orderBy('created_at', 'desc')
                                                    ->get();
                                                ?>
                                                <ul class="list-unstyled media">
                                                    @if (count($commentchilds) > 0)
                                                        @foreach ($commentchilds as $commentchild)
                                                            <li class="row mt-3">
                                                                <a>
                                                                    <img src="{{ asset('/img/undraw_profile.svg') }}"
                                                                        alt="" class="rounded">
                                                                </a>
                                                                <div class="media-body col-10">
                                                                    <h5><a
                                                                            href="#">{{ $commentchild->user->name }}</a>
                                                                    </h5>
                                                                    <span
                                                                        class="date">{{ $commentchild->created_at }}</span>
                                                                    <p>{{ $commentchild->comment }}</p>
                                                                    <a class="reply"
                                                                        onclick="reply({{ $item->id }})"
                                                                        id="reply-comment">Reply
                                                                        <img srcset="https://img.icons8.com/?size=26&amp;id=39803&amp;format=png 1x, https://img.icons8.com/?size=52&amp;id=39803&amp;format=png 2x,"
                                                                            src="https://img.icons8.com/?size=52&amp;id=39803&amp;format=png"
                                                                            alt="Right Arrow" loading="lazy"
                                                                            width="26" height="26"
                                                                            style="width: 26px; height: 26px;"
                                                                            lazy="loaded">
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                                <ul class="list-unstyled media" id="reply_{{ $item->id }}">
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </section>
                </div><!-- .row -->
            </div><!-- .container -->
        </section>
    @endsection
