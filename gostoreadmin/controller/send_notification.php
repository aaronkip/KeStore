<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  if(isset($_POST['submit']))
  {

     if($_POST['external_link']!="")
     {
        $external_link = $_POST['external_link'];
     }
     else
     {
        $external_link = false;
     } 

     if($_POST['cat_id']!=0)
     {

        $cat_name=get_cat_name($_POST['cat_id']);
         
     }
     else
     {
        $cat_name='';
     }

      

    if($_FILES['big_picture']['name']!="")
    {   

        $big_picture=rand(0,99999)."_".$_FILES['big_picture']['name'];
        $tpath2='images/'.$big_picture;
        move_uploaded_file($_FILES["big_picture"]["tmp_name"], $tpath2);

        $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/images/'.$big_picture;
          
        $content = array(
                         "en" => $_POST['notification_msg']                                                 
                         );

        $fields = array(
                        'app_id' => $settings_details['onesignal_app_id'],
                        'included_segments' => array('All'),                                            
                        'data' => array("foo" => "bar","channel_id"=>$_POST['channel_id'],"external_link"=>$external_link),
                        'headings'=> array("en" => $_POST['notification_title']),
                        'contents' => $content,
                        'big_picture' =>$file_path,                     
                        );

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic '.$settings_details['onesignal_rest_key']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        
    }
    else
    {
        $setting_qry="SELECT * FROM settings where id='1'";
    $setting_result=mysqli_query($conn,$setting_qry);
    $settings_details=mysqli_fetch_assoc($setting_result);

 
        $content = array(
                         "en" => $_POST['notification_msg']
                          );

        $fields = array(
                        'app_id' => $settings_details['onesignal_app_id'],
                        'included_segments' => array('All'),                                      
                        'data' => array("foo" => "bar","channel_id"=>$_POST['channel_id'],"external_link"=>$external_link),
                        'headings'=> array("en" => $_POST['notification_title']),
                        'contents' => $content
                        );

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic '.$settings_details['onesignal_rest_key']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        
        
        
        curl_close($ch);


    }
        
        $_SESSION['msg']="17";
     
        header( "Location:send_notification.php");
        exit; 
     
     
  }
  
   

?>