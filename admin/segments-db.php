

<?php  
	// encapsulate segments as vars


  // site-wide menu mode cast
  if ($_SESSION['active_user_role'] === "Doctor") {
    //
    $page_menu_mode = "D";
    $home_page_doct = 'dashboard-d.php';
  } elseif ($_SESSION['active_user_role'] === "Patient") {
    //
    $page_menu_mode = "P";
    $home_page_pat = 'dashboard-p.php';
  }


  // brand_logo
  $brand_logo_d = '
    <!-- Brand Logo -->
    <a href="dashboard-d.php" class="brand-link">
      <img src="../dist/img/EDUPMSLogo.png" alt="EDUPMS Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">EDUPMS</span>
    </a>

  ';

    $brand_logo_p = '
    <!-- Brand Logo -->
    <a href="dashboard-p.php" class="brand-link">
      <img src="../dist/img/EDUPMSLogo.png" alt="EDUPMS Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">EDUPMS</span>
    </a>

  ';
  // /brand_logo


  // left_pane_profimg_and_name card
  // pat card

  // (this vars doesn't work. so don't use. demo only.)
  // $left_pane_profimg_and_name_doct = 'demo';
  // $left_pane_profimg_and_name_pat = 'demo';

  // /pat card
  // /left_pane_profimg_and_name card


	// header links (update later if needed)
	$navbar_top_mid_left_links_doct_pat_minimal = '
            <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                  </li>
                  <!-- entries 
                  <li class="nav-item d-none d-sm-inline-block">
                    <a href="dashboard-d.php" class="nav-link">Home</a>
                  </li>
                  -->

            </ul>
  ';

  // sample only, not used
  $navbar_top_mid_left_links_doct = '';
  $navbar_top_mid_left_links_pat  = '';
  // /header links




	// left pane menus

	//
	$left_pane_menu_doct = '

	<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard-d.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Doctor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="profile-doctor.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Profile</p>
                    </a>
                  </li>

                  <!-- 
                  <li class="nav-item">
                    <a href="revenue.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p> Revenue </p>
                    </a>
                  </li>
                  -->

                </ul>

          </li>



          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Patient
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
                <ul class="nav nav-treeview">
                  
                  <li class="nav-item">
                    <a href="view-profile-patient.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p> View profile </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="view-pat-history.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p> View history </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="table-patients.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p> View patients today </p>
                    </a>
                  </li>
                  

                </ul>
          </li>


          <li class="nav-item">
            <a href="settings.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Settings</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

      ';

	//
	$left_pane_menu_pat = '
	
<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard-p.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Doctor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="profile-doctor.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Profile</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="add-appointment.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Appointment</p>
                    </a>
                  </li>

                </ul>

          </li>


          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Patient
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="profile-patient.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Profile</p>
                    </a>
                  </li>

                  

                  <li class="nav-item">
                    <a href="pat-history.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Prescription History</p>
                    </a>
                  </li>

                </ul>
          </li>


          </li>


          <li class="nav-item">
            <a href="settings.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Settings</p>
            </a>
          </li>
          
        </ul>
      </nav>
<!-- /.sidebar-menu -->

	';

  // /left pane menus


	//
	$left_pane_assistant = '';
	$left_pane_admin = '';


	// top right menu button
	$top_right_menu_button = '
  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-chevron-circle-down"></i>
          <!--
          <span class="badge badge-warning navbar-badge">7</span>
          -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"> Menu </span>
          <div class="dropdown-divider"></div>

          <!-- skpd for now 
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>

          <div class="dropdown-divider"></div>
          -->


          <a href="doc/Doc.docx" class="dropdown-item"> Documentation </a>

          <div class="dropdown-divider"></div>

          <a href="about.php" class="dropdown-item"> About </a>

          <div class="dropdown-divider"></div>

          <a href="logout.php" class="dropdown-item dropdown-footer"> Log out </a>
          
        </div>
  </li>';


  // /top right menu button


	// footer
	$footer_cprght_global = '<footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="#">EDUPMS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.91 (Alpha)
    </div>
  </footer>';
            
  // /.footer


?>
<!-- 00 -->

                  <!-- <li class="nav-item">
                    <a href="view-prescription.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Last prescription</p>
                    </a>
                  </li> -->