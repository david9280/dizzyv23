<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
             <?php echo filter_var($LANG['create_a_paid_live_streaming'], FILTER_SANITIZE_STRING); ?>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--Sharing POST DETAILS-->
            <div class="i_more_text_wrapper">
                <div class="give_a_name"><?php echo filter_var($LANG['give_this_live_stream_a_name'], FILTER_SANITIZE_STRING);?></div>
                <div class="i_live_c_item" style="margin-bottom:15px;"> 
                    <input type="text" name="liveName" id="liveName" class="flnm">
                </div>
               <!---->
               <div class="give_a_name"><?php echo filter_var($LANG['entrace_fee'], FILTER_SANITIZE_STRING);?></div>
               <div class="i_set_subscription_fee">
                    <div class="i_subs_currency"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?></div>
                    <div class="i_subs_price"><input type="text" class="transition aval" id="lsFee" placeholder="3" onkeypress="return event.charCode == 46 || (event.charCode >= 48 &amp;&amp; event.charCode <= 57)" value="<?php echo filter_var($minimumLiveStreamingFee, FILTER_SANITIZE_STRING);?>"></div>
                </div>
                <div class="box_not" style="padding-left:15px;"><?php echo filter_var($LANG['point_wanted_for_streaming'], FILTER_SANITIZE_STRING);?></div>
               <!----> 
               <div class="free_live_not flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('32'));?><?php echo filter_var($LANG['live_stream_not_for_paid'], FILTER_SANITIZE_STRING);?></div>
               <div class="box_not warning_required point_warning"><?php echo filter_var($LANG['min_stream_fee'], FILTER_SANITIZE_STRING);?></div>
               <div class="box_not warning_required title_warning"><?php echo filter_var($LANG['enter_live_stream_title'], FILTER_SANITIZE_STRING);?></div>
               <div class="box_not warning_required require"><?php echo filter_var($LANG['please_fill_all_for_live_stream'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/Sharing POST DETAILS--> 
            <!--FOOTER-->
            <div class="i_block_box_footer_container">
            <div class="alertBtnRightWithIcon createLiveStreamPaid transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?> <?php echo filter_var($LANG['create'], FILTER_SANITIZE_STRING);?></div>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/FOOTER-->
       </div>   
   </div>
   <!--/SHARE--> 
</div>