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
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('42'));?><?php echo filter_var($LANG['subscription_payments'], FILTER_SANITIZE_STRING);?></div>
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['history_of_all_subscriptions_received'], FILTER_SANITIZE_STRING);?></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
    <div class="payouts_form_container"> 
        <div class="next_payout">
            <div class="next_payout_title"><?php echo filter_var($LANG['next_payout'], FILTER_SANITIZE_STRING);?></div>
            <div class="next_payout_not"><?php echo html_entity_decode($LANG['calculated_monthly_payout']);?></div>
        </div> 
    </div>
       <div class="i_tab_container">   
           <!--PAYMENTS TABLE HEADER-->
           <div class="i_tab_header flex_">
               <div class="tab_item"><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item"><?php echo filter_var($LANG['subscriber'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['started_at'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['amount'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item"><?php echo filter_var($LANG['earning'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item"><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></div>
           </div>
           <!--/PAYMENTS TABLE HEADER-->
           <!---->
           <div class="i_tab_list_item_container">
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
            ?>
                <!--ITEM-->
                <div class="i_tab_list_item flex_">
                    <div class="tab_detail_item"><?php echo filter_var($payedSubscriptionID, FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item truncated"> 
                        <a href="<?php echo filter_var($base_url.$payedSubscriberUserName, FILTER_SANITIZE_STRING);?>">
                        <div class="tabing_non_justify flex_"> 
                            <div class="tab_subscriber_avatar">
                                <img src="<?php echo filter_var($payedSubscriberAvatar, FILTER_SANITIZE_STRING);?>">
                            </div> 
                            <div class="flex_ truncated"><?php echo filter_var($payedSubscriberUserFullName, FILTER_SANITIZE_STRING);?></div> 
                        </div>
                        </a>
                    </div>
                    <div class="tab_detail_item item_mobile"><?php echo filter_var($myDateTime, FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item item_mobile"><?php echo filter_var($currencys[$payedCurrency], FILTER_SANITIZE_STRING).$payedAmount;?></div>
                    <div class="tab_detail_item"><?php echo filter_var($currencys[$payedCurrency], FILTER_SANITIZE_STRING).number_format($netEarning, 2);?></div>
                    <div class="tab_detail_item"><div class="tabing flex_ <?php echo filter_var($subscriptionStatus, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG[$subscriptionStatus], FILTER_SANITIZE_STRING);?></div></div>
               </div>
               <!--/ITEM-->
            <?php }
               }else{ 
                  echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['nothing_to_show_about_subscribed_your_profile'].'</div></div>';
               }
            ?>  
           </div>
           <!---->
        </div>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalSubscribers / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments&page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalSubscribers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalSubscribers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalSubscribers / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments&page-id=<?php echo ceil($totalSubscribers / $paginationLimit); ?>"><?php echo ceil($totalSubscribers / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalSubscribers / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
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