<div class="creators_container">
  <div class="creator_pate_title"><?php echo filter_var($LANG['best_creators_of_last_week'], FILTER_SANITIZE_STRING);?></div>

<div class="creators_list_container">
<?php 
$featuredCreators = $iN->iN_PopularUsersFromLastWeekInExplorePage();
if($featuredCreators){
  foreach($featuredCreators as $td){
    $popularuserID = $td['post_owner_id'];
    $uD = $iN->iN_GetUserDetails($popularuserID);
    $popularUserAvatar = $iN->iN_UserAvatar($popularuserID, $base_url);
    $creatorCover = $iN->iN_UserCover($popularuserID, $base_url);
    $popularUserName = $td['i_username'];
    $popularUserFullName = $td['i_user_fullname']; 
    $uPCategory = isset($uD['profile_category']) ? $uD['profile_category'] : NULL;
    $totalPost = $iN->iN_TotalPosts($popularuserID);
    $totalImagePost = $iN->iN_TotalImagePosts($popularuserID);
    $totalVideoPosts = $iN->iN_TotalVideoPosts($popularuserID);
    if($uPCategory){ $uCateg = '<div class="i_p_cards"> <div class="i_creator_category"><a href="'.filter_var($base_url, FILTER_VALIDATE_URL).'creators?creator='.$uPCategory.'">'.html_entity_decode($iN->iN_SelectedMenuIcon('65')).$PROFILE_CATEGORIES[$uPCategory].'</a></div></div>';}else{$uCateg = '';}

?>
    <!---->
    <div class="creator_list_box_wrp">
        <div class="creator_l_box flex_">
            <div class="creator_l_cover" style="background-image:url(<?php echo filter_var($creatorCover, FILTER_SANITIZE_STRING);?>);"></div>
            <!---->
            <div class="creator_l_avatar_name">
                <div class="creator_avatar_container">
                    <div class="creator_avatar"><img src="<?php echo filter_var($popularUserAvatar, FILTER_SANITIZE_STRING);?>"></div>
                </div>
                <div class="creator_nm truncated"><?php echo filter_var($iN->iN_Secure($popularUserFullName), FILTER_SANITIZE_STRING);?></div>
                <?php echo $uCateg;?>
                <!---->
                <div class="i_p_items_box_">
                    <div class="i_btn_item_box transition">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('67'));?> <?php echo filter_var($totalPost, FILTER_SANITIZE_STRING);?>
                    </div>
                    <div class="i_btn_item_box transition">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('68'));?> <?php echo filter_var($totalImagePost, FILTER_SANITIZE_STRING);?>
                    </div>
                    <div class="i_btn_item_box transition">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52'));?> <?php echo filter_var($totalVideoPosts, FILTER_SANITIZE_STRING);?>
                    </div>
                </div>
                <!---->
                <!---->
                <div class="creator_last_two_post flex_ tabing">
                    <?php 
                       $getLatestFivePost = $iN->iN_ExploreUserLatestFivePost($popularuserID);
                       if($getLatestFivePost){ 
                           foreach($getLatestFivePost as $suggestedData){ 
                            $userPostID = $suggestedData['post_id'];
                            $userPostFile = $suggestedData['post_file'];
                            $slugUrl = $base_url.'post/'.$suggestedData['url_slug'].'_'.$userPostID;
                            $userPostWhoCanSee = $suggestedData['who_can_see'];
                            $trimValue = rtrim($userPostFile,',');
                            $explodeFiles = explode(',', $trimValue);
                            $explodeFiles = array_unique($explodeFiles);
                            $countExplodedFiles = count($explodeFiles); 
                            $nums = preg_split('/\s*,\s*/', $trimValue);
                            $lastFileID = end($nums);
                            $getFriendStatusBetweenTwoUser = '';
                            if($logedIn == '1'){ 
                                $getFriendStatusBetweenTwoUser = $iN->iN_GetRelationsipBetweenTwoUsers($userID, $popularuserID);
                            }
                            /********************/
                            $fileData = $iN->iN_GetUploadedFileDetails($lastFileID);
                            if($fileData){   
                                $fileUploadID = $fileData['upload_id'];
                                $fileExtension = $fileData['uploaded_file_ext'];
                                $filePath = $fileData['uploaded_file_path'];
                                if($userPostWhoCanSee != '1' && $logedIn == '1'){
                                    if($getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'subscriber'){ 
                                        $filePath = $fileData['uploaded_x_file_path'];
                                    } 
                                }else{
                                    $filePath = $fileData['uploaded_x_file_path'];
                                }
                                $filePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filePath);
                                if($s3Status == 1){
                                    $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath; 
                                }else{
                                    $filePathUrl = $base_url . $filePath; 
                                } 
                                $videoPlaybutton ='';  
                                if($fileExtension == 'mp4'){
                                    $videoPlaybutton = '<div class="playbutton">'.$iN->iN_SelectedMenuIcon('55').'</div>';
                                    $PathExtension = '.png';
                                    if($s3Status == 1){ 
                                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathWithoutExt.$PathExtension;
                                    }else{ 
                                        $filePathUrl = $base_url . $filePathWithoutExt.$PathExtension;
                                    } 
                                } 
                                $onlySubs = '';
                                if($userPostWhoCanSee == '1'){
                                    $onlySubs = ''; 
                                }else if($userPostWhoCanSee == '2'){ 
                                    $wCanSee = '<div class="i_plus_subs" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('15').'</div>'; 
                                    $onlySubs = '<div class="onlySubsSuggestion"><div class="onlySubsSuggestionWrapper"><div class="onlySubsSuggestion_icon">'.$iN->iN_SelectedMenuIcon('56').'</div></div></div>';
                                }else if($userPostWhoCanSee == '3'){ 
                                    $onlySubs = '<div class="onlySubsSuggestion"><div class="onlySubsSuggestionWrapper"><div class="onlySubsSuggestion_icon">'.$iN->iN_SelectedMenuIcon('56').'</div></div></div>';
                                }else if($userPostWhoCanSee == '4'){ 
                                    $onlySubs = '<div class="onlySubsSuggestion"><div class="onlySubsSuggestionWrapper"><div class="onlySubsSuggestion_icon">'.$iN->iN_SelectedMenuIcon('40').'</div></div></div>';
                                }
                            }
                            /********************/
                    ?> 
                        <div class="creator_last_post_item">
                            <div class="creator_last_post_item-box"  style="background-image: url('<?php echo filter_var($filePathUrl, FILTER_VALIDATE_URL);?>');">
                            <a href="<?php echo filter_var($slugUrl, FILTER_VALIDATE_URL);?>">
                                <?php
                                    if($getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'subscriber'){
                                        echo html_entity_decode($onlySubs);
                                    }
                                ?>
                                <img class="creator_last_post_item-img" src="<?php echo filter_var($filePathUrl, FILTER_VALIDATE_URL);?>">
                            </a>
                            </div>
                        </div> 
                    <?php }} ?>
                </div>
                <!---->
            </div>
            <!---->
        </div>
    </div>
    <!---->
    
<?php  } } ?> 
</div>
</div>