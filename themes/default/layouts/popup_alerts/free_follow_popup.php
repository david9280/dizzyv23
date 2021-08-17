<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in i_sf_box"> 
       <div class="i_modal_content">  
           <!--User Cover & Profile-->
           <div class="i_f_cover_avatar" style="background-image:url('<?php echo filter_var($f_profileCover, FILTER_SANITIZE_STRING);?>');">
               <div class="popClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
               <div class="i_f_avatar_container">
                  <div class="i_f_avatar" style="background-image:url('<?php echo filter_var($f_profileAvatar, FILTER_SANITIZE_STRING);?>');"></div>
               </div>
           </div>
           <!--/User Cover & Profile-->
           <!--User Other Infos-->
            <div class="i_f_other" id="pr_u_id">
              <div class="i_u_name">
                   <a href="<?php echo filter_var($fprofileUrl, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($f_userfullname, FILTER_SANITIZE_STRING);?><?php echo html_entity_decode($fVerifyStatus);?> <?php echo html_entity_decode($fGender);?></a>
              </div>
              <div class="i_u_name_mention">
                   <a href="<?php echo filter_var($fprofileUrl, FILTER_SANITIZE_STRING);?>">@<?php echo filter_var($f_username, FILTER_SANITIZE_STRING);?></a>
              </div>
              <div class="i_s_popup_title">
                 <?php echo filter_var($LANG['subscription_benefits'], FILTER_SANITIZE_STRING);?>
              </div>
              <div class="i_advantages_wrapper">
                   <div class="advantage_box">
                      <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?> <?php echo filter_var($LANG['full_acces_to_conent'], FILTER_SANITIZE_STRING);?>
                   </div>
                   <div class="advantage_box">
                      <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?> <?php echo filter_var($LANG['direct_message_this_user'], FILTER_SANITIZE_STRING);?>
                   </div>
                   <div class="advantage_box">
                      <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?> <?php echo filter_var($LANG['cancel_follow_any_time'], FILTER_SANITIZE_STRING);?>
                   </div>
              </div>
              <!--SUBS BUTTON-->
              <div class="i_free_subscribe">
                   <div class="i_free_flw f_p_follow" data-u="<?php echo filter_var($f_userID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('66'));?><?php echo filter_var($LANG['follow_for_free'], FILTER_SANITIZE_STRING);?></div>
              </div>
              <!--/SUBS BUTTUN-->
           </div>
           <!--/User Other Infos-->
       </div>   
   </div>
   <!--/SHARE--> 
</div> 