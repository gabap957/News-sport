@extends('be.layout')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('adminlte/css/album.css')}}">
</head>
<div class="card shadow mb-4 min-height-card">
    <div class="card-header py-3">
        <div>
        <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.album.list')}}">
                        <h5 class="m-0 font-weight-bold text-primary">Kho ảnh</h5>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-primary">{{$albumByid->name}}</a>
                </li>
            </ul>
        </div>
        <div class="d-none">
            <button class="button-33" data-toggle="modal" data-target="#modalinsert"
                style="color: green; background-color: #c2fbd7;" role="button">Thêm</button>
        </div>
    </div>
    <div class="card-body">
        <div class="row mt-3 px-3 align-items-center">
            @foreach($list as $item)
            <div class="col-2 text-center box-album p-4"
                onclick="window.location='{{ URL::route('admin.image.list', ['id' => $item->id])}}'">
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
@endsection