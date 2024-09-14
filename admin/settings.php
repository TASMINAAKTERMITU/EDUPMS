<?php  
  //
  session_start();
  require_once ('../config.php');
  include('segments-db.php');
  //
?>


<?php  
  //
  $patient_id = $_SESSION['active_user_PID'];

  //
  // print_r($patient_id);
  // exit;

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
            <h1 class="m-0 text-dark">Settings</h1>
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
              <li class="breadcrumb-item active">Settings</li>
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
            
<?php
              //

              // ____ ____ ____ ____ ____ ____ ____ ____
              //
              // change user password
              //
              // ____ ____ ____ ____ ____ ____ ____ ____



              // get vars
              $curr_pass    = htmlentities($_POST['curr_pass']);
              $nw_pass      = htmlentities($_POST['nw_pass']);
              $repe_nw_pass = htmlentities($_POST['repe_nw_pass']);


              // usr specification

              // get user type
              $user_type = $_SESSION['active_user_role'];



              // ____ ____ ____ ____ ____ ____ ____ ____
              //
              // change patient password  
              //
              // ____ ____ ____ ____ ____ ____ ____ ____



              // patient user case
              if ($user_type == "Patient") {

                  // set patients user table
                  $tbl_nm = 'users'; // //

                  // get pat id
                  $pat_usr_id = htmlentities($_SESSION['active_user_PID']);

                  // check if password matches with db. here - (pass_confirmation_SAUT = pass_confirmation_Supports_Any_User_Type)
                  $pass_if_exist_confirmation = pass_confirmation_pat ( $tbl_nm, $pat_usr_id, $curr_pass );

                  // check if fields are filled
                  if ( isset($_POST['curr_pass']) && isset($_POST['nw_pass']) && isset($_POST['repe_nw_pass']) ) {

                      // check if current pass is ok
                      if ($pass_if_exist_confirmation == 1) {
                        // check if both new and repeat pass is ok
                        if ($nw_pass === $repe_nw_pass) {
                          //
                          $update_result = update_pass_with_usr_id_pat ( $tbl_nm, $pat_usr_id, $nw_pass ); 
                        }

                        //
                        if ($update_result == 1) {
                          //
                          //echo "Password is changed successfully.";
                          echo '
                            <div class="col-md-12">
                  
                                <div class="alert alert-success">
                                  <i class="fa fa-check"></i>
                                  Your password is changed successfully.
                                </div>
                          
                            </div> ';

                        }

                      } elseif ($pass_confirmation > 1) {
                        //
                        //echo "Database user id conflict (Multiple ID). Check Database.";
                        echo '
                            <div class="col-md-12">
                  
                                <div class="alert alert-warning">
                                  <i class="fa fa-check"></i>
                                  Database user id conflict (Multiple ID). Check Database.
                                </div>
                          
                            </div> ';


                      } else {
                        //echo "Error. No such user!";
                        echo '
                            <div class="col-md-12">
                  
                                <div class="alert alert-warning">
                                  <i class="fa fa-check"></i>
                                  Error. No such user!
                                </div>
                          
                            </div> ';
                      }

                  }

              }


?>


