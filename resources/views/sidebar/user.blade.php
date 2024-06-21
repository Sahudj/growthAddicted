<!-- <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
  <div class="brand-sidebar">
    <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{url('/')}}" style="padding: 0px; margin: -24px 0px 0px 0px"><img style="height: 100px !important" class="hide-on-med-and-down" src="{{url('public/Final Logo.png/')}}" alt="materialize logo" /><img class="show-on-medium-and-down hide-on-med-and-up" src="{{url('public/admin/')}}/app-assets/images/logo/materialize-logo.png" alt="materialize logo" /></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
  </div>
  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">

    <li class="bold">
      <a href="{{url('/user/dashboard')}}" class="{{(url()->current() == url('/user/dashboard')) ? 'active' : '' }}">
        <i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
      </a>
    </li>
    @if(auth()->user()->order_status == 1)
    <li class="bold">
      <a href="{{url('/user/profile')}}" class="{{(url()->current() == url('/user/profile')) ? 'active' : '' }}">
        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Profile</span>
      </a>
    </li>

    <li class="bold">
      <a href="{{url('/user/courses')}}" class="{{(url()->current() == url('/user/courses')) ? 'active' : '' }}">
        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">My courses</span>
      </a>
    </li>
    @if(auth()->user()->id != 231)
    <li class="bold">
      <a href="{{url('/user/startup-video')}}" class="{{(url()->current() == url('/user/startup-video')) ? 'active' : '' }}">
        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Startup Video</span>
      </a>
    </li>
    @endif
    <li class="bold">
      <a href="{{url('/user/community')}}" class="{{(url()->current() == url('/user/community')) ? 'active' : '' }}">
        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Social Media Handles</span>
      </a>
    </li>
    @if(auth()->user()->id != 231)
    <li class="bold open"><a class="active collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)" tabindex="0"><i class="material-icons">receipt</i><span class="menu-title" data-i18n="Invoice">Affiliates</span></a>
      <div class="collapsible-body" style="">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">

          <li><a href="{{url('/user/affiliate')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice List">Affiliate Link</span></a>
          </li>
    </li>

    <li class="bold">
      <a href="{{url('/user/traffic')}}" class="{{(url()->current() == url('/user/traffic')) ? 'active' : '' }}">
        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Traffic</span>
      </a>
    </li>

    <li class="bold">
      <a href="{{url('/user/funds')}}" class="{{(url()->current() == url('/user/funds')) ? 'active' : '' }}">
        <i class="material-icons">payment</i><span class="menu-title" data-i18n="Chat"> Funds</span>
      </a>
    </li>

    <li class="bold">
      <a href="{{url('/user/offers')}}" class="{{(url()->current() == url('/user/offers')) ? 'active' : '' }}">
        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Offers</span>
      </a>
    </li>

    <li class="bold">
      <a href="{{url('/user/marketing-material')}}" class="{{(url()->current() == url('/user/marketing-material')) ? 'active' : '' }}">
        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Marketing Material</span>
      </a>
    </li>

    <li class="bold">
      <a href="{{url('/user/leaderboard')}}" class="{{(url()->current() == url('/user/leaderboard')) ? 'active' : '' }}">
        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Leaderboard</span>
      </a>
    </li>

    <li class="bold">
      <a href="{{url('/user/change-password')}}" class="{{(url()->current() == url('/user/change-password')) ? 'active' : '' }}">
        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat"> Change Password</span>

      </a>
    </li>

  </ul>
  </div>
  </li>
  @endif

  <li class="bold open"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)" tabindex="0"><i class="material-icons">receipt</i><span class="menu-title" data-i18n="Invoice">Payment Section</span></a>
    <div class="collapsible-body" style="">
      <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        <li class="bold">
          <a href="{{url('/user/bank-details')}}" class="{{(url()->current() == url('/user/bank-details')) ? 'active' : '' }}">
            <i class="material-icons">payment</i><span class="menu-title" data-i18n="Chat">Bank Details</span>
          </a>
        </li>

        <li class="bold">
          <a href="{{url('/user/payouts')}}" class="{{(url()->current() == url('/user/payouts')) ? 'active' : '' }}">
            <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Payouts</span>
          </a>
        </li>

      </ul>
    </div>
  </li>


  <li class="bold open"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)" tabindex="0"><i class="material-icons">receipt</i><span class="menu-title" data-i18n="Invoice">Training Section </span></a>
    <div class="collapsible-body" style="">
      <ul class="collapsible collapsible-sub" data-collapsible="accordion">

        <li class="bold">
          <a href="{{url('/user/webinar')}}" class="{{(url()->current() == url('/user/webinar')) ? 'active' : '' }}">
            <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Upcoming Webinars</span>
          </a>
        </li>

        <li class="bold">
          <a href="{{url('/user/training')}}" class="{{(url()->current() == url('/user/training')) ? 'active' : '' }}">
            <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Trainings</span>
          </a>
        </li>

        <li class="bold">
          <a href="{{url('/user/session')}}" class="{{(url()->current() == url('/user/session')) ? 'active' : '' }}">
            <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Q & A SESSIONS</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <li class="bold">
    <a href="{{url('/user/support')}}" class="{{(url()->current() == url('/user/support')) ? 'active' : '' }}">
      <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Support Number</span>
    </a>
  </li>
  @endif
  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside> -->


