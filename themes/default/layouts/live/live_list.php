<?php 
$lastPostID = isset($_POST['last']) ? $_POST['last'] : '';
$pages = array('paid','free');
if(isset($liveListType) && !empty($liveListType) && in_array($liveListType, $pages)){
  $liveListData = $iN->iN_LiveStreaminsList($liveListType, $lastPostID, $showingNumberOfPost);
  if($liveListData){
     foreach($liveListData as $liData){
         $liveID = $liData['live_id'];
         $liveName = $liData['live_name'];
         $liveCredit = isset($liData['live_credit']) ? $liData['live_credit'] : NULL;
         $liveCreatorID = $liData['live_uid_fk'];
         $liveUserAvatar = $iN->iN_UserAvatar($liveCreatorID, $base_url);
         $liveUserCover = $iN->iN_UserCover($liveCreatorID, $base_url);
         $liveCreatorUserName = $liData['i_username'];
         $liveCreatorUserFullName = $liData['i_user_fullname'];
         $liveFinishTime = $liData['finish_time'];
         $remaining = $liveFinishTime - time();
         $remaminingTime = date('i', $remaining);
         $checkLiveStreamPurchased = '';
         if($logedIn == '1'){
           $checkLiveStreamPurchased = $iN->iN_CheckUserPurchasedThisLiveStream($userID, $liveID);
         }
         if($logedIn != '1'){
            $userID = '1';
         }
?>
   <div class="live_list_box_wrapper mor" data-last="<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>">
       <div class="live_list_box_wrapper_in">
         <div class="live_creator_cover flex_" style="background-image:url(<?php echo filter_var($liveUserCover, FILTER_SANITIZE_STRING);?>);">
            <div class="live_s">LIVE</div>
            <?php if(!$liveCredit){?>
            <div class="count_time flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('115'));?><?php echo filter_var($remaminingTime, FILTER_SANITIZE_STRING).$LANG['minutes_left'];?></div>
            <?php }?>
            <img class="live_creator_cover_img" src="<?php echo filter_var($liveUserCover, FILTER_SANITIZE_STRING);?>">
         </div>
         <div class="live_creator_avatar">
            <div class="live_creator_avatar_middle">
               <div class="i_live_profile_avatar" style="background-image:url(<?php echo filter_var($liveUserAvatar, FILTER_SANITIZE_STRING);?>);"></div>
            </div>
         </div>
         <div class="live_stream_creator_name">
             <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).filter_var($liveCreatorUserName, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($liveCreatorUserFullName, FILTER_SANITIZE_STRING);;?></a>
         </div>
         <div class="live_stream_creator_name">
             <?php echo filter_var($liveName,FILTER_SANITIZE_STRING);?>
         </div>
         <?php if($liveCredit && $userID != $liveCreatorID && !$checkLiveStreamPurchased){ ?>
          <div class="pr_liv">
            <!---->
            <div class="purchaseLiveButton flex_ tabing" id="<?php echo filter_var($liveID,FILTER_SANITIZE_STRING);?>">
                <?php echo filter_var($LANG['join'], FILTER_SANITIZE_STRING);?>
                <strong  class="tabing flex_" style="display:inline-flex;">
                    <?php echo number_format($liveCredit);?>
                    <span class="prcsic"> 
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
                    </span>
                </strong> 
            </div>
            <!---->
            </div>
         <?php }else{?>
          <?php if($logedIn != '1'){?>
            <div class="pr_liv loginForm">
              <!---->
              <div class="purchaseLiveButton flex_ tabing" id="<?php echo filter_var($liveID,FILTER_SANITIZE_STRING);?>">
                  <?php echo filter_var($LANG['join'], FILTER_SANITIZE_STRING);?> 
              </div>
              <!---->
            </div>
          <?php }else{ ?>
            <a href="<?php echo $base_url.'live/'.$liveCreatorUserName;?>">
              <div class="pr_liv">
                <!---->
                <div class="purchaseLiveButton flex_ tabing" id="<?php echo filter_var($liveID,FILTER_SANITIZE_STRING);?>">
                    <?php echo filter_var($LANG['join'], FILTER_SANITIZE_STRING);?> 
                </div>
                <!---->
                </div>
            </a>
          <?php }?>
          
         <?php } ?>
       </div>
   </div>
<?php }
  }else{ 
    echo '
    <div class="noPost">
        <div class="noPostIcon">'.$iN->iN_SelectedMenuIcon('54').'</div>
        <div class="noPostNote">'.$LANG['no_live_streams'].'</div>
    </div>
   ';
  }
}
?>