<?php 
if($logedIn == 0){
    header('Location:'.$base_url.'404');
}else{
    include("themes/$currentTheme/settings.php");   
} 
?>