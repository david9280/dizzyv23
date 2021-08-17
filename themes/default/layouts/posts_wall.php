<!-- this file added by nazar -->
<div class="th_middle">
    <div class="pageMiddle">
        <?php 
          if($agoraStatus == '1' && $page != 'profile'){include("live/live_streamings.php");}
          if($logedIn == 0){
             include("posts/welcomebox.php");
          }else{
             if($page != 'profile'){
               echo html_entity_decode($verStatus);
               include("posts/postForm.php");
             } 
          } 
          echo '<div id="moreType" data-type="'.$page.'">';
          include("posts/wallPosts.php");
          echo '</div>';
       ?>
    </div>
</div>
<script type="text/javascript">
function videoEnded() {
    //alert('Video Ended');
}
</script>