<?php 
 $activeAds = $iN->iN_ShowAds();
 if($activeAds){
?>
<div class="i_right_box_header">
Sponsored
</div>
<div class="i_sponsorad">
<?php 
foreach($activeAds as $aAds){
  $activeAdsTitle = $aAds['ads_title'];
  $activeAdsImage = $aAds['ads_image'];
  $activeAdsUrl = $aAds['ads_url'];
  $activeAdsDescription = $aAds['ads_desc']; 
  $adsImageUrl = $activeAdsImage;
?>
<!--SPONSORED ADS-->
<a href="<?php echo html_entity_decode($activeAdsUrl);?>" target="blank_" class="transition">
    <div class="i_sponsored_container">
        <div class="i_sponsored_image">
            <img src="<?php echo html_entity_decode($adsImageUrl);?>"/>
        </div>
        <div class="i_sponsored_title_and_desc">
            <div class="i_sponsored_title">
                <?php echo filter_var($activeAdsTitle, FILTER_SANITIZE_STRING);?>
            </div>
            <div class="i_sponsored_ads_link">
                <?php echo filter_var($iN->iN_getHost($activeAdsUrl), FILTER_SANITIZE_STRING);?>
            </div>
        </div>
    </div>
    </a>  
    <!--/SPONSORED ADS-->
<?php }?>
 </div>
<?php }
?> 