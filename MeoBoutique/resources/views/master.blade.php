<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- seo -->
    <!-- <meta property="og:image" content=""> -->
    <meta property="og:site_name" content="http://localhost/Laravel/MeoBoutique/public/1">
    <meta property="og:description" content="mẹo boutique description">
    <meta property="og:title" content="mẹo boutique title">
    <meta property="og:url" content="http://localhost/Laravel/MeoBoutique/public/1">
    <meta property="og:type" content="website">
    <!-- end seo -->
    <!-- <script src="{{asset('giaodienadmin/demo.web3canvas.com/cdn-cgi/apps/head/d5romzz9D4njZiTpLIvk3w0d4pg.js')}}"></script> -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/images/favicon.png')}}">
    <title>Trang chủ quản lí Mẹo Boutique</title>

    <link href="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/css/style.css')}}" rel="stylesheet">
</head>

<body class="header-fix fix-sidebar">
    <div id="main-wrapper">
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <b><img src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/images/logo.png')}}" alt="homepage" class="dark-logo" /></b>
                    </a>
                </div>
                <!-- header top -->
                @include('headertop')
            </nav>
        </div>
        <div class="left-sidebar">
            <div class="scroll-sidebar">
                <!-- header left -->
                @include('headerleft')
            </div>
        </div>
        <div class="page-wrapper">
            <div class="container-fluid mt-5">
                <div class="fb-share-button" data-href="http://localhost/Laravel/MeoBoutique/public/1" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/Laravel/MeoBoutique/public/1&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                <!-- noi dung -->
                @yield('content')
            </div>
            <footer class="footer"> © 2018 CoinDash All Right Reserved.</footer>

        </div>

    </div>


    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/lib/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/lib/webticker/jquery.webticker.min.js')}}"></script>
    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/lib/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/custom.min.js')}}"></script>
    <script src="{{asset('giaodienadmin/demo.web3canvas.com/themeforest/coindash/admin/light/js/dashboard-1.js')}}"></script>
    <script type="text/javascript">
        $('div.alert').delay(4000).hide('slow');
    </script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2743301495752008&autoLogAppEvents=1"></script>
</body>
</html>