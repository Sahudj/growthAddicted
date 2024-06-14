<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
   <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
   <meta name="author" content="ThemeSelect">
   <title>Growth Addicted</title>
   <link rel="shortcut icon" type="image/png" href="{{url('public/frontend/home/')}}/assets/images/favicon.png">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!-- BEGIN: VENDOR CSS-->
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/vendors.min.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/animate-css/animate.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist.min.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist-plugin-tooltip.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/themes/vertical-modern-menu-template/materialize.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/themes/vertical-modern-menu-template/style.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/pages/dashboard-modern.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/pages/intro.css">
   <!-- END: Page Level CSS-->
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/pages/page-users.css">
   <!-- BEGIN: Custom CSS-->
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/custom/custom.css">

   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/flag-icon/css/flag-icon.min.css">

   <link rel="stylesheet" href="{{url('public/admin/')}}/app-assets/vendors/select2/select2.min.css" type="text/css">
   <link rel="stylesheet" href="{{url('public/admin/')}}/app-assets/vendors/select2/select2-materialize.css" type="text/css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/pages/form-select2.css">

   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/fonts/fontawesome/css/all.min.css">
   <!-- END: Custom CSS-->
   <script src="{{url('public/admin/')}}/app-assets/js/vendors.min.js"></script>
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/quill/katex.min.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/quill/monokai-sublime.min.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/quill/quill.snow.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/quill/quill.bubble.css">
   <style type="text/css">
      label {
         font-size: 15px !important;
         color: BLACK !important;
      }

      label.active {
         font-size: 20px !important;
      }
   </style>
</head>
<!-- END: Head-->

<body oncontextmenu="return false;" class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

   <!-- BEGIN: Header-->
   <header class="page-topbar" id="header">
      <div class="navbar navbar-fixed">
         <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">
            <div class="nav-wrapper">
               <ul class="navbar-list right">

                  <li class="hide-on-large-only search-input-wrapper"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
                  <!-- <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">1</small></i></a></li> -->
                  <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online">
                           @if(auth()->user()->profile_pic)
                           <img src="{{url('public/profile_pic/'.auth()->user()->profile_pic)}}" alt="avatar">
                           @else
                           <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="avatar">
                           @endif
                           <i></i></span></a></li>
               </ul>
               <!-- translation-button-->

               <!-- notifications-dropdown-->
               <ul class="dropdown-content" id="notifications-dropdown">
                  <li>
                     <h6>NOTIFICATIONS<span class="new badge">1</span></h6>
                  </li>
                  <li class="divider"></li>
                  <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                     <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                  </li>

               </ul>
               <!-- profile-dropdown-->
               <ul class="dropdown-content" id="profile-dropdown">
                  <li><a class="grey-text text-darken-1" href="{{url('/admin/dashboard')}}"><i class="material-icons">person_outline</i> {{ucfirst(auth()->user()->name)}}</a></li>
                  @if(auth()->user()->referral_code)
                  <li><a class="grey-text text-darken-1" href="{{url('/admin/profile')}}">{{ucfirst(auth()->user()->referral_code)}} </a></li>
                  @endif
                  <li><a class="grey-text text-darken-1" href="{{url('/')}}"><i class="material-icons">settings_input_svideo</i> Home</a></li>

                  <?php $permission = DB::table('permission')->where('user_id', auth()->user()->id)->first(); ?>
                  @if(isset($permission) && ($permission->is_profile == 1))
                  <li><a class="grey-text text-darken-1" href="{{url('/admin/profile')}}"><i class="material-icons">person_outline</i> Profile</a></li>
                  @endif

                  <li>
                     <a class="grey-text text-darken-1" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"> <i class="material-icons">keyboard_tab</i> {{ __('Logout') }}</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                  </li>
               </ul>
            </div>
            <nav class="display-none search-sm">
               <div class="nav-wrapper">
                  <form id="navbarForm">
                     <div class="input-field search-input-sm">
                        <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
                        <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                        <ul class="search-list collection search-list-sm display-none"></ul>
                     </div>
                  </form>
               </div>
            </nav>
         </nav>
      </div>
   </header>
   <!-- END: Header-->




   @auth()
   @if(Auth()->user()->role == 1)
   @include('sidebar.super-admin')
   @elseif(Auth()->user()->role == 2)
   @include('sidebar.user')
   @endif
   @endauth
   <!-- BEGIN: Page Main-->
   <div id="main">
      @yield('content')
   </div>

   <!-- <a
   href="#"
   data-target="theme-cutomizer-out"
   class="btn btn-customizer pink accent-2 white-text sidenav-trigger theme-cutomizer-trigger"
   ><i class="material-icons">settings</i></a
