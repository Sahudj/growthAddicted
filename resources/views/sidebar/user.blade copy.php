<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{url('/')}}" style="padding: 0px; margin: -24px 0px 0px 0px"><img style="height: 100px !important" class="hide-on-med-and-down" src="{{url('public/Final Logo.png/')}}" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="{{url('public/admin/')}}/app-assets/images/logo/materialize-logo.png" alt="materialize logo"/></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
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
              <!-- <li><a href="{{url('/user/affiliate')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Invoice View">Affiliate Listing</span></a> -->
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
    </aside>