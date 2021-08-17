<div class="header">
   <div class="i_header_in">
     <div class="i_logo tabing flex_">
       <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>"><img src="<?php echo filter_var($siteLogoUrl, FILTER_VALIDATE_URL);?>"></a>
       <?php if($page == 'moreposts' && $logedIn == 1){?>
       <div class="mobile_hamburger tabing flex_">
            <div class="i_header_btn_item transition">
                <div class="i_h_in is_mobile"> 
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('100'));?>
                </div>
            </div>
       </div>
       <?php } ?>
      </div>
      <div class="i_search" style="position:relative;">
        <div class="mobile_back tabing flex_ mobile_srcbtn">
              <div class="i_header_btn_item transition">
                  <div class="i_h_in is_mobile"> 
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('102'));?>
                  </div>
              </div>
        </div>
       <input type="text" class="i_s_input" id="search_creator" placeholder="<?php echo filter_var($LANG['search_creators'], FILTER_SANITIZE_STRING);?>">
       <!---->
       <div class="i_general_box_search_container generalBox" style="min-width:360px; display:none; max-height:360px !important;">
        <div class="btest">
          <div class="i_user_details"> 
            <div class="i_box_messages_header">
              <?php echo filter_var($LANG['search'], FILTER_SANITIZE_STRING);?> 
            </div>  
            <div class="i_header_others_box sb_items"> 
              
            </div> 
          </div>
          <!----><!---->
          </div>
        </div>
       <!---->
      </div>
     <div class="i_header_right">
        <div class="i_one">
            <div class="i_header_btn_item transition search_mobile mobile_srcbtn">
              <div class="i_h_in"> 
                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('101'));?>
              </div>
            </div>
        <?php if($logedIn == 1){?>
            <div class="i_header_btn_item topPoints transition" id="topPoints" data-type="topPoints">
              <div class="i_h_in"> 
                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
              </div>
            </div> 
            <div class="i_header_btn_item topMessages transition" id="topMessages" data-type="topMessages">
                <div class="i_h_in">
                   <div class="i_notifications_count msg_not" style="display:none;"><div class="isum sum_m" data-id=""><?php echo filter_var($totalMessageNotifications, FILTER_SANITIZE_STRING);?></div></div>
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('38'));?>
                </div>
            </div>
            <div class="i_header_btn_item topNotifications transition" id="topNotifications" data-type="topNotifications">
                <div class="i_h_in">
                  <div class="i_notifications_count not_not" style="display:none;"><div class="isum sum_not" data-id=""><?php echo filter_var($totalNotifications, FILTER_SANITIZE_STRING);?></div></div>
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('37'));?>
                </div>
            </div>
            <div class="i_header_btn_item getMenu transition" id="topMenu" data-type="topMenu">
              <div class="i_h_in">
                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?>
              </div>
            </div> 
        <?php }else{?>
             <!--Before Login-->
            <div class="i_login loginForm"><?php echo filter_var($LANG['login'], FILTER_SANITIZE_STRING);?></div>
            <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>register"><div class="i_singup"><?php echo filter_var($LANG['sign_up'], FILTER_SANITIZE_STRING);?></div></a>
            <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>creators"><div class="i_language"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('95'));?></div></a>
            <!--/Before Login-->
        <?php }?>
        </div>
     </div>
   </div>
</div>
<?php if($logedIn == 1){ ?>
<audio id="notification-sound-mes" class="sound-controls" preload="auto">
    <source src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/mp3/message.mp3" type="audio/mpeg">
</audio>
<audio id="notification-sound-not" class="sound-controls" preload="auto">
    <source src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/mp3/not.mp3" type="audio/mpeg">
</audio>
<?php }?>
<script src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>src/gdpr-cookie.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>"></script>
<script>
    $.gdprcookie.init({
        title: "<?php echo $LANG['cookie_title'];?>",
        message: '<?php echo $LANG['cookie_desc'];?>',
        delay: 600,
        expires: 30,
        acceptBtnLabel: "<?php echo $LANG['accept'];?>",
    });
    
    $(document.body)
        .on("gdpr:show", function() {
            //console.log("Cookie dialog is shown");
        })
        .on("gdpr:accept", function() {
            var preferences = $.gdprcookie.preference();
            //console.log("Preferences saved:", preferences);
        })
        .on("gdpr:advanced", function() {
            //console.log("Advanced button was pressed");
        });

    if ($.gdprcookie.preference("marketing") === true) {
        //console.log("This should run because marketing is accepted.");
    }
</script>