<?php 
$userSharedPostID = $sharedPostData['post_id'];
$userSharedPostOwnerID = $sharedPostData['post_owner_id'];
$userSharedPostText = $sharedPostData['post_text'];
$userSharedPostFile = $sharedPostData['post_file'];
$userSharedPostCreatedTime = $sharedPostData['post_created_time'];
$UserSharedcrTime = date('Y-m-d H:i:s',$userSharedPostCreatedTime); 
$userSharedPostWhoCanSee = $sharedPostData['who_can_see'];
$userSharedPostWantStatus = $sharedPostData['post_want_status']; 
$userPostWantedCredit = $sharedPostData['post_wanted_credit'];
$userSharedPostStatus = $sharedPostData['post_status']; 
$userSharedPostOwnerUsername = $sharedPostData['i_username'];
$userSharedPostOwnerUserFullName = $sharedPostData['i_user_fullname']; 
$userSharedPostOwnerUserGender = $sharedPostData['user_gender']; 
$userPostHashTags = isset($sharedPostData['hashtags']) ? $sharedPostData['hashtags'] : NULL; 
$userSharedPostCommentAvailableStatus = $sharedPostData['comment_status'];
$userSharedPostOwnerUserLastLogin = $sharedPostData['last_login_time'];  
$userSharedPostSharedID = isset($sharedPostData['shared_post_id']) ? $sharedPostData['shared_post_id'] : NULL;
$userSharedPostOwnerUserAvatar = $iN->iN_UserAvatar($userSharedPostOwnerID, $base_url);
$userSharedPostUserVerifiedStatus = $sharedPostData['user_verified_status'];
$getFriendStatusBetweenTwoUser = '';
if($logedIn == '1'){
    $getFriendStatusBetweenTwoUser = $iN->iN_GetRelationsipBetweenTwoUsers($userID, $userSharedPostOwnerID);
}
if($userSharedPostOwnerUserGender == 'male'){
   $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('12').'</div>';
}else if($userSharedPostOwnerUserGender == 'female'){
   $publisherGender = '<div class="i_plus_gf">'.$iN->iN_SelectedMenuIcon('13').'</div>';
}else if($userSharedPostOwnerUserGender == 'couple'){
   $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('58').'</div>';
}
$userSharedVerifiedStatus = '';
if($userSharedPostUserVerifiedStatus == '1'){
   $userSharedVerifiedStatus = '<div class="i_plus_s">'.$iN->iN_SelectedMenuIcon('11').'</div>';
}
$onlySubs = '';
if($userSharedPostWhoCanSee == '1'){
    $onlySubs = '';
    $subPostTop = '';
    $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostSharedID.'">'.$iN->iN_SelectedMenuIcon('50').'</div>';
 }else if($userSharedPostWhoCanSee == '2'){
    $subPostTop = '';
    $wCanSee = '<div class="i_plus_subs" id="ipublic_'.$userPostSharedID.'">'.$iN->iN_SelectedMenuIcon('15').'</div>'; 
    $onlySubs = '<div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('15').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_followers']).'</div></div></div>';
 }else if($userSharedPostWhoCanSee == '3'){
    $subPostTop = 'extensionPost';
    $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostSharedID.'">'.$iN->iN_SelectedMenuIcon('51').'</div>';
    $onlySubs = '<div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('56').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_subscribers']).'</div></div></div>';
 }else if($userSharedPostWhoCanSee == '4'){
   $subPostTop = 'extensionPost';
   $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostSharedID.'">'.$iN->iN_SelectedMenuIcon('9').'</div>';
   $onlySubs = '<div class="onlyPremium"><div class="onlySubsWrapper"><div class="premium_locked"><div class="premium_locked_icon">'.$iN->iN_SelectedMenuIcon('56').'</div></div><div class="onlySubs_note"><div class="buyThisPost prcsPost" id="'.$userPostSharedID.'">'.preg_replace( '/{.*?}/', $userPostWantedCredit, $LANG['post_credit']).'</div><div class="buythistext prcsPost" id="'.$userPostSharedID.'">'.$LANG['purchase_post'].'</div></div><div class="fr_subs uSubsModal transition" data-u="'.$userSharedPostOwnerID.'">'.$iN->iN_SelectedMenuIcon('51').$LANG['free_for_subscribers'].'</div></div></div>';
 }  
