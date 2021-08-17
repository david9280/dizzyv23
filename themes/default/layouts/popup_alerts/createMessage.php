<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
             <?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['shart_a_chat_with']); ?>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--Sharing POST DETAILS-->
            <div class="i_more_text_wrapper">
                <textarea class="more_textarea" id="sendNewM" dir="auto" rows="5" placeholder="Write something about the post!"></textarea>
            </div>
            <!--/Sharing POST DETAILS--> 
            <!--FOOTER-->
            <div class="i_block_box_footer_container">
                <div class="alertBtnRightWithIcon sndNewMessage transition" id="<?php echo filter_var($iuID, FILTER_SANITIZE_STRING);?>" data-u="<?php echo filter_var($iuID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('26'));?> <?php echo filter_var($LANG['send_message'], FILTER_SANITIZE_STRING);?></div>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/FOOTER-->
       </div>   
   </div>
   <!--/SHARE--> 
</div>