<?php   
$totalPages = ceil($totalSubscribers / $paginationLimit); 
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
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51'));?><?php echo filter_var($LANG['subscribers'], FILTER_SANITIZE_STRING).'('.$totalSubscribers.')';?></div>
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['list_subscribers_not'], FILTER_SANITIZE_STRING);?></div>
    </div> 
    <div class="i_settings_wrapper_items">  
       <div class="i_tab_container i_tab_padding"> 
            <?php 
               $payedActiveSubscriptions = $iN->iN_PaymentsSubscriptionsList($userID, $paginationLimit, $pagep);
               if($payedActiveSubscriptions){ 
                  foreach($payedActiveSubscriptions as $payedSub){
                    $payedSubscriptionID = $payedSub['subscription_id'];
                    $payedSubscriberUidFk = $payedSub['iuid_fk'];
                    $payedSubscribedUidFk = $payedSub['subscribed_iuid_fk']; 
                    $payedSubscriberPlanID = $payedSub['plan_id'];
                    $payedSubscriberAvatar = $iN->iN_UserAvatar($payedSubscriberUidFk, $base_url);
                    $subscribtionStarted = $payedSub['created'];
                    $payedAmount = $payedSub['plan_amount'];
                    $payedCurrency = strtoupper($payedSub['plan_amount_currency']);
                    $adminEarning = $payedSub['admin_earning'];
                    $netEarning = $payedAmount - $adminEarning;
                    $subscriptionStatus = $payedSub['status']; 
                    $patedUserData = $iN->iN_GetUserDetails($payedSubscriberUidFk);
                    $payedSubscriberUserName = $patedUserData['i_username'];
                    $payedSubscriberUserFullName = $patedUserData['i_user_fullname'];
                    $myDateTime = date('d/m/Y', strtotime($subscribtionStarted));
                    $getFriendStatusBetweenTwoUser = $iN->iN_GetRelationsipBetweenTwoUsers($userID, $payedSubscriberUidFk);
                    if($getFriendStatusBetweenTwoUser == 'flwr'){
                        $flwrBtn = 'i_btn_like_item_flw f_p_follow';
                        $flwBtnIconText = $iN->iN_SelectedMenuIcon('66').$LANG['unfollow'];
                     }else{ 
                        $flwrBtn = 'i_btn_like_item free_follow';
                        $flwBtnIconText = $iN->iN_SelectedMenuIcon('66').$LANG['follow'];
                     }
            ?>   
            <!--SUBSCRIBER-->
              <div class="i_sub_box_container">
                 <div class="i_sub_box_wrp flex_">
                    <div class="i_sub_box_avatar">
                        <img class="isubavatar" src="<?php echo filter_var($payedSubscriberAvatar, FILTER_SANITIZE_STRING);?>">
                    </div> 
                       <div class="i_sub_box_name_time">
                        <div class="i_sub_box_name"><a href="<?php echo filter_var($base_url.$payedSubscriberUserName, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($payedSubscriberUserFullName, FILTER_SANITIZE_STRING);?></a></div>
                        <div class="i_sub_box_unm">@<?php echo filter_var($payedSubscriberUserName, FILTER_SANITIZE_STRING);?></div> 
                       </div> 
                    <div class="i_sub_flw"><div class="i_follow flex_ tabing i_fw<?php echo filter_var($payedSubscriberUidFk, FILTER_SANITIZE_STRING);?> <?php echo filter_var($flwrBtn, FILTER_SANITIZE_STRING);?> transition" id="i_btn_like_item" data-u="<?php echo filter_var($payedSubscriberUidFk, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($flwBtnIconText);?></div></div>
                 </div>
              </div>
            <!--/SUBSCRIBER--> 
        <?php }}else{echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.$iN->iN_SelectedMenuIcon('54').'</div><div class="n_c_t">'.$LANG['no_one_has_subscribed_to_your_profile'].'</div></div>';}?>
        </div>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalSubscribers / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers&page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalSubscribers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalSubscribers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalSubscribers / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers&page-id=<?php echo ceil($totalSubscribers / $paginationLimit); ?>"><?php echo ceil($totalSubscribers / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalSubscribers / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
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