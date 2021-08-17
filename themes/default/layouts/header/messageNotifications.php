<div class="i_general_box_message_notifications_container generalBox">
<div class="btest">
  <div class="i_user_details">
    <!--MESSAGE HEADER-->
    <div class="i_box_messages_header">
       <?php echo filter_var($LANG['messages'], FILTER_SANITIZE_STRING); ?>
      <div class="i_message_full_screen transition"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>chat"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('48')); ?></a></div>
    </div>
    <!--/MESSAGE HEADER-->
      <div class="i_header_others_box">
      <?php
$cList = $iN->iN_ChatUserList($userID, $scrollLimit);
if ($cList) {
	foreach ($cList as $cData) {
		$chatID = $cData['chat_id'];
		$chatUserIDOne = $cData['user_one'];
		$chatUserIDTwo = $cData['user_two'];
		if ($chatUserIDOne == $userID) {
			$cUID = $chatUserIDTwo;
		} else {
			$cUID = $chatUserIDOne;
		}
		$chatUserAvatar = $iN->iN_UserAvatar($cUID, $base_url);
		$chatUserDetails = $iN->iN_GetUserDetails($cUID);
		$chatUserName = $chatUserDetails['i_username'];
		$chatUserFullName = $chatUserDetails['i_user_fullname'];
		$chatUserGender = $chatUserDetails['user_gender'];
		if ($chatUserGender == 'male') {
			$publisherGender = '<div class="i_plus_g">' . $iN->iN_SelectedMenuIcon('12') . '</div>';
		} else if ($chatUserGender == 'female') {
			$publisherGender = '<div class="i_plus_gf">' . $iN->iN_SelectedMenuIcon('13') . '</div>';
		} else if ($chatUserGender == 'couple') {
			$publisherGender = '<div class="i_plus_g">' . $iN->iN_SelectedMenuIcon('58') . '</div>';
		}
		$latestChatMessage = $iN->iN_GetLatestMessage($chatID);
		$message = isset($latestChatMessage['message']) ? $latestChatMessage['message'] : NULL;
		$messageFile = isset($latestChatMessage['file']) ? $latestChatMessage['file'] : NULL;
		$messageSticker = isset($latestChatMessage['sticker_url']) ? $latestChatMessage['sticker_url'] : NULL;
		$messageGif = isset($latestChatMessage['gifurl']) ? $latestChatMessage['gifurl'] : NULL;
		if ($messageFile) {
			$message = $iN->iN_SelectedMenuIcon('53') . $LANG['isImage'];
		}
		if (!empty($messageSticker)) {
			$message = $iN->iN_SelectedMenuIcon('24') . $LANG['isSticker'];
		}
		if (!empty($messageGif)) {
			$message = $iN->iN_SelectedMenuIcon('23') . $LANG['isGif'];
		}
		?>
    <!--MESSAGE-->
    <div class="i_message_wrpper">
        <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL) . 'chat?chat_width=' . $chatID; ?>">
        <div class="i_message_wrapper transition">
            <div class="i_message_owner_avatar"><div class="i_message_avatar"><img src="<?php echo filter_var($chatUserAvatar, FILTER_SANITIZE_STRING); ?>" alt="<?php echo filter_var($chatUserFullName, FILTER_SANITIZE_STRING); ?>"></div></div>
            <div class="i_message_info_container">
                <div class="i_message_owner_name"><?php echo filter_var($chatUserFullName, FILTER_SANITIZE_STRING); ?><?php echo html_entity_decode($publisherGender); ?></div>
                <div class="i_message_i"><?php echo $urlHighlight->highlightUrls($message); ?></div>
            </div>
        </div>
        </a>
         
    </div>
    <!--/MESSAGE-->
    <?php }}?>
      </div>
      <?php if (empty($Notifications) && !isset($Notifications)) {?>
      <div class="no_not_here tabing flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('104')); ?></div>
      <?php }?>
  </div>
  <div class="footer_container messages"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>chat"><?php echo filter_var($LANG['see_all_in_messenger'], FILTER_SANITIZE_STRING); ?></a></div>
  </div>
</div>