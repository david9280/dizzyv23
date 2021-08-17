<div class="creators_menu_wrapper">
    <div class="tabing"> 
        <?php foreach($PROFILE_CATEGORIES as $cat => $value){?> 
            <div class="creator_item transition <?php echo filter_var($pageCreator, FILTER_SANITIZE_STRING) == filter_var($cat, FILTER_SANITIZE_STRING) ? "active_pc" : ""; ?>"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).'creators?creator='.filter_var($cat, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($PROFILE_CATEGORIES[$cat], FILTER_SANITIZE_STRING); ?></a></div>
        <?php }?> 
    </div>
</div>