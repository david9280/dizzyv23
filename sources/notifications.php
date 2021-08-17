<?php  
if($logedIn == 0){
    header('Location:'.$base_url.'404');
}else{
$checkPageExist = $iN->iN_CheckpageExist($urlMatch);
include("themes/$currentTheme/contents.php");  
}
?>