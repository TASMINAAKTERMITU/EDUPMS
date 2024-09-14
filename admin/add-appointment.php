<?php  
  //
  session_start();
  require_once ('../config.php');
  include('segments-db.php');
  //
?>

<?php  
  //
  //$patient_id = $_SESSION['patient_id'];
  //$patient_id = "user3168";


      // get unique identifier from session_var
      $patient_id = $_SESSION['active_user_ID'];

      // get doct ID from session - last visited
      if (isset($_SESSION['elected_doctor'])) {
        //
        $doctor_id = $_SESSION['elected_doctor'];
      } else {
        $doctor_id = $_SESSION['push_case_doct_id'];
      }

      //
      //$data = retrieve_patient_profile_data ( $patient_id );
      //$data = retrieve_patient_profile_data ($patient_id);

      // var_dump($data);
      // exit;


  //echo "$patient_id";
  //var_dump($patient_id);




      //print_r($lock_result['new_appointment_lock']);


?>




<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EDUPMS | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">



<?php 
          

          // will set the page in disabled mode if there is no active user (logged in), can be skipped if you are debugging
          if (isset($_SESSION['user_logout'])) {
            //
            echo "You are already logged out.";
            exit;
          }



 
          // 


          // doct/pat card __


          // get user role
          if ($_SESSION['active_user_role'] == "Doctor") {
            //

            // setting user image-name card on left pane top (below brand logo, name) ____


            // image file name adjustment - single doctor case
            $img_path_single_doct = '../dist/img/'. $_SESSION['active_user_prof_img_name'];
            $_SESSION['global_left_pane_user_img_path_doct'] = $img_path_single_doct;

            // //
            // var_dump($img_path);
            // exit;


            // left pane vars, in a compact way, for doct
            $active_user_image_path_doct = $_SESSION['global_left_pane_user_img_path_doct'];
            $active_user_name_doct       = $_SESSION['active_user_name_doct'];

            // /. end of setting user image-name card on left pane top (below brand logo, name) ____


          } elseif ($_SESSION['active_user_role'] == "Patient") {
            //

            // setting user image-name card on left pane top (below brand logo, name) ____


            // get flag if pat user is in default list
            $image_not_found = $_SESSION['active_user_image_not_found_flag'];

            // determining prof image path
            if ($image_not_found === 1) {
              // set globally usable pat image path
              $global_left_pane_user_img_path_pat = '../dist/img/'. 'default-pat.jpg' ;
              $_SESSION['global_left_pane_user_img_path_pat'] = $global_left_pane_user_img_path_pat;

            } else {
              // set globally usable pat image path
              $global_left_pane_user_img_path_pat = '../dist/img/'. $_SESSION['active_user_prof_img_name'] ;
              $_SESSION['global_left_pane_user_img_path_pat'] = $global_left_pane_user_img_path_pat;

            }
            
            // left pane vars, in a compact way, for pat
            $active_user_image_path_pat = $_SESSION['global_left_pane_user_img_path_pat'];
            $active_user_name_pat       = $_SESSION['active_user_name_pat'];

            // /. end of setting user image-name card on left pane top (below brand logo, name) ____


          }


          // doct/pat card __


          // 


              // echo "<pre>";
              // print_r();
              // echo "<pre>";
              // exit;
          //


?>



<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

            <?php  
              //
              echo $navbar_top_mid_left_links_doct_pat_minimal;
            ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      
            <?php  
              //
              echo "$top_right_menu_button";
            ?>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="d-admin.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">EDUPMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


         <!-- user image-name set for doctor/pat card -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="
                    <?php if ($page_menu_mode == "D") {
                      echo $active_user_image_path_doct;
                    } elseif ($page_menu_mode == "P") {
                      echo $active_user_image_path_pat;
                    }
                    ?>
          " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile-patient.php" class="d-block"> 
                    <?php if ($page_menu_mode == "D") {
                      echo $active_user_name_doct;
                    } elseif ($page_menu_mode == "P") {
                      echo $active_user_name_pat;
                    }
                    ?>
           </a>
        </div>
      </div>
      <!-- /.user image-name set for doctor/pat card -->   


      <!-- Menu set for doctor/pat -->
        <?php  
          // left navigation menu
          if ($page_menu_mode == "D") {
            //
            echo($left_pane_menu_doct);
          } elseif ($page_menu_mode == "P") {
            //
            echo $left_pane_menu_pat;
          }
        ?>
      <!-- /.Menu set for doctor/pat -->



    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Appointment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="
                    <?php if ($page_menu_mode == "D") {
                      echo $home_page_doct;
                    } elseif ($page_menu_mode == "P") {
                      echo $home_page_pat;
                    }
                    ?>
              ">Home</a></li>
              <li class="breadcrumb-item active">Appointment</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">



<!-- submitted data checker (will work after successful appointment write operation to db) -->
<?php
      // check if user is locked
      $lock_result = single_doct_appointment_count ($patient_id);

      //
      // print_r($lock_result['new_appointment_lock']);
      // exit;


      if ($lock_result['new_appointment_lock'] == 1) {
        echo '
              <div class="col-md-12">
                          
                <div class="alert alert-warning">
                  <i class="fa fa-check"></i>
                    Appointment limit reached.
                </div>

                <div class="card-footer">
                  <a class="btn btn-primary float-left" href="dashboard-p.php">Go to Dashboard</a>
                </div>
                                  
              </div> ';

        // stop page execution
        exit;

      }
