<?php error_reporting(0);
 		 ob_start();
    session_start();
 	
 	header("Content-Type: text/html;charset=UTF-8");
	
	//firebase database link
	$firebaseDb_URL="https://gostore-9b7c8.firebaseio.com/Match";
	$firebaseDb_URL_MainDb="https://gostore-9b7c8.firebaseio.com/";
	define('BASE_URL', 'http://goestate.com/');
		  //database configuration
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_USER', 'root');
	DEFINE ('DB_PASSWORD', 'root'); 
	DEFINE ('DB_NAME', 'gostore');

    $conn =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    if (!$conn) {
        die ("connection failed: " . mysqli_connect_error());
    } else {
        $conn->set_charset('UTF-8');
    }
	
	$GLOBALS['config'] = $conn;


    $ENABLE_RTL_MODE = 'false';

    

    //Profile
    
    
	 
?> 
	 
 