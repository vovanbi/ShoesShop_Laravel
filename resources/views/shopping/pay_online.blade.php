@extends('layouts.app')
@section('content')
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
                                <a href="{{ route('get.list.shopping.cart') }}">Giỏ hàng</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Thanh toán</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container wrapper">
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                    @csrf
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                        <!--REVIEW ORDER-->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Danh sách sản phẩm <div class="pull-right"><small><a class="afix-1" href="{{ route('get.list.shopping.cart') }}">Quay lại</a></small></div>
                            </div>
                            <div class="panel-body">
                                @foreach($products as $product)
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" style="width: 100px;height: 70px;" src="{{ asset(pare_url_file($product->options->avatar)) }}" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">{{ $product->name }}</div>
                                            <div class="col-xs-12"><small>Số lượng<span> {{ $product->qty }}</span></small></div>
                                            <div class="col-xs-12"><small>Phân loại<span> {{ $product->options->size }}</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <h6>{{ number_format($product->price,0,',','.') }}<span>VNĐ</span></h6>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                @endforeach
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Tổng tiền</strong>
                                        <div class="pull-right"><span>{{ Cart::subtotal() }}</span>VNĐ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Thông tin thanh toán</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Họ Tên:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="name" class="form-control" value="{{ get_data_user('web','name') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="address" class="form-control" value="{{ get_data_user('web','address') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Email:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="email" class="form-control" value="{{ get_data_user('web','email') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="phone" class="form-control" value="{{ get_data_user('web','phone') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="bank_code">Ngân hàng</label>
                                        <select name="bank_code" id="bank_code" class="form-control">
                                            <option value="">Không chọn</option>
                                            <option value="NCB"> Ngan hang NCB</option>
                                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                                            <option value="SCB"> Ngan hang SCB</option>
                                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                                            <option value="MSBANK"> Ngan hang MSBANK</option>
                                            <option value="NAMABANK"> Ngan hang NamABank</option>
                                            <option value="VNMART"> Vi dien tu VnMart</option>
                                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                            <option value="HDBANK">Ngan hang HDBank</option>
                                            <option value="DONGABANK"> Ngan hang Dong A</option>
                                            <option value="TPBANK"> Ngân hàng TPBank</option>
                                            <option value="OJB"> Ngân hàng OceanBank</option>
                                            <option value="BIDV"> Ngân hàng BIDV</option>
                                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                            <option value="VPBANK"> Ngan hang VPBank</option>
                                            <option value="MBBANK"> Ngan hang MBBank</option>
                                            <option value="ACB"> Ngan hang ACB</option>
                                            <option value="OCB"> Ngan hang OCB</option>
                                            <option value="IVB"> Ngan hang IVB</option>
                                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="language">Ngôn ngữ</label>
                                        <select name="language" id="language" class="form-control">
                                            <option value="vn">Tiếng Việt</option>
                                            <option value="en">English</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                    <div class="col-md-12">
                                        <textarea style="width: 100%" name="note" id="" cols="73" rows="4" class="fonm-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Xác nhận thông tin</button>
                                    </div>
                                </div>
                            </div>
                            <!--SHIPPING METHOD END-->
                            <!--CREDIT CART PAYMENT-->
                            <!--CREDIT CART PAYMENT END-->
                        </div>

                </form>
            </div>
            <div class="row cart-footer">

            </div>
        </div>
    </div>
    </div>
@stop
