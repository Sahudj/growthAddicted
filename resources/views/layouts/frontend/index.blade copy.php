<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Growthaddicted</title>
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/all.min.css">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/aos.css">
    <link rel="shortcut icon" type="image/png" href="{{url('public/frontend/home/')}}/assets/images/favicon.png">
</head>

<body>
    <div class="wc-copywrtting-wrapper" style="overflow-x:hidden">
        <!-- header section start -->
        <div class="wc-header-wrapper">
            <div class="container-fluid">
                <div class="wc-header-section">
                    <div class="row">
                        <div class="col-lg-3 col-md-5 col-sm-6 col-12">
                            <div class="wc-logo-img">
                                <img src="{{url('public/frontend/home/')}}/assets/images/Logo2.png" alt="logo-img">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7 col-sm-6 col-12">
                            <div class="wc-menu-wrapper">
                                <div class="wc-btn ">
                                    <a href="{{ url('signup') }}">Join Now</a>
                                </div>
                                <div class="wc-nav-menu">
                                    <ul class="">
                                        <li class="active"><a href="{{url('/')}}" data-hover="Home">Home</a></li>
                                        <li><a href="{{url('/about-us')}}" data-hover="About">About Us</a></li>
                                        <li><a href="{{url('/courses')}}" data-hover="Shop">Courses</a></li>
                                        @if(!auth()->user())
                                        <li><a href="{{ route('login') }}" data-hover="Page">Login</a></li>
                                        <li><a href="{{ url('contact-us') }}" data-hover="Blog">Contact Us</a></li>
                                        @endif

                                        @auth()
                                        @if(auth()->user()->role == 1)
                                        <li><a href="{{ url('admin/dashboard') }}" data-hover="Page">Dashboard</a></li>
                                        @else
                                        <li><a href="{{ url('user/dashboard') }}" data-hover="Page">Dashboard</a></li>
                                        @endif

                                        @endauth
                                    </ul>
                                </div>
                                <div class="wc-toggle-style17">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <main class="">
            @yield('content')
        </main>

        <div class="wc-footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3 aos-init aos-animate" data-aos="zoom-in-down" data-aos-duration="1100">
                        <div class="footer-logo ">
                            <a href="index.html"><img src="{{url('public/frontend/home/')}}/assets/images/3d-img/footer-logo.png" alt="logo"></a>
                            <p>Growth Addicted is more than a
                                platform, it is your trusted partner to help
                                you do what you do best: help as many
                                PEOPLE as possible TO fulfill their dreams
                                & get best career options.
                                Access to top learning on your finger tip.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 aos-init aos-animate" data-aos="zoom-in-down" data-aos-duration="1100">
                        <div class="footer-box footer-info">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-link">
                                <li><a href="{{url('/')}}">Disclaimer</a></li>
                                <li><a href="{{url('/refund-policy')}}">Refund Policy</a></li>
                                <li><a href="{{url('/faq')}}">FAQs</a></li>
                                <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
                                <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                                <li><a href="{{url('/terms-conditions')}}">Terms & Conditions</a></li>
                                <li><a href="{{url('/')}}">Msme Certificate</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 aos-init aos-animate" data-aos="zoom-in-down" data-aos-duration="1100">
                        <div class="footer-box">
                            <h3 class="footer-title">
                                Get in Touch
                            </h3>
                            <div class="wc-flex-footer">
                                <div class="footer-mail-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                        <path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" />
                                    </svg>
                                </div>
                                <div class="footer-main-link">
                                    <a href="#">care@growthaddicted.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 aos-init aos-animate" data-aos="zoom-in-down" data-aos-duration="1100">
                        <div class="footer-box">
                            <h3 class="footer-title">Latest Updates</h3>
                            <form class="form-group">
                                <input class="form-control" type="text" placeholder="Your Email Address" required="">
                                <button class="btn-small" type="submit">Subscribe</button>
                            </form>
                            <ul class="footer-social">
                                <li><a href="https://www.facebook.com/groups/549766590256463/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                                        </svg></a></li>
                                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                                        </svg></a></li>
                                <li><a href="https://instagram.com/growthaddicted.official?igshid=YmMyMTA2M2Y="><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                        </svg></a></li>
                                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                                        </svg></a></li>
                                <li><a href="https://www.youtube.com/channel/UCGDfFz8ubROUpZbVxvAefWg">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                            <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                                        </svg></a></li>
                            </ul>
                        </div>
                    </div>
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