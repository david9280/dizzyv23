<div class="i_postFormContainer">
    <div class="i_warning"><?php echo filter_var($LANG['please_enter_a_message_or_add_a_photo_or_video'], FILTER_SANITIZE_STRING);?></div>
    <div class="i_warning_point"><?php echo filter_var($LANG['must_write_point_for_post'], FILTER_SANITIZE_STRING);?></div>
    <div class="i_warning_prmfl"><?php echo filter_var($LANG['must_upload_files_for_premium'], FILTER_SANITIZE_STRING);?></div>
    <div class="i_warning_unsupported"><?php echo filter_var($LANG['unsupported_video_format'], FILTER_SANITIZE_STRING);?></div>
<div class="i_post_form transition aft">
   <div class="i_post_creator_avatar">
      <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$userName;?>"><img src="<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING);?>" alt="<?php echo filter_var($userFullName, FILTER_SANITIZE_STRING);?>"></a>
   </div>
   <div class="i_post_form_textarea">
       <textarea name="postText" id="newPostT" maxlength="500" class="comment commenta newPostT" placeholder="<?php echo filter_var($LANG['write_message_add_photo_or_video'], FILTER_SANITIZE_STRING);?>"></textarea>
   </div> 
</div>
<?php if($userWhoCanSeePost == '4'){?>
<div class="point_input_wrapper">
    <input type="text" name="point" id="point" class="pointIN" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' placeholder="<?php echo filter_var($LANG['write_points'], FILTER_SANITIZE_STRING);?>"> 
    <div class="box_not" style="padding-left:15px;"><?php echo filter_var($LANG['point_wanted'], FILTER_SANITIZE_STRING);?></div>
</div>
<?php }?>
<!--UPLOADED IMAGES OR VIDEOS-->
<form id="tuploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).'requests/request.php';?>">
<div class="i_uploaded_iv" style="display:none;">  
    <div class="i_uploaded_file_box">
    
    </div>
</div> 
</form>
<!--/UPLOADED IMAGES OR VIDEOS-->
<div class="i_form_buttons">
    <!--IMAGE / VIDEO UPLOAD-->
    <div class="form_btn transition">
    <form id="uploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).'requests/request.php';?>">
        <label for="i_image_video">
            <div class="i_image_video_btn"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('49'));?></div> <div class="pbtn"><?php echo filter_var($LANG['image_video'], FILTER_SANITIZE_STRING);?></div>
            <input type="file" id="i_image_video" class="imageorvideo" name="uploading[]" data-id="upload" multiple="true"> 
        </label>
    </form>
    </div> 
    <!--/IMAGE VIDEO UPLOAD--> 
    <!--WHO CAN SEE OPTIONS-->
    <div class="form_who_see transition">
        <div class="whoSeeBox whs">
            <div class="wBox">
                 <?php echo html_entity_decode($activeWhoCanSee);?>
            </div>
            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?>
        </div>
        <div class="i_choose_ws_wrapper">
            <div class="whctt"><?php echo filter_var($LANG['whocanseethis'], FILTER_SANITIZE_STRING);?></div>
            <!--MENU ITEM-->
            <div class="i_whoseech_menu_item_out wsUpdate transition <?php if($userWhoCanSeePost == 1){echo 'wselected';}?>" data-id="1" id="wsUpdate1">
                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('50'));?> <?php echo filter_var($LANG['weveryone'], FILTER_SANITIZE_STRING);?>
            </div>
            <!--/MENU ITEM-->
            <!--MENU ITEM-->
            <div class="i_whoseech_menu_item_out wsUpdate transition <?php if($userWhoCanSeePost == 2){echo 'wselected';}?>" data-id="2" id="wsUpdate2">
                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('15'));?> <?php echo filter_var($LANG['wfollowers'], FILTER_SANITIZE_STRING);?>
            </div>
            <!--/MENU ITEM-->
            <?php if($feesStatus == '2'){?>
                <!--MENU ITEM-->
                <div class="i_whoseech_menu_item_out wsUpdate transition <?php if($userWhoCanSeePost == 3){echo 'wselected';}?>" data-id="3" id="wsUpdate3">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51'));?> <?php echo filter_var($LANG['wsubscribers'], FILTER_SANITIZE_STRING);?>
                </div>
                <!--/MENU ITEM-->
                <!--MENU ITEM-->
                <div class="i_whoseech_menu_item_out wsUpdate transition <?php if($userWhoCanSeePost == 4){echo 'wselected';}?>" data-id="4" id="wsUpdate4">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('9'));?> <?php echo filter_var($LANG['premium'], FILTER_SANITIZE_STRING);?>
                </div>
                <!--/MENU ITEM-->
            <?php }?>
        </div>
        <input type="hidden" id="uploadVal">
    </div>
    <!--/WHO CAN SEE OPTIONS-->
    <!--SMILEYS-->
    <div class="i_pb_emojis transition">
        <div class="i_pb_emojisBox getEmojis" data-type="emojiBox">
            <div class="i_pb_emojis_Box">
                 <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('25'));?>
            </div> 
        </div>
    </div>
    <!--SMILEYS-->
    <div class="publish_btn transition publish">
       <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('26'));?><div class="pbtn"><?php echo filter_var($LANG['publish'], FILTER_SANITIZE_STRING);?></div>
    </div>
</div> 

</div> 