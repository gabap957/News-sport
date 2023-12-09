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
                <h5 class="m-0 font-weight-bold text-primary">Các loại tin tức</h5>
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
                        <th>Tên loại tin</th>
                        <th>Số lượng bài viết</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($list as $index =>$item)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>
                                <div>{{$item->name}}</div>
                            </td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                <button array="{{$item}}" id="{{$item->id}}" class="editType button-33"
                                        style="color: white; background-color: #e0a800">Sửa</button>
                                <a class="button-33" onclick="return confirm('bạn có muốn xóa?')"
                                   href="{{route('admin.type.delete',['id'=>$item->id])}}"
                                   style="color: white; background-color: red">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalinsert">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.type.add')}}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <legend>Thêm Loại tin tức</legend>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên</label> <span id="errorname"></span>
                            <input type="text" class="form-control" id="name" name="name" value="" Required />
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng bài viết</label> <span id="errorname"></span>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="" Required />
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


    <div class="modal fade" id="modaleditType">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.type.edit')}}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <legend>Sửa loại tin tức</legend>
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
                            <label for="">Số lượng bài viết:</label> <span id="errorurl"></span>
                            <input type="text" class="form-control" id="equantity" name="quantity" value="" onblur="checkurl()" ;
                                   Required />
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
