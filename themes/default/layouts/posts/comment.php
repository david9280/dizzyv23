<div class="i_comment_form">
<!--COMMENT FORM AVATAR-->
<div class="i_post_user_comment_avatar">
    <img src="<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING);?>"/>
</div> 
<div class="i_comment_form_textarea" data-id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
    <div class="i_comment_t_body"><textarea name="post_comment" class="comment commenta nwComment" data-id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" id="comment<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" placeholder="<?php echo filter_var($LANG['write_your_comment'], FILTER_SANITIZE_STRING);?>"></textarea><input type="hidden" id="stic_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"><input type="hidden" id="cgif_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"></div>
    <!--FAST COMMENT BUTTONS-->
    <div class="i_comment_footer i_comment_footer<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
        <div class="i_comment_fast_answers getStickers<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?> ">
            <div class="i_fa_body getGifs" id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('23'));?></div>
            <div class="i_fa_body getStickers" id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('24'));?></div>
            <div class="i_fa_body getEmojisC<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?> getEmojisC" data-type="emojiBoxC" data-id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('25'));?></div>
            <div class="i_fa_body sndcom" id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('26'));?></div>
        </div>
    </div>
    <!--/FAST COMMENT BUTTONS-->
</div>
<!--/COMMENT FORM AVATAR--> 
</div>
<div class="emptyStickerArea emptyStickerArea<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"></div>
<div class="emptyGifArea emptyGifArea<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" style="display:none;">
<div class="in_gif_wrapper"><img class="srcGif<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" src=""></div>
<div class="removeGif" id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
</div>