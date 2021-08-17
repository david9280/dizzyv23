<!-- added by nazar -->
<div class="creators_menu_wrapper">
    <div class="tabing" style="
        margin: auto;
        width: 333px;
        border-top: 1px solid #b3b9cc;
        padding: 1px;
    ">
        <div
            class="creator_item transition <?php echo filter_var($pageWall, FILTER_SANITIZE_STRING) == 1 ? "active_pc" : ""; ?>">
            <a href="<?php echo filter_var($profileUrl, FILTER_VALIDATE_URL).'?wall=1';?>">
                <div class="i_image_video_btn">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('130'));?>&nbsp; PUBLICATIONS</div>
            </a>
        </div>
        <div
            class="creator_item transition <?php echo filter_var($pageWall, FILTER_SANITIZE_STRING) == 2 ? "active_pc" : ""; ?>">
            <a href="<?php echo filter_var($profileUrl, FILTER_VALIDATE_URL).'?wall=2';?>">
                <div class="i_image_video_btn"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('7'));?>&nbsp;
                    IDENTIFIE
                </div>
            </a>
        </div>
    </div>
</div>