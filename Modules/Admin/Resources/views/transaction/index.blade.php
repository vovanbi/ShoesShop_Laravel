@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Đơn hàng</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h3>Quản lý đơn hàng</h3>
        <table id="dtBasicExample" class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Thanh toán</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ isset( $transaction->user->name) ?  $transaction->user->name : '[N\A]' }}</td>
                        <td>{{ $transaction->tr_address }}</td>
                        <td>{{ $transaction->tr_phone }}</td>
                        <td>{{ number_format($transaction->tr_total,0,',','.') }} đ</td>
                        <td>
                            @if ( $transaction->tr_type == 1)
                                <p href="" class="label label-success">Online</p>
                            @else
                                <p href="" class="label label-info">Thường</p>
                            @endif
                        </td>
                        <td>
                            @if ( $transaction->tr_status == 1)
                                <a href="" class="label label-success">Đã xủ lý</a>
                            @else
                                <a href="{{ route('admin.get.active.transaction',$transaction->id) }}" class="label label-default">Chờ xủ lý</a>
                            @endif
                        </td>
                        <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a class="js_order_item btn btn-info" data-id="{{ $transaction->id }}" style="font-size: 12px;" href="{{ route('admin.get.view.order',$transaction->id) }}"><i class="fa fa-eye"></i> Xem</a>
                            <a class="btn btn-danger" style="font-size: 12px;" href="{{ route('admin.get.action.transaction',['delete',$transaction->id]) }}"><i class="fa fa-trash"></i> Xoá</a>                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết đơn hàng #<b class="transaction_id"></b></h4>
                </div>
                <div class="modal-body" id="md_content">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@stop
@section('script')
    <script>
        $(function (){
            $(".js_order_item").click(function (event){
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $("#md_content").html('')
                $(".transaction_id").text($this.attr('data-id'));
                $("#myModalOrder").modal('show');

                $.ajax({
                    url: url,
                }).done(function (result){
                    if(result)
                    {
                        $("#md_content").html('').append(result);
                    }
                });
            });
        })

  // Basic example
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "pagingType": "simple_numbers" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');
});

    </script>
@stop

