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
<?php if($userCanRegister == '1'){
    $claimName = '';
if(isset($_GET['claim']) && $_GET['claim'] != ''){
   $claimName = mysqli_real_escape_string($db,$_GET['claim']);
   $checkUserNameExist = $iN->iN_CheckUsernameExistForRegister($iN->iN_Secure($claimName));
   if($checkUserNameExist || empty($claimName) || $claimName == ''){
      $claimName = '';
   }
}
?>
    <div class="i_become_creator_container">
        <!--*******************************-->
        <div class="i_modal_content"> 
            <!--Register Header-->
            <div class="i_login_box_header">
                <div class="i_login_box_wellcome_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('2'));?></div>
                <div class="i_welcome_back">
                    <div class="i_lBack"><?php echo filter_var($LANG['sign_up'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_lnot"><?php echo filter_var($LANG['try_site_for_free'], FILTER_SANITIZE_STRING);?></div>
                </div>
            </div>
            <!--/Register Header-->
            <!--Register With-->
            <?php 
            if($socialLoginStatus == '1'){ 
                $socialLogins = $iN->iN_SocialLogins();
                if($socialLogins){
                    echo '<!--Modal Social Login Content-->
                    <div class="i_modal_social_login_content">
                        <div class="login-title"><span>'.$LANG['login-with'].'</span></div><div class="i_social-btns">';
                    foreach($socialLogins as $sL){
                        $sKey = $sL['s_key'];
                        $sIcon = $sL['s_icon']; 
                    ?>  
                    <div><a class="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING);?>-login" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$sKey;?>Login.php"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon($sIcon));?><span><?php echo filter_var($LANG[$sKey], FILTER_SANITIZE_STRING);?></span></a></div>
                <?php }echo '</div><div class="login-title"><span>'.$LANG['or-directly'].'</span></div>'; }
                echo '</div>';
                } ?> 
                <div class="i_warns">
                <div class="i_error"></div>  
                </div>
            <!--/Register With-->
            <div class="i_helper_title"><?php echo filter_var($LANG['you_are'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_direct_register i_register_box_">
            <form enctype="multipart/form-data" method="post" id='iregister' autocomplete="off">
                <!--********************-->
                <div class="i_settings_item_title_for flex_" style="margin-bottom:20px;padding-right:20px;">
                    <!---->
                    <div class="flexBox flex_">
                    <label class="youare" id="youarein" for="female">
                        <input type="radio" name="gender" id="female" value="female">
                        <span class="flex_ transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('13'));?><?php echo filter_var($LANG['female'], FILTER_SANITIZE_STRING);?></span>
                    </label>
                    </div>
                    <!---->
                    <!---->
                    <div class="flexBox flex_">
                    <label class="youare" id="youare" for="couple">
                        <input type="radio" name="gender" id="couple" value="couple" checked='checked'>
                        <span class="flex_ transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('58'));?><?php echo filter_var($LANG['couple'], FILTER_SANITIZE_STRING);?></span>
                    </label>
                    </div>
                    <!---->
                    <!---->
                    <div class="flexBox flex_">
                    <label class="youare flex_" id="youarein" for="male">
                        <input type="radio" name="gender" id="male" value="male">
                        <span class="flex_ transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('12'));?><?php echo filter_var($LANG['male'], FILTER_SANITIZE_STRING);?></span>
                    </label>
                    </div>
                    <!---->
                </div>
                <!--********************-->
                <!--********************-->
                <div class="i_settings_item_title_for flex_" style="margin-bottom:20px; width:100%;padding-right:20px;">
                    <div class="i_re_box">
                        <div class="i_settings_item_title" style="width:100%;"><?php echo filter_var($LANG['full_name'], FILTER_SANITIZE_STRING);?></div>
                        <div class="i_settings_item_title_for" style="width:100%;padding-left:0px;padding-top:8px;">
                           <input type="text" name="flname" class="flnm" style="min-width: 100%;" placeholder="<?php echo filter_var($LANG['your_full_name'], FILTER_SANITIZE_STRING);?>">
                       </div>
                    </div>
                    <div class="i_re_box">
                        <div class="i_settings_item_title" style="width:100%;"><?php echo filter_var($LANG['username'], FILTER_SANITIZE_STRING);?></div>
                        <div class="i_settings_item_title_for" style="width:100%;padding-left:0px;padding-top:8px;">
                           <input type="text" name="uusername" class="flnm" style="min-width: 100%;" placeholder="<?php echo filter_var($LANG['your_username'], FILTER_SANITIZE_STRING);?>" value="<?php echo filter_var($claimName, FILTER_SANITIZE_STRING);?>">
                        </div>
                    </div>
                </div>
                <!--********************-->
                <!--********************-->
                <div class="i_settings_item_title_for flex_" style="margin-bottom:20px; width:100%;padding-right:20px;">
                    <div class="i_re_box">
                        <div class="i_settings_item_title" style="width:100%;"><?php echo filter_var($LANG['your_email_address'], FILTER_SANITIZE_STRING);?></div>
                        <div class="i_settings_item_title_for" style="width:100%;padding-left:0px;padding-top:8px;">
                           <input type="text" name="y_email" class="flnm" style="min-width: 100%;" placeholder="<?php echo filter_var($LANG['your_email_address'], FILTER_SANITIZE_STRING);?>">
                       </div>
                    </div>
                    <div class="i_re_box">
                        <div class="i_settings_item_title" style="width:100%;"><?php echo filter_var($LANG['password'], FILTER_SANITIZE_STRING);?></div>
                        <div class="i_settings_item_title_for" style="width:100%;padding-left:0px;padding-top:8px;">
                           <input type="password" name="y_password" class="flnm" style="min-width: 100%;" placeholder="<?php echo filter_var($LANG['password'], FILTER_SANITIZE_STRING);?>">
                        </div>
                    </div>
                </div>
                <!--********************-->
                <div class="i_settings_item_title_for flex_" style="margin-bottom:20px; width:100%;padding-right:20px;">
                    <div class="certification_file_form"> 
                        <div class="certification_file_box">
                            <?php echo html_entity_decode($LANG['accept_terms_of_conditions_register']);?>
                        </div> 
                    </div>
                </div>
                <div class="register_warning fill_all">
                    <?php echo filter_var($LANG['full_for_register'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="register_warning fill_pass">
                    <?php echo filter_var($LANG['passwor_too_short'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="register_warning fill_email_used">
                    <?php echo filter_var($LANG['email_already_in_use_warning'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="register_warning fill_email_invalid">
                    <?php echo filter_var($LANG['invalid_email_address'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="register_warning fill_username_empty">
                    <?php echo filter_var($LANG['username_should_not_be_empty'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="register_warning fill_username_used">
                    <?php echo filter_var($LANG['try_different_username'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="register_warning fill_username_short">
                    <?php echo filter_var($LANG['short_username'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="register_warning fill_username_invalid">
                    <?php echo filter_var($LANG['invalid_username'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="form_group">
                    <div class="i_login_button"><button type="submit"><?php echo filter_var($LANG['register'], FILTER_SANITIZE_STRING);?></button></div>
                </div> 
            </form>
            </div>
        </div>
        <!--*******************************-->
    </div>
<?php }else{?>
<div class="i_become_creator_container tabing">
   <div class="tabing column flex_ register_disabled">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('130'));?>
     <?php echo filter_var($LANG['register_disabled'], FILTER_SANITIZE_STRING);?>
   </div>
</div>
<?php } ?>
</div>
</body>
</html>
