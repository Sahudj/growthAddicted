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
   <link rel="stylesheet" href="{{url('public/frontend/home/')}}/assets/css/aos.css">
   <!-- BEGIN: VENDOR CSS-->
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/vendors.min.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/animate-css/animate.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist.min.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/chartist-js/chartist-plugin-tooltip.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
   <!-- <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/themes/vertical-modern-menu-template/materialize.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/themes/vertical-modern-menu-template/style.css"> -->
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/pages/dashboard-modern.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/pages/intro.css">
   <!-- END: Page Level CSS-->
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/pages/page-users.css">
   <!-- BEGIN: Custom CSS-->
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/custom/custom.css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/ourcustom/ourcustom.css?<?php echo time(); ?>">

   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/vendors/flag-icon/css/flag-icon.min.css">

   <link rel="stylesheet" href="{{url('public/admin/')}}/app-assets/vendors/select2/select2.min.css" type="text/css">
   <link rel="stylesheet" href="{{url('public/admin/')}}/app-assets/vendors/select2/select2-materialize.css" type="text/css">
   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/css/pages/form-select2.css">

   <link rel="stylesheet" type="text/css" href="{{url('public/admin/')}}/app-assets/fonts/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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

<body oncontextmenu="return false;">


   <div class="growth-dash">
      <div class="growth-dash-wrapper">
         <div class="growth-side-bar" id="grwth-sidebar">
            @auth()
            @if(Auth()->user()->role == 1)
            @include('sidebar.super-admin')
            @elseif(Auth()->user()->role == 2)
            @include('sidebar.user')
            @endif
            @endauth
         </div>
         <div class="growth-right-cont">
            <!-- header section start -->
            <div class="growth-header-navbar">
               <div class="header-wrap">
                  <div class="header-left">
                     <ul class="web-nav-menu">
                        <li><a href="#"><span class="material-symbols-outlined">home</span>Home</a></li>
                        <li><a href="#"><span class="material-symbols-outlined">auto_stories</span> My Courses</a></li>
                        <li><a href="#"><span class="material-symbols-outlined">linked_services</span> Become Affiliate</a></li>
                     </ul>
                     <ul class="mob-nav-menu">
                        <li><a href="#"><img width="100" src="{{url('public/admin/')}}/app-assets/images/logo/Logo2.png" alt="logo"></a></li>
                     </ul>
                  </div>
                  <div class="header-right">
                     <ul class="web-right-menu">
                        <li><a href="#" class="growth-plus-btn">Growth Plus +</a></li>
                        <li><a href="#"><span class="material-symbols-outlined">notifications</span></a></li>
                        <li><a href="#"><span class="material-symbols-outlined">screen_record</span></a></li>
                        @if(auth()->user()->profile_pic)
                        <li class="lnk-with-drop">
                           <a href="#" class="online-badge">
                              <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="avatar">
                           </a>
                           <div class="navdroplinks">
                              <a class="grey-text text-darken-1" href="{{url('/')}}"><span class="material-symbols-outlined">home</span> Home</a>
                              @if(auth()->user()->order_status == 1)
                              <a href="{{url('/user/profile')}}" class="{{(url()->current() == url('/user/profile')) ? 'active' : '' }}"><span class="material-symbols-outlined">manage_accounts</span>Profile</a>
                              @endif
                              <?php $permission = DB::table('permission')->where('user_id', auth()->user()->id)->first(); ?>
                              @if(isset($permission) && ($permission->is_profile == 1))
                              <a class="grey-text text-darken-1" href="{{url('/admin/profile')}}"><span class="material-symbols-outlined">manage_accounts</span>Profile</a>
                              @endif

                              <a class="grey-text text-darken-1" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <span class="material-symbols-outlined">logout</span> {{ __('Logout') }}</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </div>
                        </li>
                        @else
                        <li class="lnk-with-drop">
                           <a href="#" class="online-badge"><img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="avatar"></a>
                           <div class="navdroplinks">
                              <a class="grey-text text-darken-1" href="{{url('/')}}"><span class="material-symbols-outlined">home</span> Home</a>
                              @if(auth()->user()->order_status == 1)
                              <a href="{{url('/user/profile')}}" class="{{(url()->current() == url('/user/profile')) ? 'active' : '' }}"><span class="material-symbols-outlined">manage_accounts</span>Profile</a>
                              @endif
                              <?php $permission = DB::table('permission')->where('user_id', auth()->user()->id)->first(); ?>
                              @if(isset($permission) && ($permission->is_profile == 1))
                              <a class="grey-text text-darken-1" href="{{url('/admin/profile')}}"><span class="material-symbols-outlined">manage_accounts</span>Profile</a>
                              @endif

                              <a class="grey-text text-darken-1" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <span class="material-symbols-outlined">logout</span> {{ __('Logout') }}</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </div>
                        </li>
                        @endif
                        <li class="lnk-with-drop">
                           <a href="#"><span class="material-symbols-outlined">more_vert</span></a>
                           <div class="navdroplinks">
                              <a class="grey-text text-darken-1" href="{{url('/')}}"><span class="material-symbols-outlined">settings</span> Settings</a>
                           </div>
                        </li>
                     </ul>
                     <ul class="mob-right-menu">
                        @if(auth()->user()->profile_pic)
                        <li class="lnk-with-drop">
                           <a href="#" class="online-badge"><img src="{{url('public/profile_pic/'.auth()->user()->profile_pic)}}" alt="avatar"></a>
                           <div class="navdroplinks">
                              <a class="grey-text text-darken-1" href="{{url('/')}}"><span class="material-symbols-outlined">home</span> Home</a>
                              <a href="#"><span class="material-symbols-outlined">auto_stories</span> My Courses</a>
                              <a href="#"><span class="material-symbols-outlined">linked_services</span> Become Affiliate</a>
                              @if(auth()->user()->order_status == 1)
                              <a href="{{url('/user/profile')}}" class="{{(url()->current() == url('/user/profile')) ? 'active' : '' }}"><span class="material-symbols-outlined">manage_accounts</span>Profile</a>
                              @endif
                              <?php $permission = DB::table('permission')->where('user_id', auth()->user()->id)->first(); ?>
                              @if(isset($permission) && ($permission->is_profile == 1))
                              <a class="grey-text text-darken-1" href="{{url('/admin/profile')}}"><span class="material-symbols-outlined">manage_accounts</span>Profile</a>
                              @endif

                              <a class="grey-text text-darken-1" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <span class="material-symbols-outlined">logout</span> {{ __('Logout') }}</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </div>
                        </li>
                        <!-- <li><a href="#"><img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="avatar"></a></li> -->
                        @else
                        <li class="lnk-with-drop">
                           <a href="#"><img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" alt="avatar"></a>
                           <div class="navdroplinks">
                              <a class="grey-text text-darken-1" href="{{url('/')}}"><span class="material-symbols-outlined">home</span> Home</a>
                              <a href="#"><span class="material-symbols-outlined">auto_stories</span> My Courses</a>
                              <a href="#"><span class="material-symbols-outlined">linked_services</span> Become Affiliate</a>
                              @if(auth()->user()->order_status == 1)
                              <a href="{{url('/user/profile')}}" class="{{(url()->current() == url('/user/profile')) ? 'active' : '' }}"><span class="material-symbols-outlined">manage_accounts</span>Profile</a>
                              @endif
                              <?php $permission = DB::table('permission')->where('user_id', auth()->user()->id)->first(); ?>
                              @if(isset($permission) && ($permission->is_profile == 1))
                              <a class="grey-text text-darken-1" href="{{url('/admin/profile')}}"><span class="material-symbols-outlined">manage_accounts</span>Profile</a>
                              @endif

                              <a class="grey-text text-darken-1" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <span class="material-symbols-outlined">logout</span> {{ __('Logout') }}</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </div>
                        </li>
                        @endif
                        <li class="lnk-with-drop">
                           <a href="#"><span class="material-symbols-outlined">more_vert</span></a>
                           <div class="navdroplinks">
                              <a href="#" style="background: var(--ter-clr);color:white;border-radius:3px;"> <span class="material-symbols-outlined">package_2</span>Growth Plus +</a>
                              <a class="grey-text text-darken-1" href="{{url('/')}}"><span class="material-symbols-outlined">settings</span> Settings</a>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- header section end -->

            <!-- dynamic pages start -->
            <div class="growth-dynamic-pages">
               <div class="dynamic-page-wrapper">
                  @yield('content')
               </div>
            </div>
            <!-- dynamic pages end -->
         </div>


      </div>
   </div>




   <!-- END: Footer-->
   <!-- BEGIN VENDOR JS-->
   <script src="{{url('public/frontend/home/')}}/assets/js/jquery.min.js"></script>
   <!-- <script src="{{url('public/admin/')}}/app-assets/js/vendors.min.js"></script> -->


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
   <script src="{{url('public/frontend/home/')}}/assets/js/aos.js"></script>



   <script>
      // document.addEventListener('DOMContentLoaded', function() {
      //    var modal = document.getElementById('custom-modal');
      //    var closeModalBtn = document.getElementById('close-modal-btn');
      //    console.log(modal,closeModalBtn);



      //    closeModalBtn.addEventListener('click',()=>{
      //       console.log("i am working");
      //       modal.style.display = 'none';

      //    }) 

      //    window.onclick = function(event) {
      //       if (event.target === modal) {
      //          modal.style.display = 'none';
      //       }
      //    };
      // });

      document.addEventListener('DOMContentLoaded', function() {
         var modal = document.getElementById('custom-modal');
         var openModalBtn = document.getElementById('open-modal-btn');
         var closeButtons = document.querySelectorAll('.close-ourmodal-btn');


         // Function to add event listeners to multiple close buttons
         function addCloseEventListeners(buttons) {
            buttons.forEach(function(button) {
               button.addEventListener('click', function() {
                  modal.style.display = 'none';
               });
            });
         }

         addCloseEventListeners(closeButtons);

         window.onclick = function(event) {
            if (event.target === modal) {
               modal.style.display = 'none';
            }
         };
      });

      function formatNumber(number) {
         if (number >= 10000000) {
            return (number / 10000000).toFixed(2) + ' Cr';
         } else if (number >= 100000) {
            return (number / 100000).toFixed(2) + ' Lakh';
         } else if (number >= 1000) {
            return (number / 1000).toFixed(2) + ' K';
         }
         return number.toString();
      }

      function formatNumbersInElements(selector) {
         const elements = document.querySelectorAll(selector);
         elements.forEach(element => {
            const number = parseFloat(element.innerHTML);
            if (!isNaN(number)) {
               element.innerHTML = formatNumber(number);
            }
         });
      }

      document.addEventListener('DOMContentLoaded', function() {
         formatNumbersInElements('.formatted-number');
      });
   </script>

   <script>
      AOS.init();
      $(document).ready(function() {

         $('.drop-dwn-link').on('click', function() {
            if ($(this).hasClass('dropped')) {
               $(this).removeClass('dropped');
            } else {
               // Otherwise, remove the 'dropped' class from all elements
               $('.drop-dwn-link').removeClass('dropped');
               // Add the 'dropped' class to the clicked element
               $(this).addClass('dropped');
            }
         });
         $('#bottmbar-draw-btn').on('click', function() {
            if ($('#our-custom-bottombar').hasClass('toggle')) {
               console.log("aaya idhar");
               $('#our-custom-bottombar').removeClass('toggle');
            } else {
               $('#our-custom-bottombar').addClass('toggle');
            }
         });


         $('#cllps-side-btn').on('click', () => {
            $('#grwth-sidebar').addClass('collapsed');
            $('#or-sd-menu').hide();
            $('#or-sd-cl-menu').css({
               display: "flex"
            });
         })
         $('#opn-side-btn').on('click', () => {
            $('#grwth-sidebar').removeClass('collapsed');
            $('#or-sd-menu').css({
               display: "flex"
            });
            $('#or-sd-cl-menu').hide();
         })


      })
   </script>

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