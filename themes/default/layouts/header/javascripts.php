<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/jquery-v3.5.1.min.js">
</script>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/jquery.form.js">
</script>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/share.js">
</script>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/clipboard/clipboard.min.js">
</script>
<?php if($logedIn == 1){ ?>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/autoresize.min.js">
</script>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/lightGallery/lightgallery-all.min.js">
</script>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/videojs/video.js">
</script>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/scrollBar/jquery.slimscroll.min.js">
</script>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/crop/croppie.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>">
</script>
<script type="text/javascript">
var siteurl = '<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>';
$(function() {
    $('.commenta').autoResize();
    var clipboard = new ClipboardJS('.copyUrl');
});
</script>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/inora.js?v=254<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>">
</script>
<?php if($page != 'point_purchase'){ ?>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<?php } ?>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/character_count.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>">
</script>
<script type="text/javascript">
$("#newPostT").characterCounter({
    limit: '500'
});
</script>
<?php } ?>
<?php if($logedIn == 0){ ?>
<script type="text/javascript">
var siteurl = '<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>';
</script>
<script type="text/javascript"
    src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/inora_do.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>">
</script>
<?php } ?>
<script type="text/javascript">
<?php echo filter_var($customHeaderJsCode, FILTER_SANITIZE_STRING);?>
</script>

<!-- added by nazar -->
<!-- <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<!-- end of add -->