?>
<!-- /. End of submitted data checker -->


<!-- script to read post vars (appointment) and write to db -->
<?php  
                // after $_POST gets some value (through form submission), get them and write them to db (with other vars) 

                //
                if (isset($_POST["symptom"]) && isset($_POST["past_history"]) && isset($_POST['appointment_date'])) {

                //
                // generate current date
                //$visited_flag = 'Pending';
                $current_day = date('Y-m-d');

                // collect vars
                $patient_id       = htmlentities($_POST['patient_id']);
                $doctor_id        = htmlentities($_POST['doctor_id']);
                $doctor_name      = $_SESSION['push_case_doct_name'];
                $symptom          = htmlentities($_POST['symptom']);
                $past_history     = htmlentities($_POST['past_history']);
                $bp               = htmlentities($_POST['bp']);
                $test_result      = htmlentities($_POST['test_result']);
                $appointment_date = htmlentities($_POST['appointment_date']);
                $visited_flag     = 'Pending';
                $work_day         = $current_day;
                

                $patient_data = array(
                  'patient_id'        => $patient_id ,
                  'doctor_id'         => $doctor_id ,
                  'doctor_name'       => $doctor_name ,
                  'symptom'           => $symptom,
                  'past_history'      => $past_history,
                  'bp'                => $bp,
                  'test_result'       => $test_result,
                  'appointment_date'  => $appointment_date,
                  'visited_flag'      => $visited_flag,
                  'work_day'          => $work_day
                );
   
                    // commit write
                    $write_status = write_appointment ( $patient_data );

                    //var_dump($write_status);
                      
                    
                    if ($write_status == 1) {
                      //
                      //echo "Write successful. Appointment Added.";
                      //header("Location: admin/dashboard-p.php");

                      //
                      //echo 'Your appointment has been taken successfully.';
                      echo '
                            <div class="col-md-12">
                  
                                <div class="alert alert-success">
                                  <i class="fa fa-check"></i>
                                  Your appointment has been taken successfully.
                                </div>
                          
                            </div> ';
                    } else {
                      //
                      //echo "Write error.";
                      echo '
                            <div class="col-md-12">
                  
                                <div class="alert alert-danger">
                                  <i class="fa fa-exclamation-triangle"></i>
                                  Write error.
                                </div>
                          
                            </div> ';
                    }


                    // update lock flag
                    update_single_doct_appointment_flag($patient_id);
                    


                    // update one doctor's appointment case
                    //$_SESSION['push_case_one_time_appointment_done'] = 1;
                    


                    // // insert data
                    // //$sql = "INSERT INTO appointment ( $fields ) VALUES ( $values )";
                    // $sql = "INSERT INTO appointment ( symptom, bp, past_history, appointment_date ) VALUES ( '$symptom', '$bp', '$past_history', '$appointment_date' )";

                    // echo "<pre>";
                    // print_r($sql);
                    // echo "<pre>";

                    // //
                    // $result = mysqli_query( $con, $sql );

                    // //
                    // echo "Write successful.";
                 
                }


?>
<!-- /. end of script to read post vars (appointment) and write to db -->


            
    <!-- content -->

            



            <!-- form-add-patient -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">

                  <div class="form-group">
                    <label for="patid">Patient ID</label>
                    <input type="text" class="form-control" id="patid" placeholder="" value="<?php echo "$patient_id"; ?>" name="patient_id" readonly>
                  </div>

                  <div class="form-group">
                    <label for="doctid">Doctor ID</label>
                    <input type="text" class="form-control" id="doctid" placeholder="" value="<?php echo "$doctor_id"; ?>" name="doctor_id" readonly>
                  </div>

                  <div class="form-group">
                    <label for="symptom">Symptom *</label>
                    <input required="required" type="textarea" class="form-control" id="symptom" placeholder="Enter Symptom" name="symptom">
                  </div>

                  <div class="form-group">
                    <label for="pasthistory">Past History *</label>
                    <input required="required" type="textarea" class="form-control" id="pasthistory" placeholder="Past History" name="past_history">
                  </div>

                  <div class="form-group">
                    <label for="bp">Blood Pressure</label>
                    <input type="text" class="form-control" id="bp" placeholder="Enter Blood Pressure" name="bp">
                  </div>

                  <div class="form-group">
                    <label for="test_res">Test Result</label>
                    <input type="text" class="form-control" id="test_res" placeholder="Enter Test Result" name="test_result">
                  </div>

                  <div class="form-group">
                    <label for="appodate">Appointment Date</label>
                    <input type="text" class="form-control" id="appodate" placeholder="" value="<?php echo(date('Y-m-d H-i-s')); ?>" name="appointment_date" readonly>
                  </div>

                  <div class="form-group">
                    <p class="float-right text-muted"> * required</p>
                  </div>

                  <!-- <div class="form-group">
                    <label for="exampleInputFile">Add profile picture</label>

                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>

                  </div> -->

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-primary float-right" href="dashboard-p.php">Go to Dashboard</a>
                </div>
              </form>
            </div>
            <!-- /.form-add-patient -->

            <!-- /.content -->



            
            <!-- /.card -->
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- content-footer -->

            <?php  
              // footer
              echo $footer_cprght_global;
            ?>

  <!-- /.content-footer -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>