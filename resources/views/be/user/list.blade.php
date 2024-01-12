@extends('be.layout')
@section('content')
    <div class="card shadow mb-4 min-height-card">
        <div class="card-header card-header-flex py-3">
            <div>
                <h5 class="m-0 font-weight-bold text-primary">Chuyên mục bài viết</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive col-12 mx-auto">
                <table class="table table-bordered table-hover" id="dataTable">
                    <thead class="table">
                        <tr>
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Vai trò</th>
                            <th class="col-2 text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td><?php if($item->level == 1) echo "Admin"; else echo "Người dùng"?>
                                </td>
                                <td class="text-center">
                                    <button array="{{ $item }}" id="{{ $item->id }}"
                                        class="btnedituser btn btn-warning">Sửa</button>
                                    <a class="btn btn-danger" onclick="return confirm('bạn có muốn xóa?')"
                                        href="{{ route('admin.user.delete', ['id' => $item->id]) }}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalupdate">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.user.edit') }}" method="post" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <legend>Phân quyền người dùng</legend>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" class="form-control" id="eid" name="id" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="">Tên</label> <span id="errorname"></span>
                            <input type="text" class="form-control" id="ename" name="name" disabled/>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label> <span id="erroremail"></span>
                            <input type="text" class="form-control" id="eemail" name="email" value=""disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Phân quyền</label> <span id="erroremail"></span>
                            <select class="form-control" name="level" size="1" onfocus="this.size =3">
                                <option value="1">Admin</option>
                                <option value="2">Người dùng</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="insert" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
