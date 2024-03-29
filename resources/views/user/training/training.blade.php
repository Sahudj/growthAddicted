@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <h4>Trainings</h4>
                      @if(isset($training) && !empty($training))

                      @foreach($training as $row)
                        <div class="col s12 m3 16">
                          <a target="_blank" href="{{$row->youTubeLink}}">
                            <div class="card" style="width:200px">
                              <div class="card-image">
                              <img src="{{url('public/training/'.$row->thumbnail)}}" width="100px" alt="img12">
                              </div>
                            </div>
                          </a>
                        </div>
                      @endforeach
                      
                      @endif

                  </div>
                </div>

              </div>
             </div>
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

@endsection           
