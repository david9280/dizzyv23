<div class="live_wrapper">
   <div class="i_liv_stream_video">
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
        <div class="camera_choose flex_ tabing" style="top: 40px;">
          <?php echo $iN->iN_SelectedMenuIcon('137');?>
          <div class="camList" id="camera-list"></div>
        </div>
        <div class="camera_close flex_ tabing" style="top: 95px;">
          <?php echo $iN->iN_SelectedMenuIcon('5');?> 
        </div>
        <?php }?>
       <div class="count_time flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('115'));?><?php echo filter_var($remaminingTime, FILTER_SANITIZE_STRING).$LANG['minutes_left'];?></div>
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
                  var fTime = response.time;
                  if(onlineUserCount){
                     $(".sumonline").html(onlineUserCount);
                  } 
                  if(fTime){
                    $(".count_time").html(fTime);
                  }
                  if(likeCount){
                     $(".lp_sum_l").html(likeCount);
                  } 
                  if(finished){
                    window.location.href = finished;
                  }
		    }
	});

}, 3000);    
});
</script>
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