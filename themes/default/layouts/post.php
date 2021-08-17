<div class="th_middle">
   <div class="pageMiddle">
<?php 
if($logedIn == 0){  
   $loginFormClass = 'loginForm';
}else{ 
   $loginFormClass = ''; 
}
$GetThePostIDFromUrl = substr($slugyUrl, strrpos($slugyUrl, '_') + 1); 
if (preg_match('/_/', $slugyUrl)) {
   $GetThePostIDFromUrl = $GetThePostIDFromUrl;
}else{
   $GetThePostIDFromUrl = $slugyUrl;
}
$postFromData = $iN->iN_GetAllPostDetails($GetThePostIDFromUrl); 
if($postFromData){ 
    $userPostID = $postFromData['post_id']; 
    $userPostOwnerID = $postFromData['post_owner_id'];
    $userPostText = isset($postFromData['post_text']) ? $postFromData['post_text'] : NULL;
    $userPostHashTags = isset($postFromData['hashtags']) ? $postFromData['hashtags'] : NULL; 
    $userPostFile = $postFromData['post_file'];
    $userPostCreatedTime = $postFromData['post_created_time'];
    $crTime = date('Y-m-d H:i:s',$userPostCreatedTime); 
    $userPostWhoCanSee = $postFromData['who_can_see'];
    $userPostWantStatus = $postFromData['post_want_status'];
    $userPostWantedCredit = $postFromData['post_wanted_credit'];
    $userPostStatus = $postFromData['post_status']; 
    $userPostOwnerUsername = $postFromData['i_username'];
    $userPostOwnerUserFullName = $postFromData['i_user_fullname']; 
    $userPostOwnerUserGender = $postFromData['user_gender']; 
    $userPostCommentAvailableStatus = $postFromData['comment_status'];
    $userPostPinStatus = $postFromData['post_pined'];
    $userPostOwnerUserLastLogin = $postFromData['last_login_time']; 
    $userProfileStatus = $postFromData['profile_status'];
    $slugUrl = $base_url.'post/'.$postFromData['url_slug'].'_'.$userPostID;
    $userPostSharedID = isset($postFromData['shared_post_id']) ? $postFromData['shared_post_id'] : NULL;
    $userPostOwnerUserAvatar = $iN->iN_UserAvatar($userPostOwnerID, $base_url);
    $userPostUserVerifiedStatus = $postFromData['user_verified_status'];
    if($userPostOwnerUserGender == 'male'){
       $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('12').'</div>';
    }else if($userPostOwnerUserGender == 'female'){
       $publisherGender = '<div class="i_plus_gf">'.$iN->iN_SelectedMenuIcon('13').'</div>';
    }else if($userPostOwnerUserGender == 'couple'){
       $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('58').'</div>';
    }
    $userVerifiedStatus = '';
    if($userPostUserVerifiedStatus == '1'){
       $userVerifiedStatus = '<div class="i_plus_s">'.$iN->iN_SelectedMenuIcon('11').'</div>';
    }
    $onlySubs = '';
    if($userPostWhoCanSee == '1'){
       $onlySubs = '';
       $subPostTop = '';
       $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('50').'</div>';
    }else if($userPostWhoCanSee == '2'){
       $subPostTop = '';
       $wCanSee = '<div class="i_plus_subs" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('15').'</div>'; 
       $onlySubs = '<div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('56').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_subscribers']).'</div></div></div>';
    }else if($userPostWhoCanSee == '3'){
       $subPostTop = 'extensionPost';
       $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('51').'</div>';
       $onlySubs = '<div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('56').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_subscribers']).'</div></div></div>';
    }
    $postStyle = '';
    if(empty($userPostText)){
        $postStyle = 'style="display:none;"';
    }
    /*Comment*/
   $getUserComments = $iN->iN_GetPostComments($userPostID, 0);
   $c = '';
   $TotallyPostComment = '';
   if ($c) {
      if ($getUserComments > 0) {
         $CountTheUniqComment = count($CountUniqPostCommentArray);
         $SecondUniqComment = $CountTheUniqComment - 5;
         if ($CountTheUniqComment > 5) { 
            $getUserComments = $iN->iN_GetPostComments($userPostID, 5);
         }
      }
   }  $likeSum = '';
   if($logedIn == 0){
      $getFriendStatusBetweenTwoUser = '1';
      $checkPostLikedBefore ='';
      $checkPostReportedBefore = ''; 
      $checkUserPurchasedThisPost = '0';
   }else{
      $getFriendStatusBetweenTwoUser = $iN->iN_GetRelationsipBetweenTwoUsers($userID, $userPostOwnerID);
      $checkPostLikedBefore = $iN->iN_CheckPostLikedBefore($userID, $userPostID);
      $checkPostReportedBefore = $iN->iN_CheckPostReportedBefore($userID, $userPostID);
      if($iN->iN_CheckPostSavedBefore($userID, $userPostID) == '1'){
         $pSaveStatusBtn = $iN->iN_SelectedMenuIcon('63');
      } 
      $checkUserPurchasedThisPost = $iN->iN_CheckUserPurchasedThisPost($userID, $userPostID);
      $likeSum = $iN->iN_TotalPostLiked($userPostID);
      if($likeSum > '0'){
         $likeSum = $likeSum;
      }else{
         $likeSum = '';
      }
   }
   $postReportStatus = $iN->iN_SelectedMenuIcon('32').$LANG['report_this_post'];
   if($checkPostReportedBefore == '1'){
      $postReportStatus = $iN->iN_SelectedMenuIcon('32').$LANG['unreport'];
   }
   $onlySubs = '';
    if($userPostWhoCanSee == '1'){
       $onlySubs = '';
       $subPostTop = '';
       $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('50').'</div>';
    }else if($userPostWhoCanSee == '2'){
       $subPostTop = '';
       $wCanSee = '<div class="i_plus_subs" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('15').'</div>'; 
       $onlySubs = '<div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('15').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_followers']).'</div></div></div>';
    }else if($userPostWhoCanSee == '3'){
       $subPostTop = 'extensionPost';
       $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('51').'</div>';
       $onlySubs = '<div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('56').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_subscribers']).'</div></div></div>';
    }else if($userPostWhoCanSee == '4'){
      $subPostTop = 'extensionPost';
      $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('9').'</div>';
      $onlySubs = '<div class="onlyPremium"><div class="onlySubsWrapper"><div class="premium_locked"><div class="premium_locked_icon">'.$iN->iN_SelectedMenuIcon('56').'</div></div><div class="onlySubs_note"><div class="buyThisPost prcsPost" id="'.$userPostID.'">'.preg_replace( '/{.*?}/', $userPostWantedCredit, $LANG['post_credit']).'</div><div class="buythistext prcsPost" id="'.$userPostID.'">'.$LANG['purchase_post'].'</div></div><div class="fr_subs uSubsModal transition" data-u="'.$userPostOwnerID.'">'.$iN->iN_SelectedMenuIcon('51').$LANG['free_for_subscribers'].'</div></div></div>';
    } 
   if($checkPostLikedBefore){
      $likeIcon = $iN->iN_SelectedMenuIcon('18');
      $likeClass = 'in_unlike';
   }else{
      $likeIcon = $iN->iN_SelectedMenuIcon('17');
      $likeClass = 'in_like';
   }
   if($userPostCommentAvailableStatus == '1'){
      $commentStatusText = $LANG['disable_comment'];
   }else{
      $commentStatusText = $LANG['enable_comments'];
   }
   $pPinStatus = ''; 
   $pPinStatusBtn = $iN->iN_SelectedMenuIcon('29').$LANG['pin_on_my_profile'];
   if($userPostPinStatus == '1'){
     $pPinStatus = '<div class="i_pined_post" id="i_pined_post_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('62').'</div>';
     $pPinStatusBtn = $iN->iN_SelectedMenuIcon('29').$LANG['post_pined_on_your_profile'];
   } 
   $pSaveStatusBtn = $iN->iN_SelectedMenuIcon('22'); 
   $waitingApprove = ''; 
   if($userPostStatus == '2') {
      $ApproveNot = $iN->iN_GetAdminNot($userPostOwnerID, $userPostID);
      $aprove_status = isset($ApproveNot['approve_status']) ? $ApproveNot['approve_status'] : NULL;
      $a_not = $iN->iN_SelectedMenuIcon('10').$LANG['waiting_for_approve'];
      $theApproveNot = isset($ApproveNot['approve_not']) ? $ApproveNot['approve_not'] : NULL;
      if($aprove_status == '2'){
         $a_not = $iN->iN_SelectedMenuIcon('113').$LANG['request_rejected'].' '.$theApproveNot;
      }else if($aprove_status == '3'){
         $a_not = $iN->iN_SelectedMenuIcon('114').$LANG['declined'].' '.$theApproveNot;
      }
      $waitingApprove = '<div class="waiting_approve flex_">'.$a_not.'</div>';
      if($logedIn == 0){ 
         echo '<div class="i_post_body body_'.$userPostID.'" id="'.$userPostID.'" data-last="'.$userPostID.'" style="display:none;"></div>';
      }else{
         if($userID == $userPostOwnerID){ 
            if(empty($userPostFile)){
               include("posts/textPost.php");
            }else{
               include("posts/ImagePost.php");
            }
         }else{
            echo '<div class="i_post_body body_'.$userPostID.'" id="'.$userPostID.'" data-last="'.$userPostID.'" style="display:none;"></div>';
         }
      }  
   }else{
      if(empty($userPostFile)){
         include("posts/textPost.php");
      }else{
         include("posts/ImagePost.php");
      }
   }
   
include("widgets/sugestedposts.php");
}else{?> 
<div class="i_not_found_page transition" style="justify-content: center; align-items:center;">
    <div class="noPostIcon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('54'));?></div>
    <h1><?php echo filter_var($LANG['empty_shared_title'], FILTER_SANITIZE_STRING);?></h1>
    <?php echo filter_var($LANG['empty_shared_desc'], FILTER_SANITIZE_STRING);?>
</div>
<?php }?>
  </div>
</div>