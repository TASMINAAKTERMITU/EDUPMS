<?php  
  //
  session_start();
  require_once ('../config.php');
  include('segments-db.php');
  //
?>

<?php  
      // get unique identifier from session_var
      //$patient_id = $_SESSION['active_user_ID'];
      
      $p_id = trim(htmlentities($_POST['usr_id']));


      // redundant assignment (used when previous page doesn't post patient_id to current page)
      // // patient login case - adjustment with session var
      // if ($_SESSION['active_user_role'] === "Patient") {
      //   //
      //   $p_id = $_SESSION['active_user_ID'];
      // }


      // provide data to page (used when previous page doesn't post patient_id to current page)

      // if active user is patient, set pid
      if ($_SESSION['active_user_role'] == "Patient") {
        //
        if ($p_id !== $_SESSION['active_user_ID']) {
        $p_id = $_SESSION['active_user_ID'];
        } 
      }

      // // if active user is doctor, set pid
      // if ($_SESSION['active_user_role'] == "Doctor") {
      //   //
      //   if ($p_id !== $_SESSION['active_user_ID']) {
      //   $p_id = $_SESSION['active_user_ID'];
      //   } 
      // }


      // print_r($p_id);
      // exit;

      // get flag if user is in default list
      $image_not_found = $_SESSION['active_user_image_not_found_flag'];
      //

      //
      // var_dump($_SESSION['active_user_image_not_found_flag']);
      // exit;

      if ($image_not_found === 1) {
      //
      $img_path = '../dist/img/'. 'default.jpg' ;
      } else {
        $img_path = '../dist/img/'. $_SESSION['active_user_prof_img_name'] ;
      }


      // get patient's profile data
      
      $data = retrieve_patient_profile_data ($p_id);


      // print_r($data);
      // exit;
      

?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EDUPMS | Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">



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
    <a href="../index3.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">EDUPMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->


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
          <a href="#" class="d-block"> 
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
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
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo $img_path; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"> <?php  echo $data['name']; ?> </h3>

                <p class="text-muted text-center"> <?php  echo $data['profession']; ?> </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Patient since</b> <a class="float-right">01-01-20</a>
                  </li>
                  <li class="list-group-item">
                    <b>Total Visit</b> <a class="float-right">5</a>
                  </li>
                  <li class="list-group-item">
                    <b>Last Visit</b> <a class="float-right">01-04-20</a>
                  </li>
                </ul>

                                  <form method="POST" action="pat-history.php">
                                    <input type="hidden" name="usr_id" value="<?php echo $data['patient_id']; ?>">
                                    <input type="submit" value="View History" class="btn btn-primary btn-block">
                                  </form>

                <!-- <a href="pat-history.php" class="btn btn-primary btn-block"><b> View History </b></a> -->

              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->



            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>



              <!-- /.card-header -->
              <div class="card-body">

                

                <!-- property 01 -->
                <strong><i class="fas fa-book mr-1"></i> Name</strong> <a class="float-right text-muted"> <?php  echo $data['name']; ?> </a>

                <!-- <p class="text-muted">
                  MD. Ahad Uddin
                </p>
                -->

                <hr>

                <!-- property 02 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong><a class="float-right text-muted"> <?php  echo $data['email']; ?> </a>

                <!-- <p class="text-muted">
                  abc@gmail.com
                </p> -->

                <hr>

                <!-- property 03 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Phone</strong><a class="float-right text-muted"> <?php  echo $data['phone']; ?> </a>

                <!-- <p class="text-muted">
                  018-00-112233
                </p> -->

                <hr>

                <!-- property 04 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Date of Birth </strong><a class="float-right text-muted"> <?php  echo $data['dob']; ?> </a>

                <!-- <p class="text-muted">
                  01-01-2000
                </p> -->

                <hr>

                <!-- property 05 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Age </strong><a class="float-right text-muted"> <?php  echo $data['age']; ?> </a>

                <!-- <p class="text-muted">
                  20
                </p> -->

                <hr>

                <!-- property 06 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Gender </strong><a class="float-right text-muted"> <?php  echo $data['gender']; ?> </a>

                <!-- <p class="text-muted">
                  Male
                </p> -->

                <hr>

                <!-- property 07 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Blood Group </strong><a class="float-right text-muted"> <?php  echo $data['blood_group']; ?> </a>

                <!-- <p class="text-muted">
                  A
                </p> -->

                <hr>

                <!-- property 08 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Weight </strong><a class="float-right text-muted"> <?php  echo $data['weight']; ?> </a>

                <!-- <p class="text-muted">
                  60
                </p> -->

                <hr>

                <!-- property 09 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Height </strong><a class="float-right text-muted"> <?php  echo $data['height']; ?> </a>

                <!-- <p class="text-muted">
                  5.5
                </p> -->

                <hr>

                <!-- <! property 10 >
                <strong><i class="fas fa-pencil-alt mr-1"></i> Height </strong><a class="float-right text-muted">  </a>

                <! <p class="text-muted">
                  5.5
                </p> >

                <hr> -->

                <!-- property 10 -->
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address </strong><a class="float-right text-muted"> <?php  echo $data['address']; ?> </a>

                <!-- <p class="text-muted"> 50/A, GEC, CTG, BD </p> -->

                <hr>

                <!-- property 11 -->
                <strong><i class="fas fa-pencil-alt mr-1"></i> Registration Date </strong><a class="float-right text-muted"> <?php  echo $data['reg_date']; ?> </a>

                <!-- <p class="text-muted">
                  01-01-2020
                </p> -->

                <hr>

                <!-- property 12 -->
                <strong><i class="far fa-file-alt mr-1"></i> Role </strong><a class="float-right text-muted"> <?php  echo $data['role']; ?></a>



                <!-- <p class="text-muted">Patient</p> -->

                <!--
                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Cardiothoracic radiology</span>
                  <span class="tag tag-success">Chest radiology</span>
                  <span class="tag tag-info">Cardiovascular radiology</span>
                  <span class="tag tag-warning">Radiation oncology</span>
                  <span class="tag tag-primary">Neuroradiology</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> 
                -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          

          <!-- /.col -->
        </div>
        <!-- /.row -->
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

<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
