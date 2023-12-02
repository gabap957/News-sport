@extends('fe.layout.layout')
@section('content_web')
<head>
    <link href="{{asset('/homelte/css/home.css')}}" rel="stylesheet">
</head>
<div class="container d-flex my-4">
    <div class="home-left col-3">
        <div class="home-title">
            <a style="color: red">Tin nóng</a>
        </div>
        @foreach($post as $item)
        <div class="home-content">
            <a href="#">{{$item->name}}</a>
        </div>
        @endforeach
    </div>
    <div class="home-center col-6" >â</div>
    <div class="home-right col-3">a</div>
</div>
@endsection