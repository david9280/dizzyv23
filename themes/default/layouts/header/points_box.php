<div class="i_general_box_container generalBox extensionPost" style="height:210px !important;">
<div class="btest">
  <div class="i_user_details">
    <!--MESSAGE HEADER-->
    <div class="i_box_messages_header">
       <?php echo filter_var($LANG['your_points'], FILTER_SANITIZE_STRING);?> 
    </div>
    <!--/MESSAGE HEADER-->
    <div class="i_header_others_box"> 
        <div class="crnt_points">
            <?php echo number_format($userCurrentPoints);?>
        </div>
    </div>
    <div class="point_box_BG">
       <div class="pbg flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?></div>
    </div>
  </div>
  <div class="footer_container">
     <div class="point_pr tabing flex_"><a class="tabing flex_ transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>purchase/purchase_point"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40')).$LANG['purchase_point'];?></a></div>
  </div>
  </div>
</div>