@extends('layouts.admin')

@section('content')

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <h4>{{$courseName}}</h4>
                <hr>
                <div class="row ">

                  <div class="col l8 m12 mb-5">
                    <div style="padding:56.25% 0 0 0;position:relative;" id="video"></div>
                  </div>
                  
                  <div class="col l4 m12 hide-on-small-only right-content border-radius-6 mb-5" style="height: 350px; overflow-x: auto;">
                    @if(isset($assetsIds) && !empty($assetsIds))


                    <ul class="collection mb-0">
                        @foreach($assetsIds ?? '' as $key => $row)

                        <a href="javascript:void(0)" id="videoId" data-iframUrl="https://play.gumlet.io/embed/{{$row}}" onclick="return showVideo('https://play.gumlet.io/embed/{{$row}}')">
                          <li class="collection-item avatar" style="padding-left: 10px;">
                          <div>
                            <img src="https://video.gumlet.io/64b7dbbefccf18bce938d682/{{$row}}/thumbnail-1-0.png" width="250px" height="150px">
                          </div>
                             <br> <small>Chapter - 0{{$key+1}} </small>
                             <br> <small>growthaddicted.com</small>
                          </li>
                      </a>
                        @endforeach
                      </ul>
                    @endif

                  </div>

                <div class="row hide-on-large-only">
                   <ul>
                      @foreach($assetsIds ?? '' as $key => $row)
                        <li>
                           <div style="padding:56.25% 0 0 0;position:relative; padding-bottom: 10px;">
                            <iframe loading="lazy" title="Gumlet video player" src="https://play.gumlet.io/embed/{{$row}}" style="border:none; position: absolute; top:0; left:0; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture; fullscreen;" frameborder="0" allowfullscreen>
                            </iframe>
                          </div>
                           Chapter - 0{{$key+1}}
                          </li>
                        @endforeach
                   </ul>
                 </div>

                 </div>
                 <div class="row" style="display:block">
                    <a title="click here to download" href="{{url('user/generatePDF/'.$courseName)}}" class="mb-6 btn waves-effect waves-light purple lightrn-1"> Download Certificate</a>
                  </div>
                  
                </div>
              </div>
             </div>
            </div>
          </div>

<script type="text/javascript">

$(document).ready(function(){
videoId = "https://play.gumlet.io/embed/{{$assetsIds[0]}}";
  showVideo(videoId)  
    
})

  function showVideo(videoId){
    $('#video').html();
    var videoHtml ='<iframe loading="lazy" src="'+videoId+'?autoplay=1" style="border:none; position: absolute; top:0; left:0; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture; fullscreen;" frameborder="0" allowfullscreen></iframe>';
    $('#video').html(videoHtml);

  }

</script>

@endsection           
