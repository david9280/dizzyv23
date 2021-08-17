<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['withdrawal_details'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header-->
            <div class="i_delete_post_description column" style="position:relative;">  
                <!---->
                <div class="purchase_post_details">
                    <div class="wallet-debit-confirm-container flex_">
                        <div class="owner_avatar" style="background-image:url(<?php echo $iN->iN_UserAvatar($wDet['iuid_fk'], $base_url);?>);"></div>
                            <div class="wuser"><a href="<?php echo $base_url.$wDetUserData['i_username'];?>" target="_blank"><?php echo $wDetUserData['i_user_fullname'];?></a></div>  
                        </div>
                    </div>
                    <div class="withdraw_other_details border_one flex_ column tabing">
                         <div class="withdrawl_detail_box flex_">
                             <div class="withdrawl_detail_box_item"><?php echo filter_var($LANG['amount_requested'], FILTER_SANITIZE_STRING);?></div>
                             <div class="withdrawl_detail_box_item_ f_bold"><?php echo $wDet['amount'].$currencys[$defaultCurrency];?></div>
                         </div>
                         <div class="withdrawl_detail_box flex_">
                             <div class="withdrawl_detail_box_item"><?php echo filter_var($LANG['payment_method'], FILTER_SANITIZE_STRING);?></div>
                             <div class="withdrawl_detail_box_item_"><?php echo $wDet['method'];?></div>
                         </div>
                         <div class="withdrawl_detail_box flex_">
                             <div class="withdrawl_detail_box_item"><?php echo $LANG['payment_address'];?></div>
                             <div class="withdrawl_detail_box_item_">
                                 <?php if($wDet['method'] == 'paypal'){ 
                                    echo $wDetUserData['paypal_email']; 
                                 }else if($wDet['method'] == 'bank'){
                                    echo $wDetUserData['bank_account']; 
                                 }?>
                             </div>
                         </div>
                         <div class="withdrawl_detail_box flex_">
                             <div class="withdrawl_detail_box_item"><?php echo $LANG['requested_date'];?></div>
                             <div class="withdrawl_detail_box_item_"><?php echo $myDateTime = date('d/m/Y', $wDet['payout_time']);?></div>
                         </div>
                         <div class="withdrawl_detail_box flex_">
                             <div class="withdrawl_detail_box_item"><?php echo $LANG['status'];?></div>
                             <div class="withdrawl_detail_box_item_">
                                 <?php  
                                 if($wDet['status'] == 'pending'){ 
                                   echo '<span class="tc1">'.$LANG['pending'].'</span>';
                                }else if($wDet['status'] == 'payed'){ 
                                   echo '<span class="tc2">'.$LANG['paid'].'</span>'; 
                                } else if($wDet['status'] == 'declined'){
                                   echo '<span class="tc3">'.$LANG['declined'].'</span>'; 
                                }
                                 ?>
                             </div>
                         </div>
                         <div class="withdrawl_detail_box flex_">
                             <div class="withdrawl_detail_box_item"><?php echo $LANG['payment_date'];?></div>
                             <div class="withdrawl_detail_box_item_">
                                 <?php 
                                   if(!empty($wDet['paid_time'])){
                                       $paidTime = $wDet['paid_time'];
                                       $paidTimeConvert = date('d/m/Y', $paidTime);
                                       echo $paidTimeConvert;
                                   }else{
                                       echo '-';
                                   }
                                 ?>
                             </div>
                         </div>
                    </div>
                </div>
                <!---->
            </div>
            <!--Modal Header-->
            <div class="i_modal_g_footer flex_"> 
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['close'], FILTER_SANITIZE_STRING) ;?></div>
            </div>
            <!--/Modal Header-->
       </div>   
   </div>
   <!--/SHARE--> 
</div> 