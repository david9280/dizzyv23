<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['website_settings'], FILTER_SANITIZE_STRING); ?>
       </div>
       <!---->
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf">
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_logo">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['site_logo'], FILTER_SANITIZE_STRING); ?></div>
               <div class="irow_box_right">
                <div class="certification_file_box">
                <form id="lUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING); ?>/request/request.php">
                    <label for="id_logo">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79'));
echo filter_var($LANG['upload_logo'], FILTER_SANITIZE_STRING); ?>
                        <input type="file" id="id_logo" name="uploading[]" data-id="logoFile" data-type="sec_one" style="display:none; opacity:0;">
                    </label>
                </form>
                <div class="success_tick tabing flex_ sec_one"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69')); ?></div>
                </div>
                <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING); ?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_fav">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['favicon'], FILTER_SANITIZE_STRING); ?></div>
               <div class="irow_box_right">
                <div class="certification_file_box">
                  <form id="lfUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING); ?>/request/request.php">
                    <label for="id_fav">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79'));
echo filter_var($LANG['upload_favicon'], FILTER_SANITIZE_STRING); ?>
                        <input type="file" id="id_fav" name="uploading[]" data-id="faviconFile" data-type="sec_two" style="display:none; opacity:0;">
                    </label>
                  </form>
                  <div class="success_tick tabing flex_ sec_two"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69')); ?></div>
                </div>
                <div class="rec_not"><?php echo filter_var($LANG['favicon_size_must_be'], FILTER_SANITIZE_STRING); ?></div>
               </div>
            </div>
            <!---->
            <form enctype="multipart/form-data" method="post" id="myProfileForm">
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['site_name'], FILTER_SANITIZE_STRING); ?></div>
               <div class="irow_box_right">
                 <input type="text" name="site_name" class="i_input flex_" value="<?php echo filter_var($siteName, FILTER_SANITIZE_STRING); ?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['site_title'], FILTER_SANITIZE_STRING); ?></div>
               <div class="irow_box_right">
                 <input type="text" name="site_title" class="i_input flex_" value="<?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING); ?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['site_description'], FILTER_SANITIZE_STRING); ?></div>
               <div class="irow_box_right">
                 <textarea type="text" name="site_description" class="i_textarea flex_ border_one"><?php echo filter_var($siteDescription, FILTER_SANITIZE_STRING); ?></textarea>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['site_keywords'], FILTER_SANITIZE_STRING); ?></div>
               <div class="irow_box_right">
                 <input type="text" name="site_keywords" class="i_input flex_" value="<?php echo filter_var($siteKeyWords, FILTER_SANITIZE_STRING); ?>">
               </div>
            </div>
            <!---->
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING); ?></div>
            <div class="i_general_row_box_item flex_ tabing_non_justify">
                <input type="hidden" name="logo" id="logo" value="<?php echo filter_var($logo, FILTER_SANITIZE_STRING); ?>">
                <input type="hidden" name="favicon" id="favicon" value="<?php echo filter_var($favicon, FILTER_SANITIZE_STRING); ?>">
                <input type="hidden" name="f" value="updateGeneral">
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING); ?></button>
            </div>
            </form>
       </div>
       <!---->

    </div>
</div>