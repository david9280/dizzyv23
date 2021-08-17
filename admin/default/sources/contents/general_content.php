<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['general_settings'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
        <div class="i_general_row_box column flex_" id="general_conf"> 
            <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['main_language'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="chm_limit"><span class="lclt"><?php echo filter_var($LANGNAME[$defaultLanguage], FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_cp_container">
                            <div class="i_countries_list border_one column flex_">
                              <?php foreach($languages as $lang){?> 
                                <div class="i_s_limit transition border_one gsearch setDefault <?php echo filter_var($defaultLanguage, FILTER_SANITIZE_STRING) == '' . $lang['lang_name'] . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($lang['lang_id'], FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($LANGNAME[$lang['lang_name']], FILTER_SANITIZE_STRING);?>" data-type="language"><?php echo filter_var($LANGNAME[$lang['lang_name']], FILTER_SANITIZE_STRING);?></div>
                              <?php }?>
                            </div>
                            <input type="hidden" name="main_lang" id="upcmLimit" value="<?php echo filter_var($availableLength, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['main_lang_not'], FILTER_SANITIZE_STRING);?></div>
                        <div class="success_tick tabing flex_ sec_one up_lng" style="position: absolute; left: 5px; top: 12px;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ column tabing__justify" >
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                  <label class="el-switch el-switch-yellow" for="maintenance_status">
                    <input type="checkbox" name="maintenancemode" class="chmd" id="maintenance_status" <?php echo filter_var($maintenanceMode, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                  </label>
                  <div class="i_chck_text"><?php echo filter_var($LANG['maintenance_mode'], FILTER_SANITIZE_STRING);?></div>
                  <div class="success_tick tabing flex_ sec_one maintenance_status"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['maintenance_mode_not'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ column tabing__justify" >
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                  <label class="el-switch el-switch-yellow" for="email_verification_status">
                    <input type="checkbox" name="email_verification_status" class="chmd" id="email_verification_status" <?php echo filter_var($emailSendStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                  </label>
                  <div class="i_chck_text"><?php echo filter_var($LANG['email_verification_status'], FILTER_SANITIZE_STRING);?></div>
                  <div class="success_tick tabing flex_ sec_one email_verification_status"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['email_verification_not'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ column tabing__justify" >
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                  <label class="el-switch el-switch-yellow" for="register_new">
                    <input type="checkbox" name="register_new" class="chmd" id="register_new" <?php echo filter_var($userCanRegister, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                  </label>
                  <div class="i_chck_text"><?php echo filter_var($LANG['register'], FILTER_SANITIZE_STRING);?></div>
                  <div class="success_tick tabing flex_ sec_one register_new"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['allow_disallow_register'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ column tabing__justify" >
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                  <label class="el-switch el-switch-yellow" for="ipLimit">
                    <input type="checkbox" name="ipLimit" class="chmd" id="ipLimit" <?php echo filter_var($ipLimitStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                  </label>
                  <div class="i_chck_text"><?php echo filter_var($LANG['ip_limit'], FILTER_SANITIZE_STRING);?></div>
                  <div class="success_tick tabing flex_ sec_one ipLimit"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['allow_disallow_register'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!---->  
        </div>     
    </div>
</div> 