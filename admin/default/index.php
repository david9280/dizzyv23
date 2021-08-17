<?php  
if($logedIn == '0'){ 
    header('Location:'.$base_url.'');
} 
if($pageFor){
  switch($pageFor){
    case 'index':
    case 'index.php':
        include 'sources/main.php';
        break;
    case 'limits':
    case 'limits.php':
        include 'sources/limits.php';
        break;
    case 'general':
    case 'general.php':
        include 'sources/general.php'; 
        break;
    case 'website_settings':
    case 'website_settings.php':
        include 'sources/website_settings.php'; 
        break;
    case 'billing_informations':
    case 'billing_informations.php':
        include 'sources/billing_informations.php'; 
        break;
    case 'email_settings':
    case 'email_settings.php':
        include 'sources/email_settings.php'; 
        break;
    case 'storage_settings':
    case 'storage_settings.php':
        include 'sources/storage_settings.php'; 
        break;
    case 'oceansettings':
    case 'oceansettings.php':
        include 'sources/oceansettings.php'; 
        break;
    case 'awaiting_approval':
    case 'awaiting_approval.php':
        include 'sources/awaiting_approval.php'; 
        break;
    case 'allPosts':
    case 'allPosts.php':
        include 'sources/allPosts.php'; 
        break;
    case 'premiumPosts':
    case 'premiumPosts.php':
        include 'sources/premiumPosts.php'; 
        break;
    case 'for_subscribers':
    case 'for_subscribers.php':
        include 'sources/for_subscribers.php'; 
        break;
    case 'customcssjs':
    case 'customcssjs.php':
        include 'sources/customcssjs.php'; 
        break;
    case 'svgicons':
    case 'svgicons.php':
        include 'sources/svgicons.php'; 
        break;
    case 'giphy_settings':
    case 'giphy_settings.php':
        include 'sources/giphy_settings.php'; 
        break;
    case 'manage_point_packages':
    case 'manage_point_packages.php':
        include 'sources/manage_point_packages.php'; 
        break;
    case 'languages':
    case 'languages.php':
        include 'sources/languages.php'; 
        break;
    case 'manage_users':
    case 'manage_users.php':
        include 'sources/manage_users.php'; 
        break;
    case 'login_as_user':
    case 'login_as_user.php':
        include 'sources/login_as_user.php'; 
        break;
    case 'creator_requests':
    case 'creator_requests.php':
        include 'sources/creator_requests.php'; 
        break;
    case 'pages':
    case 'pages.php':
        include 'sources/pages.php'; 
        break;  
    case 'manage_stickers':
    case 'manage_stickers.php':
        include 'sources/manage_stickers.php'; 
        break;
    case 'payment_settings':
    case 'payment_settings.php':
        include 'sources/payment_settings.php'; 
        break;
    case 'paypal':
    case 'paypal.php':
        include 'sources/paypal.php'; 
        break;
    case 'bitpay':
    case 'bitpay.php':
        include 'sources/bitpay.php'; 
        break;
    case 'stripe_subscribtion_settings':
    case 'stripe_subscribtion_settings.php':
        include 'sources/stripe_subscribtion_settings.php'; 
        break;
    case 'stripe':
    case 'stripe.php':
        include 'sources/stripe.php'; 
        break;
    case 'authorizenet':
    case 'authorizenet.php':
        include 'sources/authorizenet.php'; 
        break;
    case 'iyzico':
    case 'iyzico.php':
        include 'sources/iyzico.php'; 
        break;
    case 'razorpay':
    case 'razorpay.php':
        include 'sources/razorpay.php'; 
        break; 
    case 'paystack':
    case 'paystack.php':
        include 'sources/paystack.php'; 
        break;  
    case 'social_logins':
    case 'social_logins.php':
        include 'sources/social_logins.php'; 
        break; 
    case 'manage_withdrawals':
    case 'manage_withdrawals.php':
        include 'sources/manage_withdrawals.php'; 
        break;
    case 'manage_subscription_payments':
    case 'manage_subscription_payments.php':
        include 'sources/manage_subscription_payments.php'; 
        break; 
    case 'create_advertisement':
    case 'create_advertisement.php':
        include 'sources/create_advertisement.php'; 
        break; 
    case 'managa_advertisements':
    case 'managa_advertisements.php':
        include 'sources/managa_advertisements.php'; 
        break; 
    case 'live_streaming_settings':
    case 'live_streaming_settings.php':
        include 'sources/live_streaming_settings.php'; 
        break;
    case 'manage_landing_page':
    case 'manage_landing_page.php':
        include 'sources/manage_landing_page.php'; 
        break;
    case 'landing_question_answer':
    case 'landing_question_answer.php':
        include 'sources/landing_question_answer.php'; 
        break;
    case 'ccbill_subscription_settings':
    case 'ccbill_subscription_settings.php':
        include 'sources/ccbill_subscription_settings.php'; 
        break; 
    default:
        include 'sources/main.php'; 
  }
}
?>