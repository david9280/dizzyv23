<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in i_sf_box"> 
       <div class="i_modal_content">  
           <!--User Cover & Profile-->
           <div class="i_f_cover_avatar" style="background-image:url('<?php echo filter_var($f_profileCover, FILTER_SANITIZE_STRING);?>');">
               <div class="popClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
               <div class="i_f_avatar_container">
                  <div class="i_f_avatar" style="background-image:url('<?php echo filter_var($f_profileAvatar, FILTER_SANITIZE_STRING);?>');"></div>
               </div>
           </div>
           <!--/User Cover & Profile-->
           <!--User Other Infos-->
            <div class="i_f_other" id="pr_u_id">
              <div class="i_u_name">
                   <a href="<?php echo filter_var($fprofileUrl, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($f_userfullname, FILTER_SANITIZE_STRING);?><?php echo html_entity_decode($fVerifyStatus);?> <?php echo html_entity_decode($fGender);?></a>
              </div>
              <div class="i_u_name_mention">
                   <a href="<?php echo filter_var($fprofileUrl, FILTER_SANITIZE_STRING);?>">@<?php echo filter_var($f_username, FILTER_SANITIZE_STRING);?></a>
              </div>
              <div class="support_not"> <?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['subscribeNot']); ?></div>
              <div class="i_s_popup_title_dark">
                 <?php echo filter_var($LANG['avantages_of_subscription'], FILTER_SANITIZE_STRING);?>
              </div>
              <div class="i_advantages_wrapper"> 
                   <div class="avantage_box">
                   <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?> <?php echo filter_var($LANG['unblock_all_fan_contents'], FILTER_SANITIZE_STRING);?>
                   </div>
                   <div class="avantage_box">
                      <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?> <?php echo filter_var($LANG['full_acces_my_conent'], FILTER_SANITIZE_STRING);?>
                   </div>
                   <div class="avantage_box">
                      <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?> <?php echo filter_var($LANG['direct_message_me'], FILTER_SANITIZE_STRING);?>
                   </div>
                   <div class="avantage_box">
                      <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?> <?php echo filter_var($LANG['cancel_subs_any_time'], FILTER_SANITIZE_STRING);?>
                   </div>
              </div>
              <div class="i_s_popup_title_dark_offers">
                 <?php echo filter_var($LANG['offers'], FILTER_SANITIZE_STRING);?>
              </div>
              <?php 
                 $getUserOffers = $iN->iN_UserSusbscriptionOffers($f_userID);
                 if($getUserOffers){
                    foreach($getUserOffers as $uOfferData){
                       $planID = $uOfferData['plan_id'];
                       $planAmount = $uOfferData['amount'];
                       $planType = $uOfferData['plan_type'];
                        echo '
                        <div class="i_prices_subscribe">
                         <div class="subscribe_price_btn bcmSubs" id="'.$planID.'" data-u="'.$f_userID.'">
                             '.$iN->iN_SelectedMenuIcon('51').preg_replace( '/{.*?}/', $planAmount, $LANG['subscribe_for']).''.$currencys[$stripeCurrency].' / '.$LANG[$planType].'</span>
                         </div>
                        </div>'
                       ;
                    }
                 }
              ?> 
           </div>
           <!--/User Other Infos-->
       </div>   
   </div>
   <!--/SHARE--> 
</div> 