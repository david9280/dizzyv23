<div class="stickersContainer">
    <div class="stickers_wrapper">
        <?php 
            $dataStickers = $iN->iN_GetActiveStickers();
            if($dataStickers){
                foreach($dataStickers as $dSticker){
                    $stickerID = $dSticker['sticker_id'];
                    $stickerURL = $dSticker['sticker_url'];
                    echo '
                    <div class="sticker transition addSticker" id="'.$stickerID.'" data-id="'.$id.'">
                        <img src="'.$stickerURL.'">
                    </div>'
                    ;
                }
            }
        ?>
    </div> 
</div>