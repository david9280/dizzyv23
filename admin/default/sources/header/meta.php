<link rel="shortcut icon" type="image/png" href="<?php echo filter_var($siteFavicon, FILTER_VALIDATE_URL);?>" sizes="128x128">
<!-- Primary Meta Tags --> 
<meta name="title" content="<?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?>">
<meta name="description" content="<?php echo filter_var($siteDescription, FILTER_SANITIZE_STRING);?>">
<meta name="keywords" content="<?php echo filter_var($siteKeyWords, FILTER_SANITIZE_STRING);?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo filter_var($metaBaseUrl, FILTER_VALIDATE_URL);?>">
<meta property="og:title" content="<?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?>">
<meta property="og:description" content="<?php echo filter_var($siteDescription, FILTER_SANITIZE_STRING);?>"> 
<meta property="og:image" content="<?php echo filter_var($metaBaseUrl, FILTER_VALIDATE_URL);?>">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo filter_var($metaBaseUrl, FILTER_VALIDATE_URL);?>">
<meta property="twitter:title" content="<?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?>">
<meta property="twitter:description" content="<?php echo filter_var($siteDescription, FILTER_SANITIZE_STRING);?>">
<meta property="twitter:image" content="<?php echo filter_var($metaBaseUrl, FILTER_VALIDATE_URL);?>">
 
<meta name="theme-color" content="#f65169">
