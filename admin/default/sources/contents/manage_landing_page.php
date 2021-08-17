<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box flex_ tabing_non_justify">
          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('137'));?><?php echo filter_var($LANG['manage_landing_page'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf">  
            <!---->
               <div class="buyCreditWrapper flex_ tabing" style="margin-top:0px;">
                  <!---->
                  <div class="credit_plan_box">
                     <div class="plan_box tabing flex_ column plbox1">
                        <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url;?>img/landingImages/default.png)">
                           <img class="a-item-img" src="<?php echo $base_url;?>img/landingImages/default.png">
                        </div>
                        <div class="tabing flex_ edit_active_delete" style="padding-top:15px;">
                            <div class="ecd_item">
                            <div class="el-radio el-radio-yellow"> 
                                <input type="radio" name="mTheme" id="1" value="1" <?php echo filter_var($landingPageType, FILTER_SANITIZE_STRING) == '1' ? 'checked="checked"' : '';?>>
                                <label class="el-radio-style mTheme" for="1"></label>
                            </div>
                            </div>
                        </div>
                     </div> 
                  </div>
                  <!---->
                  <!---->
                  <div class="credit_plan_box">
                     <div class="plan_box tabing flex_ column plbox2">
                        <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url;?>img/landingImages/landing.png)">
                           <img class="a-item-img" src="<?php echo $base_url;?>img/landingImages/landing.png">
                        </div>
                        <div class="tabing flex_ edit_active_delete" style="padding-top:15px;">
                            <div class="ecd_item">
                            <div class="el-radio el-radio-yellow"> 
                                <input type="radio" name="mTheme" id="2" value="2" <?php echo filter_var($landingPageType, FILTER_SANITIZE_STRING) == '2' ? 'checked="checked"' : '';?>>
                                <label class="el-radio-style mTheme" for="2"></label>
                            </div>
                            </div>
                        </div>
                     </div> 
                  </div>
                  <!---->
               </div>
            <!----> 
        </div>
        <!---->
        <!---->
        <div class="i_general_title_box flex_ tabing_non_justify">
          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('124'));?><?php echo filter_var($LANG['update_landing_page_images'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf">  
           <!---->
           <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_one">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['image_one'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                <div class="landing_img_preview">
                  <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url.$landingPageFirstImage;?>)">
                     <img class="a-item-img" src="<?php echo $base_url.$landingPageFirstImage;?>">
                  </div>
                </div>
                <div class="certification_file_box">
                <form id="lUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                    <label for="id_landing_first">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['update_image_one'], FILTER_SANITIZE_STRING);?>
                        <input type="file" id="id_landing_first" name="uploading[]" data-id="imageOne" data-type="sec_one" style="display:none; opacity:0;">
                    </label> 
                </form>
                <div class="success_tick tabing flex_ sec_one"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_two">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['image_two'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
               <div class="landing_img_preview" style="height:100px;">
                  <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url.$landingpageFirstImageArrow;?>)">
                     <img class="a-item-img" src="<?php echo $base_url.$landingpageFirstImageArrow;?>">
                  </div>
               </div>
               <div class="certification_file_box">
               <form id="lsUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                  <label for="id_landing_second">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['update_image_two'], FILTER_SANITIZE_STRING);?>
                        <input type="file" id="id_landing_second" name="uploading[]" data-id="imageTwo" data-type="sec_two" style="display:none; opacity:0;">
                  </label> 
               </form>
               <div class="success_tick tabing flex_ sec_two"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
               <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_three">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['image_three'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
               <div class="landing_img_preview" style="height:100px;">
                  <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url.$landingpageFirstDesctiptionImage;?>)">
                     <img class="a-item-img" src="<?php echo $base_url.$landingpageFirstDesctiptionImage;?>">
                  </div>
               </div>
               <div class="certification_file_box">
               <form id="ltUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                  <label for="id_landing_thirth">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['update_image_three'], FILTER_SANITIZE_STRING);?>
                        <input type="file" id="id_landing_thirth" name="uploading[]" data-id="imageThree" data-type="sec_three" style="display:none; opacity:0;">
                  </label> 
               </form>
               <div class="success_tick tabing flex_ sec_three"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
               <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_four">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['image_four'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
               <div class="landing_img_preview" style="height:100px;">
                  <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url.$landingpageSecondDesctiptionImage;?>)">
                     <img class="a-item-img" src="<?php echo $base_url.$landingpageSecondDesctiptionImage;?>">
                  </div>
               </div>
               <div class="certification_file_box">
               <form id="lfUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                  <label for="id_landing_four">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['update_image_four'], FILTER_SANITIZE_STRING);?>
                        <input type="file" id="id_landing_four" name="uploading[]" data-id="imageFour" data-type="sec_four" style="display:none; opacity:0;">
                  </label> 
               </form>
               <div class="success_tick tabing flex_ sec_four"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
               <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_five">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['image_five'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
               <div class="landing_img_preview" style="height:100px;">
                  <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url.$landingpageThirdDesctiptionImage;?>)">
                     <img class="a-item-img" src="<?php echo $base_url.$landingpageThirdDesctiptionImage;?>">
                  </div>
               </div>
               <div class="certification_file_box">
               <form id="lfiUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                  <label for="id_landing_five">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['update_image_five'], FILTER_SANITIZE_STRING);?>
                        <input type="file" id="id_landing_five" name="uploading[]" data-id="imageFive" data-type="sec_five" style="display:none; opacity:0;">
                  </label> 
               </form>
               <div class="success_tick tabing flex_ sec_five"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
               <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_six">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['image_six'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
               <div class="landing_img_preview" style="height:100px;">
                  <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url.$landingpageFourthDesctiptionImage;?>)">
                     <img class="a-item-img" src="<?php echo $base_url.$landingpageFourthDesctiptionImage;?>">
                  </div>
               </div>
               <div class="certification_file_box">
               <form id="lsiUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                  <label for="id_landing_six">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['update_image_six'], FILTER_SANITIZE_STRING);?>
                        <input type="file" id="id_landing_six" name="uploading[]" data-id="imageSix" data-type="sec_six" style="display:none; opacity:0;">
                  </label> 
               </form>
               <div class="success_tick tabing flex_ sec_six"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
               <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_seventh">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['image_seventh'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
               <div class="landing_img_preview" style="height:100px;">
                  <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url.$landingpageFifthDesctiptionImage;?>)">
                     <img class="a-item-img" src="<?php echo $base_url.$landingpageFifthDesctiptionImage;?>">
                  </div>
               </div>
               <div class="certification_file_box">
               <form id="lsevUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                  <label for="id_landing_seventh">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['update_image_seventh'], FILTER_SANITIZE_STRING);?>
                        <input type="file" id="id_landing_seventh" name="uploading[]" data-id="imageSeventh" data-type="sec_seventh" style="display:none; opacity:0;">
                  </label> 
               </form>
               <div class="success_tick tabing flex_ sec_seventh"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
               <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_bg">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['image_bg'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
               <div class="landing_img_preview" style="height:100px;">
                  <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url.$landingPageSectionTwoBG;?>)">
                     <img class="a-item-img" src="<?php echo $base_url.$landingPageSectionTwoBG;?>">
                  </div>
               </div>
               <div class="certification_file_box">
               <form id="bgUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                  <label for="id_landing_bg">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['update_image_bg'], FILTER_SANITIZE_STRING);?>
                        <input type="file" id="id_landing_bg" name="uploading[]" data-id="imageBg" data-type="sec_bg" style="display:none; opacity:0;">
                  </label> 
               </form>
               <div class="success_tick tabing flex_ sec_bg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
               <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_frnt">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['image_frnt'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
               <div class="landing_img_preview" style="height:100px;">
                  <div class="a_image_area flex_ tabing border_one theaImage" style="background-image:url(<?php echo $base_url.$landingSectionFeatureImage;?>)">
                     <img class="a-item-img" src="<?php echo $base_url.$landingSectionFeatureImage;?>">
                  </div>
               </div>
               <div class="certification_file_box">
               <form id="frntUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                  <label for="id_landing_frnt">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['update_image_frnt'], FILTER_SANITIZE_STRING);?>
                        <input type="file" id="id_landing_frnt" name="uploading[]" data-id="imageFrnt" data-type="sec_frnt" style="display:none; opacity:0;">
                  </label> 
               </form>
               <div class="success_tick tabing flex_ sec_frnt"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
               <div class="rec_not"><?php echo filter_var($LANG['recommended_logo_sizes'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
        </div>
        <!---->
    </div>
</div>