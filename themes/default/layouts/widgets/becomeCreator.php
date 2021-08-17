<div class="i_become_creator_wrapper"> 
    <div class="i_become_creator_title"><?php echo filter_var($LANG['become_creator'], FILTER_SANITIZE_STRING);?></div>
    <div class="i_become_title_mini"><?php echo filter_var($LANG['registeration_free_fast'], FILTER_SANITIZE_STRING);?></div>
    <div class="i_become_ceator_link"> 
        <?php if($logedIn == '1'){ ?>
            <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).'creator/becomeCreator';?>"><?php echo filter_var($LANG['become_creator'], FILTER_SANITIZE_STRING);?></a>
        <?php }else{ ?>
            <a class="loginForm"><?php echo filter_var($LANG['become_creator'], FILTER_SANITIZE_STRING);?></a>
        <?php }?>
    </div>
    <div class="i_become_creator_icon">
       <div class="i_bicome"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('9'));?></div>
    </div> 
</div>