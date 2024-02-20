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
    <!-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/aos.css">
    <link rel="shortcut icon" type="image/png" href="{{url('public/frontend/home/')}}/assets/images/favicon.png"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- <div class="wc-copywrtting-wrapper" style="overflow-x:hidden"> -->


    <div class="main-section">
        <div class="main-wrapper">

            <!-- NAV BAR START HERE  -->
            <div class="nav-bar" id="navbar">
                <div class="nav-bar-wrap">
                    <div class="nav-wrap-left">
                        <img class="logo" width="200" src="{{url('public/frontend/home/')}}/assets/images/logo3.png" alt="logo-img">
                    </div>
                    <div class="nav-wrap-middle">
                        <ul class="menu">
                            <li class="item">
                                <a href="">HOME</a>
                            </li>
                            <li class="item">
                                <a href="">ABOUT</a>
                            </li>
                            <li class="item">
                                <a href="">COURSES</a>
                            </li>
                            <li class="item">
                                <a href="">CAREERS</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-wrap-right">
                        <div class="action-btn">
                            <a href="#" class="sign-up">SIGN UP</a>
                        </div>
                        <div class="action-btn">
                            <a href="#" class="login">LOGIN</a>
                        </div>
                        <div class="action-btn">
                            <a href="#" class="shoping">
                                <span class="material-symbols-outlined">shopping_cart</span>
                            </a>
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
    <script src="{{url('public/frontend/home/')}}/assets/js/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- <script src="{{url('public/frontend/home/')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/SmoothScroll.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/aos.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/coustom.js"></script> -->
    <script>
        $(document).ready(function() {
            var navbar = $('#navbar');

            $('#home-page').scroll(function() {
                if ($('#home-page').scrollTop() >= 80) {
                    navbar.addClass('scrolled');
                } else {
                    navbar.removeClass('scrolled');
                }
            });
        });
        document.addEventListener('mousemove', (e) => {
            document.querySelectorAll('.layer').forEach(layer => {
                const speed = layer.getAttribute('data-speed');
                const x = (window.innerWidth - e.pageX * speed) / 100;
                const y = (window.innerHeight - e.pageY * speed) / 100;
                layer.style.transform = `translateX(${x}px) translateY(${y}px)`;
            })
        })

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            loop: true
        });
    </script>

</body>

</html>