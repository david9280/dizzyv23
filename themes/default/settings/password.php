<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('6'));?><?php echo filter_var($LANG['password'], FILTER_SANITIZE_STRING);?></div>
       <div class="i_moda_header_nt"><?php echo html_entity_decode($LANG['password_page_not']);?></div>
    </div> 
    <form enctype="multipart/form-data" method="post" id="myPasswordChange">
    <div class="i_settings_wrapper_items">  
         <div class="payouts_form_container">   
            <!---->
            <div class="i_settings_wrapper_item">
                <div class="i_settings_item_title"><?php echo filter_var($LANG['cur_password'], FILTER_SANITIZE_STRING);?></div>
                <div class="i_settings_item_title_for">
                    <input type="password" name="crn_password" class="flnm" id="crn_password"> 
                </div> 
            </div>
            <!----> 
            <!---->
            <div class="i_settings_wrapper_item">
                <input type="hidden" name="f" value="editMyPass">
                <div class="i_settings_item_title"><?php echo filter_var($LANG['nw_password'], FILTER_SANITIZE_STRING);?></div>
                <div class="i_settings_item_title_for">
                    <input type="password" name="nw_password" class="flnm" id="nw_password"> 
                </div> 
            </div>
            <!----> 
            <!---->
            <div class="i_settings_wrapper_item">
                <div class="i_settings_item_title"><?php echo filter_var($LANG['confrm_new_password'], FILTER_SANITIZE_STRING);?></div>
                <div class="i_settings_item_title_for">
                    <input type="password" name="confirm_pass" class="flnm" id="confirm_pass"> 
                </div> 
            </div>
            <!----> 
         </div>
    </div> 
    <div class="i_settings_wrapper_item warning_not_mach">
       <?php echo filter_var($LANG['new_pass_not_match'], FILTER_SANITIZE_STRING);?>
    </div>
    <div class="i_settings_wrapper_item warning_write_current_password">
       <?php echo filter_var($LANG['please_write_crnt_pass'], FILTER_SANITIZE_STRING);?>
    </div>
    <div class="i_settings_wrapper_item warning_not_correct">
       <?php echo filter_var($LANG['warning_current_password_not_correct'], FILTER_SANITIZE_STRING);?>
    </div>
    <div class="i_settings_wrapper_item successNot">
          <?php echo filter_var($LANG['profile_updated_success'], FILTER_SANITIZE_STRING);?>
    </div>
    <div class="i_settings_wrapper_item no_new_password_wrote">
          <?php echo filter_var($LANG['no_new_password_wrote'], FILTER_SANITIZE_STRING);?>
    </div>
    <div class="i_settings_wrapper_item minimum_character_not">
          <?php echo filter_var($LANG['minimum_character_not'], FILTER_SANITIZE_STRING);?>
    </div>
    <div class="i_settings_wrapper_item not_contain_whitespace">
          <?php echo filter_var($LANG['not_contain_whitespace'], FILTER_SANITIZE_STRING);?>
    </div>
     <div class="i_become_creator_box_footer tabing"> 
        <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_mypass"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
     </div>
    </form> 
  </div>
</div> 