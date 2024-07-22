<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/ourcustom/ourcustom.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>GrowthAddicted/Subcourses</title>
</head>

<body>
    <?php
    function encryptor($action, $string)
    {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'aman#$gyan13*&som@$#';
        $secret_iv = 'aman#$gyan13*&som@$#';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        //do the encyption given text/string/number
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
    ?>

    <div class="subcourses-page">
        <div class="subcourses-wrap">
            <div class="sub-course-head">
                <h3>COURSES FOR PACKAGE</h3>
                <h1>{{ $name }}</h1>
            </div>

            <div class="courses-list">
                @if($courses->isEmpty())
                <p>No courses found for this package.</p>
                @else
                <ul>
                    @foreach($courses as $row2)
                    <li>
                        <a href="{{url('user/my-courses/'.encryptor('encrypt', $id)).'/'.encryptor('encrypt', $row2->sub_folder_id).'/'.encryptor('encrypt', $row2->sub_folder_name) }}" title="click here to enter into {{$row2->sub_folder_name}}">
                            <p>
                                {{$row2->sub_folder_name}}
                            </p>

                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif

            </div>

        </div>
    </div>

</body>

</html>