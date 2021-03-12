@extends('layouts.app')
@section('content')
    <div class="our-product-area new-product">
        <div class="container">
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
                                    <li class="category3"><span>Giỏ hàng</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-contact-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Phân loại</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt=1; ?>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <form action="{{ route('update.shopping.cart',$key) }}" method="get">
                                        <td>#{{ $stt }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img style="width: 80px;height: 60px;" src="{{ asset(pare_url_file($product->options->avatar)) }}">
                                        </td>
                                        <td>
                                            <select style="width: 68px;padding: 0px;" class="form-control size" name="size">
                                                  <option value="0">Không</option>
                                                  <?php for($i=35;$i<=45;$i++):?>
                                                        <option value="<?php echo $i ?>" {{ $product->options->size==$i ? 'selected':'' }}><?php echo $i ?></option>
                                                  <?php endfor ?>
                                            </select>
                                        </td>
                                        <td>{{ number_format($product->price,0,',','.') }} đ</td>
                                        <td>

                                                <input style="width: 45px" type="number" name="qtyPlus" min="1" value="{{ $product->qty }}">

                                        </td>
                                        <td>{{ number_format($product->qty * $product->price,0,',','.') }} đ</td>
                                        <td>                       
                                            <button class="btn btn-xs btn-info updatecart" style="background-col" type="submit"><i class="fa fa-pencil"></i>Cập nhật</button>
                                            <a class="btn btn-xs btn-danger" href="{{ route('delete.shopping.cart',$key) }}"><i class="fa fa-trash"></i> Xóa</a>
                                        </td>
                                        </form>
                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                                </tbody>
                            </table>
                            <h5 class="pull-right">Tổng tiền cần thanh toán {{ Cart::subtotal() }} <a href="{{ route('get.form.pay') }}" class="btn btn-success">Thanh toán</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
