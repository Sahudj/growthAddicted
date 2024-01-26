@extends('layouts.admin')

@section('content')

<style>
  .licenseClass{ display:none; }
  .requiredClass{ color : red; }
</style>
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
                      <i class="material-icons">check</i> SUCCESS : {{ $message }}.</p>
                  </div>
                  <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                  @endif
                @endif

                </div>

                <h4>Send Request to change bank account</h4>
                <hr>
                <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{url('user/change-bank-details')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    
                    <h4>Bank Details</h4>
                    <div class="row">
                      <div class="col m6 s12">
                              <label> Bank Name <sup style="color:red;">*</sup> </label>
                              <input type="text" class="form-control @error('bank_name') is-invalid @enderror" value="" name="bank_name" placeholder="Enter Bank name" required>
                              @error('bank_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="col m6 s12">
                                <label>Account No <sup style="color:red;">*</sup> </label>
                                <input type="number" name="account_no" class="form-control @error('account_no') is-invalid @enderror" value="" placeholder="Enter Account No" required>
                                @error('account_no')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="col m6 s12">
                                <label>IFSC Code <sup style="color:red;">*</sup> </label>
                                <input type="text" name="ifsc_code" class="form-control @error('ifsc_code') is-invalid @enderror" value="" placeholder="Enter IFSC Code" required>
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
                          <button type="submit" class="btn indigo">
                            Send </button>
                        </div>
                       </div>
                    
                          
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

$(".sssnCard").click(function(){
  $(".sssnCardContainer").removeClass('d-none');
  $('.sssnCardDiv').hide();
  $('#doc_front_side').prop('required', true);
  $('#doc_back_side').prop('required', true);
})


$(document).ready(function(){
  var documentId = "{{isset($getBankInfo->document_type) && ($getBankInfo->document_type) ? $getBankInfo->document_type : ''}}";
  $('#document_type option[value="'+documentId+'"]').attr("selected", "selected");
  $("#document_type").trigger('change');  
});

$("#document_type").change(function(){
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
  if(documentType){
    $('#doc_front_side').prop('required', false);
    $('#doc_back_side').prop('required', false);
  } 
  else{
    $('#doc_front_side').prop('required', true);
    $('#doc_back_side').prop('required', true);
  } 
  if(docId == 1){
    labelName = "Aadhar No";
    placeHolderName = 'Aadhar No';
    labelName2 = "Your Name";
    placeHolderName2 = 'Name on Aadhar';
    if(documentType != docId){
      setTimeout(() => {
        $('#documentNo').val('');
        $('#documentName').val('');  
      }, 500);
    }
    

  }else if(docId == 2){
    labelName = "Driving License No";
    placeHolderName = 'Driving License';
    labelName2 = "Name on Driving License";
    placeHolderName2 = 'Name on Driving License';
    if(documentType != docId){
      setTimeout(() => {
        $('#documentNo').val('');
        $('#documentName').val('');  
      }, 500);
    }
    
  }else if(docId == 3){
    labelName = "Voter Identity Card No";
    placeHolderName = 'Voter Identity Card No';
    labelName2 = "Name on Voter Identity Card";
    placeHolderName2 = 'Name on Voter Identity Card';
    if(documentType != docId){
      setTimeout(() => {
        $('#documentNo').val('');
        $('#documentName').val('');  
      }, 500);
    }
  }else if(docId == 4){
    labelName = "Passport No";
    placeHolderName = 'Passport No';
    labelName2 = "Name";
    placeHolderName2 = 'Name on Passport';
    if(documentType != docId){
      setTimeout(() => {
        $('#documentNo').val('');
        $('#documentName').val('');  
      }, 500);
    }
  }else{
    $('#aadhaar').hide();
    $('#documentNo').prop('required', false).val('');
    $('#documentName').prop('required', false).val('');
    $('#doc_front_side').prop('required', false);
    $('#doc_back_side').prop('required', false);
  }

  $('#aadhaar').html('<div class ="col m6 s12"><label>Enter '+labelName+' <sup style="color:red;">*</sup></label><input type="text" name="documentNo" id="documentNo" class="form-control" value="'+documentIdentity+'" placeholder="Enter '+placeHolderName+'"></div><div class ="col m6 s12"><label>Enter '+labelName2+'<sup style="color:red;">*</sup> </label><input type="text" name="documentName" class="form-control" value="'+documentName+'" id="documentName" placeholder="Enter '+placeHolderName2+'"></div>');
})

</script>

@endsection           