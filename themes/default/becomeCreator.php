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
if($logedIn == 0){ include('layouts/login_form.php'); }
$completedLvlItem = $completedLvlItemBold = $completedLvlItemTwo = $completedLvlItemBoldTwo = '';
$completedLvlItem = $completedLvlItemTwo = $completedLvlItemTree = $completedLvlItemFour = $completedLvlItemFive = '';
$completedLvlItemBold = $completedLvlItemBoldTwo = $completedLvlItemBoldTree = $completedLvlItemBoldFour = $completedLvlItemBoldFive = '';
$completedLvlWidth = '0%';
if($certificationStatus == '0'){
    $completedLvlWidth = '0%';
    $completedLvlItem = 'i_completed_level_item';
    $completedLvlItemBold = 'i_completed_levet_item_bold';
}else if($certificationStatus == '1'){
    $completedLvlWidth = '24%';
    $completedLvlItem = $completedLvlItemTwo ='i_completed_level_item';
    $completedLvlItemBold = $completedLvlItemBoldTwo = 'i_completed_levet_item_bold';  
}
if($certificationStatus == '2' && $validationStatus == '1'){
    $completedLvlWidth = '44%'; 
    $completedLvlItem = $completedLvlItemTwo = $completedLvlItemTree ='i_completed_level_item';
    $completedLvlItemBold = $completedLvlItemBoldTwo = $completedLvlItemBoldTree = 'i_completed_levet_item_bold';
}
if($certificationStatus == '2' && $validationStatus == '2' && $feesStatus == '2' && $payoutStatus == '0'){
    $completedLvlWidth = '64%'; 
    $completedLvlItem = $completedLvlItemTwo = $completedLvlItemTree = $completedLvlItemFour ='i_completed_level_item';
    $completedLvlItemBold = $completedLvlItemBoldTwo = $completedLvlItemBoldTree = $completedLvlItemBoldFour ='i_completed_levet_item_bold';
}
if($certificationStatus == '2' && $validationStatus == '2' && $feesStatus == '2' && $payoutStatus == '2'){
    $completedLvlWidth = '80%'; 
    $completedLvlItem = $completedLvlItemTwo = $completedLvlItemTree = $completedLvlItemFour = $completedLvlItemFive ='i_completed_level_item';
    $completedLvlItemBold = $completedLvlItemBoldTwo = $completedLvlItemBoldTree = $completedLvlItemBoldFour = $completedLvlItemBoldFive ='i_completed_levet_item_bold';
}
?>
<?php include("layouts/header/header.php");?> 
    <div class="wrapper bCreatorBg" style="padding-bottom:50px;">  
        <div class="i_become_creator_container">
            <!---->
            <div class="i_become_creator_levels">
               <div class="i_become_creator_levels_title"><?php echo filter_var($LANG['become_creator'], FILTER_SANITIZE_STRING);?></div>
               <div class="i_levels_container">
                <div class="i_levels_container_position"></div>
                <div class="i_levels_container_position_lvl" style="width:<?php echo filter_var($completedLvlWidth, FILTER_SANITIZE_STRING);?>;"></div>
                   <!---->
                   <div class="i_complete_level">
                       <div class="i_complete_level_box <?php echo filter_var($completedLvlItem, FILTER_SANITIZE_STRING);?>">
                          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('14'));?>
                       </div>
                       <div class="i_complete_level_name <?php echo filter_var($completedLvlItemBold, FILTER_SANITIZE_STRING);?>">
                           <?php echo filter_var($LANG['certification'], FILTER_SANITIZE_STRING);?>
                       </div>
                   </div>
                   <!---->
                   <!---->
                   <div class="i_complete_level">
                       <div class="i_complete_level_box <?php echo filter_var($completedLvlItemTwo, FILTER_SANITIZE_STRING);?>">
                          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('47'));?>
                       </div>
                       <div class="i_complete_level_name <?php echo filter_var($completedLvlItemBoldTwo, FILTER_SANITIZE_STRING);?>">
                          <?php echo filter_var($LANG['validation'], FILTER_SANITIZE_STRING);?>
                       </div>
                   </div>
                   <!---->
                   <!---->
                   <div class="i_complete_level">
                       <div class="i_complete_level_box <?php echo filter_var($completedLvlItemTree, FILTER_SANITIZE_STRING);?>">
                          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('75'));?>
                       </div>
                       <div class="i_complete_level_name <?php echo filter_var($completedLvlItemBoldTree, FILTER_SANITIZE_STRING);?>">
                           <?php echo filter_var($LANG['conditions'], FILTER_SANITIZE_STRING);?>
                       </div>
                   </div>
                   <!---->
                   <!---->
                   <div class="i_complete_level">
                       <div class="i_complete_level_box <?php echo filter_var($completedLvlItemFour, FILTER_SANITIZE_STRING);?>">
                          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('76'));?>
                       </div>
                       <div class="i_complete_level_name <?php echo filter_var($completedLvlItemBoldFour, FILTER_SANITIZE_STRING);?>">
                           <?php echo filter_var($LANG['fees'], FILTER_SANITIZE_STRING);?>
                       </div>
                   </div>
                   <!---->
                   <!---->
                   <div class="i_complete_level">
                       <div class="i_complete_level_box <?php echo filter_var($completedLvlItemFive, FILTER_SANITIZE_STRING);?>">
                          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('77'));?>
                       </div>
                       <div class="i_complete_level_name <?php echo filter_var($completedLvlItemBoldFive, FILTER_SANITIZE_STRING);?>">
                           <?php echo filter_var($LANG['payouts'], FILTER_SANITIZE_STRING);?>
                       </div>
                   </div>
                   <!---->
               </div>
            </div>
            <!---->
            <!--BOX--> 
            <?php 
               if($certificationStatus == '0'){
                  include("layouts/widgets/certification.php");
               }else if($certificationStatus == '1'){
                  include("layouts/widgets/conditions.php");
               }else if($certificationStatus == '2' && $validationStatus == '1'){
                  include("layouts/widgets/fees.php");
               }else if($certificationStatus == '2' && $validationStatus == '2' && $feesStatus == '2' && $payoutStatus == '0'){
                  include("layouts/widgets/payout.php");
               }else if($certificationStatus == '2' && $validationStatus == '2' && $feesStatus == '2' && $payoutStatus == '2'){
                 echo '
                 <div class="i_become_creator_terms_box"> 
                   <div class="certification_form_container">
                        <div class="creator_conguratulation_title">'.$LANG['conguratulation'].'</div>
                        <div class="creator_conguratulation">'.$iN->iN_SelectedMenuIcon('82').'</div>
                        <div class="creator_conguratulation_note">'.$LANG['conguratulation_note'].'</div>
                   </div>
                 </div>
                 ';
               }
            ?> 
            <!--/BOX-->
        </div>
    </div>
</body>
</html>
