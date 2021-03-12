@if($orders)
    <table class="table">
        <thead>
        <tr>
            <th>Stt</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $order)
        <?php $stt=1 ?>
            <tr>
                <td><?php echo $stt ?></td>
                <td><a href="{{ route('get.detail.product',[Str::slug($order->product->pro_name),$order->or_product_id]) }}" target="_blank">{{ isset($order->product->pro_name) ? $order->product->pro_name : '' }}</a></td>
                <td>
                    <img style="width: 80px;height: 60px;" src="{{ isset($order->product->pro_avatar) ? asset(pare_url_file($order->product->pro_avatar)) : '' }}">
                </td>
                <td>{{ number_format($order->or_price,0,',','.') }} đ</td>
                <td>{{ $order->or_qty }}</td>
                <td>{{ number_format($order->or_qty * $order->or_price,0,',','.') }} đ</td>
            </tr>
        <?php $stt++ ?>
        @endforeach
        </tbody>
    </table>
@endif
