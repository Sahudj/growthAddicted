@extends('layouts.admin')

@section('content')

<style>
  .licenseClass{ display:none; }
  .requiredClass{ color : red; }
  .customButton{margin : 7px;}
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

                </div>
                   <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-10">
                                <label>My Referral Code </label>
                                <input type="text" id="userReferralCode"  readonly class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->referral_code }}" placeholder="Enter First Name" required>
                            </div>
                            <div class ="col-md-2">
                                <br>
                                <button type="button" id="referral_code" class="mb-6 btn waves-effect waves-light purple lightrn-1">Copy Referral Code</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10">
                                
                                <label>Orientation Video </label>
                                <input type="text" id="orientation" readonly class="form-control @error('name') is-invalid @enderror" value="{{!empty($setting) ? $setting->meta_value : '' }}" placeholder="Enter First Name" required>
                            </div>
                            <div class ="col-md-2">
                                <br>
                                <button type="button" id="orientationLink" class="mb-6 btn waves-effect waves-light purple lightrn-1">Copy Link</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <label>Generate Link For </label>
                                <select onchange="getLink(this)" class="form-control" name = "packages" id = "packages">
                                    <option value="0">All Packages</option>
                                    @foreach($packages as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-8">
                            <label> </label>
                                <input type="text" id="packageLink" readonly class=" customButton form-control" value="{{url('/')}}/Biz/Orientation?uid=7PZWJvE1bb8WrPOUDsSrsg==" placeholder="Enter First Name" required>
                            </div>

                            <div class ="col-md-2">
                                <br>
                                <button type="button" id="copyPackageLink" class="mb-6 btn waves-effect waves-light purple lightrn-1">Copy Link</button>
                            </div>
                        </div>
                          <hr>
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <script>


        
    </script>

@endsection           