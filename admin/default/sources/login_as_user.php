<?php
if($userType == '2' && $logedIn == '1'){
    if(isset($_GET['user'])){
        $loginAsUserID = mysqli_real_escape_string($db, $_GET['user']);
        $checkUserIDExist = $iN->iN_CheckUserExist($loginAsUserID); 
        if($checkUserIDExist){
            /*****************
            LOGOUT CURRENT USER
            ******************/ 
            if(isset($_COOKIE[$cookieName])){
                $hashCookie = mysqli_real_escape_string($db, $_COOKIE[$cookieName]);
                $checkSession = mysqli_query($db, "SELECT * FROM i_sessions WHERE session_key = '$hashCookie'") or die(mysqli_error($db));
                $getDetail = mysqli_fetch_array($checkSession, MYSQLI_ASSOC);
                $theLoginUserID = $getDetail['session_uid'];
                $theLoginHash = $getDetail['session_key'];
                setcookie($cookieName,'',time() - 31556926 ,'/');
                mysqli_query($db,"DELETE FROM i_sessions WHERE session_key='$theLoginHash'") or die(mysqli_error($db));  
                //session_destroy(); /*Destroy it! So we are logged out now*/
            }
            /*****************
            LOGIN AS USER ID
            ******************/ 
            $editUserData = $iN->iN_GetUserDetails($loginAsUserID);
            $loginAsUserUserName = $editUserData['i_username'];
            $time = time();
            $hash = sha1($loginAsUserUserName).$time;
            setcookie($cookieName,$hash,time()+31556926 ,'/');
            $saveLogin = mysqli_query($db, "INSERT INTO `i_sessions`(session_uid, session_key, session_time) VALUES ('$loginAsUserID','$hash', '$time')") or die(mysqli_error($db));
            $_SESSION['iuid'] = $loginAsUserID;
            if($saveLogin){
                header("Location: $base_url");  
                die();
            }
        }
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("header/meta.php");
       include("header/css.php");
       include("header/javascripts.php");
    ?> 
</head>
<body> 
<div class="i_admin_container flex_">
    <?php include("menu/leftMenu.php");?>
    <div class="i_admin_right">
        <div class="i_admin_contents_wrapper column flex_">
            <?php 
                include("header/header.php");
                echo '<div class="i_contents_container column flex_ tabing">'; 
                echo '<div class="nauthority_svg flex_ tabing">'.$iN->iN_SelectedMenuIcon('113').'</div>';
                echo '<div class="no_authority">'.$LANG['do_not_have_this_authority'].'</div>';
                echo '</div>';
            ?> 
        </div> 
    </div>
</div>

</body>
</html>