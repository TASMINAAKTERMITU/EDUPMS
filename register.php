<?php  
  session_start();
  require_once ('config.php');
  //session_destroy();

  //$_SESSION['patID'] = $patient_id;

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EDUPMS | Registration Page</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>EDU</b>PMS</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="POST">

        <div class="input-group mb-3">
          <input required="required" type="text" class="form-control" placeholder="Full name" name="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

            
            <?php  
                //
                $randomNumber = rand(1,99999);
                $tmp_pid = "user".$randomNumber;
                $generated_p_id = trim($tmp_pid);
                //
                //echo "$generated_p_id";
            ?> 

        <div class="input-group mb-3">
          <label style="padding: 5px 10px 0px 10px; color: #939BA2;" for="pid" >Patient ID</label>
          <input type="text" class="form-control" placeholder="" id="pid" name="patient_id" value="<?php echo "$generated_p_id"; ?>" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        

        <div class="input-group mb-3">
          <input required="required" type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input required="required" type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input required="required" type="text" class="form-control" placeholder="Phone No" name="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <label style="padding: 5px 10px 0px 10px; color: #939BA2;" for="dobid" >Date of Birth</label>
          <input required="required" type="date" class="form-control" id="dobid" placeholder="Date of Birth" name="dob">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input required="required" type="text" class="form-control" placeholder="Age" name="age">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input required="required" type="text" class="form-control" placeholder="Gender" name="gender">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input required="required" type="text" class="form-control" placeholder="Blood Group" name="blood_group">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input required="required" type="text" class="form-control" placeholder="Weight" name="weight">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input required="required" type="text" class="form-control" placeholder="Height" name="height">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>


        <div class="input-group mb-3">
          <input required="required" type="text" class="form-control" placeholder="Profession" name="profession">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>


        <div class="input-group mb-3">
          <input required="required" type="text" class="form-control" placeholder="Address" name="address">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>



        <!-- <div class="input-group mb-3">
          <input required="required" type="date" class="form-control" placeholder="Registration Date" name="reg_date">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> -->

        <div class="input-group mb-3">
          <input required="required" required="required" type="text" class="form-control" placeholder="Role" name="role" value="Patient" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> 


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input required="required" type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms"> I agree to the <a href="#">terms </a>
              
              </label>
            </div>
          </div>

          <!-- /.col -->
          <div class="col-4">
            <!-- <button type="submit" class="btn btn-primary btn-block">Register</button> -->
            <input type="submit" value="Register" name="Submit" class="btn btn-primary btn-block">
          </div>

          <!-- /.col -->

        </div>
      </form>



      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="index.php" class="btn btn-block btn-primary">
          I already have a membership
        </a>
        <a href="forgot-password.php" class="btn btn-block btn-danger">
          Forgot Password?
        </a>
      </div>


    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<?php  

        //
        $name       = htmlentities($_POST['name']);
        $patient_id = htmlentities($_POST['patient_id']);
        $pass       = htmlentities($_POST['pass']);
        $email      = htmlentities($_POST['email']);
        $phone      = htmlentities($_POST['phone']);

        //$dob          = htmlentities($_POST['dob']);
        $dob          = htmlentities($_POST['dob']);
        $age          = htmlentities($_POST['age']);
        $gender       = htmlentities($_POST['gender']);
        $blood_group  = htmlentities($_POST['blood_group']);

        $weight      = htmlentities($_POST['weight']);
        $height      = htmlentities($_POST['height']);
        $profession  = htmlentities($_POST['profession']);
        $address     = htmlentities($_POST['address']);
        //$reg_date    = htmlentities($_POST['reg_date']);
        $reg_date    = date('Y-m-d H:i:s');

        $role = htmlentities($_POST['role']);


        //
        $user_data = array(
          'name'        => $name,
          'patient_id'  => $patient_id,
          'pass'        => $pass,
          'email'       => $email,
          'phone'       => $phone,

          'dob'         => $dob,
          'age'         => $age,
          'gender'      => $gender,
          'blood_group' => $blood_group,

          'weight'       => $weight,
          'height'      => $height,
          'profession'  => $profession,
          'address'     => $address,
          'reg_date'    => $reg_date,

          'role' => $role,
        );


        $parameters = $user_data;

        //var_dump($user_data);
        //var_dump($_POST);
        //var_dump($parameters);

        // get num_rows
        $email_rows_number = check_rows_by_email ( $con, $email );

        //
        //echo "$email_rows";
        //var_dump($email_rows);
        //var_dump($_POST);

        

        if (isset($_POST["Submit"])) {
            //
            if ( $email_rows_number == 0 ) {

              //
              if ( isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['phone']) ) {
                // commit write
                //create_data ($con, $name, $name, $pass, $email, $phone);
                register_user ( $parameters );

              } 

            } else {
                //
                echo("User already exists. Please log in instead.");
                //echo("User already exist. Please login <a href="index.php"> here </a> instead.");
            }
        }

        // session-wide identity array
        //$name;
        //$patient_id;

        // set session var 
        //$_SESSION['active_user_type'] = $usr_type;
        //$_SESSION['active_user_name'] = $name;
        //$_SESSION['active_pID'] = $patient_id;
        //$_SESSION['active_dID'] = $patient_id;
        

        //
        //$sw_identity_array = identity_array_func();


?>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<!--   // php // -->


<!--   // end of php // -->
