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
                            <li class="category3"><span>Quản lý</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 30px">
                    <div class="single-product-tab">
                        <!-- Nav tabs -->
                        <ul class="details-tab">
                            <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Quản lý tài khoản</a></li>
                            <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Chi tiết đơn hàng</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="single-post-comments col-md-6 col-md-offset-3">
                                    <div class="comment-respond">
                                        <h2 style="text-align: center">Cập nhật thông tin</h2>
                                        <form action="#" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Họ tên</p>
                                                    <input type="text" name="name" value="{{ $user->name }}">
                                                </div>
                                                <div class="col-md-12">
                                                    <p>Email</p>
                                                    <input type="email" name="email" value="{{ $user->email }}">
                                                </div>
                                                <div class="col-md-12">
                                                    <p>Số điện thoại</p>
                                                    <input type="text" name="phone" value="{{ $user->phone }}">
                                                </div>
                                                <div class="col-md-12">
                                                    <p>Địa chỉ</p>
                                                    <input type="text" name="address" value="{{ $user->address }}">
                                                </div>
                                                <div class="col-md-12 comment-form-comment">
                                                    <p>Giới thiệu</p>
                                                    <textarea id="message" cols="30" rows="10" name="about">{{ $user->about }}</textarea>
                                                    <input type="submit" value="Cập nhật">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <div class="product-tab-content">
                                    <div class="col-xs-6" style="margin-top: 30px">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Tổng số đơn hàng</th>
                                                <th>Đã xử lý</th>
                                                <th>Chưa xử lý</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{ $totalTransaction }}</td>
                                                <td>{{ $totalTransactionDone }}</td>
                                                <td>{{ $totalTransaction - $totalTransactionDone }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-xs-12" style="margin: 30px 0 30px 0">
                                        <h2 style="text-align: center">Chi tiết đơn hàng</h2>

                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Địa chỉ</th>
                                                <th>SĐT</th>
                                                <th>Tổng tiền</th>
                                                <th>Trạng thái</th>
                                                <th>Thời gian</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($transactions))
                                                @foreach($transactions as $transaction)
                                                    <tr>
                                                        <<td>#{{ $transaction->id }}</td>
                                                        <td>{{ $transaction->tr_address }}</td>
                                                        <td>{{ $transaction->tr_phone }}</td>
                                                        <td>{{ number_format($transaction->tr_total,0,',','.') }} VND</td>
                                                        <td>
                                                            @if ( $transaction->tr_status == 1)
                                                                <a href="" class="label label-success">Đã xủ lý</a>
                                                            @else
                                                                <a href="" class="label label-default">Chờ xủ lý</a>
                                                            @endif
                                                        </td>
                                                        <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
