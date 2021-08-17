<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("layouts/header/meta.php");
       include("layouts/header/css.php");
       include("layouts/header/javascripts.php");
    ?>
</head>
<body>
<div class="maintenance_container flex_ tabing">
    <div class="maintenance_items">
        <div class="maintenance_img flex_ tabing">
            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('111'));?>
        </div>
        <div class="maintenance_not">
            <div class="maintenance_title"><?php echo filter_var($LANG['maintenance_title'], FILTER_SANITIZE_STRING);?></div>
            <div class="maintenance_desc">
               <?php echo filter_var($LANG['maintenance_desc'], FILTER_SANITIZE_STRING);?>
            </div>
        </div>
    </div>
</div>
</body>
</html>