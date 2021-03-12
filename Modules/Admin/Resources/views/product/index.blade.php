@extends('admin::layouts.master')

@section('content')
    <style>
        .rating .active{color: #ff9705 !important;}
    </style>
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h3>Quản lý danh mục <a href="{{ route('admin.get.create.product') }}" ><i class="fa fa-plus-circle"></i></a> </h3>
        <table id="dtBasicExample" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Trạng thái</th>
                    <th>Nổi bật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($products))
                @foreach($products as $product)
                    <?php
                    $age = 0;
                    if($product->pro_total_rating)
                    {
                        $age = round($product->pro_total_number / $product->pro_total_rating,2);
                    }
                    ?>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->pro_name }}
                            <ul style="padding-left: 15px">
                                <li><span>Giá: </span><span>{{ number_format($product->pro_price,0,',','.') }} đ</span></li>
                                <li><span>Giảm: </span><span>{{ $product->pro_sale }}%</span></li>
                                <li>
                                    <span>Đánh giá: </span>
                                    <span class="rating">
                                        @for($i = 1;$i <=5; $i++)
                                            <i class="fa fa-star {{ $i <= $age ? 'active' : '' }}" style="color: #999"></i>
                                        @endfor
                                    </span>
                                    <span>{{ $age }}</span>
                                </li>
                                <li><span>Số lượng: </span><span>{{ $product->pro_number }}</span></li>
                            </ul>
                        </td>
                        <td>{{ isset($product->category->c_name) ? $product->category->c_name : '[N/A]'}}</td>
                        <td>
                            <img src="{{ asset(pare_url_file($product->pro_avatar)) }}" class="img img-responsive" style="width: 80px;height: 80px;">
                        </td>
                        <td>
                            <a href="{{ route('admin.get.action.product',['active',$product->id]) }}" class="label {{ $product->getStatus($product->pro_active)['class'] }}">{{ $product->getStatus($product->pro_active)['name'] }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.get.action.product',['hot',$product->id]) }}" class="label {{ $product->getHot($product->pro_hot)['class'] }}">{{ $product->getHot($product->pro_hot)['name'] }}</a>
                        </td>
                        <td>
                            <a class="btn btn-info" style="font-size: 12px;" href="{{ route('admin.get.edit.product',$product->id) }}"><i class="fa fa-pencil"></i> Cập nhật</a>
                            <a class="btn btn-danger" style="font-size: 12px;" href="{{ route('admin.get.action.product',['delete',$product->id]) }}"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach               
            @endif
            </tbody>
        </table>
    </div>
@stop
@section('script')
<script>
  // Basic example
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "pagingType": "simple_numbers" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
@stop
