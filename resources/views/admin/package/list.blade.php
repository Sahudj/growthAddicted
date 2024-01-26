@extends('layouts.admin')

@section('content')

   <section class="users-list-wrapper section">
      <div class="users-list-table">
    <div class="card">
      <div class="card-content">

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
        <!-- datatable start -->
 
            <div class="col s12 display-flex justify-content-end">
                <a href="{{route('packages.create')}}" class="mb-3 btn waves-effect waves-light purple lightrn-1"> <i class="material-icons">add</i> Add Package</a>
            </div>
 
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Name</th>
                                   <th>Description</th>
                                   <th>Amount</th>
                                   <th>Image</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                           <?php $i = count($packages); ?>
                            @foreach($packages as $row)
                               <tr>
                                  <td>{{$row->id }}</td>
                                  <td>{{$row->name}}</a></td>
                                  <td>{{$row->description}}</td>
                                  <td>{{$row->amount}}</td>
                                  <td> <img src="{{url('public/packages/'.$row->image)}}" width="100px"></td>
                                  <td>
                                   @if($row->status == 1)
                                    <span class="chip green lighten-5">
                                        <span class="green-text">Active</span>
                                    </span>
                                    @else
                                    <span class="chip red lighten-5">
                                        <span class="red-text">Inactive</span>
                                    </span>
                                    @endif
                                  </td>
                                  <td>
                                  <a href="{{route('packages.edit', $row->id)}}"><i class="material-icons">edit</i></a>
                                    
                                  </td>
                                </tr>
                            @endforeach
                            
                            @if(count($packages) == 0)
                             <tr>
                               <td colspan="8">
                                <div class="alert alert-danger tex-center">No Records Found !</div> 
                                </td>
                             </tr> 
                            @endif
                           </tbody>
                       </table>
                      
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

     </section>
<script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });    

    $('.editButton').click(function(e) {
        if(!confirm('Are you sure you want to edit this?')) {
            e.preventDefault();
        }
    });
</script>

@endsection           