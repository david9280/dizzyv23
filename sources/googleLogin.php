<?php  
require('google/http.php');
require('google/oauth_client.php'); 
$Keys = $iN->iN_SocialLoginDetails('google');
/* make sure the url end with a trailing slash */
define("SITE_URL", $base_url);
/* the page where you will be redirected for authorzation */
define("REDIRECT_URL", SITE_URL."googleLogin.php");

/* * ***** Google related activities start ** */
define("CLIENT_ID", $Keys['s_key_one']); 
define("CLIENT_SECRET", $Keys['s_key_two']);

/* permission */
define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
        'https://www.googleapis.com/auth/userinfo.profile' );
        
/* logout both from google and your site **/
define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(SITE_URL."logout.php"));
/* * ***** Google related activities end ** */
$client = new oauth_client_class;

// set the offline access only if you need to call an API
// when the user is not present and the token may expire
$client->offline = FALSE;

$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = REDIRECT_URL;

$client->client_id = CLIENT_ID;
$application_line = __LINE__;
$client->client_secret = CLIENT_SECRET;

if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
    die('Please go to Google APIs console page ' .
            'http://code.google.com/apis/console in the API access tab, ' .
            'create a new client ID, and in the line ' . $application_line .
            ' set the client_id to Client ID and client_secret with Client Secret. ' .
            'The callback URL must be ' . $client->redirect_uri . ' but make sure ' .
            'the domain is valid and can be resolved by a public DNS.');

/* API permissions
    */
$client->scope = SCOPE;
if (($success = $client->Initialize())) {
    if (($success = $client->Process())) {
    if (strlen($client->authorization_error)) {
        $client->error = $client->authorization_error;
        $success = false;
    } elseif (strlen($client->access_token)) {
        $success = $client->CallAPI(
                'https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $user);
    }
    }
    $success = $client->Finalize($success);
}
if ($client->exit)
    exit;
if ($success) {
    $GoogleAccountFullName = mysqli_real_escape_string($db, $user->name);
    $GoogleAccountEmail = mysqli_real_escape_string($db, $user->email);
    $GoogleAccountProfileImage = mysqli_real_escape_string($db, $user->picture);
    $UserGender = 'male';
    function getMe($email){
        preg_match('/(\S+)(@(\S+))/', $email, $match);
        return $match[1];
    }
    /*Get value before @ for username*/
    $GoogleAccountRegisterUserName = getMe($GoogleAccountEmail);
    $generatePassword = sha1(md5($GoogleAccountRegisterUserName.'_'.$GoogleAccountRegisterUserName));
    $checkUserExist = mysqli_query($db, "SELECT * FROM i_users WHERE i_user_email = '$GoogleAccountEmail' AND i_username = '$GoogleAccountRegisterUserName'") or die(mysqli_error($db));
    if(mysqli_num_rows($checkUserExist) == 0 && isset($GoogleAccountEmail)){ 
        $time = time();
        $register = mysqli_query($db,"INSERT INTO i_users(i_user_fullname, i_user_email, user_gender, user_avatar, i_username, registered,i_password, login_with,lang)VALUES('$GoogleAccountFullName','$GoogleAccountEmail','male','$GoogleAccountProfileImage','$GoogleAccountRegisterUserName','$time','$generatePassword','google','$defaultLanguage')") or die(mysqli_error($db));
        if($register){
            $getAccountDetails = mysqli_query($db,"SELECT * FROM i_users WHERE i_username = '$GoogleAccountRegisterUserName'") or die(mysqli_error($db));
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
            $getAccountDetails = mysqli_query($db,"SELECT * FROM i_users WHERE i_username = '$GoogleAccountRegisterUserName'") or die(mysqli_error($db));
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
    $_SESSION["e_msg"] = $client->error;
}
header("location:".$base_url);
exit;      
?>