<?php 
if($logedIn != 0){
    $suggestedCreators = $iN->iN_SuggestionCreatorsList($userID);
}else{
    $suggestedCreators = $iN->iN_SuggestionCreatorsListOut();  
}
    if($suggestedCreators){?>
    <div class="i_right_box_header">
    <?php echo filter_var($LANG['suggested_creators'], FILTER_SANITIZE_STRING);?>
    </div>
    <div class="i_topinoras_wrapper">
    <?php   
    foreach($suggestedCreators as $sgCreatorData){
        $sgcreatorUserName = $sgCreatorData['i_username'];
        $sgCreatorUserfullName = $sgCreatorData['i_user_fullname'];
        $sgcreatorUserID = $sgCreatorData['iuid'];
        $sgCreatorUserAvatar = $iN->iN_UserAvatar($sgcreatorUserID, $base_url);
        $sgCreatorUserCover = $iN->iN_UserCover($sgcreatorUserID, $base_url);
        $sgtotalPost = $iN->iN_TotalPosts($sgcreatorUserID);
        $sgtotalImagePost = $iN->iN_TotalImagePosts($sgcreatorUserID);
        $sgtotalVideoPosts = $iN->iN_TotalVideoPosts($sgcreatorUserID);
    ?>
    <div class="i_sug_cont">
       <div class="i_sub_u_cov" style="background-image:url(<?php echo $sgCreatorUserCover;?>);"></div>
       <div class="i_sub_u_det">
           <div class="i_sub_u_det_container">
                <!---->
                <div class="i_sub_u_ava">
                    <div class="i_post_user_avatar">
                        <img src="<?php echo $sgCreatorUserAvatar;?>" alt="<?php echo $sgCreatorUserfullName;?>">
                    </div>
                </div>
                <!---->
                <div class="i_sub_u_d">
                    <div class="i_sub_u_name"><a href="<?php echo $base_url.$sgcreatorUserName;?>" target="blank_" title="<?php echo $sgCreatorUserfullName;?>"><?php echo $sgCreatorUserfullName;?></a></div>
                    <div class="i_sub_u_men"><a href="<?php echo $base_url.$sgcreatorUserName;?>" target="blank_" title="<?php echo $sgCreatorUserfullName;?>">@<?php echo $sgcreatorUserName;?></a></div>
                    <!---->
                    <div class="i_p_items_box_">
                        <div class="i_btn_item_box transition">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('67')); ?> <?php echo filter_var($sgtotalPost, FILTER_SANITIZE_STRING); ?>
                        </div>
                        <div class="i_btn_item_box transition">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('68')); ?> <?php echo filter_var($sgtotalImagePost, FILTER_SANITIZE_STRING); ?>
                        </div>
                        <div class="i_btn_item_box transition">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52')); ?> <?php echo filter_var($sgtotalVideoPosts, FILTER_SANITIZE_STRING); ?>
                        </div>
                    </div>
                    <!---->
                </div>
           </div>
       </div>
    </div>
    <?php } ?>
    </div>
<?php  }
?>
