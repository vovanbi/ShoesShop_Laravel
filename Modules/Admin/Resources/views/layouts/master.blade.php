
<!DOCTYPE html>
<html lang="en">
<head>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang quản lý</title>
    <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme_admin/css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('theme_admin/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('theme_admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme_admin/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Xin chào {{ get_data_user('admins','name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">               
                <li><a href="{{ route('get.logout.admin') }}">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="{{ \Request::route()->getName() == 'admin.home' ? 'active' : '' }}"><a href="{{ route('admin.home') }}">Trang Tổng Quan <span class="sr-only">(current)</span></a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.category' ? 'active' : '' }}"><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.product' ? 'active' : '' }}"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.rating' ? 'active' : '' }}"><a href="{{ route('admin.get.list.rating') }}">Đánh giá</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.article' ? 'active' : '' }}"><a href="{{ route('admin.get.list.article') }}">Tin tức</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.transaction' ? 'active' : '' }}"><a href="{{ route('admin.get.list.transaction') }}">Đơn hàng</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.user' ? 'active' : '' }}"><a href="{{ route('admin.get.list.user') }}">Thành viên</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.contact' ? 'active' : '' }}"><a href="{{ route('admin.get.list.contact') }}">Liên hệ</a></li>

            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @if(\Session::has('success'))
                <div class="alert alert-success alert-dismissible" style="position: fixed;right: 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thành công!</strong> {{ \Session::get('success') }}
                </div>
            @endif

            @if(\Session::has('danger'))
                <div class="alert alert-danger alert-dismissible" style="position: fixed;right: 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thất bại!</strong> {{ \Session::get('danger') }}
                </div>
            @endif
            @yield('content')
    </div>
</div>
<script src="{{ asset('theme_admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('theme_admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme_admin/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme_admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#out_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#input_img").change(function() {
            readURL(this);
        });
    </script>
    @yield('script')
</body>
</html>
