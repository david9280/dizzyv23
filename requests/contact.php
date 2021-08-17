<?php 
include("../includes/inc.php"); 
if(isset($_POST['f'])){
    $type = mysqli_real_escape_string($db, $_POST['f']);
    if($type == 'newContact'){ 
       if(isset($_POST['email_fullname']) && isset($_POST['contact_email']) && isset($_POST['content'])){
         $contacterFullName = mysqli_real_escape_string($db, $_POST['email_fullname']);
         $contacterEmail = mysqli_real_escape_string($db, $_POST['contact_email']);
         $contactMessage = mysqli_real_escape_string($db, $_POST['content']);
          if(ctype_space($contacterFullName) || !isset($contacterFullName) || empty($contacterFullName) || !isset($contacterEmail) || empty($contacterEmail) || !isset($contactMessage) || empty($contactMessage)){
             exit('404');
          } 
          $checkUserSendedEmailBefore = $iN->iN_CheckAlreadyHaveMail($iN->iN_Secure($contacterEmail),$iN->iN_GetIPAddress());
            if($checkUserSendedEmailBefore){
            exit('1');
            }
            if (!filter_var($contacterEmail, FILTER_VALIDATE_EMAIL)) {
                exit('2');
            }
            $insertContactMessage = $iN->iN_InsertUserContactMessage($iN->iN_Secure($contacterFullName),$iN->iN_Secure($contacterEmail),$iN->iN_Secure($contactMessage),$iN->iN_GetIPAddress()); 
            if($insertContactMessage){
               echo '200';
            } else{
              echo '404';
            }
       } 
    }
}
?>