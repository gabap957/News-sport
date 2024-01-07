<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>News Sports</title>
<meta name="keywords" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

<!-- Design fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.css" integrity="sha512-qYgnDNlu2lefkHtLZMk3Mj7BJb/Cg/lIyydO9eJAvgqtjU08KVeJqEBAaB8VUVDCRkdAwgzS04Jh6g4AtIcThw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Bootstrap core CSS -->
<link href="{{ asset('homelte/css/bootstrap.css') }}" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="{{ asset('homelte/css/font-awesome.min.css') }}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{ asset('homelte/css/style.css') }}" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="{{ asset('homelte/css/responsive.css') }}" rel="stylesheet">

<!-- Colors for this template -->
<link href="{{ asset('homelte/css/colors.css') }}" rel="stylesheet">
<!-- Version Tech CSS for this template -->
<link href="{{ asset('homelte/css/version/tech.css') }}" rel="stylesheet">
<link href="{{ asset('homelte/css/profile.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/homelte/slick/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/homelte/slick/slick-theme.css') }}" />
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <header class="tech-header header">
            @include('fe.layout.header')
        </header><!-- end market-header -->

        <section class="section first-section">
            @if (Auth::check())
            @include('fe.layout.profile')
            @endif
            @yield('content_web')
        </section>

        <footer class="footer">
            @include('fe.layout.footer')
        </footer><!-- end footer -->

        <div class="dmtop"><img width="48" height="48" src="https://img.icons8.com/fluency/48/circled-up-2.png"
                alt="circled-up-2" /></div>

    </div><!-- end wrapper -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Core JavaScript
    ================================================== -->
    <script src="{{ asset('/homelte/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/homelte/js/tether.min.js') }}"></script>
    <script src="{{ asset('/homelte/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/homelte/js/custom.js') }}"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('/homelte/slick/slick.js') }}"></script>
    <script src="{{ asset('/js/home.js') }}"></script>
    <script src="{{ asset('/js/showimage.js') }}"></script>
</body>
<?php
    use Illuminate\Support\Facades\Auth;
?>
<script>
    //tim kiem theo name post home
    $(document).on('keyup', '#search_input', function(e) {
        let searchText = $(this).val();
        if (searchText != "") {
            $.ajax({
                url: "{{ route('search') }}",
                method: "get",
                data: {
                    name: searchText,
                },
                success: function(response) {
                    let result =  response.map(value =>{
                        return  '<a href="/post/'+value.id+'" class="list-group-item list-group-item-action border-1"><div class="d-flex"><img style="width: 30%;" src="http://127.0.0.1:8000/'+value.path_url+'" alt=""><p class="ml-2">' + value.name +'</p></div></a>'
                    })
                    $(".search_result").html(result);
                },
            })
        } else {
            $(".search_result").html("");
        }
    });
    let check = {{ Auth::check() ? 'true' : 'false' }};
    function reply(id) {
        let name = $('#userName').text();
        if(check){
            $.ajax({
            url:"{{route('reply')}}",
            method: "get",
            data: {
                id: id,
            },
            success: function(response) {
               let result =  response.map(value =>{
               return '<form method="post" action="{{route('commentchild.add')}}">@csrf<li class="row mt-3"><div style="display: grid;"><a href="#" class="col-1 w-10"><img class="rounded" src="{{asset('/img/undraw_profile.svg')}}" alt=""></a><h5 class="text-center"><a href="#">'+name+'</a></h5></div><div class="media-body col-10"><div class="d-flex "> <input type="hidden" name="comment_id" value="'+id+'"><input class="form-control col-8" style="padding: 7px 10px; font-size: 17px;" placeholder="add comment" name="comment" type="text" required><button class="btn btn-primary ml-2 col-1 comment">Gửi</button></div></div></li></form>'
                });
               $('#reply_'+id+'').html(result);
            }
        })
        }
        else{
            alert("Vui lòng đăng nhập");
        }
    }
    if(check){
       function profile(){
           $('#page-content').addClass('show2');
           $('#page-content').removeClass('show1');
       }
       function removeProfile(){
        $('#page-content').removeClass('show2');
        $('#page-content').addClass('show1');
       }
    }

    $('.slick-track').slick({
        dots: true,
        slidesToShow: 10,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 2000,
    });
</script>

</html>
