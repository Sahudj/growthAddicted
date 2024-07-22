@extends('layouts.admin')

@section('content')

<style>
  .licenseClass {
    display: none;
  }

  .requiredClass {
    color: red;
  }
</style>


<div class="bank-details-page">
  <div class="bank-details-wrapper">
    <!-- heading  -->
    <div class="prf-header">
      <div class="prf-title">
        <h1>Bank Details</h1>
      </div>
    </div>

    <!-- bank details  -->

    <div class="bank-card">
      <div class="bank-card-inner">
        <div class="left-card">
          <!-- 1 -->
          <div class="key-val-cont">
            <div class="key-cont">
              Name
            </div>
            <div> : </div>
            <div class="val-cont">
              {{ $getDetails->name }}
            </div>
          </div>
          <!-- 2 -->
          <div class="key-val-cont">
            <div class="key-cont">
              Email
            </div>
            <div> : </div>
            <div class="val-cont">
              {{ $getDetails->email }}
            </div>
          </div>
          <!-- 3 -->
          <div class="key-val-cont">
            <div class="key-cont ">
              WhatsApp No.
            </div>
            <div> : </div>
            <div class="val-cont val-cont-nbr">
              {{ $getDetails->mobile_no }}
            </div>
          </div>
        </div>
        <div class="right-card">
          <!-- 1 -->
          <div class="key-val-cont">
            <div class="key-cont">
              Bank Name
            </div>
            <div> : </div>
            <div class="val-cont">
              {{ !empty($getBankInfo->bank_name) ? $getBankInfo->bank_name : '' }}
            </div>
          </div>
          <!-- 2 -->
          <div class="key-val-cont">
            <div class="key-cont">
              Account No.
            </div>
            <div> : </div>
            <div class="val-cont val-cont-nbr">
              {{ !empty($getBankInfo->account_no) ? $getBankInfo->account_no : '' }}
            </div>
          </div>
          <!-- 3 -->
          <div class="key-val-cont">
            <div class="key-cont">
              IFSC Code
            </div>
            <div> : </div>
            <div class="val-cont val-cont-nbr">
              {{ !empty($getBankInfo->ifsc_code) ? $getBankInfo->ifsc_code : '' }}
            </div>
          </div>

          <div class="send-request-btn-cont">
            @if(isset($reqInfo) && $reqInfo->status == 0)

            <a title="Bank request is pending" href="javascript:void(0)" class="btn indigo">Request Pending</a>

            @else

            <a title="Send request to change bank account" href="{{url('user/change-bank-details')}}" class="btn indigo">
              Send Request to change Bank Details</a>

            @endif

          </div>
        </div>
      </div>
    </div>

    <div class="bank-card-form-cont">
      
    </div>

    <!-- form  -->
  </div>
