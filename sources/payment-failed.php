<?php 
if($logedIn == 0){
    header('Location:'.$base_url.'404');
}else{ 
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 require_once 'includes/payment/methods/vendor/autoload.php'; 
 if (!defined('INORA_METHODS_CONFIG')) {
     define('INORA_METHODS_CONFIG', realpath('includes/payment/paymentConfig.php'));
 }
// Get config data
$configData = configItem(); 
    include("themes/$currentTheme/payment-failed.php");   
} 
?>