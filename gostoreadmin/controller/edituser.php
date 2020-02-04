<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
 

  if(isset($_GET['userid']))
  {
       
      $qry="SELECT * FROM users where userid='".$_GET['userid']."'";
      $result=mysqli_query($conn,$qry);
      $row=mysqli_fetch_assoc($result);
       
  }
	
	if(isset($_POST['submit']))
	{
      
     if($_FILES['imageprofile']['name']!="")
     {
        
          $file_name= str_replace(" ","-",$_FILES['imageprofile']['name']);

         $image=rand(0,99999)."_".$file_name;
		 $imageurl=BASE_URL.'images/'.$image;
           
         //Main Image
         $tpath1='images/'.$image;       
         $pic1=compress_image($_FILES["imageprofile"]["tmp_name"], $tpath1, 60);
         
          
              
           $data = array( 
				'userid'  =>  $_POST['userid'],
				'fullname'  =>  $_POST['fullname'],
				'imageprofile'  =>  $imageurl
              );    
    

     }
     else
     {
            $data = array( 
				'userid'  =>  $_POST['userid'],
				'fullname'  =>  $_POST['fullname']
              );  
     }

 
    $news_edit=Update('users', $data, "WHERE userid = '".$_POST['userid']."'");

 	    
		$_SESSION['msg']="11";
 
		header( "Location:edituser.php?userid=".$_POST['userid']);
		exit;	

		
	}
	
	 

?>