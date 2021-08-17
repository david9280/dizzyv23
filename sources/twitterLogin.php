<?php 
require('twitter/http.php');
require('twitter/oauth_client.php'); 
$Keys = $iN->iN_SocialLoginDetails('twitter');         
define("CLIENT_ID", $Keys['s_key_one']); 
define("SECRET_KEY", $Keys['s_key_two']); 
/* make sure the url end with a trailing slash, give your site URL */
define("SITE_URL", $base_url);
/* the page where you will be redirected for authorization */
define("REDIRECT_URL", SITE_URL."twitterLogin.php");

define("LOGOUT_URL", SITE_URL."logout.php");

//require('config.php');

$client = new oauth_client_class;
$client->debug = 1;
$client->debug_http = 1;
$client->redirect_uri = REDIRECT_URL;
//$client->redirect_uri = 'oob';

$client->client_id = CLIENT_ID;
$application_line = __LINE__;
$client->client_secret = SECRET_KEY;
if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
    die('Please go to Twitter Apps page https://dev.twitter.com/apps/new , ' .
            'create an application, and in the line ' . $application_line .
            ' set the client_id to Consumer key and client_secret with Consumer secret. ' .
            'The Callback URL must be ' . $client->redirect_uri . ' If you want to post to ' .
            'the user timeline, make sure the application you create has write permissions');

if (($success = $client->Initialize())) {
    if (($success = $client->Process())) {
    if (strlen($client->access_token)) {
        $success = $client->CallAPI('https://api.twitter.com/1.1/account/verify_credentials.json?include_email=true', 'GET', array(), array('FailOnAccessError' => true), $user); 
    }
    } 
    $success = $client->Finalize($success); 
}
if(isset($_GET['denied']) && !empty($_GET['denied'])){
    $redirect = $base_url.'logout.php';
    header("Location:$redirect");
    exit();
}
if ($client->exit)
    exit;
if ($success) {  
    $TwitterAccountFullName = mysqli_real_escape_string($db, $user->name);
    $TwitterAccountEmail = mysqli_real_escape_string($db, $user->email);
    $TwitterAccountProfileImage = mysqli_real_escape_string($db, $user->profile_image_url);
    $UserGender = 'male';
    function getMe($email){
        preg_match('/(\S+)(@(\S+))/', $email, $match);
        return $match[1];
    } 
    $TwitterAccountRegisterUserName = getMe($TwitterAccountEmail);
    $generatePassword = sha1(md5($TwitterAccountRegisterUserName.'_'.$TwitterAccountRegisterUserName));
    $checkUserExist = mysqli_query($db, "SELECT * FROM i_users WHERE i_user_email = '$TwitterAccountEmail' AND i_username = '$TwitterAccountRegisterUserName'") or die(mysqli_error($db));
    if(mysqli_num_rows($checkUserExist) == 0 && isset($TwitterAccountEmail)){ 
        $time = time();
        $register = mysqli_query($db,"INSERT INTO i_users(i_user_fullname, i_user_email, user_gender, user_avatar, i_username, registered,i_password, login_with,lang)VALUES('$TwitterAccountFullName','$TwitterAccountEmail','male','$TwitterAccountProfileImage','$TwitterAccountRegisterUserName','$time','$generatePassword','twitter','$defaultLanguage')") or die(mysqli_error($db));
        if($register){
            $getAccountDetails = mysqli_query($db,"SELECT * FROM i_users WHERE i_username = '$TwitterAccountRegisterUserName'") or die(mysqli_error($db));
            $uData = mysqli_fetch_array($getAccountDetails, MYSQLI_ASSOC);
            if(mysqli_num_rows($getAccountDetails) == '1'){
                $userID = $uData['iuid'];
                $userUsername = $uData['i_username'];
                $userEmail = $uData['i_user_email'];
                $userPassword = $uData['i_password'];
                $time = time();
                mysqli_query($db, "UPDATE i_users SET last_login_time = '$time' WHERE iuid = '$userID'") or die(mysqli_error($db));
                $hash = sha1($userUsername).$time;
                setcookie($cookieName,$hash,time()+31556926 ,'/');
                $saveLogin = mysqli_query($db, "INSERT INTO `i_sessions`(session_uid, session_key, session_time) VALUES ('$userID','$hash', '$time')") or die(mysqli_error($db));
                mysqli_query($db,"INSERT INTO `i_friends` (fr_one,fr_two,fr_time,fr_status)VALUES('$userID','$userID','$time', 'me')");  
                $_SESSION['iuid'] = $userID; 
                if($saveLogin){ 
                    $redirect = $base_url.'settings';
                header("Location:$redirect");
                exit; 
                } 
            }
        }
    }else if(mysqli_num_rows($checkUserExist) == 1){
            $getAccountDetails = mysqli_query($db,"SELECT * FROM i_users WHERE i_username = '$TwitterAccountRegisterUserName'") or die(mysqli_error($db));
            $uData = mysqli_fetch_array($getAccountDetails, MYSQLI_ASSOC);
                if(mysqli_num_rows($getAccountDetails) == '1'){
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
                        $redirect = $base_url.$userUsername;
                    header("Location: $redirect");
                    exit; 
                    } 
                }
    }
} else {
  //header("location:$base_url");
}
//header("location:$base_url");
exit;     
?>