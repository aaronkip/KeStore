<?php
    include("includes/config.php");
		include("language/language.php");

	if(isset($_SESSION['admin_name']))
	{
		header("Location:home.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
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
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-dark text-left p-5">
                <h2>Login</h2>
                <h4 class="font-weight-light">Hello! let's get started</h4>
                <form class="pt-5" action="login.php" method="post">
                  <div class="form-group">
				  <div class="input-group" style="border:0px;">
                <?php if(isset($_SESSION['msg'])){?>
                <div class="alert alert-danger  alert-dismissible" role="alert"> <?php echo $client_lang[$_SESSION['msg']]; ?> </div>
                <?php unset($_SESSION['msg']);}?>
              </div>
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    <i class="mdi mdi-account"></i>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <i class="mdi mdi-eye"></i>
                  </div>
                  <div class="mt-5">
				  <input class="btn btn-block btn-warning btn-lg font-weight-medium" type="submit" class="btn btn-success btn-submit" value="Login">
                   
                  </div>
                                   
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="asset/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="asset/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="asset/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="asset/js/off-canvas.js"></script>
  <script src="asset/js/hoverable-collapse.js"></script>
  <script src="asset/js/misc.js"></script>
  <script src="asset/js/settings.js"></script>
  <script src="asset/js/todolist.js"></script>
  <!-- endinject -->
</body>


</html>