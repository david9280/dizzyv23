<link rel="stylesheet" type="text/css"
    href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/<?php if ($lightDark == 'light') {echo 'style';} else {echo 'night_style';}?>.css?v=144445<?php echo filter_var($version, FILTER_SANITIZE_STRING); ?>">

<!-- added by nazar -->
<!-- <link type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" -->
<!-- rel="stylesheet"> -->
<!-- end of add -->

<?php if ($logedIn == 1) {?>
<link rel="stylesheet" type="text/css"
    href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/lightGallery/lightgallery.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/videojscss/video-js.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/checkbox/checkbox.css">
<link rel="stylesheet" type="text/css"
    href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/crop/cropmain.css">
<?php }?>
<style rel="stylesheet" type="text/css">
<?php echo filter_var($customHeaderCSSCode, FILTER_SANITIZE_STRING);
?>
</style>