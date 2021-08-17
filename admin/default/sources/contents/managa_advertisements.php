<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box flex_ tabing_non_justify">
          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('132'));?><?php echo filter_var($LANG['managa_advertisements'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:25px;">  
           <div class="i_general_row_box_item flex_ column tabing__justify">
              <div class="buyCreditWrapper flex_ tabing" style="margin-top:0px;">
                  <?php 
                  $dataAds = $iN->iN_AdvertisementsListAdmin($userID);
                  if($dataAds){
                     foreach($dataAds as $aData){
                        $adsID = $aData['ads_id'];
                        $ads_title = $aData['ads_title'];
                        $ads_description = $aData['ads_desc'];
                        $adsURL = $aData['ads_url'];
                        $adsStatus = $aData['ads_status'];
                        $adsImage = $aData['ads_image'];
                        $advertisementImage = $adsImage; 
                        $editAdsLink = $base_url.'admin/managa_advertisements?editAds='.$adsID;
                  ?>
                   <div class="credit_plan_box">
                       <div class="plan_box tabing flex_ column plbox<?php echo filter_var($adsID, FILTER_SANITIZE_STRING);?>">
                           <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo filter_var($advertisementImage, FILTER_SANITIZE_STRING);?>)"><img class="a-item-img" src="<?php echo filter_var($advertisementImage, FILTER_SANITIZE_STRING);?>"></div>
                           <!---->
                           <div class="tabing flex_ edit_active_delete">
                               <div class="ecd_item">
                                  <div class="ecd_item_in flex_ tabing">
                                    <div class="i_checkbox_wrapper flex_ tabing_non_justify" style="padding:15px 0px;">
                                        <label class="el-switch el-switch-yellow" for="adsStatus<?php echo filter_var($adsID, FILTER_SANITIZE_STRING);?>">
                                            <input type="checkbox" class="adsStat" id="adsStatus<?php echo filter_var($adsID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($adsID, FILTER_SANITIZE_STRING);?>" data-type="adsStatus" <?php echo filter_var($adsStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                                            <span class="el-switch-style"></span>  
                                        </label> 
                                    </div>
                                  </div>
                               </div>
                               <div class="ecd_item flex_ tabing">
                                   <a href="<?php echo $editAdsLink;?>"><div class="ecd_item_in flex_ tabing edit_plan border_one c2"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27'));?><?php echo filter_var($LANG['edit_plan'], FILTER_SANITIZE_STRING);?></div></a>
                                </div>
                               <div class="ecd_item flex_ tabing"><div class="ecd_item_in flex_ tabing delete_ads border_one c3" id="<?php echo filter_var($adsID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?><?php echo filter_var($LANG['delete_plan'], FILTER_SANITIZE_STRING);?></div></div>
                            </div>
                           <!---->
                       </div>
                   </div>     
                  <?php  } }else{ ?>
                    <div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('54'));?></div><div class="n_c_t"><?php echo filter_var($LANG['dont_have_ads_yet'], FILTER_SANITIZE_STRING);?></div></div>
                  <?php } ?>
              </div>
           </div>
       </div>
       <!---->       
    </div>
</div> 