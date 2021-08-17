<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify" style="max-width:700px;margin:0px auto;">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['edit_package'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <div class=""></div>
        <form enctype="multipart/form-data" method="post" id="editPointPackage">
 
        <!--*********************************-->
         <?php 
         $planData = $iN->GetPlanDetails($planID);
         $planID = $planData['plan_id'];
         $planNameKey = $planData['plan_name_key'];
         $planPoint = $planData['plan_amount'];
         $planStatus = $planData['plan_status'];
         $planAmount = $planData['amount'];
         ?> 
         <div class="i_p_e_body" style="padding:15px;">
           <div class="warning_wrapper pk_wraning"><?php echo filter_var($LANG['all_fields_must_be_filled'], FILTER_SANITIZE_STRING);?></div>
           <div class="add_app_not_point"><?php echo isset($LANG['plan_key']) ? $LANG['plan_key'] : 'NaN';?></div>
           <div class="i_plnn_container flex_">    
              <input type="text" name="planKey" class="point_input" value="<?php echo filter_var($planNameKey, FILTER_SANITIZE_STRING);?>">
           </div> 
           <div class="add_app_not_point"><?php echo filter_var($LANG['plan_point'], FILTER_SANITIZE_STRING);?></div>
           <div class="i_plnn_container flex_">    
              <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
              <input type="text" name="planPoint" class="point_input" style="padding-left:50px;" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" value="<?php echo filter_var($planPoint, FILTER_SANITIZE_STRING);?>">
           </div> 
           <div class="add_app_not_point"><?php echo filter_var($LANG['plan_fee'], FILTER_SANITIZE_STRING);?></div>
           <div class="i_plnn_container flex_">  
              <div class="i_amount_currency"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></div> 
              <input type="text" name="pointAmount" class="point_input" style="padding-left:50px;" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)"  value="<?php echo filter_var($planAmount, FILTER_SANITIZE_STRING);?>">
           </div>
           <div class="i_become_creator_box_footer">
                <input type="hidden" name="f" value="editPlan">
                <input type="hidden" name="planid" value="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>"> 
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
        </div> 
        <!--*********************************-->
 
        </form>
    </div> 
    
</div>