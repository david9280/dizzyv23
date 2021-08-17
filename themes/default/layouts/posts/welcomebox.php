<div class="i_welcomebox"> 
   <div class="i_welcomebox_in">
      <div class="i_welcomebox_title"><?php echo filter_var($LANG['welcome_to'], FILTER_SANITIZE_STRING);?></div> 
      <div class="i_welcomebox_slogan"><?php echo html_entity_decode($LANG['signup_for']);?></div>
      <div class="i_welcomebox_login_signup">
         <div class="i_login loginForm"><?php echo filter_var($LANG['login'], FILTER_SANITIZE_STRING);?></div>
         <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>register"><div class="i_singup"><?php echo filter_var($LANG['sign_up'], FILTER_SANITIZE_STRING);?></div></a>
      </div>
   </div>
</div>
<div class="i_register"><a class="loginForm"><?php echo filter_var($LANG['moniteize_your_content'], FILTER_SANITIZE_STRING);?></a></div>