<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box flex_ tabing_non_justify">
          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('120'));?><?php echo filter_var($LANG['manageicons'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
           <div class="new_svg_icon_wrapper">
               <div style="display: inline-block;"><div class="flex_ tabing_non_justify newSvgCode newCreate border_one" data-type="newSVGCode"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo filter_var($LANG['create_a_new_svg_icon'], FILTER_SANITIZE_STRING);?></div></div>
           </div>
           <div class="i_svg_codes_list tabing">
            <?php 
            if($allSVGIcons){
                foreach($allSVGIcons as $svgData){
                    $svgCodeID = $svgData['icon_id'];
                    $svgCodeC = $svgData['icon_code'];
                    $svgCodeStatus = $svgData['icon_status'];
            ?> 
              <!---->
              <div class="svg_icon_wrapper" id="svg_id_<?php echo filter_var($svgCodeID, FILTER_SANITIZE_STRING);?>">
                <div class="svg_item flex_ column tabing_non_justify border_one">
                    <!---->
                     <div class="icon_id tabing_ flex">
                         <div class="icon_idm tabing flex_ border_one"><?php echo filter_var($svgCodeID, FILTER_SANITIZE_STRING);?></div>
                     </div>
                    <!---->
                    <div class="svg_code flex_ tabing editSvgIcon" id="<?php echo filter_var($svgCodeID, FILTER_SANITIZE_STRING);?>">
                        <div class="edit_ic_wrapper border_one"><div class="edit_ic tabing flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27'));?></div></div>
                        <?php echo html_entity_decode($svgCodeC);?>
                    </div>
                    <div class="active_inactive_btn">
                        <label class="el-switch el-switch-yellow" for="svg<?php echo filter_var($svgCodeID, FILTER_SANITIZE_STRING);?>">
                            <input type="checkbox" class="iaStat" id="svg<?php echo filter_var($svgCodeID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($svgCodeID, FILTER_SANITIZE_STRING);?>" <?php echo filter_var($svgCodeStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                            <span class="el-switch-style"></span>  
                        </label> 
                    </div>
                    <div class="success_tick tabing flex_ sec_one iaStat<?php echo filter_var($svgCodeID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
              </div>
              <!---->
            <?php } } ?>
           </div>
        </div>
        <!---->
    </div>
</div>