> -->

   <div id="theme-cutomizer-out" class="theme-cutomizer sidenav row">
      <div class="col s12">
         <a class="sidenav-close" href="#!"><i class="material-icons">close</i></a>
         <h5 class="theme-cutomizer-title">Theme Customizer</h5>
         <p class="medium-small">Customize & Preview in Real Time</p>
         <div class="menu-options">
            <h6 class="mt-6">Menu Options</h6>
            <hr class="customize-devider" />
            <div class="menu-options-form row">
               <div class="input-field col s12 menu-color mb-0">
                  <p class="mt-0">Menu Color</p>
                  <div class="gradient-color center-align">
                     <span class="menu-color-option gradient-45deg-indigo-blue" data-color="gradient-45deg-indigo-blue"></span>
                     <span class="menu-color-option gradient-45deg-purple-deep-orange" data-color="gradient-45deg-purple-deep-orange"></span>
                     <span class="menu-color-option gradient-45deg-light-blue-cyan" data-color="gradient-45deg-light-blue-cyan"></span>
                     <span class="menu-color-option gradient-45deg-purple-amber" data-color="gradient-45deg-purple-amber"></span>
                     <span class="menu-color-option gradient-45deg-purple-deep-purple" data-color="gradient-45deg-purple-deep-purple"></span>
                     <span class="menu-color-option gradient-45deg-deep-orange-orange" data-color="gradient-45deg-deep-orange-orange"></span>
                     <span class="menu-color-option gradient-45deg-green-teal" data-color="gradient-45deg-green-teal"></span>
                     <span class="menu-color-option gradient-45deg-indigo-light-blue" data-color="gradient-45deg-indigo-light-blue"></span>
                     <span class="menu-color-option gradient-45deg-red-pink" data-color="gradient-45deg-red-pink"></span>
                  </div>
                  <div class="solid-color center-align">
                     <span class="menu-color-option red" data-color="red"></span>
                     <span class="menu-color-option purple" data-color="purple"></span>
                     <span class="menu-color-option pink" data-color="pink"></span>
                     <span class="menu-color-option deep-purple" data-color="deep-purple"></span>
                     <span class="menu-color-option cyan" data-color="cyan"></span>
                     <span class="menu-color-option teal" data-color="teal"></span>
                     <span class="menu-color-option light-blue" data-color="light-blue"></span>
                     <span class="menu-color-option amber darken-3" data-color="amber darken-3"></span>
                     <span class="menu-color-option brown darken-2" data-color="brown darken-2"></span>
                  </div>
               </div>
               <div class="input-field col s12 menu-bg-color mb-0">
                  <p class="mt-0">Menu Background Color</p>
                  <div class="gradient-color center-align">
                     <span class="menu-bg-color-option gradient-45deg-indigo-blue" data-color="gradient-45deg-indigo-blue"></span>
                     <span class="menu-bg-color-option gradient-45deg-purple-deep-orange" data-color="gradient-45deg-purple-deep-orange"></span>
                     <span class="menu-bg-color-option gradient-45deg-light-blue-cyan" data-color="gradient-45deg-light-blue-cyan"></span>
                     <span class="menu-bg-color-option gradient-45deg-purple-amber" data-color="gradient-45deg-purple-amber"></span>
                     <span class="menu-bg-color-option gradient-45deg-purple-deep-purple" data-color="gradient-45deg-purple-deep-purple"></span>
                     <span class="menu-bg-color-option gradient-45deg-deep-orange-orange" data-color="gradient-45deg-deep-orange-orange"></span>
                     <span class="menu-bg-color-option gradient-45deg-green-teal" data-color="gradient-45deg-green-teal"></span>
                     <span class="menu-bg-color-option gradient-45deg-indigo-light-blue" data-color="gradient-45deg-indigo-light-blue"></span>
                     <span class="menu-bg-color-option gradient-45deg-red-pink" data-color="gradient-45deg-red-pink"></span>
                  </div>
                  <div class="solid-color center-align">
                     <span class="menu-bg-color-option red" data-color="red"></span>
                     <span class="menu-bg-color-option purple" data-color="purple"></span>
                     <span class="menu-bg-color-option pink" data-color="pink"></span>
                     <span class="menu-bg-color-option deep-purple" data-color="deep-purple"></span>
                     <span class="menu-bg-color-option cyan" data-color="cyan"></span>
                     <span class="menu-bg-color-option teal" data-color="teal"></span>
                     <span class="menu-bg-color-option light-blue" data-color="light-blue"></span>
                     <span class="menu-bg-color-option amber darken-3" data-color="amber darken-3"></span>
                     <span class="menu-bg-color-option brown darken-2" data-color="brown darken-2"></span>
                  </div>
               </div>
               <div class="input-field col s12">
                  <div class="switch">
                     Menu Dark
                     <label class="float-right"><input class="menu-dark-checkbox" type="checkbox" /> <span class="lever ml-0"></span></label>
                  </div>
               </div>
               <div class="input-field col s12">
                  <div class="switch">
                     Menu Collapsed
                     <label class="float-right"><input class="menu-collapsed-checkbox" type="checkbox" /> <span class="lever ml-0"></span></label>
                  </div>
               </div>
               <div class="input-field col s12">
                  <div class="switch">
                     <p class="mt-0">Menu Selection</p>
                     <label>
                        <input class="menu-selection-radio with-gap" value="sidenav-active-square" name="menu-selection" type="radio" />
                        <span>Square</span>
                     </label>
                     <label>
                        <input class="menu-selection-radio with-gap" value="sidenav-active-rounded" name="menu-selection" type="radio" />
                        <span>Rounded</span>
                     </label>
                     <label>
                        <input class="menu-selection-radio with-gap" value="" name="menu-selection" type="radio" />
                        <span>Normal</span>
                     </label>
                  </div>
               </div>
            </div>
         </div>
         <h6 class="mt-6">Navbar Options</h6>
         <hr class="customize-devider" />
         <div class="navbar-options row">
            <div class="input-field col s12 navbar-color mb-0">
               <p class="mt-0">Navbar Color</p>
               <div class="gradient-color center-align">
                  <span class="navbar-color-option gradient-45deg-indigo-blue" data-color="gradient-45deg-indigo-blue"></span>
                  <span class="navbar-color-option gradient-45deg-purple-deep-orange" data-color="gradient-45deg-purple-deep-orange"></span>
                  <span class="navbar-color-option gradient-45deg-light-blue-cyan" data-color="gradient-45deg-light-blue-cyan"></span>
                  <span class="navbar-color-option gradient-45deg-purple-amber" data-color="gradient-45deg-purple-amber"></span>
                  <span class="navbar-color-option gradient-45deg-purple-deep-purple" data-color="gradient-45deg-purple-deep-purple"></span>
                  <span class="navbar-color-option gradient-45deg-deep-orange-orange" data-color="gradient-45deg-deep-orange-orange"></span>
                  <span class="navbar-color-option gradient-45deg-green-teal" data-color="gradient-45deg-green-teal"></span>
                  <span class="navbar-color-option gradient-45deg-indigo-light-blue" data-color="gradient-45deg-indigo-light-blue"></span>
                  <span class="navbar-color-option gradient-45deg-red-pink" data-color="gradient-45deg-red-pink"></span>
               </div>
               <div class="solid-color center-align">
                  <span class="navbar-color-option red" data-color="red"></span>
                  <span class="navbar-color-option purple" data-color="purple"></span>
                  <span class="navbar-color-option pink" data-color="pink"></span>
                  <span class="navbar-color-option deep-purple" data-color="deep-purple"></span>
                  <span class="navbar-color-option cyan" data-color="cyan"></span>
                  <span class="navbar-color-option teal" data-color="teal"></span>
                  <span class="navbar-color-option light-blue" data-color="light-blue"></span>
                  <span class="navbar-color-option amber darken-3" data-color="amber darken-3"></span>
                  <span class="navbar-color-option brown darken-2" data-color="brown darken-2"></span>
               </div>
            </div>
            <div class="input-field col s12">
               <div class="switch">
                  Navbar Dark
                  <label class="float-right"><input class="navbar-dark-checkbox" type="checkbox" /> <span class="lever ml-0"></span></label>
               </div>
            </div>
            <div class="input-field col s12">
               <div class="switch">
                  Navbar Fixed
                  <label class="float-right"><input class="navbar-fixed-checkbox" type="checkbox" checked /> <span class="lever ml-0"></span></label>
               </div>
            </div>
         </div>
         <h6 class="mt-6">Footer Options</h6>
         <hr class="customize-devider" />
         <div class="navbar-options row">
            <div class="input-field col s12">
               <div class="switch">
                  Footer Dark
                  <label class="float-right"><input class="footer-dark-checkbox" type="checkbox" /> <span class="lever ml-0"></span></label>
               </div>
            </div>
            <div class="input-field col s12">
               <div class="switch">
                  Footer Fixed
                  <label class="float-right"><input class="footer-fixed-checkbox" type="checkbox" /> <span class="lever ml-0"></span></label>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--/ Theme Customizer -->

   <!-- BEGIN: Footer-->

   <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
      <div class="footer-copyright">
         <div class="container"><span>&copy; {{date('Y')}} <a href="https://growthaddicted.com/" target="_blank">Growth Addicted</a> All rights reserved.</span></div>
      </div>
   </footer>

   <!-- END: Footer-->
   <!-- BEGIN VENDOR JS-->
   <script src="{{url('public/admin/')}}/app-assets/js/vendors.min.js"></script>
   <!-- BEGIN VENDOR JS-->
   <!-- BEGIN PAGE VENDOR JS-->
   <script src="{{url('public/admin/')}}/app-assets/vendors/chartjs/chart.min.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist.min.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist-plugin-tooltip.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>

   <script src="{{url('public/admin/')}}/app-assets/js/plugins.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/js/search.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/js/custom/custom-script.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/js/scripts/customizer.js"></script>
   <!-- <script src="{{url('public/admin/')}}/app-assets/js/scripts/dashboard-modern.js"></script> -->
   <script src="{{url('public/admin/')}}/app-assets/js/scripts/intro.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/vendors/quill/katex.min.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/vendors/quill/highlight.min.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/vendors/quill/quill.min.js"></script>
   <!--   <script src="{{url('public/admin/')}}/app-assets/js/scripts/form-editor.js"></script> -->
   <script src="{{url('public/admin/')}}/app-assets/vendors/select2/select2.full.min.js"></script>
   <script src="{{url('public/admin/')}}/app-assets/js/scripts/form-select2.js"></script>



   <script type="text/javascript">
      (function(window, document, $) {
         'use strict';

         var Font = Quill.import('formats/font');
         Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
         Quill.register(Font, true);

         // Full Editor

         var fullEditor = new Quill('#snow-container .editor', {
            bounds: '#snow-container .editor',
            modules: {
               'formula': true,
               'syntax': true,
               'toolbar': [
                  [{
                     'font': []
                  }, {
                     'size': []
                  }],
                  ['bold', 'italic', 'underline', 'strike'],
                  [{
                     'color': []
                  }, {
                     'background': []
                  }],
                  [{
                     'script': 'super'
                  }, {
                     'script': 'sub'
                  }],
                  [{
                     'header': '1'
                  }, {
                     'header': '2'
                  }, 'blockquote', 'code-block'],
                  [{
                     'list': 'ordered'
                  }, {
                     'list': 'bullet'
                  }, {
                     'indent': '-1'
                  }, {
                     'indent': '+1'
                  }],
                  ['direction', {
                     'align': []
                  }],
                  ['link', 'image', 'video', 'formula'],
                  ['clean']
               ],
            },
            theme: 'snow'
         });

         fullEditor.on('text-change', function(delta, source) {
            var justHtml = fullEditor.root.innerHTML;
            document.getElementById('quill-html').innerHTML = justHtml;
         });

         // add browser default class to quill select 
         var quillSelect = $("select[class^='ql-'], input[data-link]");
         quillSelect.addClass("browser-default");

         var editors = [bubbleEditor, snowEditor, fullEditor];

      })(window, document, jQuery);
   </script>

   <script type="text/javascript">
      $('.show_confirm').click(function(e) {
         if (!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
         }
      });

      $('.editButton').click(function(e) {
         if (!confirm('Are you sure you want to edit this?')) {
            e.preventDefault();
         }
      });


      $(document).ready(function() {

         if ($("#users-list-datatable").length > 0) {
            $("#users-list-datatable").DataTable({
               "ordering": false
            });
         };

         if ($("#unpaid-list-datatable").length > 0) {
            $("#unpaid-list-datatable").DataTable({

            });
         };

      });



      $(".select2-icons").select2({
         dropdownAutoWidth: true,
         width: '100%',
         placeholder: "Select sub packages",
      });


      $(".select2").select2({
         dropdownAutoWidth: true,
         width: '100%'
      });

      $('#sponsor').on('select2:select', function(e) {
         $("#sponsorPack").val(e.params.data.element.dataset.packageid);
         $('#superSponsor').val(e.params.data.element.dataset.ref_by_user);
         $('#firstSponsorName').val(e.params.data.element.dataset.name);
         $('#firstSponsorEmail').val(e.params.data.element.dataset.email);
      });

      $(document).ready(function() {
         getLink();
      });
      $('#referral_code').click(function() {
         var text = $('#userReferralCode').val();
         var inp = document.createElement('input');
         document.body.appendChild(inp)
         inp.value = text;
         inp.select();
         document.execCommand('copy', false);
         inp.remove();

         alert('Referral code copy successfully !')
      })

      $('#orientationLink').click(function() {
         var text = $('#orientation').val();
         var inp = document.createElement('input');
         document.body.appendChild(inp)
         inp.value = text;
         inp.select();
         document.execCommand('copy', false);
         inp.remove();

         alert('Link copy successfully !')
      })

      $('#copyPackageLink').click(function() {
         var text = $('#packageLink').val();
         var inp = document.createElement('input');
         document.body.appendChild(inp)
         inp.value = text;
         inp.select();
         document.execCommand('copy', false);
         inp.remove();

         alert('Link copy successfully !')
      })


      function deleteCourse(id) {
         if (!confirm('Are you sure you want to delete this?')) {
            return false;
         }


         $.ajax({
            url: '{{url("/admin/delete-course")}}',
            type: 'post',
            data: {
               "_token": "{{ csrf_token() }}",
               id,
               id
            },
            success: function(data) {
               window.location.reload();
            }
         });
         return false;


      }

      function getLink() {
         var packageId = $('#packages').val();
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            url: '{{url("/user/generate-link")}}',
            type: 'post',
            data: {
               "_token": "{{ csrf_token() }}",
               'packageId': packageId
            },
            success: function(data) {
               $('#packageLink').val(data);
            }
         });
         return false;
      }


      function startVideo() {

         $.ajax({
            url: '{{url("/user/video-watch")}}',
            type: 'post',
            data: {
               "_token": "{{ csrf_token() }}"
            },
            success: function(data) {
               window.location.reload();
            }
         });
         return false;
      }
   </script>
   <!-- END PAGE LEVEL JS-->
</body>

</html>