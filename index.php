<?php  
  session_start();
  require_once ('config.php');
  //session_destroy();

  
  // echo "<pre>";
  // var_dump($_SESSION);
  // echo "<pre>";

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
    <a href="index.php"><b>EDU</b>PMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <p class="login-box-msg">

      <?php 
          //
          if (isset($_SESSION['user_login'])) {
            //
            echo "You are already logged in.";
            exit;
          }

       ?>

       </p>


      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">

            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>

            <!-- /.col -->
            <div class="col-4">
              <input type="submit" value="Log in" name="Submit" class="btn btn-primary btn-block">
            </div>
            <!-- /.col -->

        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="register.php" class="btn btn-block btn-primary">
          <i>Register</i> 
        </a>
        <a href="forgot-password.php" class="btn btn-block btn-danger">
          <i></i> Forgot my password
        </a>
      </div>
      <!-- /.social-auth-links -->



      <!-- notice -->


      <div class="social-auth-links text-center mb-3">
        <p> ___ </p>

        <p> Notice </p>

        <div class="float-left">
          <strong> Doctor login : </strong>
        </div>
        <br>

        <div class="float-left">
          Doctor email : doctor@gmail.com 
        </div>
        <br>

        <div class="float-left">
           Doctor pw : betadoct
        </div>
        <br>

        <div class="float-left">
          <strong> Patient login : </strong>
        </div>
        <br>

        <div class="float-left">
          Register first, then log in
        </div>
        <br>

<!--         <div class="float-left">
          (Or try default patient account email : patient-ahad@gmail.com, pw : 123abc)
        </div>
        <br> -->

      </div>




      <!-- /.end of notice -->


      <!-- login script -->
      <?php  

        // collect vars
        $email = htmlentities($_POST['email']);
        $pass  = htmlentities($_POST['pass']);

        $user_data = array(
          'pass'  => $pass,
          'email' => $email,
        );

        // login_user ($user_data); // shows incorrect username/pass before submitting info 

          //var_dump($_POST);




          // ____ ____
          //
          // highly beta specific section
          //
          //  ____ ____


          // It's beta, right? Let's try some year-work
          // Let's like the year 2021 so much, also
          $year_that_we_like_so_much = 2024;
          $liked_year = $year_that_we_like_so_much;

          $current_year = date('Y');

          // var_dump($current_year);
          // exit;




            if ($current_year == $liked_year) {
              // 2020 case

              // continue as usual
                  // doctor login

                  //
                  if (isset($_POST['pass']) && isset($_POST['email'])) {


                      // fixed doctor login stuff
                      // 
                      if ($email === "doctor@gmail.com" && $pass === "betadoct") {

                      // demo mode for doctor

                      // session maintenance
                      if (isset($_SESSION['user_logout'])) {
                        //
                        unset($_SESSION['user_logout']);
                      }

                      $_SESSION['user_login'] = 1;


                        // set some environment vars as "passport vars"
                        $name          = "Dr. Ahmed";
                        $doctor_id     = "doct01";
                        $role          = "Doctor";
                        $prof_img_name = 'doct01'.'.jpg';

                        $passport = array(
                          'name'          => $name,
                          'doctor_id'     => $doctor_id,
                          'prof_img_name' => $prof_img_name,
                          'role'          => $role,
                        );

                        // //
                        // echo "<pre>";
                        // print_r($passport);
                        // echo "<pre>";
                        // exit;

                        // feed passport to session
                        $_SESSION['active_user_name']            = $passport['name'];
                        // more specific to doctor                
                        $_SESSION['active_user_name_doct']       = $passport['name'];

                        $_SESSION['active_user_ID']              = $passport['doctor_id'];
                        // more specific to doctor
                        $_SESSION['active_user_DID']             = $passport['doctor_id'];

                        $_SESSION['active_user_prof_img_name']   = $passport['prof_img_name'];
                        $_SESSION['active_user_role']            = $passport['role'];

                        //
                        // echo "<pre>";
                        // print_r($_SESSION);
                        // echo "<pre>";
                        // exit;

                        // send to doctor dashboard
                        header("Location: admin/dashboard-d.php");

                      }



                      // patient login phase


                      // patient login stuff
                      // get num_rows
                      $email_pass_row_result = check_rows_by_email_pass ( $con, $user_data['email'], $user_data['pass'] );

                      //
                      if ($email_pass_row_result == 1) {


                      // session maintenance
                      if (isset($_SESSION['user_logout'])) {
                        //
                        unset($_SESSION['user_logout']);
                      }

                      $_SESSION['user_login'] = 1;
                      
                      //$_SESSION['active_user'] = "Ahmed"; // get from db
                      //$_SESSION['active_user_email'] = $email;
                      //$_SESSION['active_user_id'] = "user1";



                      //
                      // generate user-passport
                      $passport = retrieve_user_passport_data ($user_data['email']);
                      $prof_img_name = $passport['patient_id'] . '.jpg';


                      // if user image is not set, set a default one here
                      $tmp_path = 'dist/img/' . $prof_img_name;

                      if ( file_exists($tmp_path) ) {
                        //
                        $image_not_found_flag = 0;
                      } else {
                        $image_not_found_flag = 1;
                      }
                      
                      // if doctor is only one, push their profile attribute
                      $push_case_doct_id = "doct01";
                      $push_case_doct_name = "Dr. Ahmed";
                      $push_case_doct_image_name = "doct01.jpg";

                      // //
                      // echo "<pre>";
                      // print_r($image_not_found_flag);
                      // echo "<pre>";
                      // exit;

                      // feed passport to session
                      $_SESSION['active_user_name']                     = $passport['name'];
                      // more specific to patient
                      $_SESSION['active_user_name_pat']                 = $passport['name'];

                      $_SESSION['active_user_ID']                       = $passport['patient_id'];
                      // more specific to patient
                      $_SESSION['active_user_PID']                      = $passport['patient_id'];

                      $_SESSION['active_user_prof_img_name']            = $prof_img_name;
                      $_SESSION['active_user_image_not_found_flag']     = $image_not_found_flag;
                      $_SESSION['push_case_doct_id']                    = $push_case_doct_id;
                      $_SESSION['push_case_doct_name']                  = $push_case_doct_name;
                      $_SESSION['push_case_doct_image_name']            = $push_case_doct_image_name;
                      $_SESSION['push_case_one_time_appointment_done']  = 0;


                      $_SESSION['active_user_role']                     = $passport['role'];
                      //$_SESSION['active_user_role'] = $passport['role'];




                      //
                      // echo "<pre>";
                      // print_r($_SESSION);
                      // echo "<pre>";
                      // //exit;


                      // set session var 
                      //$_SESSION['active_user_type'] = $usr_type;
                      //$_SESSION['active_user_name'] = $name;
                      //$_SESSION['active_user_PID'] = $patient_id;
                      //$_SESSION['active_dID'] = $patient_id;


                      //echo "Log in successful.";
                      header("Location: admin/dashboard-p.php");

                      //return true;
                      } 

                      else 
                      {
                        echo "Incorrect username / password. Try again.";

                      }

                  }

            } elseif ($current_year > $liked_year) {
              // else case
              echo "Sorry, the site can not continue. Error code : 0xC_st_BV";
              // married with yr 2020! :) .
              exit;
            }

          // ____ ____
          //
          // /. end of highly beta specific section
          //
          //  ____ ____


      ?>
      <!-- /. end of login script -->




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
