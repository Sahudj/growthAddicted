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
            <div class="card card-primary card-outline">
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


                  <?php 
                  $packagListing = [];

                  foreach ($packages as $row) {
                    $packagListing[$row->id] = $row->name;                    
                  }
                  ?>

                 </div>
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{url('admin/payment-setting')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @foreach($packages as $key => $row)
                        <div class="row">
                          
                          <div class="col m6 s12">
                            <input type="text" readonly  class="form-control" value="{{$row->name}}">
                            <input type="hidden" name="package[]" value="{{$row->id}}">
                          </div>
                          <div class="col m6 s12">
                            <?php
                              $paymentSetting = DB::table('paymentSetting')->where('packageId', $row->id)->first();

                            ?>
                            
                            <label>Payment Option</label> <br>
                              <p>
                                <label>
                                  <input type="radio" id="radioPrimary{{$key}}" name="packageId_{{$row->id}}" value="1" {{ isset($paymentSetting) && ($paymentSetting->paymentMode == 1) ? "checked" : "" }} >
                                  <span>Phone Pay</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="radioPrimary{{$key}}" name="packageId_{{$row->id}}" value="2" {{ isset($paymentSetting) && ($paymentSetting->paymentMode == 2) ? "checked" : "" }} >
                                  <span>Cashfree</span>
                                </label>
                              </p>
                          
                          </div>
                        </div>
                        @endforeach
                                                  
                      <div class="col-12 right-center">
                        <div class="offset-5 right-center">                       
                          <input type="submit" name="submit" value="Update" class="btn btn-md customBtn">  
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

  <div id="cloneHtmlContainer" style="display:none;">
    <div class="row after-add-more">
    <div class="row ">
        <div class="col m3 s12">
            <label>Sponsor Package <sup style="color:red;">*</sup> </label>
            <select class="browser-default" name="sponsor_package[]">
              <option value="">Please select</option>
              @foreach($packages as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>
        </div>

        <div class="col m3 s12">
            <label>Current package <sup style="color:red;">*</sup> </label>
             <select class="browser-default" name="current_package[]">
              <option value="">Please select</option>
              @foreach($packages as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>
        </div>

        <div class="col m3 s12">
            <label>Selling Package <sup style="color:red;">*</sup> </label>
            <select class="browser-default" name="selling_package[]">
              <option value="">Please select</option>
              @foreach($packages as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>

        </div>

        <div class="col m3 s12">
            <label>Package Amount <sup style="color:red;">*</sup> </label>
            <input type="number" name="packageAmount[]" value="">
        </div>

        <div class="col m3 s12">
            <label>Direct Income <sup style="color:red;">*</sup> </label>
            <input type="number" name="directIncome[]" value="">
        </div>

        <div class="col m3 s12">
            <label>Passive Income <sup style="color:red;">*</sup> </label>
            <input type="number" name="passiveIncome[]" value="">
      </div>
        <div class="col m3 s12">
            
      </div>
        <div class="col m3 s12">
            
      </div>
      <input type="hidden" name="packagePriceId[]" value="">
    </div>
    <hr>
 </div>

 </div>



    <script>


      function addnewHtmlRow(){
        var getHtml = $('.after-add-more').html();
        $('#newFieldsAddhere').append(getHtml);
      }


    </script>

@endsection           