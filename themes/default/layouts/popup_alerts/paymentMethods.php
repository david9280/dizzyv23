<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in i_sf_box"> 
       <div class="i_modal_content">  
          <div class="purchase_premium_header flex_ tabing border_top_radius mp" data-p="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG['choose_payment_method'], FILTER_SANITIZE_STRING);?></div>
          <div class="purchase_post_details tabing"> 
             <?php if($bitPayPaymentStatus == '1'){?>
             <!---->
              <div class="payment_method_box transition payMethod" id="bitpay" data-type="bitpay">
                  <div class="payment_method_item flex_ bitpay"></div>
              </div>
             <!---->
             <?php }?>
             <?php if($razorPayPaymentStatus == '1'){?>
             <!---->
             <div class="payment_method_box transition payMethod" id="razorpay" data-type="razorpay">
                  <div class="payment_method_item flex_ razorpay"></div>
              </div>
             <!---->
             <?php }?>
             <?php if($payPalPaymentStatus == '1'){?> 
             <!---->
             <div class="payment_method_box transition payMethod" id="paypal" data-type="paypal">
                  <div class="payment_method_item flex_ paypal"></div>
              </div>
             <!---->
             <?php }?>
             <?php if($stripePaymentStatus == '1'){?>
             <!---->
             <div class="payment_method_box transition payMethod" id="stripe" data-type="stripe">
                  <div class="payment_method_item flex_ stripe"></div>
              </div>
             <!---->
             <?php }?>
             <?php if($payStackPaymentStatus == '1'){?>
             <!---->
             <div class="payment_method_box transition payMethod" id="paystack" data-type="paystack">
                  <div class="payment_method_item flex_ paystack"></div>
              </div>
             <!---->
             <?php }?>
             <?php if($iyziCoPaymentStatus == '1'){?>
             <!---->
             <div class="payment_method_box transition paywith" id="iyzico" data-type="iyzico">
                  <div class="payment_method_item flex_ iyzico"></div>
              </div>
             <!---->
             <?php }?>
             <?php if($autHorizePaymentStatus == '1'){?>
             <!---->
             <div class="payment_method_box transition paywith" id="authorize-net" data-type="authorize-net">
                  <div class="payment_method_item flex_ authorize"></div>
              </div>
             <!---->
             <?php }?>
          </div>
          <div class="i_modal_g_footer"> 
              <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
          </div>
       </div>   
   </div>
   <!--/SHARE--> 
