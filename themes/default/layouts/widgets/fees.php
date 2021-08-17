<div class="i_become_creator_terms_box"> 
<div class="certification_form_container">
   <div class="certification_form_title"><?php echo filter_var($LANG['setup_subscribers_fee'], FILTER_SANITIZE_STRING);?></div>
   <div class="certification_form_not"><?php echo html_entity_decode($LANG['setup_subscribers_fee_note']);?></div>
   <div class="i_subscription_form_container">
      
    <!--SET SUBSCRIPTION FEE BOX-->
    <div class="i_set_subscription_fee_box">
        <div class="i_sub_not">
           <?php echo filter_var($LANG['weekly_subs_fee'], FILTER_SANITIZE_STRING);?> 
        </div>  
        <div class="i_sub_not_check">
           <?php echo filter_var($LANG['weekly_subs_fee_not'], FILTER_SANITIZE_STRING);?>
           <div class="i_sub_not_check_box">
                <label class="el-switch el-switch-yellow">
                    <input type="checkbox" name="weekly">
                    <span class="el-switch-style"></span> 
                </label>
           </div>
        </div>
        <div class="i_t_warning" id="wweekly"><?php echo filter_var($LANG['must_specify_weekly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_t_warning" id="waweekly"><?php echo filter_var($LANG['minimum_weekly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_set_subscription_fee">
           <div class="i_subs_currency"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></div>
           <div class="i_subs_price"><input type="text" class="transition aval" id="spweek" placeholder="<?php echo filter_var($LANG['weekly_subs_ex_fee'], FILTER_SANITIZE_STRING);?>" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'></div>
           <div class="i_subs_interval"><?php echo filter_var($LANG['weekly'], FILTER_SANITIZE_STRING);?></div>
        </div>
    </div>
    <!--/SET SUBSCRIPTION FEE BOX-->
    <!--SET SUBSCRIPTION FEE BOX-->
    <div class="i_set_subscription_fee_box"> 
        <div class="i_sub_not">
        <?php echo filter_var($LANG['monthly_subs_fee'], FILTER_SANITIZE_STRING);?>
        </div>  
        <div class="i_sub_not_check">
        <?php echo filter_var($LANG['monthly_subs_fee_not'], FILTER_SANITIZE_STRING);?>
           <div class="i_sub_not_check_box">
                <label class="el-switch el-switch-yellow">
                    <input type="checkbox" name="monthly">
                    <span class="el-switch-style"></span> 
                </label>
           </div>
        </div> 
        <div class="i_t_warning" id="wmonthly"><?php echo filter_var($LANG['must_specify_monthly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_t_warning" id="mamonthly"><?php echo filter_var($LANG['minimum_monthly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_set_subscription_fee">
           <div class="i_subs_currency"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></div>
           <div class="i_subs_price"><input type="text" class="transition aval" id="spmonth" placeholder="<?php echo filter_var($LANG['monthly_subs_ex_fee'], FILTER_SANITIZE_STRING);?>" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'></div>
           <div class="i_subs_interval"><?php echo filter_var($LANG['monthly'], FILTER_SANITIZE_STRING);?></div>
        </div>
    </div>
    <!--/SET SUBSCRIPTION FEE BOX-->
    <!--SET SUBSCRIPTION FEE BOX-->
    <div class="i_set_subscription_fee_box"> 
        <div class="i_sub_not">
        <?php echo filter_var($LANG['yearly_subs_fee'], FILTER_SANITIZE_STRING);?>
        </div>  
        <div class="i_sub_not_check">
           <?php echo filter_var($LANG['yearly_subs_fee_not'], FILTER_SANITIZE_STRING);?>
           <div class="i_sub_not_check_box">
                <label class="el-switch el-switch-yellow">
                    <input type="checkbox" name="yearly">
                    <span class="el-switch-style"></span> 
                </label>
           </div>
        </div> 
        <div class="i_t_warning" id="wyearly"><?php echo filter_var($LANG['must_specify_yearly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_t_warning" id="yayearly"><?php echo filter_var($LANG['minimum_yearly_subscription_fee'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_set_subscription_fee">
           <div class="i_subs_currency"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></div>
           <div class="i_subs_price"><input type="text" class="transition aval" id="spyear" placeholder="<?php echo filter_var($LANG['yearly_subs_ex_fee'], FILTER_SANITIZE_STRING);?>" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'></div>
           <div class="i_subs_interval"><?php echo filter_var($LANG['yearly'], FILTER_SANITIZE_STRING);?></div>
        </div>
    </div>
    <!--/SET SUBSCRIPTION FEE BOX-->   
   </div>
</div>
</div>
<div class="i_become_creator_box_footer">
   <div class="i_nex_btn c_Next transition"><?php echo filter_var($LANG['next'], FILTER_SANITIZE_STRING);?></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click",".c_Next", function(){
        var type = 'setSubscriptionPayments'; 
        var weekly = $("#spweek").val();
        var monthly = $("#spmonth").val();
        var yearly = $("#spyear").val();
        var weeklyStatus = $('input[name="weekly"]').prop("checked") ? 1 : 0 ; 
        var monthlyStatus = $('input[name="monthly"]').prop("checked") ? 1 : 0 ; 
        var yearlyStatus = $('input[name="yearly"]').prop("checked") ? 1 : 0 ; 
        if(weeklyStatus == 1){
            if(weekly.length == 0){
               $("#wweekly").show();
               return false;
            }else{
               $("#wweekly").hide();
            }
        }
        if(monthlyStatus == 1){
            if(monthly.length == 0){
                $("#wmonthly").show();
                return false;
            }else{
                $("#wmonthly").hide();
            }
        }
        if(yearlyStatus == 1){
            if(yearly.length == 0){
                $("#wyearly").show();
                return false;
            }else{
                $("#wyearly").hide();
            }
        } 
        var data = 'f='+type+'&wSubWeekAmount='+weekly+'&mSubMonthAmount='+monthly+'&mSubYearAmount='+yearly+'&wStatus='+weeklyStatus+'&mStatus='+monthlyStatus+'&yStatus='+yearlyStatus;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".i_nex_btn").css("pointer-events","none"); 
            },
            success: function(response) {
                if(response == '200'){
                    location.reload();
                }else{
                    $(".i_nex_btn").css("pointer-events","auto"); 
                }
            }
        });
    });
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