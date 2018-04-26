<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Steem-Sports</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('v1.layouts.styles')
</head>
<body class="home-two">
<!--Preloader start here-->
<div id="preloader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
<!--Preloader area end here-->

<!--Header area start here-->
<header class="header-inner-page">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="header-top-left">
                        <ul>
                            <li><a href="mailto:timothy33.tf@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> timothy33.tf@gmail.com</a></li>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                    <div class="social-media-area">
                        <nav>
                            <ul>
                                <li><a href="#" class="active"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle-area menu-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12 col-xs-12 logo">
                    <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12 mobile-menu">
                    <div class="main-menu">
                        <a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
                        <nav class="rs-menu">
                            <ul class="nav-menu">
                                <!-- Home -->
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <!-- End Home -->
                                <li><a href="#">About</a></li>
                                <li class="log"><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                                <li class="sign"><a href="#"><span>/</span> Sign Up</a></li>
                            </ul>
                        </nav>
                        <!--Header Search Start  here-->
                    {{--<div class="search">
                        <a class="rs-search" data-target=".search-modal" data-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                    </div>--}}
                    <!--Header Search End  here-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Header area end here-->

<div id="app">
    @yield('content')
</div>

<!-- Client Logo Section Start Here-->
{{--
<div class="clicent-logo-section sec-spacer">
    <div class="overly-bg"></div>
    <div class="container">
        <div id="upcoming" class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false" data-md-device-dots="false">
            <div class="item">
                <div class="single-logo">
                    <a href="#"><img src="images/logo/1.png" alt=""></a>
                </div>
            </div>
            <div class="item">
                <div class="single-logo">
                    <a href="#"><img src="images/logo/2.png" alt=""></a>
                </div>
            </div>

            <div class="item">
                <div class="single-logo">
                    <a href="#"><img src="images/logo/3.png" alt=""></a>
                </div>
            </div>
            <div class="item">
                <div class="single-logo">
                    <a href="#"><img src="images/logo/4.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
<!-- Client Logo Section End Here-->

<!-- Footer Start -->
<footer id="footer-section" class="footer-section">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-title">about us</h4>
                    <div class="about-widget">
                        <p>A Sport app on the steemit platform for everyone.</p>
                        <p class="margin-remove">
                            Don't have an account yet? sign up here ....
                            <a href="https://signup.steemit.com/">Steemit Sign Up</a>
                        </p>
                    </div>
                </div>
                {{--<div class="col-md-3">
                    <h4 class="footer-title">Recent Posts</h4>
                    <div class="recent-post-widget">
                        <div class="post-item">
                            <div class="post-date">
                                <span>28</span>
                                <span>June</span>
                            </div>
                            <div class="post-desc">
                                <h3 class="post-title"><a href="blog-single.html">Welcome to Construction Theme</a></h3>
                                <span class="post-category">Design</span>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="post-date">
                                <span>28</span>
                                <span>June</span>
                            </div>
                            <div class="post-desc">
                                <h3 class="post-title"><a href="blog-single.html">Welcome to Construction Theme</a></h3>
                                <span class="post-category">Design</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-title">Useful Links</h4>
                    <ul class="sitemap-widget">
                        <li class="active"><a href="about.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="point-table.html">Point Table</a></li>
                        <li><a href="world-cup.html">World Cup</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-title">newsletter</h4>
                    <form class="footer-subscribe">
                        <input type="text" class="form-input" placeholder="Name">
                        <input type="email" class="form-input" placeholder="Email">
                        <input type="submit" class="form-input" value="Send">
                    </form>
                </div>--}}
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="copyright">
                        <p>&copy; 2018 <a href="#" target="_blank">Timothy-mee</a></p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="text-right ft-bottom-right">
                        <div class="footer-bottom-share">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Search Modal Start Here -->
<div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="fa fa-close"></span>
    </button>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="search-block clearfix">
                <form>
                    <div class="form-group">
                        <input class="form-control" placeholder="eg: Soccer News" type="text">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal End Here -->

<!-- Start scrollUp  -->
<div id="return-to-top">
    <span>Top</span>
</div>
<!-- End scrollUp  -->

<!-- all js here -->
@include('v1.layouts.scripts')

</body>

</html>