@extends('be.layout')
@section('content')
    <div class="container-fluid min-height-card">


        <!-- Content Row -->
        <div class="row ">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Lượt truy cập (Tháng {{ $month }}) </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">30.000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Bài viết (Tháng {{ $month }})</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($postMonth) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Người dùng mới (tháng
                                    {{ $month }})
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($userMonth) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng doanh Thu
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18.000.000 vnd</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tổng Quan Về Số Lượng Bài Viết</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">
                                    THÔNG KÊ:</div>
                                <a class="dropdown-item" onclick="chartYear()" style="cursor: pointer">Theo các năm</a>
                                <a class="dropdown-item" onclick="chartMonth({{ $year }})" style="cursor: pointer">Năm
                                    {{ $year }}</a>
                                <a class="dropdown-item" onclick="chartMonth({{ $year - 1 }})" style="cursor: pointer">Năm
                                    {{ $year - 1 }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart" width="1036" height="320"
                                style="display: block; width: 1036px; height: 320px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">S.L Bài Viết Theo Từng Thể Loại Tháng
                            {{ $month }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart" width="500" height="300"
                                style="display: block; width: 1036px; height: 320px;"
                                class="chartjs-render-monitor"></canvas>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Xếp Hạng Bài Viết Phổ Biến Trong Tháng
                            {{ $month }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-1">Ảnh bìa</th>
                                        <th class="col-2">Tên bài viết</th>
                                        <th class="col-1">Danh mục</th>
                                        <th class="col-1">Tác giả</th>
                                        <th class="col-1">Lượt xem</th>
                                        <th class="col-1">Loại tin tức</th>
                                        <th class="col-1">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postMostView as $item)
                                        <tr>
                                            <td class="text-center">
                                                <img style="width: auto; height: 120px;border: 1px solid;object-fit: contain;"
                                                    src="{{ asset($item->image->path_url) }}">
                                            </td>
                                            <td class="text-center">
                                                <div class="mx-auto">
                                                    {{ $item->name }}
                                                </div>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                {{ $item->category->name }}</td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                {{ $item->user->name }}</td>
                                            <td class="text-center" style="vertical-align: middle;">{{ $item->view }}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                {{ $item->type->name }}</td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <a array="{{ $item }}" id="{{ $item->id }}"
                                                    href="{{ route('admin.post.doedit', ['id' => $item->id]) }}"
                                                    class=" btn btn-warning">Sửa</a>
                                                <a class="btn btn-danger" onclick="return confirm('bạn có muốn xóa?')"
                                                    href="{{ route('admin.post.delete', ['id' => $item->id]) }}">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
