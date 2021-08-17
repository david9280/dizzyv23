<?php   
if($logedIn == 0){ 
    if(isset($_GET['active']) && !empty($_GET['active'])){
       $activationCode = mysqli_real_escape_string($db, $_GET['active']);
       $checkCodeExist = $iN->iN_CheckCodeExist($activationCode);
       if($checkCodeExist){
          include("themes/$currentTheme/reset_password.php");  
       }else{
          include("themes/$currentTheme/404.php");  
       }
    } else{
        include("themes/$currentTheme/404.php");  
     }
}else{
  header("Location:$base_url");
}
?> 