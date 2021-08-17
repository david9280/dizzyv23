<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("header/meta.php");
       include("header/css.php");
       include("header/javascripts.php");
    ?>
</head>
<body>
<?php if($logedIn == 0){ include('login_form.php'); }?>
<?php include("header/header.php");?> 
    <div class="wrapper creators_wrapper">  
           <?php
            include("creators/creators_menu.php");
            if($pageCreator){ 
                $checkCreatorTypeExist = $PROFILE_CATEGORIES[$iN->iN_Secure($pageCreator)]; 
            } 
            if($pageCreator && $checkCreatorTypeExist){
                include("creators/creatorsFromType.php");
            }else{
                include("creators/featuredCreators.php");
            }
           ?>  
    </div> 
</body>
</html>