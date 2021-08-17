<!--COMMENT-->
<div class="i_u_comment_body dlCm<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>" id="<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>">
    <div class="i_post_user_commented_avatar">
        <img src="<?php echo filter_var($commentedUserAvatar, FILTER_SANITIZE_STRING);?>"/>
    </div>
    <div class="i_user_comment_header">
        <div class="i_user_commented_user_infos"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$commentedUserName;?>"><?php echo filter_var($commentedUserFullName, FILTER_SANITIZE_STRING);?> <?php echo html_entity_decode($cpublisherGender);?><?php echo html_entity_decode($cuserVerifiedStatus);?></a></div>
        <?php if(!empty($Usercomment)){?>
        <div class="i_user_comment_text" id="i_u_c_<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>">
        <?php 
        if(!empty($Usercomment)){  
                echo $urlHighlight->highlightUrls($Usercomment); 
        }
        $regexUrl = '/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i'; 
        $totalUrl = preg_match_all($regexUrl, $Usercomment, $matches);
        
        $urls = $matches[0];
        // go over all links
        foreach($urls as $url) 
        {
            $em = new Url_Expand($url);
            // Get the link size
            $site = $em->get_site();
    
            if ($site != "") {
                // If code is iframe then show the link in iframe
                $code = $em->get_iframe();
                if ($code == "") {
                    // If code is embed then show the link in embed
                    $code = $em->get_embed();
                    if ($code == "") {
                        // If code is thumb then show the link medium
                        $codesrc = $em->get_thumb("medium");
                    }
                }
                echo $code;
            } 
        }
        ?>
        </div>
        <?php }?>
        <?php echo html_entity_decode($stickerComment); echo html_entity_decode($gifComment);?>
        <div class="i_comment_like_time">
            <div class="i_comment_like_btn">
                <div class="i_comment_item_btn transition c_in_l_<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?> <?php echo html_entity_decode($commentLikeBtnClass);?>" id="com_<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>" data-p="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($commentLikeIcon);?></div>
                <div class="i_comment_like_sum" id="t_c_<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($iN->iN_TotalCommentLiked($commentID), FILTER_SANITIZE_STRING);?></div>
            </div>
            <div class="i_comment_time"><?php echo TimeAgo::ago($corTime , date('Y-m-d H:i:s'));?></div>
            <div class="i_comment_call_popup openComMenu" id="<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>">
                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('16'));?>
                <!--COMMENT MENU-->
                <div class="i_comment_menu_container comMBox comMBox<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>">
                    <div class="i_comment_menu_wrapper">
                        <!--MENU ITEM-->
                        <div class="i_post_menu_item_out delCm transition" id="<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?> <?php echo filter_var($LANG['delete_comment'], FILTER_SANITIZE_STRING);?>
                        </div>
                        <!--/MENU ITEM-->
                        <!--MENU ITEM-->
                        <div class="i_post_menu_item_out cced transition" id="<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27'));?> <?php echo filter_var($LANG['edit_comment'], FILTER_SANITIZE_STRING);?>
                        </div>
                        <!--/MENU ITEM--> 
                    </div>
                </div>
                <!--/COMMENT MENU-->
            </div>
        </div>
    </div>
</div>
<!--/COMMENT-->   