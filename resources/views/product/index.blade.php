@extends('layouts.app')
@section('content')
    <style>
        .sidebar-content .active{
            color: #c2a476;
        }
    </style>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('home') }}">Trang chủ </a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            @if (isset($cateProduct->c_name)) 
                            <li class="category3"><span>{{ $cateProduct->c_name }}</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- shop-with-sidebar Start -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
                                <h2>Lọc sản phẩm</h2>
                            </div>
                        </aside>
                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Khoảng giá</h6>
                            </div>
                            <ul>
                                <li><a class="{{ Request::get('price') == 1 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price'=>1]) }}">Dưới 1.000.000 đ</a></li>
                                <li><a class="{{ Request::get('price') == 2 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price'=>2]) }}">1.000.000 - 3.000.000 đ</a></li>
                                <li><a class="{{ Request::get('price') == 3 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price'=>3]) }}">3.000.000 - 5.000.000 đ</a></li>
                                <li><a class="{{ Request::get('price') == 4 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price'=>4]) }}">5.000.000 - 7.000.000 đ</a></li>
                                <li><a class="{{ Request::get('price') == 5 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price'=>5]) }}">7.000.000 - 10.000.000 đ</a></li>
                                <li><a class="{{ Request::get('price') == 6 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price'=>6]) }}">Trên 10.000.000 đ</a></li>

                            </ul>
                        </aside>
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
                                <h2>Tags</h2>
                            </div>
                            <div class="exp-tags">
                                <div class="tags">
                                    @if (isset($categories))
                                        @foreach($categories as $cate)
                                            <a href="{{ route('get.list.product',[$cate->c_slug,$cate->id]) }}">{{ $cate->c_name }}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <!-- left sidebar end -->
                <!-- right sidebar start -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
                    <div class="shop-content-area">
                        <div class="shop-toolbar">
                            <div class="col-xs-12 nopadding-left">
                                <form class="tree-most" method="get" id="form_order">
                                    <div class="orderby-wrapper pull-right">
                                        <label>Sắp xếp</label>
                                        <select name="orderby" class="orderby">
                                            <option {{ Request::get('orderby') == 'md' || !Request::get('orderby') ? 'selected="selected"' : '' }} value="md" selected="selected">Mặc định</option>
                                            <option {{ Request::get('orderby') == 'desc' ? 'selected="selected"' : '' }} value="desc">Mới nhất</option>
                                            <option {{ Request::get('orderby') == 'asc' ? 'selected="selected"' : '' }} value="asc">Sản phẩm cũ</option>
                                            <option {{ Request::get('orderby') == 'price_max' ? 'selected="selected"' : '' }} value="price_max">Giá tăng dần</option>
                                            <option {{ Request::get('orderby') == 'price_min' ? 'selected="selected"' : '' }} value="price_min">Giá giảm dần</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="shop-grid-tab">
                            <div class="row">
                                <div class="shop-product-tab first-sale">
                                    @foreach($products as $product)
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="two-product">
                                            <!-- single-product start -->
                                            <div class="single-product">
                                                @if($product->pro_number == 0)
                                                <span class="pro-number">Tạm hết hàng</span>
                                                @endif
                                                @if($product->pro_sale>0)
                                                <span class="pro-sale">{{ $product->pro_sale }}%</span>
                                                @endif
                                                <div class="product-img">
                                                    <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
                                                        <img class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt=""/>
                                                        <img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt=""/>
                                                    </a>
                                                    <div class="action-zoom">
                                                        <div class="add-to-cart">
                                                            <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Xem sản phẩm"><i class="fa fa-search-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="action-buttons">
                                                            <div class="add-to-links">
                                                                <!-- <div class="add-to-wishlist">
                                                                    <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                </div> -->
                                                                <div class="compare-button">
                                                                    <a href="{{ route('add.shopping.cart',$product->id) }}" title="Thêm giỏ hàng"><i class="icon-bag"></i></a>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="quickviewbtn">
                                                                <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="price-box">
                                                        @if($product->pro_sale==0)
                                                        <span class="new-price">{{ number_format($product->pro_price,0,',','.') }} đ</span>
                                                        @else
                                                        <span class="new-price1">{{ number_format($product->pro_price,0,',','.') }} đ</span><span class="new-price-sale">{{ number_format($product->pro_price*(100-$product->pro_sale)/100,0,',','.') }} đ</span>
                                                        @endif  
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h2 class="product-name"><a href="#">{{ $product->pro_name }}</a></h2>
                                                    <p>{{ $product->pro_decscription }}</p>
                                                </div>
                                            </div>
                                            <!-- single-product end -->
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- product-row end -->
                        </div>
                        <!-- shop toolbar start -->
                        <div class="shop-content-bottom">
                            <div class="shop-toolbar btn-tlbr">
                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <div class="pages">
                                        {!! $products->appends($query)->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop toolbar end -->
                    </div>
                </div>
                <!-- right sidebar end -->
            </div>
        </div>
    </div>
    <!-- shop-with-sidebar end -->
    <!-- Brand Logo Area Start -->
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
@stop
@section('script')
    <script>
        $(function (){
            $('.orderby').change(function (){
                $("#form_order").submit();
            })
        })
    </script>
@stop
