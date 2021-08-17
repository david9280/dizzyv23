<div class="i_modal_bg_in i_subs_modal" style="z-index:5;">
    <!--SHARE-->
   <div class="i_modal_in_in i_payment_pop_box">  
       <div class="i_modal_content">  
           <div class="payClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
           <!--Subscribing Avatar-->
           <div class="i_subscribing" style="background-image:url(<?php echo filter_var($f_profileAvatar, FILTER_SANITIZE_STRING);?>);"></div>
           <!--/Subscribing Avatar-->
           <!---->
           <div class="i_subscribing_note" id="pln" data-p="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>">
              <?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['subscription_payment']); ?>
           </div>
           <!---->
           <!---->
           <form id="paymentFrm">
           <div class="i_credit_card_form">
                <div id="paymentResponse"></div>
                <div class="pay_form_group"> 
                    <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['card_holder'], FILTER_SANITIZE_STRING);?></label>
                    <div class="form-control">
                        <div class="form_control_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('70'));?></div>
                       <input type="text" id="name" class="inora_user_input" placeholder="<?php echo filter_var($LANG['card_holder'], FILTER_SANITIZE_STRING);?>">
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
                       <div id="card_number" class="inora_user_input" placeholder="<?php echo filter_var($LANG['card_number'], FILTER_SANITIZE_STRING);?>"></div>
                    </div>
                </div>
                <div class="pay_form_group_plus">
                    <div class="i_form_group_plus">
                        <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['expiration_date'], FILTER_SANITIZE_STRING);?></label>
                        <div class="form-control">
                            <div class="form_control_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('73'));?></div>
                            <div id="card_expiry" class="inora_user_input" placeholder="DD/YY"></div>
                        </div>
                    </div>
                    <div class="i_form_group_plus">
                        <label for="i_nora_username" class="form_label"><?php echo filter_var($LANG['ccv_code'], FILTER_SANITIZE_STRING);?></label>
                        <div class="form-control">
                            <div class="form_control_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('74'));?></div>
                            <div id="card_cvc" class="inora_user_input" placeholder="123"></div>
                        </div>
                    </div>
                </div>
                <div class="pay_form_group">
                    <div class="pay_subscription transition"><?php echo filter_var($LANG['pay'], FILTER_SANITIZE_STRING);?> <?php echo filter_var($currencys[$stripeCurrency], FILTER_SANITIZE_STRING).$f_PlanAmount;?></div>
                </div>
                <div class="pay_form_group">
                   <div class="i_pay_note">
                       <?php echo filter_var($LANG['subscription_renew'], FILTER_SANITIZE_STRING);?> 
                   </div>
                </div>
           </div>
           </form>
           <!---->
           <!---->
           <!---->
       </div>   
   </div>
   <!--/SHARE-->  
<script type="text/javascript"> 
$(document).ready(function(){
var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">'+preLoadingAnimation+'</div></div></div>';    
setTimeout(() => {
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo filter_var($stripePublicKey, FILTER_SANITIZE_STRING); ?>'); 
// Create an instance of elements
var elements = stripe.elements();
<?php if($lightDark == 'dark'){ ?>
var style = {
    base: { 
        color: '#ffffff', 
    }
};
<?php }?>

var cardElement = elements.create('cardNumber', { 
    <?php if($lightDark == 'dark'){ ?>style: style<?php }?>
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', { 
    <?php if($lightDark == 'dark'){ ?>'style': style<?php }?>
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', { 
    <?php if($lightDark == 'dark'){ ?>'style': style<?php }?>
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    $("#stripeTokenID").remove();
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('id','stripeTokenID');
    hiddenInput.setAttribute('value', token.id);
    
    if($("#stripeTokenID").length == 0) {
        form.appendChild(hiddenInput);
    }
    // Submit the form
    //form.submit();
}
$("body").on("click",".pay_subscription", function(){
    createToken();
    $(".i_modal_in_in").append(plreLoadingAnimationPlus); 
    setTimeout(() => {
        var type = 'subscribeMe';
        var ID = $("#prw").attr('data-u');
        var plan = $("#pln").attr("data-p");
        var name = $("#name").val();
        var email = $("#email").val();
        var token = $("#stripeTokenID").val();
        var data = 'f='+type+'&u='+ID+'&pl='+plan+'&name='+encodeURIComponent(name)+'&email='+encodeURIComponent(email)+'&t='+token;  
        
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php', 
            data: data,
            cache: false,
            beforeSend: function() { 
            },
            success: function(response) {
              if(response == '200'){
                location.reload();
              }else{
                  $("#paymentResponse").show().html(response);
                  $(".loaderWrapper").remove();
              }
            }
        }); 
    }, 1200);
});

$("body").on("click", ".payClose", function() {
        $(".i_payment_pop_box").addClass("i_modal_in_in_out");
        setTimeout(() => {
            $(".i_subs_modal").remove();
            $("iframe").remove();
            $("strong").remove(); 
        }, 200);
});
}, 200);
});
</script>
</div> 