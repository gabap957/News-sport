<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News Sports Admin</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/adminlte/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/adminlte/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/main.css') }}">
    <link href="{{ asset('/adminlte/css/toast.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<?php
use Illuminate\Support\Facades\Auth;
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('be.user.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column marginleft">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('be.user.header')
                <!-- End of Topbar -->
                @if (\Illuminate\Support\Facades\Session::has('success'))
                    <div class="toast active" id="toast">
                        <div class="toast-content">
                            <i class="fas fa-solid fa-check check"></i>
                            <div class="message">
                                <span class="text text-1">Success!</span>
                                <span
                                    class="text text-2">{{ \Illuminate\Support\Facades\Session::get('success') }}</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-xmark close"></i>

                        <!-- Remove 'active' class, this is just to show in Codepen thumbnail -->
                        <div class="progress active"></div>
                    </div>
                @endif
                @if (\Illuminate\Support\Facades\Session::has('error'))
                    <div class="toast active" id="toast">
                        <div class="toast-content">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
                                viewBox="0 0 48 48">
                                <linearGradient id="wRKXFJsqHCxLE9yyOYHkza_fYgQxDaH069W_gr1" x1="9.858"
                                    x2="38.142" y1="9.858" y2="38.142" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#f44f5a"></stop>
                                    <stop offset=".443" stop-color="#ee3d4a"></stop>
                                    <stop offset="1" stop-color="#e52030"></stop>
                                </linearGradient>
                                <path fill="url(#wRKXFJsqHCxLE9yyOYHkza_fYgQxDaH069W_gr1)"
                                    d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z">
                                </path>
                                <path
                                    d="M33.192,28.95L28.243,24l4.95-4.95c0.781-0.781,0.781-2.047,0-2.828l-1.414-1.414	c-0.781-0.781-2.047-0.781-2.828,0L24,19.757l-4.95-4.95c-0.781-0.781-2.047-0.781-2.828,0l-1.414,1.414	c-0.781,0.781-0.781,2.047,0,2.828l4.95,4.95l-4.95,4.95c-0.781,0.781-0.781,2.047,0,2.828l1.414,1.414	c0.781,0.781,2.047,0.781,2.828,0l4.95-4.95l4.95,4.95c0.781,0.781,2.047,0.781,2.828,0l1.414-1.414	C33.973,30.997,33.973,29.731,33.192,28.95z"
                                    opacity=".05"></path>
                                <path
                                    d="M32.839,29.303L27.536,24l5.303-5.303c0.586-0.586,0.586-1.536,0-2.121l-1.414-1.414	c-0.586-0.586-1.536-0.586-2.121,0L24,20.464l-5.303-5.303c-0.586-0.586-1.536-0.586-2.121,0l-1.414,1.414	c-0.586,0.586-0.586,1.536,0,2.121L20.464,24l-5.303,5.303c-0.586,0.586-0.586,1.536,0,2.121l1.414,1.414	c0.586,0.586,1.536,0.586,2.121,0L24,27.536l5.303,5.303c0.586,0.586,1.536,0.586,2.121,0l1.414-1.414	C33.425,30.839,33.425,29.889,32.839,29.303z"
                                    opacity=".07"></path>
                                <path fill="#fff"
                                    d="M31.071,15.515l1.414,1.414c0.391,0.391,0.391,1.024,0,1.414L18.343,32.485	c-0.391,0.391-1.024,0.391-1.414,0l-1.414-1.414c-0.391-0.391-0.391-1.024,0-1.414l14.142-14.142	C30.047,15.124,30.681,15.124,31.071,15.515z">
                                </path>
                                <path fill="#fff"
                                    d="M32.485,31.071l-1.414,1.414c-0.391,0.391-1.024,0.391-1.414,0L15.515,18.343	c-0.391-0.391-0.391-1.024,0-1.414l1.414-1.414c0.391-0.391,1.024-0.391,1.414,0l14.142,14.142	C32.876,30.047,32.876,30.681,32.485,31.071z">
                                </path>
                            </svg>
                            <div class="message">
                                <span class="text text-1">error!</span>
                                <span class="text text-2">{{ \Illuminate\Support\Facades\Session::get('error') }}</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-xmark close"></i>

                        <!-- Remove 'active' class, this is just to show in Codepen thumbnail -->
                        <div class="progress active"></div>
                    </div>
                @endif

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                @include('be.user.footer')
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <div class="modal bs-example-modal-sm" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Đăng xuất <i class="fa fa-lock"></i></h4>
                </div>
                <div class="modal-body"><i class="fa fa-question-circle"></i> Bạn có chắc chắn bạn muốn đăng xuất?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/adminlte/vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="{{ asset('/adminlte/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/adminlte/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/adminlte/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('/js/layout.js') }}"></script>
    <script src="{{ asset('/js/showimage.js') }}"></script>
    <script src="{{ asset('/adminlte/js/toast.js') }}"></script>
    <script src="{{ asset('adminlte/js/image.js') }}"></script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editortitle'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token = ' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
        let tapbar = document.querySelectorAll('.tapbar');
        for (let i = 0; i < tapbar.length; i++) {
            tapbar[i].addEventListener('click', function() {
                for (let j = 0; j < tapbar.length; j++) {
                    tapbar[j].classList.remove('active');
                    tapbar[i].classList.add('active');
                }
            })
        }
        chartMonth({{ date('Y') }});

        function chartMonth(year) {
            var ctx = document.getElementById("myAreaChart").getContext('2d');
            $.ajax({
                url: "{{ route('chartMonth') }}",
                method: "get",
                data: {
                    year: year,
                },
                success: function(response) {
                    var MonthArray = getMonthsOfYear(response[0].year);
                    console.log(MonthArray);
                    var counts = response.map(function(item) {
                        return item.count;
                    });
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: MonthArray,
                            datasets: [{
                                label: 'bài viết',
                                data: counts,
                                backgroundColor: ['#66664D', '#991AFF', '#E666FF', '#4DB3FF',
                                    '#1AB399','#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
                                    '#4D8066', '#809980'
                                ],
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }

            })
        }

        function chartYear() {
            var ctx = document.getElementById("myAreaChart").getContext('2d');
            $.ajax({
                url: "{{ route('chartYear') }}",
                method: "get",
                success: function(response) {
                    var counts = response.map(function(item) {
                        return item.count;
                    });
                    var year = response.map(function(item) {
                        return item.year;
                    })
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: year,
                            datasets: [{
                                label: 'bài viết',
                                data: counts,
                                backgroundColor: ['#66664D', '#991AFF', '#E666FF', '#4DB3FF',
                                    '#1AB399','#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
                                    '#4D8066', '#809980'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }
            })
        }

        function getMonthsOfYear(year) {
            const months = [];
            for (let month = 1; month <= 12; month++) {
                const formattedMonth = month < 10 ? `0${month}` : month;
                const formattedDate = `${formattedMonth}/${year}`;
                months.push(formattedDate);
            }
            return months;
        }
    </script>
</body>

</html>
