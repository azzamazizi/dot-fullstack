<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DOT Indonesia - Fullstack Developer | {{ $title_atas }}</title>
  <link rel="icon" href="{{ asset('assetslte/images/favicon.png') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assetslte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assetslte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assetslte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assetslte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assetslte/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assetslte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assetslte/bower_components/select2/dist/css/select2.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assetslte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <style type="text/css">
    .treeview-menu {
      white-space: normal;
    }

    .treeview-menu span {
      display: inline-flex;
      word-break: break-word;
      width: 80%;
    }
  </style>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-green fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('includes.topbar')

  @include('includes.sidemenu')

  @yield('content')

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Laravel</b> 8.0
    </div>
    <strong>Copyright &copy; 2022</strong> | By M. Azzam Azizi - DOT Fullstack Developer
  </footer>

</div>
<!-- ./wrapper -->

<!-- modal edit profile -->
<div class="modal fade" id="modaluser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pengguna</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="{{ url('/user/updateuser/') }}">
          @csrf

          <input type="hidden" id="idusermod" name="idusermod" value="{{ Auth::user()->id }}">
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Pengguna</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" id="namemod" name="namemod" value="{{ Auth::user()->name }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email<br><small>untuk Login Pengguna</small></label>
            <div class="col-sm-10">
              <input class="form-control" type="email" id="emailmod" name="emailmod" value="{{ Auth::user()->email }}" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Kata Sandi</label>
            <div class="col-sm-10">
              <input class="form-control" type="password" id="passwordmod_new" name="passwordmod_new">
              <input class="form-control" type="hidden" id="passwordmod_old" name="passwordmod_old" value="{{ Auth::user()->password }}">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-primary btn-sm pull-left"><i class="fa fa-save"></i> Simpan</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>


<!-- jQuery 3 -->
<script src="{{ asset('assetslte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assetslte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assetslte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assetslte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assetslte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assetslte/dist/js/demo.js') }}"></script>

<!-- datatables -->
<script src="{{ asset('assetslte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assetslte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assetslte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<!-- CK Editor -->
<script src="{{ asset('assetslte/bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assetslte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<!-- load datatables -->
<script type="text/javascript">
  $(document).ready(function () {
      $('#dataTable').DataTable();

      $('.select2').select2()
  });
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
  /** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.sidebar-menu a').filter(function() {
   return this.href == url;
}).parent().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
   return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>

</body>
</html>
