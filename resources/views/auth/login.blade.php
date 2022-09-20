<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Login</title>

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
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assetslte/plugins/iCheck/square/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-color: #45bf57">
<div class="login-box">
  <div class="login-logo" style="color: white;">
    <!-- <img src="{{ asset('assetslte/images/muijatim-logo.png') }}"> -->
    <h2>Selamat Datang</h2>
    <!-- <h4></h4> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk mengelola aplikasi</p>

    <!-- alert disini -->
    @if(!empty(session('status')))
    <div class="alert alert-warning">
      {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('/login') }}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="center">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
          </div>
        </div>
      </div>
    </form>

    <br>
    <a href="#">Lupa Kata Sandi ?</a>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- modal lupa kata sandi -->
<div class="modal fade" id="lupasandi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Lupa Kata Sandi ?</h4>
      </div>
      <div class="modal-body">
        <p>Jika anda mengalami kendala Login ke, silahkan menghubungi :</p>
        <br><br>
        <table class="table" style="width: 50%">
          <tr>
            <td>Hubungi</td>
            <td> : </td>
            <td>Muhlisin Staff MUI Jatim</td>
          </tr>
          <tr>
            <td>Telp/Whatsapp</td>
            <td> : </td>
            <td><a href="https://api.whatsapp.com/send?&phone=6281556726282" target="_blank">+62 815-5672-6282</a></td>
          </tr>
          <tr>
            <td>Email</td>
            <td> : </td>
            <td><a href="mailto:info@muijatim.or.id">info@muijatim.or.id</a></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="{{ asset('assetslte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assetslte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('assetslte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
