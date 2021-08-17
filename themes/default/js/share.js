function share(social, url, id) {
    // Get the message content
    var content = $.trim($("#message_text" + id).text());

    // Get the message author's image
    var image = encodeURIComponent($("#message" + id).find('img').attr('src'));

    if (social !== 'gmail' && social !== 'yahoo' && social !== 'email') {
        content = content.substr(0, 350);
    }

    if (social == 'facebook') {
        window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "", "width=500, height=250");
    } else if (social == 'twitter') {
        window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(content) + "&url=" + url, "", "width=500, height=250");
    }
}