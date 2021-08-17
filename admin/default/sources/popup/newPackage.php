<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['create_a_new_package'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div> 
            <form enctype="multipart/form-data" method="post" id="newPackageForm">
            <!--/Modal Header-->
            <div class="i_editsvg_code flex_ tabing">
               <!--****************************-->
                <div class="i_p_e_body" style="padding:15px;">
                    <div class="general_warning"><div class="border_one c3 flex_ tabing_non_justify" style="padding:15px;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?><?php echo filter_var($LANG['must_contain_all_plan_informations'], FILTER_SANITIZE_STRING);?></div></div>
                    <div class="add_app_not_point"><?php echo isset($LANG['new_plan_key']) ? $LANG['new_plan_key'] : 'NaN';?></div>
                    <div class="i_plnn_container flex_">    
                        <input type="text" name="planKey" class="point_input" placeholder="<?php echo filter_var($LANG['plan_key_ex'], FILTER_SANITIZE_STRING);?>">
                    </div>
                    <div class="warning_wrapper pk_wraning"><?php echo filter_var($LANG['plan_key_warning'], FILTER_SANITIZE_STRING);?></div>
                    <div class="add_app_not_point"><?php echo filter_var($LANG['plan_point'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_plnn_container flex_">    
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
                        <input type="text" name="planPoint" class="point_input" style="padding-left:50px;" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" placeholder="<?php echo filter_var($LANG['plan_point_amount_ex'], FILTER_SANITIZE_STRING);?>">
                    </div> 
                    <div class="warning_wrapper ppk_wraning"><?php echo preg_replace( '/{.*?}/', $minimumPointLimit, $LANG['plan_point_warning']);?></div>
                    
                    <div class="add_app_not_point"><?php echo filter_var($LANG['plan_fee'], FILTER_SANITIZE_STRING);?></div> 
                    <div class="i_plnn_container flex_">  
                        <div class="i_amount_currency"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></div> 
                        <input type="text" name="pointAmount" class="point_input" style="padding-left:50px;" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" placeholder="<?php echo filter_var($LANG['plan_amount_ex'], FILTER_SANITIZE_STRING);?>">
                    </div>
                    <div class="warning_wrapper papk_wraning"><?php echo preg_replace( '/{.*?}/', $maximumPointAmountLimit, $LANG['plan_point_amount_warning']);?></div>
                </div> 
               <!--****************************-->
            </div>
            <!--Modal Header-->
            <div class="i_modal_g_footer flex_"> 
                <input type="hidden" name="f" value="newPackageForm"> 
                <div class="popupSaveButton transition"><button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button></div>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['no'], FILTER_SANITIZE_STRING);?></div> 
            </div>
            <!--/Modal Header-->
            </form>
       </div>   
   </div>
   <!--/SHARE-->  
<script type="text/javascript">
$(document).ready(function(){ 
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    var newPackageForm = $("#newPackageForm");
    newPackageForm.on('submit', function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: siteurl + "request/request.php",
            data: newPackageForm.serialize(),
            beforeSend: function() {
                $(".ppk_wraning, .papk_wraning, .pk_wraning, .general_warning").hide();
                $(".i_p_e_body").append(plreLoadingAnimationPlus);
                newPackageForm.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    newPackageForm.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if(data == '1'){
                    $(".ppk_wraning").show(); 
                }else if(data == '3'){
                    $(".papk_wraning").show();  
                }else if(data == '4'){
                    $(".pk_wraning").show();
                }else if(data == '5'){
                    $(".general_warning").show();
                }else if (data == '200') {
                    location.reload();
                }else {
                    $("body").append('<div class="nnauthority"><div class="no_permis flex_ c3 border_one tabing">' + data + '</div></div>');
                    setTimeout(() => {
                        $(".nnauthority").remove();
                    }, 5000);
                } 
                $(".loaderWrapper").remove();
            }
        });
    });
});
</script>
</div> 