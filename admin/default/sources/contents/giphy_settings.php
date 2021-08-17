<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['stripe_payment_subs'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <!--*********************************-->   
        <form enctype="multipart/form-data" method="post" id="updateGiphy"> 
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_ "><?php echo filter_var($LANG['g_api_key'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="giphyKey" class="i_input flex_" value="<?php echo filter_var($giphyKey, FILTER_SANITIZE_STRING);?>">
                <div class="rec_not" style="padding-top:5px;"><a href="https://developers.giphy.com/dashboard/" target="blank_">https://developers.giphy.com/dashboard/</a></div>
            </div>
            
        </div>
        <!---->    
        <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
        <div class="admin_approve_post_footer">
            <div class="i_become_creator_box_footer">
                <input type="hidden" name="f" value="updateGiphy"> 
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
        </div>
        </form>
    </div> 
</div>