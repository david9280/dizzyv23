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
<?php if($logedIn == 0){ include('layouts/login_form.php'); }?>
<?php include("layouts/header/header.php");?> 
    <div class="wrapper">  
           <?php
              include("layouts/left_menu.php");
              if($urlMatch == 'notifications'){
                 include("layouts/notifications.php");
              }else if($urlMatch == 'post'){
                 include("layouts/post.php");
              }
              include("layouts/page_right.php");
           ?>  
    </div>
</body>
</html>