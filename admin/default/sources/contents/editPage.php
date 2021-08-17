<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['edit_package'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <form enctype="multipart/form-data" method="post" id="editPage"> 
        <!--*********************************-->
         <?php 
         $pageData = $iN->iN_GetPageDetails($pageID); 
         $pageID = $pageData['page_id'];
         $pageTitle = $pageData['page_title'];
         $pageSEOUrl = $pageData['page_name'];
         $pageInside = $pageData['page_inside'];
         $seePage = $base_url.$pageSEOUrl;
         $editPage = $base_url.'admin/pages?pid='.$pageID;
         ?> 
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['page_title'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="page_title" class="i_input flex_" value="<?php echo filter_var($pageTitle, FILTER_SANITIZE_STRING);?>">
            </div>
        </div>
        <div class="warning_wrapper warning_one"><?php echo filter_var($LANG['page_title_please'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['seo_url'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="page_seo_url" class="i_input flex_" value="<?php echo filter_var($pageSEOUrl, FILTER_SANITIZE_STRING);?>">
            </div>
        </div> 
        <div class="warning_wrapper warning_two"><?php echo filter_var($LANG['seo_url_please'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['page_content'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
            <textarea name="editor" id="editor">
                <?php echo html_entity_decode($pageInside);?>
            </textarea> 
            </div>
        </div>
        <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
        <div class="admin_approve_post_footer">
            <div class="i_become_creator_box_footer">
                <input type="hidden" name="f" value="editPage">
                <input type="hidden" name="pageID" value="<?php echo filter_var($pageID, FILTER_SANITIZE_STRING);?>"> 
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/ckeditor/ckeditor.js"></script> 
        <script>
            CKEDITOR.replace( 'editor' , {
                toolbar: [{
                        name: 'document',
                        items: ['Undo', 'Redo']
                    },
                    {
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Strike', 'Underline', '-', 'RemoveFormat']
                    },
                    {
                        name: 'links',
                        items: ['Link', 'Unlink', 'Anchor']
                    },
                    {
                        name: 'paragraph',
                        items: ['BulletedList', 'NumberedList']
                    },
                    {
                        name: 'insert',
                        items: ['Image', 'Youtube', 'Embed']
                    },
                    {
                        name: 'tools',
                        items: ['Maximize', 'ShowBlocks']
                    }, 
                    {
                        name: 'other',
                        items: ['simplebutton']
                    }
                    ],   
                    removeButtons: 'Subscript,Superscript,Anchor,Styles,Specialchar', 
            }); 
            //CKEDITOR.config.allowedContent = true;
        </script>
        <!--*********************************-->
 
        </form>
    </div> 
    
</div> 