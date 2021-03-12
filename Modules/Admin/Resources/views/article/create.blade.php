@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li><a href="{{ route('admin.get.list.article') }}">Bài viết</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            @include('admin::article.form')
        </div>
    </div>
@stop