<script type="text/javascript">
$(document).ready(function() {
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    $("body").on("click",".paywith", function(){ 
       var type = $(this).attr("data-type"); 
        if (type == 'iyzico') {
            $('.point_purchase').attr('data-type', type);
        } else if (type == 'authorize-net') {
            $('.point_purchase').attr('data-type', type);
        }
        setTimeout(() => {
            $(".i_moda_bg_in_form").addClass('i_modal_display_in');
        }, 200);
    });
    $("body").on("click",".payClose", function(){ 
        $(".i_moda_bg_in_form").removeClass('i_modal_display_in'); 
    });
    $("body").on("click", ".payMethod", function(e) {
        e.preventDefault();
        var payWidth = $(this).attr("data-type");
        var plan = $(".mp").attr("data-p");
        var planID = '<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>';
        var type = 'process'; 
        $("#"+payWidth).append(plreLoadingAnimationPlus);
        $(".payment_method_box").css("pointer-events", "none");
        /*Methods Check 1*/
        if(payWidth == 'paypal' || payWidth == 'iyzico' || payWidth == 'authorize-net' || payWidth == 'bitpay'){
            $.ajax({
                type: 'post', //form method
                context: this,
                url: siteurl + 'requests/request.php', // post data url
                dataType: "JSON",
                data: 'f='+type+'&paymentOption=' + payWidth + '&creditPlan=' +planID+ '&' + $('#paymentFrm').serialize() + '&' + $.param(JSON.parse('<?php echo json_encode($DataUserDetails) ?>')),
                error: function(err) {
                    var error = err.responseText
                    string = '';
                    //on error show alert message
                    alert(string);
                },
                success: function(response) {
                    $(".payment_method_box").css("pointer-events", "auto");
                    $(".loaderWrapper").remove();
                    if (typeof(response.validationMessage)) {
                        var messageData = [],
                            string = '';
                        //validation message
                        $.each(response.validationMessage, function(index, value) {
                            messageData = value;
                            alert(messageData);
                        }); 
                    }
                    if(payWidth == 'paypal'){  
                        $(".lw-show-till-loading").show();
                        //on success load paypalUrl page 
                        window.location.href = response.paypalUrl;
                    }else if(payWidth == 'bitpay'){
                        if (response.status == "success") {
                            window.location.href = response.invoiceUrl;
                        } else {
                            alert('Something went wrong on server.'); 
                        }
                    }else if(payWidth == 'iyzico'){
                        //on success load html content page on iyzico else show error message
                        if (response.status == 'success') {
                            $('body').html(response.htmlContent);
                        } else if (response.message == 'failed') { 
                            alert(response.errorMessage);
                        } else {
                            //error message
                            //validation message
                            $.each(response.validationMessage, function(index, value) {
                                messageData = value;
                                alert(messageData);
                            });
                        }
                        //print error mesaages
                        $('#lwValidationMessage').html(string);
                    }else if(payWidth == 'authorize-net'){
                        var authorizeNetCallbackUrl = <?php echo json_encode($authorizeNetCallbackUrl); ?> ;
                        if (response.status == "success") {
                            $('body').html("<form action='" + authorizeNetCallbackUrl + "' method='post'><input type='hidden' name='response' value='" + JSON.stringify(response) + "'><input type='hidden' name='paymentOption' value='authorize-net'></form>");
                            $('body form').submit();
                        } else if (response.status == "error") {
                            alert(response.message);
                        } else {
                            $.each(response.validationMessage, function(index, value) {
                                messageData = value;
                                alert(messageData);
                            });
                        }
                        $('#lwValidationMessage').html(string);
                    }
                    /***********/
                }
            });
        /***********/
        }else if(payWidth == 'stripe'){
            $(".payment_method_box").css("pointer-events", "auto");
            $(".loaderWrapper").remove();
            //config data For Stripe
            var configData = <?php echo json_encode($PublicConfigs); ?> ,
            configItem = configData['payments']['gateway_configuration']['stripe'],
                userDetails = <?php echo json_encode($DataUserDetails); ?> ,
            stripePublishKey = '';
            //check stripe test or production mode   
            if (configItem['testMode'] === 'true') {  
                stripePublishKey = '<?php echo $stripePaymentTestPublicKey;?>'; 
            } else {   
                stripePublishKey = '<?php echo $stripePaymentLivePublicKey;?>'; 
            }
            /*if (configItem['testMode']) {
                stripePublishKey = configItem['stripeTestingPublishKey'];
            } else {
                stripePublishKey = configItem['stripeLivePublishKey'];
            }*/
            userDetails['paymentOption'] = payWidth;
            userDetails['f'] = 'process';
            userDetails['creditPlan'] = planID; 
            // Stripe script for send ajax request to server side start
            $.ajax({
                type: 'post', //form method
                context: this,
                url: siteurl + 'requests/request.php', // post data url
                dataType: "JSON",
                data: userDetails, // form serialize data
                error: function(err) {
                    var error = err.responseText
                    string = ''; 
                    alert(err.responseText);
                },
                success: function(response) { 
                    //alert(response.id);
                    var stripe = Stripe(stripePublishKey);
                    //alert(stripe);
                    stripe.redirectToCheckout({
                        sessionId: response.id,
                    }).then(function(result) {
                        var string = '';
                        alert(result.error.message);
                    });
                }
            });
        }else if(payWidth == 'paystack'){
            /*************
            **************
            **************/
            $(".payment_method_box").css("pointer-events", "auto");
            $(".loaderWrapper").remove();
            var configData = <?php echo json_encode($PublicConfigs); ?> ,
            paymentPagePath = <?php echo json_encode($paymentPagePath); ?> ,
            configItem = configData['payments']['gateway_configuration']['paystack'],
                paystackCallbackUrl = configItem.callbackUrl,
                userDetails = <?php echo json_encode($DataUserDetails); ?> ;
            const amount = userDetails['amounts'][configItem['currency']];

            var paystackPublicKey = '';

            //check paystack test or production mode
            if (configItem['testMode']) {
                paystackPublicKey = configItem['paystackTestingPublicKey'];
            } else {
                paystackPublicKey = configItem['paystackLivePublicKey'];
            }    
            userDetails['paymentOption'] = payWidth;
            userDetails['f'] = 'process';
            userDetails['creditPlan'] = planID;
            var paystackAmount = amount * 100,
                handler = PaystackPop.setup({
                    key: paystackPublicKey, // add paystack public key
                    email: userDetails['payer_email'], // add customer email
                    amount: paystackAmount, // add order amount
                    currency: configItem['currency'], // add currency
                    callback: function(response) {
                        // after successful paid amount return paystack reference Id
                        var paystackReferenceId = response.reference;

                        //show loader before ajax request
                        $(".lw-show-till-loading").show();

                        var paystackData = {
                            'paystackReferenceId': paystackReferenceId,
                            'paystackAmount': paystackAmount
                        };

                        var paystackData = $('#lwPaymentForm').serialize() + '&' + $.param(userDetails) + '&' + $.param(paystackData);

                        $.ajax({
                            type: 'post', //form method
                            context: this,
                            url: siteurl + 'requests/request.php', // post data url
                            dataType: "JSON",
                            data: paystackData, // form serialize data
                            error: function(err) {
                                var error = err.responseText
                                string = '';
                                //on error show alert message
                                string += '<div class="alert alert-danger" role="alert">' + err.responseText + '</div>';
                                alert(string);
                            },
                            success: function(response) {
                                if (response.status == true) {
                                    paystackCallbackUrl = configData['payments']['gateway_configuration']['paystack']['callbackUrl'] + '?orderId=' + userDetails['order_id']+'&paymentOption='+payWidth;
                                    $('body').html("<form action='" + paystackCallbackUrl + "' method='post'><input type='hidden' name='response' value='" + JSON.stringify(response) + "'><input type='hidden' name='paymentOption' value='paystack'></form>");
                                    $('body form').submit();
                                }
                            }
                        });
                    },
                    onClose: function() {
                        window.location.href = paymentPagePath;
                    }
                });
            //open paystack inline widen using iframe
            handler.openIframe();
            /*************
            **************
            **************/
        }else if(payWidth == 'razorpay'){
            $(".payment_method_box").css("pointer-events", "auto");
            $(".loaderWrapper").remove();
            var configData = <?php echo json_encode($PublicConfigs); ?> ,
            razorpayCallbackUrl = <?php echo json_encode($razorpayCallbackUrl); ?> ,
            paymentPagePath = <?php echo json_encode($paymentPagePath); ?> ,
            configItem = configData['payments']['gateway_configuration']['razorpay'],
                userDetails = <?php echo json_encode($DataUserDetails); ?> ,
            razorpayKeyId = '';

            const amount = userDetails['amounts'][configItem['currency']];
            //check razorpay test or production mode
            if (configItem['testMode']) {
                razorpayKeyId = configItem['razorpayTestingkeyId'];
            } else {
                razorpayKeyId = configItem['razorpayLivekeyId'];
            }
            userDetails['paymentOption'] = payWidth;
            userDetails['f'] = 'process';
            userDetails['creditPlan'] = planID;
            /*************
            **************
            **************/
            var razorpayAmount = amount * 100,
                razorpayPaymentId = null,
                options = {
                    "key": razorpayKeyId, // add razorpay Api Key Id
                    "amount": razorpayAmount, // 2000 paisa = INR 20
                    "currency": configItem['currency'], // add currency
                    "name": configItem['merchantname'], // add merchant user name
                    "handler": function(response) {
                        // after successful paid amount return razorpay payment Id
                        razorpayPaymentId = response.razorpay_payment_id;
                        var encodeRazorpayAmount = window.btoa(razorpayAmount);
                        //show loader before ajax request
                        $(".lw-show-till-loading").show();

                        var razorpayData = {
                            'razorpayPaymentId': razorpayPaymentId,
                            'razorpayAmount': encodeRazorpayAmount
                        };

                        var razorpayData = $('#lwPaymentForm').serialize() + '&' + $.param(userDetails) + '&' + $.param(razorpayData);

                        $.ajax({
                            type: 'post', //form method
                            context: this,
                            url: siteurl + 'requests/request.php', // post data url
                            dataType: "JSON",
                            data: razorpayData, // form serialize data
                            error: function(err) {
                                var error = err.responseText
                                string = '';
                                alert(string);
                            },
                            success: function(response) {
                                if (response.status == "captured") {
                                    razorpayCallbackUrl = configData['payments']['gateway_configuration']['razorpay']['callbackUrl'] + '?orderId=' + userDetails['order_id']+'&paymentOption='+payWidth;
                                    $('body').html("<form action='" + razorpayCallbackUrl + "' method='post'><input type='hidden' name='response' value='" + JSON.stringify(response) + "'><input type='hidden' name='paymentOption' value='razorpay'></form>");
                                    $('body form').submit();
                                }
                            }
                        });
                    },
                    "prefill": {
                        "name": userDetails['payer_name'], // add user name
                        "email": userDetails['payer_email'], // add user email
                    },
                    "theme": {
                        "color": configItem['themeColor'], // add widget theme color
                    },
                    "modal": {
                        "ondismiss": function(e) {
                            if (razorpayPaymentId == null) {
                                 window.location.href = paymentPagePath;
                            }
                        }
                    }
                };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        
            /*************
            **************
            **************/
        }
    });
});
</script>
<?php 
echo filter_var($stripePaymentStatus, FILTER_SANITIZE_STRING) == 1 ? '<script src="https://js.stripe.com/v3"></script>' : "";
echo filter_var($razorPayPaymentStatus, FILTER_SANITIZE_STRING) == 1 ? '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>' : "";
echo filter_var($payStackPaymentStatus, FILTER_SANITIZE_STRING) == 1 ? '<script src="https://js.paystack.co/v1/inline.js"></script>' : "";
?>
</div> 
<!--CREDIT CARD FORM-->
<div class="i_moda_bg_in_form i_subs_modal" style="z-index:5;"> 
   <div class="i_modal_in_in i_payment_pop_box">  
       <div class="i_modal_content">  
           <div class="payClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
           <!---->
           <div class="point_purchase_not flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40')).' '.$iN->iN_TextReaplacement($LANG['point_buy_not'],[$planPoint, $planAmount]);?></div>
           <!---->
           <!---->
           <form id="paymentFrm">
           <div class="i_credit_card_form">
                <div id="paymentResponse"></div>
                <div class="pay_form_group"> 
                    <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['card_holder'], FILTER_SANITIZE_STRING);?></label>
                    <div class="form-control">
                        <div class="form_control_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('70'));?></div>
                       <input type="text" id="cname" name="cardname" class="inora_user_input" placeholder="<?php echo filter_var($LANG['card_holder'], FILTER_SANITIZE_STRING);?>">
                    </div>
                </div>
                <div class="pay_form_group"> 
                    <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['email'], FILTER_SANITIZE_STRING);?></label>
                    <div class="form-control">
                       <div class="form_control_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('71'));?></div>
                       <input type="text" id="email" class="inora_user_input" placeholder="<?php echo filter_var($LANG['email'], FILTER_SANITIZE_STRING);?>">
                    </div>
                </div>
                <div class="pay_form_group"> 
                    <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['card_number'], FILTER_SANITIZE_STRING);?></label>
                    <div class="form-control">
                       <div class="form_control_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('72'));?></div>
                       <input type="text" id="cardNumber" name="cardnumber" class="inora_user_input" placeholder="<?php echo filter_var($LANG['card_number'], FILTER_SANITIZE_STRING);?>"> 
                    </div>
                </div>
                <div class="pay_form_group_plus">
                    <div class="i_form_group_plus_extra">
                        <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['expiration_date'], FILTER_SANITIZE_STRING);?></label>
                        <div class="form-control">
                            <div class="form_control_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('73'));?></div>
                            <input type="text" id="expmonth" name="expmonth" class="inora_user_input" placeholder="DD">
                        </div>
                    </div>
                    <div class="i_form_group_plus_extra">
                        <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['expiration_year'], FILTER_SANITIZE_STRING);?></label>
                        <div class="form-control">
                            <div class="form_control_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('73'));?></div>
                            <input type="text" id="expyear" name="expyear" class="inora_user_input" placeholder="YY">
                        </div>
                    </div>
                    <div class="i_form_group_plus_extra">
                        <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['ccv_code'], FILTER_SANITIZE_STRING);?></label>
                        <div class="form-control">
                            <div class="form_control_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('74'));?></div>
                            <input type="text" id="cvv" name="cvv" class="inora_user_input" placeholder="123">
                        </div>
                    </div>
                </div>
                <div class="pay_form_group">
                    <div class="pay_subscription transition point_purchase payMethod" data-type="iyzico"><?php echo filter_var($LANG['pay'], FILTER_SANITIZE_STRING);?> <?php echo filter_var($currencys[$stripeCurrency], FILTER_SANITIZE_STRING).$planAmount;?></div>
                </div>
                <div class="pay_form_group">
                   <div class="i_pay_note">
                       <?php echo filter_var($LANG['you_can_use_instantly'], FILTER_SANITIZE_STRING);?> 
                   </div>
                </div>
           </div>
           </form>
           <!----> 
       </div>   
   </div> 
<!--/CREDIT CARD FORM-->