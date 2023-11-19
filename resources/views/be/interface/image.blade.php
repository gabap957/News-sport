@extends('be.layout')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('adminlte/css/image.css')}}">
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
            <button class="button-33" data-toggle="modal" data-target="#modalinsert"
                style="color: green; background-color: #c2fbd7;" role="button">Thêm</button>
        </div>
    </div>
    <div class="card-body ">
        <div class="row">
            @foreach($list as $item)
            <div class="card mr-2" style="width: 18rem;">
                <img src="{{asset($item->path_url)}}" class="card-img-top" alt="$item->name">
                <div class="card-body">
                    <div>
                        <h5 class="card-title" title="{{$item->name}}" id="nameimage">{{$item->name}}</h5>
                        <script>
                            const nameImage = document.getElementById('nameimage');
                            var isRed = true;
                            nameImage.setAttribute('style', 'text-overflow: ellipsis;overflow: hidden ; white-space: nowrap;');
                            nameImage.addEventListener('click', function () {
                                isRed = !isRed;
                                if (!isRed) {
                                    nameImage.setAttribute('style', 'text-overflow: unset;overflow: unset ; white-space: unset;');
                                } else {
                                    nameImage.setAttribute('style', 'text-overflow: ellipsis;overflow: hidden ; white-space: nowrap;');
                                }
                            });
                        </script>
                    </div>
                    <div>
                        <a href="#" class="btn btn-primary">Sửa</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection