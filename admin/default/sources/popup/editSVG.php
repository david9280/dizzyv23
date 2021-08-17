<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content general_conf">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['edit_svg_code'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!---->
            <div class="editing_svg_icon flex_ tabing">
               <?php echo html_entity_decode($getIconData);?>
            </div>
            <!---->
            <form enctype="multipart/form-data" method="post" id="svgEditForm">
            <!--/Modal Header-->
            <div class="i_editsvg_code flex_ tabing">
               <textarea class="svg_more_textarea" name="svgcode" placeholder="<?php echo filter_var($LANG['paste_your_svg_code_here'], FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($getIconData);?></textarea>
            </div>
            <div class="warning_wrapper warning_one" style="padding-left:25px;"><?php echo filter_var($LANG['please_use_svg_code'], FILTER_SANITIZE_STRING);?></div>
            <div class="warning_wrapper warning_two" style="padding-left:25px;"><?php echo filter_var($LANG['ups_you_forgot_to_add_svg_code'], FILTER_SANITIZE_STRING);?></div>
            <!--Modal Header-->
            <div class="i_modal_g_footer flex_">
                <input type="hidden" name="iconid" value="<?php echo filter_var($cID, FILTER_SANITIZE_STRING);?>">
                <input type="hidden" name="f" value="editedSVG">
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
    var svgEditForm = $("#svgEditForm");
    svgEditForm.on('submit', function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: siteurl + "request/request.php",
            data: svgEditForm.serialize(),
            beforeSend: function() {
                $(".general_conf").append(plreLoadingAnimationPlus);
                svgEditForm.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    svgEditForm.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '200') {
                    location.reload();
                }else if(data == '2'){
                    $(".warning_one").show();
                }else if(data == '1'){
                    $(".warning_two").show();
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