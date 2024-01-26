@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <h4>View Webinar details</h4>
                  <div class="responsive-table">
                    
                        <div class="col s12 m6 l4">
                            <div class="card">
                              <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{url('public/webinar/thumbnail/'.$getDetails->thumbnail)}}" alt="office">
                              </div>
                              <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Topic : {{$getDetails->topic}}
                                </span>
                                  <span class="card-title activator grey-text text-darken-4">Date : {{$getDetails->webinar_date}}
                                </span>
                                  <span class="card-title activator grey-text text-darken-4">Trainer : {{$getDetails->trainer}}
                                </span>
                                  <span class="card-title activator grey-text text-darken-4">Meeting Id : {{$getDetails->meeting_id}}
                                </span>
                                  <span class="card-title activator grey-text text-darken-4">Password : {{$getDetails->password}}
                                </span>
                                <a href="{{$getDetails->meeting_url}}" target="_blank" class="mb-6 btn waves-effect waves-light purple lightrn-1" title="Click to view details">Click here to join</a>
                                 <a href="javascript:void(0)" onclick="copyText('{{$getDetails->meeting_url}}')" class="mb-6 btn waves-effect waves-light green lightrn-1" title="Click to view details">Click here to copy</a>
                              </div>
                            
                            </div>
                           
                          </div>

                        
                    </div>
                  </div>
                </div>

              </div>
             </div>
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <script type="text/javascript">
        function copyText(text){
        var inp =document.createElement('input');
        document.body.appendChild(inp)
        inp.value = text;
        inp.select();
        document.execCommand('copy',false);
        inp.remove();
}

      </script>

@endsection           
