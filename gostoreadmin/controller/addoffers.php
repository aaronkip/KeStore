<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

$user_qry="SELECT * FROM users ORDER BY fullname";
  $user_result=mysqli_query($conn,$user_qry); 
  
  $stores_qry="SELECT * FROM stores ORDER BY name";
  $stores_result=mysqli_query($conn,$stores_qry); 
  
  if(isset($_GET['offerid']))
  {
       
      $qry="SELECT * FROM offers where offerid='".$_GET['offerid']."'";
      $result=mysqli_query($conn,$qry);
      $row=mysqli_fetch_assoc($result);
       
  }
	
	if(isset($_POST['submit']))
	{
      
     if($_FILES['image']['name']!="")
     {
        
          $file_name= str_replace(" ","-",$_FILES['image']['name']);

         $image=rand(0,99999)."_".$file_name;
           
         //Main Image
         $tpath1='images/offers/'.$image;       
         $pic1=compress_image($_FILES["image"]["tmp_name"], $tpath1, 60);
         
          
              
        $data = array( 
		'storeid'  =>  $_POST['storeid'],
         'offersname'  =>  $_POST['offersname'],
		 'price'  =>  $_POST['price'],
		 'image'  =>  $image,
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'odescription'  =>  addslashes($_POST['odescription']),
         'otags'  =>  $_POST['otags'],
		 'oaddress'  =>  addslashes($_POST['oaddress']),
         'olatitude'  =>  $_POST['olatitude'],
		 'status'  =>  $_POST['status'],
         'olongitude'  =>  $_POST['olongitude']
		 
          ); 
	 } else {
	 
	 $data = array( 
	 'storeid'  =>  $_POST['storeid'],
         'offersname'  =>  $_POST['offersname'],
		 'price'  =>  $_POST['price'],
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'odescription'  =>  addslashes($_POST['odescription']),
         'otags'  =>  $_POST['otags'],
		 'oaddress'  =>  addslashes($_POST['oaddress']),
         'olatitude'  =>  $_POST['olatitude'],
		 'status'  =>  $_POST['status'],
         'olongitude'  =>  $_POST['olongitude']
		 
          );
	 }

 
    $news_edit=Insert('offers', $data);

    $place_id=$_POST['offerid'];

 	    
		$_SESSION['msg']="11";
 
		header( "Location:offers.php");
		exit;	

		
	}
	 

?>