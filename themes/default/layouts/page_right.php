<div class="rightSticky">
   <div class="i_right_container"> 
        <div class="rightSidebar_in">
            <div class="leftSidebarWrapper leftSidebarWrapper_mobile">
                <div class="btest">
                <?php
                    include("widgets/topinoras.php");
                    include("widgets/sponsored.php");
                    include("widgets/suggestedCreators.php");
                    if($conditionStatus == '0'){
                      include("widgets/becomeCreator.php");
                    } 
                ?>
                </div>
            </div>
        </div>  
   </div>
</div>
<?php if($logedIn == '1'){ ?>
<script src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>src/worker.js"></script>
<?php } ?>