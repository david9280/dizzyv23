<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box flex_ tabing_non_justify">
          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('132'));?><?php echo filter_var($LANG['create_advertisement'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:25px;">  
           <div class="i_general_row_box_item flex_ column tabing__justify">
              <div class="i_langs_wrapper tabing">
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
                    <form enctype="multipart/form-data" method="post" id="adsDForm">
                    <!---->
                    <div class="i_general_row_box_item flex_ tabing_non_justify">
                        <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['ads_title'], FILTER_SANITIZE_STRING);?></div>
                        <div class="irow_box_right">
                            <input type="text" name="ads_title" class="i_input flex_">
                        </div>
                    </div>
                    <!---->
                    <!---->
                    <div class="i_general_row_box_item flex_ tabing_non_justify">
                        <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['ads_redirect_url'], FILTER_SANITIZE_STRING);?></div>
                        <div class="irow_box_right">
                            <input type="text" name="ads_url" class="i_input flex_">
                        </div>
                    </div>
                    <!---->
                    <!---->
                    <div class="i_general_row_box_item flex_ tabing_non_justify">
                        <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['ads_description'], FILTER_SANITIZE_STRING);?></div>
                        <div class="irow_box_right">
                            <textarea type="text" name="ads_description" class="i_textarea flex_ border_one"></textarea>
                        </div>
                        <input type="hidden" name="adsFile" id="adsFile" value="">
                    </div>
                    <!---->
                    <div class="warning_wrapper ppk_wraning"><?php echo filter_var($LANG['you_must_fill_all_ads_to_public'], FILTER_SANITIZE_STRING);?></div>
                    <div class="warning_wrapper warning_one"><?php echo filter_var($LANG['url_is_not_valid'], FILTER_SANITIZE_STRING);?></div>
                    <div class="warning_wrapper warning_two"><?php echo filter_var($LANG['upload_ads_image_not'], FILTER_SANITIZE_STRING);?></div>
                    <div class="warning_wrapper warning_tree"><?php echo filter_var($LANG['please_add_ads_title'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_settings_wrapper_item successNot"><?php echo html_entity_decode($LANG['add_saved']);?></div>
                    <!---->
                    <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                        <input type="hidden" name="f" value="adsDForm">
                        <button type="submit" name="submit" class="i_nex_btn_btn transition" id="adsDForm"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
                    </div>
                    <!---->
                    </form>
              </div>
           </div>
       </div>
       <!---->       
    </div>
</div> 