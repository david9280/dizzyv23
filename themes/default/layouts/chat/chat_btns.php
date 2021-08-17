<div class="ch_fl_btns_container flex_ tabing">
   <!---->
   <div class="ch_btn_item">
        <form id="uploadform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).'requests/request.php';?>">
            <label for="ci_image">
                <div class="ch_svg flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('53'));?></div>
                <input type="file" id="ci_image" class="cimage" name="ciuploading[]" data-id="message_image_upload" multiple="true"> 
            </label>
        </form>
   </div> 
   <!---->
</div> 