@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="card-alert card purple">
                <div class="card-content white-text">
                  <p>Leaderboard</p>
                </div>
              </div>
                
                   <div id="loader" class="ajax-load text-center" style=" display: none; position : fixed;z-index: 100;background-color:rgb(210, 210, 210);opacity : 0.9;background-repeat : no-repeat;background-position : center;left : 0;bottom : 0;right : 0;top : 0;z-index: 999999; background-image : url('https://growthaddicted.com/loader.gif');" id="customAjaxLoader"></div>
          
                   <div class="row" id="post-data"></div>

                    <div class="row center">
                      <button id="load-more-btn" class="btn indigo" onclick="loadMoreData()">Load More</button>
                    </div>
          
                  
                </div>

              </div>
             </div>
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->




<script type="text/javascript">
  var page = 0;
  $(document).ready(function(){
    loadMoreData(page);
  })

  function loadMoreData(){
    page++;
    $.ajax(
          {
              url: 'leaderboards?page='+page,
              type: "get",
              beforeSend: function()
              {
                  $('.ajax-load').show();
              }
          })
          .done(function(data)
          {
              if(data.html == " "){
                  $('.ajax-load').html("No more records found");
                  return;
              }
              $('.ajax-load').hide();
              $("#post-data").append(data.html);
          })
          .fail(function(jqXHR, ajaxOptions, thrownError)
          {
                alert('server not responding...');
          });
  }
</script>

@endsection           
