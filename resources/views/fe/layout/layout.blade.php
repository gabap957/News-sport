<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Tech Blog - Stylish Magazine Blog Template</title>
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
            @yield('content_web')
        </section>

        <footer class="footer">
            @include('fe.layout.footer')
        </footer><!-- end footer -->

        <div class="dmtop"><img width="48" height="48" src="https://img.icons8.com/fluency/48/circled-up-2.png"
                alt="circled-up-2" /></div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="{{ asset('/homelte/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/homelte/js/tether.min.js') }}"></script>
    <script src="{{ asset('/homelte/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/homelte/js/custom.js') }}"></script>
    <script src="{{ asset('/js/layouthome.js') }}"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('/homelte/slick/slick.js') }}"></script>

    <script src="{{ asset('/js/home.js') }}"></script>
</body>
<script>
    //tim kiem theo name post home
    $(document).on('keyup', '#search_input', function(e) {
        var searchText = $(this).val();
        if (searchText != " ") {
            $.ajax({
                url: "{{ route('search') }}",
                method: "get",
                data: {
                    name: searchText,
                },

                success: function(response) {
                    console.log(response);
                    $("#show-list").html(result);
                },
            })

        } else {
            $("#show-list").html("");
        }
    });
    $('.slick-track').slick({
        dots: true,
        slidesToShow: 10,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
</script>

</html>
