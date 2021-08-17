<?php  
$checkPageExist = $iN->iN_CheckpageExist($urlMatch);
if($checkPageExist){
    $siteTitle = isset($LANG[$urlMatch]) ? $LANG[$urlMatch] : $urlMatch;  
    include("themes/$currentTheme/page.php"); 
}else{
    $siteTitle = $LANG['page-not-found'];
    include("themes/$currentTheme/404.php"); 
}
?> 