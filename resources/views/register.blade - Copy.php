@extends('layouts.master')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-12" style="margin-top: 2%;">
            <!--Form with header-->
            <form role="form" action="{{url('order')}}" method="post">
                {!! csrf_field() !!}
                <div class="card border-primary rounded-0">
                    <div class="card-header p-0">
                        <div class="bg-info text-white text-center py-2">
                            <h3>Register</h3>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-sm-12">

                                @if(Session::has('successMessage'))
                                    <div class="alert alert-success">
                                        <a class="close" data-dismiss="alert">×</a>
                                        <strong>Alert </strong> {!!Session::get('successMessage')!!}
                                    </div>
                                @endif

                                    @if(Session::has('errorMessage'))
                                        <div class="alert alert-success">
                                            <a class="close" data-dismiss="alert">×</a>
                                            <strong>Alert </strong> {!!Session::get('errorMessage')!!}
                                        </div>
                                    @endif


                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name"  value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span style="color: red;">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Phone</label>
                                    <input type="text" class="form-control" name="mobile_no" placeholder="Enter Mobile No"  value="{{ old('mobile_no') }}">
                                    @if ($errors->has('mobile_no'))
                                        <span style="color: red;">{{ $errors->first('mobile_no') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email"  value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span style="color: red;">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password"  value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <span style="color: red;">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">State</label>
                                   <select class="form-control" name="state">
                                      <option value="">Please select</option>
                                      @foreach($states as $row)
                                      <option value="{{$row->id}}">{{$row->state}}</option>
                                      @endforeach          
                                   </select>
                                    @if ($errors->has('state'))
                                        <span style="color: red;">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Packages</label>
                                   <select class="form-control" name= "package" id="packages">
                                      <option value="">Please select</option>
                                      @foreach($packages as $row)
                                      <option value="{{$row->id}}">{{$row->name}}</option>
                                      @endforeach          
                                   </select>
                                    @if ($errors->has('package'))
                                        <span style="color: red;">{{ $errors->first('package') }}</span>
                                    @endif
                                </div>
                                
                                
                                <div class="input-group mb-3">
                                 
                                    <input type="text" name="referral_code" id="referralCode" class="form-control" placeholder="Enter Referral Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-warning" id="applyButton" type="button">Apply</button>
                                        <button class="btn btn-warning d-none" id="cancelButton" type="button">Cancel</button>
                                    </div>
                                
                                </div>
                                <p id="referenceBy" style="color:green"></p>

                            </div>
                        </div>

                        <div class="text-center">
                            <input type="hidden" name="_token_data" id="_token_data">
                            <button type="submit" class="btn btn-info btn-block rounded-0 py-2">Submit</button>
                        </div>
                    </div>

                </div>
            </form>
            <!--Form with header-->
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var packageId = "{{ isset($_GET['pid']) ? $_GET['pid'] : "" }}";
        var userId = "{{ isset($_GET['eid']) ? $_GET['eid'] : "" }}";
        if(packageId && userId){
            getDetails(packageId, userId);
        } 
    })

    $("#cancelButton").click(function(){
        $("#referralCode").val('');
        $("#applyButton").show();
        $("#cancelButton").addClass('d-none');
        $("#referenceBy").addClass('d-none');

    });


    $("#applyButton").click(function(){
        var code = $("#referralCode").val();
        if(code == ''){
            alert("Enter code");
            return false;
        }
        checkRefCode(code);
      
    });

    function getDetails(packageId, userId){
        
        $.ajax({
            url: '{{url("/get-package-data")}}',
            type:'post',
            data: {"_token": "{{ csrf_token() }}", 'packageId' : packageId, "user_id" : userId},
            success: function(data){
                var res = JSON.parse(data);
                if(res.status == "success"){
                    $("#referralCode").val(res.referral_code);
                    $("#referralCode").prop('disabled', true);
                    $("#applyButton").hide();
                    $("#_token_data").val(res.refId);
                    $("#cancelButton").removeClass('d-none');
                    $("#referenceBy").html('Name : '+res.name);
                    $('#packages option[value='+res.packageId+']').prop("selected", true);
                }
            }
        });
        
        return false;
    }


    function checkRefCode(code){
        
        $.ajax({
            url: '{{url("/check-ref-code")}}',
            type:'post',
            data: {"_token": "{{ csrf_token() }}", 'code' : code},
            success: function(data){
                var res = JSON.parse(data);
                if(res.status == "success"){
                    $("#referralCode").val(res.referral_code);
                    $("#referralCode").prop('disabled', true);
                    $("#applyButton").hide();
                    $("#_token_data").val(res.refId);
                    $("#cancelButton").removeClass('d-none');
                    $("#referenceBy").html('Name : '+res.name);
                }else{
                    $("#referenceBy").html("<div style='color:red'> Invalid code </div>");
                }
            }
        });
        
        return false;
    }
</script>

@endsection