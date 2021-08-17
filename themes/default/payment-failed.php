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
<?php if($logedIn == 0){ include('layouts/login_form.php'); }?>
<?php include("layouts/header/header.php");?> 
    <div class="wrapper">  
       <div class="payment_failed">
          <div class="payment_result_title flex_ tabing"><?php echo filter_var($LANG['payment_failed_title'], FILTER_SANITIZE_STRING);?></div>
          <div class="payment_result_icon flex_ tabing">
            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('87'));?>
          </div>
          <div class="payment_result_description flex_ tabing">
             <?php echo filter_var($LANG['payment_failed_desc'], FILTER_SANITIZE_STRING);?>
          </div>
          <div class="payment_result_footer flex_ tabing">
               <div class="payment_result_item transition"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>"><?php echo filter_var($LANG['back_home_page'], FILTER_SANITIZE_STRING);?></a></div>
               <div class="payment_result_item transition"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$userName;?>"><?php echo filter_var($LANG['go_profile_page'], FILTER_SANITIZE_STRING);?></a></div>
          </div>
       </div> 
    </div>
</body>
</html>