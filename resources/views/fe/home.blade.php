@extends('fe.layout.layout')
@section('content_web')
    <?php
    use App\Models\post;
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    ?>

    <head>
        <link href="{{ asset('/homelte/css/home.css') }}" rel="stylesheet">
    </head>
    <section class="section first-section">
        <div class="container-fluid">
            <div class="masonry-blog clearfix">
                <div class="first-slot">
                    @if ($tindacbiet != null)
                    @foreach ($tindacbiet as $value)
                    <div class="masonry-box post-media" style="cursor:pointer" onclick="window.location='{{ route('getpostbyid', $value->id) }}'">
                        <img src="{{ $value->image->path_url}}"alt="">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange">
                                        <a href="{{ route('findbycategory', $value->category->id) }}"
                                            title="">{{ $value->category->name }}</a>
                                    </span>
                                    <h4>
                                        <a href="{{ route('getpostbyid', $tindacbiet[0]->id) }}"
                                            title="">{{ $value->name }}</a>
                                    </h4>
                                    <small>
                                        <a title="">
                                            {{ Carbon::parse($value->created_at)->diffInMinutes() < 1
                                                ? '1 phút'
                                                : Carbon::parse($value->created_at)->locale('vi')->diffForHumans(null, true) }} trước
                                        </a>
                                    </small>
                                    <small>
                                        <a href="" title="">{{ $value->user->name }}</a>
                                    </small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                    @endforeach
                    @else
                    <div class="masonry-box post-media">
                        <img src="{{asset('/img/default.jpg')}}"alt="">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-orange">
                                        <a
                                            title="">test</a>
                                    </span>
                                    <h4>
                                        <a
                                            title="">test</a>
                                    </h4>
                                    <small>
                                        <a title="">date
                                        </a>
                                    </small>
                                    <small>
                                        <a href="" title="">tac gia</a>
                                    </small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                    @endif
                </div><!-- end first-side -->
                <div class="row display">
                    @if ($tinNoibat != null)
                    @foreach ($tinNoibat as $key => $value)
                        <div class="col-6">
                            <div class="second-slot">
                                <div class="masonry-box post-media" style="cursor:pointer">
                                        <img src="{{ asset($value->image->path_url) }}" alt="" class="img-fluid">
                                    <div class="shadoweffect"  onclick="window.location='{{ route('getpostbyid', $value->id) }}'">
                                        <div class="shadow-desc">
                                            <div class="blog-meta">
                                                <span class="bg-orange">
                                                    <a href="{{ route('findbycategory', $value->category_id) }}"
                                                        title="">{{ $value->category->name }}</a>
                                                </span>
                                                <h4 class="textNamepost">
                                                    <a href="{{ route('getpostbyid', $value->id) }}"
                                                        title="">{{ $value->name }}
                                                    </a>
                                                </h4>
                                                <small>
                                                     {{ Carbon::parse($value->created_at)->diffInMinutes() < 1
                                                        ? '1 phút'
                                                        : Carbon::parse($value->created_at)->locale('vi')->diffForHumans(null, true) }} trước
                                                </small>
                                                <small>
                                                    <a href="" title="">{{$value->user->name}}</a>
                                                </small>
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
                    @else
                        <div class="col-6">
                            <div class="second-slot">
                                <div class="masonry-box post-media">
                                    <img src="{{asset('/img/default.jpg')}}" alt="" class="img-fluid">
                                    <div class="shadoweffect">
                                        <div class="shadow-desc">
                                            <div class="blog-meta">
                                                <span class="bg-orange">
                                                    <a title="">test</a>
                                                </span>
                                                <h4 class="textNamepost">
                                                    <a title="">test
                                                    </a>
                                                </h4>
                                                <small>
                                                    date
                                                </small>
                                                <small>
                                                    <a href="" title="">tacgia</a>
                                                </small>
                                            </div><!-- end meta -->
                                        </div><!-- end shadow-desc -->
                                    </div><!-- end shadow -->
                                </div><!-- end post-media -->
                            </div><!-- end second-side -->
                        </div>
                        <div class="col-6">
                            <div class="second-slot">
                                <div class="masonry-box post-media">
                                    <img src="{{asset('/img/default.jpg')}}" alt="" class="img-fluid">
                                    <div class="shadoweffect">
                                        <div class="shadow-desc">
                                            <div class="blog-meta">
                                                <span class="bg-orange">
                                                    <a title="">test</a>
                                                </span>
                                                <h4 class="textNamepost">
                                                    <a title="">test
                                                    </a>
                                                </h4>
                                                <small>
                                                    date
                                                </small>
                                                <small>
                                                    <a href="" title="">tacgia</a>
                                                </small>
                                            </div><!-- end meta -->
                                        </div><!-- end shadow-desc -->
                                    </div><!-- end shadow -->
                                </div><!-- end post-media -->
                            </div><!-- end second-side -->
                        </div>
                        <div class="w-100"></div>
                        <div class="col-6">
                            <div class="second-slot">
                                <div class="masonry-box post-media">
                                    <img src="{{asset('/img/default.jpg')}}" alt="" class="img-fluid">
                                    <div class="shadoweffect">
                                        <div class="shadow-desc">
                                            <div class="blog-meta">
                                                <span class="bg-orange">
                                                    <a title="">test</a>
                                                </span>
                                                <h4 class="textNamepost">
                                                    <a title="">test
                                                    </a>
                                                </h4>
                                                <small>
                                                    date
                                                </small>
                                                <small>
                                                    <a href="" title="">tacgia</a>
                                                </small>
                                            </div><!-- end meta -->
                                        </div><!-- end shadow-desc -->
                                    </div><!-- end shadow -->
                                </div><!-- end post-media -->
                            </div><!-- end second-side -->
                        </div>
                        <div class="col-6">
                            <div class="second-slot">
                                <div class="masonry-box post-media">
                                    <img src="{{asset('/img/default.jpg')}}" alt="" class="img-fluid">
                                    <div class="shadoweffect">
                                        <div class="shadow-desc">
                                            <div class="blog-meta">
                                                <span class="bg-orange">
                                                    <a title="">test</a>
                                                </span>
                                                <h4 class="textNamepost">
                                                    <a title="">test
                                                    </a>
                                                </h4>
                                                <small>
                                                    date
                                                </small>
                                                <small>
                                                    <a href="" title="">tacgia</a>
                                                </small>
                                            </div><!-- end meta -->
                                        </div><!-- end shadow-desc -->
                                    </div><!-- end shadow -->
                                </div><!-- end post-media -->
                            </div><!-- end second-side -->
                        </div>
                    @endif
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
                            <div class="col-xl-3 col-md-5 col-sm-5 col-auto px-4">
                                <div class="section-tittle mb-30">
                                    <h3  class="ml-1">Tin Nóng</h3>
                                </div>
                            </div>
                            <div
                                class="col-xl-8 col-md-4 col-sm-4 d-none d-md-block d-lg-block d-xl-block d-xxl-block px-4">
                                <div class="properties__button mb-4" style="display: flex; overflow: hidden;  <?php if(count($categoryMain)<5){echo 'justify-content: center;';} ?>">
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
                            @if(count($categoryMain)>=5)
                            <div class="owl-nav col-1 d-none d-md-flex d-lg-flex d-xl-flex d-xxl-flex m-auto pb-3">
                                <button type="button" role="presentation" class="owl-prev" onclick="translateXElement(0)">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px"
                                        viewBox="0,0,256,256">
                                        <g fill="#06c4ff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                            stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                            font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                            <g transform="translate(264.52636,256) rotate(180) scale(8.53333,8.53333)">
                                                <path
                                                    d="M12,27h-2c-0.386,0 -0.738,-0.223 -0.904,-0.572c-0.166,-0.349 -0.115,-0.762 0.13,-1.062l8.482,-10.366l-8.482,-10.367c-0.245,-0.299 -0.295,-0.712 -0.13,-1.062c0.165,-0.35 0.518,-0.571 0.904,-0.571h2c0.3,0 0.584,0.135 0.774,0.367l9,11c0.301,0.369 0.301,0.898 0,1.267l-9,11c-0.19,0.231 -0.474,0.366 -0.774,0.366z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                                <button type="button" role="presentation" class="owl-next" onclick="translateXElement(-250)">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px"
                                        viewBox="0,0,256,256">
                                        <g fill="#06c4ff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                            stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                            stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                            font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                            <g transform="scale(8.53333,8.53333)">
                                                <path
                                                    d="M12,27h-2c-0.386,0 -0.738,-0.223 -0.904,-0.572c-0.166,-0.349 -0.115,-0.762 0.13,-1.062l8.482,-10.366l-8.482,-10.367c-0.245,-0.299 -0.295,-0.712 -0.13,-1.062c0.165,-0.35 0.518,-0.571 0.904,-0.571h2c0.3,0 0.584,0.135 0.774,0.367l9,11c0.301,0.369 0.301,0.898 0,1.267l-9,11c-0.19,0.231 -0.474,0.366 -0.774,0.366z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach ($categoryMain as $key => $value)
                                        <?php
                                        $postDB = post::where('category_id', $value->id)
                                            ->orderBy('created_at', 'desc')
                                            ->first();
                                        $postcate = post::where('category_id', $value->id)->orderBy('created_at', 'desc')->paginate(4);
                                        ?>
                                        <div <?php
                                        if ($key == 0) {
                                            echo 'class="tab-pane fade show active"';
                                        } else {
                                            echo 'class="tab-pane fade "';
                                        }
                                        ?> id="nav{{ $key }}">

                                            <div class="row">
                                                @if($postDB)
                                                <div class="col-xl-6 px-4">
                                                    <div class="whats-news-single mb-40" >
                                                        <div class="whates-img" style="cursor:pointer"  onclick="window.location='{{ route('getpostbyid', $value->id) }}'">
                                                            <img src="{{ $postDB->image->path_url }}" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4>
                                                                <a
                                                                    href="{{ route('getpostbyid', $postDB->id) }}">{{ $postDB->name }}</a>
                                                            </h4>
                                                            <span>{{ Carbon::parse($postDB->created_at)->diffInMinutes() < 1
                                                                ? '1 phút'
                                                                : Carbon::parse($postDB->created_at)->locale('vi')->diffForHumans(null, true) }} trước</span>
                                                            <small>{{ $postDB->user->name}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="col-xl-6 px-4">
                                                    <div class="whats-news-single mb-40">
                                                        <div class="whates-img">
                                                            <img src="{{asset('/img/default.jpg')}}" alt="">
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4>
                                                                <a >Không có bài viết</a>
                                                            </h4>
                                                            <span>date</span>
                                                            <small>tac gia</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="col-xl-6 col-lg-12 px-4">
                                                    <div class="row">
                                                       @if (count($postcate)>0)
                                                       @foreach ($postcate as $item)
                                                       <div
                                                           class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                           <div class="whats-right-single mb-20">
                                                               <div class="whats-right-img" style="cursor: pointer"  onclick="window.location='{{ route('getpostbyid', $item->id) }}'">
                                                                   <img src="{{ $item->image->path_url }}"
                                                                       style="width: 124px; height: 102px"
                                                                       alt="">
                                                               </div>
                                                               <div class="whats-right-cap">
                                                                   <h4>
                                                                       <a
                                                                           href="{{ route('getpostbyid', $item->id) }}">{{ $item->name }}
                                                                       </a>
                                                                   </h4>
                                                                   <p> {{ Carbon::parse($item->created_at)->diffInMinutes() < 1
                                                                       ? '1 phút'
                                                                       : Carbon::parse($item->created_at)->locale('vi')->diffForHumans(null, true) }} trước</p>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   @endforeach
                                                       @else
                                                       <div
                                                           class="col-xl-12 col-lg-6 col-md-6 col-sm-10 px-4 px-xl-0">
                                                           <div class="whats-right-single mb-20">
                                                               <div class="whats-right-img">
                                                                   <img src="{{asset('/img/default.jpg')}}"
                                                                       style="width: 124px; height: 102px"
                                                                       alt="">
                                                               </div>
                                                               <div class="whats-right-cap">
                                                                   <h4>
                                                                       <a>Không có bài viết
                                                                       </a>
                                                                   </h4>
                                                                   <p> date</p>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       @endif
                                                    </div>
                                                </div>
                                                @if (count($postcate)>0)
                                                <div class="mx-auto my-2 more">{{$postcate->appends(request()->all())->links()}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="col-lg-4">
                    <div class="most-recent-area px-4">
                        <div class="col-auto">
                            <div class="section-tittle mb-30 st">
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
                                <img src="{{ $postNew1->image->path_url }}" class="img-fluid" alt="">
                                <div class="most-recent-cap">
                                    <span
                                        onclick="window.location='{{ URL::route('findbycategory', $postNew1->category_id) }}'"
                                        class="bgbeg">{{ $postNew1->category->name }}</span>
                                    <h4>
                                        <a href="{{ route('getpostbyid', $postNew1->id) }}">{{ $postNew1->name }}
                                        </a>
                                    </h4>
                                    <p>{{ Carbon::parse($postNew1->created_at)->diffInMinutes() < 1
                                        ? '1 phút'
                                        : Carbon::parse($postNew1->created_at)->locale('vi')->diffForHumans(null, true) }} trước</p>
                                </div>
                            </div>
                        </div>
                        @foreach ($postNew2 as $item)
                            <div class="most-recent-single">
                                <div class="most-recent-images"
                                    onclick="window.location='{{ URL::route('getpostbyid', $item->id) }}'">
                                    <img src="{{ $item->image->path_url }}" style="width: 125px; height: 120px;object-fit: cover;"
                                        alt="">
                                </div>
                                <div class="most-recent-capt">
                                    <span class="bgbeg"
                                        onclick="window.location='{{ URL::route('findbycategory', $item->category_id) }}'"
                                        style="margin-bottom: 10px">{{ $item->category->name }}</span>
                                    <h4><a href="{{ route('getpostbyid', $item->id) }}">{{ $item->name }}</a></h4>
                                    <p>{{ Carbon::parse($item->created_at)->diffInMinutes() < 1
                                        ? '1 phút'
                                        : Carbon::parse($item->created_at)->locale('vi')->diffForHumans(null, true) }} trước</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="weekly3-news-area pt-80 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Tin Nổi Bật</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
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
                                        data-slick-index="{{ $key - 3 }}" aria-hidden="false" style="width: 220px;"
                                        tabindex="-1" role="option" aria-describedby="slick-slide{{ $key + 1 }}">
                                        <div class="weekly3-img2" style="cursor: pointer"
                                            onclick="window.location='{{ URL::route('getpostbyid', $item->id) }}'">
                                            <img src="{{ $item->image->path_url }}" style="width: 230px; height: 150px"
                                                alt="">
                                        </div>
                                        <div class="weekly3-caption2">
                                            <span class="bgbeg"
                                                onclick="window.location='{{ URL::route('findbycategory', $item->category_id) }}'">{{ $item->category->name }}</span>
                                            <h4>
                                                <a href="{{ route('getpostbyid', $item->id) }}"
                                                    tabindex="0">{{ $item->name }}</a>
                                            </h4>
                                            <p><?php
                                            $date = new DateTime($item->created_at);
                                            ?></p>
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
