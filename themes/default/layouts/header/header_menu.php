<div class="i_general_box_container generalBox">
<div class="btest">
  <div class="i_user_details">
      <div class="i_u_details transition">
        <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$userName;?>">
        <div class="i_user_profile_avatar">
            <div class="iu_avatar"><img src="<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING);?>" alt="<?php echo filter_var($userFullName, FILTER_SANITIZE_STRING);?>"></div>
        </div>
        <div class="i_user_nm">
            <div class="i_unm"><?php echo filter_var($userFullName, FILTER_SANITIZE_STRING);?></div>
            <div class="i_see_prof"><?php echo filter_var($LANG['look-at-your-profile'], FILTER_SANITIZE_STRING)?></div>
        </div>
        </a>
      </div>
      <div class="arrow"></div>
      <div class="i_header_others_box">
           <?php if($userType == '2' || $userType == '3'){?>
            <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/index">
               <div class="i_header_others_item transition">
                  <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('107'));?></div> <?php echo filter_var($LANG['admin_panel'], FILTER_SANITIZE_STRING);?>
               </div> 
            </a>
            <div class="arrow"></div> 
           <?php }?> 
           <?php if($feesStatus == '2'){?>
           <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=dashboard">
            <div class="i_header_others_item transition">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('41'));?></div> <?php echo filter_var($LANG['dashboard'], FILTER_SANITIZE_STRING);?>
            </div> 
           </a>
           <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=payments"> 
            <div class="i_header_others_item transition">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('42'));?></div> <?php echo filter_var($LANG['payments'], FILTER_SANITIZE_STRING);?>
            </div> 
           </a>
           <?php } ?>
           <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments"> 
            <div class="i_header_others_item transition">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('42'));?></div> <?php echo filter_var($LANG['my_payments'], FILTER_SANITIZE_STRING);?>
            </div> 
           </a>
           <?php if($feesStatus == '2'){?>
           <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=subscribers">
            <div class="i_header_others_item transition">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51'));?></div> <?php echo filter_var($LANG['subscribers'], FILTER_SANITIZE_STRING);?>
            </div> 
           </a>
           <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=subscriptions"> 
            <div class="i_header_others_item transition">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('43'));?></div> <?php echo filter_var($LANG['subscriptions'], FILTER_SANITIZE_STRING);?>
            </div> 
           </a>
           <?php } ?>
           <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>saved">
            <div class="i_header_others_item transition">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('22'));?></div> <?php echo filter_var($LANG['saved'], FILTER_SANITIZE_STRING);?>
            </div> 
           </a>  
           <div class="arrow"></div> 
            <div class="i_header_others_item transition chooseLanguage" id="chooseLanguage">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('1'));?></div> <?php echo filter_var($LANG['languages'], FILTER_SANITIZE_STRING);?>
            </div>  
           <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings">
            <div class="i_header_others_item transition">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('44'));?></div> <?php echo filter_var($LANG['settings'], FILTER_SANITIZE_STRING);?>
            </div> 
           </a> 
            <div class="i_header_others_item updateTheme transition" data-id="<?php if($lightDark == 'dark'){echo 'light';}else{echo 'dark';}?>">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('46'));?></div> <?php echo filter_var($LANG['day-night'], FILTER_SANITIZE_STRING);?>
            </div>  
           <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>logout.php">
            <div class="i_header_others_item transition">
               <div class="i_header_item_icon_box"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('45'));?></div> <?php echo filter_var($LANG['logout'], FILTER_SANITIZE_STRING);?>
            </div> 
           </a>
      </div> 
  </div>
  <div class="footer_container"><?php include("../themes/$currentTheme/layouts/footer.php");?></div>
  </div>
</div>