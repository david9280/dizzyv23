<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('77'));?><?php echo filter_var($LANG['setup_subscribers_fee'], FILTER_SANITIZE_STRING);?></div> 
    </div> 
    <div class="i_settings_wrapper_items"> 
    <div class="payouts_form_container"> 
   <div class="i_payout_methods_form_container"> 
   <div class="certification_form_not"><?php echo html_entity_decode($LANG['setup_subscribers_fee_note']);?></div>
   <div class="i_subscription_form_container">
      
    <!--SET SUBSCRIPTION FEE BOX-->
    <div class="i_set_subscription_fee_box">
        <div class="i_sub_not">
           <?php echo filter_var($LANG['weekly_subs_fee'], FILTER_SANITIZE_STRING);?> <span class="weekly_success"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></span>
        </div>  
        <div class="i_sub_not_check">
           <?php echo filter_var($LANG['weekly_subs_fee_not'], FILTER_SANITIZE_STRING);?>
           <div class="i_sub_not_check_box">
                <label class="el-switch el-switch-yellow">
                    <input type="checkbox" name="weekly" <?php echo isset($WeeklySubDetail['plan_type']) == 'weekly' ? 'checked="checked"' : NULL;?>>
                    <span class="el-switch-style"></span> 
                </label>
           </div>
        </div>
        <div class="i_t_warning" id="wweekly"><?php echo filter_var($LANG['must_specify_weekly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_t_warning" id="waweekly"><?php echo filter_var($LANG['minimum_weekly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_set_subscription_fee">
           <div class="i_subs_currency"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></div>
           <div class="i_subs_price"><input type="text" class="transition aval" id="spweek" placeholder="<?php echo filter_var($LANG['weekly_subs_ex_fee'], FILTER_SANITIZE_STRING);?>" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="<?php echo isset($WeeklySubDetail['amount']) ? $WeeklySubDetail['amount'] : NULL;?>"></div>
           <div class="i_subs_interval"><?php echo filter_var($LANG['weekly'], FILTER_SANITIZE_STRING);?></div>
        </div>
    </div>
    <!--/SET SUBSCRIPTION FEE BOX-->
    <!--SET SUBSCRIPTION FEE BOX-->
    <div class="i_set_subscription_fee_box"> 
        <div class="i_sub_not">
        <?php echo filter_var($LANG['monthly_subs_fee'], FILTER_SANITIZE_STRING);?><span class="monthly_success"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></span>
        </div>  
        <div class="i_sub_not_check">
        <?php echo filter_var($LANG['monthly_subs_fee_not'], FILTER_SANITIZE_STRING);?>
           <div class="i_sub_not_check_box">
                <label class="el-switch el-switch-yellow">
                    <input type="checkbox" name="monthly" <?php echo isset($MonthlySubDetail['plan_type']) == 'monthly' ? 'checked="checked"' : NULL;?>>
                    <span class="el-switch-style"></span> 
                </label>
           </div>
        </div> 
        <div class="i_t_warning" id="wmonthly"><?php echo filter_var($LANG['must_specify_monthly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_t_warning" id="mamonthly"><?php echo filter_var($LANG['minimum_monthly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_set_subscription_fee">
           <div class="i_subs_currency"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></div>
           <div class="i_subs_price"><input type="text" class="transition aval" id="spmonth" placeholder="<?php echo filter_var($LANG['monthly_subs_ex_fee'], FILTER_SANITIZE_STRING);?>" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="<?php echo isset($MonthlySubDetail['amount']) ? $MonthlySubDetail['amount'] : NULL;?>"></div>
           <div class="i_subs_interval"><?php echo filter_var($LANG['monthly'], FILTER_SANITIZE_STRING);?></div>
        </div>
    </div>
    <!--/SET SUBSCRIPTION FEE BOX-->
    <!--SET SUBSCRIPTION FEE BOX-->
    <div class="i_set_subscription_fee_box"> 
        <div class="i_sub_not">
        <?php echo filter_var($LANG['yearly_subs_fee'], FILTER_SANITIZE_STRING);?><span class="yearly_success"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></span>
        </div>  
        <div class="i_sub_not_check">
           <?php echo filter_var($LANG['yearly_subs_fee_not'], FILTER_SANITIZE_STRING);?>
           <div class="i_sub_not_check_box">
                <label class="el-switch el-switch-yellow">
                    <input type="checkbox" name="yearly" <?php echo isset($YearlySubDetail['plan_type']) == 'yearly' ? 'checked="checked"' : NULL;?>>
                    <span class="el-switch-style"></span> 
                </label>
           </div>
        </div> 
        <div class="i_t_warning" id="wyearly"><?php echo filter_var($LANG['must_specify_yearly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_t_warning" id="yayearly"><?php echo filter_var($LANG['minimum_yearly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_set_subscription_fee">
           <div class="i_subs_currency"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></div>
           <div class="i_subs_price"><input type="text" class="transition aval" id="spyear" placeholder="<?php echo filter_var($LANG['yearly_subs_ex_fee'], FILTER_SANITIZE_STRING);?>" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="<?php echo isset($YearlySubDetail['amount']) ? $YearlySubDetail['amount'] : NULL;?>"></div>
           <div class="i_subs_interval"><?php echo filter_var($LANG['yearly'], FILTER_SANITIZE_STRING);?></div>
        </div>
    </div>
    <!--/SET SUBSCRIPTION FEE BOX-->   
   </div>
   </div>
</div>
    </div>
    <div class="i_settings_wrapper_item successNot">
        <?php echo filter_var($LANG['payment_settings_updated_success'], FILTER_SANITIZE_STRING)?>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <div class="i_nex_btn c_uNext transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></div>
     </div> 
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){ 
    $("body").on("keyup",".aval", function(){
        var val = $(this).val();
        var ID = $(this).attr("id");
        if($.trim( val ) !== ''){
            if(val < <?php echo filter_var($subscribeWeeklyMinimumAmount, FILTER_SANITIZE_STRING);?> && ID == 'spweek'){
                $("#waweekly").show();
            }else if(val < <?php echo filter_var($subscribeMonthlyMinimumAmount, FILTER_SANITIZE_STRING);?> && ID == 'spmonth'){
                $("#mamonthly").show();
            }else if(val < <?php echo filter_var($subscribeYearlyMinimumAmount, FILTER_SANITIZE_STRING);?> && ID == 'spyear'){
                $("#yayearly").show();
            }else{
                $(".i_t_warning").hide();
            }
        }else{
            $(".i_t_warning").hide();
        }
  });
});
</script>