@extends('be.layout')
@section('content')
<head>
    <link href="{{asset('/adminlte/css/post.css')}}" rel="stylesheet">
</head>
<div class="card shadow mb-4  min-height-card">
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
                    <tr class="text-center">
                        <th class="col-1">Ảnh bìa</th>
                        <th class="col-2">Tên Bài Viết</th>
                        <th class="col-1">Tiêu đề</th>
                        <th class="col-1">Ngày đăng</th>
                        <th class="col-1">Danh mục</th>
                        <th class="col-1">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                    <tr>
                        <td class="text-center">
                            <img style="width: auto; height: 120px"
                        src="
                        <?php
                            if($item->image_id){
                                $url = asset($item->image->path_url);
                                echo($url);
                            }
                            else{
                                echo(asset('/img/default.jpg'));
                            }
                        ?>
                        ">
                        </td>
                        <td class="text-center">
                            <div class="mx-auto">
                            {{$item->name}}
                            </div>
                        </td>
                        <td>
                            <div class="title mx-auto">
                            <?php
                            echo($item->title)
                            ?>
                            </div>
                        </td>
                        <td class="text-center">{{$item->created_at}}</td>
                        <td class="text-center">{{$item->category->name}}</td>
                        <td class="text-center">
                            <a array="{{$item}}" id="{{$item->id}}" href="{{route('admin.post.doedit',['id'=>$item->id])}}" class=" btn btn-warning">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('bạn có muốn xóa?')" href="{{route('admin.post.delete',['id'=>$item->id])}}">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
