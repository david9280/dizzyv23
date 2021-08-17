<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['paypal_payment'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <!--*********************************--> 
        <!---->
        <div class="i_general_row_box_item flex_ column tabing__justify" >
            <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['sandbox_mode'], FILTER_SANITIZE_STRING);?></div>
                    <label class="el-switch el-switch-yellow" for="sendboxmode">
                      <input type="checkbox" name="sendboxmode" class="chmdPayment" id="sendboxmode" <?php echo filter_var($payPalPaymentMode, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                    </label>
                <div class="i_chck_text"><?php echo filter_var($LANG['live_mode'], FILTER_SANITIZE_STRING);?></div>
                <div class="success_tick tabing flex_ sec_one sendboxmode"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
            </div> 
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing__justify" >
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['paypal_status'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <label class="el-switch el-switch-yellow" for="paypal_status">
                    <input type="checkbox" name="maintenancemode" class="chmdPayment" id="paypal_status" <?php echo filter_var($payPalPaymentStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                    <span class="el-switch-style"></span>  
                    </label> 
                    <div class="success_tick tabing flex_ sec_one paypal_status"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['paypal_status_not'], FILTER_SANITIZE_STRING);?></div>
            </div>
        </div>
        <!---->  
        <form enctype="multipart/form-data" method="post" id="updatePaymentGataway"> 
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['paypal_sandbox_business_email'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="sndbox_email" class="i_input flex_" value="<?php echo filter_var($payPalPaymentSedboxBusinessEmail, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['paypal_product_business_email'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="product_email" class="i_input flex_" value="<?php echo filter_var($payPalPaymentProductBusinessEmail, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['paypal_currency'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <div class="i_box_limit flex_ column">
                    <div class="i_limit" data-type="fl_limit"><span class="lmt"><?php echo filter_var($payPalCurrency, FILTER_SANITIZE_STRING).'('.$currencys[$payPalCurrency].')';?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                    <div class="i_limit_list_container">
                        <div class="i_countries_list border_one column flex_">
                        <?php foreach($currencys as $crncy => $value){?> 
                            <div class="i_s_limit transition border_one gsearch <?php echo filter_var($payPalCurrency, FILTER_SANITIZE_STRING) == '' . $crncy . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($crncy, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($crncy, FILTER_SANITIZE_STRING).'('.$value.')';?>" data-type="mb_limit"><?php echo filter_var($crncy, FILTER_SANITIZE_STRING).'('.$value.')'; ?></div>
                        <?php }?>
                        </div>
                        <input type="hidden" name="paypal_currency" id="upLimit" value="<?php echo filter_var($payPalCurrency, FILTER_SANITIZE_STRING);?>">
                    </div>
                    <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['make_sure_for_paypal'], FILTER_SANITIZE_STRING);?></div>
                </div>
            </div>
        </div>
        <!---->
        <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
        <div class="admin_approve_post_footer">
            <div class="i_become_creator_box_footer">
                <input type="hidden" name="f" value="updatePaypal"> 
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
        </div>
        </form>
    </div> 
    
</div> 