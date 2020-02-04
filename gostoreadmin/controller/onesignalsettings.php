<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	
	$qry="SELECT * FROM settings where id='1'";
  $result=mysqli_query($conn,$qry);
  $settings_row=mysqli_fetch_assoc($result);

 

  if(isset($_POST['submit']))
  {
		$data = array(  

              'onesignal_app_id'  =>  $_POST['onesignal_app_id'],
              'onesignal_rest_key'  =>  $_POST['onesignal_rest_key']                 

              );
    

    $img_res=mysqli_query($conn,"SELECT * FROM settings WHERE id='1'");
    $img_row=mysqli_fetch_assoc($img_res);
    


    $settings_edit=Update('settings', $data, "WHERE id = '1'");
  

        $_SESSION['msg']="11";
        header( "Location:onesignalsettings.php");
        exit;
  
 
  }

?>