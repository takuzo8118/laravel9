@extends('adminlte::page')

@section('title', '投稿一覧')

@section('content_header')
    <h1>ダッシュボード</h1>
@stop

@section('content')
<div class="container text-center">
    <ul>
        <li class=""><a href="#">投稿1</a></li>
        <li class=""><a href="#">投稿2</a></li>
        <li class=""><a href="#">投稿3</a></li>
    </ul>
</div>
@stop

@section('css')
    <style>
        ul li {
            list-style: none;
        }
    </style>
    {{-- ページごとCSSの指定
    <link rel="stylesheet" href="/css/xxx.css">
    --}}
@stop
