<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['billing_informations'], FILTER_SANITIZE_STRING);?>
       </div>
       <!---->
       <!---->
       <div class="i_general_row_box column flex_" id="business_conf">
         <form enctype="multipart/form-data" method="post" id="siteBusinessInformation">
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['campany'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="site_campany" class="i_input flex_" value="<?php echo filter_var($siteCampany, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['country'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="site_country" id="gsearchsimple" class="i_input countr flex_" value="<?php echo filter_var($COUNTRIES[$siteCountry], FILTER_SANITIZE_STRING);?>">
                 <input type="hidden" name="country_code" id="newCountry" value="<?php echo filter_var($siteCountry, FILTER_SANITIZE_STRING);?>">
                 <div class="i_choose_country">
                     <div class="i_countries_list border_one column flex_" id="simple">
                     <?php foreach($COUNTRIES as $country => $value){?> 
                        <div class="i_s_country transition border_one gsearch <?php echo filter_var($siteCountry, FILTER_SANITIZE_STRING) == '' . $country . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($country, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($value, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($value, FILTER_SANITIZE_STRING); ?></div>
                     <?php }?> 
                     </div>
                 </div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['city'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="site_city" class="i_input flex_" value="<?php echo filter_var($siteCity, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['business_address'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <textarea type="text" name="site_business_address" class="i_textarea flex_ border_one"><?php echo filter_var($businessAddress, FILTER_SANITIZE_STRING);?></textarea>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['post_code'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="site_post_code" class="i_input flex_" value="<?php echo filter_var($sitePostCode, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['vat'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="site_vat" class="i_input flex_" value="<?php echo filter_var($siteVat, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <div class="warning_wrapper warning_one"><?php echo filter_var($LANG['all_fields_must_be_filled'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="updateBusiness">
                <button type="submit" name="submit" class="i_nex_btn_btn transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
         </form>
       </div>
       <!---->
    </div>
</div> 