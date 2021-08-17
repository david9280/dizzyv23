<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['digital_ocean_settings'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf">  
            <form enctype="multipart/form-data" method="post" id="storageSettings">
             <!---->
            <div class="i_general_row_box_item flex_ column tabing__justify" >
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                  <label class="el-switch el-switch-yellow" for="sstat">
                    <input type="checkbox" name="s3Status" class="sstat" id="sstat" <?php echo filter_var($digitalOceanStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="1" checked="checked"' : 'value="0"';?>>
                    <span class="el-switch-style"></span>  
                  </label>
                  <div class="i_chck_text"><?php echo filter_var($LANG['docean_status'], FILTER_SANITIZE_STRING);?></div> 
                  <input type="hidden" name="s3Status" id="stats3" value="<?php echo filter_var($digitalOceanStatus, FILTER_SANITIZE_STRING);?>">
                </div>
                <div class="rec_not" style="padding-left:15px;"><?php echo filter_var($LANG['docean_status_not'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['docean_ducket'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="docean_ducket" class="i_input flex_" value="<?php echo filter_var($oceanspace_name, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['oceanregion'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="oceanregion" class="i_input flex_" value="<?php echo filter_var($oceanregion, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['docean_key'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="docean_key" class="i_input flex_" value="<?php echo filter_var($oceankey, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['oceansecret_key'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="oceansecret_key" class="i_input flex_" value="<?php echo filter_var($oceansecret, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="DigitalOceanSettings">
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            </form>
       </div>
       <!----> 
        
    </div>
</div> 