<?php
              //

              // ____ ____ ____ ____ ____ ____ ____ ____
              //
              // update patient profile info
              //
              // ____ ____ ____ ____ ____ ____ ____ ____

              // get vars
              $patient_id = $_SESSION['active_user_PID'];

              $name       = htmlentities($_POST['name']);
              $phone      = htmlentities($_POST['phone']);
              $profession = htmlentities($_POST['profession']);
              $address    = htmlentities($_POST['address']);

              //
              //
              // $user_inputs = array(
              //   'name'        => $name,
              //   'phone'       => $phone,
              //   'profession'  => $profession,
              //   'address'     => $address,

              // );

              //
              if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['profession']) && isset($_POST['address']) ) {
                //

                // commit write
                $result = update_pat_usr_info_settings( $patient_id, $name, $phone, $profession, $address );

                //
                // print_r($result);
                // exit;

                //
                if ($result == 1) {
                  //
                  //echo "Update successful.";
                  echo '
                            <div class="col-md-12">
                  
                                <div class="alert alert-success">
                                  <i class="fa fa-check"></i>
                                  Update successful!
                                </div>
                          
                            </div> 
                        ';
                  //
                  //echo "done";
                  //echo '';

                }

              }
              








            ?>



            <!-- content -->

            <!-- Start of change PW -->
            <!-- <form>
              <input type="text" name="">
              <input type="text" name="">
              <input type="text" name="">

            </form> -->

            <?php
              // if it's patient login, enable change pw option
              if ($_SESSION['active_user_role'] == "Patient") {
                //
                echo '

                  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Change password </h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="" method="POST">
                <div class="card-body">

                  <div class="form-group">
                    <label for="curr_pw"> Current password </label>
                    <input required="required" type="textarea" class="form-control" id="curr_pw" placeholder="Current password" value="" name="curr_pass">
                  </div>

                  <div class="form-group">
                    <label for="nw_pw"> New password </label>
                    <input required="required" type="textarea" class="form-control" id="nw_pw" placeholder="New password" value="" name="nw_pass">
                  </div>

                  <div class="form-group">
                    <label for="re_nw_pw"> Repeat new password </label>
                    <input required="required" type="textarea" class="form-control" id="re_nw_pw" placeholder="Repeat new password" value="" name="repe_nw_pass">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" value="submit" class="btn btn-primary float-right">Change password</button> 
                </div>

              </form>
              <!-- /.end of form -->

            </div>

                ';

              }

            ?>

            <!-- /.End of change PW -->




            <!-- Start of personal info card -->

              <?php 


                // role patient
                if ($_SESSION['active_user_role'] == "Patient") {

                  //

                  // get pat prof info
                  $pat_prof_data_array = retrieve_patient_profile_data($patient_id);

                  //
                  echo '
            <!-- personal info card -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Change personal info </h3>
              </div>
              <!-- /.card-header -->

              


              <!-- form start -->
              <form role="form" action="" method="POST">
                <div class="card-body">


                  <div class="form-group">
                    <label for="nm"> Name </label>
                    <input required="required" type="textarea" class="form-control" id="nm" placeholder="Name" value="" name="name">
                  </div>

                  <div class="form-group">
                    <label for="phn"> Phone </label>
                    <input required="required" type="textarea" class="form-control" id="phn" placeholder="Phone" value="" name="phone">
                  </div>

                  <div class="form-group">
                    <label for="profes"> Profession </label>
                    <input required="required" type="textarea" class="form-control" id="profes" placeholder="Profession" value="" name="profession">
                  </div>

                  <div class="form-group">
                    <label for="addre"> Address </label>
                    <input required="required" type="textarea" class="form-control" id="addre" placeholder="Address" value="" name="address">
                  </div>

                </div>
                <!-- /.card-body -->


                <div class="card-footer">
                  <button type="submit" value="submit" class="btn btn-primary float-right"  data-toggle="modal" data-target="#exampleModalCenter"> Update </button> 
                </div>

              </form>
              <!-- /.end of form -->

            </div>
            <!-- personal info card -->

                  ';


                }

              ?>


            
            <!-- /.End of personal info card -->


            <!-- Start of change Profile image -->

            <!-- <div class="card-primary">

                  <div class="form-group">
                    <label for="exampleInputFile">Change profile picture</label>


                  <div class="form-group">

                    <div class="input-group">

                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>

                    </div>

                  </div>
                  
            </div> -->

            <!-- /.End of change Profile image -->


            <!-- start of to-dashboard btn-->
            <?php

              //
              if ($_SESSION['active_user_role'] == "Patient") {
                //
                echo '
                      <div class="card card-primary">

                        <form>
                          <div class="card-footer">
                            <!-- <button type="submit" value="submit" class="btn btn-primary float-right"> Go to Dashboard </button>  -->
                            <a href="dashboard-p.php" class="btn btn-primary float-right"> Go to Dashboard </a>
                          </div>

                        </form>
                        <!-- /.end of form -->

                      </div>

                ';

              } elseif ($_SESSION['active_user_role'] == "Doctor") {
                //
                echo '
                      <div class="card card-primary">

                        <form>
                          <div class="card-footer">
                            <!-- <button type="submit" value="submit" class="btn btn-primary float-right"> Go to Dashboard </button>  -->
                            <a href="dashboard-d.php" class="btn btn-primary float-right"> Go to Dashboard </a>
                          </div>

                        </form>
                        <!-- /.end of form -->

                      </div>

                ';

              }
            



            ?>
            <!-- /.End of to-dashboard btn -->


            



            



            <?php  
              // change profile pic
              $file_address = '';

              // functions


            ?>

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