<div class="our-custom-sidebar">
  <div class="our-sidebar-wrap">
    <div class="logo">
      <a href="#"><img width="100" src="{{url('public/admin/')}}/app-assets/images/logo/Logo2.png" alt="logo"></a>
    </div>
    <div class="side-mid-cont">
      <ul class="our-side-menu" id="or-sd-menu">
        <!-- <li class="logo-cum-btn">
          <div class="logo-collpse"><a href="#"><img width="100" src="{{url('public/admin/')}}/app-assets/images/logo/Logo2.png" alt="logo"></a><button title="Collapse Sidebar" id="cllps-side-btn" class="collapse-sidebar-btn">
              <div class="line">|</div>
            </button></div>
        </li> -->
        <li class="normal-link">
          <a href="{{url('/user/dashboard')}}" class="{{(url()->current() == url('/user/dashboard')) ? 'active' : '' }}">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">dashboard</span>
              Dashboard
            </div>
          </a>
        </li>
        @if(auth()->user()->order_status == 1)

        @if(auth()->user()->id != 231)
        <li class="normal-link">
          <a href="{{url('/user/startup-video')}}" class="{{(url()->current() == url('/user/startup-video')) ? 'active' : '' }}">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">smart_display</span>
              Startup video
            </div>
            <!-- <div class="arrow">
              <span class="material-symbols-outlined">
                keyboard_arrow_right
              </span>
            </div> -->
          </a>
        </li>
        @endif



        @if(auth()->user()->id != 231)
        @php
        $openPaths = [
        'user/affiliate',
        'user/traffic',
        'user/funds',
        'user/offers',
        'user/marketing-material',
        'user/leaderboard',
        'user/change-password'
        ];

        $isAffiliatedropOpen = false;

        foreach ($openPaths as $path) {
        if (Request::is($path)) {
        $isAffiliatedropOpen = true;
        break;
        }
        }
        @endphp
        <li class="drop-dwn-link {{ $isAffiliatedropOpen ? 'dropped' : '' }}">
          <a href="JavaScript:void(0)">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">handshake</span>
              Affiliates
            </div>
            <div class="arrow">
              <span class="material-symbols-outlined">
                keyboard_arrow_right
              </span>
            </div>
          </a>
          <div class="drop-menu">
            <div class="drop-menu-item">
              <a href="{{url('/user/affiliate')}}" class="{{(url()->current() == url('/user/affiliate')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">link</span>
                  Affiliate Link
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/traffic')}}" class="{{(url()->current() == url('/user/traffic')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">web_traffic</span>
                  Traffic
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/funds')}}" class="{{(url()->current() == url('/user/funds')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">currency_exchange</span>
                  Funds
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/offers')}}" class="{{(url()->current() == url('/user/offers')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">local_activity</span>
                  Offers
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/marketing-material')}}" class="{{(url()->current() == url('/user/marketing-material')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">currency_exchange</span>
                  Marketing Material
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/leaderboard')}}" class="{{(url()->current() == url('/user/leaderboard')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">leaderboard</span>
                  Leaderboard
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/change-password')}}" class="{{(url()->current() == url('/user/change-password')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">lock_reset</span>
                  Change Password
                </div>
              </a>
            </div>
          </div>
        </li>
        @endif
        @php
        $openbankPaths = [
        'user/bank-details',
        'user/payouts'
        ];

        $ispaymentsdropOpen = false;

        foreach ($openbankPaths as $path) {
        if (Request::is($path)) {
        $ispaymentsdropOpen = true;
        break;
        }
        }
        @endphp
        <li class="drop-dwn-link {{ $ispaymentsdropOpen ? 'dropped' : '' }}">
          <a href="JavaScript:void(0)">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">currency_rupee</span>
              Payments
            </div>
            <div class="arrow">
              <span class="material-symbols-outlined">
                keyboard_arrow_right
              </span>
            </div>
          </a>
          <div class="drop-menu">
            <div class="drop-menu-item">
              <a href="{{url('/user/bank-details')}}" class="{{(url()->current() == url('/user/bank-details')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">assured_workload</span>
                  Bank Details
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/payouts')}}" class="{{(url()->current() == url('/user/payouts')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">receipt_long</span>
                  Payouts
                </div>
              </a>
            </div>
          </div>
        </li>

        <!-- Trainings Section  -->
        @php
        $opentrainingPaths = [
        'user/webinar',
        'user/training',
        'user/session'
        ];

        $istrainingsdropOpen = false;

        foreach ($opentrainingPaths as $path) {
        if (Request::is($path)) {
        $istrainingsdropOpen = true;
        break;
        }
        }
        @endphp
        <li class="drop-dwn-link {{ $istrainingsdropOpen ? 'dropped' : '' }}">
          <a href="JavaScript:void(0)">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">stacks</span>
              Trainings
            </div>
            <div class="arrow">
              <span class="material-symbols-outlined">
                keyboard_arrow_right
              </span>
            </div>
          </a>
          <div class="drop-menu">
            <div class="drop-menu-item">
              <a href="{{url('/user/webinar')}}" class="{{(url()->current() == url('/user/webinar')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">live_tv</span>
                  Webinars
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/training')}}" class="{{(url()->current() == url('/user/training')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">browse_activity</span>
                  Trainings
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/session')}}" class="{{(url()->current() == url('/user/session')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">help_center</span>
                  QnA
                </div>
              </a>
            </div>
          </div>
        </li>

        <li class="normal-link">
          <a href="{{url('/user/support')}}" class="{{(url()->current() == url('/user/support')) ? 'active' : '' }}">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">call_quality</span>
              Support
            </div>
          </a>
        </li>
        @endif
      </ul>
      <ul class="our-side-collapsed-menu" id="or-sd-cl-menu">
        <li class="logo-cum-btn">
          <div class="logo-collpse"><a href="#"><img width="50" src="{{url('public/admin/')}}/app-assets/images/logo/favicon.png" alt="logo"></a><button title="Expand Sidebar" id="opn-side-btn" class="opn-sidebar-btn">
              <div class="line">|</div>
            </button></div>
        </li>

        <li class="normal-link">
          <a title="Dashboard" href="{{url('/user/dashboard')}}" class="{{(url()->current() == url('/user/dashboard')) ? 'active' : '' }}">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">dashboard</span>
            </div>
            <!-- <div class="arrow">
              <span class="material-symbols-outlined">
                keyboard_arrow_right
              </span>
            </div> -->
          </a>
        </li>

        @if(auth()->user()->order_status == 1)

        @if(auth()->user()->id != 231)
        <li class="normal-link">
          <a title="Startup Video" href="{{url('/user/startup-video')}}" class="{{(url()->current() == url('/user/startup-video')) ? 'active' : '' }}">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">smart_display</span>
            </div>
          </a>
        </li>
        @endif


        @if(auth()->user()->id != 231)
        @php
        $openPaths = [
        'user/affiliate',
        'user/traffic',
        'user/funds',
        'user/offers',
        'user/marketing-material',
        'user/leaderboard',
        'user/change-password'
        ];

        $isAffiliatedropOpen = false;

        foreach ($openPaths as $path) {
        if (Request::is($path)) {
        $isAffiliatedropOpen = true;
        break;
        }
        }
        @endphp
        <li class="drop-dwn-link {{ $isAffiliatedropOpen ? 'dropped' : '' }}">
          <a title="Affiliate" href="JavaScript:void(0)">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">linked_services</span>
            </div>
            <div class="arrow">
              <span class="material-symbols-outlined">
                keyboard_arrow_up
              </span>
            </div>
          </a>
          <div class="drop-menu">
            <div class="drop-menu-item">
              <a title="Affiliate Link" href="{{url('/user/affiliate')}}" class="{{(url()->current() == url('/user/affiliate')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">link</span>
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a title="Traffic" href="{{url('/user/traffic')}}" class="{{(url()->current() == url('/user/traffic')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">web_traffic</span>
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a title="Funds" href="{{url('/user/funds')}}" class="{{(url()->current() == url('/user/funds')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">currency_exchange</span>
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a title="Offers" href="{{url('/user/offers')}}" class="{{(url()->current() == url('/user/offers')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">local_activity</span>
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/marketing-material')}}" class="{{(url()->current() == url('/user/marketing-material')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">grade</span>
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/leaderboard')}}" class="{{(url()->current() == url('/user/leaderboard')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">leaderboard</span>
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/change-password')}}" class="{{(url()->current() == url('/user/change-password')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">lock_reset</span>
                </div>
              </a>
            </div>
          </div>
        </li>
        @endif
        @php
        $openbankPaths = [
        'user/bank-details',
        'user/payouts'
        ];

        $ispaymentsdropOpen = false;

        foreach ($openbankPaths as $path) {
        if (Request::is($path)) {
        $ispaymentsdropOpen = true;
        break;
        }
        }
        @endphp
        <li class="drop-dwn-link {{ $ispaymentsdropOpen ? 'dropped' : '' }}">
          <a href="JavaScript:void(0)">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">payments</span>
            </div>
            <div class="arrow">
              <span class="material-symbols-outlined">
                keyboard_arrow_up
              </span>
            </div>
          </a>
          <div class="drop-menu">
            <div class="drop-menu-item">
              <a href="{{url('/user/bank-details')}}" class="{{(url()->current() == url('/user/bank-details')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">assured_workload</span>
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/payouts')}}" class="{{(url()->current() == url('/user/payouts')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">receipt_long</span>
                </div>
              </a>
            </div>
          </div>
        </li>

        <!-- Trainings Section  -->
        @php
        $opentrainingPaths = [
        'user/webinar',
        'user/training',
        'user/session'
        ];

        $istrainingsdropOpen = false;

        foreach ($opentrainingPaths as $path) {
        if (Request::is($path)) {
        $istrainingsdropOpen = true;
        break;
        }
        }
        @endphp
        <li class="drop-dwn-link {{ $istrainingsdropOpen ? 'dropped' : '' }}">
          <a href="JavaScript:void(0)">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">model_training</span>
            </div>
            <div class="arrow">
              <span class="material-symbols-outlined">
                keyboard_arrow_up
              </span>
            </div>
          </a>
          <div class="drop-menu">
            <div class="drop-menu-item">
              <a href="{{url('/user/webinar')}}" class="{{(url()->current() == url('/user/webinar')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">live_tv</span>
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/training')}}" class="{{(url()->current() == url('/user/training')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">browse_activity</span>
                </div>
              </a>
            </div>
            <div class="drop-menu-item">
              <a href="{{url('/user/session')}}" class="{{(url()->current() == url('/user/session')) ? 'active' : '' }}">
                <div class="lnk-ttl">
                  <span class="material-symbols-outlined">help_center</span>
                </div>
              </a>
            </div>
          </div>
        </li>

        <li class="normal-link">
          <a href="{{url('/user/support')}}" class="{{(url()->current() == url('/user/support')) ? 'active' : '' }}">
            <div class="lnk-ttl">
              <span class="material-symbols-outlined">call_quality</span>
            </div>
          </a>
        </li>
        @endif

      </ul>
    </div>
    <div class="side-bar-footer">
      @if(auth()->user()->order_status == 1)
      <h4>{{ ucfirst(auth()->user()->name)}}</h4>
      <a class="grey-text text-darken-1" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <span class="material-symbols-outlined">logout</span> {{ __('Logout') }}</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      @endif

    </div>


  </div>
