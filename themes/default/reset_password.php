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
<div class="wrapper bCreatorBg" style="padding-bottom:50px;">   
    <div class="i_become_creator_container">
        <!--*******************************-->
        <div class="i_modal_content"> 
            <!--Register Header-->
            <div class="i_login_box_header">
                <div class="i_login_box_wellcome_icon" style="width:74px;height:74px;padding:14px 13px;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('14'));?></div>
                <div class="i_welcome_back">
                    <div class="i_lBack"><?php echo filter_var($LANG['reset_your_password'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_lnot"><?php echo filter_var($LANG['reset_pass_not'], FILTER_SANITIZE_STRING);?></div>
                </div>
            </div>
            <!--/Register Header--> 
            <div class="i_direct_register i_register_box_">
            <form enctype="multipart/form-data" method="post" id='iresetpass' autocomplete="off"> 
                <!--********************-->
                <div class="i_settings_item_title_for flex_" style="margin-bottom:20px; width:100%;padding-right:20px;">
                    <div class="i_re_box">
                        <div class="i_settings_item_title" style="width:100%;"><?php echo filter_var($LANG['your_new_pass'], FILTER_SANITIZE_STRING);?></div>
                        <div class="i_settings_item_title_for" style="width:100%;padding-left:0px;padding-top:8px;">
                           <input type="password" name="pnew" class="flnm" style="min-width: 100%;" placeholder="<?php echo filter_var($LANG['write_your_new_pass'], FILTER_SANITIZE_STRING);?>">
                       </div>
                    </div>
                    <div class="i_re_box">
                        <div class="i_settings_item_title" style="width:100%;"><?php echo filter_var($LANG['re_new_pass'], FILTER_SANITIZE_STRING);?><input type="hidden" name="ac" value="<?php echo filter_var($activationCode, FILTER_SANITIZE_STRING);?>"></div>
                        <div class="i_settings_item_title_for" style="width:100%;padding-left:0px;padding-top:8px;">
                           <input type="password" name="repnew" class="flnm" style="min-width: 100%;" placeholder="<?php echo filter_var($LANG['re_re_new_pass'], FILTER_SANITIZE_STRING);?>">
                        </div>
                    </div>
                </div>
                <!--********************--> 
                <div class="i_settings_wrapper_item warning_success">
                    <?php echo filter_var($LANG['your_pass_changed_success_login'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="i_settings_wrapper_item warning_not_mach">
                    <?php echo filter_var($LANG['new_pass_not_match'], FILTER_SANITIZE_STRING);?>
                </div>  
                <div class="i_settings_wrapper_item successNot">
                    <?php echo filter_var($LANG['profile_updated_success'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="i_settings_wrapper_item no_new_password_wrote">
                    <?php echo filter_var($LANG['no_new_password_wrote'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="i_settings_wrapper_item minimum_character_not">
                    <?php echo filter_var($LANG['minimum_character_not'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="i_settings_wrapper_item not_contain_whitespace">
                    <?php echo filter_var($LANG['not_contain_whitespace'], FILTER_SANITIZE_STRING);?>
                </div> 
                <div class="form_group">
                    <input type="hidden" name="f" value="iresetpass">
                    <div class="i_login_button"><button type="submit"><?php echo filter_var($LANG['reset_now'], FILTER_SANITIZE_STRING);?></button></div>
                </div> 
            </form>
            </div>
        </div>
        <!--*******************************-->
    </div>
</div>
</body>
</html>
