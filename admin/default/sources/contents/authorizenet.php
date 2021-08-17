<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['authorizenet_payment'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <!--*********************************--> 
        <!---->
        <div class="i_general_row_box_item flex_ column tabing__justify" >
            <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['test_mode'], FILTER_SANITIZE_STRING);?></div>
                    <label class="el-switch el-switch-yellow" for="authorize_mode">
                      <input type="checkbox" name="authorize_mode" class="chmdPayment" id="authorize_mode" <?php echo filter_var($autHorizePaymentMode, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                    </label>
                <div class="i_chck_text"><?php echo filter_var($LANG['live_mode'], FILTER_SANITIZE_STRING);?></div>
                <div class="success_tick tabing flex_ sec_one authorize_mode"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
            </div> 
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing__justify" >
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['authorizenet_status'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <label class="el-switch el-switch-yellow" for="authorizenet_status">
                    <input type="checkbox" name="authorizenet_status" class="chmdPayment" id="authorizenet_status" <?php echo filter_var($autHorizePaymentStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                    </label> 
                    <div class="success_tick tabing flex_ sec_one authorizenet_status"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['authorizenet_status_not'], FILTER_SANITIZE_STRING);?></div>
            </div>
        </div>
        <!---->  
        <form enctype="multipart/form-data" method="post" id="updatePaymentGataway"> 
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['authorizenet_test_ap_id'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="testAppID" class="i_input flex_" value="<?php echo filter_var($autHorizePaymentTestsApID, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['authorizenet_test_transaction_key'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="testTransactionKEY" class="i_input flex_" value="<?php echo filter_var($autHorizePaymentTestTransitionKey, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['authorizenet_live_api_id'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="liveAppID" class="i_input flex_" value="<?php echo filter_var($autHorizePaymentLiveApID, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['authorizenet_live_transaction_key'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="liveTransactionKEY" class="i_input flex_" value="<?php echo filter_var($autHorizePaymentLiveTransitionkey, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->       
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['authorizenet_crncy'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <div class="i_box_limit flex_ column">
                    <div class="i_limit" data-type="fl_limit"><span class="lmt"><?php echo filter_var($autHorizePaymentCurrency, FILTER_SANITIZE_STRING).'('.$currencys[$autHorizePaymentCurrency].')';?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                    <div class="i_limit_list_container">
                        <div class="i_countries_list border_one column flex_">
                        <?php foreach($currencys as $crncy => $value){?> 
                            <div class="i_s_limit transition border_one gsearch <?php echo filter_var($autHorizePaymentCurrency, FILTER_SANITIZE_STRING) == '' . html_entity_decode($crncy) . '' ? 'choosed' : ''; ?>" id='<?php echo html_entity_decode($crncy); ?>' data-c="<?php echo html_entity_decode($crncy).'('.$value.')';?>" data-type="mb_limit"><?php echo html_entity_decode($crncy).'('.$value.')'; ?></div>
                        <?php }?>
                        </div>
                        <input type="hidden" name="authorizenet_currency" id="upLimit" value="<?php echo filter_var($autHorizePaymentCurrency, FILTER_SANITIZE_STRING);?>">
                    </div>
                    <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['make_sure_for_authorizenet'], FILTER_SANITIZE_STRING);?></div>
                </div>
            </div>
        </div>
        <!---->
        <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
        <div class="admin_approve_post_footer">
            <div class="i_become_creator_box_footer">
                <input type="hidden" name="f" value="updateAuthorizeNet"> 
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
        </div>
        </form>
    </div> 
    
</div> 