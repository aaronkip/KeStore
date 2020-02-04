<?php include("includes/header.php");
include("includes/function.php");
require("language/language.php");

if(isset($_POST['user_search']))
	 {
		 
		
		$user_qry="SELECT * FROM category
		WHERE category.cname like '%".addslashes($_POST['search_value'])."%' ORDER BY category.cid DESC";  
							 
		$users_result=mysqli_query($conn,$user_qry);
		
		 
	 }
	 else
	 {	
$table_name="category";		
$target_page = "category.php"; 	
$limit = 6; 
							
$query = "SELECT COUNT(*) as num FROM $table_name";
$total_pages = mysqli_fetch_array(mysqli_query($conn,$query));
$total_pages = $total_pages['num']; 

$stages = 8;
$page=0;
if(isset($_GET['page'])){
$page = mysqli_real_escape_string($conn,$_GET['page']);
}
if($page){
$start = ($page - 1) * $limit; 
}else{
$start = 0;	
}	
$user_qry="SELECT * FROM category
ORDER BY cid ASC LIMIT $start, $limit";  
$users_result=mysqli_query($conn,$user_qry);
}

if(isset($_GET['cid']))
	{
		
		Delete('category','cid='.$_GET['cid'].'');
		
		$_SESSION['msg']="12";
		header( "Location:category.php");
		exit;
	}


?>       

