@extends('be.layout')
@section('content')
<head>
    <link href="{{asset('/adminlte/css/post-add.css')}}" rel="stylesheet">
</head>

<div class="card shadow mb-4 min-height-card">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Thêm Bài Viết</h5>
    </div>
    <div class="card-body">
        <form action="{{route('admin.post.add')}}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            <div class="">
                <div class="row">
                    <div class=col-8>
                        <div class="form-group">
                            <label for="">Tên Bài Viết</label> <span id="errorname"></span>
                            <textarea type="text" class="form-control" rows="3" cols="70" id="name" name="name" value=""
                               Required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Tiêu đề</label> <span id="errortitle"></span>
                            <textarea  class="form-control" id="editortitle" name="title"></textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group update_box">
                            <label>Ảnh bìa</label>
                            <div class="text-input">
                                <div class="image borderInput p-0">
                                    <img src="" id="image_id" alt="" appHideMissing>
                                </div>
                                <input class="p-1 p-md-2 w-100 border" id="image-upload" name="image_id" accept="image/png, image/jpeg"
                                    type="file" value="select">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label> <span id="errordes"></span>
                    <textarea id="editor" class="form-control" name="content"></textarea>
                </div>
                <div class="form-group">
                   <div class="d-flex">
                   <div class="box2">
                   <label for="">Chọn danh mục</label> <span id="errortitle"></span><br>
                   <select class="form-control" name="category_id" size="1" onfocus="this.size = 8"
                            onchange="this.blur()" onblur="this.size = 1; this.blur()">
                            <option class="hover" selected disable>Danh mục</option>
                        @foreach($categories as $item)
                        <option class="hover" value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                   </div>
                    <div class="box2">
                    <label for="">Chọn loại tin tức</label> <span id="errortitle"></span><br>
                    <select class="form-control" name="type_id" size="1" onfocus="this.size = 8"
                            onchange="this.blur()" onblur="this.size = 1; this.blur()">
                        @foreach($type as $key => $item)
                        <option
                        <?php
                        if ($key == 0) {
                            echo "selected";
                        }
                        ?>
                        value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    </div>
                   </div>
                </div>
                <?php
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    ?>
                <input type="hidden" id="created_at" name="created_at" value="{{$date}}">
            </div>

            <div class="modal-footer">
                <div class="mx-auto">
                    <button type="submit" name="insert" class="btn btn-primary">Thêm</button>
                    <a type="submit" name="insert" href="{{route('admin.post.list')}}" class="btn btn-secondary">Đóng</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
