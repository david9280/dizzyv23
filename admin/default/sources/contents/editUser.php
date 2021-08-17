<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify" style="max-width:700px;margin:0px auto;">
        <!---->
        <div class="i_general_title_box flex_ tabing_non_justify">
          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('83')).$LANG['edit_user_profile_details'];?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">    
        <!--*********************************--> 
        <form enctype="multipart/form-data" method="post" id="editUserDetails"> 
         <?php 
         $editUserData = $iN->iN_GetUserDetails($editUserID); 
         $validationStatus = $editUserData['validation_status'];
         $editUserType = $editUserData['userType'];
         $editUserProfileUserName = $editUserData['i_username'];
         if($validationStatus == '2'){
            $validStatus = $LANG['premium_user'];
         }else if($validationStatus == '1'){
            $validStatus = $LANG['verification_pending'];
         }else{
            $validStatus = $LANG['not_verified'];
         }
         if($editUserType == '1'){
           $userRole = $LANG['normal_user'];
         }else if($editUserType == '2'){
           $userRole = $LANG['admin'];
         }else {
           $userRole = $LANG['moderator'];  
         }
         $editUserWallet = $editUserData['wallet_points'];
         $edit_ProfileUrl = $base_url.$editUserProfileUserName;
         ?>
         <div class="i_p_e_body" style="padding:15px; margin-bottom:0px;">
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['verified_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="verification"><span class="lct"><?php echo filter_var($validStatus, FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_ch_container">
                            <div class="i_countries_list border_one column flex_">
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($validationStatus, FILTER_SANITIZE_STRING) == '2' ? 'choosed' : ''; ?>" id='2' data-c="<?php echo filter_var($LANG['premium_user'], FILTER_SANITIZE_STRING);?>" data-type="verfUser"><?php echo filter_var($LANG['premium_user'], FILTER_SANITIZE_STRING);?></div>
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($validationStatus, FILTER_SANITIZE_STRING) == '1' ? 'choosed' : ''; ?>" id='1' data-c="<?php echo filter_var($LANG['verification_pending'], FILTER_SANITIZE_STRING);?>" data-type="verfUser"><?php echo filter_var($LANG['verification_pending'], FILTER_SANITIZE_STRING);?></div>
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($validationStatus, FILTER_SANITIZE_STRING) == '0' ? 'choosed' : ''; ?>" id='0' data-c="<?php echo filter_var($LANG['not_verified'], FILTER_SANITIZE_STRING);?>" data-type="verfUser"><?php echo filter_var($LANG['not_verified'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            <input type="hidden" name="verification" id="verification" value="<?php echo filter_var($validationStatus, FILTER_SANITIZE_STRING);?>">
                        </div> 
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['role'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="usertype"><span class="lut"><?php echo filter_var($userRole, FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_cp_container">
                            <div class="i_countries_list border_one column flex_">
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($editUserType, FILTER_SANITIZE_STRING) == '1' ? 'choosed' : ''; ?>" id='1' data-c="<?php echo filter_var($LANG['normal_user'], FILTER_SANITIZE_STRING);?>" data-type="usrtyp"><?php echo filter_var($LANG['normal_user'], FILTER_SANITIZE_STRING);?></div>
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($editUserType, FILTER_SANITIZE_STRING) == '2' ? 'choosed' : ''; ?>" id='2' data-c="<?php echo filter_var($LANG['admin'], FILTER_SANITIZE_STRING);?>" data-type="usrtyp"><?php echo filter_var($LANG['admin'], FILTER_SANITIZE_STRING);?></div> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($editUserType, FILTER_SANITIZE_STRING) == '3' ? 'choosed' : ''; ?>" id='3' data-c="<?php echo filter_var($LANG['moderator'], FILTER_SANITIZE_STRING);?>" data-type="usrtyp"><?php echo filter_var($LANG['moderator'], FILTER_SANITIZE_STRING);?></div> 
                            </div>
                            <input type="hidden" name="usertype" id="usertype" value="<?php echo filter_var($editUserType, FILTER_SANITIZE_STRING);?>">
                        </div> 
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['wallet'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="uwallet" class="i_input flex_" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" value="<?php echo filter_var($editUserWallet, FILTER_SANITIZE_STRING);?>">
               </div>
            </div>
            <!---->
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_general_row_box_item flex_ tabing_non_justify" style="margin-bottom:0px;"> 
                <input type="hidden" name="f" value="editUserDetails">
                <input type="hidden" name="u" value="<?php echo filter_var($editUserID, FILTER_SANITIZE_STRING);?>">
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
         </div>
        </form>
        <!--*********************************--> 
        </div>
    </div> 
    <div class="i_edit_u_wrapper border_one column flex_ tabing__justify" style="max-width:700px;margin:0px auto;margin-top:50px;">
       <div class="i_edit_u_cont flex_ tabing">
          <div class="i_edit_btn_items tabing flex_">
             <a href="<?php echo filter_var($edit_ProfileUrl, FILTER_SANITIZE_STRING);?>" target="blank_"><div class="ed_btn tabing flex_ border_one c3"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('83')).$LANG['see_profile'];?></div></a>
          </div>
          <div class="i_edit_btn_items tabing flex_">
             <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).'admin/login_as_user?user='.$editUserID;?>"><div class="ed_btn tabing flex_ border_one c2"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('7')).$LANG['login_as_user'];?></div></a>
          </div>
          <div class="i_edit_btn_items tabing flex_">
             <div class="ed_btn del_us tabing flex_ border_one c7" id="<?php echo filter_var($editUserID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')).$LANG['delete_user'];?></div>
          </div>
       </div>
       <div class="i_edit_u_cont tabing" style="padding-top:25px;"><?php echo filter_var($LANG['important_for_login_as_user'], FILTER_SANITIZE_STRING);?></div>
    </div>
</div>
