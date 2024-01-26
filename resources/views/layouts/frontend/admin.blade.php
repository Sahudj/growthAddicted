
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Growth Addicted</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('backend')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('backend')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/dist/css/custom.css">
  <link rel="stylesheet" href="{{url('backend')}}/dist/css/datepicker.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/ekko-lightbox/ekko-lightbox.css">
  <link rel="stylesheet" href="{{url('backend')}}/dist/css/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/fullcalendar/main.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="{{url('backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <script src="{{url('backend')}}/plugins/jquery/jquery.min.js"></script>
  <!-- <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvGtx-OK6fIz6-eVSmXvJjanVLk6BmhPU&libraries=places"></script> -->
  <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSal-T1hfCkiyAz2gnTJHjSKH0Y8xJApE&libraries=places"></script>
  <style type="text/css">
  .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice{
  color : #fff !important;
}
</style>

  <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
         <a class=" btn-sm btn customBtn" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @auth()
    @if(Auth()->user()->role == 1)
      @include('sidebar.super-admin')
    @elseif(Auth()->user()->role == 2)
      @include('sidebar.user')
    @endif
  @endauth  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} <a href="https://adminlte.io">Growth Addicted</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<!-- Bootstrap 4 -->
<script src="{{url('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('backend')}}/dist/js/adminlte.min.js"></script>
<script src="{{url('backend')}}/dist/js/datepicker.js"></script>
<script src="{{url('backend')}}/dist/js/bootstrap-tagsinput.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="{{url('backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{url('backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{url('backend')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('backend')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{url('backend')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{url('backend')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{url('backend')}}/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="{{url('backend')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{url('backend')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('backend')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{url('backend')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{url('backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{url('backend')}}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{url('backend')}}/plugins/toastr/toastr.min.js"></script>
<script src="{{url('backend')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{url('backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
<script src="{{url('backend')}}/plugins/chart.js/Chart.min.js"></script>
<script src="{{url('backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="{{url('backend')}}/plugins/fullcalendar/main.js"></script>

<script type="text/javascript">
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
    
  $(".table").DataTable({
      "responsive": true,
      "ordering": true,
  })

  $("#table").DataTable({
    "paging": false,
    "ordering": false,
    "searching": false
  })

  $('.select2').select2({
    theme: 'bootstrap4'
  });


  $(function () {
    $('#summernote').summernote({
       placeholder: 'Product Description',
        tabsize: 2,
        height: 200
    })

    $('.summernote').summernote({
       placeholder: 'Description',
        tabsize: 2,
        height: 200
    })
  })

$('.tags').tagsinput();
var nowDate = new Date();
var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

$('.offerDate').daterangepicker({
  "singleDatePicker": true,
  "drops": 'up',
  timePicker: true,
  minDate : today,
  locale: {
    format: 'DD-MM-YYYY h:mm'
  }
})

$(".offerDate2"). datepicker({ 
  "format": "yyyy", 
  "viewMode": "years", 
  "minViewMode": "years", 
  "autoclose" : true 
})


$('.timeSchedule').daterangepicker({
    "singleDatePicker": true,
      timePicker: true,
      timePicker24Hour: false,
      timePickerIncrement: 1,
      locale: {
          format: 'HH:mm'
      }
  }).on('show.daterangepicker', function (ev, picker) {
      picker.container.find(".calendar-table").hide();
  });

$('.bannerDate').daterangepicker({
  "singleDatePicker": true,
  "drops": 'up',

  minDate : today,
  locale: {
    "format": 'DD-MM-YYYY'
  }
})

$('.scheduleDate').daterangepicker({
  "singleDatePicker": true,
  "drops": 'up',
   timePicker: false,
   minDate : today,
  locale: {
    format: 'YYYY-MM-DD'
  }
})


$('.scheduleDateTime').daterangepicker({
    "singleDatePicker": true,
      timePicker: true,
      timePicker24Hour: false,
      timePickerIncrement: 1,
      locale: {
          format: 'HH:mm A'
      }
  }).on('show.daterangepicker', function (ev, picker) {
      picker.container.find(".calendar-table").hide();
  });


</script>


<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
          var place = autocomplete.getPlace();
          document.getElementById('lat').value = place.geometry.location.lat();
          document.getElementById('lang').value = place.geometry.location.lng();
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize); 
</script>



    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</body>
</html>
