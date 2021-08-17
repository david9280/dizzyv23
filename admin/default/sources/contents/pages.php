<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['pages'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;"> 
           <div class="new_svg_icon_wrapper" style="margin-bottom:15px;">
               <div style="display: inline-block;" class="newpa"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).'admin/pages?new=1';?>"><div class="flex_ tabing_non_justify newSvgCode border_one"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('124'));?><?php echo filter_var($LANG['create_a_new_page'], FILTER_SANITIZE_STRING);?></div></a></div>
           </div>
           <?php  $pages = $iN->iN_GetPages(); if($pages){ ?>
            <div style="overflow-x:auto;">
            <table class="border_one">
                <tr>
                    <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th> 
                    <th><?php echo filter_var($LANG['page_title'], FILTER_SANITIZE_STRING);?></th>   
                    <th><?php echo filter_var($LANG['seo_url'], FILTER_SANITIZE_STRING);?></th>   
                    <th><?php echo filter_var($LANG['actions'], FILTER_SANITIZE_STRING);?></th>   
                </tr>
            <?php 
               foreach($pages as $pageData){
                   $pageID = $pageData['page_id'];
                   $pageTitle = $pageData['page_title'];
                   $pageSEOUrl = $pageData['page_name'];
                   $seePage = $base_url.$pageSEOUrl;
                   $editPage = $base_url.'admin/pages?pid='.$pageID;
            ?>
                <tr class="transition trhover">
                   <td><?php echo filter_var($pageID, FILTER_SANITIZE_STRING);?></td>
                   <td><?php echo filter_var($pageTitle, FILTER_SANITIZE_STRING);?></td>
                   <td><?php echo filter_var($pageSEOUrl, FILTER_SANITIZE_STRING);?></td>
                   <td class="flex_ tabing_non_justify">
                        <div class="flex_ tabing_non_justify"> 
                            <?php if($pageSEOUrl != 'contact'){?>
                              <div class="delu delpage border_one transition tabing flex_" id="<?php echo filter_var($pageID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')).$LANG['delete'];?></div>
                              <div class="seePost c2 border_one transition tabing flex_" id="<?php echo filter_var($pageID, FILTER_SANITIZE_STRING);?>"><a class="tabing flex_" href="<?php echo filter_var($editPage, FILTER_VALIDATE_URL);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27')).$LANG['edit_page'];?></a></div>
                            <?php }?>
                            <div class="seePost c3 border_one transition tabing flex_" id="<?php echo filter_var($pageID, FILTER_SANITIZE_STRING);?>"><a class="tabing flex_"  href="<?php echo filter_var($seePage, FILTER_VALIDATE_URL)?>" target="blank_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('83')).$LANG['view_page'];?></a></div>
                        </div>
                    </td> 
                </tr>
            <?php }?>
            </table>
            </div>
            <?php } ?>
        </div>
        <!---->
    </div>
</div>