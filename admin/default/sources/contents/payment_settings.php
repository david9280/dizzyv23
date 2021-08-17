<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['payment_settings'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;"> 
        <form enctype="multipart/form-data" method="post" id="paymentSettings">
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['default_currency'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="fl_limit"><span class="lmt"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($currencys as $crncy => $value){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($defaultCurrency, FILTER_SANITIZE_STRING) == '' . $crncy . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($crncy, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($value, FILTER_SANITIZE_STRING);?>" data-type="mb_limit"><?php echo filter_var($crncy, FILTER_SANITIZE_STRING).'('.$value.')'; ?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="default_currency" id="upLimit" value="<?php echo filter_var($defaultCurrency, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['important_for_subscription_currency_selection_not'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['fee_comission'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="ch_limit"><span class="lct"><?php echo filter_var($adminFee, FILTER_SANITIZE_STRING);?>%</span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_ch_container">
                            <div class="i_countries_list border_one column flex_"> 
                            <?php for ($i = 50; $i > 0; $i--) {?>
                                <div class="i_s_limit transition border_one gsearch <?php echo filter_var($adminFee, FILTER_SANITIZE_STRING) == '' . $i . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($i, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($i, FILTER_SANITIZE_STRING).'%';?>" data-type="characterLimit"><?php echo filter_var($i, FILTER_SANITIZE_STRING);?>%</div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="fee_comission" id="upcLimit" value="<?php echo filter_var($adminFee, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['fee_mossion_not'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['min_sub_amount_weekly'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="number" name="min_sub_weekly" min="1" class="i_input flex_" value="<?php echo filter_var($subscribeWeeklyMinimumAmount, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['min_sub_amount_monthly'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="number" name="min_sub_monthly" min="1" class="i_input flex_" value="<?php echo filter_var($subscribeMonthlyMinimumAmount, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['min_sub_amount_yearly'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="number" name="min_sub_yearly" min="1" class="i_input flex_" value="<?php echo filter_var($subscribeYearlyMinimumAmount, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['min_point_amount'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="number" name="min_point_amount" min="1" class="i_input flex_" value="<?php echo filter_var($minimumPointLimit, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['max_point_amount'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="number" name="max_point_amount" min="1" class="i_input flex_" value="<?php echo filter_var($maximumPointLimit, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['how_much_one_point'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="number" name="point_to_dolar" min="0.1" step="0.1" class="i_input flex_" value="<?php echo filter_var($onePointEqual, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['minimum_withdrawal_amount_set'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="number" name="min_withdrawl_amount" min="1" step="0.1" class="i_input flex_" value="<?php echo filter_var($minimumWithdrawalAmount, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!----> 
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
            <div class="warning_wrapper warning_one"><?php echo filter_var($LANG['no_empty_no_zero'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="paymentSettings">
                <button type="submit" name="submit" class="i_nex_btn_btn transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            <!---->
        </form>
        </div>
        <!---->
    </div>
</div>