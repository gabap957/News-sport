@extends('be.layout')
@section('content')
<?php
use App\Models\category;
?>

<head>
    <link href="">
</head>
<div class="card shadow mb-4 min-height-card">
    <div class="card-header card-header-flex py-3">
        <div>
                <h5 class="m-0 font-weight-bold text-primary">Chuyên mục bài viết</h5>
            </div>
        <div>
            <button class="button-33" data-toggle="modal" data-target="#modalinsert"
                style="color: green; background-color: #c2fbd7;" role="button">Thêm</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive col-8 mx-auto">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>STT</th>
                        <th>Tên nhánh chính</th>
                        <th>Tên nhánh con</th>
                        <th>Đường dẫn</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($list as $index =>$item)
                    <?php
                            $arrayData = category::where('parent_id',$item->id)->get();
                            $count = count($arrayData);
                    ?>
                    <tr>
                        <td rowspan="{{$count+1}}" style="vertical-align: middle">{{$index+1}}</td>
                        <td rowspan="{{$count+1}}" style="vertical-align: middle">
                            <div>{{$item->name}}</div>
                        </td>
                        <td > </td>
                        <td>{{$item->cate_url}}</td>
                        <td>
                            <button array="{{$item}}" id="{{$item->id}}" class="editcategory button-33"
                                style="color: white; background-color: #e0a800">Sửa</button>
                            <a class="button-33" onclick="return confirm('bạn có muốn xóa?')"
                                href="{{route('admin.category.delete',['id'=>$item->id])}}"
                                style="color: white; background-color: red">Xóa</a>
                        </td>
                    </tr>
                    @if($count>0)
                    @foreach($arrayData as $key => $value)
                    <tr class="tr-{{$value['id']}} ml-5">
                        <td class="text-center" >
                            <div>{{$value->name}}</div>
                        </td>
                        <td class="text-center">
                            {{$value->cate_url}}
                        </td>
                        <td class="text-center">
                            <button array='{{$value}}' id="{{$value['id']}}" class="editcategory button-33"
                                style="color: white; background-color: #e0a800">Sửa</button>
                            <a class="button-33" onclick="return confirm('bạn có muốn xóa?')"
                                href="{{route('admin.category.delete',['id'=>$value['id']])}}"
                                style="color: white; background-color: red">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalinsert">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.category.add')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <legend>Thêm thông tin Chuyên mục</legend>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tên</label> <span id="errorname"></span>
                        <input type="text" class="form-control" id="name" name="name" value="" Required />
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ URL:</label> <span id="errorurl"></span>
                        <input type="text" class="form-control" id="url" name="cate_url" value="" ; Required />
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh mục cha:</label>
                        <div class="box">
                            <select class="form-control " name="parent_id" size="1" onfocus="this.size = 8"
                                onchange="this.blur()" onblur="this.size = 1; this.blur()">
                                <option class="hover" value="0">Danh mục cha</option>
                                @foreach($list as $item)
                                @if($item->parent_id ==null)
                                <option class="hover" value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="insert" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modaleditCategory">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.category.edit')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <legend>Sửa thông tin Chuyên mục</legend>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="text" class="form-control" id="eid" name="id" readonly="">
                    </div>

                    <div class="form-group">
                        <label for="">Tên</label> <span id="errorname"></span>
                        <input type="text" class="form-control" id="ename" name="name" value="" onblur="checkname()" ;
                            Required />
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ URL:</label> <span id="errorurl"></span>
                        <input type="text" class="form-control" id="eurl" name="cate_url" value="" onblur="checkurl()" ;
                            Required />
                    </div>
                    <div class="form-group box mb-5">
                        <label for="">Danh mục cha:</label>
                        <select id="eparent_id" class="form-control" name="parent_id" size="1" onfocus="this.size = 8"
                            onchange="this.blur()" onblur="this.size = 1; this.blur()">
                            <option class="hover" value="0">Trống</option>
                            @foreach($list as $item)
                            @if($item->parent_id ==null)
                            <option class="hover" value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="insert" class="editcategory btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
