<div class="th_middle">
   <div class="pageMiddle">
       <div class="notificationsContainer">
          <div class="notificationsHeader">
              <?php echo filter_var($LANG['notifications'], FILTER_SANITIZE_STRING);?> 
          </div>
          <div class="i_header_others_box" id="moreType" data-type="notifications"> 
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
            $notCreatorUserFullName = $notCreatorDetails['i_user_fullname'];
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
          <div class="i_notification_wrpper mor hidNot_<?php echo filter_var($notificationID, FILTER_SANITIZE_STRING);?> body_<?php echo filter_var($notificationID, FILTER_SANITIZE_STRING);?>" id="<?php echo filter_var($notificationID, FILTER_SANITIZE_STRING);?>" data-last="<?php echo filter_var($notificationID, FILTER_SANITIZE_STRING);?>">
            <a href="<?php echo filter_var($notUrl, FILTER_VALIDATE_URL);?>">
            <div class="i_notification_wrapper transition">
                <div class="i_message_owner_avatar">
                   <div class="i_message_not_icon flex_ tabing"><?php echo html_entity_decode($notIcon);?></div>
                   <div class="i_message_avatar"><img src="<?php echo filter_var($notificationCreatorAvatar, FILTER_SANITIZE_STRING);?>" alt="<?php echo filter_var($notCreatorUserFullName, FILTER_SANITIZE_STRING);?>"></div>
                </div> 
                <div class="i_message_info_container">
                    <div class="i_message_owner_name"><?php echo filter_var($notCreatorUserFullName, FILTER_SANITIZE_STRING);?></div>
                    <div class="i_message_i"><?php echo filter_var($notText, FILTER_SANITIZE_STRING);?></div>
                </div> 
            </div>
            </a>
            <div class="i_message_setting msg_Set_<?php filter_var($notificationID, FILTER_SANITIZE_STRING);?> msg_Set" id="<?php echo filter_var($notificationID, FILTER_SANITIZE_STRING);?>">
                <div class="i_message_set_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('16'));?></div>
                <!--MESSAGE SETTING-->
                <div class="i_message_set_container msg_Set msg_Set_<?php echo filter_var($notificationID, FILTER_SANITIZE_STRING);?>">
                  <!--MENU ITEM-->
                  <div class="i_post_menu_item_out transition hidNot" id="<?php echo filter_var($notificationID, FILTER_SANITIZE_STRING);?>">
                      <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?> <?php echo filter_var($LANG['remove_this_notification'], FILTER_SANITIZE_STRING);?>
                  </div>
                  <!--/MENU ITEM-->
                  <!--MENU ITEM-->
                  <div class="i_post_menu_item_out transition">
                      <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('47'));?> <?php echo filter_var($LANG['mark_as_read'], FILTER_SANITIZE_STRING);?>
                  </div>
                  <!--/MENU ITEM-->
                </div>
                <!--/MESSAGE SETTING-->
            </div>
          </div>
          <!--/MESSAGE-->   
    <?php } }?>  
          </div>
       </div>
   </div>
</div>
