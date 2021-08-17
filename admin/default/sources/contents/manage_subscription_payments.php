<?php   
$totalUsers = $iN->iN_TotalUsersSubscriptions();
$totalPages = ceil($totalUsers / $paginationLimit); 
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
          <?php echo filter_var($LANG['manage_subscription_payments'], FILTER_SANITIZE_STRING).'('.$totalUsers.')';?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
        <?php 
        $allUsers = $iN->iN_PayoutWithdrawalAndSubscriptionHistory($userID, $paginationLimit, $pagep, 'subscription');
        if($allUsers){ 
        ?> 
        <div style="overflow-x:auto;">
            <table class="border_one">
                <tr>
                    <td><div class="tab_item"><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></div> </td>
                    <td><div class="tab_item"><?php echo filter_var($LANG['user'], FILTER_SANITIZE_STRING);?></div></td>
                    <td><div class="tab_item"><?php echo filter_var($LANG['amount'], FILTER_SANITIZE_STRING);?></div> </td>
                    <td><div class="tab_item"><?php echo filter_var($LANG['date'], FILTER_SANITIZE_STRING);?></div></td> 
                    <td><div class="tab_item"><?php echo filter_var($LANG['payment_method'], FILTER_SANITIZE_STRING);?></div></td>
                    <td><div class="tab_item"><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></div></td>
                    <td><div class="tab_item"><?php echo filter_var($LANG['actions'], FILTER_SANITIZE_STRING);?></div></td>
                </tr>
        <?php 
        foreach($allUsers as $payoutData){  
            $payoutUserID = $payoutData['iuid_fk'];
            $payoutID = $payoutData['payout_id'];
            $payoutAmount = $payoutData['amount']; 
            $payoutTime = $payoutData['payout_time'];
            $payoutMethod = $payoutData['method'];
            $payoutStatus = $payoutData['status'];
            $patmentType = $payoutData['payment_type']; 
            $myDateTime = date('d/m/Y', $payoutTime);
            $userAvatar = $iN->iN_UserAvatar($payoutUserID, $base_url); 
            $userDetails = $iN->iN_GetUserDetails($payoutUserID);
            $payoutuserUserName = $userDetails['i_username']; 
            $payoutuserUserFullName = $userDetails['i_user_fullname'];
            $pStatus = '';
            if($payoutStatus == 'pending'){
                $pS = $LANG['pending'];
                $pStatus = '<div class="seePost c3 border_one transition tabing flex_ mark_as_paid" id="'.$payoutID.'">'.$iN->iN_SelectedMenuIcon('128').$LANG['pending'].'</div>'; 
            }else if($payoutStatus == 'payed'){
               $pS = $LANG['paid']; 
            } else if($payoutStatus == 'declined'){
               $pS = $LANG['declined']; 
            }
        ?>
        <tr class="transition trhover">
            <td><?php echo filter_var($payoutID, FILTER_SANITIZE_STRING);?></td>
            <td>
                <div class="t_od flex_ c6">
                    <div class="t_owner_avatar border_two tabing flex_"><img src="<?php echo filter_var($userAvatar, FILTER_VALIDATE_URL);?>"></div>
                    <div class="t_owner_user tabing flex_"><a class="truncated" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$payoutuserUserName;?>"><?php echo filter_var($payoutuserUserFullName, FILTER_SANITIZE_STRING);?></a></div>
                </div>
            </td>  
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo filter_var($payoutAmount, FILTER_SANITIZE_STRING);?></div></div></td> 
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo filter_var($myDateTime, FILTER_SANITIZE_STRING);?></div></div></td> 
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo filter_var($payoutMethod, FILTER_SANITIZE_STRING);?></div></div></td> 
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="forpending flex_ tabing"><?php echo filter_var($pS, FILTER_SANITIZE_STRING) ;?></div></div></td> 
            <td class="flex_ tabing_non_justify">
                <div class="flex_ tabing_non_justify"> 
                    <div class="delu del_upout border_one transition tabing flex_ delete" id="<?php echo filter_var($payoutID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')).$LANG['delete'];?></div> 
                    <?php echo html_entity_decode($pStatus);?>
                </div>
            </td>
        </tr>
        <?php }?>
        </table>
            </div>
        <?php }else{echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.$iN->iN_SelectedMenuIcon('54').'</div><div class="n_c_t">'.$LANG['no_creator_waiting_subscription_payment'].'</div></div>';}?>
             
        </div>
        <!---->
    <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalUsers / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_subscription_payments?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_subscription_payments?page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_subscription_payments?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_subscription_payments?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_subscription_payments?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalUsers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_subscription_payments?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalUsers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_subscription_payments?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalUsers / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_subscription_payments?page-id=<?php echo ceil($totalUsers / $paginationLimit); ?>"><?php echo ceil($totalUsers / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalUsers / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_subscription_payments?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>    
     </div> 
    <!---->
    </div> 
    
</div>