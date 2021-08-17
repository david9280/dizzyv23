<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_ac_header">
             <?php echo filter_var($LANG['personalizeyourprofile'], FILTER_SANITIZE_STRING);?>
             <div class="i_moda_header_nt"><?php echo filter_var($LANG['helps_to_gain_visibility'], FILTER_SANITIZE_STRING);?></div>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--Sharing POST DETAILS-->
            <div class="i_block_user_avatar_cover_wrapper">
                <div class="i_blck_in">
                    <div class="coverImageArea" style="background-image:url('<?php echo filter_var($userCover, FILTER_SANITIZE_STRING);?>');">
                        <div class="newCoverUpload">
                           <label for="cover">
                              <input type="file" accept="image/*" style="display:none;" id="cover" name="cover_file"  />
                              <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('84'));?>
                           </label>
                        </div>
                    </div>
                    <div class="avatarImageArea flex_">
                        <div class="avatarImageWrapper">
                            <div class="avatarImage" style="background-image:url('<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING);?>');"></div>
                            <div class="newAvatarUpload">
                                <label for="avatar">
                                  <input type="file" accept="image/*" style="display:none;" id="avatar" name="avatar_file"  />
                                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('84'));?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Sharing POST DETAILS--> 
            <!--FOOTER-->
            <div class="i_block_box_footer_container">
                <div class="alertBtnRightWithIcon svAC transition"><?php echo filter_var($LANG['finished'], FILTER_SANITIZE_STRING);?></div>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/FOOTER-->
       </div>   
   </div>
<!--/SHARE--> 
<!--Cover Crop FINISHED-->

