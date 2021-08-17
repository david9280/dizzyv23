<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("header/meta.php");
       include("header/css.php");
       include("header/javascripts.php"); 
    ?> 
    <script src="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/codemirror/lib/codemirror.js"></script>
    <script src="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/codemirror/mode/css/css.js"></script>
    <script src="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/codemirror/mode/javascript/javascript.js"></script>
    <link rel="stylesheet" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/codemirror/lib/codemirror.css">    
</head>
<body> 
<div class="i_admin_container flex_">
    <?php include("menu/leftMenu.php");?>
    <div class="i_admin_right">
        <div class="i_admin_contents_wrapper column flex_">
            <?php 
                include("header/header.php"); 
                include("contents/customcssjs.php");
            ?> 
        </div> 
    </div>
</div>

</body>
</html>