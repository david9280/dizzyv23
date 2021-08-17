<?php   
$totalPages = ceil($totalPointPayments / $paginationLimit); 
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
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('42'));?><?php echo filter_var($LANG['my_payments'], FILTER_SANITIZE_STRING);?></div>
       <div class="i_moda_header_nt"><?php echo html_entity_decode($LANG['history_of_all_payments_you_made']);?></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
       <div class="i_tab_container">   
           <!--PAYMENTS TABLE HEADER-->
           <div class="i_tab_header flex_">
               <div class="tab_item"><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item"><?php echo filter_var($LANG['paid_to'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['date'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['amount'], FILTER_SANITIZE_STRING);?></div>   
           </div>
           <!--/PAYMENTS TABLE HEADER-->
           <!---->
           <div class="i_tab_list_item_container">
            <?php 
               $paymentHistory = $iN->iN_YourPaymentsList($userID, $paginationLimit, $pagep);
               if($paymentHistory){ 
                  foreach($paymentHistory as $pay){ 
                    $paymentDataID = $pay['payment_id'];
                    $paymentDataPayerUserID = $pay['payer_iuid_fk'];
                    $paymentDataPayedUserID = $pay['payed_iuid_fk']; 
                    $paymentDataPayedProfileID = $pay['payed_profile_id_fk'];
                    $paymentDataOrderKey = $pay['order_key'];
                    $paymentDataPaymentType = $pay['payment_type'];
                    $paymentDataPaymentOption = $pay['payment_option'];
                    $paymentDataPaymentTime = $pay['payment_time'];
                    $paymentDataPaymentStatus = $pay['payment_status'];
                    $paymentDataPaymentAmount = $pay['amount'];
                    $paymentDataPaymentFee = $pay['fee'];
                    $paymentDataPaymentAdminEarning = $pay['admin_earning'];
                    $paymentDataPaymentUserEarning = $pay['user_earning'];  
                    $payerUserAvatar = $iN->iN_UserAvatar($paymentDataPayedUserID, $base_url); 
                    $payerUserData = $iN->iN_GetUserDetails($paymentDataPayedUserID);
                    $payerUserName = $payerUserData['i_username'];
                    $payerUserFullName = $payerUserData['i_user_fullname'];  
            ?>
                <!--ITEM-->
                <div class="i_tab_list_item flex_">
                    <div class="tab_detail_item"><?php echo filter_var($paymentDataID, FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item truncated"> 
                        <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$payerUserName;?>">
                        <div class="tabing_non_justify flex_"> 
                            <div class="tab_subscriber_avatar">
                                <img src="<?php echo filter_var($payerUserAvatar, FILTER_SANITIZE_STRING);?>">
                            </div> 
                            <div class="flex_ truncated"><?php echo filter_var($payerUserFullName, FILTER_SANITIZE_STRING);?></div> 
                        </div>
                        </a>
                    </div>
                    <div class="tab_detail_item item_mobile"><?php echo gmdate("d/m/Y", $paymentDataPaymentTime);?></div>
                    <div class="tab_detail_item item_mobile"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING).$paymentDataPaymentAmount;?></div>  
               </div>
               <!--/ITEM-->
            <?php }
               }else{
                   echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['nothing_to_show_about_payment_history'].'</div></div>';
               }
            ?>  
           </div>
           <!---->
        </div>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalPointPayments / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments&page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalPointPayments / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalPointPayments / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalPointPayments / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments&page-id=<?php echo ceil($totalPointPayments / $paginationLimit); ?>"><?php echo ceil($totalPointPayments / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalPointPayments / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=my_payments&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>    
     </div> 
  </div> 
</div> 