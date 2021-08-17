<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
             <?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['are_you_sure_want_to_block']); ?>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--Sharing POST DETAILS-->
            <div class="i_block_user_nots_wrapper">
                <div class="i_blck_in">
                    <!--BLOCK ITEM -->
                    <div class="i_redtrict_u" data-s="1">
                        <div class="i_block_choose">
                            <div class="block_a_status blockboxActive" id="bl_s_1"></div>
                        </div>
                        <?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['restrict']); ?></div>
                    <div class="i_block_i_item"> 
                        <div class="i_block_not_title"><?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['no_longer_be_able_to']); ?></div>
                        <div class="i_block_not_list"> 
                            <li><?php echo filter_var($LANG['tag_you'], FILTER_SANITIZE_STRING);?></li>
                            <li><?php echo filter_var($LANG['message_you'], FILTER_SANITIZE_STRING);?></li>
                            <li><?php echo filter_var($LANG['comment_on_your_post'], FILTER_SANITIZE_STRING);?></li>
                        </div>
                        <div class="i_block_not_title"><?php echo filter_var($LANG['also_you_no_longer_be_able_to'], FILTER_SANITIZE_STRING);?></div>
                        <div class="i_block_not_list"> 
                            <li><?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['tag_you_you']); ?></li>
                            <li><?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['message_you_you']); ?></li>
                            <li><?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['comment_on_his_post']); ?></li>
                        </div>
                    </div>
                    <!--/BLOCK ITEM-->
                    <!--BLOCK ITEM -->
                    <div class="i_redtrict_u"  data-s="2">
                        <div class="i_block_choose">
                            <div class="block_a_status blockboxPassive" id="bl_s_2"></div>
                        </div>
                        <?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['block_completely']); ?></div>
                    <div class="i_block_i_item"> 
                        <div class="i_block_not_title"><?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['no_longer_be_able_to']); ?></div>
                        <div class="i_block_not_list"> 
                            <li><?php echo filter_var($LANG['see_your_post_on_your_timeline'], FILTER_SANITIZE_STRING);?></li>
                            <li><?php echo filter_var($LANG['can_not_follow_you'], FILTER_SANITIZE_STRING);?></li>
                            <li><?php echo filter_var($LANG['can_not_subscribe_you'], FILTER_SANITIZE_STRING);?></li>
                            <li><?php echo filter_var($LANG['tag_you'], FILTER_SANITIZE_STRING);?></li>
                            <li><?php echo filter_var($LANG['message_you'], FILTER_SANITIZE_STRING);?></li>
                            <li><?php echo filter_var($LANG['comment_on_your_post'], FILTER_SANITIZE_STRING);?></li>
                        </div>
                        <div class="i_block_not_title_plus"><?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['block_unfollow_not']); ?></div>
                        <div class="i_block_not_title_plus"><?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['block_unsubscribe_not']); ?></div>
                        <div class="i_block_not_title_plus"><?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['note_blocker']); ?></div>
                    </div>
                    <!--/BLOCK ITEM-->
                </div>
            </div>
            <!--/Sharing POST DETAILS--> 
            <!--FOOTER-->
            <div class="i_block_box_footer_container">
                <div class="alertBtnRightWithIcon ublk transition" id="<?php echo filter_var($iuID, FILTER_SANITIZE_STRING);?>" data-u="<?php echo filter_var($iuID, FILTER_SANITIZE_STRING);?>" data-bt="1"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('64'));?> <?php echo filter_var($LANG['accept'], FILTER_SANITIZE_STRING);?></div>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/FOOTER-->
       </div>   
   </div>
   <!--/SHARE--> 
</div>