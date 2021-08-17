<?php
include("../includes/inc.php");
if(isset($_POST['f']) && $logedIn == '1'){
    $type = mysqli_real_escape_string($db, $_POST['f']);
    if($type == 'live_calcul'){
      if(isset($_POST['lid']) && !empty($_POST['lid'])){
          $liveID = mysqli_real_escape_string($db, $_POST['lid']);
          $checkLiveExist = $iN->iN_CheckLiveIDExist($liveID);
          $liveTime = $iN->iN_GetLastLiveFinishTimeFromID($liveID);
          $currentTime = time(); 
          $redirectUrl = '';
          if($currentTime > $liveTime){
             $redirectUrl = $base_url;
          }
          $liData = $iN->iN_GetLiveStreamingDetailsByID($liveID);
          $liveCredit = isset($liData['live_credit']) ? $liData['live_credit'] : NULL;
          $liveCreatorID = $liData['live_uid_fk'];
          if($liveCredit && $userID == $liveCreatorID){
             $iN->iN_UpdateLiveStreamingTime($liveID);
          }
          $remaining = $liveTime - time();
          $remaminingTime = intval(date('i', $remaining));
          $liveRemainingTime =  html_entity_decode($iN->iN_SelectedMenuIcon('115')).filter_var($remaminingTime, FILTER_SANITIZE_STRING).$LANG['minutes_left'];
          if($checkLiveExist){
            $json = array();
            $data = array(
               'likeCount' => $iN->iN_TotalLiveLiked($liveID),
               'onlineCount' => $iN->iN_OnlineLiveVideoUserCount($userID, $liveID),
               'time' => $liveRemainingTime,
               'finished' => $redirectUrl
               ); 
            $result =  json_encode( $data , JSON_UNESCAPED_UNICODE);	
            echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
          }
      }
    }
}
?>