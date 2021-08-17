<?php   
$totalStickers = $iN->iN_TotalSticker();
$totalPages = ceil($totalStickers / $paginationLimit); 
if (isset($_GET["page-id"])) { 
    $pagep  = mysqli_real_escape_string($db, $_GET["page-id"]); 
    if(preg_match('/^[0-9]+$/', $pagep)){
        $pagep = $pagep;
    }else{
        $pagep = '1';
    }
}else{
    $pagep = '1';
} 
?>
<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['manage_stickers'], FILTER_SANITIZE_STRING).'('.$totalStickers.')';?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
            <div class="new_svg_icon_wrapper" style="margin-bottom:15px;">
               <div style="display: inline-block;" class="newpa newstick addNewSticker"><div class="flex_ tabing_non_justify newSvgCode border_one"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('24'));?><?php echo filter_var($LANG['add_new_sticker'], FILTER_SANITIZE_STRING);?></div></div>
            </div>
        <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
        <?php 
        $allSticker = $iN->iN_AllStickersList($userID, $paginationLimit, $pagep);
        if($allSticker){ 
        ?> 
        <div style="overflow-x:auto;">
            <table class="border_one">
                <tr>
                    <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th>
                    <th><?php echo filter_var($LANG['sticker_url'], FILTER_SANITIZE_STRING);?></th> 
                    <th><?php echo filter_var($LANG['sticker'], FILTER_SANITIZE_STRING);?></th>  
                    <th><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></th>
                    <th><?php echo filter_var($LANG['actions'], FILTER_SANITIZE_STRING);?></th>   
                </tr>
        <?php 
        foreach($allSticker as $sData){
            $stickerID = $sData['sticker_id'];
            $stickerUrl = $sData['sticker_url'];
            $stickerStatus = $sData['sticker_status'];
        ?>
        <tr class="transition trhover">
            <td><?php echo filter_var($stickerID, FILTER_SANITIZE_STRING);?></td> 
            <td class="see_post_details"><div class="flex_ tabing_non_justify sim truncated"><?php echo filter_var($stickerUrl, FILTER_VALIDATE_URL);?></div></td> 
            <td class="see_post_details"><div class="flex_ tabing_non_justify sim"><img src="<?php echo filter_var($stickerUrl, FILTER_VALIDATE_URL);?>"></div></td>
            <td class="see_post_details">
               <div class="flex_ tabing_non_justify">
               <label class="el-switch el-switch-yellow" for="upStick<?php echo filter_var($stickerID, FILTER_SANITIZE_STRING);?>">
                   <input type="checkbox" name="stickerStatus" class="upStick" id="upStick<?php echo filter_var($stickerID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($stickerID, FILTER_SANITIZE_STRING);?>" data-type="upStick" <?php echo filter_var($stickerStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                   <span class="el-switch-style"></span>  
                </label>
               <div class="success_tick tabing flex_ sec_one upStick<?php echo filter_var($stickerID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
            </td>
            <td class="flex_ tabing_non_justify">
                <div class="flex_ tabing_non_justify"> 
                    <div class="delu del_stick border_one transition tabing flex_" id="<?php echo filter_var($stickerID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')).$LANG['delete'];?></div> 
                    <div class="seePost edStick c2 border_one transition tabing flex_" id="<?php echo filter_var($stickerID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27')).$LANG['edit_sticker'];?></div> 
                </div>
            </td> 
        </tr>
        <?php }?>
        </table>
            </div>
        <?php }else{echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['no_user_found'].'</div></div>';}?>
             
        </div>
        <!---->
    <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalStickers / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_stickers?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_stickers?page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_stickers?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_stickers?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_stickers?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalStickers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_stickers?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalStickers / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_stickers?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalStickers / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_stickers?page-id=<?php echo ceil($totalStickers / $paginationLimit); ?>"><?php echo ceil($totalStickers / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalStickers / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_stickers?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>    
     </div> 
    <!---->
    </div> 
    
</div>