<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
 

  if(isset($_GET['cityid']))
  {
       
      $qry="SELECT * FROM city where cityid='".$_GET['cityid']."'";
      $result=mysqli_query($conn,$qry);
      $row=mysqli_fetch_assoc($result);
       
  }
	
	if(isset($_POST['submit']))
	{
      
     if($_FILES['cityimage']['name']!="")
     {
        
          $file_name= str_replace(" ","-",$_FILES['cityimage']['name']);

         $place_image=rand(0,99999)."_".$file_name;
           
         //Main Image
         $tpath='images/city/'.$place_image;       
         $pic=compress_image($_FILES["cityimage"]["tmp_name"], $tpath, 60);
         
          
              
           $data = array( 
				'cityid'  =>  $_POST['cityid'],
				'cityname'  =>  $_POST['cityname'],
				'cityimage'  =>  $place_image
              );    
    

     }
     else
     {
            $data = array( 
				'cityid'  =>  $_POST['cityid'],
				'cityname'  =>  $_POST['cityname']
              );  
     }

 
    $news_edit=Insert('city', $data);

 	    
		$_SESSION['msg']="11";
 
		header( "Location:addcity.php?cityid=".$_POST['cityid']);
		exit;	

		
	}
	
	 

?>