</div>

<div class="our-custom-bottombar" id="our-custom-bottombar">
  <div class="our-bottombar-wrap">
    <ul class="our-bottom-menu">
      <li class="normal-link">
        <a href="{{url('/user/dashboard')}}" class="{{(url()->current() == url('/user/dashboard')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">dashboard</span>
            DASH
          </div>
        </a>
      </li>
      @if(auth()->user()->order_status == 1)

      @if(auth()->user()->id != 231)
      <li class="normal-link">
        <a href="{{url('/user/startup-video')}}" class="{{(url()->current() == url('/user/startup-video')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">smart_display</span>
            STARTUP VIDEO
          </div>
          <!-- <div class="arrow">
            <span class="material-symbols-outlined">
              keyboard_arrow_right
            </span>
          </div> -->
        </a>
      </li>
      @endif
      <li class="normal-link">
        <a href="#" class="{{(url()->current() == url('/user/dashboard')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">notifications</span>
            NOTIFICATIONS
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="#" class="{{(url()->current() == url('/user/dashboard')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">screen_record</span>
            NOTIFICATIONS
          </div>
        </a>
      </li>
      <li class="normal-link" id="bottmbar-draw-btn">
        <a href="#">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">keyboard_arrow_up</span>
            EXPAND
          </div>
        </a>
      </li>
      @endif
    </ul>



    @if(auth()->user()->order_status == 1)
    <p>AFFILIATES</p>
    <ul class="our-bottom-menu make-grid">

      @if(auth()->user()->id != 231)
      @php
      $openPaths = [
      'user/affiliate',
      'user/traffic',
      'user/funds',
      'user/offers',
      'user/marketing-material',
      'user/leaderboard',
      'user/change-password'
      ];

      $isAffiliatedropOpen = false;

      foreach ($openPaths as $path) {
      if (Request::is($path)) {
      $isAffiliatedropOpen = true;
      break;
      }
      }
      @endphp
      <li class="normal-link">
        <a href="{{url('/user/affiliate')}}" class="{{(url()->current() == url('/user/affiliate')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">link</span>
            Affiliate Link
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/traffic')}}" class="{{(url()->current() == url('/user/traffic')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">web_traffic</span>
            Traffic
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/funds')}}" class="{{(url()->current() == url('/user/funds')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">currency_exchange</span>
            Funds
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/offers')}}" class="{{(url()->current() == url('/user/offers')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">local_activity</span>
            Offers
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/marketing-material')}}" class="{{(url()->current() == url('/user/marketing-material')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">currency_exchange</span>
            Marketing Material
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/leaderboard')}}" class="{{(url()->current() == url('/user/leaderboard')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">leaderboard</span>
            Leaderboard
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/change-password')}}" class="{{(url()->current() == url('/user/change-password')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">lock_reset</span>
            Change Password
          </div>
        </a>
      </li>
      @endif
    </ul>
    <!-- ----------- -->
    @endif



    @if(auth()->user()->order_status == 1)
    <p>PAYMENTS</p>
    <ul class="our-bottom-menu make-grid">
      @php
      $openbankPaths = [
      'user/bank-details',
      'user/payouts'
      ];

      $ispaymentsdropOpen = false;

      foreach ($openbankPaths as $path) {
      if (Request::is($path)) {
      $ispaymentsdropOpen = true;
      break;
      }
      }
      @endphp
      <li class="normal-link">
        <a href="{{url('/user/bank-details')}}" class="{{(url()->current() == url('/user/bank-details')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">assured_workload</span>
            Bank Details
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/payouts')}}" class="{{(url()->current() == url('/user/payouts')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">receipt_long</span>
            Payouts
          </div>
        </a>
      </li>
    </ul>
    @endif



    @if(auth()->user()->order_status == 1)
    <p>TRAININGS</p>
    <ul class="our-bottom-menu make-grid">
      <!-- Trainings Section  -->
      @php
      $opentrainingPaths = [
      'user/webinar',
      'user/training',
      'user/session'
      ];

      $istrainingsdropOpen = false;

      foreach ($opentrainingPaths as $path) {
      if (Request::is($path)) {
      $istrainingsdropOpen = true;
      break;
      }
      }
      @endphp
      <li class="normal-link">
        <a href="{{url('/user/webinar')}}" class="{{(url()->current() == url('/user/webinar')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">live_tv</span>
            Webinars
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/training')}}" class="{{(url()->current() == url('/user/training')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">browse_activity</span>
            Trainings
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/session')}}" class="{{(url()->current() == url('/user/session')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">help_center</span>
            QnA
          </div>
        </a>
      </li>
      <li class="normal-link">
        <a href="{{url('/user/support')}}" class="{{(url()->current() == url('/user/support')) ? 'active' : '' }}">
          <div class="lnk-ttl">
            <span class="material-symbols-outlined">call_quality</span>
            Support
          </div>
        </a>
      </li>
    </ul>
    @endif
  </div>
</div>