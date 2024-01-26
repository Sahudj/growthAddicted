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
                                      <i class="material-icons">check</i> SUCCESS : {{ $message }}</p>
                                  </div>
                                  <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                          @endif
                        @endif
                  
                  <h4> {{($type == 1) ? "Today's Earning Listing" : (($type == 4) ? "Yesterday Send Earning Listing" : "30 Days Earning" )  }} </h4>
                  
                 
                     <table id="users-list-datatable" class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Amount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          @if(isset($getDetails) && !empty($getDetails))
                            @foreach($getDetails as $row)
                              <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->mobile_no}}</td>
                                <td>{{$row->amount}}</td>
                                <td>
                                  <a style="padding: 0 1em;" class="btn btn-sm waves-effect waves-light blue lightrn-1" href="{{url('admin/view-payout/'.$row->id)}}" ><i class="material-icons dp48">remove_red_eye</i></a>
                                
                                </td>
                              </tr>
                            @endforeach
                          @endif
                             
                        </tbody>
                      </table>
                    <input type="hidden" name="userData" id="checkJobIds">
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

         function checkRowsCheckboxes(){
            var chkStatus = $('.actionAllCheckbox').is(':checked');
            if(chkStatus){
              setTimeout(function(){
                $('.approveBill').trigger('click');
                $('.approveBill').prop('checked', true);

               }, 1000);
          }else{
                $('.approveBill').trigger('click');
                $('.approveBill').prop('checked', false);
                $('#checkJobIds').val('');
            }
        }


        function checkboxData(){
          var chkedArr = [];
          $('.approveBill').each(function(){
              var chkStatus = $(this).is(':checked');
              var getVal = $(this).val();
              if(chkStatus){
                  chkedArr.push(getVal);
              }
          });
          chkedArr = chkedArr.join(',');
          $('#checkJobIds').val(chkedArr);
        }


        function sendBulkPayout(){
          var id = $('#checkJobIds').val();
          if(id == ''){
            alert('Please choose any item .');
            return false;
          }
          
          $.ajax({
              url: '{{url("/admin/send-bulk-payout")}}',
              type:'post',
              data: {"_token": "{{ csrf_token() }}", userData : id},
              success: function(data){
                console.log(data);
               }
           });
            return false;
          }

      </script>

@endsection           
