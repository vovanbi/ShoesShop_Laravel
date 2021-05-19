@extends('layouts.app')
@section('content')
    <style>
        .article_content h2{
            font-size: 1.4rem;
        }
        .article_content{
            font-family: Roboto,Sans-Serif;
        }
    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('home') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="{{ route('get.list.article') }}" title="Bài viết">Bài viết</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{ $articleDetail->a_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="article_content" style="margin-bottom: 20px">
                        <h1 style="text-align: center">{{ $articleDetail->a_name }}</h1>
                        <img src="{{ asset(pare_url_file($articleDetail->a_avatar)) }}" alt="" style="width: 600px;height: auto;display: block;margin: 0 auto;">
                        <div>
                            {!! $articleDetail->a_content !!}
                        </div>
                    </div>
                    <h4>Bài viết khác</h4>
                    @include('components.article')
                </div>
                <div class="col-sm-3">
                    <h5>Bài viết nổi bật</h5>
                    <div class="list_article_hot">
                        @include('components.article_hot')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


