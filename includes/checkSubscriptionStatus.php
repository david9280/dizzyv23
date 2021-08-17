<?php
require_once('inc.php');
require_once('stripe/vendor/autoload.php');

$stripe = [
  "secret_key"      => $stripeKey,
  "publishable_key" => $stripePublicKey,
];

\Stripe\Stripe::setApiKey($stripeKey);

$query = mysqli_query($db,"SELECT * FROM i_user_subscriptions WHERE status = 'active'") or die(mysqli_error($db));
if($query){
    
while($row = mysqli_fetch_assoc($query)){
    $stripeCustomerID = $row['customer_id'];
    $subscriberUser = $row['iuid_fk'];
    $subscribedUser = $row['subscribed_iuid_fk'];
    $subscriptionPlanID = $row['plan_id']; 
if(!empty($stripeCustomerID)){
$customer = \Stripe\Customer::retrieve($stripeCustomerID);
$customerSubscriptionStatus = isset($customer->subscriptions->data[0]->status) ? $customer->subscriptions->data[0]->status : NULL;

if($customerSubscriptionStatus == 'active'){ 
}else{ 
   mysqli_query($db, "UPDATE i_friends SET fr_status = 'flwr' WHERE fr_one = '$subscriberUser' AND fr_two='$subscribedUser'") or die(mysqli_error($db));
   mysqli_query($db,"UPDATE i_user_subscriptions SET status = 'declined' WHERE iuid_fk = '$subscriberUser' AND subscribed_iuid_fk = '$subscribedUser'") or die(mysqli_error($db));
						       
}    
}

}
    
}else{
    echo '1';
}
?>