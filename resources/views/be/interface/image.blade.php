@extends('be.layout')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('adminlte/css/image.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<div class="card shadow mb-4 min-height-card">
    <div class="card-header py-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.album.list')}}">
                        <h5 class="m-0 font-weight-bold text-primary">Kho ảnh</h5>
                    </a></li>
                <li class="breadcrumb-item"><a class="text-primary">{{$albumname}}</a></li>
            </ul>
        </div>
        <div>
            <button class="button-33" style="color: green; background-color: #c2fbd7;" data-toggle="modal"
                data-target="#modalinsert" role="button">Thêm</button>
        </div>
    </div>
    <div class="card-body ">
        <div class="row">
            @foreach($list as $item)
            <div class="card mr-2" style="width: 15rem;">
                <img src="{{asset($item->path_url)}}" class="card-img-top" alt="$item->name">
                <div class="card-body">
                    <div>
                        <h5 class="card-title showname" title="{{$item->name}}" id="{{$item->id}}">{{$item->name}}</h5>
                    </div>
                    <div>
                        <button class="btn btn-primary editimage" array="{{$item}}" >Sửa</button>
                        <a href="{{route('admin.image.delete', $item->id)}}" class="btn btn-danger">Xóa</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="modal fade" id="modalinsert">
    <div class="modal-dialog modal-lg">
        <form action="{{route('admin.image.add')}}" class="uploader" method="post" role="form"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Thêm ảnh mới</h2>
                </div>
                <div class="mt-1 ml-3">
                    <select class="selectpicker p-2" data-style="btn-primary" data-size="6">
                    @foreach($category as $item)
                        <option class="" selected disable>Danh mục</option>
                        <option name="category_id" <?php if ($item->id == $albumId->category_id) {
                            echo "selected=selected";
                            } ?>
                         id="category_id" value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" id="category_id" name="category_id" value="{{$item->id}}">
                </div>
                <div class="modal-body mx-auto">
                    <!-- Upload  -->
                    <legend id="file-upload-form">
                        <input id="file-upload" type="file" name="image_id" accept="image/*" />
                        <label for="file-upload" id="file-drag">
                            <img id="file-image" src="" alt="Preview" class="hidden">
                            <div id="start">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                <div>Select a file or drag here</div>
                                <div id="notimage" class="hidden">Please select an image</div>
                                <span id="file-upload-btn" class="btn btn-primary">Chọn ảnh</span>
                            </div>
                        </label>
                    </legend>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="insert" onclick="reload();" class="btn btn-primary">Thêm</button>
                    <script>
                        function reload() {
                            location.reload();
                        }
                    </script>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="modalupdate">
    <div class="modal-dialog modal-lg">
        <form action="{{route('admin.image.edit')}}" class="uploader" method="post" role="form"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Sửa đổi hình ảnh</h2>
                </div>
                <div class="mt-1 ml-3">
                    <select class="selectpicker p-2" data-style="btn-primary" data-size="6">
                    @foreach($category as $item)
                        <option class="" selected disable>Danh mục</option>
                        <option name="category_id" <?php if ($item->id == $albumId->category_id) {
                            echo "selected=selected";
                            } ?>
                         id="category_id" value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" id="category_id" name="category_id" value="{{$item->id}}">
                </div>
                <div class="modal-body mx-auto">
                    <!-- Upload  -->
                    <legend id="file-upload-form">
                        <input id="file-upload" type="file" name="image_id" accept="image/*" />
                        <label for="file-upload" id="file-drag">
                            <img id="file-image" src="" alt="Preview" class="hidden">
                            <div id="start">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                <div>Select a file or drag here</div>
                                <div id="notimage" class="hidden">Please select an image</div>
                                <span id="file-upload-btn" class="btn btn-primary">Chọn ảnh</span>
                            </div>
                        </label>
                    </legend>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="insert" onclick="reload();" class="btn btn-primary">Thêm</button>
                    <script>
                        function reload() {
                            location.reload();
                        }
                    </script>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection