<!--Modal-->
<div class="i_modal_bg">
    <!--Login-->
   <div class="i_modal_in">
       <!--Close Login-->
       <div class="i_modal_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5')); ?></div>
       <!--/Close Login-->
       <div class="i_modal_content">
       <!--Modal Header-->
            <div class="i_login_box_header">
                <div class="i_login_box_wellcome_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('2')); ?></div>
                <div class="i_welcome_back">
                    <div class="i_lBack"><?php echo filter_var($LANG['you-are-back'], FILTER_SANITIZE_STRING); ?></div>
                    <div class="i_lnot"><?php echo filter_var($LANG['login-to-access-your-account']); ?></div>
                </div>
            </div>
        <!--/Modal Header-->
        <?php if ($socialLoginStatus == '1') {
	$socialLogins = $iN->iN_SocialLogins();
	if ($socialLogins) {
		echo '<!--Modal Social Login Content-->
             <div class="i_modal_social_login_content">
                <div class="login-title"><span>' . $LANG['login-with'] . '</span></div><div class="i_social-btns">';
		foreach ($socialLogins as $sL) {
			$sKey = $sL['s_key'];
			$sIcon = $sL['s_icon'];
			?>
             <div><a class="<?php echo filter_var($sKey, FILTER_SANITIZE_STRING); ?>-login" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL) . $sKey; ?>Login.php"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon($sIcon)); ?><span><?php echo filter_var($LANG[$sKey], FILTER_SANITIZE_STRING); ?></span></a></div>
        <?php }
		echo '</div><div class="login-title"><span>' . $LANG['or-directly'] . '</span></div>
             </div>
            <!--/Modal Social Login Content-->';
	}}?>

        <div class="i_warns">
          <div class="i_error"></div>
        </div>
        <!--Direct Login-->
        <div class="i_direct_login">
            <form enctype="multipart/form-data" method="post" id='ilogin' autocomplete="off">
                <div class="form_group">
                    <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['username-or-email'], FILTER_SANITIZE_STRING); ?></label>
                    <div class="form-control">
                       <input type="text" name="username" id="i_nora_username" class="inora_user_input" placeholder="<?php echo filter_var($LANG['username-or-email-ex'], FILTER_SANITIZE_STRING); ?>">
                    </div>
                </div>
                <div class="form_group">
                    <label for="i_nora_password" class="form_label"><?php echo filter_var($LANG['password'], FILTER_SANITIZE_STRING); ?></label>
                    <div class="form-control">
                       <input type="password" name="password" id="i_nora_password" class="inora_user_input" placeholder="<?php echo filter_var($LANG['password'], FILTER_SANITIZE_STRING); ?>">
                    </div>
                </div>
                <div class="form_group">
                    <div class="i_login_button"><button type="submit"><?php echo filter_var($LANG['login'], FILTER_SANITIZE_STRING); ?></button></div>
                </div>
            </form>
        </div>
        <!--/Direct Login-->
        <div class="i_l_footer">
                <?php echo html_entity_decode($LANG['not-member-yet']); ?>
        </div>
       </div>
       <a class="password-reset"><?php echo filter_var($LANG['forgot-password'], FILTER_SANITIZE_STRING); ?></a>
   </div>
   <!--/Login-->
   <!--Forgot Password-->
   <div class="i_modal_forgot">
       <!--Close Login-->
       <div class="i_modal_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5')); ?></div>
       <!--/Close Login-->
       <!--Forgot Password Content-->
       <div class="i_modal_content">
           <!--Modal Header-->
           <div class="i_login_box_header">
                <div class="i_login_box_wellcome_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('6')); ?></div>
                <div class="i_welcome_back">
                    <div class="i_lBack"><?php echo filter_var($LANG['change-password'], FILTER_SANITIZE_STRING); ?></div>
                    <div class="i_lnot"><?php echo filter_var($LANG['never-mind'], FILTER_SANITIZE_STRING); ?></div>
                </div>
            </div>
            <!--/Modal Header-->
            <!--Send Email for Forgot passowrd-->
            <div class="i_direct_login s_e">
                   <div class="no_this_email flex_ tabing warning_not_mach" style="padding-left:25px;padding-bottom:10px;"><?php echo filter_var($LANG['this_email_not_registered'], FILTER_SANITIZE_STRING); ?></div>
                   <div class="system_no_send flex_ tabing warning_not_correct" style="padding-left:25px;padding-bottom:10px;"><?php echo filter_var($LANG['email_send_closed'], FILTER_SANITIZE_STRING); ?></div>
                   <div class="system_no_send flex_ tabing minimum_character_not" style="padding-left:25px;padding-bottom:10px;">Write email</div>
                    <div class="form_group">
                        <label for="i_nora_forgot_password" class="form_label"><?php echo filter_var($LANG['email-address'], FILTER_SANITIZE_STRING); ?></label>
                        <div class="form-control">
                        <input type="text" id="i_nora_forgot_password" class="inora_user_input" placeholder="<?php echo filter_var($LANG['email-address'], FILTER_SANITIZE_STRING); ?>">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="i_forgot_button"><?php echo filter_var($LANG['send'], FILTER_SANITIZE_STRING); ?></div>
                    </div>
            </div>
            <!--/Send Email for Forgot password-->
            <div class="i_direct_login s_e_success" style="display:none;">
                <?php echo filter_var($LANG['check_your_email'], FILTER_SANITIZE_STRING); ?>
            </div>
       </div>
       <!--/Forgot Password Content-->
       <div class="i_l_footer">
           <a class="already-member" ><?php echo filter_var($LANG['already-member'], FILTER_SANITIZE_STRING); ?></a>
        </div>
   </div>
   <!--/Forgot Password-->
</div>
<!--/Modal-->