<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("layouts/header/meta.php");
       include("layouts/header/css.php");
       include("layouts/header/javascripts.php");
    ?>
</head>
<body>
<?php 
if($logedIn == 0){ include('layouts/login_form.php');} 
include("layouts/header/header.php");
?> 
<div class="wrapper bCreatorBg" style="padding-bottom:50px;">  
   <div class="premium_plans_container">
      <h1><?php echo filter_var($LANG['supply_of_wallet'], FILTER_SANITIZE_STRING);?></h1>
      <h2><?php echo filter_var($LANG['purchase_of_points'], FILTER_SANITIZE_STRING);?></h2>
      <div class="buyCreditWrapper flex_ tabing">
          <?php 
          if($purchasePointPlanTable){
            foreach($purchasePointPlanTable as $planData){
               $planID = $planData['plan_id'];
               $planName = $planData['plan_name_key'];
               $planCreditAmount = $planData['plan_amount'];
               $planAmount = $planData['amount']; 
          ?>
            <!---->
            <div class="credit_plan_box <?php echo filter_var($logedIn, FILTER_SANITIZE_STRING) == '0' ? 'loginForm' : 'buyPoint';?>" id="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>">
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
              </div>
             </div>
            <!---->
          <?php  }
          }
          ?>  
      </div>
      <div class="general_page_footer">
       <?php include_once("layouts/footer.php");?>
   </div>
   </div> 

</div>
</body>
</html>
