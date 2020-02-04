<?php include("includes/header.php");
include("includes/function.php");
require("language/language.php");

if(isset($_POST['user_search']))
{

		$user_qry="SELECT * FROM event 
		WHERE event.eventname like '%".addslashes($_POST['search_value'])."%' ORDER BY event.eventid DESC";  
							 
		$users_result=mysqli_query($conn,$user_qry);
		
		 
	 }
	 else
	 {	
 
 $table_name="event";		
$target_page = "events.php"; 	
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
	
$user_qry="SELECT * FROM event
ORDER BY eventid DESC LIMIT $start, $limit";  
$users_result=mysqli_query($conn,$user_qry);
	 }



if(isset($_GET['nonactive']))
{
  $data = array('status'  =>  '0');
  
  $edit_status=Update('event', $data, "WHERE eventid = '".$_GET['nonactive']."'");
  
   $_SESSION['msg']="16";
   header( "Location:events.php");
   exit;
}
if(isset($_GET['active']))
{
  $data = array('status'  =>  '1');
  
  $edit_status=Update('event', $data, "WHERE eventid = '".$_GET['active']."'");
  
  $_SESSION['msg']="15";
   header( "Location:events.php");
   exit;
}

if(isset($_GET['eventid']))
	{
		
		Delete('event','eventid='.$_GET['eventid'].'');
		
		$_SESSION['msg']="12";
		header( "Location:events.php");
		exit;
	}

?>       

