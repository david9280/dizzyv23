<div class="leftSticky mobile_left">
   <div class="i_left_container"> 
        <div class="leftSidebar_in">
            <div class="leftSidebarWrapper">
               <div class="btest">
                 <!--Menu-->
                 <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>">
                 <div class="i_left_menu_box transition">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('99'));?> <div class="m_tit"><?php echo filter_var($LANG['home_page'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 </a>
                 <!--/Menu-->
                 <?php if($logedIn == '1'){?> 
                 <!--Menu-->
                 <a href="<?php echo filter_var($userProfileUrl, FILTER_VALIDATE_URL);?>">
                 <div class="i_left_menu_box transition">
                    <div class="i_left_menu_profile_avatar"><img src="<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING);?>" alt="<?php echo filter_var($userFullName, FILTER_SANITIZE_STRING);?>"/></div> <div class="m_tit"><?php echo filter_var($LANG['profile'], FILTER_SANITIZE_STRING);?></div>
                 </div>
                 </a>
                 <!--/Menu--> 
                 <?php if($feesStatus == '2'){?>
                 <!--Menu-->
                 <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=dashboard">
                 <div class="i_left_menu_box transition">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('35'));?> <div class="m_tit"><?php echo filter_var($LANG['dashboard'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 </a>
                 <!--/Menu-->
                 <?php }?>
                 <!--Menu--> 
                 <div class="i_left_menu_box transition g_feed" data-get="friends" data-type="moreposts">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('7'));?> <div class="m_tit"><?php echo filter_var($LANG['newsfeed'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 <!--/Menu-->
                 <!--Menu--> 
                 <div class="i_left_menu_box transition g_feed" data-get="allPosts" data-type="moreexplore">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('8'));?> <div class="m_tit"><?php echo filter_var($LANG['explore'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 <!--/Menu-->
                 <!--Menu--> 
                 <div class="i_left_menu_box transition g_feed" data-get="premiums" data-type="morepremium">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('9'));?> <div class="m_tit"><?php echo filter_var($LANG['premium'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 <!--/Menu-->
                 <!--Menu--> 
                 <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>creators">
                  <div class="i_left_menu_box transition">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('95'));?> <div class="m_tit"><?php echo filter_var($LANG['our_creators'], FILTER_SANITIZE_STRING);?></div>
                  </div> 
                 </a>
                 <!--/Menu-->
                 <?php } ?>
                 </div>
            </div>
        </div>  
   </div>
</div>