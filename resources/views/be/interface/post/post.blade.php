@extends('be.layout')
@section('content')
<div class="card shadow mb-4 min-vh-100">
    <div class="card-header py-3">
        <div>
            <h5 class="m-0 font-weight-bold text-primary">Bài Viết</h5>
        </div>
        <div>
            <a class="button-33" href="{{route('admin.post.doadd')}}" style="color: green;
            background-color: #c2fbd7;" role="button">Thêm</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="col-1">Ảnh</th>
                        <th class="col-2">Tên Bài Viết</th>
                        <th class="col-3">Nội dung</th>
                        <th class="col-1">Tiêu đề</th>
                        <th class="col-1">Ngày đăng</th>
                        <th class="col-1">Danh mục</th>
                        <th class="col-1">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                    <tr>
                        <td><img style="width: 200px; height: 120px" src="{{asset($item->image->path_url)}}"></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->content}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>
                            <a array="{{$item}}" id="{{$item->id}}" href="{{route('admin.post.doedit',['id'=>$item->id])}}" class=" btn btn-warning">Sửa</a>
                            <a class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection