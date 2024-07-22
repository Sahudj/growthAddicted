<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/ourcustom/ourcustom.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
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

    <div class="search-page-courses">
        <div class="srch-page-wrap">
            <div class="srchnav">
                <div class="left">
                    <button onclick="history.back()">
                        <span class="material-symbols-outlined">
                            arrow_back
                        </span>
                    </button>
                </div>
                <div class="right">
                    <h2>Our Courses</h2>
                </div>
            </div>

            <div class="course-search-bar">

                <form method="GET" action="{{ url('user/search/course') }}">
                    <div class="search-bar">
                        <input type="text" name="search" placeholder="Search For Courses Here" value="{{ $searchKeyword }}">
                        <button type="submit">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            @if(!empty($category))
            <div class="category-name" style="margin: 20px 0;padding:0 25px;color:blue;font-family:var(--poppins);">
                Results For "{{$category}}"
            </div>
            @endif

            <div class="searched-courses-list">
                @if($courses->isEmpty())
                <p class="err">No courses found.</p>
                @else
                <ul id="courses-list">
                    @foreach($courses as $row2)
                    <li>
                        <a href="{{url('user/my-courses/').'/'.encryptor('encrypt', $row2->sub_folder_id).'/'.encryptor('encrypt', $row2->sub_folder_name) }}" title="click here to enter into {{$row2->sub_folder_name}}">
                            <i class="fas fa-random-icon"></i>
                            <p>{{$row2->sub_folder_name}}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif

            </div>


        </div>
    </div>


    <script>
        // List of Font Awesome icons to choose from
        const icons = [
            'fa-book',
            'fa-graduation-cap',
            'fa-chalkboard-teacher',
            'fa-laptop-code',
            'fa-flask',
            'fa-microscope',
            'fa-robot',
            'fa-palette',
            'fa-music',
            'fa-film',
            'fa-desktop',
            'fa-keyboard',
            'fa-code',
            'fa-brain',
            'fa-atom',
            'fa-lightbulb',
            'fa-globe',
            'fa-university',
            'fa-user-graduate',
            'fa-cogs',
            'fa-drafting-compass',
            'fa-calculator',
            'fa-glasses',
            'fa-ruler',
            'fa-book-open',
            'fa-language',
            'fa-pencil-alt',
            'fa-chalkboard',
            'fa-project-diagram',
            'fa-tablet-alt',
            'fa-database',
            'fa-server',
            'fa-network-wired',
            'fa-satellite-dish',
            'fa-cloud',
            'fa-cloud-upload-alt',
            'fa-cloud-download-alt',
            'fa-download',
            'fa-upload',
            'fa-sync-alt',
            'fa-vr-cardboard',
            'fa-gamepad',
            'fa-headset',
            'fa-mobile-alt',
            'fa-signal',
            'fa-tv',
            'fa-video',
            'fa-podcast',
            'fa-book-reader',
            'fa-chalkboard-teacher'
        ];

        // Function to get a random icon from the list
        function getRandomIcon() {
            return icons[Math.floor(Math.random() * icons.length)];
        }

        // Replace placeholder icons with random icons
        document.querySelectorAll('#courses-list li i').forEach(icon => {
            icon.classList.remove('fa-random-icon');
            icon.classList.add(getRandomIcon());
        });
    </script>

</body>

</html>