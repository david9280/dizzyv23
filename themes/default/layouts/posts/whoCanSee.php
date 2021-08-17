<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['select_privacy'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--Sharing POST DETAILS-->
            <div class="i_sharing_post_wrapper">
                <div class="i_wcs_in">
                    <!--Who Can See Item-->
                    <div class="who_can_see_pop_item transition wcs<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?> <?php echo filter_var($whoCSee, FILTER_SANITIZE_STRING) == '1' ? "selectedWhoCanSee" : NULL; ?>" id="<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>" data-id="1">
                        <div class="whoCanSeeIcon">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('50'));?>
                        </div>
                        <div class="whoCanSeeTit"><?php echo filter_var($LANG['weveryone'], FILTER_SANITIZE_STRING);?></div>
                        <div class="i_whoCC">
                            <div class="whoCC">
                                <div class="whoCCbox wcsc_<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?> <?php echo filter_var($whoCSee, FILTER_SANITIZE_STRING) == '1' ? "whoCCboxActive" : "whoCCboxPassive"; ?>"></div>
                            </div>
                        </div>
                    </div>
                    <!--/Who Can See Item-->
                    <!--Who Can See Item-->
                    <div class="who_can_see_pop_item transition wcs<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?> <?php echo filter_var($whoCSee, FILTER_SANITIZE_STRING) == '2' ? "selectedWhoCanSee" : NULL; ?>" id="<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>" data-id="2">
                        <div class="whoCanSeeIcon">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('15'));?>
                        </div>
                        <div class="whoCanSeeTit"><?php echo filter_var($LANG['wfollowers'], FILTER_SANITIZE_STRING);?></div>
                        <div class="i_whoCC">
                            <div class="whoCC">
                                <div class="whoCCbox wcsc_<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?> <?php echo filter_var($whoCSee, FILTER_SANITIZE_STRING) == '2' ? "whoCCboxActive" : "whoCCboxPassive"; ?>"></div>
                            </div>
                        </div>
                    </div>
                    <!--/Who Can See Item-->
                    <!--Who Can See Item-->
                    <div class="who_can_see_pop_item transition wcs<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?> <?php echo filter_var($whoCSee, FILTER_SANITIZE_STRING) == '3' ? "selectedWhoCanSee" : NULL; ?>" id="<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>" data-id="3">
                        <div class="whoCanSeeIcon">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51'));?>
                        </div>
                        <div class="whoCanSeeTit"><?php echo filter_var($LANG['wsubscribers'], FILTER_SANITIZE_STRING);?></div>
                        <div class="i_whoCC">
                            <div class="whoCC">
                                <div class="whoCCbox wcsc_<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?> <?php echo filter_var($whoCSee, FILTER_SANITIZE_STRING) == '3' ? "whoCCboxActive" : "whoCCboxPassive"; ?>"></div>
                            </div>
                        </div>
                    </div>
                    <!--/Who Can See Item-->
                </div>
            </div>
            <!--/Sharing POST DETAILS--> 
       </div>   
   </div>
   <!--/SHARE--> 
</div>