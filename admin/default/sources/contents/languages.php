<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box flex_ tabing_non_justify">
          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('1'));?><?php echo filter_var($LANG['languages'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:25px;">  
           <div class="new_svg_icon_wrapper">
               <div style="display: inline-block;"><div class="flex_ tabing_non_justify newSvgCode newCreate border_one" data-type="newLangauge"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('1'));?><?php echo filter_var($LANG['create_a_new_lang'], FILTER_SANITIZE_STRING);?></div></div>
           </div>
           <div class="i_general_row_box_item flex_ column tabing__justify">
              <div class="i_langs_wrapper tabing">
                <?php 
                  $langs = $iN->iN_LanguagesList();
                  if($langs){
                     foreach($langs as $langData){
                          $langID = $langData['lang_id'];
                          $langName = $langData['lang_name'];
                          $langStatus = $langData['lang_status'];
                ?>
                    <!---->
                    <div class="i_lang_item_box_cont column tabing__justify" style="display:inline-block;">
                      <div class="i_lang_in column tabing__justify border_one">
                        <div class="lang_short_name border_two tabing flex_"> 
                           <?php echo filter_var($langName, FILTER_SANITIZE_STRING);?>
                        </div>
                        <div class="i_lang_name flex_ tabing_non_justify"> 
                            <label class="el-switch el-switch-yellow" for="upLang<?php echo filter_var($langID, FILTER_SANITIZE_STRING);?>">
                                    <input type="checkbox" class="uplan" id="upLang<?php echo filter_var($langID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($langID, FILTER_SANITIZE_STRING);?>" data-type="upLang" <?php echo filter_var($langStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                                    <span class="el-switch-style"></span> 
                                </label>
                                <?php echo filter_var($LANGNAME[$langName], FILTER_SANITIZE_STRING);?>
                            </div>
                        <div class="i_lang_det">
                            <?php echo filter_var($LANG['abbreviation'], FILTER_SANITIZE_STRING).$langName;?> 
                        </div> 
                        <div class="ed_del_lang flex_ tabing">
                           <div class="tabing flex_ edit_lang i_la" id="<?php echo filter_var($langID, FILTER_SANITIZE_STRING);?>"><div class="in_la border_two flex_ tabing c2"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27'));?></div></div>
                           <div class="tabing flex_ del_lang i_la" id="<?php echo filter_var($langID, FILTER_SANITIZE_STRING);?>"><div class="in_la border_two flex_ tabing c3"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?></div></div>
                           <div class="success_tick tabing flex_ sec_one upLang<?php echo filter_var($langID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                        </div>
                       </div>
                    </div>
                    <!---->
                <?php }
                  }
                ?>
                 
              </div>
           </div>
       </div>
       <!---->       
    </div>
</div> 