<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['custom_css_js'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:25px;">  
            <form enctype="multipart/form-data" method="post" id="customCodes">
            <div class="net_earn_title flex_ tabing_non_justify" style="margin-bottom:15px;padding-left:5px;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('118'), FILTER_SANITIZE_STRING);?><?php echo filter_var($LANG['header_custom_css_styles'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <textarea name="customCss" id="custom-css"><?php echo filter_var($customHeaderCSSCode, FILTER_SANITIZE_STRING);?></textarea>
            </div>
            <!---->
            <div class="net_earn_title flex_ tabing_non_justify" style="margin-bottom:15px;padding-left:5px;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('119'), FILTER_SANITIZE_STRING);?><?php echo filter_var($LANG['header_custom_javascript'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <textarea name="customHeaderJs" id="custom-js"><?php echo filter_var($customHeaderJsCode, FILTER_SANITIZE_STRING);?></textarea>
            </div>
            <!---->
            <div class="net_earn_title flex_ tabing_non_justify" style="margin-bottom:15px;padding-left:5px;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('119'), FILTER_SANITIZE_STRING);?><?php echo filter_var($LANG['footer_custom_javascript'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <textarea name="customFooterJs" id="customfooter-js"><?php echo filter_var($customFooterJsCode, FILTER_SANITIZE_STRING);?></textarea>
            </div>
            <!----> 
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['saved_successfully'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="customCodes">
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            </form>
       </div>
       <!---->       
    </div>
</div>
<script>
    var readOnlyCodeMirror = CodeMirror.fromTextArea(document.getElementById('custom-css'), {
         mode: "css",
         theme: "default",
         lineNumbers: true,
         readOnly: false
      });

      var readOnlyCodeMirror = CodeMirror.fromTextArea(document.getElementById('custom-js'), {
         mode: "javascript",
         theme: "default",
         lineNumbers: true,
         readOnly: false
      });

      var readOnlyCodeMirror = CodeMirror.fromTextArea(document.getElementById('customfooter-js'), {
         mode: "javascript",
         theme: "default",
         lineNumbers: true,
         readOnly: false
      });
</script>  