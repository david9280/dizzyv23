<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify" style="max-width:700px;margin:0px auto;">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['approve_or_reject_verification_request'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <form enctype="multipart/form-data" method="post" id="updateVerificationStatus">
<?php  
$vData = $iN->iN_GetVerificationRequestFromID($verificationID);
if($vData){  
    $vID = $vData['request_id'];  
    $vIDCard = $vData['id_card'];
    $vIDPhotoOfCard = $vData['photo_of_card'];
    $verificationRequestedUserID = $vData['iuid_fk'];
    $uData = $iN->iN_GetUserDetails($verificationRequestedUserID);
    $userUserName = $uData['i_username'];
    $userUserFullName = $uData['i_user_fullname'];
    $userAvatar = $iN->iN_UserAvatar($verificationRequestedUserID, $base_url); 
    $userRegisteredTime = $vData['request_time'];
    $crTime = date('Y-m-d H:i:s',$userRegisteredTime);
    $seeProfile = $base_url.$userUserName; 
    $userPostOwnerUserGender = $uData['user_gender']; 
    if($userPostOwnerUserGender == 'male'){
      $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('12').'</div>';
    }else if($userPostOwnerUserGender == 'female'){
      $publisherGender = '<div class="i_plus_gf">'.$iN->iN_SelectedMenuIcon('13').'</div>';
    }else if($userPostOwnerUserGender == 'couple'){
      $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('58').'</div>';
    }
?>
        <!--*********************************-->
        <div class="i_post_body body_<?php echo filter_var($vID, FILTER_SANITIZE_STRING);?>" id="<?php echo filter_var($vID, FILTER_SANITIZE_STRING);?>" data-last="<?php echo filter_var($vID, FILTER_SANITIZE_STRING);?>">
                <!--POST HEADER-->
                <div class="i_post_body_header">
                    <div class="i_post_user_avatar">
                        <img src="<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING);?>"/>
                    </div>
                    <div class="i_post_i">
                        <div class="i_post_username"><a class="truncated" href="<?php echo filter_var($seeProfile, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($userUserFullName, FILTER_SANITIZE_STRING);?> <?php echo html_entity_decode($publisherGender);?></a></div>
                        <div class="i_post_shared_time"><?php echo TimeAgo::ago($crTime , date('Y-m-d H:i:s'));?></div>
                    </div>
                </div>
                <!--/POST HEADER-->    
                <!--POST IMAGES-->
                <div class="i_post_u_images"> 
                    <?php        
                    echo '<div class="i_image_two" id="lightgallery'.$verificationRequestedUserID.'">'; 
                            $fileData = $iN->iN_GetUploadedFileDetails($vIDCard); 
                            if($fileData){
                                $fileUploadID = $fileData['upload_id'];
                                $fileExtension = $fileData['uploaded_file_ext'];
                                $filePath = $fileData['uploaded_file_path'];  
                                $filePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filePath);
                                if($s3Status == 1){
                                    $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath; 
                                }else if($digitalOceanStatus == '1'){ 
                                    $filePathUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/'. $filePath; 
                                }else{
                                    $filePathUrl = $base_url . $filePath; 
                                }   
                                $fileisVideo = 'data-src="'.$filePathUrl.'"'; 
                            }
                            $fileDataTwo = $iN->iN_GetUploadedFileDetails($vIDPhotoOfCard);
                            if($fileDataTwo){
                                $fileUploadIDTwo = $fileDataTwo['upload_id'];
                                $fileExtensionTwo = $fileDataTwo['uploaded_file_ext'];
                                $filePathTwo = $fileDataTwo['uploaded_file_path'];  
                                $filePathWithoutExtTwo = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filePathTwo);
                                if($s3Status == 1){
                                    $filePathUrlTwo = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathTwo; 
                                }else if($digitalOceanStatus == '1'){ 
                                    $filePathUrlTwo = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/'. $filePathTwo; 
                                }else{
                                    $filePathUrlTwo = $base_url . $filePathTwo; 
                                }   
                                $fileisVideo = 'data-src="'.$filePathUrlTwo.'"'; 
                            }
                        ?>
                        <div class="i_post_image_swip_wrapper" style="background-image:url('<?php echo filter_var($filePathUrl, FILTER_SANITIZE_STRING);?>');" <?php echo html_entity_decode($fileisVideo);?>> 
                                <img class="i_p_image" src="<?php echo filter_var($filePathUrl, FILTER_SANITIZE_STRING);?>">
                            </div> 
                        <div class="i_post_image_swip_wrapper" style="background-image:url('<?php echo filter_var($filePathUrlTwo, FILTER_SANITIZE_STRING);?>');" <?php echo html_entity_decode($fileisVideo);?>> 
                                <img class="i_p_image" src="<?php echo filter_var($filePathUrlTwo, FILTER_SANITIZE_STRING);?>">
                            </div>  
                        <?php
                        echo '</div>';
                        ?>   
                        <?php if($logedIn){ ?>
                        <script type="text/javascript">
                            $('#lightgallery'+<?php echo filter_var($verificationRequestedUserID, FILTER_SANITIZE_STRING);?>).lightGallery({
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
                <div class="admin_approve_post_footer">
                    <div class="add_app_not"><?php echo filter_var($LANG['add_not_to_the_request_owner'], FILTER_SANITIZE_STRING);?></div>
                    <!--POST CONTAINER-->
                    <div class="i_not_container flex_" id="i_not_container_<?php echo html_entity_decode($verificationRequestedUserID);?>">
                        <!--POST TEXT--> 
                        <textarea class="more_textarea" name="approve_not" id="ad_not_ed_<?php echo filter_var($vID, FILTER_SANITIZE_STRING);?>" placeholder="<?php echo filter_var($LANG['write_your_not'], FILTER_SANITIZE_STRING);?>"></textarea>
                        <!--/POST TEXT-->
                    </div>
                    <!--/POST CONTAINER--> 
                    <!--POST CONTAINER-->
                    <div class="i_not_container flex_ column" id="i_not_container_<?php echo filter_var($verificationRequestedUserID, FILTER_SANITIZE_STRING);?>">
                        <!--****/////****--> 
                        <div class="approve_ch_item flex_ column border_one transition choosed" id="appr_1" data-val="1">
                            <div class="flex_ tabing_non_justify">
                                <div class="approve_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('112'));?></div>
                                <div class="approve_title flex_ tabing__justify"><?php echo filter_var($LANG['approve'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            <div class="rec_not" style="padding-left:10px;"><?php echo filter_var($LANG['be_carefuly_check_verifiction'], FILTER_SANITIZE_STRING);?></div>
                        </div>
                        <div class="approve_ch_item flex_ column border_one transition" id="appr_2" data-val="2">
                            <div class="flex_ tabing_non_justify">
                                <div class="reject_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('113'));?></div>
                                <div class="approve_title flex_ tabing__justify"><?php echo filter_var($LANG['reject'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            <div class="rec_not" style="padding-left:10px;"><?php echo filter_var($LANG['rejected_verification_not'], FILTER_SANITIZE_STRING);?></div>
                        </div> 
                        <!--****/////****-->
                        <input type="hidden" name="vApproveStatus" id="approve_type" value="1">
                    </div>
                    <div class="warning_wrapper warning_one"><?php echo filter_var($LANG['warning_approve_profile_choose'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
                    <!--/POST CONTAINER--> 
                    <div class="i_become_creator_box_footer">
                        <input type="hidden" name="f" value="updateVerificationStatus"> 
                        <input type="hidden" name="vID" value="<?php echo filter_var($vID, FILTER_SANITIZE_STRING);?>">
                        <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
                    </div>
                </div>
            </div>           
        </div>
        <!--*********************************-->
<?php }?> 
        </form>
    </div> 
    
</div>