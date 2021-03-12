@extends('layouts.app')
@section('content')
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
                            <li class="home">
                                <a href="">{{ $cateProduct->c_name }}</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            <li class="category3"><span>{{ $productDetail->pro_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-details-area" id="content_product" data-id="{{ $productDetail->id }}">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <div style="height:450px;width:450px;" class="zoomWrapper"><img id="zoom1" src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" data-zoom-image="" alt="big-1" style="position: absolute;"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h1 class="product-name"><a href="#">{{ $productDetail->pro_name }}</a></h1>
                                <div class="rating-price">
                                    <?php
                                    $ageDetail = 0;
                                    if($productDetail->pro_total_rating)
                                    {
                                        $ageDetail = round($productDetail->pro_total_number / $productDetail->pro_total_rating,2);
                                    }
                                    ?>
                                    <div class="pro-rating">
                                        @for($i = 1;$i <=5; $i++)
                                            <i class="fa fa-star {{ $i <= $ageDetail ? 'active' : '' }}" style="color: #999"></i>
                                        @endfor
                                    </div>
                                    <div class="price-boxes">
                                        @if($productDetail->pro_sale==0)
                                            <span class="new-price">{{ number_format($productDetail->pro_price,0,',','.') }} đ</span>
                                        @else
                                            <span class="price-boxes1">{{ number_format($productDetail->pro_price,0,',','.') }} đ</span><span class="price-sale">{{ number_format($productDetail->pro_price*(100-$productDetail->pro_sale)/100,0,',','.') }} đ</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-desc">
                                    {{ $productDetail->pro_description }}
                                </div>
                                <p class="availability in-stock">Trạng thái: <span>{{ !empty($productDetail->pro_number > 0) ? 'Còn hàng' : 'Hết hàng'}}</span></p>
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Số lượng:</label>
                                            <input type="number" name="qtyPlus" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{ route('add.shopping.cart',$productDetail->id) }}">Thêm vào giỏ</a>
                                        </div>
                                        <!-- <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="compare-button">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Chi tiết sản phẩm</a></li>
                        <li class=""><a href="#messages" data-toggle="tab"> Đánh giá</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                {!! $productDetail->pro_content !!}
                            </div>
                        </div>
                        <div class="component_rating" style="margin-bottom: 20px;">
                            <h3>Đánh giá sản phẩm</h3>
                            <div class="component_rating_content" style="display: flex;align-items: center;border-radius: 5px;border: 1px solid #dedede">
                                    <div class="rating_item" style="width: 20%;position: relative">
                                        <div class=""><span class="fa fa-star" style="font-size: 100px;display: block;color: #ff9705;margin: 0 auto;text-align: center"></span><b style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;font-size: 20px;">{{ $ageDetail }}</b></div>
                                    </div>
                                    <div class="list_rating" style="width: 60%;padding: 20px;">
                                        @foreach($arrayRatings as $key => $arrayRating)
                                            <?php
                                                $itemAge = round(($arrayRating['total'] / $productDetail->pro_total_rating)*100,0);
                                            ?>
                                            <div class="item_rating" style="display: flex;align-items: center">
                                                    <div style="width: 20%; font-size: 14px;">
                                                        {{ $key }}<span class="fa fa-star"></span>
                                                    </div>
                                                    <div style="width: 60%;margin: 0 20px;">
                                                        <span style="width: 100%; height: 8px;display: block;border: 1px solid #dedede;border-radius: 5px;background-color: #dedede">
                                                            <b style="width: {{ $itemAge }}%;background-color: #f25800;display: block;border-radius:5px;height: 100% "></b></span>
                                                    </div>
                                                    <div style="width: 20%;">
                                                        <a href="">{{ $arrayRating['total'] }} đánh giá ({{ $itemAge }}%)</a>
                                                    </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="" style="width: 20%">
                                        <a href="" class="js_rating_action" style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px;">Gửi đánh giá của bạn</a>
                                    </div>
                            </div>
                            <?php
                                $listRatingText = [
                                    1 =>'Không thích',
                                    2 =>'Tạm được',
                                    3 =>'Bình thường',
                                    4 =>'Rất tốt',
                                    5 =>'Tuyệt vời',
                                ];
                            ?>
                            <div class="form_rating hide">
                                <div style="display: flex;margin-top: 15px; font-size: 15px;" class="">
                                    <p style="margin-bottom: 0">Chọn đánh giá của bạn</p>
                                    <span style="margin: 0 15px;" class="list_start">
                                    @for($i = 1;$i <=5; $i++)
                                            <i class="fa fa-star" data-key="{{ $i }}"></i>
                                        @endfor
                                </span>
                                    <span class="list_text"></span>
                                    <input type="hidden" value="" class="number_rating">
                                </div>
                                <div style="margin-top: 15px">
                                    <textarea style="width: 100%" name="" id="ra_content" cols="30" rows="5"></textarea>
                                </div>
                                <div style="margin-top: 15px">
                                    <a href="{{ route('post.rating.product',$productDetail) }}" class="js_rating_product" style="width: 200px;background: #288ad6;padding: 5px;color: white;border-radius: 5px;">Gửi đánh giá</a>
                                </div>
                            </div>
                        </div>
                        <div class="component_list_rating">
                            @if(isset($ratings))
                                @foreach($ratings as $rating)
                                    <div class="rating_item" style="margin: 10px 0">
                                        <div>
                                            <span style="color: #333;font-weight: bold;text-transform: capitalize">{{ isset($rating->user->name) ? $rating->user->name : '' }}</span>
                                            <a href="" style="color: #2ba832"><i class="fa fa-check-circle-o"></i>Đã mua hàng tại website</a>
                                        </div>
                                        <p style="margin-bottom: 0">
                                            <span class="pro-rating">
                                                @for($i=1;$i<=5;$i++)
                                                    <i class="fa fa-star {{ $i<=$rating->ra_number ? 'active' : ''}}"></i>
                                                @endfor
                                            </span>
                                            <span>{{ $rating->ra_content }}</span>
                                        </p>
                                        <div>
                                            <span><i class="fa fa-clock-o"></i> {{ $rating->created_at }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($productCate))
            <div class="our-product-area new-product">
                <div class="container">
                    <div class="area-title">
                        <h2>Sản phẩm cùng danh mục</h2>
                    </div>
                    <!-- our-product area start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="features-curosel">
                                    <!-- single-product start -->
                                    @foreach($productCate as $productCatee)
                                        <div class="col-lg-12 col-md-12">
                                            <div class="single-product first-sale">
                                                <div class="product-img">
                                                    @if($productCatee->pro_number == 0)
                                                        <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 13px;">Tạm hết hàng</span>
                                                    @endif
                                                    @if($productCatee->pro_sale)
                                                        <span style="position: absolute;font-size: 13px; background-image: linear-gradient(-90deg,#ec1ff1 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;color: white;right: 0">{{ $productCatee->pro_sale }}%</span>
                                                    @endif
                                                    <a href="{{ route('get.detail.product',[$productCatee->pro_slug,$productCatee->id]) }}">
                                                        <img class="primary-image" src="{{ asset(pare_url_file($productCatee->pro_avatar)) }}" alt=""/>
                                                        <img class="secondary-image" src="{{ asset(pare_url_file($productCatee->pro_avatar)) }}" alt=""/>
                                                    </a>
                                                    <div class="action-zoom">
                                                        <div class="add-to-cart">
                                                            <a href="{{ route('get.detail.product',[$productCatee->pro_slug,$productCatee->id]) }}" title="Xem sản phẩm"><i class="fa fa-search-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="action-buttons">
                                                            <div class="add-to-links">
                                                                <!-- <div class="add-to-wishlist">
                                                                    <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                </div> -->
                                                                <div class="compare-button">
                                                                    <a href="{{ route('add.shopping.cart',$productCatee->id) }}" title="Thêm giỏ hàng"><i class="icon-bag"></i></a>
                                                                </div>
                                                            </div>
                                                           <!--  <div class="quickviewbtn">
                                                                <a href="{{ route('get.detail.product',[$productCatee->pro_slug,$productCatee->id]) }}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="price-box">
                                                        @if($productCatee->pro_sale==0)
                                                        <span class="new-price">{{ number_format($productCatee->pro_price,0,',','.') }} đ</span>
                                                        @else
                                                        <span class="new-price1">{{ number_format($productCatee->pro_price,0,',','.') }} đ</span><span class="new-price-sale">{{ number_format($productCatee->pro_price*(100-$productCatee->pro_sale)/100,0,',','.') }} đ</span>
                                                        @endif 
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h2 class="product-name"><a href="#">{{ $productCatee->pro_name }}</a></h2>
                                                    <p>{{ $productCatee->pro_description }}</p>
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
    </div>
@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function (){
            let listStart = $(".list_start .fa");
            listRatingText = {
                '1' : 'Không thích',
                '2' : 'Tạm được',
                '3' : 'Bình thường',
                '4' : 'Rất tốt',
                '5' : 'Tuyệt vời',
            }
            listStart.mouseover(function (){
                let  $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active');

                $(".number_rating").val(number);
                $.each(listStart, function (key,value){
                    if (key + 1 <= number)
                    {
                        $(this).addClass('rating_active')
                    }
                });

                $(".list_text").text('').text(listRatingText[number]).show();
            });
            $(".js_rating_action").click(function (event){
                event.preventDefault();
                if($(".form_rating").hasClass('hide'))
                {
                    $(".form_rating").addClass('active').removeClass('hide')
                }
                else
                {
                    $(".form_rating").addClass('hide').removeClass('active')
                }
            });
            $(".js_rating_product").click(function (event){
                event.preventDefault();
                let  content = $("#ra_content").val();
                let  number = $(".number_rating").val();
                let url = $(this).attr('href');
                if(content && number)
                {
                    $.ajax({
                        url : url,
                        type : 'POST',
                        data : {
                            number:number,
                            r_content:content
                        }
                    }).done(function(result) {
                        if (result.code==1)
                        {
                            alert('Gửi đánh giá thành công');
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
@stop
