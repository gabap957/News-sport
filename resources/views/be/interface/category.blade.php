@extends('be.layout')
@section('content')
    <head>
        <link href="">
    </head>
    <div class="card shadow mb-4 min-height-card">
        <div class="card-header card-header-flex py-3">
            <div>
            <h5 class="m-0 font-weight-bold text-primary">Chuyên mục</h5>
            </div>
            <div>
                <button class="button-33" data-toggle="modal" data-target="#modalinsert" style="color: green; background-color: #c2fbd7;" role="button">Thêm</button>
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
                                <button array="{{$item}}" id="{{$item->id}}" data-toggle="modal" data-target="#modaledit"
                                class="editcategory button-33" style="color: white; background-color: #e0a800">Sửa</button>
                                <a class="button-33" onclick="return confirm('bạn có muốn xóa?')" href="{{route('admin.category.delete',['id'=>$item->id])}}" style="color: white; background-color: red">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalinsert" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('admin.category.add')}}"  method="post"   role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <legend>Thêm thông tin Chuyên mục</legend>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Tên</label> <span id="errorname"></span>
                                <input type="text" class="form-control"  id="name" name="name"   value="" onblur="checkname();" Required />
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ URL:</label> <span id="errorurl"></span>
                                <input type="text" class="form-control"  id="url" name="cate_url"  value="" onblur="checkurl()"; Required />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit"  name="insert" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modaledit" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('admin.category.edit')}}"  method="post"   role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <legend>Sửa thông tin Chuyên mục</legend>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">ID</label>
                                <input type="text" class="form-control"  id="eid" name="id" readonly="">
                            </div>

                            <div class="form-group">
                                <label for="">Tên</label> <span id="errorname"></span>
                                <input type="text" class="form-control"  id="ename" name="name"   value="" onblur="checkname()"; Required />
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ URL:</label> <span id="errorurl"></span>
                                <input type="text" class="form-control"  id="eurl" name="cate_url"   value="" onblur="checkurl()"; Required />
                            </div>
                            <option value=""></option>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit"  name="insert" class="editcategory btn btn-primary">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
