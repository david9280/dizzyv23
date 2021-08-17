<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("layouts/header/meta.php");
       include("layouts/header/css.php");
       include("layouts/header/javascripts.php");
    ?>
</head>
<body>
<?php if($logedIn == 0){ include('layouts/login_form.php'); }?>
<?php include("layouts/header/header.php");?> 
    <div class="wrapper">  
           <?php
              $page = 'savedpost';
              include("layouts/left_menu.php"); 
              include("layouts/savedPosts.php"); 
              include("layouts/page_right.php");
           ?>  
    </div>
</body>
</html>