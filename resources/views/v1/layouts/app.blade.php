<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>Steem-Sport</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @include('v1.layouts.styles')
</head>
<body data-spy="scroll" data-target="#scroll-menu" data-offset="100">
<div id="preloader"></div>
<header>
    <!-- .header-area-start -->
    <div class="header-area main_h header-area-5 ptb-15 black-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="logo">
                        <a href="#"><h3 class="text">Steem-Sports</h3></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 hidden-sm hidden-xs">
                    <div class="mainmenu floatright">
                        <nav>
                            <ul>
                                <li class="header-top-search-5" style="margin-right:auto; margin-left: auto;">
                                    <form action="#">
                                        <input type="text" placeholder="Search"/>
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                                <li><a href="https://signup.steemit.com/">Sign Up</a></li>
                                <li><a href="#">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area-start -->
        <div class="mobile-menu-area visible-xs visible-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="header-top-search-5" style="margin-right:auto; margin-left: auto;">
                                        <form action="#">
                                            <input type="text" placeholder="Search"/>
                                            <button><i class="fa fa-search"></i></button>
                                        </form>
                                    </li>
                                    <li><a href="https://signup.steemit.com/">Sign Up</a></li>
                                    <li><a href="#">Login</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area-end -->
    </div>
    <!-- .header-area-end -->
</header>
<!-- blog-area-start -->
    <div id="app">
        @yield('content')
    </div>
<!-- blog-area-end -->
<!-- Copyright Section -->
<div class="copyright-area ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="footer-copyright">© Copyright 2017 - Timothy-Mee</p>
            </div>
        </div>
    </div>
</div>
<!-- Ends Copyright Section -->
@include('v1.layouts.scripts')
</body>


</html>