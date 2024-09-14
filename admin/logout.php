<?php  
  //
  session_start();
  require_once ('../config.php');
  include('segments-db.php');
  //
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EDUPMS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>EDU</b>PMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <p class="login-box-msg">

      <?php 
          //
          //session_destroy();

          // session clean-up
          unset($_SESSION['user_login']);
          unset($_SESSION['push_case_doct_image_name']);
          unset($_SESSION['push_case_doct_id']);
          unset($_SESSION['elected_doctor']);
          unset($_SESSION['to_prescribe_patient']);
          unset($_SESSION['active_user_DID']);

          // new set (single doct adjustment)
          unset($_SESSION['active_user_PID']);
          unset($_SESSION['global_left_pane_user_img_path_pat']);
          unset($_SESSION['active_user_name_pat']);

          // clear doct vars
          unset($_SESSION['global_left_pane_user_img_path_doct']);

          

          
          $_SESSION['user_logout'] = 1;

          

          if ($_SESSION['user_logout'] == 1) {

            //
            // echo "<pre>";
            // var_dump($_SESSION);
            // echo "<pre>";

            //session_destroy();

            //
            echo "You have been logged out. See you soon!";

            echo "<br>";
            echo '<p class="mt-3 mb-1"> <a href="../index.php">Login</a> </p>';
            exit;

          } 

       ?>

       </p>

    </div>
  </div>
</div>

</body>

</html>
