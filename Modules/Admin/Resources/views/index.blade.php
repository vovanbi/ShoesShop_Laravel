@extends('admin::layouts.master')

@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <h1 class="page-header">Trang tổng quan</h1>
	    
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">7</div>
                                <div>Đơn Hàng!</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.get.list.user') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Chi Tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">3</div>
                                <div>Đánh Giá!</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.get.list.rating') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Chi Tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">5</div>
                                <div>Thành Viên!</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.get.list.user') }}">
                        <div class="panel-footer">
                            <span class="pull-left">Chi Tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>                   
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-question fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Hỗ Trợ Khách Hàng!</div>
                            </div>
                        </div>
                    </div>
                    <a href="https://dashboard.tawk.to/#/chat" target="_blank">
                        <div class="panel-footer">
                            <span class="pull-left">Chi Tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="container"></div>
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Danh sách đơn hàng mới</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>SĐT</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Thời gian</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactionNews as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ isset( $transaction->user->name) ?  $transaction->user->name : '[N\A]' }}</td>
                                        <td>{{ $transaction->tr_phone }}</td>
                                        <td>{{ number_format($transaction->tr_total,0,',','.') }} VND</td>
                                        <td>
                                            @if ( $transaction->tr_status == 1)
                                                <a href="" class="label label-success">Đã xủ lý</a>
                                            @else
                                                <a href="{{ route('admin.get.active.transaction',$transaction->id) }}" class="label label-default">Chờ xủ lý</a>
                                            @endif
                                        </td>
                                        <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Danh sách đánh giá mới</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên thành viên</th>
                                    <th>Sản phẩm</th>
                                    <th>Đánh giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($ratings))
                                    @foreach($ratings as $rating)
                                        <tr>
                                            <td>{{ $rating->id }}</td>
                                            <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</td>
                                            <td><a href="">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a></td>
                                            <td>{{ $rating->ra_number }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Danh sách liên hệ mới</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiêu đề</th>
                                    <th>Họ tên</th>
                                    <th>Nội dung</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($contacts))
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->id }}</td>
                                            <td>{{ $contact->c_title }}</td>
                                            <td>{{ $contact->c_name }}</td>
                                            <td>{{ $contact->c_content }}</td>
                                            <td>
                                                <a href="{{ route('admin.action.contact',['status',$contact->id]) }}" class="label {{ $contact->getStatus($contact->c_status)['class'] }}">{{ $contact->getStatus($contact->c_status)['name'] }}</a>
                                            </td>
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
@endsection
@section('script')
    <script>
        // Create the chart
        let data = "{{ $dataMoney }}";
        dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
        console.log(dataChart);
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ doanh thu ngày và tháng'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Mức độ'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f} VND'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: "Browsers",
                    colorByPoint: true,
                    data: dataChart
                }
            ],
        });
    </script>
@stop
