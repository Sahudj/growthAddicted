@extends('layouts.admin')

@section('content')
<style>
   .background-round
{
    padding: 1px 10px 6px !important;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, .18);
}
</style>
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
             <div id="card-stats" class="pt-0">
               <h4>Dashboard Overview</h4>
               <?php   $permission = DB::table('permission')->where('user_id', auth()->user()->id)->first(); ?>
                @if(isset($permission) && ($permission->is_dashboard == 1))
                <div class="row">
                  <a href="{{url('admin/commissions/1')}}">
                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($todayEarning) ? $todayEarning : 0 }}" data-speed="1500" style="font-size:25px"> </strong>
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
                </a>

               <a href="{{url('admin/commissions/4')}}">
                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                         <div class="padding-4">

                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($lastSevenEarning) ? $lastSevenEarning : 0 }}" data-speed="1500" style="font-size:25px"></strong>
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
                </a>

               <a href="{{url('admin/commissions/5')}}">
                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($earningthisMonth) ? $earningthisMonth : 0 }}" data-speed="1500" style="font-size:25px"></strong>
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
                </a>

                  <a href="{{url('admin/commissions/7')}}">
                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($alltime) ? $alltime : 0 }}" data-speed="1500" style="font-size:25px"></strong>
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
                </a>
                </div>


                  <div class="row">
                  <a href="{{url('admin/members/2')}}">
                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                         <div class="padding-4">
                           
                         <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">perm_identity</i> <strong class="timer count-title count-number" data-to="{{ !empty($usersCount) ? $usersCount : 0 }}" data-speed="1500" style="font-size:25px"></strong>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col s12 m12">
                              <p> <strong> Total Enrolled Members </strong></p>
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
                              <i class="material-icons background-round mt-5">perm_identity</i><strong class="timer count-title count-number" data-to="{{ !empty($packagesCount) ? $packagesCount : 0 }}" data-speed="1500" style="font-size:25px"></strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>Total Packages</p>
                              </div>
                           </div>
                        </div>
                      </div>
                   </div>
                   <a href="{{url('admin/members/1')}}">
                    <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                         <div class="padding-4">
                           
                         <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">perm_identity</i> <strong class="timer count-title count-number" data-to="{{ !empty($todayRegister) ? $todayRegister : 0 }}" data-speed="1500" style="font-size:25px"></strong>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col s12 m12">
                              <p> <strong> Total Enrolled Today's </strong></p>
                              </div>
                           </div>
                        
                        </div>
                      </div>
                   </div>
                </a>

                <a href="{{url('admin/payouts/1')}}">
                 <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($todayPayout) ? $todayPayout : 0 }}" data-speed="1500" style="font-size:25px"></strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>Today's Payout Amount</p>
                              </div>
                           </div>
                         </div>
                      </div>
                   </div>
                </a>

                    <a href="{{url('admin/payouts/2')}}">
                    <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($todayPayoutYesterday) ? $todayPayoutYesterday : 0 }}" data-speed="1500" style="font-size:25px"> </strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>Yesterday Payout collection</p>
                              </div>
                           </div>
                         </div>
                      </div>
                   </div>
                </a>
                @endif
                
                 @if(isset($permission) && ($permission->is_bank_req == 1))
                 <a href="{{url('admin/bank-request')}}">
                    <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($reqInfo) ? $reqInfo : 0 }}" data-speed="1500" style="font-size:25px"></strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>Bank Request</p>
                              </div>
                           </div>
                         </div>
                      </div>
                   </div>
                </a>
                @endif
                
                </div>
             </div>
            </div>
          </div>
          <div class="content-overlay"></div>
        </div>
      </div>


<script type="text/javascript">
    (function($) {
     $.fn.countTo = function(options) {
       options = options || {};

       return $(this).each(function() {
         // set options for current element
         var settings = $.extend(
           {},
           $.fn.countTo.defaults,
           {
             from: $(this).data("from"),
             to: $(this).data("to"),
             speed: $(this).data("speed"),
             refreshInterval: $(this).data("refresh-interval"),
             decimals: $(this).data("decimals")
           },
           options
         );

         // how many times to update the value, and how much to increment the value on each update
         var loops = Math.ceil(settings.speed / settings.refreshInterval),
           increment = (settings.to - settings.from) / loops;

         // references & variables that will change with each update
         var self = this,
           $self = $(this),
           loopCount = 0,
           value = settings.from,
           data = $self.data("countTo") || {};

         $self.data("countTo", data);

         // if an existing interval can be found, clear it first
         if (data.interval) {
           clearInterval(data.interval);
         }
         data.interval = setInterval(updateTimer, settings.refreshInterval);

         // initialize the element with the starting value
         render(value);

         function updateTimer() {
           value += increment;
           loopCount++;

           render(value);

           if (typeof settings.onUpdate == "function") {
             settings.onUpdate.call(self, value);
           }

           if (loopCount >= loops) {
             // remove the interval
             $self.removeData("countTo");
             clearInterval(data.interval);
             value = settings.to;

             if (typeof settings.onComplete == "function") {
               settings.onComplete.call(self, value);
             }
           }
         }

         function render(value) {
           var formattedValue = settings.formatter.call(self, value, settings);
           $self.html(formattedValue);
         }
       });
     };

     $.fn.countTo.defaults = {
       from: 0, // the number the element should start at
       to: 0, // the number the element should end at
       speed: 1000, // how long it should take to count between the target numbers
       refreshInterval: 100, // how often the element should be updated
       decimals: 0, // the number of decimal places to show
       formatter: formatter, // handler for formatting the value before rendering
       onUpdate: null, // callback method for every time the element is updated
       onComplete: null // callback method for when the element finishes updating
     };

     function formatter(value, settings) {
       return value.toFixed(settings.decimals);
     }
   })(jQuery);

   jQuery(function($) {
     // custom formatting example
     $(".count-number").data("countToOptions", {
       formatter: function(value, options) {
         return value
           .toFixed(options.decimals)
           .replace(/\B(?=(?:\d{3})+(?!\d))/g, "");
       }
     });

     // start all the timers
     $(".timer").each(count);

     function count(options) {
       var $this = $(this);
       options = $.extend({}, options || {}, $this.data("countToOptions") || {});
       $this.countTo(options);
     }
   });

</script>

@endsection           
