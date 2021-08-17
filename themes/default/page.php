<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING); ?></title>
    <?php
include "layouts/header/meta.php";
include "layouts/header/css.php";
include "layouts/header/javascripts.php";
?>
</head>
<body>
<?php if ($logedIn == 0) {include 'layouts/login_form.php';}?>
<?php include "layouts/header/header.php";?>
    <div class="wrapper bCreatorBg">
        <div class="i_not_found_page transition">
        <?php if ($urlMatch == 'contact') {
	include "layouts/widgets/contact_us_form.php";
} else { 
	echo html_entity_decode($iN->iN_GetPageWords($urlHighlight->highlightUrls($iN->sanitize_output($urlMatch, $base_url))));
}?> 
        </div>
    </div>
<div class="footer_container_out"><?php include("layouts/footer.php");?></div>
</body>
</html>