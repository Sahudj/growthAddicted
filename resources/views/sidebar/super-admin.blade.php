<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{url('/')}}" style="padding: 0px; margin: -24px 0px 0px 0px"><img style="height: 100px !important" class="hide-on-med-and-down" src="{{url('public/Final Logo.png/')}}" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="{{url('public/admin/')}}/app-assets/images/logo/materialize-logo.png" alt="materialize logo"/></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <?php
          $permission = DB::table('permission')->where('user_id', auth()->user()->id)->first();
        ?>
         @if(isset($permission) && ($permission->is_dashboard == 1))
          <li class="bold">
            <a class="{{(url()->current() == url('/admin/dashboard')) ? 'active' : '' }}" href="{{url('/admin/dashboard')}}"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
            </a>
          </li>
        @endif


         @if(isset($permission) && ($permission->is_profile == 1))
            <li class="bold"><a class="{{(url()->current() == url('/admin/profile')) ? 'active' : '' }}" href="{{url('/admin/profile')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Profile</span></a>
            </li>
        @endif

        @if(isset($permission) && ($permission->is_usersListing == 1))
        <li class="bold">
          <a class="{{(url()->current() == url('/admin/user-listing')) ? 'active' : '' }}" href="{{url('/admin/user-listing')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Users</span></a>
        </li>
        @endif

        @if(isset($permission) && ($permission->is_adminUserListing == 1))
        
        <li class="bold">
          <a class="{{(url()->current() == url('/admin/admin-listing')) ? 'active' : '' }}" href="{{url('/admin/admin-listing')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Admin Users</span></a>
        </li>
        @endif

        @if(isset($permission) && ($permission->is_packages == 1))
        <li class="bold">
          <a class="{{(url()->current() == url('/admin/packages')) ? 'active' : '' }}" href="{{url('/admin/packages')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Packages</span></a>
        </li>
        @endif

        @if(isset($permission) && ($permission->is_course == 1))
        <li class="bold">
          <a class="{{(url()->current() == url('/admin/all-courses')) ? 'active' : '' }}" href="{{url('/admin/all-courses')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Courses</span></a>
        </li>
        @endif

        @if(isset($permission) && ($permission->is_traffic == 1))
         <li class="bold open"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)" tabindex="0"><i class="material-icons dp48">settings_applications</i><span class="menu-title" data-i18n="Invoice">Traffic </span></a>
          <div class="collapsible-body" style="">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              
         <li class="bold">
          <a class="{{(url()->current() == url('/admin/affiliate-traffic')) ? 'active' : '' }}" href="{{url('/admin/affiliate-traffic')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Paid</span></a>
        </li>

         <li class="bold">
          <a class="{{(url()->current() == url('/admin/unpaid-traffic')) ? 'active' : '' }}" href="{{url('/admin/unpaid-traffic')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">UnPaid</span></a>
        </li>

            </ul>
          </div>
        </li>
        @endif

        @if(isset($permission) && ($permission->is_search == 1))
          <li class="bold">
            <a class="{{(url()->current() == url('/admin/search-order')) ? 'active' : '' }}" href="{{url('/admin/search-order')}}"><i class="material-icons">search</i><span class="menu-title" data-i18n="Chat">Search</span></a>
          </li>
        @endif
     
        <li class="bold">
          <a class="{{(url()->current() == url('/admin/payouts/1')) ? 'active' : '' }}" href="{{url('/admin/payouts/1')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Payout</span></a>
        </li>
     
        @if(isset($permission) && ($permission->is_leaderboard == 1))
         <li class="bold">
          <a class="{{(url()->current() == url('/admin/leaderboards')) ? 'active' : '' }}" href="{{url('/admin/leaderboards')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Leaderboard</span></a>
        </li>
        @endif

        @if(isset($permission) && ($permission->is_offers == 1))
        <li class="bold">
          <a class="{{(url()->current() == url('/admin/all-offers')) ? 'active' : '' }}" href="{{url('/admin/all-offers')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Offers</span></a>
        </li>
        @endif

        @if(isset($permission) && ($permission->is_setting == 1))
              <li class="bold open"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)" tabindex="0"><i class="material-icons dp48">settings_applications</i><span class="menu-title" data-i18n="Invoice">Setting </span></a>
          <div class="collapsible-body" style="">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              
          <li class="bold">
            <a href="{{url('/admin/packages-price')}}" class="{{(url()->current() == url('/admin/packages-price')) ? 'active' : '' }}">
            <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Package Price</span>
            </a>
          </li>

          <li class="bold">
            <a href="{{url('/admin/upgrade-price')}}" class="{{(url()->current() == url('/admin/upgrade-price')) ? 'active' : '' }}">
            <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Upgrade Price</span>
            </a>
          </li>

            <li class="bold">
              <a href="{{url('/admin/payment-setting')}}" class="{{(url()->current() == url('/admin/payment-setting')) ? 'active' : '' }}">
              <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Payment</span>
              </a>
            </li>

            </ul>
          </div>
        </li>
        @endif

        @if(isset($permission) && ($permission->is_social_media == 1))
         <li class="bold">
            <a class="{{(url()->current() == url('/admin/setting')) ? 'active' : '' }}" href="{{url('/admin/setting')}}"><i class="material-icons dp48">settings_applications</i><span class="menu-title" data-i18n="Chat">Setting</span></a>
          </li>
        @endif  
       
        @if(isset($permission) && ($permission->is_training == 1))
        <li class="bold open"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)" tabindex="0"><i class="material-icons">receipt</i><span class="menu-title" data-i18n="Invoice">Training Section </span></a>
          <div class="collapsible-body" style="">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li class="bold">
            <a href="{{url('/admin/training-listing')}}" class="{{(url()->current() == url('/admin/training-listing')) ? 'active' : '' }}">
              <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Training</span>
            </a>
          </li>

          <li class="bold">
            <a href="{{url('/admin/webinar-listing')}}" class="{{(url()->current() == url('/admin/webinar-listing')) ? 'active' : '' }}">
            <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Webinar</span>
            </a>
          </li>

          <li class="bold">
            <a href="{{url('/admin/session-listing')}}" class="{{(url()->current() == url('/admin/session-listing')) ? 'active' : '' }}">
             <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Q & A SESSIONS</span>
            </a>
          </li>

           <li class="bold">
              <a class="{{(url()->current() == url('/admin/all-marketing-material')) ? 'active' : '' }}" href="{{url('/admin/all-marketing-material')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Chat">Marketing Material</span></a>
            </li>
            
            </ul>
          </div>
        </li>
        @endif
        
        @if(isset($permission) && ($permission->is_emailTemplate == 1))
         <li class="bold open"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)" tabindex="0"><i class="material-icons">email</i><span class="menu-title" data-i18n="Invoice">Email Template </span></a>
          <div class="collapsible-body" style="">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li class="bold">
            <a href="{{url('/admin/email-template-list')}}" class="{{(url()->current() == url('/admin/email-template-list')) ? 'active' : '' }}">
              <i class="material-icons">email</i><span class="menu-title" data-i18n="Chat">Templates</span>
            </a>
          </li>

          <li class="bold">
            <a href="{{url('/admin/email-template')}}" class="{{(url()->current() == url('/admin/email-template')) ? 'active' : '' }}">
            <i class="material-icons">email</i><span class="menu-title" data-i18n="Chat">Add Template</span>
            </a>
          </li>

          <li class="bold">
            <a href="{{url('/admin/send-email-users')}}" class="{{(url()->current() == url('/admin/send-email-users')) ? 'active' : '' }}">
             <i class="material-icons">email</i><span class="menu-title" data-i18n="Chat">Send Email</span>
            </a>
          </li>
            </ul>
          </div>
        </li>
        @endif
      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>