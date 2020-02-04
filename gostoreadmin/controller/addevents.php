<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

$user_qry="SELECT * FROM users ORDER BY fullname";
  $user_result=mysqli_query($conn,$user_qry); 
  
  $stores_qry="SELECT * FROM stores ORDER BY name";
  $stores_result=mysqli_query($conn,$stores_qry); 
  
  
  if(isset($_GET['eventid']))
  {
       
      $qry="SELECT * FROM event where eventid='".$_GET['eventid']."'";
      $result=mysqli_query($conn,$qry);
      $row=mysqli_fetch_assoc($result);
       
  }
	
	if(isset($_POST['submit']))
	{
      
     if($_FILES['eimage']['name']!="")
     {
        
          $file_name= str_replace(" ","-",$_FILES['eimage']['name']);

         $image=rand(0,99999)."_".$file_name;
           
         //Main Image
         $tpath1='images/events/'.$image;       
         $pic1=compress_image($_FILES["eimage"]["tmp_name"], $tpath1, 60);
         
          
              
        $data = array( 
		'storeid'  =>  $_POST['storeid'],
         'eventname'  =>  $_POST['eventname'],
		 'eaddress'  =>  addslashes($_POST['eaddress']),
         'elatitude'  =>  $_POST['elatitude'],
         'elongitude'  =>  $_POST['elongitude'],
		 'eimage'  =>  $image,
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'edescription'  =>  addslashes($_POST['edescription']),
         'etags'  =>  $_POST['etags'],
		 'status'  =>  $_POST['status']
		 
          ); 
	 } else {
	 
	 $data = array( 
         'eventname'  =>  $_POST['eventname'],
		 'eaddress'  =>  addslashes($_POST['eaddress']),
         'elatitude'  =>  $_POST['elatitude'],
         'elongitude'  =>  $_POST['elongitude'],
		 'eimage'  =>  $image,
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'edescription'  =>  addslashes($_POST['edescription']),
         'etags'  =>  $_POST['etags'],
		 'status'  =>  $_POST['status']
		 
          );
	 }

 
    $news_edit=Insert('event', $data);

    $place_id=$_POST['eventid'];

 	    
		$_SESSION['msg']="11";
 
		header( "Location:events.php");
		exit;	

		
	}
	 

?>