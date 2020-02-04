<?php include("includes/header.php");
include("includes/function.php");

$qry_users="SELECT COUNT(*) as num FROM users";
$total_users= mysqli_fetch_array(mysqli_query($conn,$qry_users));
$total_users = $total_users['num'];

$qry_stores="SELECT COUNT(*) as num FROM stores";
$total_stores = mysqli_fetch_array(mysqli_query($conn,$qry_stores));
$total_stores = $total_stores['num'];

$qry_offers="SELECT COUNT(*) as num FROM offers";
$total_offers = mysqli_fetch_array(mysqli_query($conn,$qry_offers));
$total_offers = $total_offers['num'];

$qry_event="SELECT COUNT(*) as num FROM event";
$total_event = mysqli_fetch_array(mysqli_query($conn,$qry_event));
$total_event = $total_event['num'];

$table_name="stores";		
$target_page = "home.php"; 	
$limit = 6; 
							
$query = "SELECT COUNT(*) as num FROM $table_name";
$total_pages = mysqli_fetch_array(mysqli_query($conn,$query));
$total_pages = $total_pages['num'];
if(isset($_POST['user_search']))
	 {
		 
		
		$user_qry="SELECT * FROM stores WHERE stores.name like '%".addslashes($_POST['search_value'])."%' ORDER BY store.storeid DESC";  
							 
		$users_result=mysqli_query($conn,$user_qry);
		
		 
	 }
	 else
	 {	
$table_name="stores";		
$target_page = "home.php"; 	
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
$user_qry="SELECT * FROM stores
LEFT JOIN category ON stores.cid= category.cid
LEFT JOIN city ON stores.cityid= city.cityid
ORDER BY storeid DESC LIMIT $start, $limit";  
$users_result=mysqli_query($conn,$user_qry);
	 }

if(isset($_GET['featurednonactive']))
{
  $data = array('featured'  =>  '0');
  
  $edit_status=Update('stores', $data, "WHERE storeid = '".$_GET['featurednonactive']."'");
  
   $_SESSION['msg']="16";
   header( "Location:home.php");
   exit;
}
if(isset($_GET['featuredactive']))
{
  $data = array('featured'  =>  '1');
  
  $edit_status=Update('stores', $data, "WHERE storeid = '".$_GET['featuredactive']."'");
  
  $_SESSION['msg']="15";
   header( "Location:home.php");
   exit;
}

if(isset($_GET['nonactive']))
{
  $data = array('status'  =>  '0');
  
  $edit_status=Update('stores', $data, "WHERE storeid = '".$_GET['nonactive']."'");
  
   $_SESSION['msg']="16";
   header( "Location:home.php");
   exit;
}
if(isset($_GET['active']))
{
  $data = array('status'  =>  '1');
  
  $edit_status=Update('stores', $data, "WHERE storeid = '".$_GET['active']."'");
  
  $_SESSION['msg']="15";
   header( "Location:home.php");
   exit;
}

if(isset($_GET['storeid']))
	{
		
		Delete('stores','storeid='.$_GET['storeid'].'');
		Delete('event','storeid='.$_GET['storeid'].'');
		Delete('rating','storeid='.$_GET['storeid'].'');
		Delete('offers','storeid='.$_GET['storeid'].'');
		
		$_SESSION['msg']="12";
		header( "Location:home.php");
		exit;
	}

?>       

