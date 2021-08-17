<?php 
include_once "inc.php";  
$query = mysqli_query($db,"SELECT subscribed_iuid_fk, SUM(user_net_earning) AS calculate FROM i_user_subscriptions WHERE status = 'active' GROUP BY subscribed_iuid_fk") or die(mysqli_error($db));

while($row = mysqli_fetch_assoc($query)){ 
    $iuidFK = $row['subscribed_iuid_fk'];
    $amountPayable = $row['calculate'];
    $time = strtotime('+15 day', time());
    $userDetail = $iN->iN_GetUserDetails($iuidFK);
    $payoutMethod = $userDetail['payout_method'];
    $InsertNewSubscriptionPaymentRequest = mysqli_query($db,"INSERT INTO i_user_payouts(iuid_fk, amount,method, payment_type,status,payout_time)VALUES('$iuidFK','$amountPayable','$payoutMethod','subscription','pending','$time')") or die(mysqli_error($db));
} 
?>