<?php  
  //session_start();
  require_once ('config.php');
  //session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> EDUPMS | Forgot Password </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.html"><b>EDU</b>PMS</a>
  </div>

  <!-- /.login-logo -->

  <div class="card">

    <div class="card-body login-card-body">
      <p class="login-box-msg">Forgot your password? Here you can easily retrieve a new password.</p>


      <form action="recover-password.php" method="post">
      <p>Patients only*</p>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <?php  


        // check and send
        if (isset($_POST["Submit"])) {

          //
          //
        $email  = htmlentities($_POST['email']);

        // hash
        //$pass_recovery_link = "http://localhost/".md5(date('Y-m-d'));
        //$rand = ;
        $pass_recovery_link = "http://localhost/?key=";
        //"http://localhost/".md5(date('Y-m-d'));


        // attribs
        $to      = $email;
        $subject = "Reset Password";
        $message = "Follow the link to reset password. $pass_recovery_link";
        $headers = "From: no-reply@company.com";

        // dump
        //echo "$pass_recover_link";

        //
        mail($to, $subject, $message, $headers);
        }

      ?>




      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>

    <!-- /.login-card-body -->

  </div>

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
