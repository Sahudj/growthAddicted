@extends('layouts.admin')

@section('content')



<div class="user-dashboard">
  <div class="user-dash-wrap">

    <div class="usr-dash-header">
      <div class="dash-title">
        <h1>Dashboard Overview</h1>
      </div>
      @if(auth()->user()->order_status == 1)
      <div class="user-details">
        <div class="usr-det-row">
          <div class="prof-pic">
            @if(auth()->user()->profile_pic)
            <img class="responsive-img circle z-depth-5" width="120" src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="">

            <!-- <img class="responsive-img circle z-depth-5" width="120" src="{{url('public/profile_pic/'.auth()->user()->profile_pic)}}" alt=""> -->
            @else
            <img class="responsive-img circle z-depth-5" width="120" src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="">
            @endif
          </div>
          <div class="user-name">
            Hello, Welcome {{ ucfirst(auth()->user()->name)}}
          </div>
        </div>
        @if(!empty(auth()->user()->referral_code))
        <div class="usr-det-row">
          <p>Referal Code</p>
          <div class="copytoclipboard">
            <input disabled value="{{ ucfirst(auth()->user()->referral_code)}}" id="textToCopy">

            <!-- The button to trigger the copy action -->
            <button id="copyButton"><span class="material-symbols-outlined">
                content_copy
              </span></button>
          </div>

        </div>
        @endif

      </div>
      @endif
    </div>



    <div class="ads-container">
      <div class="ads-wrapper">
        <div class="ad-link">
          <a href="#">Explore</a>
        </div>
      </div>
    </div>


    @if(auth()->user()->order_status == 1)
    <div class="grid-cards-container">
      @if(auth()->user()->id == 231)
      <div class="grid-card">
        <a href="{{url('user/commission/1/1')}}">
          <div class="card-ttl">Today's Earning</div>
          <div class="card-val">
            <h3 class="formatted-number">₹ <div class="timer count-title count-number" data-to="{{(!empty($todayEarning) || !empty($todayTeamHelpingBonus)) ? ($todayEarning+$todayTeamHelpingBonus) : 0 }}" data-speed="1500"></div>
            </h3>
            <div class="ico"><span class="material-symbols-outlined">
                finance_mode
              </span></div>
          </div>
        </a>
      </div>
      <div class="grid-card">
        <a href="{{url('user/commission/1/4')}}">
          <div class="card-ttl">Last 7 Days Earning</div>
          <div class="card-val">
            <h3>₹ <div class="timer count-title count-number" data-to="{{ !empty($lastSevenEarning) ? $lastSevenEarning : 0 }}" data-speed="1500"></div>
            </h3>
            <div class="ico"><span class="material-symbols-outlined">
                finance_mode
              </span></div>
          </div>
        </a>
      </div>
      <div class="grid-card">
        <a href="{{url('user/commission/1/5')}}">
          <div class="card-ttl">Last 30 Days Earning</div>
          <div class="card-val">
            <h3>₹ <div class="timer count-title count-number" data-to="{{ !empty($earningthisMonth) ? $earningthisMonth : 0 }}" data-speed="1500"></div>
            </h3>
            <div class="ico"><span class="material-symbols-outlined">
                finance_mode
              </span></div>
          </div>
        </a>
      </div>
      <div class="grid-card">
        <a href="{{url('user/commission/1/3')}}">
          <div class="card-ttl">All Time Earning</div>
          <div class="card-val">
            <h3>₹ <div class="timer count-title count-number" data-to="{{ !empty($alltime) ? $alltime : 0 }}" data-speed="1500"></div>
            </h3>
            <div class="ico"><span class="material-symbols-outlined">
                finance_mode
              </span></div>
          </div>
        </a>
      </div>
      <div class="grid-card">
        <a href="{{url('user/team-helping-bonus/2')}}">
          <div class="card-ttl">Team Helping Bonus</div>
          <div class="card-val">
            <h3>₹ <div class="timer count-title count-number" data-to="{{ !empty($teamHelpingBonus) ? $teamHelpingBonus : 0 }}" data-speed="1500"></div>
            </h3>
            <div class="ico"><span class="material-symbols-outlined">
                finance_mode
              </span></div>
          </div>
        </a>
      </div>
      <div class="grid-card">
        <a href="{{url('user/commission/1/2')}}">
          <div class="card-ttl">Pending Amount</div>
          <div class="card-val">
            <h3>₹ <div class="timer count-title count-number" data-to="{{ !empty($todayPayout) ? $todayPayout : 0 }}" data-speed="1500"></div>
            </h3>
            <div class="ico"><span class="material-symbols-outlined">
                finance_mode
              </span></div>
          </div>
        </a>
      </div>
      @else
      <div class="grid-card">
        <div class="no-courses-card">
          <h1>Enroll with Package !</h1>
          <h4>Click on link to enroll your package and explore more courses.</h4>
          <a href="{{url('/#wc-ourcourses-wapper')}}" target="_blank" class="enrl-btn">Enroll Now</a>
        </div>
      </div>
      <div class="grid-card">
        <div class="play-intro-card">
          <div class="play-ico">
            <span class="material-symbols-outlined">
              play_arrow
            </span>
          </div>
          <a href="{{url('/user/startup-video')}}" class="enrl-btn">PLAY INTRO</a>
        </div>
      </div>
      @endif
    </div>
    @endif

    @if(auth()->user()->order_status == 1)
    @if(auth()->user()->id != 231)
    <div class="two-sec-cont">
      <div class="twsecwrap">
        <div class="sec-left">
          <div class="sec-ttl">
            <h1>Total Transaction</h1>
            <h4>This month transaction</h4>
          </div>
          <div class="sec-graph">
            <div class="total-transaction-container">
              <div id="total-transaction-line-chart" class="total-transaction-shadow"></div>
            </div>
          </div>
        </div>
        <div class="sec-right">
          <h3>Fuel</h3>
          <p>your passion,</p>
          <h3>Master</h3>
          <p>your growth.</p>

        </div>
      </div>
    </div>
    @endif
    @endif
  </div>
