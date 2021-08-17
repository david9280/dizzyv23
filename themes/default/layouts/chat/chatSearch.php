<div class="i_message_wrpper">
<a href="<?php echo filter_var($profileUrl, FILTER_SANITIZE_STRING);?>">
<div class="i_message_wrapper transition">
    <div class="i_message_owner_avatar"> 
        <div class="i_message_avatar"><img src="<?php echo filter_var($resultUserAvatar, FILTER_SANITIZE_STRING);?>" alt="<?php echo filter_var($resultUserFullName, FILTER_SANITIZE_STRING);?>"></div>
    </div> 
    <div class="i_message_info_container">
        <div class="i_message_owner_name"><?php echo filter_var($resultUserFullName, FILTER_SANITIZE_STRING);?></div> 
    </div> 
</div>
</a> 
</div>