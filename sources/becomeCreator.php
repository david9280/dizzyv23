<?php   
if($logedIn == 0){
    header('Location:'.$base_url.'404');
}else{
if($certificationStatus == '2' && $validationStatus == '2' && $conditionStatus == '1'){
    header("Location:".$base_url."dashboard/set-fee.php");
 }
include("themes/$currentTheme/becomeCreator.php"); 
} 
?>