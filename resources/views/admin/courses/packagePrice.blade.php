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
                      <form method="POST" name="banner-form" id="banner-form" action="{{url('admin/update-packages-price')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                          @foreach($packagesPrice as $row)
                        <div class="row">
                          <div class="col m3 s12">
                                <label>Sponsor Package <sup style="color:red;">*</sup> </label>
                                 <select class="browser-default" name="sponsor_package[]">
                                  <option value="">Please select</option>
                                  @foreach($packages as $row2)
                                    <option value="{{$row2->id}}"  {{($row2->id == $row->sponsor) ? "selected='selected'" : "" }}  >{{$row2->name}}</option>
                                  @endforeach
                                </select>
                          </div>

                          <div class="col m3 s12">
                                <label>Current package <sup style="color:red;">*</sup> </label>

                              <select class="browser-default" name="current_package[]">
                                  <option value="">Please select</option>
                                  @foreach($packages as $row2)
                                    <option value="{{$row2->id}}"  {{($row2->id == $row->from_package) ? "selected='selected'" : "" }}  >{{$row2->name}}</option>
                                  @endforeach
                                </select>
                          </div>

                          <div class="col m3 s12">
                                <label>Selling Package <sup style="color:red;">*</sup> </label>
                                  <select class="browser-default" name="selling_package[]">
                                  <option value="">Please select</option>
                                  @foreach($packages as $row2)
                                    <option value="{{$row2->id}}"  {{($row2->id == $row->to_package_id) ? "selected='selected'" : "" }}  >{{$row2->name}}</option>
                                  @endforeach
                                </select>
                          </div>

                          <div class="col m3 s12">
                                <label>Package Amount <sup style="color:red;">*</sup> </label>
                                <input type="number" name="packageAmount[]" value="{{$row->amount}}">
                          </div>

                          <div class="col m3 s12">
                                <label>Direct Income <sup style="color:red;">*</sup> </label>
                                <input type="number" name="directIncome[]" value="{{$row->direct}}">
                          </div>

                          <div class="col m3 s12">
                                <label>Passive Income <sup style="color:red;">*</sup> </label>
                                <input type="number" name="passiveIncome[]" value="{{$row->passive}}">
                          </div>
                          <input type="hidden" name="packagePriceId[]" value="{{$row->id}}">
                        </div>
                        <hr>
                          @endforeach
                            
                        <div id="newFieldsAddhere"></div>

                       <div class="right">
                            <button type="button" onclick="addnewHtmlRow()" class="btn btn-success add-more"> +&nbsp; Add More</button>
                      </div>

                        <br>
                        <br>
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