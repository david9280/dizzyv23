<?php   
if($logedIn == 0){ 
    include("themes/$currentTheme/register.php");  
}else{
  header("Location:$base_url");
}
?> 