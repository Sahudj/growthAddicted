<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/ourcustom/ourcustom.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>{{$courseName}}</title>
  <script>
    let activeid = 1;
  </script>
</head>

<body>
  <div class="all-courses-page">
    <div class="all-courses-wrap">


      <div class="all-courses-nav">
        <div class="left">
          <button onclick="history.back()">
            <span class="material-symbols-outlined">
              arrow_back
            </span>
          </button>
          <h3>{{$courseName}}</h3>
        </div>
      </div>


      <div class="stream-wrap">
        <div class="streaming-container">
          <div class="streaming-left">
            <div class="video-container">
              <div id="video"></div>
            </div>
            <div class="title-container">
              <h2>{{$courseName}} Chapter <span id="keyval"></span></h2>
              <a title="click here to download" href="{{url('user/generatePDF/'.$courseName)}}" class="mb-6 btn waves-effect waves-light purple lightrn-1">
                <img width="30" height="30" src="{{url('public/admin')}}/app-assets/images/user/dwnldcert.gif" alt="icon">
              </a>
            </div>

          </div>
          <div class="streaming-right">
            <div class="stream-right-wrap">
              <div class="filter">

              </div>
              @if(isset($assetsIds) && !empty($assetsIds))
              <div class="chapters-list">
                <ul class="chapters">
                  @foreach($assetsIds ?? '' as $key => $row)

                  <a href="javascript:void(0)" id="videoId" data-iframUrl="https://play.gumlet.io/embed/{{$row}}" onclick="return showVideo('https://play.gumlet.io/embed/{{$row}}',{{$key}})">
                    <li class="collection-item avatar">
                      <span class="material-symbols-outlined">
                        play_circle
                      </span>
                      <h4>Chapter - 0{{$key+1}} </h4>
                    </li>
                  </a>
                  @endforeach
                </ul>

              </div>
              @else
              <p>No Chapters Available</p>
              @endif

            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <script src="{{url('public/frontend/home/')}}/assets/js/jquery.min.js"></script>
</body>

</html>




<!-- <script type="text/javascript">
  
  $(document).ready(function() {
    videoId = "https://play.gumlet.io/embed/{{$assetsIds[0]}}";
    
    showVideo(videoId)

  })

  function showVideo(videoId, key = 0) {
    activeid=key+1;
    $('#video').html();
    var videoHtml = '<iframe loading="lazy" src="' + videoId + '?autoplay=1" style="border:none; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture; fullscreen;" frameborder="0" allowfullscreen></iframe>';
    $('#keyval').html(key > 9 ? key + 1 : '0' + (key + 1))
    $('#video').html(videoHtml);
  }
</script> -->

<script type="text/javascript">
  $(document).ready(function() {
    // Automatically show the first video
    if (typeof $assetsIds !== 'undefined' && $assetsIds.length > 0) {
      showVideo("https://play.gumlet.io/embed/{{$assetsIds[0]}}", 0);
      $('.chapters a').eq(0).addClass('active');
    }
  });

  function showVideo(videoId, key = 0) {
    activeid = key + 1;
    $('#video').html();
    var videoHtml = '<iframe loading="lazy" src="' + videoId + '?autoplay=1" style="border:none; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture; fullscreen;" frameborder="0" allowfullscreen></iframe>';
    $('#keyval').html(key > 9 ? key + 1 : '0' + (key + 1));
    $('#video').html(videoHtml);

    // Remove active class from all links
    $('.chapters a').removeClass('active');

    // Add active class to the clicked link
    $('.chapters a').eq(key).addClass('active');
  }
</script>