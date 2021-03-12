@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
            <li class="active">Cập nhật</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            @include('admin::product.form')
        </div>
    </div>
@stop
