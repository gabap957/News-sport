@extends('fe.layout.layout')
@section('content_web')
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <div class="first-slot">
                <div class="masonry-box post-media">
                    <img src="<?php
                   $path=DB::table('images')->where('id',$tindacbiet[0]->image_id)->first();
                   $categoryName=DB::table('categories')->where('id',$tindacbiet[0]->category_id)->first();
                   echo asset($path->path_url);
                ?>
                " alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html"
                                        title="">{{$categoryName->name}}</a></span>
                                <h4><a href="tech-single.html" title="">{{$tindacbiet[0]->name}}</a></h4>
                                <small><a href="tech-single.html" title="">{{$tindacbiet[0]->created_at}}</a></small>
                                <small><a href="tech-author.html" title="">tac gia</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->
            <div class="row display">
                @foreach($tinNoibat as $key => $value)
                <div class="col-6">
                    <div class="second-slot">
                        <div class="masonry-box post-media">
                            <img src="<?php
                                  $path=DB::table('images')->where('id',$value->image_id)->first();
                                  $categoryName=DB::table('categories')->where('id',$value->category_id)->first();
                                echo asset($path->path_url);
                                  ?>" alt="" class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange">
                                            <a href="tech-category-01.html" title="">{{$categoryName->name}}</a></span>
                                        <h4 class="textNamepost"><a href="tech-single.html" title="">{{$value->name}}</a></h4>
                                        <small><a href="tech-single.html" title="">{{$value->created_at}}</a></small>
                                        <small><a href="tech-author.html" title="">tac gia</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->
                </div>
                @if($key == 1)
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
                        <div class="col-xl-4 px-4">
                            <div class="section-tittle mb-30">
                                <h3 class="ml-1">Tin Nóng</h3>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-9 px-4">
                            <div class="properties__button">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @foreach($categoryMain as $index =>$item)
                                        <div onclick="postbyCate($id)">
                                        <a
                                        <?php if ($index==0)
                                        {
                                            echo 'class="nav-item nav-link active"';
                                        } 
                                        else {
                                            echo 'class="nav-item nav-link"';
                                        } 
                                        ?>
                                        id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-controls="nav-home"
                                            aria-selected="true">{{$item->name}}</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </nav>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-12 px-4 ">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="latest_news.html">Secretart for Economic Air plane that
                                                            looks like</a></h4>
                                                    <span>by Alice cloe - Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the
                                                        market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-12 px-4">
                                            <div class="row">

                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-xl-0 px-4">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="row">

                                        <div class="col-xl-6 px-4">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="#">Secretart for Economic Air
                                                            plane that looks like</a></h4>
                                                    <span>by Alice cloe - Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the
                                                        market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-12 px-4 px-lg-0">
                                            <div class="row">

                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-xl-0 px-4">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <div class="row">

                                        <div class="col-xl-6 px-4">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="#">Secretart for Economic Air
                                                            plane that looks like</a></h4>
                                                    <span>by Alice cloe - Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the
                                                        market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-12 px-4 px-lg-0">
                                            <div class="row">

                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                    <div class="row">

                                        <div class="col-xl-6 px-4">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="#">Secretart for Economic Air
                                                            plane that looks like</a></h4>
                                                    <span>by Alice cloe - Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the
                                                        market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-12 px-4 px-lg-0">
                                            <div class="row">

                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel"
                                    aria-labelledby="nav-Sports">
                                    <div class="row">

                                        <div class="col-xl-6 px-4">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="#">Secretart for Economic Air
                                                            plane that looks like</a></h4>
                                                    <span>by Alice cloe - Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the
                                                        market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-12 px-4 px-lg-0">
                                            <div class="row">

                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends
                                                                    ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="banner-one mt-20 mb-30">
                    <img src="assets/img/gallery/body_card1.png" alt="">
                </div>
            </div>
            <div class="col-lg-4">

                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#">
                                    <img width="29" height="29" src="https://img.icons8.com/fluency/48/facebook.png"
                                        alt="facebook" />
                                </a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img width="29" height="29"
                                        src="https://img.icons8.com/fluency/48/instagram-new.png"
                                        alt="instagram-new" /></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img width="29" height="29"
                                        src="https://img.icons8.com/fluency/48/twitterx--v1.png"
                                        alt="twitterx--v1" /></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img width="29" height="29"
                                        src="https://img.icons8.com/color/48/youtube-play.png" alt="youtube-play" /></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="most-recent-area">

                    <div class="small-tittle mb-20">
                        <h4>Most Recent</h4>
                    </div>

                    <div class="most-recent mb-40">
                        <div class="most-recent-img">
                            <img src="assets/img/gallery/most_recent.png" alt="">
                            <div class="most-recent-cap">
                                <span class="bgbeg">Vogue</span>
                                <h4><a href="latest_news.html">What to Wear: 9+ Cute Work <br>
                                        Outfits to Wear This.</a></h4>
                                <p>Jhon | 2 hours ago</p>
                            </div>
                        </div>
                    </div>

                    <div class="most-recent-single">
                        <div class="most-recent-images">
                            <img src="assets/img/gallery/most_recent1.png" alt="">
                        </div>
                        <div class="most-recent-capt">
                            <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a></h4>
                            <p>Jhon | 2 hours ago</p>
                        </div>
                    </div>

                    <div class="most-recent-single">
                        <div class="most-recent-images">
                            <img src="assets/img/gallery/most_recent2.png" alt="">
                        </div>
                        <div class="most-recent-capt">
                            <h4><a href="latest_news.html">Most Beautiful Things to Do in Sidney with Your BF</a></h4>
                            <p>Jhon | 3 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="weekly2-news-area pt-50 pb-30 gray-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <div class="row">

                <!-- <div class="col-lg-3">
                    <div class="home-banner2 d-none d-lg-block">
                        <img src="assets/img/gallery/body_card2.png" alt="">
                    </div>
                </div> -->
                <!-- <div class="col-lg-9"> -->
                    <div class="slider-wrapper">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="small-tittle mb-30">
                                    <h4>Most Popular</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="weekly2-news-active d-flex slick-initialized slick-slider"><button
                                        type="button" class="slick-prev slick-arrow" style="display: block;"><i
                                            class="ti-angle-left"></i></button>

                                    <div class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1; width: 3025px; transform: translate3d(-825px, 0px, 0px);">
                                            <div class="weekly2-single slick-slide slick-cloned" data-slick-index="-3"
                                                aria-hidden="true" style="width: 245px;" tabindex="-1">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="-1">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide slick-cloned" data-slick-index="-2"
                                                aria-hidden="true" style="width: 245px;" tabindex="-1">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews3.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="-1">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide slick-cloned" data-slick-index="-1"
                                                aria-hidden="true" style="width: 245px;" tabindex="-1">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="-1">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide slick-current slick-active"
                                                data-slick-index="0" aria-hidden="false" style="width: 245px;"
                                                tabindex="0">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews1.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="0">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide slick-active" data-slick-index="1"
                                                aria-hidden="false" style="width: 245px;" tabindex="0">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="0">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide slick-active" data-slick-index="2"
                                                aria-hidden="false" style="width: 245px;" tabindex="0">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews3.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="0">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide" data-slick-index="3"
                                                aria-hidden="true" style="width: 245px;" tabindex="-1">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="-1">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide slick-cloned" data-slick-index="4"
                                                aria-hidden="true" style="width: 245px;" tabindex="-1">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews1.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="-1">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide slick-cloned" data-slick-index="5"
                                                aria-hidden="true" style="width: 245px;" tabindex="-1">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="-1">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide slick-cloned" data-slick-index="6"
                                                aria-hidden="true" style="width: 245px;" tabindex="-1">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews3.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="-1">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                            <div class="weekly2-single slick-slide slick-cloned" data-slick-index="7"
                                                aria-hidden="true" style="width: 245px;" tabindex="-1">
                                                <div class="weekly2-img">
                                                    <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4><a href="#" tabindex="-1">Scarlett’s disappointment at latest
                                                            accolade</a></h4>
                                                    <p>Jhon | 2 hours ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                    <button type="button" class="slick-next slick-arrow" style="display: block;"><i
                                            class="ti-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection