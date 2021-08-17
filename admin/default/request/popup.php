<?php 
include_once "../../../includes/inc.php";    
$statusValue = array('0','1');
if(isset($_POST['f']) && $logedIn == '1'){
  $type = mysqli_real_escape_string($db, $_POST['f']);
  /*Delete Post Call AlertBox*/
  if($type == 'ddelPost'){
    if(isset($_POST['id'])){
      $postID = mysqli_real_escape_string($db, $_POST['id']);
      $alertType = $type;
      include("../sources/popup/deletePost.php");
    }
  }
  if($type == 'editSVGPopUp'){
    if(isset($_POST['svg'])){
      $cID = mysqli_real_escape_string($db, $_POST['svg']);
      $alertType = $type;
      $getIconData = $iN->iN_GetSVGCodeFromID($cID);
      if($getIconData){  
        include("../sources/popup/editSVG.php");
      }
    }
  }
  if($type == 'newSVGCode'){  
      include("../sources/popup/newSVG.php");  
  }
  if($type == 'newPackage'){  
    include("../sources/popup/newPackage.php");  
  }
  if($type == 'ddelPlan'){
    if(isset($_POST['id'])){
      $planID = mysqli_real_escape_string($db, $_POST['id']);
      $alertType = $type;
      include("../sources/popup/deletePlan.php");
    }
  }
  if($type == 'editLanguage'){  
    if(isset($_POST['id'])){
      $langID = mysqli_real_escape_string($db, $_POST['id']); 
      include("../sources/popup/editLanguage.php");
    }
  }
  if($type == 'delLang'){  
    if(isset($_POST['id'])){
      $langID = mysqli_real_escape_string($db, $_POST['id']); 
      include("../sources/popup/deleteLanguage.php");
    }
  }
  if($type == 'newLangauge'){  
    include("../sources/popup/addNewLanguage.php");  
  }
  if($type == 'deleteUser'){
    if(isset($_POST['id'])){
      $delUserID = mysqli_real_escape_string($db, $_POST['id']);
      $alertType = $type;
      include("../sources/popup/deleteUser.php");
    }
  }
  if($type == 'deleteUserVerification'){
    if(isset($_POST['id'])){
      $verfID = mysqli_real_escape_string($db, $_POST['id']); 
      include("../sources/popup/deleteVerificationRequest.php");
    }
  }
  if($type == 'ddelPage'){
    if(isset($_POST['id'])){
      $postID = mysqli_real_escape_string($db, $_POST['id']);
      $alertType = $type;
      include("../sources/popup/deletePage.php");
    }
  }
  if($type == 'ddelQA'){
    if(isset($_POST['id'])){
      $postID = mysqli_real_escape_string($db, $_POST['id']);
      $alertType = $type;
      include("../sources/popup/deleteQA.php");
    }
  }
  if($type == 'editStickerUrl'){
    if(isset($_POST['sid'])){
      $cID = mysqli_real_escape_string($db, $_POST['sid']);
      $alertType = $type;
      $getSData = $iN->iN_GetStickerDetailsFromID($cID);
      if($getSData){  
        include("../sources/popup/editStickerUrl.php");
      }
    }
  }
  if($type == 'addNewStickerUrl'){
      include("../sources/popup/addNewStickerUrl.php"); 
  }
  if($type == 'declineSure'){
    if(isset($_POST['did'])){
      $declinedID = mysqli_real_escape_string($db, $_POST['did']);
      $checkPaymentRequestID = $iN->iN_CheckPaymentRequestIDExist($userID, $declinedID); 
      if($checkPaymentRequestID){  
        include("../sources/popup/declinePayment.php");
      }
    }
  }
  if($type == 'deletePayout'){
    if(isset($_POST['id'])){
      $delUserID = mysqli_real_escape_string($db, $_POST['id']);
      $alertType = $type;
      include("../sources/popup/deletePayout.php");
    }
  }
  if($type == 'showWithdrawDetails'){
    if(isset($_POST['id'])){ 
      $withdrawID = mysqli_real_escape_string($db, $_POST['id']);
      $wDet = $iN->iN_GetUWithdrawalDetails($userID, $withdrawID , 'withdrawal');
      $wDetUserData = $iN->iN_GetUserDetails($wDet['iuid_fk']);

      $alertType = $type;
      include("../sources/popup/showWithdrawDetails.php");
    }
  }
  if($type == 'ddelAds'){
    if(isset($_POST['id'])){
      $planID = mysqli_real_escape_string($db, $_POST['id']);
      $alertType = $type;
      include("../sources/popup/deleteAds.php");
    }
  }
  if($type == 'deleteSticker'){
    if(isset($_POST['id'])){
      $delStickerID = mysqli_real_escape_string($db, $_POST['id']);
      $alertType = $type;
      include("../sources/popup/deleteSticker.php");
    }
  }
  if($type == 'newQA'){
    include("../sources/popup/newQA.php");  
  }
  if($type == 'editQuestionAnswer'){
    if(isset($_POST['sid'])){
      $cID = mysqli_real_escape_string($db, $_POST['sid']);
      $alertType = $type;
      $getSData = $iN->iN_GetQADetailsFromID($cID);
      if($getSData){  
        include("../sources/popup/editQA.php");
      }
    }
  }
}
?>