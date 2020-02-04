<?php include("includes/header.php");
include("includes/function.php");
require("language/language.php");

if(isset($_POST['user_search']))
{

		$user_qry="SELECT * FROM offers 
		WHERE offers.offersname like '%".addslashes($_POST['search_value'])."%' ORDER BY offers.offerid DESC";  
							 
		$users_result=mysqli_query($conn,$user_qry);
		
		 
	 }
	 else
	 {	
 
 $table_name="offers";		
$target_page = "offers.php"; 	
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
	
$user_qry="SELECT * FROM offers
ORDER BY offerid DESC LIMIT $start, $limit";  
$users_result=mysqli_query($conn,$user_qry);
	 }



if(isset($_GET['nonactive']))
{
  $data = array('status'  =>  '0');
  
  $edit_status=Update('offers', $data, "WHERE offerid = '".$_GET['nonactive']."'");
  
   $_SESSION['msg']="16";
   header( "Location:offers.php");
   exit;
}
if(isset($_GET['active']))
{
  $data = array('status'  =>  '1');
  
  $edit_status=Update('offers', $data, "WHERE offerid = '".$_GET['active']."'");
  
  $_SESSION['msg']="15";
   header( "Location:offers.php");
   exit;
}

if(isset($_GET['offerid']))
	{
		
		Delete('offers','offerid='.$_GET['offerid'].'');
		
		$_SESSION['msg']="12";
		header( "Location:offers.php");
		exit;
	}

?>       

