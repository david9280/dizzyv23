<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in">
     <div class="i_settings_wrapper_title"><?php echo filter_var($LANG['my_profile'], FILTER_SANITIZE_STRING);?></div>
     <form enctype="multipart/form-data" method="post" id="myProfileForm">
     <div class="i_settings_wrapper_items">
        <!---->
         <div class="i_settings_wrapper_item">
            <input type="hidden" name="f" value="editMyPage">
             <div class="i_settings_item_title"><?php echo filter_var($LANG['profile_pictures'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for modify_avatar_cover editAvatarCover"><?php echo filter_var($LANG['modify_avatar_cover'], FILTER_SANITIZE_STRING);?></div>
         </div>
        <!---->
        <!---->
        <div class="i_settings_wrapper_item">
             <div class="i_settings_item_title"><?php echo filter_var($LANG['email_address'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for account_email"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=email_settings"><?php echo filter_var($userEmail, FILTER_SANITIZE_EMAIL);?></a></div>
         </div>
        <!----> 
        <!---->
        <div class="i_settings_wrapper_item">
             <div class="i_settings_item_title"><?php echo filter_var($LANG['full_name'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for"><input type="text" name="flname" class="flnm" value="<?php echo filter_var($userFullName, FILTER_SANITIZE_STRING);?>"></div>
         </div>
        <!---->
        <!----> 
        <div class="i_settings_wrapper_item">
             <div class="i_settings_item_title"><?php echo filter_var($LANG['username'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for">
               <input type="text" name="uname" id="uname" class="flnm" value="<?php echo filter_var($userName, FILTER_SANITIZE_STRING);?>">
               <div class="box_not"><?php echo filter_var($LANG['your_profile_url'], FILTER_SANITIZE_STRING);?> <?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?><span id="reUnm"><?php echo filter_var($userName, FILTER_SANITIZE_STRING);?></span></div>
               <div class="box_not warning_username"><?php echo filter_var($LANG['username_already_in_use_warning'], FILTER_SANITIZE_STRING);?></div>
               <div class="box_not invalid_username" style="color:#d81b60;"><?php echo filter_var($LANG['username_special_character_warning'], FILTER_SANITIZE_STRING);?></div>
               <div class="box_not character_warning"><?php echo filter_var($LANG['username_least_character_warning'], FILTER_SANITIZE_STRING);?></div>
             </div>
         </div>
        <!---->
        <!---->
        <div class="i_settings_wrapper_item">
             <div class="i_settings_item_title"><?php echo filter_var($LANG['category'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for">
               <div class="ib">
                  <select class="page_category" name="ctgry">
                    <?php foreach($PROFILE_CATEGORIES as $cat => $value){?> 
                       <option value='<?php echo filter_var($cat, FILTER_SANITIZE_STRING); ?>'  <?php echo filter_var($userProfileCategory, FILTER_SANITIZE_STRING) == '' . $cat . '' ? "selected='selected'" : ""; ?>><?php echo filter_var($value, FILTER_SANITIZE_STRING); ?></option>
                    <?php }?> 
                  </select> 
               </div>
               <div class="box_not"><?php echo html_entity_decode($LANG['not_become_creator'], FILTER_SANITIZE_STRING);?></div>
             </div>
         </div>
        <!---->
        <!---->
        <div class="i_settings_wrapper_item">
             <div class="i_settings_item_title"><?php echo filter_var($LANG['you_are_a'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for flex_">
                 <!---->
                 <div class="flexBox flex_">
                   <label class="youare" id="youarein" for="female">
                     <input type="radio" name="gender" id="female" value="female" <?php echo filter_var($userGender, FILTER_SANITIZE_STRING) == 'female' ? "checked='checked'" : ""; ?>>
                     <span class="flex_ transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('13'));?><?php echo filter_var($LANG['female'], FILTER_SANITIZE_STRING);?></span>
                   </label>
                 </div>
                 <!---->
                 <!---->
                 <div class="flexBox flex_">
                   <label class="youare" id="youare" for="couple">
                     <input type="radio" name="gender" id="couple" value="couple" <?php echo filter_var($userGender, FILTER_SANITIZE_STRING) == 'couple' ? "checked='checked'" : ""; ?>>
                     <span class="flex_ transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('58'));?><?php echo filter_var($LANG['couple'], FILTER_SANITIZE_STRING);?></span>
                   </label>
                 </div>
                 <!---->
                 <!---->
                 <div class="flexBox flex_">
                   <label class="youare flex_" id="youarein" for="male">
                     <input type="radio" name="gender" id="male" value="male"<?php echo filter_var($userGender, FILTER_SANITIZE_STRING) == 'male' ? "checked='checked'" : ""; ?>>
                     <span class="flex_ transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('12'));?><?php echo filter_var($LANG['male'], FILTER_SANITIZE_STRING);?></span>
                   </label>
                 </div>
                 <!---->
             </div>
         </div>
        <!---->
        <!---->
        <div class="i_settings_wrapper_item">
             <div class="i_settings_item_title"><?php echo filter_var($LANG['birthday'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for">
               <input name="birthdate" type="text" id="date1" class="flnm" maxlength="10" size="10" placeholder="<?php echo filter_var($LANG['birthday_format_placeholder'], FILTER_SANITIZE_STRING);?>" name="birthdate" value="<?php echo filter_var($userBirthDay, FILTER_SANITIZE_STRING);?>">
               <div class="box_not"><?php echo filter_var($LANG['birthday_help'], FILTER_SANITIZE_STRING);?></div>
               <div class="box_not character_warning"><?php echo filter_var($LANG['your_age_must_be'], FILTER_SANITIZE_STRING);?></div>
             </div>
         </div>
        <!---->
        <!---->
        <div class="i_settings_wrapper_item">
             <div class="i_settings_item_title"><?php echo filter_var($LANG['description'], FILTER_SANITIZE_STRING);?></div>
             <div class="i_settings_item_title_for"> 
               <textarea class="description_" name="bio" placeholder="<?php echo filter_var($LANG['description_placeholder'], FILTER_SANITIZE_STRING);?>"><?php echo filter_var($iN->sanitize_output($userBio,$base_url), FILTER_SANITIZE_STRING);?></textarea> 
             </div>
         </div>
        <!---->
     </div>
      <div class="i_settings_wrapper_item successNot">
          <?php echo filter_var($LANG['profile_updated_success'], FILTER_SANITIZE_STRING)?>
      </div> 
      <div class="i_settings_wrapper_item i_warning_point" style="display:none;">
          <?php echo filter_var($LANG['full_name_must_be'], FILTER_SANITIZE_STRING);?>
      </div>
     <div class="i_become_creator_box_footer">
        <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
      </div>
        </form>
  </div>
</div>

<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/masked/jquery.mask.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>"></script>
 
<script type="text/javascript">
$(document).ready(function(){
  $('#date1').mask('00/00/0000');
var timer = null; 
$('body').delegate('#uname', 'keyup', function() {
    clearTimeout(timer);
    timer = setTimeout(function() {
       var type = 'checkusername';
       var userCheck = $("#uname").val();
	     var data = 'f='+type+'&username='+ userCheck;
        if( userCheck.length < 3 ) {
          /*Do something*/
        }else{
              $.ajax({
                type: 'POST',
                url: siteurl + "requests/request.php",
                data: data,
                cache: false,
                success: function(response) {
                  if(response == '2'){
                     $('.warning_username').show();
                     $('.invalid_username, .character_warning').hide(); 
                  }else if(response == '1'){
                    $('.invalid_username , .character_warning , .warning_username').hide(); 
                  }else if(response == '3'){
                    $('.invalid_username').show();
                    $('.warning_username, .character_warning').hide(); 
                  }else if(response == '4'){
                    $('.character_warning').show();
                  }else{ 
                    $('.invalid_username , .character_warning , .warning_username').hide(); 
                  }
                } 
              }); 
          } 
    }, 500); 
});  
});
</script>