@extends('layouts.admin')

@section('content')

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
            
                <div class="row">
                  <?php $socialIcons = DB::table('setting')->where('status', 1)->get(); ?>
                       @foreach($socialIcons as $row)
                        <a class="socialClass" href="{{$row->meta_value}}"><img src="{{url('public/social/'.$row->meta_key.'.png')}}" width="40px" /> </a>
                       
                        @endforeach
                    
                </div>
                  
                </div>

              </div>
             </div>
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->


@endsection           
