<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trắc nghiệm</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/css/jquery.countdown.css" />
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
      -->
      <link rel="stylesheet" href="/assets/dist/css/skins/skin-blue.min.css">

      <!-- jQuery 2.2.3 -->
      <script src="/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
      <!-- Bootstrap 3.3.6 -->
      <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
      <!-- AdminLTE App -->
      <script src="/assets/dist/js/app.min.js"></script>
      <script src="/assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
      <script src="/assets/plugins/input-mask/jquery.inputmask.js"></script>
      <script src="/assets/plugins/input-mask/jquery.inputmask.phone.extensions.js"></script>

    <script src="/assets/js/jquery.countdown.js"></script>
    <script src="/assets/js/script_countdown.js"></script>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  
    <?= $this->partial('header') ?>

    <?= $this->partial('slidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?= $this->getContent() ?>
    </div><!-- /.content-wrapper -->

    <?= $this->partial('footer') ?>

    <?= $this->partial('sb') ?>

    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg">
    
  </div>
</div>
<!-- ./wrapper -->





<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
