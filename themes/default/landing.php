<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("layouts/header/meta.php");
       include("layouts/header/css.php");
       include("layouts/header/javascripts.php");
    ?> 
</head>
<body>
<?php $page = 'moreposts'; if($logedIn == 0){ include('layouts/login_form.php'); }?>
<?php include("layouts/header/header.php");?> 
<div class="landing_wrapper">
   <div class="landing_section_one flex_ tabing">
   <div class="landing_header_bg flex_ tabing" style="background-image:url('<?php echo $base_url.$landingPageFirstImage;?>');"></div>
        <div class="landing_section_in">
            <h1><?php echo $LANG['landing_title'];?></h1>
            <div class="landing_seciond_in_note"><?php echo $LANG['landing_desc'];?></div>
            <div class="landing_section_register">
                <div class="landing_reg flex_ tabing input-prepend">
                    <div class="input-group-text"><?php echo preg_replace( "#^[^:/.]*[:/]+#i", "", $base_url );?></div>
                    <input type="text" id="clName" class="landing_text" placeholder="username">
                    <div class="i_singup_claim claimname"><?php echo $LANG['claim'];?></div>
                </div>
                <div class="error_report unmempt">
                   <?php echo filter_var($LANG['username_should_not_be_empty'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="error_report unmexist">
                   <?php echo filter_var($LANG['try_different_username'], FILTER_SANITIZE_STRING);?>
                </div>
                <div class="error_report invldcharctr">
                   <?php echo filter_var($LANG['invalid_username'], FILTER_SANITIZE_STRING);?>
                </div>
            </div>
            <div class="landing_box_animation flex_ tabing ds-top-left ds-move-slower"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51'));?><?php echo $LANG['animation_box_subscriptions'];?></div>
            <div class="landing_box_animation flex_ tabing ds-btm-left ds-move-slow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?><?php echo $LANG['animation_box_premium_content'];?></div>
            <div class="landing_box_animation flex_ tabing ds-top-right ds-move-slower"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('136'));?><?php echo $LANG['animation_box_comissions'];?></div>
            <div class="landing_box_animation flex_ tabing ds-btm-right ds-move-slow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('133'));?><?php echo $LANG['animation_box_live_streaming'];?></div>
        </div>
    <!---->
    <div class="area" >
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div >
    <!---->
   </div>
   <!---->
   <div class="landing_section_two">
      <div class="landing_arrow" style="background-image:url('<?php echo $base_url.$landingpageFirstImageArrow;?>');"></div>
      <div class="landing_section_two_in">
          <h2><?php echo $LANG['our_features_title'];?></h2>
          <div class="landing_features_list">
               <div class="flex_ tabing anlan" style="flex-wrap: wrap;">
               <!---->
               <div class="l_feature_box_container">
                   <img src="<?php echo $base_url.$landingpageFirstDesctiptionImage;?>">
                   <h3><?php echo $LANG['l_premium'];?></h3>
                   <div>
                     <?php echo $LANG['l_exlusive_contents'];?>
                   </div>
               </div>
               <!---->
               <!---->
               <div class="l_feature_box_container">
                   <img src="<?php echo $base_url.$landingpageSecondDesctiptionImage;?>">
                   <h3><?php echo $LANG['fan_club'];?></h3>
                   <div>
                      <?php echo $LANG['fan_club_desc'];?>
                   </div>
               </div>
               <!---->
               <!---->
               <div class="l_feature_box_container">
                   <img src="<?php echo $base_url.$landingpageThirdDesctiptionImage;?>">
                   <h3><?php echo $LANG['l_live_streamings'];?></h3>
                   <div>
                      <?php echo $LANG['l_live_streamings_desc'];?>
                   </div>
               </div>
               <!---->
               <!---->
               <div class="l_feature_box_container">
                   <img src="<?php echo $base_url.$landingpageFourthDesctiptionImage;?>">
                   <h3><?php echo $LANG['l_private_content'];?></h3>
                   <div>
                      <?php echo $LANG['l_private_content_desc'];?>
                   </div>
               </div>
               <!---->
               <!---->
               <div class="l_feature_box_container">
                   <img src="<?php echo $base_url.$landingpageFifthDesctiptionImage;?>">
                   <h3><?php echo $LANG['l_private_messages'];?></h3>
                   <div>
                   <?php echo $LANG['l_private_messages_desc'];?>
                   </div>
               </div>
               <!----> 
               </div>
          </div>
      </div>
   </div>
   <!---->
   <div class="landing_section_three" style="background-image:url('<?php echo $base_url.$landingPageSectionTwoBG;?>')">
       <div class="landing_section_three_in flex_">
           <div class="landing_create_equal_box inmob"><img src="<?php echo $base_url.$landingSectionFeatureImage;?>"></div>
           <div class="landing_create_equal_box flex_ tabing column">
               <h2><?php echo $LANG['l_becomea_creator'];?></h2>
               <div>
                 <?php echo $LANG['l_join_our_community_now_and_start_growing_users'];?>
               </div>
           </div>
       </div>
   </div>
   <!---->
   <!---->
   <div class="landng_section_four" style="padding-top:60px;"> 
       <div class="landng_section_four_in">
          <h2><?php echo filter_var($LANG['best_creators_of_last_week'], FILTER_SANITIZE_STRING);?></h2>
          <div class="landing_features_list" style="padding-top:40px;">
              <!--************************************-->
              <div class="creators_list_container">
                <?php 
                $featuredCreators = $iN->iN_PopularUsersFromLastWeekInExplorePageLanding();
                if($featuredCreators){
                foreach($featuredCreators as $td){
                    $popularuserID = $td['post_owner_id'];
                    $uD = $iN->iN_GetUserDetails($popularuserID);
                    $popularUserAvatar = $iN->iN_UserAvatar($popularuserID, $base_url);
                    $creatorCover = $iN->iN_UserCover($popularuserID, $base_url);
                    $popularUserName = $td['i_username'];
                    $popularUserFullName = $td['i_user_fullname']; 
                    $uPCategory = isset($uD['profile_category']) ? $uD['profile_category'] : NULL;
                    $totalPost = $iN->iN_TotalPosts($popularuserID);
                    $totalImagePost = $iN->iN_TotalImagePosts($popularuserID);
                    $totalVideoPosts = $iN->iN_TotalVideoPosts($popularuserID);
                    if($uPCategory){ $uCateg = '<div class="i_p_cards"> <div class="i_creator_category"><a href="'.filter_var($base_url, FILTER_VALIDATE_URL).'creators?creator='.$uPCategory.'?>">'.html_entity_decode($iN->iN_SelectedMenuIcon('65')).$PROFILE_CATEGORIES[$uPCategory].'</a></div></div>';}else{$uCateg = '';}
                ?>
                    <!---->
                    <div class="creator_list_box_wrp">
                        
                        <div class="creator_l_box flex_">
                            <a href="<?php echo $base_url.$popularUserName;?>">
                            <div class="creator_l_cover" style="background-image:url(<?php echo filter_var($creatorCover, FILTER_SANITIZE_STRING);?>);"></div>
                            </a>
                            <!---->
                            <div class="creator_l_avatar_name" style="padding-bottom:15px;">
                                <div class="creator_avatar_container">
                                   <a href="<?php echo $base_url.$popularUserName;?>">
                                     <div class="creator_avatar"><img src="<?php echo filter_var($popularUserAvatar, FILTER_SANITIZE_STRING);?>"></div>
                                   </a>
                                </div>
                                <div class="creator_nm truncated">
                                   <a href="<?php echo $base_url.$popularUserName;?>">
                                      <?php echo filter_var($iN->iN_Secure($popularUserFullName), FILTER_SANITIZE_STRING);?>
                                   </a>
                                </div>
                                <?php echo $uCateg;?>
                                <!---->
                                <div class="i_p_items_box_">
                                    <div class="i_btn_item_box transition">
                                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('67'));?> <?php echo filter_var($totalPost, FILTER_SANITIZE_STRING);?>
                                    </div>
                                    <div class="i_btn_item_box transition">
                                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('68'));?> <?php echo filter_var($totalImagePost, FILTER_SANITIZE_STRING);?>
                                    </div>
                                    <div class="i_btn_item_box transition">
                                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52'));?> <?php echo filter_var($totalVideoPosts, FILTER_SANITIZE_STRING);?>
                                    </div>
                                </div>
                                <!----> 
                            </div>
                            <!---->
                        </div> 
                    </div>
                    <!---->
                <?php  } } ?> 
                </div>
              <!--************************************-->
          </div>
       </div>
   </div>
   <!---->
   <!---->
   <div class="landing_section_five">
       <div class="landing_section_five_in">
           <h2><?php echo $LANG['creators_earning_simulator'];?></h2>
           <p><?php echo $LANG['calculate_how_much_can_earn'];?></p>
           <div class="ranges flex_ tabing"> 
            <div class="landing_create_equal_box">
                <label for="rangeNumberFollowers">
                <div class="smiulator_helper tabing_non_justify flex_">
                    <?php echo $LANG['l_number_of_followers'];?> <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('34'));?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('88'));?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('90'));?>
                    <div class="helper_right flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('43'));?><span id="numberFollowers">1000</span></div>
                </div>
                </label>
            </div>
            <div class="landing_create_equal_box">
                <div class="smiulator_helper tabing_non_justify flex_">
                    <?php echo $LANG['l_monthly_subscription_price'];?>
                    <div class="helper_right flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51'));?><?php echo $currencys[$defaultCurrency];?><span id="monthlySubscription">2</span></div>
                </div>
            </div>
            </div>
           <div class="ranges_ flex_ tabing">  
            <div class="landing_create_equal_box horizontally-stacked-slider">
                <input type="range" class="custom-range" value="0" min="1000" max="1000000" id="rangeNumberFollowers" oninput="$('#numberFollowers').html($(this).val())">
            </div>
            <div class="landing_create_equal_box horizontally-stacked-slider">
                <input type="range" class="custom-range" value="0" oninput="$('#monthlySubscription').html($(this).val())" min="2" max="100" id="rangeMonthlySubscription">
            </div>
            </div>
            <div class="landing_sec_">
                <h2>
                   <?php echo $LANG['per_month_calculate_earn'];?>
                </h2>
                <p><?php echo $LANG['not_for_calculate'];?></p>
            </div> 
       </div>
   </div>
   <!---->
   <!---->
   <div class="landing_section_six">
     <div class="landing_section_six_in"> 
         <!--***************************************-->
         <ul class="accordion">
             <?php 
             $qa = $iN->iN_ListQuestionAnswerFromLanding();
             if($qa){
                foreach($qa as $qaData){
                    $qaTitle = $qaData['qa_title'];
                    $qaDesc = $qaData['qa_description'];
             ?>
                <li>
                    <a class="toggle" href="javascript:void(0);"><?php echo filter_var($iN->iN_Secure($qaTitle), FILTER_SANITIZE_STRING);?></a>
                    <ul class="inner">
                    <li><?php echo filter_var($iN->iN_Secure($qaDesc), FILTER_SANITIZE_STRING);?></li> 
                    </ul>
                </li>
            <?php }
             }
            ?> 
        </ul>
        <!--***************************************-->
     </div>
   </div>
   <!----> 
