@extends('fe.layout.layout')
@section('content_web')
    <?php
    use App\Models\post;
    use App\Models\category;
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
                    @if ($parent==true)
                    <div class="col-lg-8 pr-3 sidebar-right">
                        <?php
                        $posts = post::where('category_id', $category->id)->orderBy('id','desc')->take(6)->get();
                        ?>
                        <div class="main-content-inner category-layout2">
                            <div class="row container">
                                <div class="category-main-desc">
                                    <div class="section-tittle mb-30">
                                       <a href="{{ route('findbycategory', $category->id)}}">
                                        <h3 class="ml-3">{{$category->name}}</h3>
                                       </a>
                                    </div>
                                </div>
                                @foreach ($posts as $post)
                                <div class="post-block-style row mb-30 ">
                                    <div class="col-5 px-4">
                                        <div class="post-media post-image">
                                            <a href="{{ route('getpostbyid', $post->id)}}">
                                                <img class="img-fluid"
                                                    src="{{asset($post->image->path_url)}}"
                                                    alt=" Best garden wing supplies for the horticu ltural hopeless">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-7 pr-3">
                                        <div class="post-content">
                                            <div class="entry-blog-header">
                                                <h2 class="post-title md">
                                                    <a
                                                        href="{{ route('getpostbyid', $post->id)}}">
                                                        {{$post->name}}
                                                    </a>
                                                </h2>
                                            </div>
                                            <div class="post-meta">
                                                <div class="post-meta">
                                                    <span class="post-author"><i class="ts-icon ts-icon-user-solid"></i>
                                                        <a
                                                            href="">tac gia</a></span><span
                                                        class="post-meta-date">
                                                        <i class="ts-icon ts-icon-clock-regular"></i>
                                                        June 30, 2019</span>
                                                </div>
                                            </div>
                                            <div class="entry-blog-summery">
                                                <?php echo substr($post->title, 0, 100); ?>
                                                <a
                                                        class="readmore-btn"
                                                        href="">
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
                                $categorychilld = category::where('parent_id', $category->id)->orderBy('id','desc')->take(3)->get();
                            ?>
                            @foreach ($categorychilld as $category)
                            <div class="row container">
                                <div class="category-main-desc">
                                    <div class="section-tittle mb-30">
                                        <h3 class="ml-3">{{$category->name}}</h3>
                                    </div>
                                </div>
                                <?php
                                    $posts = post::where('category_id', $category->id)->take(6)->get();
                                ?>
                                @foreach ($posts as $post)
                                <div class="post-block-style row mb-30">
                                    <div class="col-5 px-4">
                                        <div class="post-media post-image">
                                            <a href="{{ route('getpostbyid', $post->id)}}">
                                                <img class="img-fluid" src="{{asset($post->image->path_url)}}"
                                                    alt=" Best garden wing supplies for the horticu ltural hopeless">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-7 pr-3">
                                        <div class="post-content">
                                            <div class="entry-blog-header">
                                                <h2 class="post-title md">
                                                    <a
                                                        href="{{ route('getpostbyid', $post->id)}}">{{$post->name}}</a>
                                                </h2>
                                            </div>
                                            <div class="post-meta">
                                                <div class="post-meta">
                                                    <span class="post-author"><i class="ts-icon ts-icon-user-solid"></i>
                                                        <a
                                                            href="">{{$post->user->name}}</a></span><span
                                                        class="post-meta-date">
                                                        <i class="ts-icon ts-icon-clock-regular"></i>
                                                        June 30, 2019</span>
                                                </div>
                                            </div>
                                            <div class="entry-blog-summery">
                                                <?php echo substr($post->title, 0, 100);?>
                                                <a
                                                        class="readmore-btn"
                                                        href="">
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
                            $postNew1 = post::orderBy('created_at', 'desc')->first();
                            $postNew2 = post::orderBy('created_at', 'desc')
                                ->skip(1)
                                ->take(2)
                                ->get();
                            ?>
                            <div class="most-recent mb-40">
                                <div class="most-recent-img mx-auto">
                                    <img src="{{ asset($postNew1->image->path_url) }}" class="img-fluid" alt="">
                                    <div class="most-recent-cap">
                                        <a href="{{ route('findbycategory', $postNew1->category_id) }}"><span class="bgbeg">{{ $postNew1->category->name }}</span></a>
                                        <h4><a href="{{ route('getpostbyid', $postNew1->id) }}">{{ $postNew1->name }}</a></h4>
                                        <p>Jhon | 2 hours ago</p>
                                    </div>
                                </div>
                            </div>
                            @foreach ($postNew2 as $item)
                                <div class="most-recent-single">
                                    <div class="most-recent-images">
                                        <img src="{{ asset($item->image->path_url) }}" style="width: 125px; height: 120px"
                                            alt="">
                                    </div>
                                    <div class="most-recent-capt">
                                        <a href="{{ route('findbycategory', $item->category_id) }}">
                                            <span class="bgbeg" style="margin-bottom: 10px">{{ $item->category->name }}</span>
                                        </a>
                                        <h4>
                                            <a href="{{ route('getpostbyid', $item->id) }}">{{ $item->name }}</a>
                                        </h4>
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
