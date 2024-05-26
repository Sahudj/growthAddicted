<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Growthaddicted</title>
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/all.min.css">
    <!-- <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/our-style.min.css?<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/our-style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>


    <div class="main-section">
        <div class="main-wrapper">

            <div class="nav-side-bar" id="navsidebar">
                <div class="close-btn" id="clsbtn">
                    <button>
                        <span class="material-symbols-outlined">
                            close
                        </span>
                    </button>
                </div>
                <ul class="menu">
                    <li class="item">
                        <a href="{{url('/')}}">HOME</a>
                    </li>
                    <li class="item">
                        <a href="{{url('/')}}">ABOUT</a>
                    </li>
                    <li class="item">
                        <a href="{{url('/')}}">COURSES</a>
                    </li>
                    <li class="item">
                        <a href="{{url('/')}}">CAREERS</a>
                    </li>
                    @if(!auth()->user())
                    <li class="item">
                        <a href="{{ url('login') }}" class="login">LOGIN</a>
                    </li>
                    <li class="item">
                        <a href="{{ url('signup') }}" class="sign-up">SIGN UP</a>
                    </li>
                    @endif

                    @auth()
                    @if(auth()->user()->role == 1)
                    <li class="item">
                        <a href="{{ url('admin/dashboard') }}" class="login">Dashboard</a>
                    </li>
                    @else
                    <li class="item">
                        <a href="{{ url('user/dashboard') }}" class="login">Dashboard</a>
                    </li>
                    @endif

                    @endauth
                </ul>

            </div>

            <!-- NAV BAR START HERE  -->
            <div class="nav-bar" id="navbar">
                <div class="nav-bar-wrap">
                    <div class="nav-wrap-left">
                        <img class="logo" src="{{url('public/frontend/home/')}}/assets/images/Logo2.png" alt="logo-img">
                    </div>
                    <div class="nav-wrap-middle">
                        <ul class="menu">
                            <li class="item">
                                <a href="{{url('/')}}">HOME</a>
                            </li>
                            <li class="item">
                                <a href="{{url('/')}}">ABOUT</a>
                            </li>
                            <li class="item">
                                <a href="{{url('/')}}">COURSES</a>
                            </li>
                            <li class="item">
                                <a href="">CAREERS</a>
                            </li>

                        </ul>
                    </div>
                    <div class="nav-wrap-right">
                        @if(!auth()->user())
                        <div class="action-btn">
                            <a href="{{ url('signup') }}" class="sign-up">SIGN UP</a>
                        </div>
                        <div class="action-btn">
                            <a href="{{ url('login') }}" class="login">LOGIN</a>
                        </div>
                        @endif

                        @auth()
                        @if(auth()->user()->role == 1)
                        <div class="action-btn">
                            <a href="{{ url('admin/dashboard') }}" class="login">Dashboard</a>
                        </div>
                        <div class="action-btn">
                            <a href="{{ url('signup') }}" class="shoping">
                                <span class="material-symbols-outlined">shopping_cart</span>
                            </a>
                        </div>
                        @else
                        <div class="action-btn">
                            <a href="{{ url('user/dashboard') }}" class="login">Dashboard</a>
                        </div>
                        <div class="action-btn">
                            <a href="{{ url('signup') }}" class="shoping">
                                <span class="material-symbols-outlined">shopping_cart</span>
                            </a>
                        </div>
                        @endif

                        @endauth


                        <div class="menu-btn">
                            <button id="sdbaropenbtn">
                                <span class="material-symbols-outlined">
                                    menu
                                </span>
                            </button>
                            <div class="action-btn">
                                <a href="{{ url('signup') }}" class="shoping">
                                    <span class="material-symbols-outlined">shopping_cart</span>
                                </a>
                            </div>
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
                        <p>&copy; {{ date('Y') }} Growth Addicted. All rights reserved.</p>
                    </div>
                    <div class="cols2">
                        <h1>INFORMATION</h1>
                        <ul>
                            <li><a href="{{url('/disclamer')}}">Disclaimer</a></li>
                            <li><a href="{{url('/refund-policy')}}">Refund Policy</a></li>
                            <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{url('/terms-conditions')}}">Terms & Conditions</a></li>
                            <li><a href="{{url('public/frontend/home/')}}/assets/images/msmecertificate.pdf" target="_blank">Msme Certificate</a></li>
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
                                </span> Digamber Jain Mandir, 31, Panchsheel Nagar, Main Road Number 2, Tulsi Nagar, Bhopal, Bhopal, Madhya Pradesh, 462003
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



    <script src="{{url('public/frontend/home/')}}/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->
    <script src="{{url('public/frontend/home/')}}/assets/js/aos.js"></script>
    <script src="{{url('public/frontend/home/')}}/assets/js/coustom.js"></script>

    <!-- <script>
        AOS.init();
        var windowWidth = window.innerWidth;

        $(document).ready(function() {
            var navbar = $('#navbar');
            var bottombuybtn = $('#bbnb');
            var lastScrollTop = 0;
            var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
            console.log("ISIOS",isIOS);
            if (!isIOS) {
                $(window).scroll(function() {

                    var scrollTop = $(this).scrollTop();


                    if (scrollTop > lastScrollTop) {

                        navbar.css('top', -navbar.outerHeight());
                    } else {

                        navbar.css('top', 0);
                    }

                    lastScrollTop = scrollTop;
                });
            }


            $(window).scroll(function() {
                if ($(window).scrollTop() >= 80) {
                    navbar.addClass('scrolled');
                    bottombuybtn.addClass('scrolled');
                } else {
                    navbar.removeClass('scrolled');
                    bottombuybtn.removeClass('scrolled');

                }
            });
        });

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: windowWidth <= 960 ? 1 : 3,
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
            // Define an array to hold all the target elements and their animations
            const targets = [{
                    id: 'whygrthaddicted',
                    animations: [{
                            id: 'animval1',
                            start: 0,
                            end: 100
                        },
                        {
                            id: 'animval2',
                            start: 0,
                            end: 200
                        },
                        {
                            id: 'animval3',
                            start: 0,
                            end: 25
                        }
                    ]
                },
                {
                    id: 'alsc',
                    animations: [{
                            id: 'alsc1',
                            start: 0,
                            end: 5
                        },
                        {
                            id: 'alsc2',
                            start: 0,
                            end: 25
                        },
                        {
                            id: 'alsc3',
                            start: 0,
                            end: 100
                        }
                    ]
                },
                {
                    id: 'dses',
                    animations: [{
                            id: 'dses1',
                            start: 0,
                            end: 4
                        },
                        {
                            id: 'dses2',
                            start: 0,
                            end: 25
                        },
                        {
                            id: 'dses3',
                            start: 0,
                            end: 100
                        }
                    ]
                },
                {
                    id: 'pesc',
                    animations: [{
                            id: 'pesc1',
                            start: 0,
                            end: 6
                        },
                        {
                            id: 'pesc2',
                            start: 0,
                            end: 25
                        },
                        {
                            id: 'pesc3',
                            start: 0,
                            end: 100
                        }
                    ]
                },
                {
                    id: 'iesc',
                    animations: [{
                            id: 'iesc1',
                            start: 0,
                            end: 10
                        },
                        {
                            id: 'iesc2',
                            start: 0,
                            end: 25
                        },
                        {
                            id: 'iesc3',
                            start: 0,
                            end: 100
                        }
                    ]
                }
            ];

            // Create a single Intersection Observer to handle all targets
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    const target = targets.find(t => t.id === entry.target.id);
                    if (entry.isIntersecting && target) {
                        // If the div is in the viewport, add animations
                        target.animations.forEach(animation => {
                            animateValue(document.getElementById(animation.id), animation.start, animation.end, 1000);
                        });
                        // Add any other animations or modifications as needed
                    }
                });
            }, {
                // Set the root to 'null' for the viewport
                root: null,
                // Set a threshold for when the callback should be triggered
                threshold: 0.5
            });

            // Start observing each target element if it exists
            targets.forEach(target => {
                const animatedDiv = document.getElementById(target.id);
                if (animatedDiv) {
                    observer.observe(animatedDiv);
                } else {
                    console.error(`Target element with ID '${target.id}' not found.`);
                }
            });
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
            direction: "horizontal",
            autoplay: {
                delay: 5000,
                disableOnInteraction: windowWidth <= 960 ? false : true,
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
            var customFrame = '<iframe src=' + href + ' width="100%" height="100%" frameborder="0" scrolling="no" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
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
        // Side Bar 
        $("#sdbaropenbtn").on("click", function(e) {
            var sideBar = $("#navsidebar");
            sideBar.addClass('open');
            e.preventDefault();
        });
        $("#clsbtn").on("click", function(e) {
            var sideBar = $("#navsidebar");
            sideBar.removeClass('open');
            e.preventDefault();
        });
        $("#navsidebar > .menu > .list > a").on("click", function(e) {
            var sideBar = $("#navsidebar");
            sideBar.removeClass('open');
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

        $("#madhu").on("click", function(e) {
            e.preventDefault(); // Prevent the default behavior of the link

            var wrapper = $("#video-modal");
            var href = $(this).attr("href");

            // Embed YouTube video URL with autoplay
            var videoUrl = "https://www.youtube.com/embed/dH5GnjVT7Lc?si=-xJinpQZUYQFsiaB";

            // Create an iframe element with the YouTube video URL
            var customFrame = '<iframe width="100%" height="100%" src="' + videoUrl + '" frameborder="0" allowfullscreen></iframe>';

            // Append the iframe to the modal wrapper
            $(wrapper).html(customFrame);

            // Show the modal
            $('.modal').show();
        });
        $("#sanchi").on("click", function(e) {
            e.preventDefault(); // Prevent the default behavior of the link

            var wrapper = $("#video-modal");
            var href = $(this).attr("href");

            // Embed YouTube video URL with autoplay
            var videoUrl = "https://www.youtube.com/embed/epiLga8m36M?si=CQFxNm2fMHBnUGwQ";

            // Create an iframe element with the YouTube video URL
            var customFrame = '<iframe width="100%" height="100%" src="' + videoUrl + '" frameborder="0" allowfullscreen></iframe>';

            // Append the iframe to the modal wrapper
            $(wrapper).html(customFrame);

            // Show the modal
            $('.modal').show();
        });

        // Add another event handler to close the modal
        $("#close-modal-btn").on("click", function(e) {
            var wrapper = $("#video-modal");
            $(wrapper).html(''); // Remove the iframe content
            $('.modal').hide(); // Hide the modal
        });
    </script> -->

</body>

</html>