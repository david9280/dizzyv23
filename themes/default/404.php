<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("layouts/header/meta.php");
       include("layouts/header/css.php");
       include("layouts/header/javascripts.php");
    ?>
</head>
<body> 
<?php include("layouts/header/header.php");?> 
    <div class="wrapper">   
        <div class="i_not_found_page transition">
            <h1><?php echo filter_var($LANG['sorry-this-page-not-available'], FILTER_SANITIZE_STRING);?></h1>
            <?php echo html_entity_decode($LANG['link-not-found']);?>
            <?php echo html_entity_decode($LANG['not-member-yet']);?>
        </div>
    </div>
</body>
</html>