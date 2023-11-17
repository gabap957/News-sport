@extends('be.layout')
@section('content')
<div class="card shadow mb-4 min-vh-100">
    <div class="card-header py-3"> <div> <h5 class="m-0 font-weight-bold text-primary">Bài Viết</h5>
        </div> <div> <button class="button-33" data-toggle="modal" data-target="#modalinsert" style="color: green;
            background-color: #c2fbd7;" role="button">Thêm</button> </div> </div>
        <div class="card-body"> <div class="table-responsive"> <table class="table table-bordered" id="dataTable"
            width="100%" cellspacing="0">
            <thead>
            <tr>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Nội dung</th>
            <th>Tiêu đề</th>
            <th>Ngày đăng</th>
            <th>Danh mục</th>
            <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach($list as $item)
                <tr>
                <td><img style="width: 100px; height: 100px;" src="{{asset($item->image->path_url)}}"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->category->name}}</td>
                <td>
                <button array="{{$item}}" id="{{$item->id}}" class="edituser btn btn-warning">Sửa</button>
                <a class="btn btn-danger">Xóa</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalinsert">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('admin.post.add')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <legend>Thêm Bài Viết</legend>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Ảnh</label> <span id="errorimage"></span><br>
                        <div class="border p-3">
                            <input type="file" id="image_id" name="image_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tên</label> <span id="errorname"></span>
                        <input type="text" class="form-control" id="name" name="name" value="" onblur="checkname();"
                            Required />
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung</label> <span id="errordes"></span>
                        <input type="text" class="form-control" id="description" name="description" value=""
                            onblur="checkurl()" ; Required />
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề</label> <span id="errortitle"></span>
                        <input type="text" class="form-control" id="title" name="title" value="" onblur="checkname();"
                            Required />
                    </div>
                    <div class="form-group">
                        <label for="">Chọn danh mục</label> <span id="errortitle"></span><br>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Danh mục</option>
                            @foreach($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="category_id" name="category_id" value="{{$item->id}}">
                    </div>
                    <?php
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    ?>
                    <input type="hidden" id="created_at" name="created_at" value="{{$date}}">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="insert" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection