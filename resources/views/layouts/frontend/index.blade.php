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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <script src="{{url('public/frontend/home/')}}/assets/js/smooth-scrollbar.js"></script>
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/magnific-popup.css">
    <link rel="shortcut icon" type="image/png" href="{{url('public/frontend/home/')}}/assets/images/favicon.png"> -->
    
    <!-- <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/aos.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0/dist/smooth-scroll.polyfills.min.js"></script>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- <script src="{{url('public/frontend/home/')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/SmoothScroll.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/aos.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/coustom.js"></script> -->
    <script>
        AOS.init();
        $(document).ready(function() {
            var navbar = $('#navbar');
            var lastScrollTop = 0;
            $('#home-page').scroll(function() {

                var scrollTop = $(this).scrollTop();

                // Check if user is scrolling up or down
                if (scrollTop > lastScrollTop) {
                    // Scrolling down
                    navbar.css('top', -navbar.outerHeight());
                } else {
                    // Scrolling up
                    navbar.css('top', 0);
                }

                lastScrollTop = scrollTop;
            });


            $('#home-page').scroll(function() {
                if ($('#home-page').scrollTop() >= 80) {
                    navbar.addClass('scrolled');
                } else {
                    navbar.removeClass('scrolled');
                }
            });


            // Scrollbar.init(document.querySelector('#home-page'), {
            // damping: 0.1
            // });


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


        document.addEventListener('DOMContentLoaded', function() {
            // Get the target element
            const animatedDiv = document.getElementById('whygrthaddicted');

            // Create an Intersection Observer
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // If the div is in the viewport, add your animation logic here
                        animateValue(document.getElementById("animval1"), 0, 100, 1000);
                        animateValue(document.getElementById("animval2"), 0, 200, 1000);
                        animateValue(document.getElementById("animval3"), 0, 25, 1000);
                        // Add any other animations or modifications as needed
                    }
                });
            }, {
                // Set the root to 'null' for the viewport
                root: null,
                // Set a threshold for when the callback should be triggered
                threshold: 0.5
            });

            // Start observing the target element
            observer.observe(animatedDiv);
        });

        function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerHTML = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }
        const obj = document.getElementById("value");
    </script>

</body>

</html>