<div class="new_s_one new_s_second cNLive" data-type="freeLive"><div class="flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo $LANG['start_new_free_live_stream'];?></div></div>
<div class="live_item transition">
    <div class="live_title_page flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('134'));?><?php echo filter_var($LANG['free_live_streams'], FILTER_SANITIZE_STRING);?></div> 
</div>
<div class="free_live_Streamings_list_container" id="moreType" data-type="<?php echo filter_var($liveListType, FILTER_SANITIZE_STRING);?>">
    <?php include("live_list.php"); ?>
</div>