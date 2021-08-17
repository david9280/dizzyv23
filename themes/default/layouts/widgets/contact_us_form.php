<div class="contact_us_form_container tabing_non_justify" id="general_conf" style="position:relative;">
<div class="i_login_box_header">
    <div class="i_login_box_wellcome_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('96'));?></div>
    <div class="i_welcome_back">
        <div class="i_lBack"><?php echo filter_var($LANG['any_questions'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_lnot"><?php echo filter_var($LANG['do_not_hesitate'], FILTER_SANITIZE_STRING);?></div>
    </div>
</div>
<!--Direct Login-->
<div class="i_direct_login" style="text-align:left;">
  <div class="sended" style="text-align:center;width:100%;padding:20px;font-weight:700;font-size:23px;color:#d81b60; display:none;"><?php echo filter_var($LANG['your_message_sended_success'], FILTER_SANITIZE_STRING);?></div>
  <div class="contact_disabled" style="text-align:center;width:100%;padding:20px;font-weight:700;font-size:23px;color:#d81b60; display:none;"><?php echo filter_var($LANG['please_try_again_later_contact'], FILTER_SANITIZE_STRING);?></div>
  <div class="con_warning" style="text-align:center;width:100%;padding:20px;font-weight:600;font-size:16px;color:#8e24aa; display:none;"><?php echo filter_var($LANG['alread_sended_contact_email'], FILTER_SANITIZE_STRING);?></div>
  <div id="con_for">
    <form enctype="multipart/form-data" method="post" id='newContact' autocomplete="off">
        <div class="form_group"> 
            <label for="email_fullname" class="form_label"><?php echo filter_var($LANG['full_name'], FILTER_SANITIZE_STRING);?></label>
            <div class="form-control">
                <input type="text" name="email_fullname" id="email_fullname" class="inora_user_input" placeholder="<?php echo filter_var($LANG['full_name'], FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <div class="form_group"> 
            <label for="contact_email" class="form_label"><?php echo filter_var($LANG['email-address'], FILTER_SANITIZE_STRING);?></label>
            <div class="form-control">
                <input type="email" name="contact_email" id="contact_email" class="inora_user_input" placeholder="<?php echo filter_var($LANG['your_email_address'], FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <div class="form_group"> 
            <label for="content" class="form_label"><?php echo filter_var($LANG['msg'], FILTER_SANITIZE_STRING);?></label>
            <div class="form-control">
                <textarea name="content" id="content" class="description_" style="background-color:#ffffff; width:100%;" placeholder="<?php echo filter_var($LANG['your_message'], FILTER_SANITIZE_STRING);?>"></textarea>
            </div>
        </div>
        <div class="form_group">
        <input type="hidden" name="f" value="newContact">
            <div class="i_login_button"><button type="submit"><?php echo filter_var($LANG['send'], FILTER_SANITIZE_STRING);?></button></div>
        </div>
    </form> 
  </div>
</div>
<!--/Direct Login-->
</div>
<script type="text/javascript">
$(document).ready(function(){
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    var newContact = $("#newContact");
    newContact.on('submit', function(e) { 
        e.preventDefault(); 
        jQuery.ajax({
            type: "POST",
            url: siteurl + "requests/contact.php",
            data: newContact.serialize(),
            beforeSend: function() {
                $("#general_conf").append(plreLoadingAnimationPlus);
                newContact.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    newContact.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '200') {
                    $("#con_for").remove();
                    $(".sended").show();
                } else if(data == '1'){
                    $("#con_for").remove();
                    $(".con_warning").show();
                }else if(data == '2'){
                    $("#contact_email").focus();
                }else if(data == '404'){
                    $(".contact_disabled").show();
                }else {
                    $(".contact_disabled").show(); 
                }
                $(".loaderWrapper").remove();
                $('#newContact').trigger("reset");
            }
        });
    });
});
</script>