</div>
<!-- old code  -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-content">
            <div class="col-lg-12">
              @if(session()->has('message'))
              @if($message = Session::get('message'))
              <div class="card-alert card gradient-45deg-green-teal">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">check</i> SUCCESS : {{ $message }}.
                  </p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              @endif
              @endif

            </div>

            <h4>Personal Information</h4>
            <hr>
            <div class="col-lg-12">
              <form method="POST" name="banner-form" id="banner-form" action="{{url('user/bank-details')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col m6 s12">
                    <label>Name <sup style="color:red;">*</sup> </label>
                    <input type="text" readonly class="form-control @error('name') is-invalid @enderror" value="{{ $getDetails->name }}" placeholder="Enter First Name" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="col m6 s12">
                    <label> Email <sup style="color:red;">*</sup> </label>
                    <input type="text" readonly id="email" autocomplete="on" class="form-control @error('email') is-invalid @enderror" value="{{ $getDetails->email }}" placeholder="Enter email" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>


                  <div class="col m6 s12">
                    <label>WhatsApp No <sup style="color:red;">*</sup> </label>
                    <input type="text" readonly class="form-control @error('phone') is-invalid @enderror" value="{{ $getDetails->mobile_no }}" placeholder="Enter First phone" required>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <!--   <div class="col m6 s12">
                                <label>DOB <sup style="color:red;">*</sup> </label>
                                <input type="date" readonly class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->dob) ? $getDetails->dob : '' }}" placeholder="Enter DOB">
                          </div>
                          <div class="col m6 s12">
                                <label>Address <sup style="color:red;">*</sup> </label>
                                <input type="text" name="address" class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->address) ? $getDetails->address : '' }}" placeholder="Enter Address">
                          </div>

                          <div class="col m6 s12">
                                <label>City <sup style="color:red;">*</sup> </label>
                                <input type="text" name="city" class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->city) ? $getDetails->city : '' }}" placeholder="Enter City Name">
                          </div>
                         
                          <div class="col m6 s12">
                            <div class="form-group">
                              <label> State </label>
                              <select class="form-control" name ="state">
                               <option value="">Please select</option> 
                              @foreach($states as $row)
                                  <option value="{{$row->id}}" {{($getDetails->state == $row->id) ? "selected" : ""}} >{{$row->state}}</option>
                              @endforeach
                              </select>

                              @error('state')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>    
                          </div>   

                          <div class="col m6 s12">
                                <label>Pincode</label>
                                <input type="text" name="pin_code" class="form-control @error('dob') is-invalid @enderror" value="{{ !empty($getDetails->pin_code) ? $getDetails->pin_code : '' }}" placeholder="Enter Pin code">
                          </div> -->

                  <div class="col m6 s12">

                    <label> Select document type </label>
                    <select name="document_type" id="document_type" class="form-control">
                      <option selected="selected" value="0">Please Select</option>
                      <option value="1" {{isset($getBankInfo->document_type) && ($getBankInfo->document_type == 1) ? "selected" : ""}}>Aadhar</option>
                      <option value="2" {{isset($getBankInfo->document_type) &&($getBankInfo->document_type == 2) ? "selected" : ""}}>Driving License </option>
                      <option value="3" {{isset($getBankInfo->document_type) &&($getBankInfo->document_type == 3) ? "selected" : ""}}>Voter Identity Card </option>
                      <option value="4" {{isset($getBankInfo->document_type) &&($getBankInfo->document_type == 4) ? "selected" : ""}}>Passport </option>

                    </select>
                  </div>

                </div>


                <div class="row" id="aadhaar" style="display:none"></div>


                <div class="row">
                  <div class="col m6 s12">
                    <label> Upload Front side </label>
                    @if(isset($getBankInfo->document_type) && $getBankInfo->document1)
                    <?php $class = 'd-none'; ?>
                    <div class="sssnCardDiv">
                      <br>
                      <a target="_blank" class="btn btn-sm btn-success" title="{{$getBankInfo->document1}}" href="{{url('document/'.$getBankInfo->document1)}}" download="{{$getBankInfo->document1}}"><i class="fa fa-download"></i> Download</a>
                      <a class="sssnCard btn btn-sm btn-info" title="Click to upload new Driver License" href="javascript:void(0)"><i class="fa fa-upload"></i> Upload</a>
                      <input type="hidden" name="hidden_doc_front_side_image" value="{{$getBankInfo->document1}}">
                    </div>
                    @else
                    <?php $class = ''; ?>
                    @endif
                    <div class="sssnCardContainer {{$class}}">
                      <input type="file" name="doc_front_side" id="doc_front_side" class="form-control" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                    </div>

                  </div>
                  <div class="col m6 s12">
                    <label> Upload Back Side </label>
                    @if(isset($getBankInfo->document_type) && $getBankInfo->document2)
                    <?php $class = 'd-none'; ?>
                    <div class="sssnCardDiv">
                      <br>
                      <a target="_blank" class="btn btn-sm btn-success" title="{{$getBankInfo->document2}}" href="{{url('document/'.$getBankInfo->document2)}}" download="{{$getBankInfo->document2}}"><i class="fa fa-download"></i> Download</a>
                      <a id="sssnCard" class="btn btn-sm btn-info" title="Click to upload new Driver License" href="javascript:void(0)"><i class="fa fa-upload"></i> Upload</a>
                      <input type="hidden" name="hidden_doc_back_side_image" value="{{$getBankInfo->document2}}">
                    </div>
                    @else
                    <?php $class = ''; ?>
                    @endif
                    <div class="sssnCardContainer {{$class}}">
                      <input type="file" name="doc_back_side" id="doc_back_side" class="form-control" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                    </div>

                  </div>
                </div>

                <hr>
                <h4>Bank Details</h4>
                <?php
                $disable = '';
                $disable = (!empty($getBankInfo) && ($getBankInfo->customer_id != '')) ? 'disabled' : "";
                ?>
                <div class="row">
                  <div class="col m6 s12">
                    <label> Bank Name <sup style="color:red;">*</sup> </label>
                    <input type="text" {{$disable}} class="form-control @error('bank_name') is-invalid @enderror" value="{{ !empty($getBankInfo->bank_name) ? $getBankInfo->bank_name : '' }}" name="bank_name" placeholder="Enter Bank name" required>
                    @error('bank_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="col m6 s12">
                    <label>Account No <sup style="color:red;">*</sup> </label>
                    <input type="number" {{$disable}} name="account_no" class="form-control @error('account_no') is-invalid @enderror" value="{{ !empty($getBankInfo->account_no) ? $getBankInfo->account_no : '' }}" placeholder="Enter Account No" required>
                    @error('account_no')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="col m6 s12">
                    <label>IFSC Code <sup style="color:red;">*</sup> </label>
                    <input type="text" {{$disable}} name="ifsc_code" class="form-control @error('ifsc_code') is-invalid @enderror" value="{{ !empty($getBankInfo->ifsc_code) ? $getBankInfo->ifsc_code : '' }}" placeholder="Enter IFSC Code" required>
                    @error('ifsc_code')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <hr>
                <br>

                <div class="row">
                  <div class="col s6 display-flex center-content-end mt-3">
                    <input type="hidden" name="userId" value="{{$getDetails->id}}">
                    <input type="hidden" name="bankStatus" value="{{ !empty($getBankInfo->customer_id) ? 1 : 0}}">
                    <button type="submit" class="btn indigo">
                      Save changes</button>
                  </div>

                </div>

                <br>
                <div class="row">
                  @if(isset($reqInfo) && $reqInfo->status == 0)
                  <div class="col s12 ">
                    <a title="Bank request is pending" href="javascript:void(0)" class="btn indigo">Request Pending</a>
                  </div>
                  @else
                  <div class="col s12">
                    <a title="Send request to change bank account" href="{{url('user/change-bank-details')}}" class="btn indigo">
                      Send Request to change Bank</a>
                  </div>
                  @endif

                </div>

                <br>
                <br>




              </form>
            </div>
          </div>
        </div><!-- /.card -->
      </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<script>
  $(".sssnCard").click(function() {
    $(".sssnCardContainer").removeClass('d-none');
    $('.sssnCardDiv').hide();
    $('#doc_front_side').prop('required', true);
    $('#doc_back_side').prop('required', true);
  })


  $(document).ready(function() {
    var documentId = "{{isset($getBankInfo->document_type) && ($getBankInfo->document_type) ? $getBankInfo->document_type : ''}}";
    $('#document_type option[value="' + documentId + '"]').attr("selected", "selected");
    $("#document_type").trigger('change');
  });

  $("#document_type").change(function() {
    var documentType = "{{isset($getBankInfo->document_type) &&($getBankInfo->document_type) ? $getBankInfo->document_type : '' }}";
    var documentIdentity = "{{isset($getBankInfo->document_type) &&($getBankInfo->identity_no) ? $getBankInfo->identity_no : '' }}";
    var documentName = "{{isset($getBankInfo->document_type) &&($getBankInfo->identity_name) ? $getBankInfo->identity_name : ''}}";
    var docId = $(this).val();
    var labelName = "";
    var placeHolderName = '';
    var labelName2 = "";
    var placeHolderName2 = '';

    $('#aadhaar').show();
    $('#documentNo').prop('required', true);
    $('#documentName').prop('required', true);
    if (documentType) {
      $('#doc_front_side').prop('required', false);
      $('#doc_back_side').prop('required', false);
    } else {
      $('#doc_front_side').prop('required', true);
      $('#doc_back_side').prop('required', true);
    }
    if (docId == 1) {
      labelName = "Aadhar No";
      placeHolderName = 'Aadhar No';
      labelName2 = "Your Name";
      placeHolderName2 = 'Name on Aadhar';
      if (documentType != docId) {
        setTimeout(() => {
          $('#documentNo').val('');
          $('#documentName').val('');
        }, 500);
      }


    } else if (docId == 2) {
      labelName = "Driving License No";
      placeHolderName = 'Driving License';
      labelName2 = "Name on Driving License";
      placeHolderName2 = 'Name on Driving License';
      if (documentType != docId) {
        setTimeout(() => {
          $('#documentNo').val('');
          $('#documentName').val('');
        }, 500);
      }

    } else if (docId == 3) {
      labelName = "Voter Identity Card No";
      placeHolderName = 'Voter Identity Card No';
      labelName2 = "Name on Voter Identity Card";
      placeHolderName2 = 'Name on Voter Identity Card';
      if (documentType != docId) {
        setTimeout(() => {
          $('#documentNo').val('');
          $('#documentName').val('');
        }, 500);
      }
    } else if (docId == 4) {
      labelName = "Passport No";
      placeHolderName = 'Passport No';
      labelName2 = "Name";
      placeHolderName2 = 'Name on Passport';
      if (documentType != docId) {
        setTimeout(() => {
          $('#documentNo').val('');
          $('#documentName').val('');
        }, 500);
      }
    } else {
      $('#aadhaar').hide();
      $('#documentNo').prop('required', false).val('');
      $('#documentName').prop('required', false).val('');
      $('#doc_front_side').prop('required', false);
      $('#doc_back_side').prop('required', false);
    }

    $('#aadhaar').html('<div class ="col m6 s12"><label>Enter ' + labelName + ' <sup style="color:red;">*</sup></label><input type="text" name="documentNo" id="documentNo" class="form-control" value="' + documentIdentity + '" placeholder="Enter ' + placeHolderName + '"></div><div class ="col m6 s12"><label>Enter ' + labelName2 + '<sup style="color:red;">*</sup> </label><input type="text" name="documentName" class="form-control" value="' + documentName + '" id="documentName" placeholder="Enter ' + placeHolderName2 + '"></div>');
  })
</script>

@endsection