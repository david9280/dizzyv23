<?php
include("../includes/inc.php");
if($logedIn == '1'){
    $data = array(
        'messageNotificationStatus' => $userMessageNotificationReadStatus,
        'notificationStatus' => $userNotificationReadStatus,
        'unReadedNotfications' => $totalNotifications,
        'unReadMessageNotifications' => $totalMessageNotifications
    );
    $result =  json_encode( $data , JSON_UNESCAPED_UNICODE);	
    echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result); 
}
?>