<div class="i_general_box_notifications_container generalBox">
<div class="btest">
  <div class="i_user_details">
    <!--MESSAGE HEADER-->
    <div class="i_box_messages_header">
       <?php echo filter_var($LANG['notifications'], FILTER_SANITIZE_STRING);?>
      <div class="i_message_full_screen transition"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>notifications"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('48'));?></a></div>
    </div> 
    <!--/MESSAGE HEADER-->
    <div class="i_header_others_box"> 
    <?php 
     if($Notifications){
        foreach($Notifications as $notData){
          $notificationID = $notData['not_id'];
          $notificationStatus = $notData['not_status'];
          $notPostID = $notData['not_post_id'];
          $notificationType = $notData['not_type'];
          $notificationTypeType = $notData['not_not_type'];
          $notificationTime = $notData['not_time'];
          $notCreator = $notData['not_iuid'];
          $notCreatorDetails = $iN->iN_GetUserDetails($notCreator);
          $notCreatorUserName = $notCreatorDetails['i_username'];
          $notCreatorUserFullName = isset($notCreatorDetails['i_user_fullname']) ? $notCreatorDetails['i_user_fullname'] : NULL;
          $notificationCreatorAvatar = $iN->iN_UserAvatar($notCreator, $base_url); 
          if($notificationTypeType == 'commented'){
             $notText = $LANG['commented_on_your_post'];
             $notIcon = $iN->iN_SelectedMenuIcon('20');
             $notUrl = $base_url.'post/'.$notPostID;
          }else if($notificationTypeType == 'postLike'){
             $notText = $LANG['liked_your_post'];
             $notIcon = $iN->iN_SelectedMenuIcon('18');
             $notUrl = $base_url.'post/'.$notPostID;
          }else if($notificationTypeType == 'commentLike'){
            $notText = $LANG['liked_your_comment'];
            $notIcon = $iN->iN_SelectedMenuIcon('18');
            $notUrl = $base_url.'post/'.$notPostID;
         }else if($notificationTypeType == 'follow'){
            $notText = $LANG['is_now_following_your_profile'];
            $notIcon = $iN->iN_SelectedMenuIcon('66');
            $notUrl = $base_url.$notCreatorUserName;
         }else if($notificationTypeType == 'subscribe'){
            $notText = $LANG['is_subscribed_your_profile'];
            $notIcon = $iN->iN_SelectedMenuIcon('51');
            $notUrl = $base_url.$notCreatorUserName;
         }else if($notificationTypeType == 'accepted_post'){
            $notText = $LANG['accepted_post'];
            $notIcon = $iN->iN_SelectedMenuIcon('69');
            $notUrl = $base_url.'post/'.$notPostID;
         }else if($notificationTypeType == 'rejected_post'){
            $notText = $LANG['rejected_post'];
            $notIcon = $iN->iN_SelectedMenuIcon('5');
            $notUrl = $base_url.'post/'.$notPostID;
         }else if($notificationTypeType == 'declined_post'){
            $notText = $LANG['declined_post'];
            $notIcon = $iN->iN_SelectedMenuIcon('5');
            $notUrl = $base_url.'post/'.$notPostID;
         } 
    ?>
          <!--MESSAGE-->
          <div class="i_message_wrpper hidNot_<?php echo filter_var($notificationID, FILTER_SANITIZE_STRING);?>">
            <a href="<?php echo filter_var($notUrl, FILTER_VALIDATE_URL);?>">
            <div class="i_message_wrapper transition">
                <div class="i_message_owner_avatar">
                  <div class="i_message_not_icon flex_ tabing"><?php echo html_entity_decode($notIcon);?></div>
                   <div class="i_message_avatar"><img src="<?php echo filter_var($notificationCreatorAvatar, FILTER_VALIDATE_URL);?>" alt="<?php echo filter_var($notCreatorUserFullName, FILTER_SANITIZE_STRING);?>"></div>
                </div> 
                <div class="i_message_info_container">
                    <div class="i_message_owner_name"><?php echo filter_var($notCreatorUserFullName, FILTER_SANITIZE_STRING);?></div>
                    <div class="i_message_i"><?php echo filter_var($notText, FILTER_SANITIZE_STRING);?></div>
                </div> 
            </div>
            </a>
             
          </div>
          <!--/MESSAGE-->   
    <?php }} ?>   
      </div> 
      <?php if(empty($Notifications) && !isset($Notifications)){?>
      <div class="no_not_here tabing flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('103'));?></div>
      <?php } ?>
  </div>
  <div class="footer_container messages"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>notifications"><?php echo filter_var($LANG['see_all_notifications'], FILTER_SANITIZE_STRING);?></a></div>
  </div>
</div>