<?php   
$totalnApprovedPosts = $iN->iN_CalculateAllPremiumPosts();
$totalPages = ceil($totalnApprovedPosts / $paginationLimit); 
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
<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['posts'], FILTER_SANITIZE_STRING).'('.$totalnApprovedPosts.')';?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
        <?php 
        $ApprovedPosts = $iN->iN_AllPremiumTypePostsList($userID, $paginationLimit, $pagep);
        if($ApprovedPosts){ 
        ?> 
        <div style="overflow-x:auto;">
                <table class="border_one">
                    <tr>
                        <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th>
                        <th><?php echo filter_var($LANG['post_owner'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['post_type'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['post_shared_time'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></th>   
                        <th><?php echo filter_var($LANG['actions'], FILTER_SANITIZE_STRING);?></th>   
                    </tr>
        <?php 
        foreach($ApprovedPosts as $postData){
            $postID = $postData['post_id'];
            $postOwnerID = $postData['post_owner_id'];
            $postOwnerAvatar = $iN->iN_UserAvatar($postOwnerID, $base_url);
            $postOwnerUserName = $postData['i_username'];
            $postOwnerUserFullName = $postData['i_user_fullname'];
            $postWhoCanSeeType = $postData['who_can_see'];
            $postCreatedTime = $postData['post_created_time'];
            $postStatus = $postData['post_status'];
            $crTime = date('Y-m-d H:i:s',$postCreatedTime); 
            if($postWhoCanSeeType == '3'){
                $postType = '<div class="forsubs flex_ tabing">'.$iN->iN_SelectedMenuIcon('51').$LANG['subscribers'].'</div>';
            }else if($postWhoCanSeeType == '4'){
                $postType = '<div class="forpremiums flex_ tabing">'.$iN->iN_SelectedMenuIcon('40').$LANG['premium'].'</div>';
            }else {
                $postType = '<div class="foreveryone flex_ tabing">'.$iN->iN_SelectedMenuIcon('50').$LANG['weveryone'].'</div>';
            }
            if($postStatus == '0' || $postStatus == '1'){
               $p_Status = '<div class="p_active flex_ tabing">'.$iN->iN_SelectedMenuIcon('69').$LANG['active'].'</div>';
            }else if($postStatus == '2'){
               $p_Status = '<div class="pe_active flex_ tabing">'.$iN->iN_SelectedMenuIcon('115').$LANG['pending_approve'].'</div>';
            }
            $seePostButton = $base_url.'admin/premiumPosts?post='.$postID;
            if($postWhoCanSeeType == '4'){
               $seePostButton = $base_url.'admin/awaiting_approval?post='.$postID;
            }
        ?>
        <tr class="transition trhover">
            <td><?php echo filter_var($postID, FILTER_SANITIZE_STRING);?></td>
            <td>
                <div class="t_od flex_ c6">
                    <div class="t_owner_avatar border_two tabing flex_"><img src="<?php echo filter_var($postOwnerAvatar, FILTER_VALIDATE_URL);?>"></div>
                    <div class="t_owner_user tabing flex_"><a class="truncated" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$postOwnerUserName;?>"><?php echo filter_var($postOwnerUserFullName, FILTER_SANITIZE_STRING);?></a></div>
                </div>
            </td> 
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><?php echo html_entity_decode($postType);?></div></td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('73')).' '.TimeAgo::ago($crTime , date('Y-m-d H:i:s'));?></div></div></td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><?php echo html_entity_decode($p_Status);?></div></td>
            <td class="flex_ tabing">
                <div class="flex_ tabing_non_justify">
                    <div class="delp border_one transition" id="<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')).$LANG['delete'];?></div>
                    <div class="seePost c2 border_one transition" id="<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>"><a href="<?php echo filter_var($seePostButton, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27')).$LANG['edit_post'];?></a></div>
                </div>
            </td> 
        </tr>
        <?php }?>
        </table>
            </div>
        <?php }else{echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['no_post_pending_approval'].'</div></div>';}?>
             
        </div>
        <!---->
    <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalnApprovedPosts / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/premiumPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/premiumPosts?page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/premiumPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/premiumPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/premiumPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalnApprovedPosts / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/premiumPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalnApprovedPosts / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/premiumPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalnApprovedPosts / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/premiumPosts?page-id=<?php echo ceil($totalnApprovedPosts / $paginationLimit); ?>"><?php echo ceil($totalnApprovedPosts / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalnApprovedPosts / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/premiumPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>    
     </div> 
    <!---->
    </div> 
    
</div>