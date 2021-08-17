<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('77'));?><?php echo filter_var($LANG['payout_methods'], FILTER_SANITIZE_STRING);?></div>
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['payout_methods_not'], FILTER_SANITIZE_STRING);?></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
    <div class="payouts_form_container"> 
   <div class="i_payout_methods_form_container">
       <form id="bankForm">
        <!--SET SUBSCRIPTION FEE BOX-->
        <div class="i_set_subscription_fee_box">
            <div class="i_sub_not">
            <?php echo filter_var($LANG['paypal'], FILTER_SANITIZE_STRING);?> 
            </div>  
            <div class="i_sub_not_check">
            <?php echo filter_var($LANG['if_default_not'], FILTER_SANITIZE_STRING);?>
            <div class="i_sub_not_check_box pyot"> 
                <div class="el-radio el-radio-yellow"> 
                    <input type="radio" name="default" id="paypal" value="paypal" <?php echo filter_var($payoutMethod, FILTER_SANITIZE_STRING) == 'paypal' ? "checked='checked'" : ""; ?>>
                    <label class="el-radio-style" for="paypal"></label>
			    </div> 
            </div>
            </div>
            <div class="i_t_warning" id="setWarning"><?php echo filter_var($LANG['paypal_payout_warning'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_t_warning" id="notMatch"><?php echo filter_var($LANG['paypal_email_address_not_match'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_t_warning" id="notValidE"><?php echo filter_var($LANG['invalid_email_address'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_set_subscription_fee margin-bottom-ten"> 
            <div class="i_subs_currency"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('80'));?></div>
            <div class="i_payout_"><input type="text" class="transition aval" id="paypale" placeholder="<?php echo filter_var($LANG["paypal_email"], FILTER_SANITIZE_STRING);?>" value="<?php echo filter_var($iN->iN_Secure($paypalEmail), FILTER_SANITIZE_EMAIL);?>"></div>
            </div>
            <div class="i_set_subscription_fee margin-bottom-ten"> 
            <div class="i_subs_currency"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('80'));?></div>
            <div class="i_payout_"><input type="text" class="transition aval" id="paypalere" placeholder="<?php echo filter_var($LANG["confirm_paypal_email"], FILTER_SANITIZE_STRING);?>" value="<?php echo filter_var($iN->iN_Secure($paypalEmail), FILTER_SANITIZE_EMAIL);?>"></div>
            </div>
        </div>
        <!--/SET SUBSCRIPTION FEE BOX-->
        <!--SET SUBSCRIPTION FEE BOX-->
        <div class="i_set_subscription_fee_box">
            <div class="i_sub_not">
            <?php echo filter_var($LANG['bank_transfer'], FILTER_SANITIZE_STRING);?>
            </div>  
            <div class="i_sub_not_check">
            <?php echo filter_var($LANG['if_default_not_bank'], FILTER_SANITIZE_STRING);?>
            <div class="i_sub_not_check_box pyot"> 
                <div class="el-radio el-radio-yellow"> 
                    <input type="radio" name="default" id="bank" value="bank" <?php echo filter_var($payoutMethod, FILTER_SANITIZE_STRING) == 'bank' ? "checked='checked'" : ""; ?>>
                    <label class="el-radio-style" for="bank"></label>
			    </div> 
            </div>
            </div>
            <div class="i_t_warning" id="setBankWarning"><?php echo filter_var($LANG['bank_payout_warning'], FILTER_SANITIZE_STRING);?></div> 
            <div class="i_set_subscription_fee margin-bottom-ten"> 
            <div class="i_subs_currency"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('81'));?></div>
            <div class="i_payout_" style="max-width:500px; width:100%;">
                <textarea name="bank" id="bank_transfer" class="bank_textarea" placeholder="<?php echo filter_var($LANG['bank_transfer_placeholder'], FILTER_SANITIZE_STRING);?>"><?php echo filter_var($iN->iN_Secure($bankAccount), FILTER_SANITIZE_STRING);?></textarea>
            </div>
            </div> 
        </div>
        <!--/SET SUBSCRIPTION FEE BOX-->
       </form>
   </div>
</div>
    </div>
    <div class="i_settings_wrapper_item successNot">
        <?php echo filter_var($LANG['payment_settings_updated_success'], FILTER_SANITIZE_STRING)?>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <div class="i_nex_btn pyot_sNext transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></div>
     </div> 
  </div>
</div>  