<div class="landing-sticky-footer flex_ tabing">
  <div class="landing-sticky-footer-in flex_ tabing">
     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('66'));?><?php echo html_entity_decode($LANG['animatesignup']);?>
  </div>
</div>
<div class="footer_container_out"><?php include("themes/$currentTheme/layouts/footer.php");?></div>
</div> 
<script type="text/javascript">
function decimalFormat(nStr) {
  var $decimalDot = ".";
  var $decimalComma = ",";

  var currency_symbol_left = "<?php echo $currencys[$defaultCurrency];?>";
  var currency_symbol_right = "";

  nStr += "";
  var x = nStr.split(".");
  var x1 = x[0];
  var x2 = x.length > 1 ? $decimalDot + x[1] : "";
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    var x1 = x1.replace(rgx, "$1" + $decimalComma + "$2");
  }
  return currency_symbol_left + x1 + x2 + currency_symbol_right;
}

function earnAvg() {
  var fee = <?php echo $adminFee;?>;
  $decimal = 2;

  var monthlySubscription = parseFloat($("#rangeMonthlySubscription").val());
  var numberFollowers = parseFloat($("#rangeNumberFollowers").val());

  var estimatedFollowers = (numberFollowers); // 1000 
  var followersAndPrice = estimatedFollowers * monthlySubscription; // 2000 
  var percentageAvgFollowers = (followersAndPrice * fee) / 100; // 400
  var earnAvg = followersAndPrice - percentageAvgFollowers; 
  return decimalFormat(earnAvg.toFixed($decimal));
}
$("#estimatedEarn").html(earnAvg());

