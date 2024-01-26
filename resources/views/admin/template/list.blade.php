@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">

                      @if(session()->has('message'))
                        @if($message = Session::get('message'))
                          <div class="card-alert card gradient-45deg-green-teal">
                          <div class="card-content white-text">
                            <p>
                              <i class="material-icons">check</i> SUCCESS : {{ $message }}.</p>
                          </div>
                          <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                          @endif
                        @endif
                        
                  <div class="col s12 display-flex justify-content-end mt-3">
                <a href="{{url('admin/email-template/')}}" class="mb-3 btn waves-effect waves-light purple lightrn-1">  Add Template</a>
            </div>
                    <div class="row">
  
                     <div class="responsive-table">
                        <table id="users-list-datatable" class="table">
                          <thead>
                            <tr>
                              <th>Id</th>
                             <th>Title</th>
                             <th>Subject</th>
                             <th>Message</th>
                             <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $id = 1; ?>
                          @foreach($templates as $row)
                            <tr>
                              <td>{{$id++ }}</td>
                              <td>{{$row->title}}</td>
                              <td>{{$row->subject}}</td>
                              <td>{!! $row->message !!}</td>
                             
                              <td>
                                  <a  href="{{url('admin/delete-template/'.$row->id)}}"><i class="material-icons">delete</i></a>
                              </td>
                            </tr>
                          @endforeach
                           
                          </tbody>
                        </table>
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
