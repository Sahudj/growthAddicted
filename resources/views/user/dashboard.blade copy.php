@extends('layouts.admin')

@section('content')
<style>
  .background-round {
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
          <h4>Dashboard</h4>

          @if(auth()->user()->order_status == 1)
          <div class="row">
            <div class="section" id="user-profile">
              <div class="row">
                <div class="col s12 m4 l3 user-section-negative-margin">
                  <div class="row">
                    <div class="col s12 center-align">
                      @if(auth()->user()->profile_pic)
                      <img class="responsive-img circle z-depth-5" width="120" src="{{url('public/profile_pic/'.auth()->user()->profile_pic)}}" alt="">
                      @else
                      <img class="responsive-img circle z-depth-5" width="120" src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="">
                      @endif
                      <br>
                      <div class="card-alert card gradient-45deg-purple-deep-orange">
                        <div class="card-content white-text">
                          <p>
                            {{ ucfirst(auth()->user()->name)}}
                          </p>
                        </div>
                      </div>
                      <!--   <h5> {{ ucfirst(auth()->user()->name)}}</h5> -->

                      <span>{{ ucfirst(auth()->user()->referral_code)}}</span>


                    </div>
                  </div>
                </div>
              </div>
            </div>
            @if(auth()->user()->id != 231)
            <a href="{{url('user/commission/1/1')}}">
              <div class="col s12 m6 l6 xl3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                  <div class="padding-4">
                    <div class="row">
                      <div class="col s12 m12">
                        <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{(!empty($todayEarning) || !empty($todayTeamHelpingBonus)) ? ($todayEarning+$todayTeamHelpingBonus) : 0 }}" data-speed="1500" style="font-size:25px"> </strong>
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

            <a href="{{url('user/commission/1/4')}}">
              <div class="col s12 m6 l6 xl3">
                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                  <div class="padding-4">

                    <div class="row">
                      <div class="col s12 m12">
                        <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($lastSevenEarning) ? $lastSevenEarning : 0 }}" data-speed="1500" style="font-size:25px"> </strong>
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

            <a href="{{url('user/commission/1/5')}}">
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

            <a href="{{url('user/commission/1/3')}}">
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
            <a href="{{url('user/team-helping-bonus/2')}}">
              <div class="col s12 m6 l6 xl3">
                <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                  <div class="padding-4">

                    <div class="row">
                      <div class="col s12 m12">
                        <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($teamHelpingBonus) ? $teamHelpingBonus : 0 }}" data-speed="1500" style="font-size:25px"></strong>
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


            <div class="row">
              <!-- <a href="#">
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
                       </a> -->
              <a href="{{url('user/commission/1/2')}}">
                <div class="col s12 m6 l6 xl3">

                  <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                    <div class="padding-4">
                      <div class="row">
                        <div class="col s12 m12">
                          <i class="material-icons background-round mt-5">₹</i> <strong class="timer count-title count-number" data-to="{{ !empty($todayPayout) ? $todayPayout : 0 }}" data-speed="1500" style="font-size:25px"> </strong>
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
              </a>
            </div>


            <div class="card">
              <div class="card-content">
                <h4 class="card-title mb-0">Total Transaction</h4>
                <p class="medium-small">This month transaction</p>
                <div class="total-transaction-container">
                  <div id="total-transaction-line-chart" class="total-transaction-shadow"></div>
                </div>
              </div>
            </div>

            @else

            <div class="card-panel border-radius-6 white-text gradient-45deg-purple-deep-orange card-animation-2">
              <h6><b><a href="#" class="white-text">
                    <blink> Enroll with Package ! </blink>
                  </a></b></h6>
              <span>Click on link to enroll your package and explore more courses.
              </span>
              <div class="display-flex justify-content-between flex-wrap">
                <div class="display-flex align-items-center mt-1">
                </div>
                <div class="display-flex right-align social-icon">
                  <span class=" vertical-align-top"><a target="_blank" href="{{url('/#wc-ourcourses-wapper')}}" class="btn waves-effect waves-light purple lightrn-1">Enroll Now</a></span>
                </div>
              </div>
            </div>

            @endif

            @endif

          </div>

        </div>
      </div>
    </div>
    <!--   <div class="content-overlay"></div> -->
  </div>
</div>


