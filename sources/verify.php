<?php   
if($logedIn == 1){ 
    if(isset($_GET['v']) && !empty($_GET['v'])){
       $activationCode = mysqli_real_escape_string($db, $_GET['v']);
       $checkCodeExist = $iN->iN_CheckVerCodeExist($activationCode);
       if($checkCodeExist){
           mysqli_query($db,"UPDATE i_users SET verify_key = '', email_verify_status = 'yes' WHERE verify_key = '$activationCode'") or die(mysqli_error($db));
          header("Location:$base_url");
       } 
    } else{
        include("themes/$currentTheme/404.php");  
     }
}else{
  header("Location:$base_url");
}
?> 