</div>

<!-- <div class="row">
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

                      <span>{{ucfirst(auth()->user()->referral_code)}}</span>


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
  </div>
</div> -->



<div id="custom-modal" class="our-modal">
  <div class="modal-content">
    <span class="close-ourmodal-btn" id="close-modal-btn">&times;</span>
    <h2>Introduction</h2>
    <p>Welcome To Growth Addicted</p>

    <div class="intro-video-content">
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
      <div class="intro-vid-wrap">
        <iframe loading="lazy" title="Gumlet video player" src="https://play.gumlet.io/embed/64d77049f48f277631a83481" allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture; fullscreen;" frameborder="0" allowfullscreen>
        </iframe>
      </div>
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


      <script src="https://player.vimeo.com/api/player.js"></script>
    </div>
  </div>
</div>


@if(auth()->user()->order_status == 1)
@if(auth()->user()->is_watch_video == 0)

@endif
@endif

<script src="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist.min.js"></script>
<script src="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist-plugin-tooltip.js"></script>
<script src="{{url('public/admin/')}}/app-assets/js/scripts/intro.js"></script>



<script>
  $(document).ready(function() {
    $('#copyButton').click(function() {
      // Select the text in the input field
      var textToCopy = $('#textToCopy');
      textToCopy.select();
      textToCopy[0].setSelectionRange(0, 99999); // For mobile devices

      // Copy the text inside the input field
      document.execCommand('copy');

      // Alert the copied text (optional)
      alert('Copied the text: ' + textToCopy.val());
    });
  });
</script>

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
            "ct-point ct-point-circle" : "ct-point ct-point-circle-transperent"
        })
        data.element.replace(circle)
      }
    })




  })(window, document, jQuery)
</script>


<!-- <script type="text/javascript">
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
</script> -->

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
      var absValue = Math.abs(value);
      if (absValue >= 1.0e+15) {
        return (value / 1.0e+15).toFixed(settings.decimals) + ' P'; // Peta
      } else if (absValue >= 1.0e+12) {
        return (value / 1.0e+12).toFixed(settings.decimals) + ' T'; // Tera
      } else if (absValue >= 1.0e+9) {
        return (value / 1.0e+9).toFixed(settings.decimals) + ' B'; // Billion
      } else if (absValue >= 1.0e+6) {
        return (value / 1.0e+6).toFixed(settings.decimals) + ' M'; // Million
      } else if (absValue >= 1.0e+5) {
        return (value / 1.0e+5).toFixed(settings.decimals) + ' Lakh'; // Lakh
      } else if (absValue >= 1.0e+3) {
        return (value / 1.0e+3).toFixed(settings.decimals) + ' K'; // Thousand
      }
      return value.toFixed(settings.decimals);
    }
  })(jQuery);

  jQuery(function($) {
    // custom formatting example
    $(".count-number").data("countToOptions", {
      formatter: function(value, options) {
        var absValue = Math.abs(value);
        if (absValue >= 1.0e+15) {
          return (value / 1.0e+15).toFixed(options.decimals) + ' P'; // Peta
        } else if (absValue >= 1.0e+12) {
          return (value / 1.0e+12).toFixed(options.decimals) + ' T'; // Tera
        } else if (absValue >= 1.0e+9) {
          return (value / 1.0e+9).toFixed(options.decimals) + ' B'; // Billion
        } else if (absValue >= 1.0e+6) {
          return (value / 1.0e+6).toFixed(options.decimals) + ' M'; // Million
        } else if (absValue >= 1.0e+5) {
          return (value / 1.0e+5).toFixed(options.decimals) + ' Lakh'; // Lakh
        } else if (absValue >= 1.0e+3) {
          return (value / 1.0e+3).toFixed(options.decimals) + ' K'; // Thousand
        }
        return value.toFixed(options.decimals);
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