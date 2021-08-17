<?php
 include("../includes/inc.php"); 
 if(isset($_POST['username']) && isset($_POST['password'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, sha1(md5($_POST['password'])));
    
    /*Check username and Password is true*/
    $query = mysqli_query($db,"SELECT * FROM `i_users` WHERE (i_username = '$username' OR i_user_email = '$username') AND i_password = '$password'") or die(mysqli_error($db));
    $uData = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if(mysqli_num_rows($query) == '1'){
      $userID = $uData['iuid'];
      $userUsername = $uData['i_username'];
      $userEmail = $uData['i_user_email'];
      $userPassword = $uData['i_password'];
      $time = time();
      mysqli_query($db, "UPDATE i_users SET last_login_time = '$time' WHERE iuid = '$userID'") or die(mysqli_error($db));
      $hash = sha1($userUsername).$time;
      setcookie($cookieName,$hash,time()+31556926 ,'/');
      $saveLogin = mysqli_query($db, "INSERT INTO `i_sessions`(session_uid, session_key, session_time) VALUES ('$userID','$hash', '$time')") or die(mysqli_error($db));
      $_SESSION['iuid'] = $userID;
      if($saveLogin){
        echo 'go_inside'; 
        exit; 
      } 
    }else{
        exit('There is no user with these details! You do not have an account? Click <a href="'.$base_url.'">HERE</a> to create an account.');
    }
 }else{
     exit('Please feel all fealds!');
 }
?>