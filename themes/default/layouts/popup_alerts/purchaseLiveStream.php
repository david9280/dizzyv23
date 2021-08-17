<div class="i_modal_bg_in">
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