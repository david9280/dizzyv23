<?php 
$GetThePostIDFromUrl = substr($slugyUrl, strrpos($slugyUrl, '_') + 1); 
if (preg_match('/_/', $slugyUrl)) {
   $GetThePostIDFromUrl = $GetThePostIDFromUrl;
}else{
   $GetThePostIDFromUrl = $slugyUrl;
}
$postFromData = $iN->iN_GetAllPostDetails($GetThePostIDFromUrl); 
if($postFromData){
   $metaBaseUrl = $base_url.'post/'.$slugyUrl;
   $userPostFile = $postFromData['post_file'];
   $userPostID = $postFromData['post_id'];
   $userPostOwnerID = $postFromData['post_owner_id'];
   $slugUrl = $base_url.'post/'.$postFromData['url_slug'].'_'.$userPostID;  
   $userPostWhoCanSee = $postFromData['who_can_see'];
   $trimValue = rtrim($userPostFile,',');
   $explodeFiles = explode(',', $trimValue);
   $explodeFiles = array_unique($explodeFiles);
   $countExplodedFiles = count($explodeFiles); 
   $nums = preg_split('/\s*,\s*/', $trimValue);
   $lastFileID = end($nums);
   $fileData = $iN->iN_GetUploadedFileDetails($lastFileID);
   if($fileData){   
       $fileUploadID = $fileData['upload_id'];
       $fileExtension = $fileData['uploaded_file_ext'];
       $filePath = $fileData['uploaded_file_path'];
       if($userPostWhoCanSee != '1' && $logedIn == '1'){
        $getFriendStatusBetweenTwoUser = $iN->iN_GetRelationsipBetweenTwoUsers($userID, $userPostOwnerID);
           if($getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'subscriber'){ 
               $filePath = $fileData['uploaded_x_file_path'];
           } 
       }else if($userPostWhoCanSee != '1' && !$logedIn){ 
          $filePath = $fileData['uploaded_x_file_path']; 
       }
       $filePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filePath);
       if($s3Status == 1){
           $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath; 
       }else{
           $filePathUrl = $base_url . $filePath; 
       } 
       $videoPlaybutton ='';  
       if($fileExtension == 'mp4'){
           $videoPlaybutton = '<div class="playbutton">'.$iN->iN_SelectedMenuIcon('55').'</div>';
           $PathExtension = '.png';
           if($s3Status == 1){ 
               $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathWithoutExt.$PathExtension;
           }else{ 
               $filePathUrl = $base_url . $filePathWithoutExt.$PathExtension;
           } 
       } 
       $metaBaseUrl = $filePathUrl; 
   }
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("layouts/header/meta.php");
       include("layouts/header/css.php");
       include("layouts/header/javascripts.php");
    ?>
</head>
<body>
<?php if($logedIn == 0){ include('layouts/login_form.php'); }?>
<?php include("layouts/header/header.php");?> 
    <div class="wrapper">  
           <?php
              include("layouts/left_menu.php");
              if($urlMatch == 'post'){
                 include("layouts/post.php");
              }
              include("layouts/page_right.php");
           ?>  
    </div>
</body>
</html>