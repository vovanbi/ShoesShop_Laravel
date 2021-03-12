<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shoes Shop: Chuyên các loại giày</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">

    <!-- Fonts
    ============================================ -->
    
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <!-- CSS  -->

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">

    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">

    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">

    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('fonts/font-icon.css') }}">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">

    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('custom-slider/css/nivo-slider.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('custom-slider/css/preview.css') }}" type="text/css" media="screen" />

    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- style CSS
    ============================================ -->
    <!-- <link rel="stylesheet" href="{{ asset('style.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('style1.css') }}">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body class="home-one">
@if(get_data_user('web','active')== 1)
    <p>Tài khoản của bạn chưa được kích hoạt. Hãy check lại địa chỉ email của bạn để kích hoạt tài khoản</p>
@endif
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<!-- header area start -->
@include('components.header')
@if(\Session::has('success'))
    <div class="alert alert-success alert-dismissible" style="position: fixed;right: 20px;top: 20px;left: 50%;transform: translateX(-50%);z-index: 99999999">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Thành công!</strong> {{ \Session::get('success') }}
    </div>
@endif

@if(\Session::has('danger'))
    <div class="alert alert-danger alert-dismissible" style="position: fixed;right: 20px;top: 20px;left: 50%;transform: translateX(-50%);z-index: 99999999">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

        <strong>Thất bại!</strong> {{ \Session::get('danger') }}
    </div>
@endif
@if(\Session::has('warning'))
    <div class="alert alert-warning alert-dismissible" style="position: fixed;right: 20px;top: 20px;left: 50%;transform: translateX(-50%);z-index: 99999999">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Cảnh báo!</strong> {{ \Session::get('warning') }}
    </div>
@endif
@yield('content')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fc31fbb920fc91564cba4fa/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
@include('components.footer')
<!-- FOOTER END -->

<!-- JS -->

<!-- jquery-1.11.3.min js
============================================ -->
<script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"></script>

<!-- bootstrap js
============================================ -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Nivo slider js
============================================ -->
<script src="{{ asset('custom-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
<script src="{{ asset('custom-slider/home.js') }}" type="text/javascript"></script>

<!-- owl.carousel.min js
============================================ -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- jquery scrollUp js
============================================ -->
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>

<!-- price-slider js
============================================ -->
<script src="{{ asset('js/price-slider.js') }}"></script>

<!-- elevateZoom js
============================================ -->
<script src="{{ asset('js/jquery.elevateZoom-3.0.8.min.js') }}"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>

<!-- mobile menu js
============================================ -->
<script src="{{ asset('js/jquery.meanmenu.js') }}"></script>

<!-- wow js
============================================ -->
<script src="{{ asset('js/wow.js') }}"></script>

<!-- plugins js
============================================ -->
<script src="{{ asset('js/plugins.js') }}"></script>

<!-- main js
============================================ -->
<script src="{{ asset('js/main.js') }}"></script>
@yield('script')
</body>
</html>
