<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['social_logins'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf">  
            <form enctype="multipart/form-data" method="post" id="storageSettings">
            <?php 
               $socialLoginList = $iN->iN_SocialLoginsList();
               if($socialLoginList){
                   foreach($socialLoginList as $slData) {
                       $slID = $slData['s_id'];
                       $sKey = $slData['s_key'];
                       $sKeyOne = $slData['s_key_one'];
                       $sKeyTwo = $slData['s_key_two'];
                       $sLoginIcon = $slData['s_icon'];
                       $sStatus = $slData['s_status'];
                    ?>
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG[$sKey], FILTER_SANITIZE_STRING);?> CLIEND ID</div>
                    <div class="irow_box_right">
                        <input type="text" name="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>_cliend_id" class="i_input flex_" value="<?php echo filter_var($sKeyOne, FILTER_SANITIZE_STRING);?>">
                    </div>
                </div>
                <!---->
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG[$sKey], FILTER_SANITIZE_STRING);?> ICON ID</div>
                    <div class="irow_box_right">
                        <input type="text" name="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>_icon" class="i_input flex_" value="<?php echo filter_var($sLoginIcon, FILTER_SANITIZE_STRING);?>">
                    </div>
                </div>
                <!---->
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG[$sKey], FILTER_SANITIZE_STRING);?> SECRET KEY</div>
                    <div class="irow_box_right">
                        <input type="text" name="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>_cliend_secret" class="i_input flex_" value="<?php echo filter_var($sKeyTwo, FILTER_SANITIZE_STRING);?>">
                    </div>
                </div>
                <!----> 
                <!---->
                <div class="i_general_row_box_item flex_ tabing__justify" >
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG[$sKey], FILTER_SANITIZE_STRING);?> Status</div>
                    <div class="irow_box_right">
                        <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                            <label class="el-switch el-switch-yellow" for="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>_status">
                            <input type="checkbox" class="slog" data-type="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>" id="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>_status" <?php echo filter_var($sStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="1" checked="checked"' : 'value="0"';?>>
                            <span class="el-switch-style"></span>  
                            </label> 
                            <input type="hidden" name="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>_status" id="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>_statuss" <?php echo filter_var($sStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="1" checked="checked"' : 'value="0"';?>>
                            <div class="success_tick tabing flex_ sec_one <?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>_status"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                        </div>
                        <div class="rec_not" style="padding-left:15px;"><?php echo preg_replace( '/{.*?}/', $sKey, $LANG['social_login_status_not']);?></div>
                    </div>
                </div>
                <!---->  
            <?php }   
               }
            ?> 
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="sLoginSet">
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            </form>
       </div>
       <!----> 
        
    </div>
</div> 