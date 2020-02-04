<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

 
  $cat_qry="SELECT * FROM category ORDER BY cname";
  $cat_result=mysqli_query($conn,$cat_qry);

	$user_qry="SELECT * FROM users ORDER BY fullname";
  $user_result=mysqli_query($conn,$user_qry);  

  $city_qry="SELECT * FROM city ORDER BY cityname";
  $city_result=mysqli_query($conn,$city_qry); 

  if(isset($_GET['storeid']))
  {
       
      $qry="SELECT * FROM stores where storeid='".$_GET['storeid']."'";
      $result=mysqli_query($conn,$qry);
      $row=mysqli_fetch_assoc($result);

     
      $qry1="SELECT * FROM gallery where storeid='".$_GET['storeid']."'";
      $result1=mysqli_query($conn,$qry1);
       
  }
	
	if(isset($_POST['submit']))
	{
      
     if($_FILES['images']['name']!="")
     {
        
          $file_name= str_replace(" ","-",$_FILES['images']['name']);

         $image=rand(0,99999)."_".$file_name;
           
         //Main Image
         $tpath1='images/stores/'.$image;       
         $pic1=compress_image($_FILES["images"]["tmp_name"], $tpath1, 60);
         
          
              
           $data = array( 
         'name'  =>  $_POST['name'],
		 'description'  =>  addslashes($_POST['description']),
         'phone'  =>  $_POST['phone'],
         'tags'  =>  $_POST['tags'],
		 'address'  =>  addslashes($_POST['address']),
         'latitude'  =>  $_POST['latitude'],
         'longitude'  =>  $_POST['longitude'],
		 'cityid'  =>  $_POST['cityid'],
		 'open'  =>  $_POST['open'],
		 'closed'  =>  $_POST['closed'],
		 'images'  =>  $image,
		 'cid'  =>  $_POST['cid'],
		 'featured'  =>  $_POST['featured'],
		 'status'  =>  $_POST['status'],
		 'userid'  => $_POST['userid']
          ); 
	 } else {
		 
		 $data = array( 
         'name'  =>  $_POST['name'],
		 'description'  =>  addslashes($_POST['description']),
         'phone'  =>  $_POST['phone'],
         'tags'  =>  $_POST['tags'],
		 'address'  =>  addslashes($_POST['address']),
         'latitude'  =>  $_POST['latitude'],
         'longitude'  =>  $_POST['longitude'],
		 'cityid'  =>  $_POST['cityid'],
		 'open'  =>  $_POST['open'],
		 'closed'  =>  $_POST['closed'],
		 'cid'  =>  $_POST['cid'],
		 'featured'  =>  $_POST['featured'],
		 'status'  =>  $_POST['status'],
		 'userid'  => $_POST['userid']
          ); 
	 }
     

 
    $news_edit=Insert('stores', $data);

    $place_id=$_POST['storeid'];
  
		$_SESSION['msg']="10";
 
		header( "Location:stores.php");
		exit;	

		
	}
	 

?>