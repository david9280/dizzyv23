<?php
include_once "includes/inc.php";    
$page = '';
$requestUrl = explode('/', $_SERVER["REQUEST_URI"]);
$activePage = end($requestUrl);
$request_uri = $_SERVER['REQUEST_URI'];
$params_offset = strpos($request_uri, '?');
$request_path = '';
$request_params = [];
if ($logedIn == '1') {
	$updateLastSeen = $iN->iN_UpdateLastSeen($userID);
} 
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

if ($logedIn == '1') {
	if ($userType != '2') {
		if ($maintenanceMode == '1') {
			include 'sources/maintenance.php';
			exit();
		}
	}
}

if (preg_match('~/(admin)/([[\w.-]+)~', urldecode($request_uri), $match)) {
	if ($userType == '1') {
		header('Location:' . $base_url . '');
	}
	$tag = $match[1];
	$pageFor = mysqli_real_escape_string($db, $match[2]);
	include 'admin/' . $adminTheme . '/index.php';
} else if (preg_match('~/(photos|videos|albums|post)/([[\w.-]+)~u', urldecode($request_uri), $match)) { 
	$urlMatch = mysqli_real_escape_string($db, $match[1]);
	$slugyUrl = mysqli_real_escape_string($db, $match[2]);
	$checkUsername = $iN->iN_CheckUserName($urlMatch);
	if ($urlMatch == 'post') {
		include 'sources/post.php';
	}
} else if(preg_match('~/(hashtag|explore|creator|purchase|live)/([[\w.-]+)~u', urldecode($request_uri), $match)) {
	$tag = $match[1];
	$pageFor = mysqli_real_escape_string($db, $iN->url_Hash($match[2]));   
	$pageForPage = mysqli_real_escape_string($db, $match[2]);
	$hst = $iN->iN_GetHashTagsSearch($pageFor, NULL, $showingNumberOfPost); 
	if ($pageForPage == 'becomeCreator') {
		include 'sources/becomeCreator.php';
	} else if ($pageForPage == 'purchase_point') {
		include 'sources/purchase_point.php';
	}else if($hst){  
		include 'sources/hashtag.php';
	}else {
		$checkUsername = $iN->iN_CheckUserName($pageFor); 
		if($checkUsername){ 
		    $getUserID = $iN->iN_GetUserDetailsFromUsername($pageFor);
			$lUserID = $getUserID['iuid'];
		    $liveDetails = $iN->iN_GetLiveStreamingDetails($lUserID);
			if($liveDetails){
				include 'sources/live.php';
			} else{
				header('Location:' . $base_url . '404');
			}
		}else{
			header('Location:' . $base_url . '404');
		}
	} 
} else if(preg_match('~/([[\w.-]+)~', $request_uri, $match)) {  
	$urlMatch = mysqli_real_escape_string($db, $match[1]);  
	$pageGet = $pageCreator = '';
	$pageWall = '1';
	if (isset($_GET['tab'])) {
		$pageGet = mysqli_real_escape_string($db, $_GET['tab']);
	}
	if (isset($_GET['creator'])) {
		$pageCreator = mysqli_real_escape_string($db, $_GET['creator']);
	}
	// added by nazar
	if (isset($_GET['wall'])) {
		$pageWall = mysqli_real_escape_string($db, $_GET['wall']);
	}
	// end
	$checkUsername = $iN->iN_CheckUserName($urlMatch);
	if ($pageGet) {
		include 'sources/settings.php';
	} else if ($pageCreator) {
		include 'sources/creators.php';
	} else if ($checkUsername) {
		include 'sources/profile.php';
	} else if ($pageWall) {
		include 'sources/profile.php';
	} else {
		switch ($match[1]) {
		case 'index':
		case 'index.php':
			include 'sources/home.php';
			break;
		case 'settings':
			include 'sources/settings.php';
			break;
		case 'chat':
		case 'chat.php':
			include 'sources/chat.php';
			break;
		case 'notifications':
			include 'sources/notifications.php';
			break;
		case 'payment-success':
		case 'payment-success.php':
			include 'sources/payment-success.php';
			break;
		case 'payment-failed':
		case 'payment-failed.php':
			include 'sources/payment-failed.php';
			break;
		case 'payment-response':
		case 'payment-response.php':
			include 'sources/payment-response.php';
			break;
		case 'creators':
		case 'creators.php':
			include 'sources/creators.php';
			break;
		case 'saved':
		case 'saved.php':
			include 'sources/saved.php';
			break;
		case 'googleLogin':
		case 'googleLogin.php':
			include 'sources/googleLogin.php';
			break;
		case 'twitterLogin':
		case 'twitterLogin.php':
			include 'sources/twitterLogin.php';
			break;
		case 'register':
		case 'register.php':
			include 'sources/register.php';
			break;
		case 'reset_password':
		case 'reset_password.php':
			include 'sources/reset_password.php';
			break;
		case 'live_streams':
		case 'live_streams.php':
			include 'sources/live_streams.php';
			break; 
		case 'verify':
		case 'verify.php':
			include 'sources/verify.php';
			break;
		default:
			include 'sources/page.php';
		}
	}
} else if ($request_path == '/') {
	include "sources/home.php";
	exit();
} else {
	header('HTTP/1.0 404 Not Found');
	echo "<h1>404 Not Found</h1>";
	echo "The page that you have requested could not be found.";
}
?>