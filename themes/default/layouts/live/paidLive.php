<?php 
$checkUserPurchasedThisLiveStream = '1';
if($userID != $liveCreator){
    $checkUserPurchasedThisLiveStream = $iN->iN_CheckUserPurchasedThisLiveStream($userID, $liveID);
}
if($checkUserPurchasedThisLiveStream){?>
<div class="live_wrapper">
   <div class="i_liv_stream_video">
       <div class="live_stream_title"><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></div>
       <div class="live_creator">
           <div class="live_creator_wrapper flex_ alignItem">
               <a class="flex_ alignItem" href="<?php echo $base_url.$liveCreatorUserName;?>" target="blank_">
                    <div class="live_owner_avatar"><img src="<?php echo filter_var($liveCreatorAvatar, FILTER_SANITIZE_STRING);?>"></div>
                    <div class="live_owner_name"><?php echo filter_var($liveCreatorFullname, FILTER_SANITIZE_STRING);?></div>
               </a>
           </div>
       </div>
       <div class="online_users">
           <div class="online_users_total"><div class="sumonline">0</div></div>
       </div>
       <?php if($userID == $liveCreator){ ?>
        <div class="camera_choose flex_ tabing" style="top: 50px;">
          <?php echo $iN->iN_SelectedMenuIcon('137');?>
          <div class="camList" id="camera-list"></div>
        </div>
        <div class="camera_close flex_ tabing">
          <?php echo $iN->iN_SelectedMenuIcon('5');?> 
        </div>
        <?php }?>
       <div class="filtvid flex_" id="<?php if($liveCreator == $userID){echo 'main_live_video';}else{echo 'post_live_video';}?>"></div>
       <div class="i_stream_buttons_right">
           <div class="lb_wrapper flex_ tabing">
                <div class="like_live flex_ <?php echo filter_var($likeClass, FILTER_SANITIZE_STRING);?>" id="p_l_l_<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>">
                    <?php echo html_entity_decode($likeIcon);?>
                </div>
                <div class="lp_sum_l flex_ tabing" id="lp_sum_l_<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($likeSum, FILTER_SANITIZE_STRING);?></div>
           </div>
       </div>
    </div>
</div>
<?php 
$iN->iN_InsertMyOnlineStatus($userID, $liveID);
?>
<script type="text/javascript">
$(document).ready(function(){
    var main_live = setInterval(function(){
	var type ='live_calcul'; 

	var data = 'f='+type+'&lid='+<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>;
	  $.ajax({
            type: "POST",
            url: siteurl + "requests/live.php",
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
            },
            success: function(response) {
                var onlineUserCount = response.onlineCount;
                var likeCount = response.likeCount;
                var finished = response.finished; 
                if(onlineUserCount){
                    $(".sumonline").html(onlineUserCount);
                }  
                if(likeCount){
                    $(".lp_sum_l").html(likeCount);
                }  
		    }
	}); 
}, 3000);    
});
</script>
<?php } else { ?> 
<div class="live_wrapper">
   <div class="i_liv_stream_video" style="background-color:#000000;position:relative;">
       <!---->
  <div class="i_modal_bg_in i_modal_display_in">
    <!--SHARE-->
   <div class="i_modal_in_in i_sf_box"> 
       <div class="i_modal_content">  
          <div class="purchase_premium_header flex_ tabing border_top_radius"><?php echo filter_var($LANG['join_the_live_broadcast'], FILTER_SANITIZE_STRING) ;?></div>
          <div class="purchase_post_details">
             
            <div class="wallet-debit-confirm-container flex_">
               <div class="owner_avatar" style="background-image:url(<?php echo filter_var($liveCreatorAvatar, FILTER_VALIDATE_URL);?>);"></div>
               <div class="album-details"><?php echo filter_var($LANG['paying_point_for_live_streaming'], FILTER_SANITIZE_STRING);?></div>
                <div class="album-wanted-point">
                  <div><?php echo html_entity_decode($liveCredit);?></div>
                  <span><?php echo filter_var($LANG['points'], FILTER_SANITIZE_STRING);?></span>
                </div>
            </div>
          </div>
          <div class="i_modal_g_footer">
              <div class="alertBtnRight joinLiveStream transition" id="<?php echo filter_var($liveID, FILTER_SANITIZE_STRING) ;?>"><?php echo filter_var($LANG['confirm'], FILTER_SANITIZE_STRING) ;?></div>
              <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING) ;?></div>
          </div>
       </div>   
   </div>
   <!--/SHARE--> 
   </div> 
   <!---->
    </div>
</div>    
<?php }?>
<?php if($userID == $liveCreator){ ?>
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click",".camera_close", function(){
        var type = 'finishLive';
        var liveID = '<?php echo  $liveID;?>';
        var data = 'f='+type+'&lid='+liveID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                 if(response == 'finished'){
                    window.location.href = siteurl;
                 }
            }
        });
    });
});
</script>
<?php } ?>

