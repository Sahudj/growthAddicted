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

                  <div class="col s12 display-flex justify-content-end">
                    <a href="{{url('admin/packages')}}" class="btn waves-effect waves-light purple lightrn-1"> Packages Listing </a>
                  </div>
                  <br>
                </div>
                   <div class="col-lg-12">
                   <form method="POST" name="banner-form" id="banner-form" action="{{route('packages.update', $getDetails->id)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="input-field col m6 s12">
                                <label>Name <sup style="color:red;">*</sup> </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $getDetails->name }}" placeholder="Enter Package Name" required>
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="input-field col m6 s12">
                              <label> Description <sup style="color:red;">*</sup> </label>
                              <textarea type="text" name="description" id="description" autocomplete="on" class="materialize-textarea @error('description') is-invalid @enderror" placeholder="Enter description" required>{{$getDetails->description}}</textarea>
                              @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>    
                          
                           <div class="input-field col m4 s12">
                              <label>Discount Amount <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('market_price') is-invalid @enderror" value="{{ $getDetails->market_price }}" name="market_price" placeholder="Enter Market Price" required>
                              @error('market_price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field col m4 s12">
                              <label>Affiliate Amount <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('affiliate_price') is-invalid @enderror" value="{{ $getDetails->affiliate_price }}" name="affiliate_price" placeholder="Enter Affiliate Price" required>
                              @error('affiliate_price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field col m4 s12">
                              <label>Final Amount <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('amount') is-invalid @enderror" value="{{ $getDetails->amount }}" name="amount" placeholder="Enter amount" required>
                              @error('amount')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                            <div class="input-field col m4 s12">
                              <label>Direct income <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('direct_income') is-invalid @enderror" value="{{ $getDetails->direct }}" name="direct_income" placeholder="Direct income" required>
                              @error('direct_income')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field col m4 s12">
                              <label>Passive income <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('passive_income') is-invalid @enderror" value="{{ $getDetails->passive }}" name="passive_income" placeholder="Passive income" required>
                              @error('passive_income')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field col m4 s12">
                              <label>Fund <sup style="color:red;">*</sup> </label>
                              <input type="number" class="form-control @error('fund') is-invalid @enderror" value="{{ $getDetails->fund }}" name="fund" placeholder="Enter Fund" required>
                              @error('fund')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        
                      <div class="input-field col m6 s12">
                          <img src = "{{url('public/packages/'.$getDetails->image)}}" width="100">
                          <input type="hidden" value="{{$getDetails->image}}" name="hiddenImage">
                          <input type="file" name="image" class="form-control" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                     </div>
                        <div class="input-field col m6 s12">
                              <label> Status </label> <br>
                              <br>

                               <p>
                                <label>
                                  <input type="radio" id="radioPrimary1" name="status" value="1" {{($getDetails->status == 1) ? "checked" : "" }} >
                                  <span>Active</span>
                                </label>
                            
                                <label>
                                   <input type="radio" id="radioPrimary2" name="status" value="0"  {{($getDetails->status == 0) ? "checked" : "" }}>
                                  <span>Inactive</span>
                                </label>
                              </p>
                          </div>

                  <div class="input-field col m6 s12">
                    <label>Select sub packages</label><br>
                     <div class="input-field">
                          <select class="select2 browser-default" name="sub_packages[]"  multiple="multiple">
                          @if(isset($packages) && !empty($packages))
                                @foreach($packages as $row)
                                <?php
                                  $selected = '';
                                  $subPackages = !empty($getDetails->sub_packages) ? explode(',', $getDetails->sub_packages) : [];
                                  if(in_array($row->id, $subPackages)){
                                    $selected = "selected = 'selected'";
                                  }
                                ?>
                                  <option {{$selected}} value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                              @endif
                          </select>
                    </div>
                  </div>

                        <br>

                      <div class="row">    
                        <div class="col s12 display-flex justify-content-end">
                          <button type="submit" class="btn indigo">
                            Update</button>
                        </div>
                      </div>
                      </form>
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>

        </div>


@endsection           