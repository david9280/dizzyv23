<div class="live_stream_list flex_">
    <div class="live_item_cont paidLive">
      <?php if($logedIn == '1'){?>
         <div class="new_s_one new_s_first cNLive" data-type="paidLive"><div class="flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo $LANG['start_new_paid_live_stream'];?></div></div>
      <?php }?>
      <a href="<?php echo $base_url.'live_streams?live=paid';?>">
         <div class="live_item transition">
            <div class="live_title flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('133'));?><?php echo filter_var($LANG['paid_live_streamings'], FILTER_SANITIZE_STRING);?></div> 
         </div>
      </a>
    </div>
    <div class="live_item_cont freeLive">
      <?php if($logedIn == '1'){?>
      <div class="new_s_one new_s_second cNLive" data-type="freeLive"><div class="flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo $LANG['start_new_free_live_stream'];?></div></div>
      <?php }?>
      <a href="<?php echo $base_url.'live_streams?live=free';?>">
      <div class="live_item transition">
         <div class="live_title flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('134'));?><?php echo filter_var($LANG['free_live_streams'], FILTER_SANITIZE_STRING);?></div> 
      </div>
      </a>
    </div>
</div> 