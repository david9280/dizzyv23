<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('86'));?><?php echo filter_var($LANG['withdrawal'], FILTER_SANITIZE_STRING);?></div>
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['send_withdrawal_not'], FILTER_SANITIZE_STRING);?></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
         <div class="payouts_form_container">   
            <div class="minimum_amount flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?><?php echo filter_var($LANG['minimmum_withdrawal_amount'], FILTER_SANITIZE_STRING);?></div>
            <div class="method_not"><?php echo html_entity_decode($LANG['not_default_payment_method']);?></div>
            <!--SET SUBSCRIPTION FEE BOX-->
            <div class="i_set_subscription_fee_box">  
               <div class="your_balance"><?php echo filter_var($LANG['your_available_balance'], FILTER_SANITIZE_STRING);?></div>  
            </div>
            <!--/SET SUBSCRIPTION FEE BOX-->
            <!---->
            <div class="i_settings_wrapper_items">
               <div class="i_settings_item_title_withdraw"><?php echo filter_var($LANG['amount'], FILTER_SANITIZE_STRING);?></div>
               <div class="i_settings_item_title_for_withdraw"><input type="text" name="amount" class="flnm" id="wamount" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'></div>
            </div> 
            <div class="i_t_warning" style="padding-left:10px;" id="mwithdrawal"><?php echo filter_var($LANG['minimum_withdrawal_amount'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_t_warning" style="padding-left:10px;" id="nbudget"><?php echo filter_var($LANG['budget_not_enough'], FILTER_SANITIZE_STRING);?></div> 
            <div class="i_t_warning" style="padding-left:10px;" id="nnoway"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div> 
            <div class="i_t_warning" style="padding-left:10px;" id="nwaitpending"><?php echo filter_var($LANG['wait_for_pending'], FILTER_SANITIZE_STRING);?></div> 
            <!---->  
            <div class="i_settings_wrapper_item successNot">
               <?php echo filter_var($LANG['withdrawal_success'], FILTER_SANITIZE_STRING)?>
            </div>
         </div>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <div class="i_nex_btn_btn mwithdraw transition"><?php echo filter_var($LANG['request_withdrawal'], FILTER_SANITIZE_STRING);?></div>
     </div> 
  </div>
</div> 