<?php if($validationStatus == '0'){?>
<div class="certification_terms">
    <div class="certification_terms_item verirication_timing_bg"></div>
    <div class="certification_terms_item">
        <div class="certificate_terms_item_item pendingTitle">
           <?php echo filter_var($LANG['your_request_is_pending'], FILTER_SANITIZE_STRING);?>
        </div>
        <div class="certificate_terms_item_item">
          <?php echo filter_var($LANG['you_will_notififed_when_it_is_processed'], FILTER_SANITIZE_STRING);?>
        </div>
    </div>
</div> 
<?php }else if($validationStatus == '2'){$iN->iN_UpdateVerificationAnswerReadStatus($userID);?>
<div class="i_postFormContainer"><div class="certification_terms">
<div class="certification_terms_item verification_reject_bg"></div>
<div class="certification_terms_item">
    <div class="certificate_terms_item_item pendingTitle">
      <?php echo filter_var($LANG['sorry_rejected'], FILTER_SANITIZE_STRING);?>
    </div>
    <div class="certificate_terms_item_item">
      <?php echo filter_var($LANG['sorry_you_are_rejected'], FILTER_SANITIZE_STRING);?>
    </div>
</div>
</div></div>
<?php } else if($validationStatus == '1'){ $iN->iN_UpdateVerificationAnswerReadStatus($userID);?> 
<div class="i_become_creator_terms_box"> 
<div class="certification_form_container">
   <div class="certification_form_title"><?php echo filter_var($LANG['conditions'], FILTER_SANITIZE_STRING);?></div>
   <div class="certification_form_not"><?php echo filter_var($LANG['readed_conditions'], FILTER_SANITIZE_STRING);?></div>
   <div class="certification_form_wrapper">
      <div class="condition_documentation"><?php echo filter_var($creatorConditions['conditions_document'], FILTER_SANITIZE_STRING);?></div>
   </div>
</div>
</div>
<div class="i_become_creator_box_footer">
   <div class="i_nex_btn c_Next transition"><?php echo filter_var($LANG['next'], FILTER_SANITIZE_STRING);?></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click",".c_Next", function(){
        var type = 'acceptConditions';
        var data = 'f='+type;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                if (response == '200') {
                    location.reload();
                } 
            }
        });
    });
});
</script>
<?php } ?>