<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin control {{ getSetting() }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('src/backend/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  {!! Html::style('src/frontend/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('src/backend/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('src/backend/dist/css/skins/_all-skins.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('src/backend/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('src/backend/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('src/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('src/backend/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('src/backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('src/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  {{-- custome folder {global directory} --}}
  <link rel="stylesheet" href="{{asset('src/global/sweetalert.css')}}">
  {!! Html::style('src/global/select2.min.css') !!}

  @yield('styles')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    	<!-- Logo -->
    	<a href="{{ route('dashboard') }}" class="logo">
      	<!-- mini logo for sidebar mini 50x50 pixels -->
      	<span class="logo-mini"><b>A</b>DB</span>
      	<!-- logo for regular state and mobile devices -->
      	<span class="logo-lg"><b>Admin</b> DashBoard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      	<!-- Sidebar toggle button-->
      	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        		<span class="sr-only">Toggle navigation</span>
      	</a>
          {{-- navbar --}}
      	@include('admin.includes.navbar')
     </nav>
     </header>
          {{-- sidebar --}}
      	@include('admin.includes.sideBar')

	<div class="content-wrapper" style="min-height: 916px;">
		@yield('content')
	</div>

	<footer class="main-footer">
    		<div class="pull-right hidden-xs">
      		<b>Version</b> 2.3.6
    		</div>
    		<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    		reserved.
  	</footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 2.2.3 -->
<script src="{{asset('src/backend/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('src/backend/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('src/backend/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('src/backend/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('src/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('src/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('src/backend/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('src/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('src/backend/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('src/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('src/backend/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('src/backend/plugins/chartjs/Chart.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('src/backend/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('src/backend/dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('src/backend/dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('src/backend/dist/js/demo.js')}}"></script>
<!-- Custum folder -->
<script src="{{asset('src/global/sweetalert.min.js')}}"></script>
{!! Html::script('src/global/select2.min.js') !!}
<script type="text/javascript">
     $('select[name=place]').select2();
</script>
@include('includes.infoBox')
@yield('scripts')
</body>
</html>
