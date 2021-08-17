<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "includes/inc.php"; 

$requestUrl = explode('/', $_SERVER["REQUEST_URI"]);
$activePage = end($requestUrl);
$request_uri = $_SERVER['REQUEST_URI'];
$params_offset = strpos($request_uri, '?');
$request_path = '';
$request_params = [];
if ($params_offset > -1) {
    $request_path = substr($request_uri, 0, $params_offset);
    $params = explode('&', substr($request_uri, $params_offset + 1));
    foreach ($params as $value) {
        $key_value = explode('=', $value);
        $request_params[$key_value[0]] = $key_value[1];
    }
} else {
    $request_path = $request_uri;
} 
if (preg_match('~/(photos|videos|albums)/([\w-]+)~', $request_uri, $match)) { 
} else if (preg_match('~/hashtag/([[\w-]+)~', $request_uri, $match)) { 
    $tag = $match[1];   
} else if (preg_match('~/([^/]+)~', $request_uri, $match)) {
    $urlMatch = mysqli_real_escape_string($db, $match[1]);
    $checkUsername = $iN->iN_CheckUserName($urlMatch);
    if($checkUsername){
        echo 'Username Exist';
    }else{
        switch($match[1]) { 
            case 'index': 
            case 'index.php': 
            include('sources/home.php');
            break;  
            default:
            include('sources/404.php');
        }
    }
}else if ($request_path == '/') {   
    include("sources/home.php");
    exit();
} else {
    header('HTTP/1.0 404 Not Found');
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
} 
?>