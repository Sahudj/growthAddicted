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
    <!-- <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/swiper-bundle.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <script src="{{url('public/frontend/home/')}}/assets/js/smooth-scrollbar.js"></script>
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <div class="menu-btn">
                            <span class="material-symbols-outlined">
                                menu
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- NAV BAR END HERE  -->
            <div class="dynamic-section">
                @yield('content')
            </div>

            <!-- FOOTER  -->
            <div class="footer-section">
                <div class="footeer-wrapper">
                    <div class="cols1">
                        <img class="logo" width="200" src="{{url('public/frontend/home/')}}/assets/images/logo3.png" alt="logo-img">
                        <p>Growth Addicted is more than a platform, it is your trusted partner to help you do what you do best: help as many PEOPLE as possible TO fulfill their dreams & get best career options. Access to top learning on your finger tip.</p>
                    </div>
                    <div class="cols2">
                        <h1>INFORMATION</h1>
                        <ul>
                            <li><a href="">Disclaimer</a></li>
                            <li><a href="">Refund Policy</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                            <li><a href="">Msme Certificate</a></li>
                        </ul>
                    </div>
                    <div class="cols3">
                        <h1>GET IN TOUCH</h1>
                        <div class="info-cont">
                            <div class="phone-cont">
                                <span class="material-symbols-outlined">
                                    call
                                </span> +91 8962479929
                            </div>
                            <div class="phone-cont">
                                <span class="material-symbols-outlined">
                                    mail
                                </span> care@growthaddicted.com
                            </div>
                            <div class="phone-cont">
                                <span class="material-symbols-outlined">
                                    apartment
                                </span> H-70, Ward No. 31, Shivaji Nagar, Near JP Hospital, Bhopal
                            </div>
                        </div>
                    </div>
                    <div class="cols4">
                        <h1>LATEST UPDATES</h1>
                        <div class="latest-update-cont">
                            <input type="text" placeholder="Your Email Address ">
                            <button class="pri-btn">send</button>
                            <div class="social-icon-cont">
                                <a href="https://www.facebook.com/groups/549766590256463/">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a href="https://instagram.com/growthaddicted.official?igshid=YmMyMTA2M2Y=">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                                <a href="">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                                <a href="https://www.youtube.com/channel/UCGDfFz8ubROUpZbVxvAefWg">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- about our missiong section end -->
    <script src="{{url('public/frontend/home/')}}/assets/js/jquery.min.js"></script>
    <!-- <script src="{{url('public/frontend/home/')}}/assets/js/swiper-bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
            $(window).scroll(function() {

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


            $(window).scroll(function() {
                if ($(window).scrollTop() >= 80) {
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

        var testiCrousal = new Swiper(".testimonial-crousal", {
            direction: "vertical",
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            observer: true,
            observeParents: true,
            loop: true,
            slidesPerView: 1,
            spaceBetween: 60,
            centeredSlides: true,
        });

        $("#playBtnmodal").on("click", function(e) {
            var wrapper = $("#video-modal");
            var href = $(this).attr("href");
            var customFrame = '<iframe src=' + href + ' width="100%" height="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>';
            $(wrapper).append(customFrame);
            $('.modal').show();
            e.preventDefault();
        });
        $("#modalClose").on("click", function(e) {
            var wrapper = $("#video-modal");
            $(wrapper).html('');
            $('.modal').hide();
            e.preventDefault();
        });

        $("#v-play-btn").on("click", function(e) {
            var vidWrap = $(".video-box");
            var customFrame = '<iframe src=' + 'https://www.youtube.com/embed/CTUd15B5rGc?si=BJISJXGYcQXGNvSf' + ' width="100%" height="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>';
            $('.v-section-right').addClass('open');
            $(vidWrap).append(customFrame);
            $('#v-close-btn').show();
            $('#v-play-btn').hide();
            e.preventDefault();
        });

        $("#v-close-btn").on("click", function(e) {
            var vidWrap = $(".video-box");
            $('.v-section-right').removeClass('open');
            $(vidWrap).html('');
            $('#v-close-btn').hide();
            $('#v-play-btn').show();
            e.preventDefault();
        });
    </script>

</body>

</html>