$("#rangeNumberFollowers, #rangeMonthlySubscription").on("change", function () {
  $("#estimatedEarn").html(earnAvg());
});

$('.toggle').click(function(e) {
  	e.preventDefault();
  
    var $this = $(this);
   
    if ($this.next().hasClass('show')) {
        $this.next().removeClass('show');
        $this.next().slideUp(350);
        $this.removeClass('activeTogg');
    } else {
        $this.parent().parent().find('li .inner').removeClass('show');
        //$this.parent().parent().find('li .inner').slideUp(350);
        $this.next().toggleClass('show');
        $this.next().slideToggle(350);
        $this.addClass('activeTogg');
    }
});
$(document).ready(function(){
    $("body").on("click",".claimname", function(){
       var type = 'claim';
       var unm = $("#clName").val();
       var data = 'f='+type+'&clnm='+unm;
       $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
               $(".error_report").hide();
               $('.claimname').prop('disabled', true);
            },
            success: function(response) {
                 if(response == '200'){
                    window.location.href = siteurl+'register?claim='+unm;
                 }else if(response == '2'){
                    $(".unmexist").show();
                 }else if(response == '5'){
                    $(".invldcharctr").show();
                 }else if(response == '3'){
                    $(".unmempt").show();
                 }
                 setTimeout(() => {
                    $('.claimname').prop('disabled', false);
                }, 1000); 
            }
        });
    });
});
</script>      
</body>
</html>