<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['live_streaming_settings'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf"> 
            <form enctype="multipart/form-data" method="post" id="liveSettings"> 
            <!---->
            <div class="i_general_row_box_item flex_ column tabing__justify" >
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                  <label class="el-switch el-switch-yellow" for="sstat">
                    <input type="checkbox" name="s3Status" class="sstat" id="sstat" <?php echo filter_var($agoraStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="1" checked="checked"' : 'value="0"';?>>
                    <span class="el-switch-style"></span>  
                  </label>
                  <div class="i_chck_text"><?php echo filter_var($LANG['live_s_status'], FILTER_SANITIZE_STRING);?></div> 
                  <input type="hidden" name="s3Status" id="stats3" value="<?php echo filter_var($agoraStatus, FILTER_SANITIZE_STRING);?>">
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['live_s_not'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['free_live_stream_time'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="cp_limit"><span class="lppt"><?php echo filter_var($freeLiveTime, FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_cp_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($LIVETIMELIMIT as $cpLimit){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($freeLiveTime, FILTER_SANITIZE_STRING) == '' . filter_var($cpLimit, FILTER_SANITIZE_STRING) . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($cpLimit, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($cpLimit, FILTER_SANITIZE_STRING);?>" data-type="postLimit"><?php echo filter_var($cpLimit, FILTER_SANITIZE_STRING);?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="post_show_limit" id="uppLimit" value="<?php echo filter_var($freeLiveTime, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['not_for_time'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['live_stream_price_point'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="liveMinPrice" class="i_input flex_" value="<?php echo filter_var($minimumLiveStreamingFee, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['agora_app_id'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="appID" class="i_input flex_" value="<?php echo filter_var($agoraAppID, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['agora_certificate'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="appCertificate" class="i_input flex_" value="<?php echo filter_var($agoraCertificate, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['agora_customer_id'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="appCustomerID" class="i_input flex_" value="<?php echo filter_var($agoraCustomerID, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div> 
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="updateLiveSettings">
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            </form>
       </div>
       <!----> 
        
    </div>
</div> 