<?php 
if($logedIn == '1'){
    include("themes/$currentTheme/layouts/main.php");
}else{
    if($landingPageType == '1'){
        include("themes/$currentTheme/layouts/main.php");
    }else{
        include("themes/$currentTheme/landing.php");
    }
}
?>