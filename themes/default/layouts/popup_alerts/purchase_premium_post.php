<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in i_sf_box"> 
       <div class="i_modal_content">  
          <div class="purchase_premium_header flex_ tabing border_top_radius"><?php echo filter_var($LANG['purchase_post'], FILTER_SANITIZE_STRING) ;?></div>
          <div class="purchase_post_details">
            <?php
                $trimValue = rtrim($userPostFile,',');
                $explodeFiles = explode(',', $trimValue);
                $explodeFiles = array_unique($explodeFiles);
                $countExplodedFiles = count($explodeFiles); 
                $array = array('mp4');
                if($countExplodedFiles){
                    foreach($explodeFiles as $explodeVideoFile){
                        $VideofileData = $iN->iN_GetUploadedFileDetails($explodeVideoFile);
                        if($VideofileData){
                            $VideofileExtension = $VideofileData['uploaded_file_ext']; 
                        } 
                        $count[] = isset($VideofileExtension) ? $VideofileExtension : '1'; 
                    }
                    $totalVideos = isset(array_count_values($count)['mp4']) ? array_count_values($count)['mp4'] : '0';
                    $totalPhotos = $countExplodedFiles - $totalVideos;
                } 
            ?>
            <div class="wallet-debit-confirm-container flex_">
               <div class="owner_avatar" style="background-image:url(<?php echo filter_var($userPostOwnerUserAvatar, FILTER_VALIDATE_URL);?>);"></div>
               <?php if($countExplodedFiles){?>
               <div class="album-details"><?php echo filter_var($LANG['purchasing'], FILTER_SANITIZE_STRING) .' '; echo preg_replace( '/{.*?}/', $totalPhotos, $LANG['pr_photo']).' '; if(!empty($totalVideos)){echo ', '.preg_replace( '/{.*?}/', $totalVideos, $LANG['pr_video']);}?></div>
               <?php }?>
               <div class="album-wanted-point">
                  <div><?php echo html_entity_decode($userPostWantedCredit);?></div>
                  <span><?php echo filter_var($LANG['points'], FILTER_SANITIZE_STRING) ;?></span>
                </div>
            </div>
          </div>
          <div class="i_modal_g_footer">
              <div class="alertBtnRight prchase_go_wallet transition" id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING) ;?>"><?php echo filter_var($LANG['confirm'], FILTER_SANITIZE_STRING) ;?></div>
              <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING) ;?></div>
          </div>
       </div>   
   </div>
   <!--/SHARE--> 
</div> 