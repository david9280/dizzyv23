<?php if($alertType == 'not_Shared'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
  <div class="i_alert_wrapper">
  <div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
    <div class="i_alert_icon">
       <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?>
    </div>
    <div class="i_alert_notes">
        <div class="i_alert_title">
           <?php echo filter_var($LANG['can_not_share_title'], FILTER_SANITIZE_STRING);?>
        </div>
        <div class="i_alert_desc">
        <?php echo filter_var($LANG['can_not_share_desc'], FILTER_SANITIZE_STRING);?>
        </div>
    </div>
  </div>
</div>  
<?php }else if($alertType == 'not_file'){ ?>
<div class="i_bottom_left_alert_container notice_alert animated fadeInUp">
  <div class="i_alert_wrapper">
  <div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
    <div class="i_alert_icon">
       <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?>
    </div>
    <div class="i_alert_notes">
        <div class="i_alert_title">
           <?php echo filter_var($LANG['file_not_found'], FILTER_SANITIZE_STRING);?>
        </div>
        <div class="i_alert_desc">
        <?php echo filter_var($LANG['file_not_found_not'], FILTER_SANITIZE_STRING);?>
        </div>
    </div>
  </div>
</div>
<?php }else if($alertType == 'sWrong'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
  <div class="i_alert_wrapper">
  <div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
    <div class="i_alert_icon">
       <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?>
    </div>
    <div class="i_alert_notes">
        <div class="i_alert_title">
           <?php echo filter_var($LANG['noway'], FILTER_SANITIZE_STRING);?>
        </div>
        <div class="i_alert_desc">
        <?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?>
        </div>
    </div>
  </div>
</div> 
<?php }else if($alertType == 'eCouldNotEmpty'){ ?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
  <div class="i_alert_wrapper">
  <div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
    <div class="i_alert_icon">
       <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?>
    </div>
    <div class="i_alert_notes">
        <div class="i_alert_title">
           <?php echo filter_var($LANG['noway'], FILTER_SANITIZE_STRING);?>
        </div>
        <div class="i_alert_desc">
        <?php echo filter_var($LANG['can_not_save_blank_post'], FILTER_SANITIZE_STRING);?>
        </div>
    </div>
  </div>
</div>
<?php }else if($alertType == 'delete_success'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['post_deleted'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['delete_success'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'delete_not_success'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['noway'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['post_could_not_be_delete'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'urlCopied'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['copied'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['link_copied'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'commentClosed'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['comments_opened'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['comments_enabled_success'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'commentOpened'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['comments_disabled'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['comments_disabled_success'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'pinClosed'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['pinClosed'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['pinClosed_notification_desc'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'pined'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['post_pined_on_your_profile'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['post_pined_on_your_profile_notification_desc'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'sAdded'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['added_in_saved_list'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['post_in_your_saved_list'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'sRemoved'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['removed_in_saved_list'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['post_removed_in_saved_list'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'delete_success'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['post_deleted'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['delete_success'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'delete_not_success'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['noway'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['post_could_not_be_delete'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'delete_comment_success'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon_tick">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['comment_deleted'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['delete_comment_success'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'delete_comment_not_success'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['noway'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['post_could_not_be_delete'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'youFollowing'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['follow'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['you_are_following'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }else if($alertType == 'youUnfollowing'){?>
<div class="i_bottom_left_alert_container warning_alert animated fadeInUp">
<div class="i_alert_wrapper">
<div class="i_alert_close transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
  <div class="i_alert_icon">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('61'));?>
  </div>
  <div class="i_alert_notes">
      <div class="i_alert_title">
         <?php echo filter_var($LANG['unfollow'], FILTER_SANITIZE_STRING);?>
      </div>
      <div class="i_alert_desc">
      <?php echo filter_var($LANG['you_are_unfollowing'], FILTER_SANITIZE_STRING);?>
      </div>
  </div>
</div>
</div>
<?php }?>   