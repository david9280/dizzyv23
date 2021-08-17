<div class="Message_stickersContainer">
    <div class="Message_stickers_wrapper">
        <div class="giphy_results_container_conversation"> 
                <?php
                // http://api.giphy.com/v1/gifs/random?tag=funny+cat&rating=g&api_key=ldhBLq2FuA9Bhfftko5S3u8wt8d4plEm
                    $file = file_get_contents('http://api.giphy.com/v1/gifs/trending?=' . $giphyTrendKey . '&api_key=' . $giphyKey . '');
                    $json = json_decode($file);
                    $count = count($json->data);
                    if ($count == '0') {
                        echo '<div class="no-gif-found">' . $LANG['could_not_fined_gif']. '</div>';
                        exit();
                    }
                    for ($i = 0; $i < $count; $i++) {
                        $giphyImageUrl = @$json->data[$i]->images->fixed_height->url;
                        echo '<img class="mrGif transition" data-id="'.$id.'" src="' . $giphyImageUrl . '">';
                    } 
                ?> 
        </div>
    </div>
    <script>
    $('.stickers_wrapper').slimscroll({
        width: '100%',
        height: '375px',
        touchScrollStep : 1,
        wheelStep : 100
    });
    </script>
</div>