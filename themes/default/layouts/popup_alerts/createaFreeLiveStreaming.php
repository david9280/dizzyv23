<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
           <?php 
           $currentDateNumber = '1';
           $finishDateNumber = '2';
           if($l_Time){
            $currentDateNumber = date('d', $currentTime);
            $finishDateNumber = date('d', $l_Time);
           } 
           if($l_Time && $currentDateNumber == $finishDateNumber){ 
             if($currentTime > $l_Time){ 
                ?>
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['create_a_free_live_streaming'], FILTER_SANITIZE_STRING); ?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
                </div>
                <!--/Modal Header--> 
                <!--Sharing POST DETAILS-->
                <div class="i_more_text_wrapper">
                    <?php 
                    if($currentDateNumber == $finishDateNumber){
                    ?>
                    <?php echo filter_var($LANG['filled_daily_live_broadcast'], FILTER_SANITIZE_STRING);?>
                    <?php }else{?>
                    <div class="give_a_name"><?php echo filter_var($LANG['give_this_live_stream_a_name'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_live_c_item"> 
                    <input type="text" name="liveName" id="liveName" class="flnm">
                    </div>
                    <div class="free_live_not flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('32'));?><?php echo filter_var($LANG['free_live_not'], FILTER_SANITIZE_STRING);?></div>
                    <?php }?>
                </div>
                <!--/Sharing POST DETAILS--> 
                <!--FOOTER-->
                <div class="i_block_box_footer_container"> 
                    <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
                </div>
                <!--/FOOTER-->     
           <?php }else{ ?>
            <!--Modal Header-->
            <div class="i_modal_g_header">
             <?php echo filter_var($LANG['create_a_free_live_streaming'], FILTER_SANITIZE_STRING); ?>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
             </div>
            <!--/Modal Header--> 
            <!--Sharing POST DETAILS-->
            <div class="i_more_text_wrapper">
                <?php echo filter_var($LANG['already_created_live_breadcast'], FILTER_SANITIZE_STRING);?>
            </div>
            <!--/Sharing POST DETAILS-->  
            <!--FOOTER-->
            <div class="i_block_box_footer_container">
                <a href="<?php echo $base_url.'live/'.$userName;?>"><div class="alertBtnRightWithIcon continue transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('98'));?> <?php echo filter_var($LANG['continue'], FILTER_SANITIZE_STRING);?></div></a>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/FOOTER-->
           <?php }
           }else{ ?>
            <!--Modal Header-->
            <div class="i_modal_g_header">
             <?php echo filter_var($LANG['create_a_free_live_streaming'], FILTER_SANITIZE_STRING); ?>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
             </div>
            <!--/Modal Header--> 
            <!--Sharing POST DETAILS-->
            <div class="i_more_text_wrapper">
                <div class="give_a_name"><?php echo filter_var($LANG['give_this_live_stream_a_name'], FILTER_SANITIZE_STRING);?></div>
                <div class="i_live_c_item"> 
                  <input type="text" name="liveName" id="liveName" class="flnm">
                </div>
                <div class="free_live_not flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('32'));?><?php echo filter_var($LANG['free_live_not'], FILTER_SANITIZE_STRING);?></div>
                <?php echo html_entity_decode($liveStreamNotForNonCreators);?>
                <div class="box_not warning_required require"><?php echo filter_var($LANG['enter_live_stream_title'], FILTER_SANITIZE_STRING);?></div>
                <div class="box_not warning_required name_short"><?php echo filter_var($LANG['stream_name_wrning'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/Sharing POST DETAILS--> 
            <!--FOOTER-->
            <div class="i_block_box_footer_container">
                <div class="alertBtnRightWithIcon createLiveStream transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?> <?php echo filter_var($LANG['create'], FILTER_SANITIZE_STRING);?></div>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/FOOTER-->
           <?php }
           ?>
            
       </div>   
   </div>
   <!--/SHARE--> 
</div>