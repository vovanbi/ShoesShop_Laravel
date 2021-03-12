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
                            <li class="category3"><span>Liên hệ</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-us-area">
                        <!-- google-map-area start -->
                        <div class="google-map-area">
                            <!--  Map Section -->
                            <p>Địa chỉ: 491 Tôn Đức Thắng, Q.Liên Chiểu, TP.Đà Nẵng</p>
                            <div style="border: 1px solid #ccc;padding:20px;" id="contacts" class="map-area">
                    			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.0625531045985!2d108.15732981490079!3d16.062243443891475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142195ec1905d0b%3A0xc77c1f75ef8af137!2zxJDhuqFpIEjhu41jIFPGsCBQaOG6oW0gxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1603688467495!5m2!1svi!2s" width="100%" height="500" frameborder="0" style="style="border: 0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>

                        </div>
                        <!-- google-map-area end -->
                        <!-- contact us form start -->
                        <div class="contact-us-form">
                            <div class="contact-form">
                                <form action="" method="post">
                                    @csrf
                                    <p>Mời bạn điền thông tin liên hệ:</p>
                                    <div class="form-top">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Họ tên <sup>*</sup></label>
                                            <input type="text" name="c_name" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Email <sup>*</sup></label>
                                            <input type="email" name="c_email" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Tiêu đề<sup>*</sup></label>
                                            <input type="text" name="c_title" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>SĐT <sup>*</sup></label>
                                            <input type="number" name="c_phone" class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                            <label>Nội dung <sup>*</sup></label>
                                            <textarea class="yourmessage" name="c_content" required></textarea >
                                        </div>
                                        <div class="submit-form form-group col-sm-12 submit-review">
                                            <button type="submit" class="btn btn-success pull-left">Gửi thông tin</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- contact us form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
