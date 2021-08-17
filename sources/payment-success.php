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
    include("themes/$currentTheme/payment-success.php");   
} 
$uData = $iN->iN_LatestPaymentPoint($userID);
$payedUserID = isset($uData['payer_iuid_fk']) ? $uData['payer_iuid_fk'] : NULL;
$purchasedPointID = isset($uData['credit_plan_id']) ? $uData['credit_plan_id'] : NULL;
$paymentID = isset($uData['payment_id']) ? $uData['payment_id'] : NULL;
$planData = $iN->GetPlanDetails($purchasedPointID);
$planPoint = isset($planData['plan_amount']) ? $planData['plan_amount'] : NULL;
$planMoney = isset($planData['amount']) ? $planData['amount'] : NULL; 
$getPayedUserDetails = $iN->iN_GetUserDetails($payedUserID);
$sendEmail = isset($getPayedUserDetails['i_user_email']) ? $getPayedUserDetails['i_user_email'] : NULL; 
$sendName = isset($getPayedUserDetails['i_user_fullname']) ? $getPayedUserDetails['i_user_fullname'] : NULL;

include_once 'includes/mail/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer; 

if ($smtpOrMail == 'mail') {
    $mail->IsMail(); 
} else if ($smtpOrMail == 'smtp') { 
    $mail->isSMTP();
    $mail->Host = $smtpHost; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;
    $mail->SMTPKeepAlive = true;
    $mail->Username = $smtpUserName; // SMTP username
    $mail->Password = $smtpPassword; // SMTP password
    $mail->SMTPSecure = $smtpEncryption; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = $smtpPort;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ),
    );
} else {
    return false;
} 
$pointPurchasesuccess = $LANG['bought_point_success'];
$pointPurchaseDetails = $iN->iN_TextReaplacement($LANG['thank_you_for_purchase_not'], [$planPoint, $planMoney]);
$startUsingYourPoints = $LANG['start_using_your_points'];
$notQualifyDocument = $LANG['not_qualify_document'];
$instagramIcon = $iN->iN_SelectedMenuIcon('88');
$facebookIcon = $iN->iN_SelectedMenuIcon('90');
$twitterIcon = $iN->iN_SelectedMenuIcon('34');
$linkedinIcon = $iN->iN_SelectedMenuIcon('89');
include_once "includes/mailTemplates/pointPurchaseMailTemplate.php";
$body = $bodyPointPurchased;
$mail->setFrom($smtpUserName, $siteName);
$send = false;
$mail->IsHTML(true);
$mail->addAddress($sendEmail); // Add a recipient
$mail->Subject = preg_replace( '/{.*?}/', $planPoint, $LANG['you_bought_points']);
$mail->CharSet = 'utf-8';
$mail->MsgHTML($body);  
/*if (!empty($data['reply-to'])) {
    $mail->ClearReplyTos();
    $mail->AddReplyTo($data['reply-to'], $data['from_name']);
}*/
if ($mail->send()) { 
    $mail->ClearAddresses();
    return true;
}

?>