<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in i_sf_box"> 
       <div class="i_modal_content">  
          <div class="purchase_premium_header flex_ tabing border_top_radius mp"><?php echo filter_var($LANG['choose_language'], FILTER_SANITIZE_STRING);?></div>
          <div class="purchase_post_details tabing">  
            <?php if($languages){
               foreach($languages as $langData){
                   $languageID = $langData['lang_id'];
                   $languageName = $langData['lang_name'];
            ?> 
            <!---->
            <div class="payment_method_box chLang textStyle flex_ transition" id="<?php echo filter_var($languageID, FILTER_SANITIZE_STRING);?>">
                <div class="i_block_choose">
                    <div class="block_a_status <?php if($userLang == $languageName){echo 'blockboxActive';}else{echo 'blockboxPassive';}?>"></div>
                </div>
                <?php echo filter_var($LANGNAME[$languageName], FILTER_SANITIZE_STRING);?>
            </div>
            <!---->
            <?php } } ?>
          </div>
          <div class="i_modal_g_footer"> 
              <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
          </div>
       </div>   
   </div>
</div>