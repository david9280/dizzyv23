<div class="i_right_box_header">
 <?php echo filter_var($LANG['best_creators_last_week'], FILTER_SANITIZE_STRING);?>
</div>
<div class="i_topinoras_wrapper">
<?php 
$tops = $iN->iN_PopularUsersFromLastWeek(); 
if($tops){
    $i = '1';
   foreach($tops as $td){
       $popularuserID = $td['post_owner_id'];
       $uD = $iN->iN_GetUserDetails($popularuserID);
       $popularUserAvatar = $iN->iN_UserAvatar($popularuserID, $base_url);
       $popularUserName = $td['i_username'];
       $popularUserFullName = $td['i_user_fullname'];
       $subscBTN = '';
       if(!$logedIn){
           $userID = '';
           $subscBTN = 'loginForm'; 
       }
       $getFriendStatusBetweenTwoUser = $iN->iN_GetRelationsipBetweenTwoUsers($userID, $popularuserID);
       $flwrBtn = '';
        if($getFriendStatusBetweenTwoUser == 'flwr'){
            $flwrBtn = '';
        }else{ 
            if($popularuserID != $userID){
               $flwrBtn = '<div class="i_sub_flw"><div class="i_follow_me i_follow transition i_btn_like_item '.$subscBTN.' free_follow i_fw'.$popularuserID.'" id="i_btn_like_item" data-u="'.$popularuserID.'">'.$iN->iN_SelectedMenuIcon('66').$LANG['follow'].'</div></div>';
            }
        }
?>
<!--TOP iNORA BOX-->
<div class="i_top_inora transition">
    <div class="i_top_inora_number"><span><?php echo filter_var($i, FILTER_SANITIZE_STRING);?></span></div>
       <div class="i_top_inora_avatar_wrapper">
        <div class="i_top_u">
         <div class="i_hot_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('9'));?></div>
         <div class="i_top_inora_avatar">
            <img src="<?php echo filter_var($popularUserAvatar, FILTER_SANITIZE_STRING);?>" alt="<?php echo filter_var($popularUserFullName, FILTER_SANITIZE_STRING);?>">
         </div>
         </div>
       </div> 
       <div class="i_top_inora_user_name_hot_name">
           <div class="i_top_inora_user_name"><a class="truncated" style="display:block;" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$popularUserName;?>"><?php echo filter_var($popularUserFullName, FILTER_SANITIZE_STRING);?></a> <div class="i_plus_s"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('11'));?></div></div>
           <div class="i_top_inora_hot_name">
               <?php 
                if($i == '1'){
                   echo filter_var($LANG['super_active'], FILTER_SANITIZE_STRING);
                } else if($i == '2'){
                   echo filter_var($LANG['very_active'], FILTER_SANITIZE_STRING);
                } else if($i == '3'){
                   echo filter_var($LANG['active_'], FILTER_SANITIZE_STRING);
                } else if($i == '4'){
                   echo filter_var($LANG['active_'], FILTER_SANITIZE_STRING);
                } else {
                   echo filter_var($LANG['active_'], FILTER_SANITIZE_STRING);
                }?>
           </div>
       </div>
       <?php echo html_entity_decode($flwrBtn);?>
   </div>
<!--/TOP iNORA BOX-->
<?php $i++;  }
}
?>  
</div>