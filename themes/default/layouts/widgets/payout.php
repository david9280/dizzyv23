<div class="i_become_creator_terms_box"> 
<div class="certification_form_container">
   <div class="certification_form_title"><?php echo filter_var($LANG['payout_methods'], FILTER_SANITIZE_STRING);?></div>
   <div class="certification_form_not"><?php echo filter_var($LANG['payout_methods_not'], FILTER_SANITIZE_STRING);?></div>
   <div class="i_subscription_form_container">
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
                    <input type="radio" name="default" id="paypal" value="paypal" checked="checked">
                    <label class="el-radio-style" for="paypal"></label>
			    </div> 
            </div>
            </div>
            <div class="i_t_warning" id="setWarning"><?php echo filter_var($LANG['paypal_payout_warning'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_t_warning" id="notMatch"><?php echo filter_var($LANG['paypal_email_address_not_match'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_t_warning" id="notValidE"><?php echo filter_var($LANG['invalid_email_address'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_set_subscription_fee margin-bottom-ten"> 
            <div class="i_subs_currency"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('80'));?></div>
            <div class="i_payout_"><input type="text" class="transition aval" id="paypale" placeholder="<?php echo filter_var($LANG["paypal_email"], FILTER_SANITIZE_EMAIL);?>"></div>
            </div>
            <div class="i_set_subscription_fee margin-bottom-ten"> 
            <div class="i_subs_currency"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('80'));?></div>
            <div class="i_payout_"><input type="text" class="transition aval" id="paypalere" placeholder="<?php echo filter_var($LANG["confirm_paypal_email"], FILTER_SANITIZE_EMAIL);?>"></div>
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
                    <input type="radio" name="default" id="bank" value="bank">
                    <label class="el-radio-style" for="bank"></label>
			    </div> 
            </div>
            </div>
            <div class="i_t_warning" id="setBankWarning"><?php echo filter_var($LANG['bank_payout_warning'], FILTER_SANITIZE_STRING);?></div> 
            <div class="i_set_subscription_fee margin-bottom-ten"> 
            <div class="i_subs_currency"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('81'));?></div>
            <div class="i_payout_" style="max-width:500px; width:100%;">
                <textarea name="bank" id="bank_transfer" class="bank_textarea" placeholder="<?php echo filter_var($LANG['bank_transfer_placeholder'], FILTER_SANITIZE_STRING);?>"></textarea>
            </div>
            </div> 
        </div>
        <!--/SET SUBSCRIPTION FEE BOX-->
       </form>
   </div>
</div>
</div>
<div class="i_become_creator_box_footer">
   <div class="i_nex_btn pyot_Next transition"><?php echo filter_var($LANG['next'], FILTER_SANITIZE_STRING);?></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click",".pyot_Next",function(){
        var type = 'payoutSet';
        var defaultMethod = $('input[name=default]:checked', '#bankForm').val();
        var paypalEmail = $("#paypale").val();
        var repaypalEmail = $("#paypalere").val();
        var bankAccount = $("#bank_transfer").val();
        if(defaultMethod == 'paypal'){
           if(paypalEmail.length == 0){
              $("#setWarning").show();
              return false;
           }else{
             $("#setWarning").hide(); 
           }
           if(repaypalEmail.length == 0){
              $("#setWarning").show();
              return false;
           }else{
             $("#setWarning").hide(); 
           }
           if(paypalEmail != repaypalEmail){
              $("#notMatch").show();
              return false;
           }else{
             $("#notMatch").hide(); 
           }
        }
        if(defaultMethod == 'bank'){
            if(bankAccount.length == 0){
              $("#setBankWarning").show();
              return false;
           }else{
             $("#setBankWarning").hide(); 
           }
        } 
        var data = 'f='+type+'&paypalEmail='+encodeURIComponent(paypalEmail)+'&paypalReEmail='+encodeURIComponent(repaypalEmail)+'&bank='+bankAccount+'&method='+defaultMethod;
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
                }else {
                    $(".i_nex_btn").css("pointer-events","auto"); 
                   if(response == 'email_warning'){
                     $("#notMatch").show();
                   }else if(response == 'paypal_warning'){
                     $("#setWarning").show();
                   }else if(response == 'bank_warning'){
                     $("#setBankWarning").show();
                   }else if(response == 'not_valid_email'){
                     $("#notValidE").show();
                   }
                }
            }
        });
    });
      
    
});
</script>