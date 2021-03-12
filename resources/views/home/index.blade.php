@extends('layouts.app')
@section('content')
    <!-- header area end -->
    @include('components.slide')
    <style>
        .active{
            color: #ff9705 !important;
        }
    </style>
    <!-- product section start -->
    @if (isset($productHot))
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            <!-- single-product start -->
                            @foreach($productHot as $proHot)
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        @if($proHot->pro_number == 0)
                                        <span class="pro-number">Tạm hết hàng</span>
                                        @endif
                                        @if($proHot->pro_sale>0)
                                        <span class="pro-sale">{{ $proHot->pro_sale }}%</span>
                                        @endif
                                        <a href="{{ route('get.detail.product',[$proHot->pro_slug,$proHot->id]) }}">
                                            <img class="primary-image" src="{{ asset(pare_url_file($proHot->pro_avatar)) }}" alt=""/>
                                            <img class="secondary-image" src="{{ asset(pare_url_file($proHot->pro_avatar)) }}" alt=""/>
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="{{ route('get.detail.product',[$proHot->pro_slug,$proHot->id]) }}" title="Xem sản phẩm"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <!-- <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div> -->
                                                    <div class="compare-button">
                                                        <a href="{{ route('add.shopping.cart',$proHot->id) }}" title="Thêm giỏ hàng"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <!-- <div class="quickviewbtn">
                                                    <a href="{{ route('get.detail.product',[$proHot->pro_slug,$proHot->id]) }}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            @if($proHot->pro_sale==0)
                                            <span class="new-price">{{ number_format($proHot->pro_price,0,',','.') }} đ</span>
                                            @else
                                            <span class="new-price1">{{ number_format($proHot->pro_price,0,',','.') }} đ</span><span class="new-price-sale">{{ number_format($proHot->pro_price*(100-$proHot->pro_sale)/100,0,',','.') }} đ</span>
                                            @endif                                         
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">{{ $proHot->pro_name }}</a></h2>
                                        <p>{{ $proHot->pro_description }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
    @endif
    @include('components.product_suggest')
    <!-- product section end -->
    <!-- latestpost area start -->
    @if (isset($articleNews))
    <div class="latest-post-area">
        <div class="container">
            <div class="area-title">
                <h2>Bài viết mới</h2>
            </div>
            <div class="row">
                <div class="all-singlepost">
                    <!-- single latestpost start -->
                    @foreach($articleNews as $arNew)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-post">
                            <div class="post-thumb">
                                <a href="{{ route('get.detail.article',[$arNew->a_slug,$arNew->id]) }}">
                                    <img src="{{ asset(pare_url_file($arNew->a_avatar)) }}" alt="" style="height: 280px;"/>
                                </a>
                            </div>
                            <div class="post-thumb-info">
                                <div class="postexcerpt">
                                    <a href="{{ route('get.detail.article',[$arNew->a_slug,$arNew->id]) }}"><p style="height: 40px; font-size: 14px; font-weight: bold">{{ $arNew->a_name }}</p></a>
                                    <a href="{{ route('get.detail.article',[$arNew->a_slug,$arNew->id]) }}" class="read-more">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- single latestpost end -->
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- latestpost area end -->
    <!-- block category area start -->
    <div class="block-category">
        <div class="container">
            <div class="row">
                @if(isset($categoriesHome))
                    @foreach($categoriesHome as $categorieHome)
                        <!-- featured block start -->
                        <div class="col-md-4">
                            <!-- block title start -->
                            <div class="block-title">
                                <a href="{{ route('get.list.product',[$categorieHome->c_slug,$categorieHome->id]) }}"><h2>{{ $categorieHome->c_name }}</h2></a>
                            </div>
                            <!-- block title end -->
                            <!-- block carousel start -->
                            @if(isset($categorieHome->products))
                            <div class="block-carousel">
                                    @foreach($categorieHome->products as $product)
                                    <?php
                                    $ageDetail = 0;
                                    if($product->pro_total_rating)
                                    {
                                        $ageDetail = round($product->pro_total_number / $product->pro_total_rating,2);
                                    }
                                    ?>
                                        <div class="block-content">
                                            <!-- single block start -->
                                            <div class="single-block">
                                                <div class="block-image pull-left">
                                                    <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}"><img src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" style="width: 170px;height: 208px"/></a>
                                                </div>
                                                <div class="category-info">
                                                    <h3><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h3>
                                                    <p>{{ $product->pro_description }}</p>
                                                    @if($product->pro_sale==0)
                                                    <div class="cat-price">{{ number_format($product->pro_price,0,',','.') }} đ</div>
                                                    @else
                                                    <div class="cat-price">{{ number_format($product->pro_price*(100-$product->pro_sale)/100,0,',','.') }} đ<span class="old-price">{{ number_format($product->pro_price,0,',','.') }} đ</span></div>
                                                    @endif
                                                    <div class="cat-rating">
                                                        @for($i = 1;$i <=5; $i++)
                                                            <i class="fa fa-star {{ $i <= $ageDetail ? 'active' : '' }}" style="color: #999"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single block end -->
                                        </div>
                                    @endforeach
                            </div>
                            @endif
                            <!-- block carousel end -->
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- block category area end -->
    <!-- testimonial area start -->
    <div class="testimonial-area lap-ruffel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="crusial-carousel">
                        <div class="crusial-content">
                            <p>“Hãy mang những giấc mơ của bạn lên đôi chân để dẫn lối giấc mơ đó thành hiện thực."</p>
                            <span>-- ShoesShop --</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Bạn sẽ khó có nhiều thời gian để chăm chút cho sự lựa chọn giầy dép. Có quá nhiều phụ nữ nghĩ rằng giầy dép không quan trọng, nhưng toàn bộ sự tinh tế của phụ nữ toát ra chính từ đôi chân."</p>
                            <span>-- Christian Dior --</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Tôi dành phần lớn thời gian của mình khoác lên những thứ bất tiện, vì vậy tôi chỉ nghĩ đến những đôi giầy thể thao."</p>
                            <span>-– Cara Delevingne --</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
    <!-- Brand Logo Area Start -->
    <!-- Brand Logo Area End -->
    <!-- FOOTER START -->
@stop
