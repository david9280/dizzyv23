<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box flex_ tabing_non_justify">
          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('137'));?><?php echo filter_var($LANG['landing_question_answer'], FILTER_SANITIZE_STRING);?>
        </div>
        <!---->  
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf">  
           <div class="new_svg_icon_wrapper" style="margin-bottom:20px;">
               <div style="display: inline-block;"><div class="flex_ tabing_non_justify newSvgCode newCreate border_one" data-type="newQA"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo filter_var($LANG['create_a_new_question_answer'], FILTER_SANITIZE_STRING);?></div></div>
           </div> 
           <?php  $pages = $iN->iN_ListQuestionAnswerFromLanding(); if($pages){ ?>
            <div style="overflow-x:auto;">
            <table class="border_one">
                <tr>
                    <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th> 
                    <th><?php echo filter_var($LANG['question'], FILTER_SANITIZE_STRING);?></th>    
                    <th><?php echo filter_var($LANG['actions'], FILTER_SANITIZE_STRING);?></th>   
                </tr>
            <?php 
               foreach($pages as $pageData){
                   $pageID = $pageData['qa_id'];
                   $pageTitle = $pageData['qa_title']; 
                   $editPage = $base_url.'admin/pages?pid='.$pageID;
            ?>
                <tr class="transition trhover">
                   <td><?php echo filter_var($pageID, FILTER_SANITIZE_STRING);?></td>
                   <td><?php echo filter_var($pageTitle, FILTER_SANITIZE_STRING);?></td> 
                   <td class="flex_ tabing_non_justify">
                        <div class="flex_ tabing_non_justify">  
                        <div class="delu delqa border_one transition tabing flex_" id="<?php echo filter_var($pageID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')).$LANG['delete'];?></div>
                        <div class="seePost c2 border_one transition tabing flex_ editQA" id="<?php echo filter_var($pageID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27')).$LANG['edit_qa'];?></div>
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