@extends('layouts.admin')

@section('content')

<style>
  .licenseClass{ display:none; }
  .requiredClass{ color : red; }
</style>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="col-lg-12">
                   @if(session()->has('message.level'))
                        @if ($message = Session::get('message.content'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                  @endif

                <div class="col s12 display-flex justify-content-end">
                    <a href="{{url('admin/packages')}}" class="btn waves-effect waves-light purple lightrn-1"> Packages List</a>
                    
                </div>
                 </div>
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{route('packages.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="input-field col m6 s12">
                                <label>Name <sup style="color:red;">*</sup> </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Package Name" required>
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="input-field col m6 s12">
                              <label> Description <sup style="color:red;">*</sup> </label>

                              <textarea type="text" name="description" id="description" autocomplete="on" class="materialize-textarea @error('description') is-invalid @enderror" placeholder="Enter description" required></textarea>
                              @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>    
                          
                          <div class="input-field col m4 s12">
                              <label>Discount Amount <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('market_price') is-invalid @enderror" value="{{ old('market_price') }}" name="market_price" placeholder="Enter market_price" required>
                              @error('amount')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field col m4 s12">
                              <label>Affiliate Amount <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('affiliate_price') is-invalid @enderror" value="{{ old('affiliate_price') }}" name="affiliate_price" placeholder="Enter affiliate price" required>
                              @error('affiliate_price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field col m4 s12">
                              <label>Final Amount <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" name="amount" placeholder="Enter amount" required>
                              @error('amount')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field col m4 s12">
                              <label>Direct income <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('direct_income') is-invalid @enderror" value="{{ old('direct_income') }}" name="direct_income" placeholder="Direct income" required>
                              @error('direct_income')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field col m4 s12">
                              <label>Passive income <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('passive_income') is-invalid @enderror" value="{{ old('passive_income') }}" name="passive_income" placeholder="Passive income" required>
                              @error('passive_income')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field col m4 s12">
                              <label>Fund <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('fund') is-invalid @enderror" value="{{ old('fund') }}" name="fund" placeholder="Enter Fund" required>
                              @error('fund')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        
                      <div class="input-field col m4 s12">
                          <input type="file" name="image" class="form-control" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                     </div>

                       <div class="col s3">
                            <label>Status</label> <br>
                              <p>
                                <label>
                                  <input type="radio" id="radioPrimary1" name="status" value="1" checked="">
                                  <span>Show</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="radioPrimary2" name="status" value="0">
                                  <span>Hide</span>
                                </label>
                              </p>
                          </div>


                  <div class="input-field col m3 s12">
                    <label>Select sub packages</label><br>
                     <div class="input-field">
                          <select class="select2 browser-default" name="sub_packages[]"  multiple="multiple">
                          @if(isset($packages) && !empty($packages))
                                @foreach($packages as $row)
                                  <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                              @endif
                          </select>
                    </div>
                  </div>

                        </div>
  
                        <br>
                      <div class="row">

                         <div class="col s12 display-flex justify-content-end">
                          <button type="submit" class="btn indigo">
                            Save changes</button>
                        </div>

                    
                      </div>
                          
                      </form>
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>

@endsection           