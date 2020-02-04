<?php
		$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
		
		if(isset($_GET['settingapp']))
		{
		require_once("includes/config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		$array_out= array();	

		$query="SELECT * FROM settings WHERE id='1'";
		$sql = mysqli_query($conn,$query)or die(mysqli_error());
		if(mysqli_num_rows($sql))
			{   
			    
                
			    $rd = mysqli_fetch_object($sql);

		$array_out = array();
					
        		 $array_out[] = 
        			array(
					"app_author" => $rd->app_author,
        			"app_contact" => $rd->app_contact,
        			"app_email" => $rd->app_email,
        			"app_website" => $rd->app_website,
        			"app_description" => $rd->app_description,
					"app_version" => $rd->app_version,
					"ghipy_api" => $rd->ghipy_api,
        			"app_privacy_policy" => $rd->app_privacy_policy
        			);
        		
        		$output=array( "code" => "200", "msg" => $array_out);
        		print_r(json_encode($output, true));
		
			} else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in updating");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
    
		}
		else
		if(isset($_GET['signup']))
		{
		require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		
		if(isset($event_json['userid']) && isset($event_json['fullname']))
		{
			$userid=htmlspecialchars(strip_tags($event_json['userid'] , ENT_QUOTES));
			$fullname=htmlspecialchars(strip_tags($event_json['fullname'] , ENT_QUOTES));
			$imageprofile=htmlspecialchars_decode(stripslashes($event_json['imageprofile']));
		    
           
			$log_in="select * from users where userid='".$userid."'";
			$log_in_rs=mysqli_query($conn,$log_in);
			
			if(mysqli_num_rows($log_in_rs))
			{   
			    $rd=mysqli_fetch_object($log_in_rs);
			    
				$array_out = array();
				 $array_out[] = 
					//array("code" => "200");
					array(
						"userid" => $userid,
						"action" => "login",
						"imageprofile" => $imageprofile,
						"fullname" => $fullname
					);
				
				$output=array( "code" => "200", "msg" => $array_out);
				print_r(json_encode($output, true));
			}	
			else
			{
			    $qrry_1="insert into users(userid,fullname,imageprofile)values(";
    			$qrry_1.="'".$userid."',";
    			$qrry_1.="'".$fullname."',";
    			$qrry_1.="'".$imageprofile."'";
    			$qrry_1.=")";
    			if(mysqli_query($conn,$qrry_1))
    			{
    				 $array_out = array();
    				 $array_out[] = 
    					//array("code" => "200");
    					array(
    						"userid" => $userid,
    						"action" => "signup",
    						"fullname" => $fullname,
    						"imageprofile" => $imageprofile
    					);
    				
    				$output=array( "code" => "200", "msg" => $array_out);
    				print_r(json_encode($output, true));
    			}
    			else
    			{
    			    //echo mysqli_error();
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"problem in signup");
            		
            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			}	
						
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
		}
		else
		if(isset($_GET['userdata']))
		{
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
		if(isset($event_json['userid']))
		{
			$userid=htmlspecialchars(strip_tags($event_json['userid'] , ENT_QUOTES));
			
			
			$qrry_1="select * from users WHERE userid ='".$userid."' ";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			if(mysqli_num_rows($log_in_rs))
			{   
			    
                
			    $rd=mysqli_fetch_object($log_in_rs);
                    
                    
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
					
        			"fullname" => $rd->fullname,
        			"imageprofile" => htmlspecialchars_decode(stripslashes($rd->imageprofile)),
        			);
        		
        		$output=array( "code" => "200", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in updating");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
		}
		else
		if(isset($_GET['deleteImages']))
		{
		require_once("includes/config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['userid']) && isset($event_json['image_link']))
		{
			$userid=htmlspecialchars(strip_tags($event_json['userid'] , ENT_QUOTES));
			$image_link=stripslashes(strip_tags($event_json['image_link'] ));
			
			
			mysqli_query($conn,"update users where userid='".$userid."'");
				
	    	$qrry_1="select * from users WHERE userid ='".$userid."' and imageprofile='".$image_link."'";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			if(mysqli_num_rows($log_in_rs))
			{
			    $rd=mysqli_fetch_object($log_in_rs);
			    if($rd->imageprofile==$image_link)
			    {
			        $colum_name="imageprofile";
			    }
			    
			    
			    
			    $qrry_1="update users SET $colum_name ='' WHERE userid ='".$userid."'";
    			if(mysqli_query($conn,$qrry_1))
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"success");
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
    			else
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"problem in delete");
            		
            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			} 
			
			
		}
		else
		{
			$array_out = array();
					
					 $array_out[] = 
						array(
						"response" =>"Json Parem are missing");
					
					$output=array( "code" => "201", "msg" => $array_out);
					print_r(json_encode($output, true));
		}
		
	}
	else
		if(isset($_GET['uploadImages']))
		{
		require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['userid']) && isset($event_json['image_link']) )
		{
			$userid=htmlspecialchars(strip_tags($event_json['userid'] , ENT_QUOTES));
			$image_link=stripslashes(strip_tags($event_json['image_link']));
		
			
			$qrry_1="select * from users WHERE users.userid ='".$userid."'";
			$log_in_rs=mysqli_query($conn,$qrry_1);
			
			if(mysqli_num_rows($log_in_rs))
			{
			    $rd=mysqli_fetch_object($log_in_rs);
			    if($rd->imageprofile=="")
			    {
			        $colum_name="imageprofile";
			    }
			    
			    
			    
			    $qrry_1="update users SET $colum_name ='".$image_link."' WHERE userid ='".$userid."' ";
    			if(mysqli_query($conn,$qrry_1))
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"success");
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
    			else
    			{
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"response" =>"problem in uploading");
            		
            		$output=array( "code" => "201", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			}   	
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
	}
		else
		if(isset($_GET['homefeatured']))
		{
	    
	    require_once("includes/config.php");
		include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
	    $latitude = $_GET['user_lat'];
	    $longitude = $_GET['user_long'];  

	        $query="SELECT * FROM stores
				LEFT JOIN category ON category.cid= stores.cid
				WHERE stores.status=1
				AND stores.featured=1
				ORDER BY rate DESC LIMIT 5";
				
				
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
			
		{
			
			$INoneKM= Distance($latitude,$longitude,$rd->latitude,$rd->longitude, "K");
			$underONE_KM=explode(".",$INoneKM);
			
				
		    $array_out[] = 
				array(
					"storeid" => $rd->storeid,
        			"cid" => $rd->cid,
					"cname" => $rd->cname,
					"name" => $rd->name,
					"cimage" => $file_path.'images/category/'.$rd->cimage,
					"distance" => $underONE_KM[0]." KM",					
					"latitude" => $rd->latitude,
					"longitude" => $rd->longitude,
					"rate" => $rd->rate,
					"images" => $file_path.'images/stores/'.$rd->images,
					"address" => htmlspecialchars(strip_tags($rd->address , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['storeid']))
		{
	    
	    require_once("includes/config.php");
		include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
	    $latitude = $_GET['user_lat'];
	    $longitude = $_GET['user_long'];  

	        $query="SELECT * FROM stores
				LEFT JOIN category ON category.cid= stores.cid
				LEFT JOIN users ON users.userid= stores.userid
				LEFT JOIN city ON city.cityid= stores.cityid
				WHERE storeid='".$_GET['storeid']."'";


    	$timestamp = time();
		
	    $log_in_rs=mysqli_query($conn,$query);
	    $array_out = array();
			
			
		while($data = mysqli_fetch_assoc($log_in_rs))
		{
			
			$INoneKM= Distance($latitude,$longitude,$data['latitude'],$data['longitude'], "K");
			$underONE_KM=explode(".",$INoneKM);
			$row['storeid'] = $data['storeid'];
 			$row['name'] = $data['name'];
 			$row['description'] = stripslashes($data['description']);
 			$row['phone'] = $data['phone'];
			$row['tags'] = $data['tags'];
 			$row['address'] = stripslashes($data['address']);
 			$row['latitude'] = $data['latitude'];
   			$row['longitude'] = $data['longitude'];
   			
  		 	$row['cityid'] = $data['cityid'];
			$row['cityname'] = $data['cityname'];
			
			$row['closed'] = $data['closed'];
			$row['open'] = $data['open'];
			
		 	$row['images'] = $file_path.'images/stores/'.$data['images'];
   			$row['distance'] = $underONE_KM[0]." KM";

			$row['rate'] = $data['rate'];

			$row['cid'] = $data['cid'];
			$row['cname'] = $data['cname'];
			
			$row['userid'] = $data['userid'];
			$row['fullname'] = $data['fullname'];
			$row['imageprofile'] = $data['imageprofile'];
			

			$qry_offers="SELECT * FROM offers WHERE storeid='".$_GET['storeid']."'";
		      $result_offers=mysqli_query($conn,$qry_offers); 

		      if($result_offers->num_rows > 0)
		      {
		      		while ($row_offers=mysqli_fetch_array($result_offers)) {
						$row_offers1['storeid'] = $data['storeid'];
						$row_offers1['offerid'] = $row_offers['offerid'];
						$row_offers1['name'] = $row_offers['offersname'];
						$row_offers1['price'] = $row_offers['price'];
						$row_offers1['address'] = $row_offers['oaddress'];
		 		      	$row_offers1['image'] = $file_path.'images/offers/'.$row_offers['image'];
						$row['offers'][]= $row_offers1;
				      }
		      }
		      else
		      {	
		      	$row['offers'][]= 'nodata';
		      }
			  			
				
			  $qry_event="SELECT * FROM event WHERE storeid='".$_GET['storeid']."'";
		      $result_event=mysqli_query($conn,$qry_event);
			  
		      if($result_event->num_rows > 0)
		      {
				  
		      		while ($row_event=mysqli_fetch_array($result_event)) {
						$dateStart = $row_event['datestart'];
						$newDatestart = date("d F Y", strtotime($dateStart));
						$row_event1['storeid'] = $data['storeid'];
						$row_event1['eventid'] = $row_event['eventid'];
						$row_event1['name'] = $row_event['eventname'];
						$row_event1['datestart'] = $newDatestart;
						$row_event1['address'] = $row_event['eaddress'];
		 		      	$row_event1['image'] = $file_path.'images/events/'.$row_event['eimage'];
						$row['events'][]= $row_event1;
				      }
		      }
		      else
		      {	
		      	$row['events'][]= 'nodata';
		      }
			array_push($array_out,$row);
		
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['offerid']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true); 

		

	        $query="SELECT * FROM offers
				LEFT JOIN stores ON stores.storeid= offers.storeid
				WHERE offers.offerid='".$_GET['offerid']."'";

		
	    $log_in_rs=mysqli_query($conn,$query);
	    $array_out = array();
			
			
		while($data = mysqli_fetch_assoc($log_in_rs))
		{
			$dateStart = $data['datestart'];
			$newDateStart = date("d F Y", strtotime($dateStart));
			$dateEnd = $data['dateend'];
			$newDateEnd = date("d F Y", strtotime($dateEnd));
				
			$row['offerid'] = $data['offerid'];
 			$row['name'] = $data['offersname'];
 			$row['description'] = stripslashes($data['odescription']);
			$row['address'] = stripslashes($data['oaddress']);
 			$row['latitude'] = $data['olatitude'];
   			$row['longitude'] = $data['olongitude'];
			$row['tags'] = $data['otags'];
			$row['date'] = $newDateStart;
			$row['dateend'] = $newDateEnd;
			$row['price'] = $data['price'];
			$row['userid'] = $data['userid'];			
			$row['image'] = $file_path.'images/offers/'.$data['image'];
			$qry_users="SELECT COUNT(*) as num FROM offersinterest WHERE offersinterest.offerid='".$_GET['offerid']."'";
			$total_users= mysqli_fetch_array(mysqli_query($conn,$qry_users));
			$row['interested'] = $total_users['num'];	
			$row['storeid'] = $data['storeid'];
			$row['storename'] = $data['name'];
			array_push($array_out,$row);
		
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['eventid']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true); 

		

	        $query="SELECT * FROM event
				LEFT JOIN stores ON stores.storeid= event.storeid
				WHERE event.eventid='".$_GET['eventid']."'";

		
	    $log_in_rs=mysqli_query($conn,$query);
	    $array_out = array();
			
			
		while($data = mysqli_fetch_assoc($log_in_rs))
		{
			$dateStart = $data['datestart'];
			$newDateStart = date("d F Y", strtotime($dateStart));
			$dateEnd = $data['dateend'];
			$newDateEnd = date("d F Y", strtotime($dateEnd));
				
			$row['eventid'] = $data['eventid'];
			$row['userid'] = $data['userid'];
 			$row['name'] = $data['eventname'];
 			$row['description'] = stripslashes($data['edescription']);
			$row['address'] = stripslashes($data['eaddress']);
 			$row['latitude'] = $data['elatitude'];
   			$row['longitude'] = $data['elongitude'];
			$row['tags'] = $data['etags'];
			$row['date'] = $newDateStart;
			$row['dateend'] = $newDateEnd;		
			$row['image'] = $file_path.'images/events/'.$data['eimage'];
			$qry_users="SELECT COUNT(*) as num FROM participateevent WHERE participateevent.eventid='".$_GET['eventid']."'";
			$total_users= mysqli_fetch_array(mysqli_query($conn,$qry_users));
			$row['participate'] = $total_users['num'];	
			$row['storeid'] = $data['storeid'];
			$row['storename'] = $data['name'];
			array_push($array_out,$row);
		
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['homecategory']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $query="SELECT cid,cname,cimage FROM category ORDER BY category.cid LIMIT 4";
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
		    
		    $array_out[] = 
				array(
					"cid" => $rd->cid,
					"cname" => $rd->cname,
					"cimage" => $file_path.'images/category/'.$rd->cimage
        			
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['allcategory']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $query="SELECT cid,cname,cimage FROM category ORDER BY category.cid";
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
		    
		    $array_out[] = 
				array(
					"cid" => $rd->cid,
					"cname" => $rd->cname,
					"cimage" => $file_path.'images/category/'.$rd->cimage
        			
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
	if(isset($_GET['homeevents']))
		{
	    
	    require_once("includes/config.php");
		include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
	    $latitude = $_GET['user_lat'];
	    $longitude = $_GET['user_long']; 

	        $query="SELECT *, DATEDIFF(`datestart`, CURDATE()) AS diff  FROM `event`
					order by CASE WHEN diff < 0 THEN 1 ELSE 0 END, diff LIMIT 5";
				
				
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
			
			$dateStart = $rd->datestart;
			$newDatestart = date("d F Y", strtotime($dateStart));
			
			
			$INoneKM= Distance($latitude,$longitude,$rd->latitude,$rd->longitude, "K");
			$underONE_KM=explode(".",$INoneKM);
  
		    $array_out[] = 
				array(
					"eventid" => $rd->eventid,
					"storeid" => $rd->storeid,
					"name" => $rd->eventname,
					"distance" => $underONE_KM[0],					
					"latitude" => $rd->elatitude,
					"longitude" => $rd->elongitude,
					"datestart" => "$newDatestart",
					"image" => $file_path.'images/events/'.$rd->eimage,
					"address" =>  htmlspecialchars(strip_tags($rd->eaddress , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	else
	if(isset($_GET['allevents']))
		{
	    
	    require_once("includes/config.php");
		include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
	    $latitude = $_GET['user_lat'];
	    $longitude = $_GET['user_long']; 

	        $query="SELECT *, DATEDIFF(`datestart`, CURDATE()) AS diff  FROM `event`
					order by CASE WHEN diff < 0 THEN 1 ELSE 0 END, diff";
				
				
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
			
			$datestart = $rd->datestart;
			$newDatestart = date("d F Y", strtotime($datestart));
			
			
			$INoneKM= Distance($latitude,$longitude,$rd->latitude,$rd->longitude, "K");
			$underONE_KM=explode(".",$INoneKM);
  
		    $array_out[] = 
				array(
					"eventid" => $rd->eventid,
					"storeid" => $rd->storeid,
					"name" => $rd->eventname,
					"distance" => $underONE_KM[0],					
					"latitude" => $rd->elatitude,
					"longitude" => $rd->elongitude,
					"datestart" => "$newDatestart",
					"image" => $file_path.'images/events/'.$rd->eimage,
					"address" => htmlspecialchars(strip_tags($rd->eaddress , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	else
		if(isset($_GET['distance']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $latitude = $_GET['user_lat'];
	        $longitude = $_GET['user_long'];

	        $earthRadius = '6371.0'; // In miles(3959)  
	        

	        $query = mysqli_query($conn,"
	                SELECT p.*,c.*,
	                    ROUND(
	                        $earthRadius * ACOS(  
	                            SIN( $latitude*PI()/180 ) * SIN( latitude*PI()/180 )
	                            + COS( $latitude*PI()/180 ) * COS( latitude*PI()/180 )  *  COS( (longitude*PI()/180) - ($longitude*PI()/180) )   ) 
	                    , 0)
	                    AS distance                              
	                                      
	                FROM
	                    stores p,category c
	                WHERE p.cid= c.cid AND p.status='1'         
	                ORDER BY
	                    distance");	

	    $array_out = array();
	    while($rd=mysqli_fetch_object($query))
		{
		    
		    $array_out[] = 
				array(
					"storeid" => $rd->storeid,
        			"cid" => $rd->cid,
					"cname" => $rd->cname,
					"name" => $rd->name,
					"cimage" => $file_path.'images/category/'.$rd->cimage,
					"distance" => $rd->distance." KM",					
					"latitude" => $rd->latitude,
					"longitude" => $rd->longitude,
					"rate" => $rd->rate,
					"images" => $file_path.'images/stores/'.$rd->images,
					"address" => htmlspecialchars(strip_tags($rd->address , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	else
		if(isset($_GET['byrating']))
		{
	    
	    require_once("includes/config.php");
		include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
	    $latitude = $_GET['user_lat'];
	    $longitude = $_GET['user_long'];  

	        $query="SELECT * FROM stores
				LEFT JOIN category ON category.cid= stores.cid
				WHERE stores.status=1
				ORDER BY stores.rate DESC";
				
				
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
			
		{
			
			$INoneKM= Distance($latitude,$longitude,$rd->latitude,$rd->longitude, "K");
			$underONE_KM=explode(".",$INoneKM);
			
				
		    $array_out[] = 
				array(
					"storeid" => $rd->storeid,
        			"cid" => $rd->cid,
					"cname" => $rd->cname,
					"name" => $rd->name,
					"cimage" => $file_path.'images/category/'.$rd->cimage,
					"distance" => $underONE_KM[0]." KM",					
					"latitude" => $rd->latitude,
					"longitude" => $rd->longitude,
					"rate" => $rd->rate,
					"images" => $file_path.'images/stores/'.$rd->images,
					"address" => htmlspecialchars(strip_tags($rd->address , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	else
	if(isset($_GET['homeoffers']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $latitude = $_GET['user_lat'];
	        $longitude = $_GET['user_long'];

	        $earthRadius = '6371.0'; // In miles(3959)  
	        

	        $query = mysqli_query($conn,"
	                SELECT o.*,
	                    ROUND(
	                        $earthRadius * ACOS(  
	                            SIN( $latitude*PI()/180 ) * SIN( olatitude*PI()/180 )
	                            + COS( $latitude*PI()/180 ) * COS( olatitude*PI()/180 )  *  COS( (olongitude*PI()/180) - ($longitude*PI()/180) )   ) 
	                    , 0)
	                    AS distance                              
	                                      
	                FROM
	                    offers o
	                WHERE o.status='1'         
	                ORDER BY
	                    distance LIMIT 5");	

		
	    $array_out = array();
	    while($rd=mysqli_fetch_object($query))
		{
		    
		    $array_out[] = 
				array(
					"offerid" => $rd->offerid,
					"name" => $rd->offersname,
					"price" => $rd->price,
					"distance" => $rd->distance." KM",					
					"latitude" => $rd->olatitude,
					"longitude" => $rd->olongitude,
					"image" => $file_path.'images/offers/'.$rd->image,
					"address" => htmlspecialchars(strip_tags($rd->oaddress , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
	if(isset($_GET['alloffers']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $latitude = $_GET['user_lat'];
	        $longitude = $_GET['user_long'];

	        $earthRadius = '6371.0'; // In miles(3959)  
	        

	        $query = mysqli_query($conn,"
	                SELECT o.*,
	                    ROUND(
	                        $earthRadius * ACOS(  
	                            SIN( $latitude*PI()/180 ) * SIN( olatitude*PI()/180 )
	                            + COS( $latitude*PI()/180 ) * COS( olatitude*PI()/180 )  *  COS( (olongitude*PI()/180) - ($longitude*PI()/180) )   ) 
	                    , 0)
	                    AS distance                              
	                                      
	                FROM
	                    offers o
	                WHERE o.status='1'         
	                ORDER BY
	                    distance");	
	    $array_out = array();
	    while($rd=mysqli_fetch_object($query))
		{
		    
		    $array_out[] = 
				array(
					"offerid" => $rd->offerid,
					"name" => $rd->offersname,
					"price" => $rd->price,
					"distance" => $rd->distance." KM",					
					"latitude" => $rd->olatitude,
					"longitude" => $rd->olongitude,
					"image" => $file_path.'images/offers/'.$rd->image,
					"address" => htmlspecialchars(strip_tags($rd->oaddress , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
		else
		if(isset($_GET['allstore']))
		{
	    
	    require_once("includes/config.php");
		include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $latitude = $_GET['user_lat'];
	        $longitude = $_GET['user_long']; 

	        $query="SELECT * FROM stores
				LEFT JOIN category ON category.cid= stores.cid
				WHERE stores.status=1
				ORDER BY storeid DESC";
				
				
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
			$INoneKM= Distance($latitude,$longitude,$rd->latitude,$rd->longitude, "K");
			$underONE_KM=explode(".",$INoneKM);
  
		    $array_out[] = 
				array(
					"storeid" => $rd->storeid,
        			"cid" => $rd->cid,
					"cname" => $rd->cname,
					"name" => $rd->name,
					"cimage" => $file_path.'images/category/'.$rd->cimage,
					"distance" => $underONE_KM[0]." KM",					
					"latitude" => $rd->latitude,
					"longitude" => $rd->longitude,
					"rate" => $rd->rate,
					"images" => $file_path.'images/stores/'.$rd->images,
					"address" => htmlspecialchars(strip_tags($rd->address , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['mystores']))
		{
	    
	    require_once("includes/config.php");
		include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $latitude = $_GET['user_lat'];
	        $longitude = $_GET['user_long']; 

	        $query="SELECT * FROM stores
				LEFT JOIN category ON category.cid= stores.cid
				WHERE stores.status=1
				AND stores.userid='".$_GET['mystores']."'
				ORDER BY storeid DESC";
				
				
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
			$INoneKM= Distance($latitude,$longitude,$rd->latitude,$rd->longitude, "K");
			$underONE_KM=explode(".",$INoneKM);
  
		    $array_out[] = 
				array(
					"storeid" => $rd->storeid,
        			"cid" => $rd->cid,
					"cname" => $rd->cname,
					"name" => $rd->name,
					"cimage" => $file_path.'images/category/'.$rd->cimage,
					"distance" => $underONE_KM[0]." KM",					
					"latitude" => $rd->latitude,
					"longitude" => $rd->longitude,
					"rate" => $rd->rate,
					"images" => $file_path.'images/stores/'.$rd->images,
					"address" => htmlspecialchars(strip_tags($rd->address , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['searchtext']))
		{
	    
	    require_once("includes/config.php");
		include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    $latitude = $_GET['user_lat'];
	    $longitude = $_GET['user_long'];
	    
				$query="SELECT * FROM stores
				LEFT JOIN category ON stores.cid= category.cid
				WHERE stores.status=1 
				AND stores.name LIKE '%".$_GET['searchtext']."%' 
				OR stores.address LIKE '%".$_GET['searchtext']."%'
				OR stores.tags LIKE '%".$_GET['searchtext']."%'	ORDER BY stores.name";
			

		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
			
			$INoneKM= Distance($latitude,$longitude,$rd->latitude,$rd->longitude, "K");
			$underONE_KM=explode(".",$INoneKM);
		    
		    $array_out[] = 
				array(
					"storeid" => $rd->storeid,
        			"cid" => $rd->cid,
					"cname" => $rd->cname,		
        			"name" => $rd->name,
        			"description" => $rd->description,
					"address" => htmlspecialchars(strip_tags($rd->address , ENT_QUOTES)),
					"distance" => $underONE_KM[0]." KM",
					"latitude" => $rd->latitude,
					"longitude" => $rd->longitude,
					"image" => $file_path.'images/stores/'.$rd->images,
					"status" => $rd->status,
					"rate" => $rd->rate,
					"featured" => $rd->featured
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['city']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $query="SELECT * FROM city ORDER BY city.cityid LIMIT 5";
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
		    
		    $array_out[] = 
				array(
					"cityid" => $rd->cityid,
					"cityname" => $rd->cityname,
					"cityimage" => $file_path.'images/city/'.$rd->cityimage
        			
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['cid']))
		{
	    
	    require_once("includes/config.php");
	    include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    $latitude = $_GET['user_lat'];
	    $longitude = $_GET['user_long'];
	    
	    $query_1="SELECT * FROM stores
				LEFT JOIN category ON category.cid= stores.cid
				WHERE stores.cid='".$_GET['cid']."'
				ORDER BY storeid DESC";
		
	    $log_in_rs1=mysqli_query($conn,$query_1);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
		    $INoneKM= Distance($latitude,$longitude,$rd->latitude,$rd->longitude, "K");
			$underONE_KM=explode(".",$INoneKM);
			
		    $array_out[] = 
				array(
					"storeid" => $rd->storeid,
        			"cid" => $rd->cid,
					"cname" => $rd->cname,
					"name" => $rd->name,
					"cimage" => $file_path.'images/category/'.$rd->cimage,
					"distance" => $underONE_KM[0]." KM",					
					"latitude" => $rd->latitude,
					"longitude" => $rd->longitude,
					"rate" => $rd->rate,
					"images" => $file_path.'images/stores/'.$rd->images,
					"address" => htmlspecialchars(strip_tags($rd->address , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['editprofile']))
		{
			
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		if(isset($event_json['userid']))
		{
			$userid=htmlspecialchars(strip_tags($event_json['userid'] , ENT_QUOTES));
			$fullname=htmlspecialchars(strip_tags($event_json['fullname'] , ENT_QUOTES));
			
			
			$qrry_1="update users SET fullname ='".$fullname."' WHERE userid ='".$userid."'";
			if(mysqli_query($conn,$qrry_1))
			{
			    $array_out = array();
				 
				$qrry_1="select * from users WHERE userid ='".$userid."'";
    			$log_in_rs=mysqli_query($conn,$qrry_1);
    			
    			if(mysqli_num_rows($log_in_rs))
    			{   
    			    
                    
    			    $rd=mysqli_fetch_object($log_in_rs);
    			    
    			    $array_out = array();
    					
            		 $array_out[] = 
            			array(
            			"fullname" => $rd->fullname,
            			"imageprofile" => htmlspecialchars_decode(stripslashes($rd->imageprofile)),
            			);
            		
            		$output=array( "code" => "200", "msg" => $array_out);
            		print_r(json_encode($output, true));
    			}
			
        		
			}
			else
			{
			    $array_out = array();
					
        		 $array_out[] = 
        			array(
        			"response" =>"problem in updating");
        		
        		$output=array( "code" => "201", "msg" => $array_out);
        		print_r(json_encode($output, true));
			}
			
		}
		else
		{
			$array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Json Parem are missing");
			
			$output=array( "code" => "201", "msg" => $array_out);
			print_r(json_encode($output, true));
		}
		}
		else
		if(isset($_GET['cityid']))
		{
	    
	    require_once("includes/config.php");
		include("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    $latitude = $_GET['user_lat'];
	    $longitude = $_GET['user_long'];  

	        $query="SELECT * FROM stores
				LEFT JOIN category ON category.cid= stores.cid
				LEFT JOIN users ON users.userid= stores.userid
				LEFT JOIN city ON city.cityid= stores.cityid
				WHERE stores.cityid='".$_GET['cityid']."'
				ORDER BY storeid DESC";
		
	    $log_in_rs1=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs1))
		{
		    
		    $INoneKM= Distance($latitude,$longitude,$rd->latitude,$rd->longitude, "K");
			$underONE_KM=explode(".",$INoneKM);
			
				
		    $array_out[] = 
				array(
					"storeid" => $rd->storeid,
        			"cid" => $rd->cid,
					"cname" => $rd->cname,
					"name" => $rd->name,
					"cimage" => $file_path.'images/category/'.$rd->cimage,
					"distance" => $underONE_KM[0]." KM",					
					"latitude" => $rd->latitude,
					"longitude" => $rd->longitude,
					"rate" => $rd->rate,
					"images" => $file_path.'images/stores/'.$rd->images,
					"address" => htmlspecialchars(strip_tags($rd->address , ENT_QUOTES)) 
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['interested']))
		{ 
	    require_once("includes/config.php");
		require_once("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $query1 = mysqli_query($conn,"select * from offersinterest where offerid='".$_GET['interested']."' && userid ='".$_GET['userid']."'"); 
    	while($data1 = mysqli_fetch_assoc($query1)){
    		$rate_db1[] = $data1;
    	}
    	if(@count($rate_db1) == 0 ){
			
    		   $data = array(            
               'offerid'  =>$_GET['interested'],
              'userid'  =>  $_GET['userid'],
               );  
			$qry = Insert('offersinterest',$data); 
     	
					//Total rate result
					 
				$query = mysqli_query($conn,"select * from offersinterest where storeid='".$_GET['interested']."'");
               
			   while($data = mysqli_fetch_assoc($query)){
                  	$rate_db[] = $data;
               
                }
				
                if(@count($rate_db)){
                    $rate_times = count($rate_db);
                }
				 
		
	    
    		echo '{"goestate":[{"msg":"Succesfully"}]}';
				
    	}else{
    						
				echo '{"goestate":[{"msg":"you are interested"}]}';
    	}
   
	}
	
	else
		if(isset($_GET['participate']))
		{ 
	    require_once("includes/config.php");
		require_once("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $query1 = mysqli_query($conn,"select * from participateevent where eventid='".$_GET['participate']."' && userid ='".$_GET['userid']."'"); 
    	while($data1 = mysqli_fetch_assoc($query1)){
    		$rate_db1[] = $data1;
    	}
    	if(@count($rate_db1) == 0 ){
			
    		   $data = array(            
               'eventid'  =>$_GET['participate'],
              'userid'  =>  $_GET['userid'],
               );  
			$qry = Insert('participateevent',$data); 
     	
					//Total rate result
					 
				$query = mysqli_query($conn,"select * from participateevent where eventid='".$_GET['participate']."'");
               
			   while($data = mysqli_fetch_assoc($query)){
                  	$rate_db[] = $data;
               
                }
				
                if(@count($rate_db)){
                    $rate_times = count($rate_db);
                }
				 
		
	    
    		echo '{"goestate":[{"msg":"Succesfully"}]}';
				
    	}else{
    						
				echo '{"goestate":[{"msg":"you are you have joined"}]}';
    	}
		}
		else
		if(isset($_GET['updatestores']))
		{
		require_once("includes/function.php");			
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
		if($_FILES['images']['name']!="")
     {
	    
	    $file_name= str_replace(" ","-",$_FILES['images']['name']);

     $image=rand(0,99999)."_".$file_name;
       
     //Main Image
     $tpath1='images/stores/'.$image;       
     $pic1=compress_image($_FILES["images"]["tmp_name"], $tpath1, 160);
   
      
          
       $data = array( 
         'name'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['name'])),
		 'description'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['description'])),
         'phone'  =>  $_POST['phone'],
         'tags'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['tags'])),
		 'address'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['address'])),
         'latitude'  =>  $_POST['latitude'],
         'longitude'  =>  $_POST['longitude'],
		 'cityid'  =>  $_POST['cityid'],
		 'open'  =>  $_POST['open'],
		 'closed'  =>  $_POST['closed'],
		 'images'  =>  $image,
		 'cid'  =>  $_POST['cid'],
		 'userid'  => $_POST['userid']
          ); 
	 } else {
		 
		 $data = array( 
         'name'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['name'])),
		 'description'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['description'])),
         'phone'  =>  $_POST['phone'],
         'tags'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['tags'])),
		 'address'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['address'])),
         'latitude'  =>  $_POST['latitude'],
         'longitude'  =>  $_POST['longitude'],
		 'cityid'  =>  $_POST['cityid'],
		 'open'  =>  $_POST['open'],
		 'closed'  =>  $_POST['closed'],
		 'cid'  =>  $_POST['cid'],
		 'userid'  => $_POST['userid']
          ); 
	 }
		 

    $qry =Update('stores', $data, "WHERE storeid= '".$_POST['storeid']."'");
  
	$set['200'][] =array( 'msg'=>'Stores has been update!','success'=>1);
	
		header( 'Content-Type: application/json; charset=utf-8' );
		echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
		
	}
	
	else
		if(isset($_GET['addstores']))
		{
		require_once("includes/function.php");			
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
		if($_FILES['images']['name']!="")
     {
	    
	    $file_name= str_replace(" ","-",$_FILES['images']['name']);

     $image=rand(0,99999)."_".$file_name;
       
     //Main Image
     $tpath1='images/stores/'.$image;       
     $pic1=compress_image($_FILES["images"]["tmp_name"], $tpath1, 160);
   
      
          
       $data = array( 
         'name'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['name'])),
		 'description'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['description'])),
         'phone'  =>  $_POST['phone'],
         'tags'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['tags'])),
		 'address'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['address'])),
         'latitude'  =>  $_POST['latitude'],
         'longitude'  =>  $_POST['longitude'],
		 'cityid'  =>  $_POST['cityid'],
		 'open'  =>  $_POST['open'],
		 'closed'  =>  $_POST['closed'],
		 'images'  =>  $image,
		 'cid'  =>  $_POST['cid'],
		 'userid'  => $_POST['userid'],
		 'status'  =>  1
          ); 
	 }
		 

    $qry =Insert('stores', $data);
  
	$set['200'][] =array( 'msg'=>'Stores has been added!','success'=>1);
	
		header( 'Content-Type: application/json; charset=utf-8' );
		echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
		
	}
	
	else
		if(isset($_GET['deletestore']))
		{
		require_once("includes/config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		mysqli_query($conn,"Delete from stores 
		where stores.userid = '".$_GET['userid']."' AND stores.storeid ='".$_GET['deletestore']."'");
		
		mysqli_query($conn,"Delete from offers
		where offers.storeid ='".$_GET['deletestore']."'");
		
		mysqli_query($conn,"Delete from event
		where event.storeid ='".$_GET['deletestore']."'");
	    
	    $array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Delete succesfully");
	        
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['addoffers']))
		{
		require_once("includes/function.php");			
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
		if($_FILES['image']['name']!="")
     {
	    
	    $file_name= str_replace(" ","-",$_FILES['image']['name']);

     $image=rand(0,99999)."_".$file_name;
       
     //Main Image
     $tpath1='images/offers/'.$image;       
     $pic1=compress_image($_FILES["image"]["tmp_name"], $tpath1, 160);
   
      
          
       $data = array( 
         'offersname'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['offersname'])),
		 'price'  =>  $_POST['price'],
		 'image'  =>  $image,
		 'storeid'  =>  $_POST['storeid'],
		 'userid'  => $_POST['userid'],
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'odescription'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['odescription'])),
         'otags'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['otags'])),
		 'oaddress'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['oaddress'])),
         'olatitude'  =>  $_POST['olatitude'],
         'olongitude'  =>  $_POST['olongitude'],
		 'status'  =>  1,
		 
          ); 
	 }
		 

    $qry =Insert('offers', $data);
  
	$set['200'][] =array( 'msg'=>'Offers has been added!','success'=>1);
	
		header( 'Content-Type: application/json; charset=utf-8' );
		echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
		
	}
	
	else
		if(isset($_GET['editoffers']))
		{
		require_once("includes/function.php");			
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
		if($_FILES['image']['name']!="")
     {
	    
	    $file_name= str_replace(" ","-",$_FILES['image']['name']);

     $image=rand(0,99999)."_".$file_name;
       
     //Main Image
     $tpath1='images/offers/'.$image;       
     $pic1=compress_image($_FILES["image"]["tmp_name"], $tpath1, 160);
   
      
          
       $data = array( 
         'offersname'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['offersname'])),
		 'price'  =>  $_POST['price'],
		 'image'  =>  $image,
		 'storeid'  =>  $_POST['storeid'],
		 'userid'  => $_POST['userid'],
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'odescription'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['odescription'])),
         'otags'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['otagsname'])),
		 'oaddress'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['oaddress'])),
         'olatitude'  =>  $_POST['olatitude'],
         'olongitude'  =>  $_POST['olongitude']
		 
          ); 
	 } else {
	 
	 $data = array( 
         'offersname'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['offersname'])),
		 'price'  =>  $_POST['price'],
		 'storeid'  =>  $_POST['storeid'],
		 'userid'  => $_POST['userid'],
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'odescription'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['odescription'])),
         'otags'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['otagsname'])),
		 'oaddress'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['oaddress'])),
         'olatitude'  =>  $_POST['olatitude'],
         'olongitude'  =>  $_POST['olongitude']
		 
          );
	 }
		 

    $qry =Update('offers', $data, "WHERE offerid= '".$_POST['offerid']."'");
  
	$set['200'][] =array( 'msg'=>'Offers has been Update!','success'=>1);
	
		header( 'Content-Type: application/json; charset=utf-8' );
		echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
		
	}
	
	else
		if(isset($_GET['offerdata']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true); 

		

	        $query="SELECT * FROM offers
				LEFT JOIN stores ON stores.storeid= offers.storeid
				WHERE offers.offerid='".$_GET['offerdata']."'";

		
	    $log_in_rs=mysqli_query($conn,$query);
	    $array_out = array();
			
			
		while($data = mysqli_fetch_assoc($log_in_rs))
		{
				
			$row['offerid'] = $data['offerid'];
 			$row['name'] = $data['offersname'];
 			$row['description'] = stripslashes($data['odescription']);
			$row['address'] = stripslashes($data['oaddress']);
 			$row['latitude'] = $data['olatitude'];
   			$row['longitude'] = $data['olongitude'];
			$row['tags'] = $data['otags'];
			$row['date'] = $data['datestart'];
			$row['dateend'] = $data['dateend'];
			$row['price'] = $data['price'];
			$row['userid'] = $data['userid'];			
			$row['image'] = $file_path.'images/offers/'.$data['image'];
			$qry_users="SELECT COUNT(*) as num FROM offersinterest WHERE offersinterest.offerid='".$_GET['offerdata']."'";
			$total_users= mysqli_fetch_array(mysqli_query($conn,$qry_users));
			$row['interested'] = $total_users['num'];	
			$row['storeid'] = $data['storeid'];
			$row['storename'] = $data['name'];
			array_push($array_out,$row);
		
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['deleteoffers']))
		{
		require_once("includes/config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		//print_r($event_json);
		//0= owner  1= company 2= ind mechanic
		
		
		mysqli_query($conn,"Delete from offers
		where offers.offerid ='".$_GET['deleteoffers']."'");
	    
	    $array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Delete succesfully");
	        
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['addevent']))
		{
		require_once("includes/function.php");			
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
		if($_FILES['eimage']['name']!="")
     {
	    
	    $file_name= str_replace(" ","-",$_FILES['eimage']['name']);

     $image=rand(0,99999)."_".$file_name;
       
     //Main Image
     $tpath1='images/events/'.$image;       
     $pic1=compress_image($_FILES["eimage"]["tmp_name"], $tpath1, 160);
   
      
          
       $data = array( 
         'eventname'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['eventname'])),
		 'storeid'  =>  $_POST['storeid'],
		 'userid'  => $_POST['userid'],
		 'eaddress'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['eaddress'])),
         'elatitude'  =>  $_POST['elatitude'],
         'elongitude'  =>  $_POST['elongitude'],
		 'eimage'  =>  $image,
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'edescription'  => preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['edescription'])),
         'etags'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['etags'])),
		 'status'  =>  1
		 
          ); 
	 }
		 

    $qry =Insert('event', $data);
  
	$set['200'][] =array( 'msg'=>'Event has been added!','success'=>1);
	
		header( 'Content-Type: application/json; charset=utf-8' );
		echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
		
	}
	else
		if(isset($_GET['editevent']))
		{
		require_once("includes/function.php");			
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
		if($_FILES['eimage']['name']!="")
     {
	    
	    $file_name= str_replace(" ","-",$_FILES['eimage']['name']);

     $image=rand(0,99999)."_".$file_name;
       
     //Main Image
     $tpath1='images/events/'.$image;       
     $pic1=compress_image($_FILES["eimage"]["tmp_name"], $tpath1, 160);
   
      
          
       $data = array( 
         'eventname'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['eventname'])),
		 'storeid'  =>  $_POST['storeid'],
		 'userid'  => $_POST['userid'],
		 'eaddress'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['eaddress'])),
         'elatitude'  =>  $_POST['elatitude'],
         'elongitude'  =>  $_POST['elongitude'],
		 'eimage'  =>  $image,
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'edescription'  => preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['edescription'])),
         'etags'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['etags']))
		 
          ); 
	 } else {
		 $data = array(
		 'eventname'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['eventname'])),
		 'storeid'  =>  $_POST['storeid'],
		 'userid'  => $_POST['userid'],
		 'eaddress'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['eaddress'])),
         'elatitude'  =>  $_POST['elatitude'],
         'elongitude'  =>  $_POST['elongitude'],
		 'datestart'  => $_POST['datestart'],
		 'dateend'  => $_POST['dateend'],
		 'edescription'  => preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['edescription'])),
         'etags'  =>  preg_replace("/[^a-zA-Z-z0-9-,-êàé]/", ' ',addslashes($_POST['etags']))
		 ); 
	 }
		 

    $qry = Update('event', $data, "WHERE eventid= '".$_POST['eventid']."'");
  
	$set['200'][] =array( 'msg'=>'Event has been update!','success'=>1);
	
		header( 'Content-Type: application/json; charset=utf-8' );
		echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
		
	}
	
	else
		if(isset($_GET['eventdata']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true); 

		

	        $query="SELECT * FROM event
				LEFT JOIN stores ON stores.storeid= event.storeid
				WHERE event.eventid='".$_GET['eventdata']."'";

		
	    $log_in_rs=mysqli_query($conn,$query);
	    $array_out = array();
			
			
		while($data = mysqli_fetch_assoc($log_in_rs))
		{
				
			$row['eventid'] = $data['eventid'];
			$row['userid'] = $data['userid'];
 			$row['name'] = $data['eventname'];
 			$row['description'] = stripslashes($data['edescription']);
			$row['address'] = stripslashes($data['eaddress']);
 			$row['latitude'] = $data['elatitude'];
   			$row['longitude'] = $data['elongitude'];
			$row['tags'] = $data['etags'];
			$row['date'] = $data['datestart'];
			$row['dateend'] = $data['dateend'];	
			$row['image'] = $file_path.'images/events/'.$data['eimage'];
			$qry_users="SELECT COUNT(*) as num FROM participateevent WHERE participateevent.eventid='".$_GET['eventdata']."'";
			$total_users= mysqli_fetch_array(mysqli_query($conn,$qry_users));
			$row['participate'] = $total_users['num'];	
			$row['storeid'] = $data['storeid'];
			$row['storename'] = $data['name'];
			array_push($array_out,$row);
		
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['deleteevent']))
		{
		require_once("includes/config.php");
		$input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
		
		
		mysqli_query($conn,"Delete from event
		where event.eventid ='".$_GET['deleteevent']."'");
		
		
	    
	    $array_out = array();
					
			 $array_out[] = 
				array(
				"response" =>"Delete succesfully");
	        
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	
	else
		if(isset($_GET['addreview']))
		{ 
	    require_once("includes/config.php");
		require_once("includes/function.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);
	    
	    
	    $query1 = mysqli_query($conn,"select * from rating 
		where storeid='".$_GET['addreview']."'
		&& userid ='".$_GET['userid']."' 
		&& review ='".$_GET['review']."'"); 
		
    	while($data1 = mysqli_fetch_assoc($query1)){
    		$rate_db1[] = $data1;
    	}
    	if(@count($rate_db1) == 0 ){
			
    		   $data = array(            
               'storeid'  =>$_GET['addreview'],
              'rate'  =>  $_GET['rate'],
              'userid'  => $_GET['userid'],
			  'review'  => $_GET['review'],
               );  
 	$qry = Insert('rating',$data); 
					 
				$query = mysqli_query($conn,"select * from rating where storeid='".$_GET['addreview']."'");
               
			   while($data = mysqli_fetch_assoc($query)){
                  	$rate_db[] = $data;
                    $sum_rates[] = $data['rate'];
               
                }
				
                if(@count($rate_db)){
                    $rate_times = count($rate_db);
                    $sum_rates = array_sum($sum_rates);
                    $rate_value = $sum_rates/$rate_times;
                    $rate_bg = (($rate_value)/5)*100;
                }else{
                    $rate_times = 0;
                    $rate_value = 0;
                    $rate_bg = 0;
                }
				 
				$rate_avg=round($rate_value); 
				
		  $sql="update stores set rate=rate + 1,rate='$rate_avg' where storeid='".$_GET['addreview']."'";
      mysqli_query($conn,$sql);
		
	    
    		echo '{"goestate":[{"msg":"You have succesfully","rate_avg":"'.$rate_avg.'"}]}';
				
    	}else{
    						
				echo '{"goestate":[{"msg":"You have already Review"}]}';
    	}
   
	}
   
	else
		if(isset($_GET['allreview']))
		{
	    
	    require_once("includes/config.php");
	    $input = @file_get_contents("php://input");
	    $event_json = json_decode($input,true);  

	        $query="SELECT * FROM rating
				LEFT JOIN users ON rating.userid= users.userid
				WHERE rating.storeid='".$_GET['allreview']."' ORDER by rating.id DESC";
				
				
		
	    $log_in_rs=mysqli_query($conn,$query);
	    $array_out = array();
	    while($rd=mysqli_fetch_object($log_in_rs))			
		{					
		    $array_out[] = 
				array(
					"storeid" => $rd->storeid,
					"userid" => $rd->userid,
					"fullname" => $rd->fullname,
					"imageprofile" => $rd->imageprofile,
        			"rate" => $rd->rate,
					"review" => $rd->review
					
				);
		}
	    
    	$output=array( "code" => "200", "msg" => $array_out);
		print_r(json_encode($output, true));
		
	}
	  
?>

