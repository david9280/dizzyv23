<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <?php echo filter_var($LANG['changing_email_address'], FILTER_SANITIZE_STRING);?>
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['changing_email_adress_not'], FILTER_SANITIZE_STRING);?></div>
    </div>
     <form enctype="multipart/form-data" method="post" id="myEmailForm">
     <div class="i_settings_wrapper_items"> 
        <!---->
        <div class="i_settings_wrapper_item">
             <div class="i_settings_item_title"><?php echo filter_var($LANG['your_new_email_address'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for">
                <input type="text" name="newEmail" class="flnm" id="newEmail" value="<?php echo filter_var($userEmail, FILTER_SANITIZE_EMAIL);?>">
                <div class="box_not warning_inuse"><?php echo filter_var($LANG['email_already_in_use_warning'], FILTER_SANITIZE_STRING);?></div>
                <div class="box_not warning_invalid"><?php echo filter_var($LANG['invalid_email_address'], FILTER_SANITIZE_STRING);?></div>
                <div class="box_not warning_same_email"><?php echo filter_var($LANG['warning_same_email'], FILTER_SANITIZE_STRING);?></div>
             </div> 
         </div>
        <!----> 
        <!---->
        <div class="i_settings_wrapper_item">
             <div class="i_settings_item_title"><input type="hidden" name="f" value="editMyEmail"><?php echo filter_var($LANG['your_current_password'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for">
                <input type="password" name="currentPass" id="cPass" class="flnm"> 
                <div class="box_not warning_wrong_password"><?php echo filter_var($LANG['wrong_password'], FILTER_SANITIZE_STRING);?></div>
                <div class="box_not warning_required"><?php echo filter_var($LANG['this_field_is_required'], FILTER_SANITIZE_STRING);?></div>
             </div>
         </div>
        <!---->  
        <div class="i_settings_wrapper_item successNot">
          <?php echo filter_var($LANG['email_changed_success'], FILTER_SANITIZE_STRING);?>
        </div>
     </div>
     <div class="i_become_creator_box_footer">
        <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myemail"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
      </div>
    </form>
  </div>
</div> 
<script type="text/javascript">
$(document).ready(function(){
var timer = null; 
$('body').delegate('#newEmail', 'keyup', function() {
    clearTimeout(timer);
    timer = setTimeout(function() {
       var type = 'checkemail';
       var userEmail = $("#newEmail").val();
	   var data = 'f='+type+'&newEmail='+ userEmail;
        if( userEmail.length < 3 ) {
          /*Do something*/
        }else{
              $.ajax({
                type: 'POST',
                url: siteurl + "requests/request.php",
                data: data,
                cache: false,
                beforeSend: function(){ 
                    $(".warning_inuse , .warning_invalid").hide();
                },
                success: function(response) {
                    if(response == '404'){
                       $(".warning_invalid").hide();
                       $(".warning_inuse").show();
                    }else if(response == 'no'){
                       $(".warning_inuse").hide();
                       $(".warning_invalid").show();
                    }else{
                       $(".warning_inuse , .warning_invalid").hide();
                    }
                } 
              }); 
          } 
    }, 500); 
});  
});
</script>