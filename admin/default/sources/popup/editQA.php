<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content general_conf">  
            <!--Modal Header-->
            <div class="i_modal_g_header" style="margin-bottom:15px;">
                <?php echo filter_var($LANG['edit_qa'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div> 
            <form enctype="multipart/form-data" method="post" id="edQAForm">
            <div class="i_plnn_container flex_" style="padding:0px 20px;margin-bottom:15px;">    
                <input type="text" name="newq" class="point_input" placeholder="<?php echo filter_var($LANG['question'], FILTER_SANITIZE_STRING);?>" value="<?php echo filter_var($getSData['qa_title'], FILTER_SANITIZE_STRING);?>">
            </div>
            <!--/Modal Header-->
            <div class="i_editsvg_code flex_ tabing">
               <textarea class="svg_more_textarea" name="newqa" placeholder="<?php echo filter_var($LANG['answer'], FILTER_SANITIZE_STRING);?>"><?php echo filter_var($getSData['qa_description'], FILTER_SANITIZE_STRING);?></textarea>
            </div> 
            <div class="warning_wrapper warning_one" style="padding-left:25px;"><?php echo filter_var($LANG['question_and_answer_must_be_filled'], FILTER_SANITIZE_STRING);?></div> 
            <!--Modal Header-->
            <div class="i_modal_g_footer flex_"> 
                <input type="hidden" name="f" value="edQA">
                <input type="hidden" name="qid" value="<?php echo filter_var($getSData['qa_id'], FILTER_SANITIZE_STRING);?>">
                <div class="popupSaveButton transition"><button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edited_qa'], FILTER_SANITIZE_STRING);?></button></div>
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
    var edQAForm = $("#edQAForm");
    edQAForm.on('submit', function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: siteurl + "request/request.php",
            data: edQAForm.serialize(),
            beforeSend: function() {
                $(".papk_wraning , .warning_one").hide();
                $(".general_conf").append(plreLoadingAnimationPlus);
                edQAForm.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    edQAForm.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '200') {
                    location.reload();
                }else if(data == '1'){
                    $(".papk_wraning").show();
                }else if(data == '2'){
                    $(".warning_one").show();
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