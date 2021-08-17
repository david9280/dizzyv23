<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify" style="max-width:700px;margin:0px auto;">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['edit_ads'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">   
 
        <!--*********************************-->
         <?php 
         $aData = $iN->iN_GetAdsDetailsAdmin($userID, $adID);
          $aID = $aData['ads_id'];
          $aImage = $aData['ads_image'];
          $aURL = $aData['ads_url'];
          $aDesc = $aData['ads_desc'];
          $aTitle = $aData['ads_title'];
         ?> 
         <div class="i_p_e_body" style="padding:15px;">
           <!---->
           <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_logo">
                <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['ads_image'], FILTER_SANITIZE_STRING);?></div>
                <div class="irow_box_right">
                    <div class="certification_file_box">
                    <form id="adsUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                        <label for="ad_image">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['u_ads_image'], FILTER_SANITIZE_STRING);?>
                            <input type="file" id="ad_image" name="uploading[]" data-id="adsFile" data-type="adsType" style="display:none; opacity:0;">
                        </label> 
                    </form>
                    <div class="success_tick tabing flex_ adsType"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                    </div>
                    <div class="rec_not"><?php echo filter_var($LANG['recommend_ads_image'], FILTER_SANITIZE_STRING);?></div>
                </div>
                </div>
                <!---->
                <form enctype="multipart/form-data" method="post" id="adsUForm">
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['ads_title'], FILTER_SANITIZE_STRING);?></div>
                    <div class="irow_box_right">
                        <input type="text" name="ads_title" class="i_input flex_" value="<?php echo filter_var($aTitle, FILTER_SANITIZE_STRING);?>">
                    </div>
                </div>
                <!---->
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['ads_redirect_url'], FILTER_SANITIZE_STRING);?></div>
                    <div class="irow_box_right">
                        <input type="text" name="ads_url" class="i_input flex_" value="<?php echo filter_var($aURL, FILTER_SANITIZE_STRING);?>">
                    </div>
                </div>
                <!---->
                <div class="warning_wrapper papk_wraning"><?php echo filter_var($LANG['url_is_not_valid'], FILTER_SANITIZE_STRING);?></div>
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['ads_description'], FILTER_SANITIZE_STRING);?></div>
                    <div class="irow_box_right">
                        <textarea type="text" name="ads_description" class="i_textarea flex_ border_one"><?php echo filter_var($aDesc, FILTER_SANITIZE_STRING);?></textarea>
                    </div>
                    <input type="hidden" name="adsFile" id="adsFile" value="<?php echo filter_var($aImage, FILTER_SANITIZE_STRING);?>">
                </div>
                <!---->
                <div class="warning_wrapper ppk_wraning"><?php echo filter_var($LANG['you_must_fill_all_ads_to_public'], FILTER_SANITIZE_STRING);?></div>
                <div class="warning_wrapper warning_one"><?php echo filter_var($LANG['url_is_not_valid'], FILTER_SANITIZE_STRING);?></div>
                <div class="warning_wrapper warning_two"><?php echo filter_var($LANG['upload_ads_image_not'], FILTER_SANITIZE_STRING);?></div>
                <div class="warning_wrapper warning_tree"><?php echo filter_var($LANG['please_add_ads_title'], FILTER_SANITIZE_STRING);?></div>
                <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['add_saved'], FILTER_SANITIZE_STRING);?></div>
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                    <input type="hidden" name="f" value="adsUForm">
                    <input type="hidden" name="adsi" value="<?php echo filter_var($adID, FILTER_SANITIZE_STRING);?>">
                    <button type="submit" name="submit" class="i_nex_btn_btn transition" id="adsUForm"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
                </div>
                <!---->
                </form>
        </div> 
        <!--*********************************--> 
    </div> 
    
</div>