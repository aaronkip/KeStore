<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	
	$qry="SELECT * FROM settings where id='1'";
  $result=mysqli_query($conn,$qry);
  $settings_row=mysqli_fetch_assoc($result);

 

  if(isset($_POST['submit']))
  {
		$data = array(  

              'app_author'  =>  $_POST['app_author'],
              'app_email'  =>  $_POST['app_email'], 
              'app_contact'  =>  $_POST['app_contact'],  
              'app_website'  =>  $_POST['app_website'],
              'app_version'  =>  $_POST['app_version'],
              'ghipy_api'  =>  $_POST['ghipy_api'],	
              'app_description'  => addslashes($_POST['app_description'])                  

              );
    

    $img_res=mysqli_query($conn,"SELECT * FROM settings WHERE id='1'");
    $img_row=mysqli_fetch_assoc($img_res);
    


    $settings_edit=Update('settings', $data, "WHERE id = '1'");
  

        $_SESSION['msg']="11";
        header( "Location:app_settings.php");
        exit;
  
 
  }

?>