<?php 
include_once 'includes/connect.php';  
session_start(); //Start the current session
if(isset($_COOKIE[$cookieName])){
    $hashCookie = mysqli_real_escape_string($db, $_COOKIE[$cookieName]);
    $checkSession = mysqli_query($db, "SELECT * FROM i_sessions WHERE session_key = '$hashCookie'") or die(mysqli_error($db));
    $getDetail = mysqli_fetch_array($checkSession, MYSQLI_ASSOC);
    $theLoginUserID = $getDetail['session_uid'];
	$theLoginHash = $getDetail['session_key'];  
    if(mysqli_num_rows($checkSession) > 0){ 
         setcookie($cookieName,'',time() - 31556926 ,'/');
         mysqli_query($db,"DELETE FROM i_sessions WHERE session_key='$theLoginHash'") or die(mysqli_error($db));  
         session_destroy(); //Destroy it! So we are logged out now
          header("Location: $base_url"); 
	    die();
    }else{ 
        setcookie($cookieName, '', 1);
        setcookie($cookieName,'',time() - 31556926 ,'/'); 
        mysqli_query($db,"DELETE FROM i_sessions WHERE session_key='".mysqli_real_escape_string($db,$_COOKIE[$cookieName])."'") or die(mysqli_error($db)); 
         session_destroy(); //Destroy it! So we are logged out now
        header("Location: $base_url");  
        die();
	}    
}else { 
    setcookie($cookieName, '', 1);
    setcookie($cookieName,'',time() - 31556926 ,'/');
    mysqli_query($db,"DELETE FROM i_sessions WHERE session_key='".mysqli_real_escape_string($db,$_COOKIE[$cookieName])."'") or die(mysqli_error($db)); 
     session_destroy(); //Destroy it! So we are logged out now	
    header("Location: $base_url"); 
    die();
}
?>