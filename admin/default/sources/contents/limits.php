<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['limits'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;"> 
        <form enctype="multipart/form-data" method="post" id="limits">
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['upload_size_limit'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="fl_limit"><span class="lmt"><?php echo filter_var($MBLIMITS[$availableUploadFileSize], FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($MBLIMITS as $country => $value){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($availableUploadFileSize, FILTER_SANITIZE_STRING) == '' . $country . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($country, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($value, FILTER_SANITIZE_STRING);?>" data-type="mb_limit"><?php echo filter_var($value, FILTER_SANITIZE_STRING); ?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="file_limit" id="upLimit" value="<?php echo filter_var($availableUploadFileSize, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['attantion_server_default_maximum_file_upload_size'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['post_length'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="ch_limit"><span class="lct"><?php echo filter_var($availableLength, FILTER_SANITIZE_STRING).' '.$LANG['character'];?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_ch_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($LIMITLENGTH as $chLimit){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($availableLength, FILTER_SANITIZE_STRING) == '' . $chLimit . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($chLimit, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo preg_replace( '/{.*?}/', $chLimit, $LANG['limit_character']);?>" data-type="characterLimit"><?php echo filter_var($chLimit, FILTER_SANITIZE_STRING).' '.$LANG['character'];?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="length_limit" id="upcLimit" value="<?php echo filter_var($availableLength, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['max_character'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['show_number_of_post'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="cp_limit"><span class="lppt"><?php echo filter_var($scrollLimit, FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_cp_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($POSTLIMIT as $cpLimit){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($scrollLimit, FILTER_SANITIZE_STRING) == '' . filter_var($cpLimit, FILTER_SANITIZE_STRING) . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($cpLimit, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($cpLimit, FILTER_SANITIZE_STRING);?>" data-type="postLimit"><?php echo filter_var($cpLimit, FILTER_SANITIZE_STRING);?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="post_show_limit" id="uppLimit" value="<?php echo filter_var($scrollLimit, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['also_displayed_whe_page_scrolled'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['show_number_of_paginaton'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="p_limit"><span class="ppt"><?php echo filter_var($paginationLimit, FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_p_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($PAGINATIONLIMIT as $pLimit){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($paginationLimit, FILTER_SANITIZE_STRING) == '' . $pLimit . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($pLimit, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($pLimit, FILTER_SANITIZE_STRING);?>" data-type="pagLimit"><?php echo filter_var($pLimit, FILTER_SANITIZE_STRING);?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="pagination_limit" id="ppLimit" value="<?php echo filter_var($paginationLimit, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['also_displayed_whe_page_scrolled'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['allowed_file_extension'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="available_file_extensions" class="i_input flex_" value="<?php echo filter_var($availableFileExtensions, FILTER_SANITIZE_STRING);?>">
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['separated_with'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <div class="warning_wrapper warning_two"><?php echo filter_var($LANG['not_live_file_extensions_blank'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['file_extensions_for_approval'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="available_verification_file_extensions" class="i_input flex_" value="<?php echo filter_var($availableVerificationFileExtensions, FILTER_SANITIZE_STRING);?>">
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['separated_with'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->   
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['not_allowed_usernames'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="unavailable_usernames" class="i_input flex_" value="<?php echo filter_var($disallowedUserNames, FILTER_SANITIZE_STRING);?>">
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['separated_with'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['ffmpeg_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['use_ffmpeg'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="ffmpegMode">
                          <input type="checkbox" name="ffmpegMode" class="chmdPayment" id="ffmpegMode" <?php echo filter_var($ffmpegStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['not_use_ffmpeg'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one ffmpegMode"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!----> 
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['make_sure_ffmpeg_activated'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['ffmpeg_path'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="ffmpeg_path" class="i_input flex_" value="<?php echo filter_var($ffmpegPath, FILTER_SANITIZE_STRING);?>">
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['make_sure_ffmpeg_activated'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->  
            <div class="warning_wrapper warning_one"><?php echo filter_var($LANG['not_live_approved_file_extension'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="updateLimits">
                <button type="submit" name="submit" class="i_nex_btn_btn transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            <!---->
        </form>
        </div>
        <!---->
    </div>
</div>