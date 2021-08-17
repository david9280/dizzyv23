(function($) {
    "use strict";
    $(document).on("click", ".copyUrl", function() {
        PopUPAlerts('urlCopied', 'ialert');
    });
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    /*Notifications*/
    var g = '';
    getm(g);

    function getm(g) {
        var type = 'get';
        if ($.trim(type).length === 0) {
            setTimeout(getm, 7000);
        } else {
            $.ajax({
                type: 'GET',
                url: siteurl + 'requests/get.php',
                dataType: "json",
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    var messageNotificationStatus = response.messageNotificationStatus;
                    var notificationStatus = response.notificationStatus;
                    var unReadedNotfications = response.unReadedNotfications;
                    var unReadMessageNotifications = response.unReadMessageNotifications;
                    if (messageNotificationStatus == '1') {
                        $(".msg_not").show();
                        $(".sum_m").html(unReadMessageNotifications);
                        if ($(".sum_m").attr("data-id") != messageNotificationStatus) {
                            $(".sum_m").attr("data-id", messageNotificationStatus);
                            document.getElementById('notification-sound-mes').play();
                        }
                    }
                    if (notificationStatus == '1') {
                        $(".not_not").show();
                        $(".sum_not").html(unReadedNotfications);
                        if ($(".sum_not").attr("data-id") != notificationStatus) {
                            $(".sum_not").attr("data-id", notificationStatus);
                            document.getElementById('notification-sound-not').play();
                        }
                    }
                    if (!g) {
                        setTimeout(getm, 7000);
                    }
                }
            });
        }
    }
    $(document).on("click", ".loginForm", function() {
        $('.i_modal_bg').addClass('i_modal_display');
    });
    $(document).on("click", ".i_modal_close", function() {
        $('.i_modal_bg').removeClass('i_modal_display');
        $(".i_modal_in").attr("style", "");
        $(".i_modal_forgot").hide();
    });
    $(document).on("click", ".password-reset", function() {
        $(".i_modal_in").hide();
        $(".i_modal_forgot").show();
    });
    $(document).on("click", ".already-member", function() {
        $(".i_modal_in").show();
        $(".i_modal_forgot").hide();
    });

    $(".i_comment_form_textarea").focusin(function() {
        var words = $(this).val();
        var ID = $(this).attr("data-id");
    });
    $(document).on("click", ".openPostMenu", function() {
        var ID = $(this).attr("id");
        $(".mnoBox" + ID).addClass("dblock");
    });
    $(document).on("click", ".openShareMenu", function() {
        var ID = $(this).attr("id");
        $(".mnsBox" + ID).addClass("dblock");
    });
    $(document).on("click", ".openComMenu", function() {
        var ID = $(this).attr("id");
        $(".comMBox" + ID).addClass("dblock");
    });
    $(document).on("click", ".msg_Set", function() {
        var ID = $(this).attr("id");
        if ($(".msg_Set")[0]) {
            $(".msg_Set").removeClass("dblock");
        }
        $(".msg_Set_" + ID).addClass("dblock");
    });
    $(document).on("click", ".smscd", function() {
        var ID = $(this).attr("id");
        if ($(".smscd")[0]) {
            $(".me_msg_plus").removeClass("dblock");
        }
        $(".msg_set_plus_" + ID).addClass("dblock");
    });
    $(document).on("click", ".whs", function() {
        $(".i_choose_ws_wrapper").addClass("dblock");
    });
    $(document).on("click", ".in_comment", function() {
        var ID = $(this).attr("id");
        $("#comment" + ID).focus();
    });
    $(document).on("mouseup touchend", function(e) {
        /*e.preventDefault();*/
        var postMenuContainer = $('.mnoBox , .mnsBox , .comMBox , .msg_Set , .me_msg_plus ,  .cSetc , .i_choose_ws_wrapper , .i_postFormContainer , .emojiBox , .emojiBoxC , .stickersContainer');
        var notif = $('.topMessages, .topPoints, .topNotifications , .getMenu , .emojiBox , .emojiBoxC , .camList , .stickersContainer');
        if (!postMenuContainer.is(e.target) && postMenuContainer.has(e.target).length === 0) {
            $(postMenuContainer).removeClass('dblock');
        }
        if (!notif.is(e.target) && notif.has(e.target).length === 0) {
            $(".i_general_box_container , .i_general_box_message_notifications_container , .i_general_box_notifications_container , .emojiBox , .emojiBoxC , .stickersContainer").remove();
        }
    });
    $(document).on("click", ".emoji_item", function() {
        var copyEmoji = $(this).attr("data-emoji");
        var getValue = $(".newPostT").val();
        $(".newPostT").val(getValue + copyEmoji);
    });
    $(document).on("click", ".emoji_item_c", function() {
        var copyEmoji = $(this).attr("data-emoji");
        var ID = $(this).attr("data-id");
        var getValue = $("#comment" + ID).val();
        $("#comment" + ID).val(getValue + ' ' + copyEmoji + ' ');
    });

    function GetSlimScroll() {
        if ($(window).width() < 330) {
            $(".btest").slimScroll({
                height: '100%',
                width: '100%',
                railVisible: false,
                alwaysVisible: false,
                wheelStep: 1,
                railOpacity: .1
            });
        }
    }
    GetSlimScroll();
    $(document).on("click", ".getMenu", function() {
        var type = $(this).attr("data-type");
        var data = 'f=' + type;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                if (!$(".i_general_box_container")[0]) {
                    $("#" + type).append(response);
                    GetSlimScroll();
                } else {
                    $(".i_general_box_container").remove();
                }
                if ($("div").hasClass("stickersContainer") || $("div").hasClass("emojiBoxC") || $("div").hasClass("emojiBox") || $("div").hasClass("i_general_box_message_notifications_container") || $("div").hasClass("i_general_box_notifications_container")) {
                    $(".stickersContainer , .emojiBox , .emojiBoxC ,  .i_general_box_message_notifications_container , .i_general_box_notifications_container").remove();
                }
            }
        });
    });
    $(document).on("click", ".getEmojis", function() {
        var type = 'emoji';
        var ID = $(this).attr("data-type");
        var dataID = '';
        var data = 'f=' + type + '&id=' + ID + '&ec=' + dataID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                if (!$(".emojiBox")[0]) {
                    $(".i_pb_emojis").append(response);
                    GetSlimScroll();
                } else {
                    $(".emojiBox").remove();
                }
                if ($("div").hasClass("stickersContainer") || $("div").hasClass("emojiBoxC") || $("div").hasClass("i_general_box_container") || $("div").hasClass("i_general_box_message_notifications_container") || $("div").hasClass("i_general_box_notifications_container")) {
                    $(".stickersContainer , .emojiBoxC , .i_general_box_message_notifications_container , .i_general_box_notifications_container , .i_general_box_container").remove();
                }
            }
        });
    });
    $(document).on("click", ".getEmojisC", function() {
        var type = 'emoji';
        var ID = $(this).attr("data-type");
        var dataID = $(this).attr("data-id");
        var data = 'f=' + type + '&id=' + ID + '&ec=' + dataID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                if (!$(".emojiBoxC")[0]) {
                    $(".getEmojisC" + dataID).append(response);
                    GetSlimScroll();
                } else {
                    $(".emojiBoxC").remove();
                }
                if ($("div").hasClass("stickersContainer") || $("div").hasClass("emojiBox") || $("div").hasClass("i_general_box_container") || $("div").hasClass("i_general_box_message_notifications_container") || $("div").hasClass("i_general_box_notifications_container")) {
                    $(".i_general_box_message_notifications_container , .i_general_box_notifications_container , .i_general_box_container").remove();
                }
            }
        });
    });
    $(document).on("click", ".topMessages", function() {
        var type = $(this).attr("data-type");
        var data = 'f=' + type;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                if (!$(".i_general_box_message_notifications_container")[0]) {
                    $("#" + type).append(response);
                    $(".msg_not").hide();
                    $(".sum_m").attr("data-id", 0);
                    GetSlimScroll();
                } else {
                    $(".i_general_box_message_notifications_container").remove();
                }
                if ($("div").hasClass("stickersContainer") || $("div").hasClass("emojiBoxC") || $("div").hasClass("emojiBox") || $("div").hasClass("i_general_box_container") || $("div").hasClass("i_general_box_notifications_container")) {
                    $(".stickersContainer , .emojiBox , .emojiBoxC , .i_general_box_container , .i_general_box_notifications_container").remove();
                }
            }
        });
    });
    $(document).on("click", ".topPoints", function() {
        var type = $(this).attr("data-type");
        var data = 'f=' + type;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                if (!$(".i_general_box_container")[0]) {
                    $("#" + type).append(response);
                } else {
                    $(".i_general_box_container").remove();
                }
                if ($("div").hasClass("stickersContainer") || $("div").hasClass("emojiBoxC") || $("div").hasClass("emojiBox") || $("div").hasClass("i_general_box_container") || $("div").hasClass("i_general_box_notifications_container")) {
                    $(".stickersContainer , .emojiBox , .emojiBoxC , .i_general_box_notifications_container , .i_general_box_message_notifications_container").remove();
                }
            }
        });
    });
    $(document).on("click", ".topNotifications", function() {
        var type = $(this).attr("data-type");
        var data = 'f=' + type;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                if (!$(".i_general_box_notifications_container")[0]) {
                    $("#" + type).append(response);
                    if ($(".i_notifications_count")[0]) {
                        $(".not_not").hide();
                    }
                    GetSlimScroll();
                } else {
                    $(".i_general_box_notifications_container").remove();
                }
                if ($("div").hasClass("stickersContainer") || $("div").hasClass("emojiBoxC") || $("div").hasClass("emojiBox") || $("div").hasClass("i_general_box_container") || $("div").hasClass("i_general_box_message_notifications_container")) {
                    $(".stickersContainer , .emojiBox , .emojiBoxC , .i_general_box_container , .i_general_box_message_notifications_container").remove();
                }
            }
        });
    });
    /*Get Stickers*/
    $(document).on("click", ".getStickers", function() {
        var type = 'stickers';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                if (!$(".stickersContainer")[0]) {
                    $(".getStickers" + ID).append(response);
                } else {
                    $(".stickersContainer").remove();
                }
                if ($("div").hasClass("emojiBox") || $("div").hasClass("emojiBoxC") || $("div").hasClass("i_general_box_container") || $("div").hasClass("i_general_box_message_notifications_container") || $("div").hasClass("i_general_box_notifications_container")) {
                    $(".emojiBoxC , .emojiBox , .i_general_box_message_notifications_container , .i_general_box_notifications_container , .i_general_box_container").remove();
                }
            }
        });
    });
    /*Get Stickers*/
    $(document).on("click", ".getGifs", function() {
        var type = 'gifList';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                if (!$(".stickersContainer")[0]) {
                    $(".getStickers" + ID).append(response);
                } else {
                    $(".stickersContainer").remove();
                }
                if ($("div").hasClass("emojiBox") || $("div").hasClass("emojiBoxC") || $("div").hasClass("i_general_box_container") || $("div").hasClass("i_general_box_message_notifications_container") || $("div").hasClass("i_general_box_notifications_container")) {
                    $(".emojiBoxC , .emojiBox , .i_general_box_message_notifications_container , .i_general_box_notifications_container , .i_general_box_container").remove();
                }
            }
        });
    });
    $(document).on("click", ".g_feed", function() {
        var get = $(this).attr("data-get"); /*Get Request*/
        var type = $(this).attr("data-type"); /*Get for Feed*/
        var data = 'f=' + get;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {
                $("#moreType").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                if (response != '404') {
                    $("#moreType").attr("data-type", type);
                    $("#moreType").html('').append(response);
                    $(".mobile_left").removeClass("leftStickyActive");
                    $(".is_mobile").removeClass("svg_active_icon");
                }
            }
        });
    });
    /*********
    SCROLL TO LOAD MORE
    ***********/
    var scrollLoad = true;
    $(document).on('touchmove', showMoreData); /*For mobile*/
    $(window).on('scroll', showMoreData);
    //showMoreData(); 
    function showMoreData() {
        if (scrollLoad && $(window).scrollTop() >= $(document).height() - $(window).height() - 500) {
            var moreType = $("#moreType").attr("data-type");
            var profileUserID = '';
            if (moreType == 'notifications') { var ID = $('#moreType').children('.mor').last().attr('data-last'); }
            if (moreType == 'moreposts' || moreType == 'savedpost' || moreType == 'moreexplore' || moreType == 'morepremium' || moreType == 'friends') { var ID = $('#moreType').children('.i_post_body').last().attr('data-last'); }
            if (moreType == 'profile') { var ID = $('#moreType').children('.i_post_body').last().attr('data-last'); var profileUserID = $("#prw").attr("data-u"); }
            if (moreType == 'creators') { var ID = $('#moreType').children('.mor').last().attr('data-last'); var profileUserID = $("#moreType").attr("data-r"); }
            if (moreType == 'paid' || moreType == 'free') { var ID = $('#moreType').children('.mor').last().attr('data-last'); }
            if (moreType == 'hashtag') { var ID = $('#moreType').children('.i_post_body').last().attr('data-last'); var profileUserID = $("#moreType").attr("data-hash"); }
            if ($('.i_loading , .nomore , .noPost , .no_creator_f_wrap').length === 0 && !$(".i_loading , .nomore , .noPost , .no_creator_f_wrap")[0] && moreType != undefined) {
                var data = 'f=' + moreType + '&last=' + ID + '&p=' + profileUserID;
                $.ajax({
                    type: "POST",
                    url: siteurl + 'requests/request.php',
                    data: data,
                    cache: false,
                    beforeSend: function() {
                        $(".body_" + ID).after(preLoadingAnimation);
                        scrollLoad = false;
                    },
                    success: function(response) {
                        if (response && !$(".nomore")[0]) {
                            $("#moreType").append(response);
                            scrollLoad = true;
                        } else {
                            /*scrollLoad = false;*/
                        }
                        setTimeout(() => {
                            $(".i_loading").remove();
                        }, 1000);
                    }
                });
            } else {
                /*scrollLoad = false;*/
            }
        }
    }

    /*Update Who Can See POST Before Share Post*/
    $(document).on("click", ".wsUpdate", function() {
        var type = 'whoSee';
        var ID = $(this).attr("data-id");
        var data = 'f=' + type + '&who=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                $(".i_whoseech_menu_item_out").removeClass("wselected");
                if (response) {
                    $("#wsUpdate" + ID).addClass("wselected");
                    $(".wBox").html('').append(response);
                    $(".i_choose_ws_wrapper").removeClass('dblock');
                }
                if (ID == '4' && $("div[class='point_input_wrapper']").length === 0) {
                    whoSeePremium();
                } else {
                    $(".point_input_wrapper").remove();
                }
            }
        });
    });

    function whoSeePremium() {
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: 'f=pw_premium',
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response) {
                    $(".aft").after(response);;
                }
            }
        });
    }
    /*Get PopUp for Post Updating WhoCanSee*/
    $(document).on("click", ".wcs", function() {
        var type = 'wcs';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response) {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_modal_bg_in").addClass('i_modal_display_in');
                    }, 200);
                }
            }
        });
    });
    /*Update WhoCanSee Status for Shared Post*/
    $(document).on("click", ".who_can_see_pop_item", function() {
        var type = 'uwcs';
        var ID = $(this).attr("id");
        var wcs = $(this).attr("data-id");
        var data = 'f=' + type + '&id=' + ID + '&wci=' + wcs;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    $("#ipublic_" + ID).html('').append(response);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
                $(".i_modal_in_in").addClass("i_modal_in_in_out");
                setTimeout(() => {
                    $(".i_modal_bg_in").remove();
                }, 100);
            }
        });
    });
    /*Call Edit Post PoUpbox*/
    $(document).on("click", ".edtp", function() {
        var type = 'c_editPost';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_modal_bg_in").addClass('i_modal_display_in');
                    }, 200);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Call Delete Post PopUpBox*/
    $(document).on("click", ".delp", function() {
        var type = 'ddelPost';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_modal_bg_in").addClass('i_modal_display_in');
                    }, 200);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Save Post Edit*/
    $(document).on("click", ".sedt", function() {
        var type = 'editS';
        var ID = $(this).attr('id');
        var editText = $("#ed_" + ID).val();
        var data = 'f=' + type + '&id=' + ID + '&text=' + encodeURIComponent(editText);
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                var responseStatus = response.status;
                var editedText = response.text;
                if (responseStatus == 'no') {
                    PopUPAlerts('eCouldNotEmpty', 'ialert');
                } else if (responseStatus == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                } else if (responseStatus == '200') {
                    $("#i_post_container_" + ID).show();
                    $("#i_post_text_" + ID).html(editedText);
                    $(".i_modal_in_in").addClass("i_modal_in_in_out");
                    setTimeout(() => {
                        $(".i_modal_bg_in").remove();
                    }, 100);
                }
            }
        });
    });
    /*Uploading Music, Video and Image*/
    $(document).on("change", "#i_image_video", function(e) {
        e.preventDefault();
        var values = $("#uploadVal").val();
        var id = $("#i_image_video").attr("data-id");
        var data = { f: id };
        $("#uploadform").ajaxForm({
            type: "POST",
            data: data,
            delegation: true,
            cache: false,
            beforeSubmit: function() {
                $(".i_warning_unsupported").hide();
                $(".i_uploaded_iv").show();
                $('.i_uploaded_iv').append('<div class="i_upload_progress"></div>');
            },
            uploadProgress: function(e, position, total, percentageComplete) {
                $('.i_upload_progress').width(percentageComplete + '%');
                /*$('.i_upload_progress').html(percentageComplete + '%');*/
            },
            success: function(response) {
                if (response != '303') {
                    $(".i_uploaded_file_box").append(response);
                    var K = $('.i_uploaded_item').map(function() { return this.id }).toArray();
                    var T = K + "," + values;
                    if (T != "undefined,") {
                        $("#uploadVal").val(T);
                    }
                    if ($(".video")[0]) {
                        //alert("video var");
                    }
                } else {
                    $(".i_uploaded_iv").hide();
                    $(".i_warning_unsupported").show();
                }
                $(".i_upload_progress").remove();
            },
            error: function() {}
        }).submit();
    });
    /*Delete Uploaded File Before Publish*/
    $(document).on("click", ".i_delete_item_button", function() {
        var type = 'delete_file';
        var ID = $(this).attr('id');
        var input = $('#uploadVal');
        var data = 'f=' + type + '&file=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                if (response != '404') {
                    $(".iu_f_" + ID).remove();
                    input.val(function(_, value) {
                        return value.split(',').filter(function(val) {
                            return val !== ID;
                        }).join(',');
                    });
                } else {
                    PopUPAlerts('not_file', 'ialert')
                }
                if (!$(".i_uploaded_item")[0]) {
                    $(".i_uploaded_iv").hide();
                }
            }
        });
    });
    /*Save New Post*/
    $(document).on("click", ".publish", function() {
        var text = $("#newPostT").val();
        var files = $("#uploadVal").val();
        var point = $("#point").val();
        var type = 'newPost';
        var data = 'f=' + type + '&txt=' + encodeURIComponent(text) + '&file=' + files + '&point=' + point;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {
                $('.publish').prop('disabled', true);
                $(".publish").css("pointer-events", "none");
                $(".i_warning_point , .i_warning , .i_warning_prmfl").fadeOut(100);
            },
            success: function(response) {
                $('.publish').prop('disabled', false);
                $(".publish").css("pointer-events", "auto");
                if ($("div").hasClass("noPost")) {
                    $(".noPost").remove();
                }
                if (response == '200') {
                    $(".i_warning").fadeIn();
                } else if (response == '201') {
                    $(".i_warning_point").fadeIn();
                } else if (response == '202') {
                    $(".i_warning_prmfl").fadeIn();
                } else {
                    $(".i_uploaded_file_box").html('');
                    $(".i_uploaded_iv").hide();
                    $("#moreType").prepend(response);
                    $(".newPostT").val('').trigger('change');
                    $("#uploadVal").val('');
                    $("#point").val('');
                }
            }
        });
    });
    /*Like Post*/
    $(document).on("click", ".in_like , .in_unlike", function() {
        var type = 'p_like';
        var ID = $(this).attr('data-id');
        var data = 'f=' + type + '&post=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
                $('.in_like , .in_unlike').prop('disabled', true);
            },
            success: function(response) {
                var status = response.status;
                var statusIcon = response.like;
                var liksCount = response.likeCount;
                if (status == 'in_unlike') {
                    $("#p_l_" + ID).removeClass("in_like").addClass("in_unlike");
                    $("#lp_sum_" + ID).html(liksCount);
                } else {
                    $("#p_l_" + ID).removeClass("in_unlike").addClass("in_like");
                    $("#lp_sum_" + ID).html(liksCount);
                }
                $("#p_l_" + ID).html(statusIcon);
                $('.in_like , .in_unlike').prop('disabled', false);
            }
        });
    });
    /*Call Post for Share*/
    $(document).on("click", ".in_share", function() {
        var ID = $(this).attr("data-id");
        var type = 'p_share';
        if (!$(".i_bottom_left_alert_container")[0]) {
            var data = 'f=' + type + '&sp=' + ID;
            $.ajax({
                type: 'POST',
                url: siteurl + 'requests/request.php',
                data: data,
                cache: false,
                beforeSend: function() {
                    $('.in_share').prop('disabled', true);
                },
                success: function(response) {
                    if (response != '404') {
                        $("body").append(response);
                        setTimeout(() => {
                            $(".i_modal_bg_in").addClass('i_modal_display_in');
                            $(".more_textarea").focus();
                        }, 200);
                    } else if (response == '404') {
                        PopUPAlerts('not_Shared', 'ialert');
                    }
                    $('.in_share').prop('disabled', false);
                }
            });
        }
    });

    /*Call Post for pop up *added by nazar */
    $(document).on("click", ".i_thumbnail", function() {
        var ID = $(this).attr("data-id");
        var type = 'p_thumbnail';
        if (!$(".i_bottom_left_alert_container")[0]) {
            var data = 'f=' + type + '&sp=' + ID;
            $.ajax({
                type: 'POST',
                url: siteurl + 'requests/request.php',
                data: data,
                cache: false,
                beforeSend: function() {
                    $('.in_share').prop('disabled', true);
                },
                success: function(response) {
                    if (response != '404') {
                        $("body").append(response);
                        setTimeout(() => {
                            $(".i_modal_bg_in").addClass('i_modal_display_in');
                            $(".more_textarea").focus();
                        }, 200);
                    } else if (response == '404') {
                        PopUPAlerts('not_Shared', 'ialert');
                    }
                    $('.in_share').prop('disabled', false);
                }
            });
        }
    });

    function PopUPAlerts(ialert, type) {
        var data = 'f=' + type + '&al=' + ialert;
        if (!$(".i_bottom_left_alert_container")[0]) {
            $.ajax({
                type: 'POST',
                url: siteurl + 'requests/request.php',
                data: data,
                cache: false,
                beforeSend: function() {
                    /*Do Something*/
                },
                success: function(response) {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_bottom_left_alert_container").addClass('fadeOutDown');
                    }, 5000);
                    setTimeout(() => {
                        $(".i_bottom_left_alert_container").remove();
                    }, 5000);
                }
            });
        }
    }
    /*Save Re-Share Post*/
    $(document).on("click", ".re-share", function() {
        var ID = $(this).attr("id");
        var type = 'p_rshare';
        var postText = $(".more_textarea").val();
        var data = 'f=' + type + '&sp=' + ID + '&pt=' + encodeURIComponent(postText);
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                if (response == '200') {
                    $(".i_modal_in_in").addClass("i_modal_in_in_out");
                    setTimeout(() => {
                        $(".i_modal_bg_in").remove();
                    }, 100);
                } else {
                    PopUPAlerts('not_Shared', 'ialert');
                }
            }
        });
    });
    /*Delete Post From Database*/
    $(document).on("click", ".yes-del", function() {
        var type = 'deletePost';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                $(".i_modal_in_in").addClass("i_modal_in_in_out");
                setTimeout(() => {
                    $(".i_modal_bg_in").remove();
                }, 100);
                if (response == '200') {
                    $(".body_" + ID).fadeOut();
                    PopUPAlerts('delete_success', 'ialert');
                } else {
                    PopUPAlerts('delete_not_success', 'ialert');
                }
            }
        });
    });
    $(document).on("click", ".shareClose , .no-del , .popClose , .svAC", function() {
        $(".i_modal_in_in").addClass("i_modal_in_in_out");
        setTimeout(() => {
            $(".i_modal_bg_in").remove();
        }, 200);
    });
    /*Update Comment Status*/
    $(document).on("click", ".pcl", function() {
        var type = 'updateComentStatus';
        var ID = $(this).attr('data-id');
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                var status = response.status;
                var statusIcon = response.text;
                if (status) {
                    if (status == '200') {
                        PopUPAlerts('commentClosed', 'ialert');
                    } else {
                        PopUPAlerts('commentOpened', 'ialert');
                    }
                    $("#dc_" + ID).html(statusIcon);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Pin Post*/
    $(document).on("click", ".i_pnp", function() {
        var type = 'pinpost';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                var status = response.status;
                var statusIcon = response.text;
                var btns = response.btn;
                if (status) {
                    if (status == '200') {
                        PopUPAlerts('pined', 'ialert');
                        $(".body_" + ID).append(statusIcon);
                    } else {
                        PopUPAlerts('pinClosed', 'ialert');
                        $("#i_pined_post_" + ID).remove();
                    }
                    $(".pbtn_" + ID).html(btns);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Report Post*/
    $(document).on("click", ".rpp", function() {
        var type = 'reportPost';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                var status = response.status;
                var statusIcon = response.text;
                if (status) {
                    if (status == '200') {
                        $(".rpp" + ID).html(statusIcon);
                    } else if (status == '404') {
                        $(".rpp" + ID).html(statusIcon);
                    }
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Report Post*/
    $(document).on("click", ".svp", function() {
        var type = 'savePost';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                var status = response.status;
                var statusIcon = response.text;
                if (status) {
                    if (status == '200') {
                        $(".in_save_" + ID).html(statusIcon);
                        PopUPAlerts('sAdded', 'ialert');
                    } else if (status == '404') {
                        $(".in_save_" + ID).html(statusIcon);
                        PopUPAlerts('sRemoved', 'ialert');
                    }
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Click To Send Comment*/
    $(document).on("click", ".sndcom", function() {
        var type = 'comment';
        var ID = $(this).attr('id');
        var value = $("#comment" + ID).val();
        var stickerID = $("#stic_" + ID).val();
        var gif = $("#cgif_" + ID).val();
        Comment(ID, value, type, stickerID, gif);
    });
    $(document).on('keydown', ".nwComment", function(e) {
        var key = e.which || e.keyCode || 0;
        if (key == 13) {
            var type = 'comment';
            var ID = $(this).attr('data-id');
            var value = $("#comment" + ID).val();
            var stickerID = $("#stic_" + ID).val();
            var gif = $("#cgif_" + ID).val();
            Comment(ID, value, type, stickerID, gif);
        }
    });
    /*Send Gif Comment*/
    $(document).on("click", ".rGif", function() {
        var src = $(this).attr("src");
        var ID = $(this).attr("data-id");
        if ($("#comment" + ID).val() === '') {
            Comment(ID, '', 'comment', '', src);
        } else {
            $(".emptyGifArea" + ID).show();
            $(".srcGif" + ID).attr('src', src);
            $("#cgif_" + ID).val(src);
            $(".stickersContainer").remove();
        }
    });
    /*Add Sticker*/
    $(document).on("click", ".addSticker", function() {
        var type = 'addSticker';
        var ID = $(this).attr("id");
        var dataID = $(this).attr("data-id");
        var data = 'f=' + type + '&id=' + ID + '&pi=' + dataID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $(".emptyStickerArea" + dataID).html('');
            },
            success: function(response) {
                var sticker_url = response.stickerUrl;
                var stickerID = response.st_id;
                if (sticker_url) {
                    $(".stickersContainer").remove();
                    if ($("#comment" + dataID).val() === '') {
                        Comment(dataID, '', 'comment', stickerID);
                    } else {
                        $(".emptyStickerArea" + dataID).append(sticker_url);
                        $("#stic_" + dataID).val(stickerID);
                    }
                }
            }
        });
    });

    /*Comment*/
    function Comment(ID, value, type, sticker, gif) {
        var data = 'f=' + type + '&id=' + ID + '&val=' + encodeURIComponent(value) + '&sticker=' + sticker + '&gf=' + gif;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {},
            success: function(response) {
                if (response == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                    $("#i_user_comments_" + ID).append(response);
                    $(".nwComment").val('');
                    $(".stickersContainer").remove();
                    $(".emptyStickerArea" + ID).empty();
                    $("#stic_" + ID).val('');
                    $(".emptyGifArea" + ID).hide();
                    $(".srcGif" + ID).attr('src', '');
                    $("#cgif_" + ID).val('');
                } else {
                    $("#i_user_comments_" + ID).append(response);
                    $(".nwComment").val('');
                    $(".stickersContainer").remove();
                    $(".emptyStickerArea" + ID).empty();
                    $("#stic_" + ID).val('');
                    $(".emptyGifArea" + ID).hide();
                    $(".srcGif" + ID).attr('src', '');
                    $("#cgif_" + ID).val('');
                }
            }
        });
    }
    $(document).on("click", ".removeSticker", function() {
        var ID = $(this).attr('id');
        $(".emptyStickerArea" + ID).empty();
        $("#stic_" + ID).val('');
    });
    $(document).on("click", ".removeGif", function() {
        var ID = $(this).attr('id');
        $(".emptyGifArea" + ID).hide();
        $(".srcGif" + ID).attr('src', '');
        $("#cgif_" + ID).val('');
    });
    /*Like Post*/
    $(document).on("click", ".c_in_like , .c_in_unlike", function() {
        var type = 'pc_like';
        var ID = $(this).attr('data-id');
        var pID = $(this).attr("data-p");
        var data = 'f=' + type + '&post=' + pID + '&com=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                var status = response.status;
                var statusIcon = response.like;
                var statusTotalLike = response.totalLike;
                if (status == 'c_in_unlike') {
                    $(".c_in_l_" + ID).removeClass("c_in_like").addClass("c_in_unlike");
                } else {
                    $(".c_in_l_" + ID).removeClass("c_in_unlike").addClass("c_in_like");
                }
                $("#t_c_" + ID).html(statusTotalLike);
                $(".c_in_l_" + ID).html(statusIcon);
            }
        });
    });
    /*Call Delete Post PopUpBox*/
    $(document).on("click", ".delCm", function() {
        var type = 'ddelComment';
        var ID = $(this).attr("id");
        var postID = $(this).attr("data-id");
        var data = 'f=' + type + '&id=' + ID + '&pid=' + postID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_modal_bg_in").addClass('i_modal_display_in');
                    }, 200);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Delete Comment*/
    $(document).on("click", ".dlCm", function() {
        var type = 'deletecomment';
        var ID = $(this).attr("id");
        var postID = $(this).attr("data-id");
        var data = 'f=' + type + '&cid=' + ID + '&pid=' + postID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {},
            success: function(response) {
                if (response == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                } else {
                    $(".i_modal_in_in").addClass("i_modal_in_in_out");
                    setTimeout(() => {
                        $(".i_modal_bg_in").remove();
                    }, 100);
                    if (response == '200') {
                        $(".dlCm" + ID).fadeOut();
                        PopUPAlerts('delete_comment_success', 'ialert');
                    } else {
                        PopUPAlerts('delete_comment_not_success', 'ialert');
                    }
                }
            }
        });
    });
    /*Report Comment*/
    $(document).on("click", ".ccp", function() {
        var type = 'reportComment';
        var commentID = $(this).attr("id");
        var postID = $(this).attr("data-id");
        var data = 'f=' + type + '&id=' + commentID + '&pid=' + postID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                var status = response.status;
                var statusIcon = response.text;
                if (status) {
                    if (status == '200') {
                        $(".ccp" + commentID).html(statusIcon);
                    } else if (status == '404') {
                        $(".ccp" + commentID).html(statusIcon);
                    }
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Call Edit Comment PoUpbox*/
    $(document).on("click", ".cced", function() {
        var type = 'c_editComment';
        var commentID = $(this).attr("id");
        var postID = $(this).attr("data-id");
        var data = 'f=' + type + '&cid=' + commentID + '&pid=' + postID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_modal_bg_in").addClass('i_modal_display_in');
                    }, 200);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Save Comment Edit*/
    $(document).on("click", ".secdt", function() {
        var type = 'editSC';
        var commentID = $(this).attr('id');
        var postID = $(this).attr('data-id');
        var editText = $("#ed_" + commentID).val();
        var data = 'f=' + type + '&cid=' + commentID + '&pid=' + postID + '&text=' + encodeURIComponent(editText);
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                var responseStatus = response.status;
                var editedText = response.text;
                if (responseStatus == 'no') {
                    PopUPAlerts('eCouldNotEmpty', 'ialert');
                } else if (responseStatus == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                } else if (responseStatus == '200') {
                    $("#i_u_c_" + commentID).html(editedText);
                    $(".i_modal_in_in").addClass("i_modal_in_in_out");
                    setTimeout(() => {
                        $(".i_modal_bg_in").remove();
                    }, 100);
                }
            }
        });
    });
    /*Follow Profile PopUp Call*/
    $(document).on("click", ".free_follow", function() {
        var type = 'follow_free_not';
        var ID = $(this).attr("data-u");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    });

    /*Follow Profile Free*/
    $(document).on("click", ".f_p_follow", function() {
        var type = 'freeFollow';
        var ID = $(this).attr("data-u");
        var data = 'f=' + type + '&follow=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $(".i_modal_content").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                var responseStatus = response.status;
                var responseNot = response.text;
                var responseBtn = response.btn;
                if (responseStatus == '200') {
                    $(".i_fw" + ID).html(responseBtn);
                    if (responseNot == 'flw') {
                        $(".i_fw" + ID).removeClass("i_btn_like_item free_follow").addClass("i_btn_like_item_flw f_p_follow");
                        PopUPAlerts('youFollowing', 'ialert');
                    } else if (responseNot == 'unflw') {
                        $(".i_fw" + ID).removeClass("i_btn_like_item_flw f_p_follow").addClass("i_btn_like_item free_follow");
                        PopUPAlerts('youUnfollowing', 'ialert');
                    }
                }
                $(".i_modal_in_in").addClass("i_modal_in_in_out");
                setTimeout(() => {
                    $(".i_modal_bg_in").remove();
                }, 100);
                $(".loaderWrapper").remove();
            }
        });
    });
    /*Block Not PopUp Call*/
    $(document).on("click", ".ublknot", function() {
        var type = 'uBlockNotice';
        var ID = $(this).attr("data-u");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    });
    /*Choose Block TYPE*/
    $(document).on("click", ".i_redtrict_u", function() {
        var ID = $(this).attr("data-s");
        $(".block_a_status").removeClass("blockboxActive").addClass("blockboxPassive");
        $("#bl_s_" + ID).addClass("blockboxActive");
        $(".ublk").attr('data-bt', ID);
    });
    /*Block User*/
    $(document).on("click", ".ublk", function() {
        var type = 'ublock';
        var ID = $(this).attr("id");
        var blockType = $(this).attr("data-bt");
        var data = 'f=' + type + '&id=' + ID + '&blckt=' + blockType;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                var responseStatus = response.status;
                var responseRedirect = response.redirect;
                if (responseStatus == '200') {
                    window.location.href = responseRedirect;
                } else if (responseStatus == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                }

            }
        });
    });
    /*Block Not PopUp Call*/
    $(document).on("click", ".uSubsModal", function() {
        var type = 'subsModal';
        var ID = $(this).attr("data-u");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    });
    /*Credit Card Form Call*/
    $(document).on("click", ".bcmSubs", function() {
        var type = 'creditCard';
        var ID = $(this).attr("data-u");
        var subscribing = $(this).attr("id");
        var data = 'f=' + type + '&plan=' + subscribing + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    });
    /*Upload Verification Files*/
    $(document).on("change", "#id_card_two, #id_card", function(e) {
        e.preventDefault();
        var values = $("#uploadVal").val();
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var data = { f: id, c: type };
        $("#vUploadForm").ajaxForm({
            type: "POST",
            data: data,
            delegation: true,
            cache: false,
            beforeSubmit: function() {
                $(".f_" + type).html('');
                $("#uploadVal_" + type).val('');
                $("#" + type).append('<div class="i_upload_progress"></div>');
            },
            uploadProgress: function(e, position, total, percentageComplete) {
                $('.i_upload_progress').width(percentageComplete + '%');
            },
            success: function(response) {
                if (response) {
                    $(".f_" + type).append(response);
                    var K = $(".f_" + type + " > div:last").attr("id");
                    var T = K;
                    if (T != "undefined,") {
                        $("#uploadVal_" + type).val(T);
                    }
                    $("#id_card , #id_card_two").val('');
                }
                $(".i_upload_progress").remove();
            },
            error: function() {}
        }).submit();
    });
    /*Send Verification Certificate Request*/
    $(document).on("click", ".v_Next", function() {
        var type = 'verificationRequest';
        var IDCard = $("#uploadVal_sec_one").val();
        var IDPhoto = $("#uploadVal_sec_two").val();
        var data = 'f=' + type + '&cID=' + IDCard + '&cP=' + IDPhoto;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".i_nex_btn").css("pointer-events", "none");
                $(".card , .both , .photo").hide();
            },
            success: function(response) {
                if (response == '200') {
                    location.reload();
                } else if (response == 'card') {
                    $("#id_card , #id_card_two").val('');
                    $(".card").show();
                } else if (response == 'photo') {
                    $("#id_card , #id_card_two").val('');
                    $(".photo").show();
                } else if (response == 'both') {
                    $("#id_card , #id_card_two").val('');
                    $(".both").show();
                }
                $(".i_nex_btn").css("pointer-events", "auto");
            }
        });
    });
    /*Call Avatar And Cover PopUP*/
    $(document).on("click", ".editAvatarCover", function() {
        var type = 'updateAvatarCover';
        var data = 'f=' + type;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    });


    $(document).on('submit', "#myEmailForm", function(e) {
        e.preventDefault();
        var myEmailForm = $(this);
        if ($("#cPass").val().length == 0) {
            $(".warning_required").show();
            return false;
        }
        jQuery.ajax({
            type: "POST",
            url: siteurl + "requests/request.php",
            data: myEmailForm.serialize(),
            beforeSend: function() {
                $(".warning_inuse , .warning_invalid , .warning_wrong_password , .warning_required , .warning_same_email").hide();
                $(".i_become_creator_box_footer").append(plreLoadingAnimationPlus);
                myEmailForm.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    myEmailForm.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '404') {
                    $(".warning_inuse").show();
                } else if (data == 'no') {
                    $(".warning_invalid").show();
                } else if (data == 'same') {
                    $(".warning_same_email").show();
                } else if (data == '200') {
                    $(".successNot").show();
                }
                $(".loaderWrapper").remove();
            }
        });
    });

    $(document).on('submit', "#myProfileForm", function(e) {
        e.preventDefault();
        var myProfileForm = $(this);
        jQuery.ajax({
            type: "POST",
            url: siteurl + "requests/request.php",
            data: myProfileForm.serialize(),
            beforeSend: function() {
                $(".invalid_username , .character_warning , .warning_username").hide();
                $(".i_become_creator_box_footer").append(plreLoadingAnimationPlus);
                myProfileForm.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    myProfileForm.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '1') {
                    $(".successNot").show();
                }
                $(".loaderWrapper").remove();
            }
        });
    });
    $(document).on("click", ".pyot_sNext", function() {
        var type = 'updatePayoutSet';
        var defaultMethod = $('input[name=default]:checked', '#bankForm').val();
        var paypalEmail = $("#paypale").val();
        var repaypalEmail = $("#paypalere").val();
        var bankAccount = $("#bank_transfer").val();
        if (defaultMethod == 'paypal') {
            if (paypalEmail.length == 0) {
                $("#setWarning").show();
                return false;
            } else {
                $("#setWarning").hide();
            }
            if (repaypalEmail.length == 0) {
                $("#setWarning").show();
                return false;
            } else {
                $("#setWarning").hide();
            }
            if (paypalEmail != repaypalEmail) {
                $("#notMatch").show();
                return false;
            } else {
                $("#notMatch").hide();
            }
        }
        if (defaultMethod == 'bank') {
            if (bankAccount.length == 0) {
                $("#setBankWarning").show();
                return false;
            } else {
                $("#setBankWarning").hide();
            }
        }
        var data = 'f=' + type + '&paypalEmail=' + encodeURIComponent(paypalEmail) + '&paypalReEmail=' + encodeURIComponent(repaypalEmail) + '&bank=' + bankAccount + '&method=' + defaultMethod;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".i_nex_btn").css("pointer-events", "none");
                $(".i_become_creator_box_footer").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                if (response != '200') {
                    if (response == 'email_warning') {
                        $("#notMatch").show();
                    } else if (response == 'paypal_warning') {
                        $("#setWarning").show();
                    } else if (response == 'bank_warning') {
                        $("#setBankWarning").show();
                    } else if (response == 'not_valid_email') {
                        $("#notValidE").show();
                    }
                }
                setTimeout(() => {
                    $(".successNot").show();
                    $(".loaderWrapper").remove();
                    $(".i_nex_btn").css("pointer-events", "auto");
                }, 3000);
            }
        });
    });
    $(document).on("click", ".c_uNext", function() {
        var type = 'updateSubscriptionPayments';
        var weekly = $("#spweek").val();
        var monthly = $("#spmonth").val();
        var yearly = $("#spyear").val();
        var weeklyStatus = $('input[name="weekly"]').prop("checked") ? 1 : 0;
        var monthlyStatus = $('input[name="monthly"]').prop("checked") ? 1 : 0;
        var yearlyStatus = $('input[name="yearly"]').prop("checked") ? 1 : 0;
        if (weeklyStatus == 1) {
            if (weekly.length == 0) {
                $("#wweekly").show();
                return false;
            } else {
                $("#wweekly").hide();
            }
        }
        if (monthlyStatus == 1) {
            if (monthly.length == 0) {
                $("#wmonthly").show();
                return false;
            } else {
                $("#wmonthly").hide();
            }
        }
        if (yearlyStatus == 1) {
            if (yearly.length == 0) {
                $("#wyearly").show();
                return false;
            } else {
                $("#wyearly").hide();
            }
        }
        var data = 'f=' + type + '&wSubWeekAmount=' + weekly + '&mSubMonthAmount=' + monthly + '&mSubYearAmount=' + yearly + '&wStatus=' + weeklyStatus + '&mStatus=' + monthlyStatus + '&yStatus=' + yearlyStatus;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $(".i_nex_btn").css("pointer-events", "none");
                $("#wweekly , #wmonthly , #wyearly , .weekly_success, .monthly_success, .yearly_success").hide();
                $(".i_become_creator_box_footer").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                var weekly = response.weekly;
                var monthly = response.monthly;
                var yearly = response.yearly;

                if (weekly == '404') {
                    $("#wweekly").show();
                } else if (weekly == '200') {
                    $(".weekly_success").show();
                }
                if (monthly == '404') {
                    $("#wmonthly").show();
                } else if (monthly == '200') {
                    $(".monthly_success").show();
                }
                if (yearly == '404') {
                    $("#wyearly").show();
                } else if (yearly == '200') {
                    $(".yearly_success").show();
                }
                $(".loaderWrapper").remove();
                $(".i_nex_btn").css("pointer-events", "auto");
            }
        });
    });
    $(document).on("click", ".mwithdraw", function() {
        var type = 'makewithDraw';
        var amount = $("#wamount").val();
        if (amount.length == 0) {
            $("#mwithdrawal").show();
            return false;
        } else {
            $("#mwithdrawal").hide();
        }
        var data = 'f=' + type + '&amount=' + amount;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".i_nex_btn_btn").css("pointer-events", "none");
                $(".i_t_warning").hide();
                $(".i_become_creator_box_footer").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                if (response == '1') {
                    $(".successNot").show();
                } else if (response == '2') {
                    $("#mwithdrawal").show();
                } else if (response == '3') {
                    $("#nbudget").show();
                } else if (response == '4') {
                    $("#nnoway").show();
                } else if (response == '5') {
                    $("#nwaitpending").show();
                }
                $(".loaderWrapper").remove();
                $(".i_nex_btn_btn").css("pointer-events", "auto");
            }
        });
    });
    /*Credit Card Form Call*/
    $(document).on("click", ".prcsPost", function() {
        var type = 'pPurchase';
        var post = $(this).attr("id");
        var data = 'f=' + type + '&purchase=' + post;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    });
    $(document).on("click", ".prchase_go_wallet", function() {
        var type = 'goWallet';
        var post = $(this).attr("id");
        var data = 'f=' + type + '&p=' + post;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                window.location.href = response;
            }
        });
    });
    $(document).on("click", ".buyPoint", function() {
        var type = 'choosePaymentMethod';
        var pointID = $(this).attr("id");
        var data = 'f=' + type + '&type=' + pointID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".credit_plan_box").css("pointer-events", "none");
                $("#p_i_" + pointID).append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
                $(".loaderWrapper").remove();
                $(".credit_plan_box").css("pointer-events", "auto");
            }
        });
    });
    $(document).on("click", ".mcSt", function() {
        if ($(".cSetc")[0]) {
            $(".cSetc").removeClass("dblock");
        }
        $(".cSetc").addClass("dblock");
    });
    /*Get Gifs*/
    $(document).on("click", ".getmGifs", function() {
        var type = 'chat_gifs';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        if (!$("div").hasClass("Message_stickersContainer")) {
            $.ajax({
                type: 'POST',
                url: siteurl + 'requests/request.php',
                data: data,
                beforeSend: function() {
                    $(".getmGifs").css("pointer-events", "none");
                    $(".nanos").append('<div class="preLoadC">' + plreLoadingAnimationPlus + '</div>');
                },
                success: function(response) {
                    $(".nanos").append(response);
                    $(".preLoadC").remove();
                    $(".getmGifs").css("pointer-events", "auto");
                }
            });
        } else {
            $(".Message_stickersContainer").remove();
        }
    });
    /*Get Gifs*/
    $(document).on("click", ".getmStickers", function() {
        var type = 'chat_stickers';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        if (!$("div").hasClass("Message_stickersContainer")) {
            $.ajax({
                type: 'POST',
                url: siteurl + 'requests/request.php',
                data: data,
                beforeSend: function() {
                    $(".getmGifs").css("pointer-events", "none");
                    $(".nanos").append('<div class="preLoadC">' + plreLoadingAnimationPlus + '</div>');
                },
                success: function(response) {
                    $(".nanos").append(response);
                    $(".preLoadC").remove();
                    $(".getmGifs").css("pointer-events", "auto");
                }
            });
        } else {
            $(".Message_stickersContainer").remove();
        }
    });
    $(document).on("click", ".getMEmojis", function() {
        var type = 'memoji';
        var ID = $(this).attr("data-type");
        var data = 'f=' + type + '&id=' + ID;
        if (!$("div").hasClass("Message_stickersContainer")) {
            $.ajax({
                type: 'POST',
                url: siteurl + 'requests/request.php',
                data: data,
                beforeSend: function() {
                    $(".getMEmojis").css("pointer-events", "none");
                    $(".nanos").append('<div class="preLoadC">' + plreLoadingAnimationPlus + '</div>');
                },
                success: function(response) {
                    $(".nanos").append(response);
                    $(".preLoadC").remove();
                    $(".getMEmojis").css("pointer-events", "auto");
                }
            });
        } else {
            $(".Message_stickersContainer").remove();
        }
    });
    /*Get Gifs*/
    $(document).on("click", ".chtBtns", function() {
        var type = 'chat_btns';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        if (!$("div").hasClass("ch_fl_btns_container")) {
            $.ajax({
                type: 'POST',
                url: siteurl + 'requests/request.php',
                data: data,
                beforeSend: function() {
                    $(".chtBtns").css("pointer-events", "none");
                },
                success: function(response) {
                    $(".chtBtns").css("pointer-events", "auto");
                    $(".fl_btns").append(response);
                }
            });
        }
    });

    function ScrollBottomChat() {
        if ($("div").hasClass("all_messages")) {
            $(".all_messages").stop().animate({ scrollTop: $(".all_messages")[0].scrollHeight }, 100);
        }
    }
    ScrollBottomChat();
    $(document).on('keydown', ".mSize", function(e) {
        var key = e.which || e.keyCode || 0;
        if (key == 13) {
            var type = 'nmessage';
            var ID = $(".message_send_form_wrapper").attr("id");
            var value = $(this).val();
            var gf = '';
            var st = '';
            Message(ID, value, type, gf, st, '');
        }
    });
    /*Add Sticker*/
    $(document).on("click", ".MaddSticker", function() {
        var type = 'message_sticker';
        var ID = $(this).attr("id");
        var dataID = $(this).attr("data-id");
        var data = 'f=' + type + '&id=' + ID + '&pi=' + dataID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $(".Message_stickersContainer").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                var stickerID = response.st_id;
                if (stickerID) {
                    $(".Message_stickersContainer").remove();
                    Message(dataID, '', 'nmessage', stickerID, '', '');
                    $(".loaderWrapper").remove();
                }
            }
        });
    });
    /*Send Gif Message*/
    $(document).on("click", ".mrGif", function() {
        var src = $(this).attr("src");
        var ID = $(this).attr("data-id");
        Message(ID, '', 'nmessage', '', src, '');
        $(".Message_stickersContainer").remove();
    });

    $(document).on("click", ".emoji_item_m", function() {
        var copyEmoji = $(this).attr("data-emoji");
        var getValue = $(".mSize").val();
        $(".mSize").val(getValue + ' ' + copyEmoji + ' ');
    });
    /*Comment*/
    function Message(ID, value, type, stickerID, gfSrc, file) {
        var data = 'f=' + type + '&id=' + ID + '&val=' + encodeURIComponent(value) + '&sticker=' + stickerID + '&gif=' + gfSrc + '&fl=' + file;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".Message_stickersContainer").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                if (response == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                } else {
                    $(".all_messages_container").append(response);
                    ScrollBottomChat();
                }
                $(".mSize").val('');
                $(".Message_stickersContainer").remove();
                $(".loaderWrapper").remove();
            }
        });
    }
    $(document).on("click", ".sendmes", function() {
        var value = $(".mSize").val();
        var ID = $(".message_send_form_wrapper").attr("id");
        Message(ID, value, 'nmessage', '', '', '');
    });
    /*Uploading Message Image*/
    $(document).on("change", "#ci_image", function(e) {
        e.preventDefault();
        var values = $("#uploadVal").val();
        var id = $("#ci_image").attr("data-id");
        var ID = $(".message_send_form_wrapper").attr("id");
        var data = { f: id, c: ID };
        $("#uploadform").ajaxForm({
            type: "POST",
            data: data,
            delegation: true,
            cache: false,
            beforeSubmit: function() {
                $(".ch_fl_btns_container").remove();
                $('.message_send_form_wrapper').append('<div class="i_upload_progress"></div>');
            },
            uploadProgress: function(e, position, total, percentageComplete) {
                $('.i_upload_progress').width(percentageComplete + '%');
            },
            success: function(response) {
                if (response) {
                    $(".i_uploaded_iv").show();
                    if (response) {
                        Message(ID, '', 'nmessage', '', '', response);
                    }
                }
                $(".i_upload_progress").remove();
            },
            error: function() {}
        }).submit();
    });
    /*Get More Comment*/
    $(document).on("click", ".more_comment", function() {
        var type = 'moreComment';
        var ID = $(this).attr("data-id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $("#pf_l_" + ID).append(preLoadingAnimation);
                $(".comnts").css("pointer-events", "none");
            },
            success: function(response) {
                if (response == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                } else {
                    $("#i_user_comments_" + ID).html(response);
                    $(".lc_sum_container_" + ID).remove();
                }
                $(".comnts").css("pointer-events", "auto");
                $(".i_loading").remove();
            }
        });
    });
    $(document).on("click", ".chooseLanguage", function() {
        var type = 'chooseLanguage';
        var data = 'f=' + type;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".chooseLanguage").css("pointer-events", "none");
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
                $(".chooseLanguage").css("pointer-events", "auto");
            }
        });
    });
    /*Change Language*/
    $(document).on("click", ".chLang", function() {
        var type = 'changeMyLang';
        var id = $(this).attr("id");
        var data = 'f=' + type + '&id=' + id;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".chLang").css("pointer-events", "none");
                $(".purchase_post_details").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
                $(".chLang").css("pointer-events", "auto");
                if (response == '200') {
                    location.reload();
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                    $(".i_modal_in_in").addClass("i_modal_in_in_out");
                    setTimeout(() => {
                        $(".i_modal_bg_in").remove();
                    }, 200);
                }

            }
        });
    });
    /*Search Creator*/
    $(document).delegate('#search_creator', 'keyup', function() {
        var searchValue = $(this).val();
        var type = 'searchCreator';
        var sum = searchValue.replace(/\s+/g, '').length;
        if (sum >= 1) {
            $(".i_general_box_search_container").show();
            setTimeout(() => {
                var data = 'f=' + type + '&s=' + encodeURIComponent(searchValue);
                /**********/
                $.ajax({
                    type: "POST",
                    url: siteurl + 'requests/request.php',
                    data: data,
                    cache: false,
                    beforeSend: function() {
                        $(".sb_items").append(plreLoadingAnimationPlus);
                    },
                    success: function(response) {
                        $(".sb_items").html(response);
                    }
                });
                /**********/
            }, 1000);
        } else {
            $(".i_general_box_search_container").hide();
        }
    });
    $(document).on("mouseup", function(e) {
        var container = $(".i_general_box_search_container");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
            $(".sb_items").html('');
        }
    });
    $(document).on("click", ".newMessageMe", function() {
        var type = 'newMessageMe';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&user=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".newMessageMe").css("pointer-events", "none");
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
                $(".newMessageMe").css("pointer-events", "auto");
            }
        });
    });
    /*Send New Message*/
    $(document).on("click", ".sndNewMessage", function() {
        var type = 'newfirstMessage';
        var value = $("#sendNewM").val();
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&fm=' + encodeURIComponent(value) + '&u=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".sndNewMessage").css("pointer-events", "none");
            },
            success: function(response) {
                if (response != '404') {
                    window.location.href = response;
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
                $(".i_modal_in_in").addClass("i_modal_in_in_out");
                setTimeout(() => {
                    $(".i_modal_bg_in").remove();
                }, 200);
            }
        });
    });
    /*Update Theme*/
    $(document).on("click", ".updateTheme", function() {
        var type = 'updateTheme';
        var theme = $(this).attr("data-id");
        var data = 'f=' + type + '&theme=' + theme;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".sndNewMessage").css("pointer-events", "none");
            },
            success: function(response) {
                if (response != '404') {
                    location.reload();
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    $(document).on("click", ".mobile_hamburger", function() {
        if (!$(".leftStickyActive")[0]) {
            $(".mobile_left").addClass("leftStickyActive");
            $(".is_mobile").addClass("svg_active_icon");
        } else {
            $(".mobile_left").removeClass("leftStickyActive");
            $(".is_mobile").removeClass("svg_active_icon");
        }
    });
    $(document).on("click", ".mobile_srcbtn", function() {
        if (!$(".i_search_active")[0]) {
            $(".i_search").addClass("i_search_active");
        } else {
            $(".i_search").removeClass("i_search_active");
        }
    });
    $(window).on("resize", function() {
        checkWidth();
    });
    checkWidth();

    function checkWidth() {
        var vWidth = $(window).width();
        if (vWidth < 700) {
            if (!$(".mobile_footer_fixed_menu_container")[0]) {
                $.ajax({
                    type: "POST",
                    url: siteurl + 'requests/request.php',
                    data: 'f=fixedMenu',
                    cache: false,
                    beforeSend: function() {
                        $(".sndNewMessage").css("pointer-events", "none");
                    },
                    success: function(response) {
                        $("body").append(response);
                    }
                });
            }
        } else {
            if ($(".mobile_footer_fixed_menu_container")[0]) {
                $(".mobile_footer_fixed_menu_container").remove();
            }
        }
    }
    $(document).on("keyup keypress keydown", ".nwComment", function() {
        var ID = $(this).attr("data-id");
        var check = $(this).val().length;
        var $vWidth = $(window).width();
        if (check > 20) {
            $(".i_comment_footer" + ID).addClass("commentFooterResize");
        } else {
            $(".i_comment_footer" + ID).removeClass("commentFooterResize");
        }
    });
    $(document).on("click", ".settings_mobile_menu_container", function() {
        if (!$(".settingsMenuDisplay")[0]) {
            $(".i_settings_menu_wrapper").addClass("settingsMenuDisplay");
        } else {
            $(".i_settings_menu_wrapper").removeClass("settingsMenuDisplay");
        }
    });
    $(document).on("click", ".cList", function() {
        if (!$(".chatDisplay")[0]) {
            $(".chat_left_container").addClass("chatDisplay");
        } else {
            $(".chat_left_container").removeClass("chatDisplay");
        }
    });
    /*Delete Message*/
    $(document).on("click", ".dlMesv", function() {
        var type = 'deleteMessage';
        var ID = $(this).attr("id");
        var cID = $(".cList").attr("id");
        var data = 'f=' + type + '&id=' + ID + '&cid=' + cID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    $("#msg_" + ID).remove();
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
                $(".i_modal_in_in").addClass("i_modal_in_in_out");
                setTimeout(() => {
                    $(".i_modal_bg_in").remove();
                }, 200);
            }
        });
    });
    $(document).on("click", ".delmes", function() {
        var type = 'ddelMesage';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_modal_bg_in").addClass('i_modal_display_in');
                    }, 200);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    $(document).on("click", ".d_conversation", function() {
        var type = 'ddelConv';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_modal_bg_in").addClass('i_modal_display_in');
                    }, 200);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Delete Message*/
    $(document).on("click", ".dlConv", function() {
        var type = 'deleteConversation';
        var ID = $(this).attr("id");
        var cID = $(".cList").attr("id");
        var data = 'f=' + type + '&id=' + ID + '&cid=' + cID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    location.reload();
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*Search Creator*/
    $(document).delegate('#c_search', 'keyup', function() {
        var searchValue = $(this).val();
        var type = 'searchUser';
        var sum = searchValue.replace(/\s+/g, '').length;
        if (sum >= 3) {
            $(".chat_users_wrapper_results").show();
            $(".chat_users_wrapper").hide();
            setTimeout(() => {
                var data = 'f=' + type + '&key=' + encodeURIComponent(searchValue);
                /**********/
                $.ajax({
                    type: "POST",
                    url: siteurl + 'requests/request.php',
                    data: data,
                    cache: false,
                    beforeSend: function() {
                        $(".chat_users_wrapper_results").append(plreLoadingAnimationPlus);
                    },
                    success: function(response) {
                        if (response) {
                            $(".chat_users_wrapper_results").html(response);
                        } else {
                            $(".chat_users_wrapper_results").hide().html('');
                            $(".chat_users_wrapper").show();
                        }
                    }
                });
                /**********/
            }, 1000);
        } else {
            $(".chat_users_wrapper_results").hide().html('');
            $(".chat_users_wrapper").show();
        }
    });
    /*Hide Notification*/
    $(document).on("click", ".hidNot", function() {
        var type = 'hideNotification';
        var hideID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + hideID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response == '200') {
                    $(".hidNot_" + hideID).fadeOut();
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    /*UnBlock User*/
    $(document).on("click", ".unblock", function() {
        var type = 'unblock';
        var ID = $(this).attr("id");
        var blockedUserID = $(this).attr("data-u");
        var data = 'f=' + type + '&id=' + ID + '&u=' + blockedUserID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".block_id_" + ID).append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                if (response == '200') {
                    $(".block_id_" + ID).fadeOut();
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });

    $(document).on('submit', '#myPasswordChange', function(e) {
        e.preventDefault();
        var passChange = $(this);
        jQuery.ajax({
            type: "POST",
            url: siteurl + "requests/request.php",
            data: passChange.serialize(),
            beforeSend: function() {
                $(".successNot , .warning_not_mach , .warning_not_correct , .warning_write_current_password , .no_new_password_wrote , .minimum_character_not , .not_contain_whitespace").hide();
                $(".i_become_creator_box_footer").append(plreLoadingAnimationPlus);
                passChange.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    passChange.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '1') {
                    $(".warning_not_correct").show();
                } else if (data == '2') {
                    $(".warning_not_mach").show();
                } else if (data == '3') {
                    $(".warning_write_current_password").show();
                } else if (data == '4') {
                    $(".no_new_password_wrote").show();
                } else if (data == '5') {
                    $(".minimum_character_not").show();
                } else if (data == '6') {
                    $(".not_contain_whitespace").show();
                } else if (data == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                } else {
                    window.location.href = data;
                }
                $(".loaderWrapper").remove();
            }
        });
    });
    /*Change Notifications*/
    $(document).on("click", ".setChange", function() {
        var type = 'p_preferences';
        var setChange = $(this).val();
        var setType = $(this).attr("id");
        var dataNot = 'f=' + type + '&notit=' + encodeURIComponent(setChange) + '&sType=' + setType;
        $.ajax({
            type: 'POST',
            url: siteurl + "requests/request.php",
            data: dataNot,
            cache: false,
            beforeSend: function() {
                $("." + setType).append(plreLoadingAnimationPlus);
                $('.setChange').attr('disabled', true);
            },
            success: function(response) {
                setTimeout(function() {
                    $('.setChange').attr('disabled', false);
                }, 500);
                if (response == '200') {
                    if (setChange == '0') {
                        $("#" + setType).val('1');
                    }
                    if (setChange == '1') {
                        $("#" + setType).val('0');
                    }
                }
                setTimeout(function() {
                    $(".loaderWrapper").remove();
                }, 1500);
            }
        });
    });
    /*Close Alert*/
    $(document).on("click", ".i_alert_close", function() {
        $(".i_bottom_left_alert_container").remove();
    });
    /*Create a Live Streaming PopUp Call*/
    $(document).on("click", ".cNLive", function() {
        var type = $(this).attr("data-type");
        var data = 'f=' + type;
        $.ajax({
            type: 'POST',
            url: siteurl + "requests/request.php",
            data: data,
            cache: false,
            beforeSend: function() {
                $("." + type).append(plreLoadingAnimationPlus);
                $("." + type).attr('disabled', true);
            },
            success: function(response) {
                setTimeout(function() {
                    $("." + type).attr('disabled', false);
                }, 500);
                if (response != '404') {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_modal_bg_in").addClass('i_modal_display_in');
                    }, 200);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
                setTimeout(function() {
                    $(".loaderWrapper").remove();
                }, 1500);
            }
        });
    });
    /*Save Live Streaming*/
    $(document).on("click", ".createLiveStream", function() {
        var type = 'createFreeLiveStream';
        var liveStreamingTitle = $("#liveName").val();
        var data = 'f=' + type + '&lTitle=' + encodeURIComponent(liveStreamingTitle);
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() { $(".warning_required").hide(); },
            success: function(response) {
                var status = response.status;
                var start = response.start;
                if (status == '200') {
                    window.location.href = start;
                } else if (status == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                } else if (status == 'require') {
                    $(".require").show();
                } else if (status == '4') {
                    $(".name_short").show();
                }
            }
        });
    });
    /*Like Post*/
    $(document).on("click", ".lin_like , .lin_unlike", function() {
        var type = 'l_like';
        var ID = $(this).attr('data-id');
        var data = 'f=' + type + '&post=' + ID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
                $('.lin_like , .lin_unlike').prop('disabled', true);
            },
            success: function(response) {
                var status = response.status;
                var statusIcon = response.like;
                var liksCount = response.likeCount;
                if (status == 'lin_unlike') {
                    $("#p_l_l_" + ID).removeClass("lin_like").addClass("lin_unlike");
                    $("#lp_sum_l_" + ID).html(liksCount);
                } else {
                    $("#p_l_l_" + ID).removeClass("lin_unlike").addClass("lin_like");
                    $("#lp_sum_l_" + ID).html(liksCount);
                }
                $("#p_l_l_" + ID).html(statusIcon);
                $('.lin_like , .lin_unlike').prop('disabled', false);
            }
        });
    });
    /*Save Live Streaming*/
    $(document).on("click", ".createLiveStreamPaid", function() {
        var type = 'createPaidLiveStream';
        var liveStreamingTitle = $("#liveName").val();
        var liveFee = $("#lsFee").val();
        var data = 'f=' + type + '&lTitle=' + encodeURIComponent(liveStreamingTitle) + '&pointfee=' + liveFee;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $(".warning_required").hide();
            },
            success: function(response) {
                var status = response.status;
                var start = response.start;
                if (status == '200') {
                    window.location.href = start;
                } else if (status == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                } else if (status == 'point') {
                    $(".point_warning").show();
                } else if (status == 'title') {
                    $(".title_warning").show();
                } else if (status == 'require') {
                    $(".require").show();
                }
            }
        });
    });
    /*Credit Card Form Call*/
    $(document).on("click", ".purchaseLiveButton", function() {
        var type = 'pLivePurchase';
        var post = $(this).attr("id");
        var data = 'f=' + type + '&purchase=' + post;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    });
    $(document).on("click", ".joinLiveStream", function() {
        var type = 'goWalletLive';
        var post = $(this).attr("id");
        var data = 'f=' + type + '&p=' + post;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                window.location.href = response;
            }
        });
    });
    /*Credit Card Form Call*/
    $(document).on("click", ".unSubU", function() {
        var type = 'unSub';
        var post = $(this).attr("data-u");
        var data = 'f=' + type + '&u=' + post;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    });
    /*UnSubscribe User*/
    $(document).on("click", ".unSubNow", function() {
        var type = 'unSubscribe';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                var responseStatus = response.status;
                var responseRedirect = response.redirect;
                if (responseStatus == '200') {
                    window.location.href = responseRedirect;
                } else if (responseStatus == '404') {
                    PopUPAlerts('sWrong', 'ialert');
                }

            }
        });
    });
    /*Upload Verification Files*/
    $(document).on("change", ".cTumb", function(e) {
        e.preventDefault();
        var f = 'vTumbnail';
        var id = $(this).attr("data-id");
        var data = { f: f, id: id };
        $("#tuploadform").ajaxForm({
            type: "POST",
            data: data,
            delegation: true,
            cache: false,
            beforeSubmit: function() {
                $(".iu_f_" + id).append('<div class="i_upload_progress"></div>');
            },
            uploadProgress: function(e, position, total, percentageComplete) {
                $('.i_upload_progress').width(percentageComplete + '%');
            },
            success: function(response) {
                $("#viTumb" + id).css('background-image', 'url(' + response + ')');
                $("#viTumbi" + id).attr('src', response);
                $(".i_upload_progress").remove();
            },
            error: function() {}
        }).submit();
    });
})(jQuery);