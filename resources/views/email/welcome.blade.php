<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@300;400;500;700;800&display=swap"
        rel="stylesheet">

    <title>Welcome to Growth addicted</title>
    <style>
        body {
            margin: 0;
            font-family: 'Alegreya Sans', sans-serif;
            overflow-x: hidden;
        }

        table {
            border-spacing: 0;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        ol li {
            color: #ffffff;
        }

        .wrapper {
            width: 100%;
            table-layout: fixed;
            /* padding-bottom: 60px; */
        }

        .main {
            width: 100%;
            max-width: 600px;
            box-shadow: 0 0 25px rgba(0, 0, 0, .15);
            background-image: url(https://growthaddicted.com/public/mail/assets/images/mail/img-02.png);
        }

        .two-columns {
            font-size: 0;
        }

        .two-columns .column {
            width: 100%;
            max-width: 300px;
            display: inline-block;
            vertical-align: top;
        }

        p {
            color: #ffff;
            font-size: 20px;
            font-weight: 600;
            text-transform: uppercase;
        }

        h1 {
            text-align: center;
            color: #ffff;
            font-size: 30px;
            font-weight: 800;
            padding: 24px 0px 0px 0px;
            text-transform: uppercase;
        }

        h1 span {
            color: #c41c98;
            font-size: 30px;
            font-weight: 800;
            text-transform: uppercase;
        }

       
    </style>
</head>

<body>
    <center class="wrapper">
        <table class="main" width="100%">
            <!-- heading -->
            <tr>
                <td>
                    <h1>Welcome to the <span>Growth addicted</span></h1>
                </td>
            </tr>

            <!-- logo section -->
            <tr>
                <td style="padding:14px 0 4px;">
                    <table width="100%">
                        <tr>
                            <td class="two-columns">
                                <table class="column">
                                    <tr>
                                        <td class="logo" style="padding: 0 22px 10px;">
                                            <img src="{{url('public/mail/')}}/assets/images/mail-logo.png" alt="" width="250px">

                                        </td>
                                    </tr>

                                </table>

                                <table class="column">
                                    <tr>
                                        <td class="img-box">
                                            <img src="{{url('public/mail/')}}/assets/images/mail/img-01.png" alt="" width="250px"
                                                max-width:100%;>

                                        </td>
                                    </tr>

                                </table>

                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

            <!-- center text -->
            <tr>
                <td style="padding:5px;">
                    <table width="100%">
                        <tr>
                            <td>
                                <p style="padding:5px 26px;" class="mail-cong">Congratulations ! We Welcome you to growth addicted, <strong>{{ucfirst($dataArr['customer_name'])}}</strong> ! </p>
                                <p style="padding:0px 26px;">You're a great addition to the team, and we know you'll
                                    accomplish amazing things here.</p>
                                <p style="padding:0px 26px;">We are looking forward to support you along the way.”</p>
                                <p style="padding:0px 26px;
                                margin: 0 auto;
                                text-align: center;">“KUDOS!! to you for taking this step towards your journey of
                                    success, and sending you loads of good wishes for your future."</p>
                            </td>
                        </tr>

                    </table>

                    <table width="100%">
                        <tr>
                            <td>
                                <ol type="1" style="padding:18px 39px ; ">
                                    <li style="max-width: 400px;
                                    width: 100%;
                                    text-transform: uppercase; padding-bottom: 17px; text-transform: uppercase;font-weight: 800;">Login In Your Account With This Link - <a href="https://growthaddicted.com/login" style="text-transform: initial; color: yellow; text-decoration: none;"><strong>Login</strong></a>
                                    </li>
                                    <li style="text-transform: uppercase;
                                    font-weight: 800;">Watch "Pop Up" Video Till End </li>
                                </ol>
                                <p style="text-align: center;">Need Support ?</p>
                                <p style="text-align: center;">Whatsapp Us - +918962479929</p>
                                <p style="padding: 0px 25px ;">Thank you,</p>
                                <p style="padding: 0px 25px;">Team Growth Addicted</p>

                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

        </table>

    </center>


</body>

</html>