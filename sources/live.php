<?php  
if($agoraStatus == '1'){
if($logedIn == 0 || ($agoraStatus == '0' && empty($agoraAppID))){
    header('Location:'.$base_url.'404');
}else{
    $siteTitle = $liveDetails['live_name'];
    $liveID = $liveDetails['live_id'];
    $liveCreator = $liveDetails['live_uid_fk'];
    $liveFinishTime = $liveDetails['finish_time'];
    $liveStartTime = $liveDetails['started_at'];
    $liveType = $liveDetails['live_type']; 
    $liveChannel = $liveDetails['live_channel'];
    $liveCredit = isset($liveDetails['live_credit']) ? $liveDetails['live_credit'] : NULL;
    $remaining = $liveFinishTime - time();
    $remaminingTime = date('i', $remaining);
    $checkLiveLikedBefore = $iN->iN_CheckLiveLikedBefore($userID, $liveID); 
    $liveCreatorDetail = $iN->iN_GetUserDetails($liveCreator);
    $likeSum = $iN->iN_TotalLiveLiked($liveID);
    if($likeSum > '0'){
      $likeSum = $likeSum;
    }else{
      $likeSum = '';
    }
    $liveCreatorUserName = $liveCreatorDetail['i_username'];
    $liveCreatorFullname = $liveCreatorDetail['i_user_fullname'];
    $liveCreatorAvatar = $iN->iN_UserAvatar($liveCreator, $base_url);
    if($checkLiveLikedBefore){
        $likeIcon = $iN->iN_SelectedMenuIcon('18');
        $likeClass = 'lin_unlike';
     }else{
        $likeIcon = $iN->iN_SelectedMenuIcon('17');
        $likeClass = 'lin_like';
     }
    if($liveType == 'free'){
        $currentDateNumber = '1';
        $finishDateNumber = '2';
        $currentTime = time();
        if($liveFinishTime){
           $currentDateNumber = date('d', $currentTime);
           $finishDateNumber = date('d', $liveFinishTime);
        } 
        if($liveFinishTime && $currentDateNumber == $finishDateNumber){ 
            if($currentTime > $liveFinishTime){ 
                header('Location:'.$base_url.'404');
            }
        }
        include("themes/$currentTheme/live.php");
    }else{
        include("themes/$currentTheme/live.php");
    }
}
}else{
    header('Location:'.$base_url.'404');
}
?> 