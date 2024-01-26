<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="assets/css/fonts.css"> -->
   <!--  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>certificate</title>
    
    <style>
        h1{
    font-family: 'IM Fell English SC', serif;
    font-size: 64px;
    color: rgb(17, 17, 16);
    text-transform: uppercase;
    margin-bottom: 0;
}
h3{
    font-size: 36px;
    font-weight: 400;
}
.cer-text{
    font-size: 22px;
}
.cer-sec{
    max-width: 1050px;
    position: relative;
    margin: 0 auto;
}
.bottom-line{
    border-bottom: 2px solid rgb(17, 17, 16);
    width: fit-content;
    padding-left: 25px;
    margin: 0 auto;
}
.certificate-wrap .cer-sec{
    background-color: rgb(239, 239, 239);
}
.inner-cer-sec{
    padding: 100px 15px 30px;
}
.limit-para{
    max-width: 440px;
    margin: 10px auto 0;
}
.inner-cer-sec p span{
    color: rgb(0, 74, 173);
}
.top-left-img{
    position: absolute;
    left: 0;
    top: 0;
    /* background-image: url('../images/shape-1.png'); */
    background-image: url(https://growthaddicted.com/public/certificate/assets/images/shape-1.png);
    width: 330px;
    height: 180px;
    background-repeat: no-repeat;
    background-size: contain;
    transform: rotateY(180deg);
    display: inline-block;
}

.top-right-img{
    content: '';
    position: absolute;
    right: 0;
    top: 0;
    /* background-image: url('../images/shape2.png'); */
    background-image: url(https://growthaddicted.com/public/certificate/assets/images/shape2.png);
    width: 150px;
    height: 150px;
    background-repeat: no-repeat;
    background-size: contain;
    transform: rotate(180deg);
}
.bottom-left-img{
    content: '';
    position: absolute;
    left: 0;
    top: 71%;
    bottom: 0;
    /* background-image: url('../images/shape2.png'); */
    background-image: url(https://growthaddicted.com/public/certificate/assets/images/shape2.png);
    width: 150px;
    height: 150px;
    background-repeat: no-repeat;
    background-size: contain;
}
.bottom-right-img{
    content: '';
    position: absolute;
    right: 0;
    bottom: 0;
    top: 79%;
    /* background-image: url('../images/shape4.png'); */
    background-image: url(https://growthaddicted.com/public/certificate/assets/images/shape4.png);
    width: 200px;
    height: 90px;
    background-repeat: no-repeat;
    background-size: contain;
    transform: rotateY(180deg);
}
.inner-cer-sec {
    text-align: center;
}
.wish-tagline{
    font-weight: 700;
}
.cer-avord-img {
    position: absolute;
    right: 8%;
    top: 15%;
}
.cer-para {
    position: absolute;
    top: 5px;
    right: 17%;
}
h2{
    font-family: 'Noto Serif Gujarati', serif;
    font-size: 55px;
    text-transform: uppercase;
    letter-spacing: 4px;
}
/* latin */
@font-face {
    font-family: 'IM Fell English SC';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url(https://fonts.gstatic.com/s/imfellenglishsc/v16/a8IENpD3CDX-4zrWfr1VY879qFF05pZ7PIIP.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  }

/* gujarati */
@font-face {
  font-family: 'Noto Serif Gujarati';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/notoserifgujarati/v21/hESt6WBlOixO-3OJ1FTmTsmqlBRUJBVkWBRjVDOw.woff2) format('woff2');
  unicode-range: U+0964-0965, U+0A80-0AFF, U+200C-200D, U+20B9, U+25CC, U+A830-A839;
}
/* latin-ext */
@font-face {
  font-family: 'Noto Serif Gujarati';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/notoserifgujarati/v21/hESt6WBlOixO-3OJ1FTmTsmqlBRUJBVkWAFjVDOw.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Noto Serif Gujarati';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/notoserifgujarati/v21/hESt6WBlOixO-3OJ1FTmTsmqlBRUJBVkWA9jVA.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* gujarati */
@font-face {
  font-family: 'Noto Serif Gujarati';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/notoserifgujarati/v21/hESt6WBlOixO-3OJ1FTmTsmqlBRUJBVkWBRjVDOw.woff2) format('woff2');
  unicode-range: U+0964-0965, U+0A80-0AFF, U+200C-200D, U+20B9, U+25CC, U+A830-A839;
}
/* latin-ext */
@font-face {
  font-family: 'Noto Serif Gujarati';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/notoserifgujarati/v21/hESt6WBlOixO-3OJ1FTmTsmqlBRUJBVkWAFjVDOw.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Noto Serif Gujarati';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/notoserifgujarati/v21/hESt6WBlOixO-3OJ1FTmTsmqlBRUJBVkWA9jVA.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* gujarati */
@font-face {
  font-family: 'Noto Serif Gujarati';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/notoserifgujarati/v21/hESt6WBlOixO-3OJ1FTmTsmqlBRUJBVkWBRjVDOw.woff2) format('woff2');
  unicode-range: U+0964-0965, U+0A80-0AFF, U+200C-200D, U+20B9, U+25CC, U+A830-A839;
}
/* latin-ext */
@font-face {
  font-family: 'Noto Serif Gujarati';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/notoserifgujarati/v21/hESt6WBlOixO-3OJ1FTmTsmqlBRUJBVkWAFjVDOw.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Noto Serif Gujarati';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/notoserifgujarati/v21/hESt6WBlOixO-3OJ1FTmTsmqlBRUJBVkWA9jVA.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
    </style>



</head>

<body>
    <div class="certificate-wrap">
        <div class="container position-relative p-0 my-3">
            <div class="cer-sec">
                <span class="top-left-img"></span>
                <span class="top-right-img"></span>
                <div class="inner-cer-sec">
                    <span class="bottom-left-img"></span>
                    <span class="bottom-right-img"></span>
                    <h2 style="margin: 0;">certificate</h2>
                    <h3 style="text-transform: uppercase; margin: 0;">of completion</h3>
                    <p class="text-uppercase cer-text" style=" font-family: 'Roboto', sans-serif; text-transform: uppercase;">This is presented to</p>
                    <h1 class="bottom-line">{{ strtoupper(auth()->user()->name)}}</h1>
                    <p class="limit-para" style="font-family: 'Roboto', sans-serif;">FOR COMPLETING THE <span>{{$title}} </span> COURSE FROM GROWTH ADDICTED</p>
                    <p class="mb-0" style="font-family: 'Roboto', sans-serif;">SUCCESSFULLY ON {{$date}}</p>
                    <h6 style="font-weight: 700px; font-family: 'Roboto', sans-serif; font-size: 18px; margin: 0; padding: 10px 0px 10px 0px;">WE WISH YOU ALL THE BEST FOR YOUR BRIGHT FUTURE</h6>
                    <div class="cert-img bottom-line">
                        <img src="https://growthaddicted.com/public/certificate/assets/images/sign-img.png" alt="" class="my-2">
                    </div>
                    <h5 style="font-size: 15px; font-family: 'Roboto', sans-serif; margin: 0; padding: 10px 0px 10px 0px; font-weight: 400; font-size: 22px;">Aman Upadhyay</h5>
                    <h5 style="font-family: 'Roboto', sans-serif; margin: 0; padding: 10px 0px 10px 0px; font-weight: 400; font-size: 21px;">(FOUNDER & CEO OF GROWTH ADDICTED)</h5>
                    <div class="cer-avord-img">
                        <img src="https://growthaddicted.com/public/certificate/assets/images/award-img-removebg-preview.png" alt="">
                    </div>
                    <div class="cer-para">
                        <p style=" font-family: 'Roboto', sans-serif; font-weight: 500;">CERTIFICATE NUMBER -<span>{{$certificateNo}}</span></p>
                    </div>
                     
                </div>
            </div>
             
        </div>
    </div>

</body>

</html>