<?php include("includes/config.php");
      include("includes/session_check.php");
      
      //Get file name
      $currentFile = $_SERVER["SCRIPT_NAME"];
      $parts = Explode('/', $currentFile);
      $currentFile = $parts[count($parts) - 1];       
       
      
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GOSTORE</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="asset/node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="asset/node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="asset/node_modules/flag-icon-css/css/flag-icon.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="asset/css/style.css">
  
  <!-- endinject -->
  <link rel="shortcut icon" href="asset/images/ic_launcher.png" />
  <script src="asset/ckeditor/ckeditor.js"></script>
  
  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="home.php"><img src="asset/images/logo.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="home.php"><img src="asset/images/ic_launcher.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        
        
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:../../partials/_settings-panel.html -->
        
        
        <!-- partial -->
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="profile-image">
                  <img src="asset/images/profile.png" alt="image"/>
                  <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
				
                  <p class="name">
                    Admin
                  </p>
				  <a href="profile.php">
                  <p class="designation">
                    Edit
                  </p>
				  </a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <i class="icon-rocket menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="stores.php">
                <i class="icon-handbag menu-icon"></i>
                <span class="menu-title">Stores</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="offers.php">
                <i class="icon-basket-loaded menu-icon"></i>
                <span class="menu-title">Offers</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="events.php">
                <i class="icon-paper-plane menu-icon"></i>
                <span class="menu-title">Events</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="review.php">
                <i class="icon-home menu-icon"></i>
                <span class="menu-title">Review</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="category.php">
                <i class="icon-folder menu-icon"></i>
                <span class="menu-title">Category</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="city.php">
                <i class=" icon-location-pin menu-icon"></i>
                <span class="menu-title">City</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="users.php">
                <i class="icon-people menu-icon"></i>
                <span class="menu-title">Users</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="send_notification.php">
                <i class=" icon-bell menu-icon"></i>
                <span class="menu-title">Send Notification</span>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="app_settings.php">
                <i class=" icon-screen-smartphone menu-icon"></i>
                <span class="menu-title">App Settings</span>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="privacy.php">
                <i class="icon-docs menu-icon"></i>
                <span class="menu-title">Privacy Policy</span>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="onesignalsettings.php">
                <i class=" icon-bell menu-icon"></i>
                <span class="menu-title">Onesignal Settings</span>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure you want to logout?');">
                <i class="icon-lock menu-icon"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
		
		
		


