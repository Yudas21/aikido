<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perguruan Aikido SAF Dojo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta id="token" name="token" value="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('bri.png') }}">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('admin/plugins/font-awesome/css/font-awesome.css') }}">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> 
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.css') }}">
  
  <!-- Theme style -->
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/ballon.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/froala_editor.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/froala_style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/code_view.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/draggable.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/colors.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/emoticons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/image_manager.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/image.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/line_breaker.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/table.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/char_counter.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/video.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/fullscreen.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/file.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/quick_insert.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/help.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/third_party/spell_checker.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/froala_editor/css/plugins/special_characters.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('admin.header')
    @include('admin.sidebar')
        @yield('content')
    @include('admin.footer')
    <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/plugins/fastclick/fastclick.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('js/vendor/typeahead.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
@yield('myjsfile')
</body>
</html>