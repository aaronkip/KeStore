<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	
	$qry="SELECT * FROM settings where id='1'";
  $result=mysqli_query($conn,$qry);
  $settings_row=mysqli_fetch_assoc($result);

 if(isset($_POST['app_pri_poly']))
  {

        $data = array(
                'app_privacy_policy'  =>  $_POST['app_privacy_policy'] 
                  );

    
      $settings_edit=Update('settings', $data, "WHERE id = '1'");
 

      if ($settings_edit > 0)
      {

        $_SESSION['msg']="11";
        header( "Location:privacy.php");
        exit;

      }   
 
  }

  if(isset($_POST['submit']))
  {    

    $img_res=mysqli_query($conn,"SELECT * FROM settings WHERE id='1'");
    $img_row=mysqli_fetch_assoc($img_res);
    

    if(isset($_GET['app_privacy_policy']))
    {      


              $data = array(
              'app_privacy_policy'  => addslashes($_POST['app_privacy_policy'])
              );

    } 

    $settings_edit=Update('settings', $data, "WHERE id = '1'");
  

        $_SESSION['msg']="11";
        header( "Location:privacy.php");
        exit;
  
 
  }

?>