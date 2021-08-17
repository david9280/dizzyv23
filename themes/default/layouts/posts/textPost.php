<div class="i_post_body body_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?> <?php echo filter_var($subPostTop, FILTER_SANITIZE_STRING);?>"
    id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"
    data-last="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
    <?php echo html_entity_decode($waitingApprove); echo html_entity_decode($pPinStatus);?>
    <!--POST HEADER-->
    <div class="i_post_body_header">
        <div class="i_post_user_avatar">
            <img src="<?php echo filter_var($userPostOwnerUserAvatar, FILTER_SANITIZE_STRING);?>" />
        </div>
        <div class="i_post_i">
            <div class="i_post_username"><a class="truncated"
                    href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$userPostOwnerUsername;?>"><?php echo filter_var($userPostOwnerUserFullName, FILTER_SANITIZE_STRING)?><?php echo html_entity_decode($publisherGender);?>
                    <?php echo html_entity_decode($userVerifiedStatus);?> <?php echo html_entity_decode($wCanSee);?></a>
            </div>
            <div class="i_post_shared_time"><?php echo TimeAgo::ago($crTime , date('Y-m-d H:i:s'));?></div>
            <div class="i_post_menu">
                <div class="i_post_menu_dot openPostMenu transition"
                    id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('16'));?>
                    <!--POST MENU-->
                    <div
                        class="i_post_menu_container mnoBox mnoBox<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                        <div class="i_post_menu_item_wrapper">
                            <?php if($logedIn != 0 && ($userPostOwnerID == $userID || $userType == '2')){?>
                            <!--MENU ITEM-->
                            <div class="i_post_menu_item_out wcs transition"
                                id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                                <span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('15'));?></span>
                                <?php echo filter_var($LANG['whocanseethis'], FILTER_SANITIZE_STRING);?>
                            </div>
                            <!--/MENU ITEM-->
                            <!--MENU ITEM-->
                            <div class="i_post_menu_item_out edtp transition"
                                id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27'));?>
                                <?php echo filter_var($LANG['edit_post'], FILTER_SANITIZE_STRING);?>
                            </div>
                            <!--/MENU ITEM-->
                            <!--MENU ITEM-->
                            <div class="i_post_menu_item_out i_pnp transition pbtn_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"
                                id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING) ;?>">
                                <?php echo html_entity_decode($pPinStatusBtn);?>
                            </div>
                            <!--/MENU ITEM-->
                            <!--MENU ITEM-->
                            <div class="i_post_menu_item_out pcl transition"
                                id="dc_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"
                                data-id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING) ;?>">
                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('31'));?>
                                <?php echo html_entity_decode($commentStatusText);?>
                            </div>
                            <!--/MENU ITEM-->
                            <!--MENU ITEM-->
                            <div class="i_post_menu_item_out delp transition"
                                id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?>
                                <?php echo filter_var($LANG['delete_post'], FILTER_SANITIZE_STRING);?>
                            </div>
                            <!--/MENU ITEM-->
                            <?php }?>
                            <!--MENU ITEM-->
                            <div class="i_post_menu_item_out transition copyUrl"
                                data-clipboard-text="<?php echo $slugUrl;?>">
                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('30'));?>
                                <?php echo filter_var($LANG['copy_post_url'], FILTER_SANITIZE_STRING);?>
                            </div>
                            <!--/MENU ITEM-->
                            <?php if($logedIn != 0 && $userPostOwnerID != $userID){?>
                            <!--MENU ITEM-->
                            <!--/MENU ITEM-->
                            <?php }?>
                        </div>
                    </div>
                    <!--/POST MENU-->
                </div>
            </div>
        </div>
    </div>
    <!--/POST HEADER-->
    <!--POST CONTAINER-->
    <div class="i_post_container" id="i_post_container_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
        <!--POST TEXT-->
        <div class="i_post_text" id="i_post_text_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"
            style="margin-bottom:15px;">
            <?php   
        $pStatus = '1';
        /*********************************/
        if($userPostWhoCanSee != '1'){
            if($getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'subscriber' && $userPostStatus != '2' && $userPostWhoCanSee == '3'){ 
                $pStatus = '0';
            }else if($userPostWhoCanSee == '4' && $getFriendStatusBetweenTwoUser != 'me'){
                if($checkUserPurchasedThisPost == '0' && $getFriendStatusBetweenTwoUser != 'subscriber'){
                    $pStatus = '0'; 
                }
            } else if($userPostWhoCanSee == '2' && $getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'flwr'){
                $pStatus = '0';
            }
        }  
        if($pStatus == '1'){
            if(!empty($userPostText)){ 
                if(isset($userPostHashTags) && !empty($userPostHashTags)){
                    echo $urlHighlight->highlightUrls($iN->sanitize_output($iN->iN_RemoveYoutubelink($userPostText),$base_url));
                }else{
                    echo $urlHighlight->highlightUrls($iN->iN_RemoveYoutubelink($userPostText));
                } 
            }
            $regexUrl = '/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i'; 
            $totalUrl = preg_match_all($regexUrl, $userPostText, $matches);
            
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
        }else{ 
            echo '<div style="width:100%;position:relative;height:365px;overflow:hidden;border-radius:15px;background: linear-gradient(90deg , #f65169, #fab429);">'.html_entity_decode($onlySubs).'</div>'; 
        }
        /*********************************/ 
        ?>
        </div>
        <!--/POST TEXT-->
        <!--SHARED POST-->
        <?php 
            if($userPostSharedID){
                $sharedPostData = $iN->iN_GetAllPostDetails($userPostSharedID);
                if($sharedPostData){ 
                    include("sharedPost.php");
                }else{
                    echo '
                    <div class="i_shared_post_wrapper">
                       <div class="i_sharing_post_wrapper_in">
                           <div class="empty_data_container">
                               <div class="empty_data_icon">'.$iN->iN_SelectedMenuIcon('59').'</div>
                               <div class="empty_data_desc_cont">
                                    <div class="empty_data_desc_title">'.$LANG['empty_shared_title'].'</div>
                                    <div class="empty_data_desc_des">'.$LANG['empty_shared_desc'].'</div>
                               </div>
                           </div>
                       </div>
                    </div>
                    ';
                } 
            }
        ?>
        <!--/SHARED POST-->
    </div>
    <!--/POST CONTAINER-->
    <!--POST LIKE/COMMENT/SHARE/SOCIAL SHARE/SAVE BUTTONS-->
    <div class="i_post_footer" id="pf_l_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
        <div class="i_post_footer_item">
            <div class="i_post_item_btn transition <?php echo filter_var($likeClass, FILTER_SANITIZE_STRING);?> <?php echo filter_var($loginFormClass, FILTER_SANITIZE_STRING);?>"
                id="p_l_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>"
                data-id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                <?php echo html_entity_decode($likeIcon);?></div>
            <div class="lp_sum flex_ tabing" id="lp_sum_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                <?php echo filter_var($likeSum, FILTER_SANITIZE_STRING);?></div>
        </div>
        <div class="i_post_footer_item">
            <div class="i_post_item_btn transition in_comment"
                id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('20'));?></div>
        </div>
        <div class="i_post_footer_item">
            <div class="i_post_item_btn transition in_share"
                id="share_<?php echo isset($userPostSharedID) ? $userPostSharedID : $userPostID;?>"
                data-id="<?php echo isset($userPostSharedID) ? $userPostSharedID : $userPostID;?>">
                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('19'));?></div>
        </div>
        <div class="i_post_footer_item">
            <div class="i_post_item_btn transition in_social_share openShareMenu"
                id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('21'));?>
                <!--SHARE POST-->
                <div
                    class="i_share_this_post mnsBox mnsBox<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                    <div class="i_share_menu_wrapper">
                        <!--MENU ITEM-->
                        <div class="i_post_menu_item_out transition"
                            onclick="share('facebook', '<?php echo filter_var($slugUrl, FILTER_VALIDATE_URL);?>', '<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING); ?>')">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('33'));?>
                            <?php echo filter_var($LANG['share_on_facebook'], FILTER_SANITIZE_STRING);?>
                        </div>
                        <!--/MENU ITEM-->
                        <!--MENU ITEM-->
                        <div class="i_post_menu_item_out transition"
                            onclick="share('twitter', '<?php echo filter_var($slugUrl, FILTER_VALIDATE_URL);?>', '<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING); ?>')">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('34'));?>
                            <?php echo filter_var($LANG['share_on_twitter'], FILTER_SANITIZE_STRING);?>
                        </div>
                        <!--/MENU ITEM-->
                    </div>
                </div>
                <!--/SHARE POST-->
            </div>
        </div>
        <div class="i_post_footer_item">
            <div class="i_post_item_btn transition svp in_save_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?> in_save"
                id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                <?php echo html_entity_decode($pSaveStatusBtn);?></div>
        </div>
    </div>
    <!--/POST LIKE/COMMENT/SHARE/SOCIAL SHARE/SAVE BUTTONS-->
    <?php echo html_entity_decode($TotallyPostComment);?>
    <!--COMMENT FORM COMMENTS-->
    <div class="i_post_comments_wrapper">
        <div class="i_post_comments_box"
            id="all_comments_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
            <!--USER COMMENTS-->
            <div class="i_user_comments"
                id="i_user_comments_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                <?php   
                if($getUserComments && $logedIn == 1){
                   foreach($getUserComments as $comment){
                    $commentID = $comment['com_id'];
                    $commentedUserID = $comment['comment_uid_fk']; 
                    $Usercomment = $comment['comment'];
                    $commentTime = isset($comment['comment_time']) ? $comment['comment_time'] : NULL;
                    $corTime = date('Y-m-d H:i:s',$commentTime);  
                    $commentFile = isset($comment['comment_file']) ? $comment['comment_file'] : NULL; 
                    $stickerUrl = isset($comment['sticker_url']) ? $comment['sticker_url'] : NULL;
                    $gifUrl = isset($comment['gif_url']) ? $comment['gif_url'] : NULL;
                    $commentedUserIDFk = isset($comment['iuid']) ? $comment['iuid'] : NULL;
                    $commentedUserName = isset($comment['i_username']) ? $comment['i_username'] : NULL;
                    $commentedUserFullName = isset($comment['i_user_fullname']) ? $comment['i_user_fullname'] : NULL;
                    $commentedUserAvatar = $iN->iN_UserAvatar($commentedUserID, $base_url);
                    $commentedUserGender = isset($comment['user_gender']) ? $comment['user_gender'] : NULL;
                    if($commentedUserGender == 'male'){
                        $cpublisherGender = '<div class="i_plus_comment_g">'.$iN->iN_SelectedMenuIcon('12').'</div>';
                     }else if($commentedUserGender == 'female'){
                        $cpublisherGender = '<div class="i_plus_comment_g">'.$iN->iN_SelectedMenuIcon('12').'</div>';
                     }else if($commentedUserGender == 'couple'){
                        $cpublisherGender = '<div class="i_plus_comment_g">'.$iN->iN_SelectedMenuIcon('12').'</div>';
                     }
                    $commentedUserLastLogin = isset($comment['last_login_time']) ? $comment['last_login_time'] : NULL;
                    $commentedUserVerifyStatus = isset($comment['user_verified_status']) ? $comment['user_verified_status'] : NULL;
                    $cuserVerifiedStatus = '';
                    if($commentedUserVerifyStatus == '1'){
                        $cuserVerifiedStatus = '<div class="i_plus_comment_s">'.$iN->iN_SelectedMenuIcon('11').'</div>';
                    }   
                    $commentLikeBtnClass = 'c_in_like';
                    $commentLikeIcon = $iN->iN_SelectedMenuIcon('17');
                    $commentReportStatus = $iN->iN_SelectedMenuIcon('32').$LANG['report_comment'];
                    if($logedIn != 0){
                        $checkCommentLikedBefore = $iN->iN_CheckCommentLikedBefore($userID, $userPostID, $commentID);
                        $checkCommentReportedBefore = $iN->iN_CheckCommentReportedBefore($userID, $commentID);
                        if($checkCommentLikedBefore == '1'){
                            $commentLikeBtnClass = 'c_in_unlike';
                            $commentLikeIcon = $iN->iN_SelectedMenuIcon('18');
                        } 
                        if($checkCommentReportedBefore == '1'){
                            $commentReportStatus = $iN->iN_SelectedMenuIcon('32').$LANG['unreport'];
                        }
                    }
                    $stickerComment ='';
                    $gifComment = '';
                    if($stickerUrl){
                        $stickerComment = '<div class="comment_file"><img src="'.$stickerUrl.'"></div>';
                    } 
                    if($gifUrl){  
                        $gifComment = '<div class="comment_gif_file"><img src="'.$gifUrl.'"></div>';
                    }
                     include("comments.php");
                   }
                } 
                ?>
            </div>
            <!--/USER COMMENTS-->
            <?php 
            if($logedIn != 0){ 
                  if($userPostCommentAvailableStatus == '1'){
                     include("comment.php"); 
                  }else if($userPostCommentAvailableStatus == '0'){
                     if($userType == '2' || ($userPostOwnerID == $userID)){
                        include("comment.php"); 
                     }else{
                        echo '
                        <div class="i_comment_form">
                            <div class="need_login">'.$LANG['comments_limited_for_this_post'].'</div>
                        </div>';
                     }
                  } 
             } else if($logedIn == '0'){?>
            <div class="i_comment_form">
                <div class="need_login">
                    <?php echo filter_var($LANG['must_login_for_comment'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <?php }?>
        </div>
    </div>
    <!--/COMMENT FORM COMMENTS-->
</div>