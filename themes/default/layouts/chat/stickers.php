<div class="Message_stickersContainer">
    <div class="Message_stickers_wrapper">
        <?php 
            $dataStickers = $iN->iN_GetActiveStickers();
            if($dataStickers){
                foreach($dataStickers as $dSticker){
                    $stickerID = $dSticker['sticker_id'];
                    $stickerURL = $dSticker['sticker_url'];
                    echo '
                    <div class="sticker transition MaddSticker" id="'.$stickerID.'" data-id="'.$id.'">
                        <img src="'.$stickerURL.'">
                    </div>'
                    ;
                }
            }
        ?>
    </div>
    <script>
    $('.Message_stickers_wrapper').slimscroll({
    height: '380px',
    touchScrollStep : 1,
    wheelStep : 100
    });
    </script>
</div>