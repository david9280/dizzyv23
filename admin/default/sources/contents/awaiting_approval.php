<?php   
$totalnonApprovedPosts = $iN->iN_CalculateNonApprovedPosts();
$totalPages = ceil($totalnonApprovedPosts / $paginationLimit); 
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
          <?php echo filter_var($LANG['awaiting_approval_posts'], FILTER_SANITIZE_STRING).'('.$totalnonApprovedPosts.')';?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
        <?php 
        $nonApprovedPosts = $iN->iN_aWaitingApprovalOrApprovedPostsList($userID, $paginationLimit, $pagep);
        if($nonApprovedPosts){ 
        ?> 
        <div style="overflow-x:auto;">
                <table class="border_one">
                    <tr>
                        <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th>
                        <th><?php echo filter_var($LANG['username'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['approve_or_decline'], FILTER_SANITIZE_STRING);?></th>  
                    </tr>
        <?php 
        foreach($nonApprovedPosts as $nonPostData){
            $postID = $nonPostData['post_id'];
            $postOwnerID = $nonPostData['post_owner_id'];
            $postOwnerAvatar = $iN->iN_UserAvatar($postOwnerID, $base_url);
            $postOwnerUserName = $nonPostData['i_username'];
            $postOwnerUserFullName = $nonPostData['i_user_fullname'];
        ?>
        <tr>
            <td><?php echo filter_var($postID, FILTER_SANITIZE_STRING);?></td>
            <td>
                <div class="t_od flex_ c6">
                    <div class="t_owner_avatar border_two tabing flex_"><img src="<?php echo filter_var($postOwnerAvatar, FILTER_SANITIZE_STRING);?>"></div>
                    <div class="t_owner_user tabing flex_"><a class="truncated" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).$postOwnerUserName;?>"><?php echo filter_var($postOwnerUserFullName, FILTER_SANITIZE_STRING);?></a></div>
                </div>
            </td> 
            <td class="see_post_details"><a class="border_one" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/awaiting_approval?post='.$postID;?>"><?php echo filter_var($LANG['see_post'], FILTER_SANITIZE_STRING);?></td> 
        </tr>
        <?php }?>
        </table>
            </div>
        <?php }else{echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.$iN->iN_SelectedMenuIcon('54').'</div><div class="n_c_t">'.$LANG['no_post_pending_approval'].'</div></div>';}?>
             
        </div>
        <!---->
    <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalnonApprovedPosts / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING)> 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>awaiting_approval?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'],FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING) > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>awaiting_approval?tab=payments&page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING)-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>awaiting_approval?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING)-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>awaiting_approval?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>awaiting_approval?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING)+1 < ceil($totalnonApprovedPosts / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>awaiting_approval?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING)+2 < ceil($totalnonApprovedPosts / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>awaiting_approval?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING) < ceil($totalnonApprovedPosts / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>awaiting_approval?tab=payments&page-id=<?php echo ceil($totalnonApprovedPosts / $paginationLimit); ?>"><?php echo ceil($totalnonApprovedPosts / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING) < ceil($totalnonApprovedPosts / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>awaiting_approval?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>    
     </div> 
    <!---->
    </div> 
    
</div>