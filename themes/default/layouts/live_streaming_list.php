<div class="th_middle">
   <div class="pageMiddle">
       <?php 
       if(isset($_GET['live']) && !empty($_GET['live'])){
         $liveListType = mysqli_real_escape_string($db, $_GET['live']);
         if($liveListType == 'paid'){
            include("live/paidLiveStreamingList.php");
         }else if($liveListType == 'free'){
            include("live/freeLiveStreamingList.php");
         }else{
            header('Location:' . $base_url . '');
         }
       }
       ?>
   </div>
</div>