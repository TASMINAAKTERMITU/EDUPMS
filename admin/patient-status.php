<?php  
  //
  session_start();
  require_once ('../config.php');
  include('segments-db.php');
  //
?>

<?php  

      // work with table appointment
      //$p_id = $_SESSION['patient_id'];
      //$p_id = "user3168";
      // $p_id = htmlentities($_POST['usr_id']);

      // // echo $p_id;
      // // exit;


      // //
      // $data = retrieve_data_appointment ($p_id);

      // var_dump($data);
      // exit;

      //$p_id = user3168;
      // $p_id = htmlentities($_POST['usr_id']);

      // as our usr_id can (format for readability reason) contain white space around it from previous page, so trim it with trim function
      $p_id = trim(htmlentities($_POST['usr_id']));

      // upload the patient name to SESSION var 
      $_SESSION['to_prescribe_patient'] = $p_id;
      //$_SESSION['alternate_post_patient_symptom'] = $appointment_data['symptom'];



      // get patient appointment data
      $appointment_data = retrieve_data_appointment ($p_id);

      // var_dump($data);
      // exit;


?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> DIITPMS | Patient Info </title>
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
      <span class="brand-text font-weight-light">DIITPMS</span>
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
            <h1 class="m-0 text-dark">Patient Status</h1>
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
              <li class="breadcrumb-item active">Patient Status</li>
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
            
            
            <!-- content -->

            <!-- /.card-header -->
              <div>
                  <!-- <a class="float-right" href="pat-history.php">  View History </a> -->
                            <form method="POST" action="pat-history.php">
                            <input type="hidden" name="usr_id" value="<?php echo "$p_id"; ?>">
                            <input type="submit" value="View History" class="btn btn-secondary float-right">
                            </form>
              </div>
              <br>

              <div class="card-body">



                <hr>

                <!-- property 01 -->
                <strong><i class="fas fa-book mr-1"></i> Patient ID  </strong>  <span class="text-muted float-right">(<?php  echo $appointment_data['patient_id']; ?>)</span>

                <!-- <p class="text-muted">
                  MD. Ahad Uddin
                </p> -->

                <hr>

                <!-- property 02 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Symptom </strong> <span class="float-right text-muted">  <?php  echo $appointment_data['symptom']; ?> </span>

                <!-- <p class="text-muted">
                  abc@gmail.com
                </p> -->

                <hr>

                <!-- property 03 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Past History </strong> <span class="float-right text-muted">  <?php  echo $appointment_data['past_history']; ?> </span>

                <!-- <p class="text-muted">
                  018-00-112233
                </p> -->

                <hr>

                <!-- property 04 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Blood Pressure </strong> <span class="float-right text-muted">  <?php  echo $appointment_data['bp']; ?> </span>
                

                <!-- <p class="text-muted">
                  abc@gmail.com
                </p> -->

                <hr>

                <!-- property 05 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Test Result </strong> <span class="float-right text-muted">  <?php  echo $appointment_data['test_result']; ?> </span>

                <!-- <p class="text-muted">
                  018-00-112233
                </p> -->

                <hr>

                <!-- property 05=6 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Appointment Date </strong> <span class="float-right text-muted">  <?php  echo $appointment_data['appointment_date']; ?> </span>

                <!-- <p class="text-muted">
                  01-01-2000
                </p> -->

                <hr>

                <!-- <button type="submit" value="submit" class="btn btn-primary" disabled> <i class="fas fa-video" ></i> Video call </i> 
                </button>  -->

                <!-- <a class="btn btn-primary btn-small float-left" href="#" > <i class="fa fa-video" ></i>  Video call </a> -->
                <a class="btn btn-primary btn-small float-right" href="add-prescription.php"> <i class="fas fa-user" ></i>  Prescribe </a>
                

              </div>

            <!-- /.content -->


              <?php  
                //
                    // work with table appointment


                    //
                    //$data = retrieve_data('abc@gmail.com');

                    //var_dump($data);
                    //exit;
              ?>

            
            <!-- /.card -->
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

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