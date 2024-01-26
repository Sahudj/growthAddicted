@extends('layouts.admin')

@section('content')

<style>
  .licenseClass{ display:none; }
  .requiredClass{ color : red; }
  .background-round
{
    padding: 1px 10px 6px !important;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, .18);
}
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
                <br>
                </div>

                     <div class="col-lg-12">
                        <div class="row">
                           <div class="align-right">
                              @if($getDetails->order_status == 1)
                           <a class="mb-6 btn waves-effect waves-light purple lightrn-1 confirmMessage" href="{{url('admin/refund-amount/'.$getDetails->id)}}">Refund</a>
                           @endif

                          
                              <a class="mb-6 btn waves-effect waves-light purple lightrn-1" href="{{url('admin/assign-sponsor/'.$getDetails->id)}}">Assign Sponsor</a>
                        
                        </div>
                        </div>
                     </div>

                   <div class="col-lg-12">
                        <div class="row">
                           @if($getDetails->profile_pic)
                            <div class="col s3">
                             <img class="responsive-img circle z-depth-5" src="{{url('public/profile_pic/'.$getDetails->profile_pic)}}" width="50px">
                            </div>
                           @endif 

                            <div class="col s3">
                              <label>Name</label>
                              <input type="text" class="form-control" readonly value="{{ $getDetails->name }}">
                            </div>

                            <div class="col s3">
                              <label> Email</label>
                              <input type="text" class="form-control" readonly value="{{ $getDetails->email }}" >
                            </div>    
                        
                            <div class="col s3">
                                <label>WhatsApp No</label>
                                <input type="text" class="form-control" readonly value="{{ $getDetails->mobile_no }}">
                            </div>
                            <div class="col s3">
                                <label>Refferal Code</label>
                                <input type="text" class="form-control" readonly value="{{ $getDetails->referral_code }}">
                            </div>

                        </div>
                    
                    <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong style="font-size:25px"> {{!empty($todayEarning) ? $todayEarning : 0 }} </strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>Today's Earning</p>
                              </div>
                           </div>
                         </div>
                      </div>
                   </div>

                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                         <div class="padding-4">

                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong style="font-size:25px"> {{!empty($lastSevenEarning) ? $lastSevenEarning : 0 }} </strong>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col s12 m12">
                              <p>Last 7 Days Earning</p>
                              </div>
                           </div>

                         </div>
                      </div>
                   </div>

                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong style="font-size:25px">{{ !empty($earningthisMonth) ? $earningthisMonth : 0 }} </strong>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col s12 m12">
                                 <p>Last 30 Days Earning</p>  
                              </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong style="font-size:25px">{{ !empty($alltime) ? $alltime :  0}} </strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>All Time Earning</p>
                              </div>
                           </div>

                         </div>
                      </div>
                   </div>
                </div>

                  <div class="row">

                  <a href="#">
                       <div class="col s12 m6 l6 xl3">
                          <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                             <div class="padding-4">
                               
                             <div class="row">
                                  <div class="col s12 m12">
                                  <i class="material-icons background-round mt-5">₹</i> <strong style="font-size:25px">{{ !empty($totalFunds) ? $totalFunds :  0}} </strong>
                                  </div>
                               </div>

                               <div class="row">
                                  <div class="col s12 m12">
                                  <p>Total Funds</p>
                                  </div>
                               </div>
                            
                            </div>
                          </div>
                        
                       </div>
                       </a>
                    <a href="{{url('admin/team-helping-bonus/'.$getDetails->id)}}">
                       <div class="col s12 m6 l6 xl3">
                          <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                             <div class="padding-4">
                               
                             <div class="row">
                                  <div class="col s12 m12">
                                  <i class="material-icons background-round mt-5">₹</i> <strong style="font-size:25px">{{ !empty($teamHelpingBonus) ? $teamHelpingBonus :  0}} </strong>
                                  </div>
                               </div>

                               <div class="row">
                                  <div class="col s12 m12">
                                  <p>Team Helping Bonus</p>
                                  </div>
                               </div>
                            
                            </div>
                          </div>
                       </div>
                    </a>

                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong style="font-size:25px">{{$todayPayout}} </strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>Pending Amount</p>
                              </div>
                           </div>
                           
                        </div>
                      </div>
                   </div>
                  <a href="{{url('admin/team-helping-bonus/'.$getDetails->id)}}">
                     <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                             <i class="material-icons background-round mt-5">perm_identity</i> <strong style="font-size:25px">{{ !empty($teamCountArr) ? count($teamCountArr) : 0 }} </strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>Team member</p>
                              </div>
                           </div>
                           
                        </div>
                      </div>
                   </div>
                </a>


               <a href="{{url('admin/direct-sale/'.$getDetails->id)}}">
                     <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                             <i class="material-icons background-round mt-5">₹</i><strong style="font-size:25px">{{ !empty($totalDirectFund) ? ($totalDirectFund) : 0 }} </strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>Total Direct sale By user</p>
                              </div>
                           </div>
                           
                        </div>
                      </div>
                   </div>
                </a>

                </div>
                   </div>
                </div>
              </div>
           </div>
        </div>

<script type="text/javascript">
    $('.confirmMessage').click(function(e) {
        if(!confirm('Are you sure you want to refund this?')) {
            e.preventDefault();
        }
    });    

  
</script>
@endsection           