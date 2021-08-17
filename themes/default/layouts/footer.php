<?php 
if($getPages){
   foreach($getPages as $page){
     $pageName = $page['page_name'];
     $pageTitle = $page['page_title'];
     $page_Name = isset($LANG[$pageName]) ? $LANG[$pageName] : $pageTitle;
     echo '<div class="footer_menu_item"><a href="'.$base_url.$pageName.'">'.$page_Name.'</a></div>'; 
   } 
   echo '<div class="footer_menu_item">'.$siteName.' © '.date("Y").'</div>';
}
?> 