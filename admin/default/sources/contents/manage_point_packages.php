<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['point_packages_settings'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:25px;">  
           <div class="new_svg_icon_wrapper">
               <div style="display: inline-block;"><div class="flex_ tabing_non_justify newSvgCode newCreate border_one" data-type="newPackage"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?><?php echo filter_var($LANG['create_a_new_package'], FILTER_SANITIZE_STRING);?></div></div>
           </div>
             <div class="buyCreditWrapper flex_ tabing">
             <?php 
                if($planTableList){
                    foreach($planTableList as $planData){
                    $planID = $planData['plan_id'];
                    $planName = $planData['plan_name_key'];
                    $planCreditAmount = $planData['plan_amount'];
                    $planAmount = $planData['amount'];
                    $editPlanLink = $base_url.'admin/manage_point_packages?id='.$planID;
                    $planStatus = $planData['plan_status'];
                ?>
                    <!---->
                    <div class="credit_plan_box" id="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>"> 
                        <div class="plan_box tabing flex_" id="p_i_<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>">
                            <div class="plan_name flex_"><?php echo isset($LANG[$planName]) ? $LANG[$planName] : $planName;?></div>
                            <div class="plan_value">
                                <div class="plan_price tabing">
                                    <div style="position:relative; display:initial;">
                                        <?php echo number_format($planCreditAmount);?>
                                        <span class="plan_point_icon">
                                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
                                        </span>
                                    </div> 
                                </div>
                                <div class="plan_point tabing flex_"><?php echo filter_var($LANG['points'], FILTER_SANITIZE_STRING);?></div>
                                <!---->
                                <div class="purchaseButton flex_ tabing">
                                        <?php echo filter_var($LANG['purchase'], FILTER_SANITIZE_STRING);?>
                                        <strong  class="tabing flex_" style="display:inline-flex;">
                                            <?php echo number_format($planCreditAmount);?>
                                            <span class="prcsic"> 
                                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
                                            </span>
                                        </strong>
                                        <div class="foramount"><?php echo filter_var($LANG['for'], FILTER_SANITIZE_STRING).' '.$currencys[$defaultCurrency].number_format($planAmount);?></div>
                                    </div>
                                <!---->
                            </div>
                            <div class="tabing flex_ edit_active_delete">
                               <div class="ecd_item">
                                  <div class="ecd_item_in flex_ tabing"> 
                                    <div class="i_checkbox_wrapper flex_ tabing_non_justify" style="padding:15px 0px;">
                                        <label class="el-switch el-switch-yellow" for="planStatus<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>">
                                            <input type="checkbox" class="pstat" id="planStatus<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>" data-type="planStatus" <?php echo filter_var($planStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                                            <span class="el-switch-style"></span>  
                                        </label> 
                                    </div>
                                  </div>
                               </div>
                               <div class="ecd_item flex_ tabing">
                                   <a href="<?php echo filter_var($editPlanLink, FILTER_VALIDATE_URL);?>"><div class="ecd_item_in flex_ tabing edit_plan border_one c2"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27'));?><?php echo filter_var($LANG['edit_plan'], FILTER_SANITIZE_STRING);?></div></a>
                                </div>
                               <div class="ecd_item flex_ tabing"><div class="ecd_item_in flex_ tabing delete_plan border_one c3" id="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?><?php echo filter_var($LANG['delete_plan'], FILTER_SANITIZE_STRING);?></div></div>
                            </div>
                        </div> 
                    </div>
                    <!---->
                <?php  }
                }
                ?>  
             </div>
       </div>
       <!---->       
    </div>
</div> 