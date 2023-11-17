@extends('be.layout')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('adminlte/css/album.css')}}">
</head>
<div class="card shadow mb-4 min-height-card">
    <div class="card-header py-3">
        <div>
            <h5 class="m-0 font-weight-bold text-primary">Kho ảnh</h5>
        </div>
        <div>
            <button class="button-33" data-toggle="modal" data-target="#modalinsert"
                style="color: green; background-color: #c2fbd7;" role="button">Thêm</button>
        </div>
    </div>
    <div class="card-body">
        <div class="row mt-3 px-3 align-items-center">
            @foreach($list as $item)
            <div class="col-2 text-center box-album p-4"
                onclick="window.location='{{ URL::route('admin.image.list')}}'">
                <div class="backgroud-album p-1">
                    <div class="box-album-image">
                        <div class="img-folder"><img src="https://img.icons8.com/3d-fluency/94/folder-invoices--v1.png"
                                alt="folder-invoices--v1" />
                        </div>
                    </div>
                    <div class="title-album">
                        {{$item->name}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div></div>
    </div>
</div>
<div class="modal fade" id="modalinsert">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('admin.album.add')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <legend>Thêm Thư mục</legend>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tên thư mục:</label> <span id="errorname"></span>
                        <input type="text" class="form-control" id="name" name="name" value="" onblur="checkname();"
                            Required />
                    </div>
                    <div class="form-group">
                        <label for="">Chọn danh mục</label> <span id="errortitle"></span><br>
                        <select class="form-select" name="cate_id" aria-label="Default select example">
                            <option selected>Danh mục</option>
                            @foreach($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
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