<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Growthaddicted</title>
    <!-- <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/all.min.css">
    <!-- <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/style.css"> -->
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/our-style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/aos.css">
    <link rel="shortcut icon" type="image/png" href="{{url('public/frontend/home/')}}/assets/images/favicon.png">
</head>

<body>
    <!-- <div class="wc-copywrtting-wrapper" style="overflow-x:hidden"> -->


    <div class="main-section">
        <div class="main-wrapper">

            <!-- NAV BAR START HERE  -->
            <div class="nav-bar">
                <div class="nav-bar-wrap">
                    <div class="nav-wrap-left">

                        <!-- MOBILE MENU  -->
                        <!-- <div class="mobile-menu">

                        </div> -->
                        <ul class="menu">
                            <li class="item">
                                <img class="logo" width="200" src="{{url('public/frontend/home/')}}/assets/images/Logo2.png" alt="logo-img">
                            </li>
                            <li class="item">
                                <a href="">Home</a>
                            </li>
                            <li class="item">
                                <a href="">About</a>
                            </li>
                            <li class="item">
                                <a href="">Courses</a>
                            </li>
                            <li class="item">
                                <a href="">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-wrap-right">
                        <div class="action-btn">
                            <button class="primary-btn"><span>Login</span> </button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- NAV BAR END HERE  -->
            <div class="dynamic-section">
                @yield('content')
            </div>

        </div>
    </div>



    <!-- about our missiong section end -->
    <script src="{{url('public/frontend/home/')}}/assets/js/jquery.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/SmoothScroll.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/aos.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/coustom.js"></script>
    
</body>

</html>