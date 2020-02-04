<?php include("includes/header.php");
include("includes/function.php");
require("language/language.php");

 function get_user($userid)
	 {
	 	global $conn;

	 	 
	 	$user_qry="SELECT * FROM users where userid='".$userid."'";
		$user_result=mysqli_query($conn,$user_qry);
		$user_row=mysqli_fetch_assoc($user_result);

		return $user_row['fullname'];
	 }
	 
	 function get_user_image($userid)
	 {
	 	global $conn;

	 	 
	 	$user_qry="SELECT * FROM users where userid='".$userid."'";
		$user_result=mysqli_query($conn,$user_qry);
		$user_row=mysqli_fetch_assoc($user_result);

		return $user_row['imageprofile'];
	 }
	 function get_store($storeid)
	 {
	 	global $conn;

	 	 
	 	$user_qry="SELECT * FROM stores where storeid='".$storeid."'";
		$user_result=mysqli_query($conn,$user_qry);
		$user_row=mysqli_fetch_assoc($user_result);

		return $user_row['name'];
	 }
	 
 $table_name="rating";		
$target_page = "review.php"; 	
$limit = 10; 
							
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
	
$user_qry="SELECT * FROM rating
ORDER BY id DESC LIMIT $start, $limit";  
$users_result=mysqli_query($conn,$user_qry);


if(isset($_GET['id']))
	{
		
		Delete('rating','id='.$_GET['id'].'');
		
		$_SESSION['msg']="12";
		header( "Location:review.php");
		exit;
	}

?>       

