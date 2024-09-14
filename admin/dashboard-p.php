<?php  
  session_start();
  require_once ('../config.php');
  include('segments-db.php');

  //session_destroy();

  // echo "<pre>";
  // var_dump($_SESSION);
  // echo "<pre>";
  // exit;

  // patient session validation
  if ($_SESSION['active_user_role'] === "Doctor") {
    //
    echo "Session (Patient) expired.";
    exit;
  }

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
          
          // get pat id
          $patient_id = $_SESSION['active_user_PID'];

              // echo "<pre>";
              // var_dump($patient_id);
              // echo "<pre>";
              // exit;

          // will set the page in disabled mode if there is no active user (logged in), can be skipped if you are debugging
          if (isset($_SESSION['user_logout'])) {
            //
            echo "You are already logged out.";
            exit;
          }


          // 


          // pat card __


          // get user role
          if ($_SESSION['active_user_role'] == "Patient") {
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


          } elseif ($_SESSION['active_user_role'] == "Doctor") {
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


          }


          // pat card __




          // update dashboard
          // get values
          $doctor_id = $_SESSION['push_case_doct_id'];

          $total_appointments = dashboard_total_appointments ($doctor_id, $patient_id);
          $doctors_visited = dashboard_doctors_visited ($doctor_id, $patient_id);

          // calculate waiting
          $appointments_pending = $total_appointments - $doctors_visited;

              // echo "<pre>";
              // print_r($doctors_visited);
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
    <?php  
      // <!-- Brand Logo -->
      if ($page_menu_mode == "D") {
        //
        echo $brand_logo_d;
      } elseif ($page_menu_mode == "P") {
        //
        echo $brand_logo_p;
      }
    ?>


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
            echo $left_pane_menu_doct;
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

    <!-- content-header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="row">

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> <?php echo "$total_appointments"; ?> </h3>

                <p>Total appointments</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <!-- ./col -->


          <!-- ./col -->
         
          <div class="col-lg-4 col-6">

            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> <?php echo "$appointments_pending"; ?> </h3>

                <p>Appointments pending</p>
              </div>
              <div class="icon">
                <i class="fa fa-th"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> <?php echo "$doctors_visited"; ?> </h3>

                <p>Doctors visited</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <!-- ./col -->

        </div>


        <?php  
          //
          if ($total_appointments === 0 && $appointments_pending === 0 && $doctors_visited === 0) {
            //
            //$fresh_start = 1;

            echo '
                <div class="col-md-12">
              
                  <div class="alert alert-info">
                    <i class="fa fa-check"></i>
                        No pending appointments.
                  </div>
                      
                </div> ';
          } elseif ($appointments_pending === 0) {
            //
            echo '
                <div class="col-md-12">
              
                  <div class="alert alert-success">
                    <i class="fa fa-check"></i>
                        All completed.
                  </div>
                      
                </div> ';
          }


        ?>

        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Appointments </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">


<!--                   <thead>
                    <tr>
                      <th style="width: 100px">Sl. No.</th>
                      <th>Patient's Name</th>
                      <th>Contact</th>
                      <th>Profile</th>
                    </tr>
                  </thead> -->

<!--                   <tbody>
                    <tr>
                      <td>1</td>
                      <td>Md. Ahad</td>
                      <td>
                        018 44 332211
                      </td>
                      <td> <a class="btn btn-primary btn-small" href="patient-info.php"> <i class="fa fa-user" ></i> View Patient </a> </td>
                    </tr>

                    <tr>
                      <td>2</td>
                      <td>Md. Abir</td>
                      <td>
                        018 44 332211
                      </td>
                      <td> <a class="btn btn-primary btn-small" href="patient-info.php"> <i class="fa fa-user" ></i> View Patient </a> </td>
                    </tr>

                    <tr>
                      <td>3</td>
                      <td>Md. Akash</td>
                      <td>
                        018 44 332211
                      </td>
                      <td> <a class="btn btn-primary btn-small" href="patient-info.php"> <i class="fa fa-user" ></i> View Patient </a> </td>
                    </tr>
                  </tbody> -->

                  <table class="table table-striped">
                      <tr>
                        <th>ID</th> <th>Doctor ID</th> <th>Doctor Name</th> <th>Symptom</th> <th>Past history</th> <th> ... </th>
                      </tr>

                          <!--  -->
                          <?php  
                            // set fixed doct ID
                            //$doct_id = "doct01";
                            
                            //
                            $sql = "SELECT * FROM appointment WHERE patient_id = '$patient_id' AND visited_flag = 'pending' ";
                            $result = mysqli_query( $con, $sql );

                            if ($result -> num_rows > 0) {
                              //

                              while ($row = $result -> fetch_assoc()) {
                              //
                              echo "<tr><td>" .$row['id']. "</td><td>" .$row['doctor_id']. "</td><td>" .$row['doctor_name']. "</td><td>" .$row['symptom']. "</td><td>" .$row['past_history']. "</td><td>" .'<a class="btn btn-primary btn-small" href="profile-doctor.php"> <i class="fa fa-user" ></i> View Doctor </a>'. "</td></tr>";
                              }
                              echo "</table>";

                            } else {
                              echo "<tr><td>" . "0 results." . "</td></tr>";
                              echo "</table>";
                            }

                                
                          ?>

                  <!--</table>  -->
              </div>
              <!-- /.card-body -->
            </div>
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