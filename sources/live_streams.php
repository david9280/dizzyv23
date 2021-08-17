<?php 
if($agoraStatus == '1'){
include("themes/$currentTheme/layouts/live_streams.php");
}else{
  header('Location:'.$base_url.'404');
} 
?>