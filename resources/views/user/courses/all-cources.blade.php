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
              <h2>Chapter <span id="keyval"></span></h2>
              <div class="btns">
                <button id="opennotes"> <div class="iref-ico" id="iref-ico"><p>Create Notes</p><span class="material-symbols-outlined">keyboard_arrow_down</span></div> <span class="material-symbols-outlined">description</span></button>
                <!-- <a title="click here to download" href="{{url('user/generatePDF/'.$courseName)}}" class="mb-6 btn waves-effect waves-light purple lightrn-1">
                <img width="30" height="30" src="https://img.icons8.com/fluency-systems-regular/96/certificate--v1.png" alt="certificate--v1"/>
                </a> -->
              </div>
            </div>

          </div>
          <div class="streaming-right">
            <div class="stream-right-wrap">
              <div class="filter">

              </div>
              <div class="notes-container" id="notescontainer">
                <h1>Notes<button id="closenotes"><span class="material-symbols-outlined">close</span></button></h1>
                <textarea id="noteArea" placeholder="Write your notes here..."></textarea>
                <br>
                <div class="btns">
                  <button id="clearNote"><span class="material-symbols-outlined">delete</span></button>
                  <button id="saveNote"><span class="material-symbols-outlined">download</span></button>
                </div>
              </div>
              <div class="chapter-head">
                <h4>Chapters</h4>
                <span class="material-symbols-outlined">
                  subject
                </span>
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
                      <h4>Chapter - {{$key>8?$key+1:('0'.$key+1)}} </h4>
                      <div class="nw-play">
                        <h4>Chapter - {{$key>8?$key+1:('0'.$key+1)}} </h4>
                        <h3>Now Playing</h3>
                      </div>
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
    $('#iref-ico').hide();
    if (typeof $assetsIds !== 'undefined' && $assetsIds.length > 0) {
      showVideo("https://play.gumlet.io/embed/{{$assetsIds[0]}}", 0);
      $('.chapters a').eq(0).addClass('active');
    }
  });

  function showVideo(videoId, key = 0) {
    $('#iref-ico').slideDown();
    setTimeout(()=>{$('#iref-ico').slideUp()},5000);
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
<script>
  // Save note to localStorage on change
  $(document).ready(function() {
    const noteArea = $('#noteArea');
    const notecontainer = $('#notescontainer');
   
    notecontainer.hide()

    // Load the saved note from localStorage on page load
    noteArea.val(localStorage.getItem('savedNote') || '');

    // Save the note to localStorage on input change
    noteArea.on('input', function() {
      localStorage.setItem('savedNote', noteArea.val());
    });

    // Download the note as a .txt file
    $('#saveNote').on('click', function() {
      const noteContent = noteArea.val();
      const blob = new Blob([noteContent], {
        type: 'text/plain'
      });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'note.txt';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      URL.revokeObjectURL(url);
    });
    $('#clearNote').on('click', function() {
      noteArea.val('');
      localStorage.removeItem('savedNote');
    });
    $('#closenotes').on('click', function() {
      notecontainer.slideUp(500);
      localStorage.removeItem('savedNote');
    });
    $('#opennotes').on('click', function() {
      notecontainer.slideDown(500);
    });
  });
</script>