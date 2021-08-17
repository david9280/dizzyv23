<div class="i_admin_left">
  <div class="i_admin_left_menu_header flex_ tabing_non_justify">
    <div class="ad_le_i flex_ tabing border_two clps"><div class="cl_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('102'));?></div></div>
    <a class="flex_ tabing_non_justify" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>"><img src="<?php echo filter_var($siteLogoUrl, FILTER_VALIDATE_URL);?>"><div class="dash_title flex_ tabing lm"><?php echo filter_var($LANG['admin_dashboard'], FILTER_SANITIZE_STRING);?></div></a>
  </div>
  <div class="i_admin_menu_wrapper flex_ column">
      <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>index">
        <div class="menu_item flex_ tabing_non_justify transition border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'index' ? "active_p" : ""; ?>">
            <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('107'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['dashboard'], FILTER_SANITIZE_STRING);?></div>
        </div>
      </a> 
        <div class="menu_item subCaller flex_ tabing_non_justify transition border_one <?php echo in_array($pageFor, ['general', 'limits','website_settings','billing_informations']) ? "active_p" : ""; ?>" data-id="settings">
            <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('108'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['settings'], FILTER_SANITIZE_STRING);?></div>
            <div class="sub_menu_arrow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
        </div> 
        <div class="sub_menu_wrapper border_one flex_ column <?php echo in_array($pageFor, ['general', 'limits','website_settings', 'billing_informations']) ? 'sub_in' : '' ?>" id="settings">
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>website_settings">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'website_settings' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['website_settings'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>general">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'general' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['general'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>limits">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'limits' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['limits'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a> 
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>billing_informations">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'billing_informations' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['billing_informations'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
        </div>
      <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>email_settings">
        <div class="menu_item flex_ tabing_non_justify transition border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'email_settings' ? "active_p" : ""; ?>">
            <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('71'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['email_settings'], FILTER_SANITIZE_STRING);?></div>
        </div>
      </a>
      <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>live_streaming_settings">
        <div class="menu_item flex_ tabing_non_justify transition border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'live_streaming_settings' ? "active_p" : ""; ?>">
            <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['live_streaming_settings'], FILTER_SANITIZE_STRING);?></div>
        </div>
      </a>
      
      <div class="menu_item subCaller flex_ tabing_non_justify transition border_one <?php echo in_array($pageFor, ['storage_settings', 'oceansettings']) ? "active_p" : ""; ?>" data-id="storage_setting">
            <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('109'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['storage'], FILTER_SANITIZE_STRING);?></div>
            <div class="sub_menu_arrow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
      </div>
      <div class="sub_menu_wrapper border_one flex_ column <?php echo in_array($pageFor, ['storage_settings', 'oceansettings']) ? 'sub_in' : '' ?>" id="storage_setting">
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>storage_settings"> 
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'storage_settings' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['s3_storage_settings'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>oceansettings"> 
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'oceansettings' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['digital_ocean_settings'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
        </div>
      <div class="menu_item subCaller flex_ tabing_non_justify transition border_one <?php echo in_array($pageFor, ['allPosts', 'premiumPosts','for_subscribers', 'awaiting_approval']) ? "active_p" : ""; ?>" data-id="manage_posts">
            <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('110'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['manage_posts'], FILTER_SANITIZE_STRING);?></div>
            <div class="sub_menu_arrow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
      </div> 
        <div class="sub_menu_wrapper border_one flex_ column <?php echo in_array($pageFor, ['allPosts', 'premiumPosts','for_subscribers', 'awaiting_approval']) ? 'sub_in' : '' ?>" id="manage_posts">
        
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>awaiting_approval">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'awaiting_approval' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['awaiting_approval_posts'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>allPosts">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'allPosts' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['posts'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>premiumPosts">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'premiumPosts' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['premium_posts'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>for_subscribers">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'for_subscribers' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['for_subscribers'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a> 
        </div>
      <div class="menu_item subCaller flex_ tabing_non_justify transition border_one <?php echo in_array($pageFor, ['customcssjs', 'svgicons','manage_landing_page','landing_question_answer']) ? "active_p" : ""; ?>" data-id="design">
          <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('117'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['design'], FILTER_SANITIZE_STRING);?></div>
          <div class="sub_menu_arrow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
      </div> 
        <div class="sub_menu_wrapper border_one flex_ column <?php echo in_array($pageFor, ['customcssjs', 'svgicons','manage_landing_page','landing_question_answer']) ? 'sub_in' : '' ?>" id="design">
        
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>customcssjs">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'customcssjs' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['custom_css_js'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>svgicons">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'svgicons' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['manageicons'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>manage_landing_page">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'manage_landing_page' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['manage_landing_page'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a> 
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>landing_question_answer">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'landing_question_answer' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['landing_question_answer'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
        </div>
      <div class="menu_item subCaller flex_ tabing_non_justify transition border_one <?php echo in_array($pageFor, ['manage_point_packages']) ? "active_p" : ""; ?>" data-id="point">
          <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['manage_point_feature'], FILTER_SANITIZE_STRING);?></div>
          <div class="sub_menu_arrow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
      </div> 
        <div class="sub_menu_wrapper border_one flex_ column <?php echo in_array($pageFor, ['manage_point_packages']) ? 'sub_in' : '' ?>" id="point">
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>manage_point_packages">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'manage_point_packages' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['point_packages_settings'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a> 
        </div>
      <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>languages">
        <div class="menu_item flex_ tabing_non_justify transition border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'languages' ? "active_p" : ""; ?>">
            <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('1'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['languages'], FILTER_SANITIZE_STRING);?></div>
        </div>
      </a>
      <div class="menu_item subCaller flex_ tabing_non_justify transition border_one <?php echo in_array($pageFor, ['manage_users','creator_requests','fake_user_generator']) ? "active_p" : ""; ?>" data-id="user">
          <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('15'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['users'], FILTER_SANITIZE_STRING);?></div>
          <div class="sub_menu_arrow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
      </div> 
        <div class="sub_menu_wrapper border_one flex_ column <?php echo in_array($pageFor, ['manage_users','creator_requests','fake_user_generator']) ? 'sub_in' : '' ?>" id="user">
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>manage_users">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'manage_users' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['manage_users'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>creator_requests">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'creator_requests' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['creator_requests'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a> 
        </div>
        <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>pages">
          <div class="menu_item flex_ tabing_non_justify transition border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'pages' ? "active_p" : ""; ?>">
              <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('124'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['pages'], FILTER_SANITIZE_STRING);?></div>
          </div>
        </a>
        <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>manage_stickers">
          <div class="menu_item flex_ tabing_non_justify transition border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'manage_stickers' ? "active_p" : ""; ?>">
              <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('24'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['manage_stickers'], FILTER_SANITIZE_STRING);?></div>
          </div>
        </a>
        <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>giphy_settings">
          <div class="menu_item flex_ tabing_non_justify transition border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'giphy' ? "active_p" : ""; ?>">
              <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('23'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['giphy_settings'], FILTER_SANITIZE_STRING);?></div>
          </div>
        </a>
      <div class="menu_item subCaller flex_ tabing_non_justify transition border_one <?php echo in_array($pageFor, ['payment_settings','paypal','bitpay','stripe','authorizenet','iyzico','razorpay','paystack','ccbill_subscription_settings']) ? "active_p" : ""; ?>" data-id="payments">
        <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('42'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['payment_methods'], FILTER_SANITIZE_STRING);?></div>
        <div class="sub_menu_arrow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
      </div> 
        <div class="sub_menu_wrapper border_one flex_ column <?php echo in_array($pageFor, ['payment_settings','paypal','bitpay','stripe_subscribtion_settings','stripe','authorizenet','iyzico','razorpay','paystack','ccbill_subscription_settings']) ? 'sub_in' : '' ?>" id="payments">
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>payment_settings">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'payment_settings' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['payment_settings'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>paypal">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'paypal' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['paypal_payment'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>bitpay">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'bitpay' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['bitpay_payment'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>stripe_subscribtion_settings">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'stripe_subscribtion_settings' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['stripe_payment_subs'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
           <!-- <a href="<?php //echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>ccbill_subscription_settings">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php //echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'ccbill_subscription_settings' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php //echo filter_var($LANG['ccbill_subscription_settings'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a> -->
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>stripe">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'stripe' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['stripe_payment'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>authorizenet">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'authorizenet' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['authorizenet_payment'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>iyzico">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'iyzico' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['iyzico_payment'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>razorpay">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'razorpay' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['razorpay_payment'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>paystack">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'paystack' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['paystack_payment'], FILTER_SANITIZE_STRING);?></div>
              </div>
            </a>
        </div>
        <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>social_logins">
          <div class="menu_item flex_ tabing_non_justify transition border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'social_logins' ? "active_p" : ""; ?>">
              <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('126'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['social_logins'], FILTER_SANITIZE_STRING);?></div>
          </div>
        </a>
        <div class="menu_item subCaller flex_ tabing_non_justify transition border_one <?php echo in_array($pageFor, ['manage_withdrawals', 'manage_subscription_payments']) ? "active_p" : ""; ?>" data-id="wspayments">
          <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('127'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['manage_payments'], FILTER_SANITIZE_STRING);?></div>
          <div class="sub_menu_arrow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
        </div> 
        <div class="sub_menu_wrapper border_one flex_ column <?php echo in_array($pageFor, ['manage_withdrawals', 'manage_subscription_payments']) ? 'sub_in' : '' ?>" id="wspayments">
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>manage_withdrawals">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'manage_withdrawals' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['manage_withdrawals'], FILTER_SANITIZE_STRING)?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>manage_subscription_payments">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'manage_subscription_payments' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['manage_subscription_payments'], FILTER_SANITIZE_STRING)?></div>
              </div>
            </a> 
        </div>
        <div class="menu_item subCaller flex_ tabing_non_justify transition border_one <?php echo in_array($pageFor, ['create_advertisement', 'managa_advertisements']) ? "active_p" : ""; ?>" data-id="ads">
          <div class="flex_ tabing menu_svg"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('132'));?></div><div class="flex_ lm"><?php echo filter_var($LANG['advertisement_'], FILTER_SANITIZE_STRING);?></div>
          <div class="sub_menu_arrow"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
        </div> 
        <div class="sub_menu_wrapper border_one flex_ column <?php echo in_array($pageFor, ['create_advertisement', 'managa_advertisements']) ? 'sub_in' : '' ?>" id="ads">
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>create_advertisement">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'create_advertisement' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['create_advertisement'], FILTER_SANITIZE_STRING)?></div>
              </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/';?>managa_advertisements">
              <div class="sub_menu_item transition flex_ tabing_non_justify border_one <?php echo filter_var($pageFor, FILTER_SANITIZE_STRING) == 'managa_advertisements' ? "active_p" : ""; ?>">
                <div class="flex_ lm"><?php echo filter_var($LANG['managa_advertisements'], FILTER_SANITIZE_STRING)?></div>
              </div>
            </a> 
        </div> 
  </div>

  <div class="legal">
    <div class="copyright">
        Copyright © <?php echo date("Y"); ?>   <a href="javascript:void(0);"> <?php echo $siteName; ?> - </a> <?php echo $version; ?>
    </div> 
</div>
</div>