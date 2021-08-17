<div class="i_contents_container">
    <div class="i_total_earning flex_ column tabing__justify">
      <div class="net_earn_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('76'));?><?php echo filter_var($LANG['net_admin_earnings'], FILTER_SANITIZE_STRING);?> </div>
      <div class="net_earn"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><span class="count-num"><?php echo filter_var($iN->iN_TotalSubscriptionEarnings($userID), FILTER_SANITIZE_STRING) + filter_var($iN->iN_TotalPremiumEarnings($userID), FILTER_SANITIZE_STRING);?></span></div>
    </div>
    <!---->
    <div class="i_contents_section flex_ tabing">
       <!---->
       <div class="row_wrapper">
           <div class="row_item flex_ column border_one c1">
               <div class="chart_row_box_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51'));?><?php echo filter_var($LANG['subscriptions'], FILTER_SANITIZE_STRING);?></div>
               <div class="chart_row_box_sum"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><span class="count-num"><?php echo round($iN->iN_TotalSubscriptionEarnings($userID), 2);?></span></div>
               <div class="wmore tabing_non_justify flex_"><a href="#"><?php echo filter_var($LANG['view_more'], FILTER_SANITIZE_STRING);?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('98'));?></a></div>
           </div>
       </div>
       <!---->
       <!---->
       <div class="row_wrapper">
           <div class="row_item flex_ column border_one c2">
               <div class="chart_row_box_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?><?php echo filter_var($LANG['point_earnings'], FILTER_SANITIZE_STRING);?></div>
               <div class="chart_row_box_sum"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><span class="count-num"><?php echo round($iN->iN_TotalPremiumEarnings($userID), 2);?></span></div>
               <div class="wmore tabing_non_justify flex_"><a href="#"><?php echo filter_var($LANG['view_more'], FILTER_SANITIZE_STRING);?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('98'));?></a></div>
           </div>
       </div>
       <!---->
       <!---->
       <div class="row_wrapper">
           <div class="row_item flex_ column border_one c3">
               <div class="chart_row_box_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('15'));?><?php echo filter_var($LANG['users'], FILTER_SANITIZE_STRING);?></div>
               <div class="chart_row_box_sum"><span class="count-num"><?php echo filter_var($iN->iN_TotalUsers(), FILTER_SANITIZE_STRING);?></span></div>
               <div class="wmore tabing_non_justify flex_"><a href="#"><?php echo filter_var($LANG['view_more'], FILTER_SANITIZE_STRING);?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('98'));?></a></div>
           </div>
       </div>
       <!---->
       <!---->
       <div class="row_wrapper">
           <div class="row_item flex_ column border_one c4">
               <div class="chart_row_box_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('110'));?><?php echo filter_var($LANG['posts'], FILTER_SANITIZE_STRING);?></div>
               <div class="chart_row_box_sum"><span class="count-num"><?php echo filter_var($iN->iN_TotalUserPosts(), FILTER_SANITIZE_STRING);?></span></div>
               <div class="wmore tabing_non_justify flex_"><a href="#"><?php echo filter_var($LANG['view_more'], FILTER_SANITIZE_STRING);?><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('98'));?></a></div>
           </div>
       </div>
       <!---->
    </div>
    <!---->
    <div class="i_contents_section_two flex_ tabing column c5 border_one"> 
        <div class="i_sub_not"><?php echo filter_var($LANG['statistic_of_the_month'], FILTER_SANITIZE_STRING);?></div>
        <div class="statistic_chart"><canvas id="myChart"></canvas></div> 
        <div class="revenues flex_ tabing">
            <div class="revenue_box flex_ tabing column">
                <div class="revenue_sum"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><span class="count-num"><?php echo filter_var($iN->iN_CurrentDayTotalPremiumEarning(), FILTER_SANITIZE_STRING) + filter_var($iN->iN_CurrentDayTotalSubscriptionEarning(), FILTER_SANITIZE_STRING);?></span></div>
                <div class="revenue_title"><?php echo filter_var($LANG['revenue_today'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <div class="revenue_box flex_ tabing column">
                <div class="revenue_sum"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><span class="count-num"><?php echo filter_var($iN->iN_WeeklyTotalPremiumEarning(), FILTER_SANITIZE_STRING) + filter_var($iN->iN_WeeklyTotalSubscriptionEarning(), FILTER_SANITIZE_STRING);?></span></div>
                <div class="revenue_title"><?php echo filter_var($LANG['revenue_this_week'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <div class="revenue_box flex_ tabing column">
                <div class="revenue_sum"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><span class="count-num"><?php echo filter_var($iN->iN_CurrentMonthTotalPremiumEarning(), FILTER_SANITIZE_STRING) + filter_var($iN->iN_CurrentMonthTotalSubscriptionEarning(), FILTER_SANITIZE_STRING);?></span></div>
                <div class="revenue_title"><?php echo filter_var($LANG['revenue_this_month'], FILTER_SANITIZE_STRING);?></div>
            </div>
        </div>
    </div>
    <div class="i_contents_section_three flex_ tabing">
        <!---->
        <div class="section_three_item">
          <div class="section_three_box border_one flex_ column">
              <div class="i_box_header flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('15'));?><?php echo filter_var($LANG['new_registered_users'], FILTER_SANITIZE_STRING);?></div>
              <div class="i_box_container flex_ column">
                <?php 
                $latestUsers = $iN->iN_NewRegisteredUsers();
                if($latestUsers){
                    foreach($latestUsers as $lu){
                        $latestUserID = $lu['iuid'];
                        $latestUserAvatar = $iN->iN_UserAvatar($latestUserID, $base_url);
                        $latestUserUserName = $lu['i_username'];
                        $latestUserFullName = $lu['i_user_fullname'];
                        $latestUserRegistered = $lu['registered'];
                        $crTime = date('Y-m-d H:i:s',$latestUserRegistered); 
                ?>
                <!---->
                <div class="i_box_item border_one transition" id="<?php echo filter_var($latestUserID, FILTER_SANITIZE_STRING);?>">
                <a class="flex_ transition tabing_non_justify" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).$iN->iN_Secure($latestUserUserName);?>">
                    <div class="i_box_item_user_avatar flex_ tabing border_two"><img src="<?php echo filter_var($latestUserAvatar, FILTER_SANITIZE_STRING);?>"></div>
                    <div class="i_box_item_user_details">
                        <div class="i_box_item_user_name truncated"><?php echo html_entity_decode($iN->iN_Secure($latestUserFullName));?></div>
                        <div class="i_box_item_user_reg_time_unm">@<?php echo filter_var($iN->iN_Secure($latestUserUserName), FILTER_SANITIZE_STRING);?> &middot; <?php echo TimeAgo::ago($crTime , date('Y-m-d H:i:s'));?></div>
                    </div>
                </a>
                </div>
                <!---->
                <?php } } ?> 
              </div> 
          </div>
        </div>
        <!---->
        <!---->
        <div class="section_three_item">
          <div class="section_three_box border_one flex_ column">
              <div class="i_box_header flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51'));?><?php echo filter_var($LANG['latest_subscriptions'], FILTER_SANITIZE_STRING);?></div>
              <div class="i_box_container flex_ column">
                <?php 
                $subscriptionUsers = $iN->iN_LatestPaymentsSubscriptionsList();
                if($subscriptionUsers){
                    foreach($subscriptionUsers as $payedSub){
                        $payedSubscriptionID = $payedSub['subscription_id'];
                        $payedSubscriberUidFk = $payedSub['iuid_fk'];
                        $payedSubscribedUidFk = $payedSub['subscribed_iuid_fk']; 
                        $payedSubscriberPlanID = $payedSub['plan_id'];
                        $payedSubscriberAvatar = $iN->iN_UserAvatar($payedSubscriberUidFk, $base_url);
                        $payedSubscribedAvatar = $iN->iN_UserAvatar($payedSubscribedUidFk, $base_url);
                        $subscribtionStarted = $payedSub['created'];
                        $payedAmount = $payedSub['plan_amount'];
                        $payedCurrency = strtoupper($payedSub['plan_amount_currency']);
                        $adminEarning = $payedSub['admin_earning'];
                        $netEarning = $payedAmount - $adminEarning;
                        $subscriptionStatus = $payedSub['status']; 
                        $patedUserData = $iN->iN_GetUserDetails($payedSubscriberUidFk);
                        $payedSubscriberUserName = $patedUserData['i_username'];
                        $payedSubscriberUserFullName = $patedUserData['i_user_fullname'];
                        $myDateTime = date('d/m/Y', strtotime($subscribtionStarted)); 
                        $paUserData = $iN->iN_GetUserDetails($payedSubscribedUidFk);
                        $payerSubscriberUserName = $paUserData['i_username'];
                        $payerSubscriberUserFullName = $paUserData['i_user_fullname']; 
                ?>
                <!---->
                <div class="i_box_item border_one flex_ transition tabing_non_justify" id="<?php echo filter_var($payedSubscriptionID, FILTER_SANITIZE_STRING);?>"> 
                    <div class="i_box_item_user_avatar_sub flex_ tabing">
                        <div class="i_subscriber_user_avatar flex_ tabing border_two"><img src="<?php echo filter_var($payedSubscriberAvatar, FILTER_SANITIZE_STRING);?>"></div>
                        <div class="i_subsciption_user_avatar border_two flex_ tabing">
                            <img src="<?php echo filter_var($payedSubscribedAvatar, FILTER_SANITIZE_STRING);?>">
                        </div>
                    </div>
                    <div class="i_box_item_user_details">
                        <div class="i_box_item_user_name"><?php echo html_entity_decode($iN->iN_TextReaplacement($LANG['subscribed_u'],[$payedSubscriberUserName, $payedSubscriberUserFullName,$payerSubscriberUserName,$payerSubscriberUserFullName]));?></div>
                        <div class="i_box_item_user_reg_time_unm">&middot; <?php echo filter_var($myDateTime, FILTER_SANITIZE_STRING);?></div>
                    </div> 
                </div>
                <!---->
                <?php } } ?> 
              </div> 
          </div>
        </div>
        <!---->
        <!---->
        <div class="section_three_item">
          <div class="section_three_box border_one flex_ column">
              <div class="i_box_header flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?><?php echo filter_var($LANG['latest_content_payments'], FILTER_SANITIZE_STRING);?></div>
              <div class="i_box_container flex_ column">
                <?php 
                $contentPayments = $iN->iN_LatestContentPaymentsList();
                if($contentPayments){
                    foreach($contentPayments as $pay){
                        $paymentDataID = $pay['payment_id'];
                        $paymentDataPayerUserID = $pay['payer_iuid_fk'];
                        $paymentDataPayedUserID = $pay['payed_iuid_fk'];
                        $paymentDataPayedPostID = $pay['payed_post_id_fk']; 
                        $postSlug = $iN->iN_GetAllPostDetails($paymentDataPayedPostID);
                        $slug = isset($postSlug['url_slug']) ? $postSlug['url_slug'] : NULL;
                        $paymentDataPayedProfileID = $pay['payed_profile_id_fk'];
                        $paymentDataOrderKey = $pay['order_key'];
                        $paymentDataPaymentType = $pay['payment_type'];
                        $paymentDataPaymentOption = $pay['payment_option'];
                        $paymentDataPaymentTime = $pay['payment_time'];
                        $paymentDataPaymentStatus = $pay['payment_status'];
                        $paymentDataPaymentAmount = $pay['amount'];
                        $paymentDataPaymentFee = $pay['fee'];
                        $paymentDataPaymentAdminEarning = $pay['admin_earning'];
                        $paymentDataPaymentUserEarning = $pay['user_earning'];  
                        $payerUserAvatar = $iN->iN_UserAvatar($paymentDataPayerUserID, $base_url); 
                        $payedUserAvatar = $iN->iN_UserAvatar($paymentDataPayedUserID, $base_url);
                        $payerUserData = $iN->iN_GetUserDetails($paymentDataPayerUserID);
                        $payerUserName = $payerUserData['i_username'];
                        $payerUserFullName = $payerUserData['i_user_fullname']; 
                        $paUserData = $iN->iN_GetUserDetails($paymentDataPayedUserID);
                        $payedUserName = $paUserData['i_username'];
                        $payedUserFullName = $paUserData['i_user_fullname']; 
                        $buyTime = date('Y-m-d H:i:s',$paymentDataPaymentTime); 
                ?>
                <!---->
                <div class="i_box_item border_one flex_ transition tabing_non_justify" id="<?php echo filter_var($paymentDataID, FILTER_SANITIZE_STRING);?>"> 
                    <div class="i_box_item_user_avatar_sub flex_ tabing">
                        <div class="i_subscriber_user_avatar flex_ tabing border_two"><img src="<?php echo filter_var($payerUserAvatar, FILTER_SANITIZE_STRING);?>"></div>
                        <div class="i_subsciption_user_avatar border_two flex_ tabing">
                            <img src="<?php echo filter_var($payedUserAvatar, FILTER_SANITIZE_STRING);?>">
                        </div>
                    </div>
                    <div class="i_box_item_user_details">
                        <div class="i_box_item_user_name"><?php echo html_entity_decode($iN->iN_TextReaplacement($LANG['payedcontent_u'],[$payedUserName, $payedUserFullName,$payerUserName,$payerUserFullName]));?></div>
                        <div class="i_box_item_user_reg_time_unm">&middot; <?php echo TimeAgo::ago($buyTime , date('Y-m-d H:i:s'));?></div>
                    </div> 
                </div>
                <!---->
                <?php } } ?> 
              </div> 
          </div>
        </div>
        <!---->
    </div>
</div>
<?php  

$yearMonthTotalySubscriptions = $yearMonthTotalPointEarnings = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); 
$monthlyEarningSubscriptions = mysqli_query($db,"SELECT DAY(created) - 1 , SUM(user_net_earning) AS daily_total, COUNT(*) AS ssm FROM `i_user_subscriptions` WHERE MONTH(created) = MONTH(CURDATE()) AND YEAR(created) = YEAR(CURDATE()) AND status = 'active' GROUP BY DAY(created) ORDER BY DAY(created)") or die(mysqli_error($db)); 

while ($row = mysqli_fetch_array($monthlyEarningSubscriptions, MYSQLI_NUM)) {   
	$yearMonthTotalySubscriptions[$row[0]] = $row[1];  
}
$monthlyEarnigPointdata = mysqli_query($db,"SELECT DAY(FROM_UNIXTIME(payment_time)) - 1 , SUM(user_earning) AS daily_total, COUNT(*) AS ssm FROM `i_user_payments` WHERE MONTH(FROM_UNIXTIME(payment_time)) = MONTH(CURDATE()) AND YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_status = 'ok' GROUP BY DAY(FROM_UNIXTIME(payment_time)) ORDER BY DAY(FROM_UNIXTIME(payment_time))") or die(mysqli_error($db)); 

while ($row = mysqli_fetch_array($monthlyEarnigPointdata, MYSQLI_NUM)) {   
	$yearMonthTotalPointEarnings[$row[0]] = $row[1];  
}  
?>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/js/countNumber/jquery.waypoints.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>"></script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/js/countNumber/jquery.countup.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>"></script>
<script type="text/javascript">    
    $('.count-num').countUp();
</script> 
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/js/chartJs/chart.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>"></script>
<script type="text/javascript">
$(document).ready(function(){ 
    var ctx = document.getElementById('myChart').getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 450);
    var gradientTwo = ctx.createLinearGradient(0, 0, 0, 650);
    gradient.addColorStop(0, 'rgba(94, 53, 177, 0.5)');
    gradient.addColorStop(0.5, 'rgba(94, 53, 177, 0.25)');
    gradient.addColorStop(1, 'rgba(94, 53, 177, 0)');
    gradientTwo.addColorStop(0, 'rgba(246, 81, 105, 0.5)');
    gradientTwo.addColorStop(0.5, 'rgba(246, 81, 105, 0.25)');
    gradientTwo.addColorStop(1, 'rgba(246, 81, 105, 0)');
    $("#myChart").css("height", 400);
    var chart = new Chart(ctx, { 
    type: 'line', 
    data: {
        labels: [<?php for($i = 0; $i < cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y")); $i++) { echo "'".($i+1)."',"; } ?>],
        datasets: [{
            label: '<?php echo filter_var($LANG['subscription_earnings'], FILTER_SANITIZE_STRING);?>',
            backgroundColor: gradient,
            borderColor: gradient,
            fill: true, 
            data:<?php echo json_encode(array_values($yearMonthTotalySubscriptions));?>
        },
        {
            label: '<?php echo filter_var($LANG['point_earnings'], FILTER_SANITIZE_STRING);?>',
            backgroundColor: gradientTwo,
            borderColor: gradientTwo,
            fill: true, 
            data: <?php echo json_encode(array_values($yearMonthTotalPointEarnings));?>
        }]
    }, 
    options: { 
        maintainAspectRatio: false,
        responsive:true,
        scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                      beginAtZero: true,
                      callback: function(value, index, values) {
                          return '<?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?>' + value + '';
                      }
                  }
              }],
              
        },
        bezierCurve: true 
    }
});
});
</script>