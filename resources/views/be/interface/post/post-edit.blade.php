@extends('be.layout')
@section('content')

<head>
    <link href="{{asset('/adminlte/css/post-add.css')}}" rel="stylesheet">
</head>

<div class="card shadow mb-4 min-height-card">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Sửa Bài Viết</h5>
    </div>
    <div class="card-body">
        <form action="{{route('admin.post.edit')}}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            <div class="">
                <div class="row">
                    <div class="form-group d-none">
                        <label for="">ID</label> <span id="eid"></span>
                        <input type="text" class="form-control" id="id" name="id" value="{{$list->id}}" readonly />
                        <label for="">IDimage</label> <span id="eid"></span>
                        <input type="text" class="form-control" name="image_id" value="{{$list->image_id}}" readonly />
                    </div>
                    <div class=col-6>
                        <div class="form-group">
                            <label for="">Tên Bài Viết</label> <span id="errorname"></span>
                            <textarea type="text" class="form-control" rows="4" cols="70" id="name" name="name" value=""
                                onblur="checkname();" Required>{{$list->name}}</textarea>
                        </div>
                        <div class="form-group ">
                            <label for="">Tiêu đề</label> <span id="errortitle"></span>
                            <textarea type="text" class="form-control" rows="4" cols="70" id="title" name="title"
                                value="" onblur="checkname();" Required>{{$list->title}}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group update_box">
                            <label>Ảnh bìa</label>
                            <div class="text-input">
                                <div class="image borderInput p-0">
                                    <img src="{{asset($list->image->path_url)}}" id="image_id" alt="" appHideMissing>
                                </div>
                                <input class="p-1 p-md-2 w-100 border" id="image-upload" name="image-upload"
                                    accept="image/png, image/jpeg" type="file" value="select">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label> <span id="errordes"></span>
                    <textarea id="editor" class="form-control" name="content">{{$list->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Chọn danh mục</label> <span id="errortitle"></span><br>
                    <select class="selectpicker p-2" id="category_id" name="category_id" data-style="btn-primary"
                        data-size="6">
                        @foreach($categories as $category)
                        <option <?php if ($category->id == $list->category_id) {
                            echo "selected=selected";
                            } ?> value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <?php
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    ?>
                <input type="hidden" id="updated_at" name="updated_at" value="{{$date}}">
            </div>

            <div class="modal-footer">
                <div class="mx-auto">
                    <button type="submit" name="insert" class="btn btn-primary">Sửa</button>
                    <a type="submit" name="insert" href="{{route('admin.post.list')}}"
                        class="btn btn-secondary">Đóng</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection