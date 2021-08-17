<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['razorpay_payment'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <!--*********************************--> 
        <!---->
        <div class="i_general_row_box_item flex_ column tabing__justify" >
            <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['test_mode'], FILTER_SANITIZE_STRING);?></div>
                    <label class="el-switch el-switch-yellow" for="razorpay_mode">
                      <input type="checkbox" name="razorpay_mode" class="chmdPayment" id="razorpay_mode" <?php echo filter_var($razorPayPaymentMode, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                    </label>
                <div class="i_chck_text"><?php echo filter_var($LANG['live_mode'], FILTER_SANITIZE_STRING);?></div>
                <div class="success_tick tabing flex_ sec_one razorpay_mode"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
            </div> 
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing__justify" >
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['razorpay_status'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <label class="el-switch el-switch-yellow" for="razorpay_status">
                    <input type="checkbox" name="razorpay_status" class="chmdPayment" id="razorpay_status" <?php echo filter_var($razorPayPaymentStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                    </label> 
                    <div class="success_tick tabing flex_ sec_one razorpay_status"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['razorpay_status_not'], FILTER_SANITIZE_STRING);?></div>
            </div>
        </div>
        <!---->  
        <form enctype="multipart/form-data" method="post" id="updatePaymentGataway"> 
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['razorpay_testing_key_id'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="razorTestKey" class="i_input flex_" value="<?php echo filter_var($razorPayPaymentTestKeyID, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['razorpay_testing_secret_key'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="razorTestSecret" class="i_input flex_" value="<?php echo filter_var($razorPayPaymentTestSecretKey, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['razorpay_live_key_id'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="razorLiveKey" class="i_input flex_" value="<?php echo filter_var($razorPayPaymentLiveKeyID, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['razorpay_live_secret_key'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="razorLiveSecret" class="i_input flex_" value="<?php echo filter_var($razorPayPaymentLiveSecretKey, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->       
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['razorpay_crncy'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <div class="i_box_limit flex_ column">
                    <div class="i_limit" data-type="fl_limit"><span class="lmt"><?php echo filter_var($razorPayPaymentCurrency, FILTER_SANITIZE_STRING).'('.$currencys[$razorPayPaymentCurrency].')';?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                    <div class="i_limit_list_container">
                        <div class="i_countries_list border_one column flex_">
                        <?php foreach($currencys as $crncy => $value){?> 
                            <div class="i_s_limit transition border_one gsearch <?php echo filter_var($razorPayPaymentCurrency, FILTER_SANITIZE_STRING) == '' . $crncy . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($crncy, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($crncy, FILTER_SANITIZE_STRING).'('.$value.')';?>" data-type="mb_limit"><?php echo filter_var($crncy, FILTER_SANITIZE_STRING).'('.$value.')'; ?></div>
                        <?php }?>
                        </div>
                        <input type="hidden" name="razorpay_crncy" id="upLimit" value="<?php echo filter_var($razorPayPaymentCurrency, FILTER_SANITIZE_STRING);?>">
                    </div>
                    <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['make_sure_for_razorpay'], FILTER_SANITIZE_STRING);?></div>
                </div>
            </div>
        </div>
        <!---->
        <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
        <div class="admin_approve_post_footer">
            <div class="i_become_creator_box_footer">
                <input type="hidden" name="f" value="updateRazorPay"> 
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
        </div>
        </form>
    </div> 
    
</div> 