<div class="i_modal_bg_in">
    <!--SHARE-->
<?php 
$lngData = $iN->iN_GetLangDetails($langID);
$languageID = $lngData['lang_id'];
$languageName = $lngData['lang_name'];
$languageStatus = $lngData['lang_status'];
?>
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['edit_language'], FILTER_SANITIZE_STRING).'('.$LANGNAME[$languageName].')';?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div> 
            <form enctype="multipart/form-data" method="post" id="editLanguage">
            <!--/Modal Header-->
            <div class="i_editsvg_code flex_ tabing"> 
               <!--****************************-->
                <div class="i_p_e_body" style="padding:15px;"> 
                    <div class="general_warning_lang"><div class="border_one c3 tabing_non_justify" style="padding:15px;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?><?php echo filter_var($LANG['not_mach_abbreviation'], FILTER_SANITIZE_STRING);?></div></div>
                    <div class="general_warning"><div class="border_one c3 flex_ tabing_non_justify" style="padding:15px;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?><?php echo filter_var($LANG['lang_global_warning'], FILTER_SANITIZE_STRING);?></div></div>
                    <div class="add_app_not_point"><?php echo isset($LANG['edit_lang_not']) ? $LANG['edit_lang_not'] : 'NaN';?></div>
                    <div class="add_app_not_point"><?php echo filter_var($LANG['lang_abbreviation'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_plnn_container flex_">    
                        <input type="text" name="langabbreviationName" class="point_input" placeholder="<?php echo filter_var($LANG['lang_abbreviation_ex'], FILTER_SANITIZE_STRING);?>" value="<?php echo filter_var($languageName, FILTER_SANITIZE_STRING);?>">
                    </div>
                    <div class="warning_wrapper ppk_wraning"><?php echo filter_var($LANG['lang_abbreviation_warning'], FILTER_SANITIZE_STRING);?></div>
                </div> 
               <!--****************************-->
            </div>
            <!--Modal Header-->
            <div class="i_modal_g_footer flex_"> 
                <input type="hidden" name="f" value="editLanguage"> 
                <input type="hidden" name="id" value="<?php echo filter_var($languageID, FILTER_SANITIZE_STRING);?>"> 
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
    var editLanguage = $("#editLanguage");
    editLanguage.on('submit', function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: siteurl + "request/request.php",
            data: editLanguage.serialize(),
            beforeSend: function() {
                $(".ppk_warning, .general_warning, .general_warning_lang").hide();
                $(".i_p_e_body").append(plreLoadingAnimationPlus);
                editLanguage.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    editLanguage.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if(data == '1'){
                    $(".ppk_wraning").show();
                } else if(data == '2'){
                    $(".general_warning").show();
                }else if(data == '3'){
                    $(".general_warning_lang").show();
                }else if (data == '200') {
                    location.reload();
                } 
                $(".loaderWrapper").remove();
            }
        });
    });
});
</script>
</div> 