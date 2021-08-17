<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("header/meta.php");
       include("header/css.php");
       include("header/javascripts.php");
    ?> 
</head>
<body>
<?php $page = 'moreposts'; if($logedIn == 0){ include('login_form.php'); }?>
<?php include("header/header.php");?> 
    <div class="wrapper <?php if($logedIn == 0){echo 'NotLoginYet';}?>">  
           <?php
              if($logedIn != 0){ include("left_menu.php");} 
              include("posts.php");
              include("page_right.php");
           ?>  
    </div>   
</body>
</html>