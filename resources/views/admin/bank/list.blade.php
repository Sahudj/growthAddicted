@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <p> All Pending Listing</p>

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

                       @if(session()->has('error'))
                        @if($message = Session::get('error'))
                          <div class="card-alert card red">
                          <div class="card-content white-text">
                            <p>
                              <i class="material-icons">check</i> Error : {{ $message }}.</p>
                          </div>
                          <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                          @endif
                        @endif
                        
                  
                    <div class="row">
                     <div class="responsive-table">
                        <table id="users-list-datatable" class="table">
                          <thead>
                            <tr>
                              <th>Id</th>
                             <th>User Name</th>
                             <th>Bank Name</th>
                             <th>Account No</th>
                             <th>IFSC code</th>
                             <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $id = 1; ?>
                          @foreach($bankRequest as $row)
                            <tr>
                              <td>{{$id++ }}</td>
                              <td>{{$row->name}}</td>
                              <td>{{$row->bankName}}</td>
                              <td>{{$row->account_no}}</td>
                              <td>{{$row->ifsc_code}}</td>
                              <td>
                                  <a class="mb-3 btn waves-effect waves-light purple lightrn-1" href="{{url('admin/change-bank-details/'.$row->id)}}">Approve</a>
                                   <a class="mb-3 btn waves-effect waves-light red lightrn-1" href="{{url('admin/reject-bank-request/'.$row->id)}}">Reject</a>
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