?>
<!--Sharing POST DETAILS-->
<div class="i_shared_post_wrapper">
    <div class="i_sharing_post_wrapper_in">
        <!--POST HEADER-->
    <div class="i_post_body_header">
        <div class="i_post_user_avatar">
            <img src="<?php echo filter_var($userSharedPostOwnerUserAvatar, FILTER_SANITIZE_STRING);?>"/>
        </div>
        <div class="i_post_i">
            <div class="i_post_username"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).$userSharedPostOwnerUsername;?>"><?php echo filter_var($userSharedPostOwnerUserFullName, FILTER_SANITIZE_STRING);?><?php echo html_entity_decode($publisherGender);?><?php echo html_entity_decode($userSharedVerifiedStatus);?><?php echo html_entity_decode($wCanSee);?></a></div>
            <div class="i_post_shared_time"><?php echo TimeAgo::ago($UserSharedcrTime , date('Y-m-d H:i:s'));?></div> 
        </div>
    </div>
    <!--/POST HEADER-->
    <?php 
    if($userSharedPostText){
    ?>    
    <!--POST CONTAINER-->
    <div class="i_post_container">
        <!--POST TEXT-->
        <div class="i_post_text">
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
            if(!empty($userSharedPostText)){ 
                if(isset($userPostHashTags) && !empty($userPostHashTags)){
                    echo $urlHighlight->highlightUrls($iN->sanitize_output($userSharedPostText,$base_url));
                }else{
                    echo $urlHighlight->highlightUrls($userSharedPostText);
                } 
            }
            $regexUrl = '/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i'; 
            $totalUrl = preg_match_all($regexUrl, $userSharedPostText, $matches);
            
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
    </div>
    <!--/POST CONTAINER--> 
    <?php }
    ?> 
    <!--POST IMAGES-->
    <div class="i_post_u_images"> 
        <?php 
        if($getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'subscriber' && $userSharedPostWhoCanSee == '3') { 
            echo html_entity_decode($onlySubs);  
        }else if($userSharedPostWhoCanSee == '4' && $getFriendStatusBetweenTwoUser != 'me'){
            if($checkUserPurchasedThisPost == '0' && $getFriendStatusBetweenTwoUser != 'subscriber'){
                echo html_entity_decode($onlySubs); 
            }
        }else if($userSharedPostWhoCanSee == '2' && $getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'flwr'){
            echo html_entity_decode($onlySubs); 
        }  
        $trimValue = rtrim($userSharedPostFile,',');
        $explodeFiles = explode(',', $trimValue);
        $countExplodedFiles = count($explodeFiles);
            if ($countExplodedFiles == 1) {
                $container = 'i_image_one';
            } else if ($countExplodedFiles == 2) {
                $container = 'i_image_two';
            } else if ($countExplodedFiles == 3) {
                $container = 'i_image_three';
            } else if ($countExplodedFiles == 4) {
                $container = 'i_image_four';
            } else if($countExplodedFiles >= 5) {
                $container = 'i_image_five';
            }   
        foreach($explodeFiles as $explodeVideoFile){
                $VideofileData = $iN->iN_GetUploadedFileDetails($explodeVideoFile);
                if($VideofileData){
                    $VideofileUploadID = $VideofileData['upload_id'];
                    $VideofileExtension = $VideofileData['uploaded_file_ext'];
                    $VideofilePath = $VideofileData['uploaded_file_path']; 
                    if($userSharedPostWhoCanSee != '1'){
                        if($getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'subscriber' && $userPostStatus != '2' && $userSharedPostWhoCanSee == '3'){  
                            $VideofilePath = $VideofileData['uploaded_x_file_path']; 
                        }else if($userSharedPostWhoCanSee == '4' && $getFriendStatusBetweenTwoUser != 'me'){
                            if($checkUserPurchasedThisPost == '0' && $getFriendStatusBetweenTwoUser != 'subscriber'){
                                $VideofilePath = $VideofileData['uploaded_x_file_path']; 
                            }
                        }else if($userSharedPostWhoCanSee == '2' && $getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'flwr'){
                            $VideofilePath = $VideofileData['uploaded_x_file_path'];
                        }
                    } 
                    $VideofilePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $VideofilePath);
                    if($VideofileExtension == 'mp4'){ 
                        $VideoPathExtension = '.png';
                        if($s3Status == 1){
                            $VideofilePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $VideofilePath;
                            $VideofileTumbnailUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $VideofilePathWithoutExt.$VideoPathExtension;
                        }else if($digitalOceanStatus == '1'){ 
                            $VideofilePathUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/' . $VideofilePath;
                            $VideofileTumbnailUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/' . $VideofilePathWithoutExt.$VideoPathExtension;
                        }else{
                            $VideofilePathUrl = $base_url . $VideofilePath;
                            $VideofileTumbnailUrl = $base_url . $VideofilePathWithoutExt.$VideoPathExtension;
                        }
                        echo '
                        <div style="display:none;" id="video'.$VideofileUploadID.'">
                            <video class="lg-video-object lg-html5 video-js vjs-default-skin" controls preload="none" onended="videoEnded()">
                                <source src="'.$VideofilePathUrl.'" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </div> 
                        ';
                    } 
            }
        }
        echo '<div class="'.$container.'" id="lightgallery'.$userPostSharedID.'">';
            foreach($explodeFiles  as $dataFile){
                $fileData = $iN->iN_GetUploadedFileDetails($dataFile);
                if($fileData){
                $fileUploadID = $fileData['upload_id'];
                $fileExtension = $fileData['uploaded_file_ext'];
                $filePath = $fileData['uploaded_file_path']; 
                if($userSharedPostWhoCanSee != '1'){
                    if($getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'subscriber' && $userPostStatus != '2' && $userSharedPostWhoCanSee == '3'){ 
                          $filePath = $fileData['uploaded_x_file_path']; 
                    }else if($userSharedPostWhoCanSee == '4' && $getFriendStatusBetweenTwoUser != 'me'){
                        if($checkUserPurchasedThisPost == '0' && $getFriendStatusBetweenTwoUser != 'subscriber'){
                          $filePath = $fileData['uploaded_x_file_path']; 
                        }
                    } else if($userSharedPostWhoCanSee == '2' && $getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'flwr'){
                        $filePath = $fileData['uploaded_x_file_path'];
                    }
                }  
                $filePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filePath);
                if($s3Status == 1){
                    $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath; 
                }else if($digitalOceanStatus == '1'){ 
                    $filePathUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/'.$filePath;
                }else{
                    $filePathUrl = $base_url . $filePath; 
                }  
                $videoPlaybutton ='';  
                if($fileExtension == 'mp4'){
                    $videoPlaybutton = '<div class="playbutton">'.$iN->iN_SelectedMenuIcon('55').'</div>';
                    $PathExtension = '.png';
                    if($s3Status == 1){ 
                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathWithoutExt.$PathExtension;
                    }else if($digitalOceanStatus == '1'){ 
                        $filePathUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/'.$filePathWithoutExt.$PathExtension;
                    }else{ 
                        $filePathUrl = $base_url . $filePathWithoutExt.$PathExtension;
                    }
                    $fileisVideo = 'data-poster="'.$filePathUrl.'" data-html="#video'.$fileUploadID.'"';
                }else{
                    $fileisVideo = 'data-src="'.$filePathUrl.'"';
                }  
            ?>
                <div class="i_post_image_swip_wrapper" style="background-image:url('<?php echo  $filePathUrl;?>');" <?php echo $fileisVideo;?>>
                    <?php echo html_entity_decode($videoPlaybutton);?>
                    <img class="i_p_image" src="<?php echo $filePathUrl;?>">
                </div>  
            <?php }
            }
            echo '</div>';
            ?>   
            <?php if($logedIn){ ?>
            <script type="text/javascript">
                $('#lightgallery'+<?php echo filter_var($userSharedPostID, FILTER_SANITIZE_STRING);?>).lightGallery({
                    videojs: true,
                    mode: 'lg-fade',
                    cssEasing : 'cubic-bezier(0.25, 0, 0.25, 1)',
                    download: false,
                    share: false
                });
            </script>
            <?php }?>
    </div>
    <!--POST IMAGES-->
    </div>
</div>
<!--/Sharing POST DETAILS-->