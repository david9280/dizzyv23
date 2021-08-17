<div class="th_middle">
   <div class="pageMiddle">
       <?php   
          echo '<div id="moreType" data-type="'.$page.'" data-hash="'.$iN->url_Hash($pageFor).'">'; 
          echo '<div class="i_postSavedHeader isave_svg tabing_non_justify flex_">'.$iN->iN_SelectedMenuIcon('135').$LANG['the_hashtags'].' ('.$iN->iN_CaltulateHashFromDatabase($pageFor).')</div>'; 
          include("posts/htmlPosts.php");
          echo '</div>';
       ?>
   </div>
</div>
<script type="text/javascript">
function videoEnded() {
        alert('Video Ended');
    }
</script>
