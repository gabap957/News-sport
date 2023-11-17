@extends('be.layout')
@section('content')
    <div class="card shadow mb-4 min-height-card">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">DataTables Example</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Đường dẫn</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- @foreach($list as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->cate_url}}</td>
                            <td>
                                <button array="{{$item}}" id="{{$item->id}}" class="edituser btn btn-warning">Sửa</button>
                                <a class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