@if(auth()->user()->order_status == 1)
@if(auth()->user()->is_watch_video == 0)
<div id="intro">
  <div class="row">
    <div class="col s12">

      <div id="img-modal" class="modal white">
        <div class="modal-content">
          <div class="bg-img-div"></div>
          <p class="modal-header right modal-close">
            Skip Intro <span class="right"><i class="material-icons right-align">clear</i></span>
          </p>
          <br>
          <br>
          <div style="padding:56.25% 0 0 0;position:relative;">
            <!-- <iframe src="https://player.vimeo.com/video/746274669?h=214ecce3e1&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="1 st Step.mp4"></iframe> -->

            <script type="application/ld+json">
              {
                "@context": "https://schema.org",
                "@type": "VideoObject",
                "name": "1 St Step",
                "description": "",
                "thumbnailUrl": [
                  ["https://video.gumlet.io/64b7dbbefccf18bce938d682/64d77049f48f277631a83481/thumbnail-1-0.png?v=1691840637933"]
                ],
                "uploadDate": "2023-08-12T11:43:05.833Z",
                "duration": "PT6M24.149999999999977S",
                "embedUrl": "https://play.gumlet.io/embed/64d77049f48f277631a83481"
              }
            </script>
            <div style="position: relative; padding-top: 56.17%">
              <iframe loading="lazy" title="Gumlet video player" src="https://play.gumlet.io/embed/64d77049f48f277631a83481" style="border:none; position: absolute; top:0; left:0; height: 100%; width: 100%;" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture; fullscreen;" frameborder="0" allowfullscreen>
              </iframe>
            </div>

          </div>
          <script src="https://player.vimeo.com/api/player.js"></script>

          <form method="post" name="shares" class="form-horizontal" href="javascript:void(0)" onsubmit=" return startVideo()" id="sharesDetailsForm" autocomplete="off">
            <p>
              <label>
                <input type="checkbox" id="radioPrimary1" name="status" value="1" required>
                <span>I have already watched the video</span>
              </label>
            </p>

            <button type="submit" class="btn indigo align-items-center">
              Thank You </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endif

<script src="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist.min.js"></script>
<script src="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist-plugin-tooltip.js"></script>
<script src="{{url('public/admin/')}}/app-assets/js/scripts/intro.js"></script>

<script>
  (function(window, document, $) {

    // Total Transaction
    // -----------------
    var TotalTransactionLine = new Chartist.Line(
      "#total-transaction-line-chart", {
        series: [
          [{
            {
              ($totalComm - > amount) ? $totalComm - > amount: 0
            }
          }]
        ]
      }, {
        chartPadding: 0,
        axisX: {
          showLabel: true,
          showGrid: false
        },
        axisY: {
          showLabel: true,
          showGrid: true,
          low: 0,
          high: {
            {
              $maxValue
            }
          } + 1000,
          scaleMinSpace: 20
        },
        lineSmooth: Chartist.Interpolation.simple({
          divisor: 2
        }),
        plugins: [
          Chartist.plugins.tooltip({
            class: "total-transaction-tooltip",
            appendToBody: true
          })
        ],
        fullWidth: true
      }
    )

    TotalTransactionLine.on("created", function(data) {
      var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
      defs
        .elem("linearGradient", {
          id: "lineLinearStats",
          x1: 0,
          y1: 0,
          x2: 1,
          y2: 0
        })
        .elem("stop", {
          offset: "0%",
          "stop-color": "rgba(255, 82, 249, 0.1)"
        })
        .parent()
        .elem("stop", {
          offset: "10%",
          "stop-color": "rgba(255, 82, 249, 1)"
        })
        .parent()
        .elem("stop", {
          offset: "30%",
          "stop-color": "rgba(255, 82, 249, 1)"
        })
        .parent()
        .elem("stop", {
          offset: "95%",
          "stop-color": "rgba(133, 3, 168, 1)"
        })
        .parent()
        .elem("stop", {
          offset: "100%",
          "stop-color": "rgba(133, 3, 168, 0.1)"
        })

      return defs
    }).on("draw", function(data) {
      var circleRadius = 5
      if (data.type === "point") {
        var circle = new Chartist.Svg("circle", {
          cx: data.x,
          cy: data.y,
          "ct:value": data.value.y,
          r: circleRadius,
          class: data.value.y === {
              {
                $maxValue
              }
            } ?
            "ct-point ct-point-circle" :
            "ct-point ct-point-circle-transperent"
        })
        data.element.replace(circle)
      }
    })




  })(window, document, jQuery)
</script>


<script type="text/javascript">
  (function($) {
    $.fn.countTo = function(options) {
      options = options || {};

      return $(this).each(function() {
        // set options for current element
        var settings = $.extend({},
          $.fn.countTo.defaults, {
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