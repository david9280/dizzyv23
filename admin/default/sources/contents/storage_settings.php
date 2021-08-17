<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['storage'], FILTER_SANITIZE_STRING);?>(Amazon S3)
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf">  
            <form enctype="multipart/form-data" method="post" id="storageSettings">
             <!---->
            <div class="i_general_row_box_item flex_ column tabing__justify" >
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                  <label class="el-switch el-switch-yellow" for="sstat">
                    <input type="checkbox" name="s3Status" class="sstat" id="sstat" <?php echo filter_var($s3Status, FILTER_SANITIZE_STRING) == '1' ? 'value="1" checked="checked"' : 'value="0"';?>>
                    <span class="el-switch-style"></span>  
                  </label>
                  <div class="i_chck_text"><?php echo filter_var($LANG['s3_status'], FILTER_SANITIZE_STRING);?></div> 
                  <input type="hidden" name="s3Status" id="stats3" value="<?php echo filter_var($s3Status, FILTER_SANITIZE_STRING);?>">
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['s3_status_not'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['server_type'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="s3update"><span class="s3choosed"><?php echo filter_var($S3REGIONS[$s3Region], FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_s3_container">
                            <div class="i_countries_list border_one column flex_">  
                              <!----> 
                              <?php foreach($S3REGIONS as $s3r => $value){?> 
                                <div class="i_s_limit transition border_one gsearch <?php echo filter_var($s3Region, FILTER_SANITIZE_STRING) == '' . $s3r . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($s3r, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($value, FILTER_SANITIZE_STRING);?>" data-type="s3set"><?php echo filter_var($value, FILTER_SANITIZE_STRING);?></div>
                              <?php }?>
                              <!---->
                            </div>
                            <input type="hidden" name="s3region" id="s3region" value="<?php echo filter_var($s3Region, FILTER_SANITIZE_STRING);?>">
                        </div> 
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['s3Bucket'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="s3Bucket" class="i_input flex_" value="<?php echo filter_var($s3Bucket, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['s3Key'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="s3Key" class="i_input flex_" value="<?php echo filter_var($s3Key, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['s3sKey'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="s3sKey" class="i_input flex_" value="<?php echo filter_var($s3SecretKey, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!----> 
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="s3Settings">
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            </form>
       </div>
       <!----> 
        
    </div>
</div> 