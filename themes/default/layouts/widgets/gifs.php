<div class="stickersContainer">
    <div class="stickers_wrapper">
        <div class="giphy_results_container"> 
                <?php  
                    $file = file_get_contents('http://api.giphy.com/v1/gifs/trending?=' . $giphyTrendKey . '&api_key=' . $giphyKey . '');
                    $json = json_decode($file);
                    $count = count($json->data);
                    if ($count == '0') {
                        echo '<div class="no-gif-found">' . $LANG['could_not_fined_gif']. '</div>';
                        exit();
                    }
                    for ($i = 0; $i < $count; $i++) {
                        $giphyImageUrl = @$json->data[$i]->images->fixed_height->url;
                        echo '<img class="rGif transition" data-id="'.$id.'" src="' . $giphyImageUrl . '">';
                    } 
                ?> 
        </div>
    </div> 
</div>