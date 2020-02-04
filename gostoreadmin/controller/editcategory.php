<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
 

  if(isset($_GET['cid']))
  {
       
      $qry="SELECT * FROM category where cid='".$_GET['cid']."'";
      $result=mysqli_query($conn,$qry);
      $row=mysqli_fetch_assoc($result);
       
  }
	
	if(isset($_POST['submit']))
	{
      
     if($_FILES['cimage']['name']!="")
     {
        
         $category_image=rand(0,99999)."_".$_FILES['cimage']['name'];
		 $pic1=$_FILES['cimage']['tmp_name'];

					
		 $tpath1='images/category/'.$category_image; 
		 copy($pic1,$tpath1);
         
          
              
           $data = array( 
				'cid'  =>  $_POST['cid'],
				'cname'  =>  $_POST['cname'],
				'cimage'  =>  $category_image
              );    
    

     }
     else
     {
            $data = array( 
				'cid'  =>  $_POST['cid'],
				'cname'  =>  $_POST['cname']
              );  
     }

 
    $news_edit=Update('category', $data, "WHERE cid = '".$_POST['cid']."'");

 	    
		$_SESSION['msg']="11";
 
		header( "Location:editcategory.php?cid=".$_POST['cid']);
		exit;	

		
	}
	
	 

?>