@extends('be.layout')
@section('content')
    <head>
        <link href="">
    </head>
    <div class="card shadow mb-4">
        <div class="card-header card-header-flex py-3">
            <div>
            <h6 class="m-0 font-weight-bold text-primary">Chuyên mục</h6>
            </div>
            <div>
                <button class="button-33" style="color: green; background-color: #c2fbd7;" role="button">Thêm</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Đường dẫn</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->cate_url}}</td>
                            <td>
                                <button array="{{$item}}" id="{{$item->id}}" class="edituser button-33"
                                        style="color: white; background-color: #e0a800">Sửa</button>
                                <a class="button-33" style="color: white; background-color: red">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
