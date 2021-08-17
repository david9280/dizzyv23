<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['edit_comment'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--Share More Text-->
            <div class="i_more_text_wrapper">
                <textarea class="more_textarea" id="ed_<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>" dir="auto" rows="5" placeholder="<?php echo filter_var($LANG['write_your_comment'], FILTER_SANITIZE_STRING);?>"><?php if(!empty($commentText)){ echo filter_var($iN->br2nl($commentText), FILTER_SANITIZE_STRING); } ?></textarea>
            </div>
            <!--/Share More Text-->
            <!--Modal Header-->
            <div class="i_modal_g_footer">
                <div class="shareBtn secdt transition" id="<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/Modal Header-->
       </div>   
   </div>
   <!--/SHARE--> 
</div>