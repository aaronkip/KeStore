<?php include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	 
	
	if(isset($_SESSION['id']))
	{
			 
		$qry="select * from admin where id='".$_SESSION['id']."'";
		 
		$result=mysqli_query($conn,$qry);
		$row=mysqli_fetch_assoc($result);

	}
	if(isset($_POST['submit']))
	{
		if($_FILES['image']['name']!="")
		 {		


				$img_res=mysqli_query($conn,'SELECT * FROM admin WHERE id='.$_SESSION['id'].'');
			    $img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['image']!="")
		        {
					 
					     unlink('asset/images/'.$img_res_row['image']);
			     }

 				   $image="profile.png";
				   $pic1=$_FILES['image']['tmp_name'];
				   $tpath1='asset/images/'.$image;
					
					copy($pic1,$tpath1);
 
					$data = array( 
							    'username'  =>  $_POST['username'],
							    'password'  =>  $_POST['password'],
							    'email'  =>  $_POST['email'],
							    'image'  =>  $image
							    );
					
					$edit=Update('admin', $data, "WHERE id = '".$_SESSION['id']."'"); 

		 }
		 else
		 {
					$data = array( 
							    'username'  =>  $_POST['username'],
							    'password'  =>  $_POST['password'],
							    'email'  =>  $_POST['email'] 
							    );
					
					$edit=Update('admin', $data, "WHERE id = '".$_SESSION['id']."'"); 
		}

		$_SESSION['msg']="11"; 
		header( "Location:profile.php");
		exit;
		 
	}


?>
 
