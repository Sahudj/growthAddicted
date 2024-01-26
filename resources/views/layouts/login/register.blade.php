<!DOCTYPE html>
<html>

<head>
    <title>Growthaddicted sign-up</title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/frontend/login')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('public/frontend/login')}}/assets/css/style.css">
    <!----------- favicon link --------->
    <!-- <link rel="shortcut icon" href="assets/images/Logo.ico" type="image/x-icon"> -->
    <link rel="shortcut icon" type="image/png" href="{{url('public/frontend/login')}}/assets/images/favicon.png">
      <script src="{{url('backend')}}/plugins/jquery/jquery.min.js"></script>
</head>

<body>
  @yield('content')
  <!--------------- preloader start here ----------->
  <div class="ga_loader_wrapper">
        <div class="ga_loader">
            <img src="{{url('public/frontend/login')}}/assets/images/loader.gif" alt="">
        </div>
    </div>
    <!--------------- preloader end here ----------->
    <script src="{{url('public/frontend/login')}}/assets/js/jquery.js"></script>
    <script src="{{url('public/frontend/login')}}/assets/js/custom.js"></script>
</body>

</html>