<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['email_settings'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf">  
            <form enctype="multipart/form-data" method="post" id="myEmailForm">
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['server_type'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="smtpormail"><span class="sm_or_ma" style="text-transform:uppercase;"><?php echo filter_var($smtpOrMail, FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_cp_container">
                            <div class="i_countries_list border_one column flex_"> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($smtpOrMail, FILTER_SANITIZE_STRING) == 'smtp' ? 'choosed' : ''; ?>" id='smtp' data-c="smtp" data-type="smtpOrMail">STMP</div>
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($smtpOrMail, FILTER_SANITIZE_STRING) == 'mail' ? 'choosed' : ''; ?>" id='mail' data-c="mail" data-type="smtpOrMail">MAIL</div>
                            </div>
                            <input type="hidden" name="smtpmail" id="smtp_or_mail" value="<?php echo filter_var($smtpOrMail, FILTER_SANITIZE_STRING);?>">
                        </div> 
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['server_type'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="smtp_encription"><span class="ssl_or_tls" style="text-transform:uppercase;"><?php echo filter_var($smtpEncryption, FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_ch_container">
                            <div class="i_countries_list border_one column flex_"> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($smtpEncryption, FILTER_SANITIZE_STRING) == 'ssl' ? 'choosed' : ''; ?>" id='ssl' data-c="ssl" data-type="smtpEncryption">SSL</div>
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($smtpEncryption, FILTER_SANITIZE_STRING) == 'tls' ? 'choosed' : ''; ?>" id='tls' data-c="tls" data-type="smtpEncryption">TLS</div>
                            </div>
                            <input type="hidden" name="smtpecript" id="smtp_encription" value="<?php echo filter_var($smtpEncryption, FILTER_SANITIZE_STRING);?>">
                        </div> 
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['smtp_host'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="smtp_host" class="i_input flex_" value="<?php echo filter_var($smtpHost, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['smtp_username'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="smtp_username" class="i_input flex_" value="<?php echo filter_var($smtpUserName, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['smtp_password'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="password" name="smtp_password" class="i_input flex_" value="<?php echo filter_var($smtpPassword, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['smtp_port'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="smtp_port" class="i_input flex_" value="<?php echo filter_var($smtpPort, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <div class="warning_wrapper warning_one"><?php echo filter_var($LANG['all_fields_must_be_filled'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div> 
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="emailSettings">
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            </form>
       </div>
       <!----> 
        
    </div>
</div> 