<script type="text/javascript">
$(document).ready(function() {
var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
  // Close Crop
  $("body").on("click", ".cnclcrp", function() {
      $(".i_modal_cover_resize_bg_in").removeClass("i_modal_display_in");
  });
    $('#cover_image , #avatar_image').croppie('destroy');
    $image_crop = $("#cover_image").croppie({
        enableExif: true,
        enableResize: false,
        viewport: {
            width: 360,
            height: 270,
            type: "square" //circle
        },
        boundary: {
            width: 360,
            height: 270
        }
    });
    $("body").on("change", "#cover", function() {
        var reader = new FileReader();
        var file = this.files[0];
        var fileType = file["type"];
        var validImageTypes = ["image/gif", "image/jpeg", "image/png", "image/svg+xml", "image/jpg"];
        if ($.inArray(fileType, validImageTypes) < 0) {
            // invalid file type code goes here.
            alert('Not valit Image format');
        } else {
            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop
                    .croppie("bind", {
                        url: event.target.result
                    })
                    .then(function() {
                        if (fileType == "image/gif") {
                            $(".cropTypeisGif").show();
                        }
                    });
            };
            reader.readAsDataURL(this.files[0]);
            $(".i_modal_cover_resize_bg_in").addClass("i_modal_display_in");
        }
    });
    $("body").on("click", ".finishCrop", function(event) {
        $image_crop
            .croppie("result", {
                type: "canvas",
                size: 'original',
                circle: 'false',
            })
            .then(function(response) { 
                $(".i_modal_content").append(plreLoadingAnimationPlus);
                $.ajax({
                    type: "POST",
                    url: siteurl + "requests/request.php",
                    data: {image : response, f : "coverUpload"},
                    success: function(html) {
                        
                        if(html == '404'){
                           alert('There seems to be slowness, please try again later.');
                        }else{  
                            $(".coverImageArea").css('background-image', 'url(' + html + ')'); 
                            $(".i_modal_cover_resize_bg_in").addClass("i_modal_in_in_out");
                            setTimeout(() => { 
                                $('#cover_image').croppie('bind');
                                $(".i_modal_cover_resize_bg_in").removeClass("i_modal_display_in");
                            }, 200);
                        }
                        $(".loaderWrapper").remove();
                    }
                });
            });
    });
    $avatar_image_crop = $("#avatar_image").croppie({
        enableExif: true, 
   enableResize: false,
        viewport: {
            width: 200,
            height: 200,
            type: "square" //circle
        },
        boundary: {
            width: 200,
            height: 200
        }
    });
    $("body").on("change", "#avatar", function() {
        var reader = new FileReader();
        var file = this.files[0];
        var fileType = file["type"];
        var validImageTypes = ["image/gif", "image/jpeg", "image/png", "image/svg+xml", "image/jpg"];
        if ($.inArray(fileType, validImageTypes) < 0) {
            // invalid file type code goes here.
            alert('Not valit Image format');
        } else {
            var reader = new FileReader();
            reader.onload = function(event) {
                $avatar_image_crop
                    .croppie("bind", {
                        url: event.target.result
                    })
                    .then(function() {
                        if (fileType == "image/gif") {
                            $(".cropTypeisGif").show();
                        }
                    });
            };
            reader.readAsDataURL(this.files[0]);
            $(".i_modal_avatar_resize_bg_in").addClass("i_modal_display_in");
        }
    });
     
    $("body").on("click", ".finishACrop", function(event) {
        $avatar_image_crop
            .croppie("result", {
                type: "canvas",
                size: 'original',
                circle: 'false',
            })
            .then(function(response) { 
                $(".i_modal_content").append(plreLoadingAnimationPlus);
                $.ajax({
                    type: "POST",
                    url: siteurl + "requests/request.php",
                    data: {image : response, f : "avatarUpload"},
                    success: function(html) {
                        $(".loaderWrapper").remove();
                        if(html == '404'){
                           alert('There seems to be slowness, please try again later.');
                        }else{  
                            $(".avatarImage").css('background-image', 'url(' + html + ')'); 
                            $(".i_modal_avatar_resize_bg_in").addClass("i_modal_in_in_out");
                            setTimeout(() => { 
                                $('#avatar_image').croppie('bind'); 
                                $(".i_modal_avatar_resize_bg_in").removeClass("i_modal_display_in");
                            }, 200);
                        }
                    }
                });
            });
    });
    $("body").on("click", ".coverCropClose", function() {
        $(".i_modal_cover_resize_bg_in , .i_modal_avatar_resize_bg_in").addClass("i_modal_in_in_out");
        setTimeout(() => { 
            //$('#cover_image , #avatar_image').croppie('destroy');
            $(".i_modal_cover_resize_bg_in , .i_modal_avatar_resize_bg_in").removeClass("i_modal_display_in");
        }, 200);
    });   
});
</script>
</div>
<div class="i_modal_cover_resize_bg_in">
    <div class="i_modal_in_in"> 
       <div class="i_modal_content"> 
           <!--Modal Header-->
           <div class="i_modal_ac_header">
             <?php echo filter_var($LANG['cover_image_modification'], FILTER_SANITIZE_STRING);?> 
             <div class="coverCropClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--CROP CONTAINER-->
            <div class="i_block_user_avatar_cover_wrapper">
                <div class="i_blck_in">
                    <div class="cropier_container">
                    <div class="crop_middle"><span id="cover_image"></span></div>
                    </div>
                </div>
            </div>
            <!--/CROP CONTAINER-->
            <!--FOOTER-->
            <div class="i_block_box_footer_container">
                <div class="alertBtnRightWithIcon finishCrop transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></div>
                <div class="alertBtnLeft cnclcrp transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/FOOTER-->
       </div>
    </div> 
</div>
<div class="i_modal_avatar_resize_bg_in">
    <div class="i_modal_in_in"> 
       <div class="i_modal_content"> 
           <!--Modal Header-->
           <div class="i_modal_ac_header">
             <?php echo filter_var($LANG['profile_image_modification'], FILTER_SANITIZE_STRING);?> 
             <div class="coverCropClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--CROP CONTAINER-->
            <div class="i_block_user_avatar_cover_wrapper">
                <div class="i_blck_in">
                    <div class="cropier_container">
                    <div class="crop_middle"><span id="avatar_image"></span></div>
                    </div>
                </div>
            </div>
            <!--/CROP CONTAINER-->
            <!--FOOTER-->
            <div class="i_block_box_footer_container">
                <div class="alertBtnRightWithIcon finishACrop transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></div>
                <div class="alertBtnLeft cnclcrp transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/FOOTER-->
       </div>
    </div> 
</div>