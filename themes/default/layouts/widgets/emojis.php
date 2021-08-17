<div class="<?php echo filter_var($id, FILTER_SANITIZE_STRING);?>">
    <div class="emojis_Container">
        <div class="smileys">
          <div class="emTitle"><?php echo filter_var($LANG['smileys'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($smileys as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="gestures_and_bodyparts">
          <div class="emTitle"><?php echo filter_var($LANG['gestures_and_bodyparts'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($gesturesAndBodyParts as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="people_and_fantasy">
          <div class="emTitle"><?php echo filter_var($LANG['people_and_fantasy'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($peopleAndFantasy as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="clothing_and_accessories">
          <div class="emTitle"><?php echo filter_var($LANG['clothing_and_accessories'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($clothingAndAccessories as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="pale_emojis">
          <div class="emTitle"><?php echo filter_var($LANG['pale_emojis'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($paleEmojis as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="anmal_nature">
          <div class="emTitle"><?php echo filter_var($LANG['anmal_nature'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($animalAndNature as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="food_and_drink">
          <div class="emTitle"><?php echo filter_var($LANG['food_and_drink'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($foodnAndDrink as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="activity_and_sports">
          <div class="emTitle"><?php echo filter_var($LANG['activity_and_sports'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($activityAndSpotrs as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="travel_and_places">
          <div class="emTitle"><?php echo filter_var($LANG['travel_and_places'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($travelAndPlaces as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="objects">
          <div class="emTitle"><?php echo filter_var($LANG['objects'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($objects as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="symbols">
          <div class="emTitle"><?php echo filter_var($LANG['symbols'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($symbols as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="non_emoji_symbols">
          <div class="emTitle"><?php echo filter_var($LANG['non_emoji_symbols'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($nonEmojiSymbols as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
        <div class="flags">
          <div class="emTitle"><?php echo filter_var($LANG['flags'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            foreach ($flags as $fitem) {
                echo '<div class="'.$importClass.' transition" data-emoji="'.$fitem.'" '.$importID.'>'.$fitem.'</div>';
            }
            ?>
        </div>
    </div> 
</div>