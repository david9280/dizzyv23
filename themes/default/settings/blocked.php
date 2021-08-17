<?php   
$totalPages = ceil($totalBlockedUsers / $paginationLimit); 
if (isset($_GET["page-id"])) { 
    $pagep  = mysqli_real_escape_string($db, $_GET["page-id"]); 
    if(preg_match('/^[0-9]+$/', $pagep)){
        $pagep = $pagep;
    }else{
        $pagep = '1';
    }
}else{
    $pagep = '1';
} 
?>
<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('64'));?><?php echo filter_var($LANG['blocked'], FILTER_SANITIZE_STRING).'('.$totalBlockedUsers.')';?></div>
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['block_page_not'], FILTER_SANITIZE_STRING);?></div>
    </div> 
    <div class="i_settings_wrapper_items">  
       <div class="i_tab_container i_tab_padding">    
       <?php 
               $blockedUsersData = $iN->iN_UserBlockedListPage($userID, $paginationLimit, $pagep);
               if($blockedUsersData){ 
                  foreach($blockedUsersData as $bData){
                    $blockID = $bData['block_id'];
                    $blockedUserID = $bData['blocked_iuid'];
                    $blockedUserAvatar = $iN->iN_UserAvatar($blockedUserID, $base_url);
                    $blockedUserData = $iN->iN_GetUserDetails($blockedUserID);
                    $blockedUserName = $blockedUserData['i_username'];
                    $blockedUserFullName = $blockedUserData['i_user_fullname'];
            ?>   
            <!--SUBSCRIBER-->
              <div class="i_sub_box_container block_id_<?php echo filter_var($blockID, FILTER_SANITIZE_STRING);?>">
                 <div class="i_sub_box_wrp flex_">
                    <div class="i_sub_box_avatar">
                        <img class="isubavatar" src="<?php echo filter_var($blockedUserAvatar, FILTER_SANITIZE_STRING);?>">
                    </div> 
                       <div class="i_sub_box_name_time">
                        <div class="i_sub_box_name truncated" style="max-width:150px;"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).$blockedUserName;?>" class="truncated"><?php echo filter_var($blockedUserFullName, FILTER_SANITIZE_STRING);?></a></div>
                        <div class="i_sub_box_unm">@<?php echo filter_var($blockedUserName, FILTER_SANITIZE_STRING);?></div> 
                       </div> 
                    <div class="i_sub_flw"><div class="i_follow flex_ tabing transition unblock" id="<?php echo filter_var($blockID, FILTER_SANITIZE_STRING);?>" data-u="<?php echo filter_var($blockedUserID, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG['un_block'], FILTER_SANITIZE_STRING);?></div></div>
                 </div>
              </div>
            <!--/SUBSCRIBER-->  
        <?php }}else{ echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['perfect_no_blocked_yet'].'</div></div>';}?>
        </div>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalBlockedUsers / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=blocked&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=blocked&page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=blocked&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=blocked&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=blocked&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalBlockedUsers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=blocked&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalBlockedUsers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=blocked&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalBlockedUsers / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=blocked&page-id=<?php echo ceil($totalBlockedUsers / $paginationLimit); ?>"><?php echo ceil($totalBlockedUsers / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalBlockedUsers / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=blocked&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>    
     </div> 
  </div>
</div> 
<script type="text/javascript">
$(document).ready(function(){
 
});
</script>