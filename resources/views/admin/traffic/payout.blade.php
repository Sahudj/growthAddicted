@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                   <div id="loader" style=" display: none; position : fixed;z-index: 100;background-color:rgb(210, 210, 210);opacity : 0.9;background-repeat : no-repeat;background-position : center;left : 0;bottom : 0;right : 0;top : 0;z-index: 999999; background-image : url( {{url('public/loader.gif')}} " id="customAjaxLoader"></div>
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
                  
                  <h4> {{($type == 1) ? "Today's Payout Listing" : "Yesterday Send Payout Listing" }} </h4>
                  
                <?php
                    $amount =[];

                    foreach ($payouts as $row2) {
                      $amount[] = $row2->amount;                      
                    } ?>
                    <div class="row">
                        @if(isset($permission) && $permission->is_payouts == 1)
                          <div class="col s6"> 
                            <div class="card-alert card gradient-45deg-green-teal">
                              <div class="card-content white-text">
                                <p>Total Payout Amount : <strong>{{array_sum($amount)}}</strong> </p>
                              </div>
                            </div>
                          </div>
                          @endif

                          @if(isset($permission) && $permission->is_payouts == 1)
                          <div class="col s6">
                            <div class="col s12 display-flex justify-content-end mt-3">
                              <a href="javascript:void(0)" onclick="sendBulkPayout()" class="mb-3 btn waves-effect waves-light purple lightrn-1">SEND TO ALL PAYOUT </a>

                            </div>
                          </div>
                          @endif

                </div>

                     <table id="users-list-datatable" class="table">
                        <thead>
                          <tr>
                            <th><label><input type="checkbox"  class="actionAllCheckbox custom-control-input" onclick="checkRowsCheckboxes()" id="mycustomSwitch" /><span></span></label></th>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Amount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          @if(isset($payouts) && !empty($payouts))
                            @foreach($payouts as $row)
                            @if($row->amount != 0)
                              <tr>
                                 <td> <label><input type="checkbox" class="custom-control-input approveBill" value="{{$row->id.'__'.$row->amount}}" onclick="checkboxData()" id="customSwitch{{$row->id}}" /><span></span></label></td>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->mobile_no}}</td>
                                <td>{{$row->amount}}</td>
                                <td>
                                  @if($row->customer_id)
                                    @if($row->status == 1)
                                   @if(isset($permission) && $permission->is_payouts == 1)
                                      <a style="padding: 0 1em;" class="btn btn-sm waves-effect waves-light purple lightrn-1" href="{{url('admin/send-payout/'.$row->id.'/'.$row->amount)}}" ><i class="material-icons dp48">send</i></a>
                                     @endif
                                      <a style="padding: 0 1em;" class="btn btn-sm waves-effect waves-light blue lightrn-1" href="{{url('admin/view-payout/'.$row->id)}}" ><i class="material-icons dp48">remove_red_eye</i></a>
                                    @endif
                                 
                                    @else
                                    <a style="padding: 0 1em;" class="btn btn-sm waves-effect waves-light blue lightrn-1" href="{{url('admin/view-payout/'.$row->id)}}" ><i class="material-icons dp48">remove_red_eye</i></a>
                                    <a class="btnNotLink" style="color: red;">Not Link</a>

                                  @endif
                                </td>
                              </tr>
                              @endif
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
          $('div#loader').show(); 
          $.ajax({
              url: '{{url("/admin/send-bulk-payout")}}',
              type:'post',
              data: {"_token": "{{ csrf_token() }}", userData : id},
              success: function(data){
                $('div#loader').hide(); 
                alert('Payout send successfully !');
                window.location.reload();
               }
           });
            return false;
          }

      </script>

@endsection           
