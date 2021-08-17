<?php 
if($conversationData){
    foreach($conversationData as $conData){
        $cMessageID = $conData['con_id'];
        $cUserOne = $conData['user_one'];
        $cUserTwo = $conData['user_two'];
        $cMessage = isset($conData['message']) ? $conData['message'] : NULL;
        $cMessageTime = $conData['time'];
        $ip = $iN->iN_GetIPAddress();
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
        if($query && $query['status'] == 'success') {
           date_default_timezone_set($query['timezone']); 
        }
        $message_time = date("c", $cMessageTime);
        $convertMessageTime = strtotime($message_time); 
        $netMessageHour = date('H:i', $convertMessageTime);
        $cFile = $conData['file'];
        $cStickerUrl = isset($conData['sticker_url']) ? $conData['sticker_url'] : NULL;
        $cGifUrl = isset($conData['gifurl']) ? $conData['gifurl'] : NULL;
        $mSeenStatus = $conData['seen_status'];
        $msgDots = '';
        $imStyle = '';
        $seenStatus = '';
        if($cUserOne == $userID){
            $mClass = 'me';
            $msgOwnerID = $cUserOne; 
            $lastM = ''; 
            if(!empty($cFile)){
                $imStyle = 'mmi_i';
            }
            $timeStyle = 'msg_time_me';
            $seenStatus = '<span class="seenStatus flex_ notSeen">'.$iN->iN_SelectedMenuIcon('94').'</span>';
            if($mSeenStatus == '1'){
                $seenStatus = '<span class="seenStatus flex_ seen">'.$iN->iN_SelectedMenuIcon('94').'</span>';
            } 
        }else{
            $mClass = 'friend';
            $msgOwnerID = $cUserOne; 
            $lastM = 'mm_'.$msgOwnerID;
            if(!empty($cFile)){
                $imStyle = 'mmi_if';
            }
            $timeStyle = 'msg_time_fri';
        }
        $msgOwnerAvatar = $iN->iN_UserAvatar($msgOwnerID, $base_url);
        $styleFor = '';
        if($cStickerUrl){
           $styleFor = 'msg_with_sticker';
           $cMessage = '<img class="mStick" src="'.$cStickerUrl.'">';
        }
        if($cGifUrl){
            $styleFor = 'msg_with_gif';
            $cMessage = '<img class="mGifM" src="'.$cGifUrl.'">';
        }
?>
   <!---->
   <div class="msg <?php echo filter_var($lastM, FILTER_SANITIZE_STRING);?>" id="msg_<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING);?>">
       <div class="msg_<?php echo filter_var($mClass, FILTER_SANITIZE_STRING).' '.$styleFor;?>"> 
           <div class="msg_o_avatar"><img src="<?php echo filter_var($msgOwnerAvatar, FILTER_SANITIZE_STRING);?>"></div>
           <div class="msg_txt"><?php echo filter_var($iN->sanitize_output($cMessage, $base_url), FILTER_SANITIZE_STRING);?></div>
           <?php if($mClass == 'me'){?>
           <div class="me_btns_cont transition">
               <div class="me_btns_cont_icon smscd flex_ tabing" id="<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('16'));?></div>
               <div class="me_msg_plus msg_set_plus_<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING);?>">
                    <!--MENU ITEM-->
                    <div class="i_post_menu_item_out transition">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?> <?php echo filter_var($LANG['delete_message'], FILTER_SANITIZE_STRING);?>
                    </div>
                    <!--/MENU ITEM-->
               </div>
           </div>  
           <?php }?>
        </div>
        <div class="<?php echo filter_var($timeStyle, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($seenStatus).$netMessageHour;?></div>
   </div>
   <!---->
<?php } }?>