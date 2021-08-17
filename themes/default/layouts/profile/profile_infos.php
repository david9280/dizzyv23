<div class="i_profile_container">
   <div class="i_profile_cover_blur" style="background-image:url(<?php echo filter_var($p_profileCover, FILTER_SANITIZE_STRING); ?>);"></div>
   <div class="i_profile_i_container">
       <div class="i_profile_infos_wrapper">
          <!--PROFILE COVER AND AVATAR-->
          <div class="i_profile_cover" style="background-image:url(<?php echo filter_var($p_profileCover, FILTER_SANITIZE_STRING); ?>);">
              <div class="i_profile_avatar_container">
                  <div class="i_profile_avatar_wrp">
                     <div class="i_profile_avatar" style="background-image:url(<?php echo filter_var($p_profileAvatar, FILTER_SANITIZE_STRING); ?>);"><?php echo html_entity_decode($p_is_creator); ?></div>
                  </div>
              </div>
          </div>
          <!--/PROFILE COVER AND AVATAR-->
          <!--USER PROFILE INFO-->
          <div class="i_u_profile_info">
               <div class="i_u_name">
                   <?php echo filter_var($p_userfullname, FILTER_SANITIZE_STRING); ?><?php echo html_entity_decode($pVerifyStatus); ?> <?php echo html_entity_decode($pGender); ?>
               </div>
               <?php echo filter_var($pTime, FILTER_SANITIZE_STRING); ?>
               <div class="i_p_cards">
                  <?php echo html_entity_decode($pCategory); ?>
               </div>
               <?php if ($p_friend_status != 'me') {?>
               <div class="i_p_cards">
                  <?php echo html_entity_decode($sendMessage); ?>
                  <div class="i_btn_item transition copyUrl" data-clipboard-text="<?php echo filter_var($profileUrl, FILTER_SANITIZE_STRING); ?>">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('30')); ?>
                  </div>
                  <div class="i_btn_item <?php echo filter_var($blockBtn, FILTER_SANITIZE_STRING); ?> transition" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('64')); ?>
                  </div>
                  <?php if ($p_friend_status != 'subscriber') {?>
                    <div class="i_fw<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?> transition <?php echo filter_var($flwrBtn, FILTER_SANITIZE_STRING); ?>" id="i_btn_like_item" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                      <?php echo html_entity_decode($flwBtnIconText); ?>
                    </div>
                  <?php }?>
               </div> 
               <?php 
               if($pCertificationStatus == '2' && $pValidationStatus == '2' && $feesStatus == '2'){ 
               ?>
               <div class="i_p_items_box">
                    <?php if ($p_friend_status != 'subscriber') {?>
                        <div class="i_btn_become_fun <?php echo filter_var($subscBTN, FILTER_SANITIZE_STRING); ?> transition" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51')) . $LANG['become_a_subscriber']; ?>
                        </div>
                    <?php } else {?>
                        <div class="i_btn_unsubscribe transition unSubU" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51')) . $LANG['unsubscribe']; ?>
                        </div>
                    <?php }?>
               </div>
               <?php }?>
               <?php }?>
               <div class="i_p_items_box_">
                    <div class="i_btn_item_box transition">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('67')); ?> <?php echo filter_var($totalPost, FILTER_SANITIZE_STRING); ?>
                    </div>
                    <div class="i_btn_item_box transition">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('68')); ?> <?php echo filter_var($totalImagePost, FILTER_SANITIZE_STRING); ?>
                    </div>
                    <div class="i_btn_item_box transition">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52')); ?> <?php echo filter_var($totalVideoPosts, FILTER_SANITIZE_STRING); ?>
                    </div>
               </div>
               <?php if ($p_profileBio) {?>
               <div class="i_p_item_box">
                   <div class="i_p_bio"><?php echo html_entity_decode($p_profileBio); ?></div>
               </div>
               <?php }?>
          </div>
          <!--/USER PROFILE INFO-->
       </div>
   </div>
</div>