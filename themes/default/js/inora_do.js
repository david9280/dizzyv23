(function($) {
    "use strict";
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    $(document).on("click", ".openPostMenu", function() {
        var ID = $(this).attr("id");
        $(".mnoBox" + ID).addClass("dblock");
    });
    $(document).on('submit', "#ilogin", function(e) {
        e.preventDefault();
        var LoginForm = $("#ilogin");
        jQuery.ajax({
            type: "POST",
            url: siteurl + "requests/login.php",
            data: LoginForm.serialize(),
            beforeSend: function() {

            },
            success: function(response) {
                if (response != "go_inside") {
                    $(".i_error").html(response).show();
                    setTimeout(function() {
                        $(".i_error").html('').hide();
                    }, 125000);
                } else {
                    window.location.href = siteurl;
                }
            }
        });
    });
    $(document).on('submit', "#iregister", function(e) {
        e.preventDefault();
        var RegisterForm = $("#iregister");
        jQuery.ajax({
            type: "POST",
            url: siteurl + "requests/register.php",
            data: RegisterForm.serialize(),
            beforeSend: function() {
                $(".register_warning").hide();
                $(".i_modal_content").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                if (response == '1') {
                    $(".fill_all").show();
                } else if (response == '2') {
                    $(".fill_username_used").show();
                } else if (response == '3') {
                    $(".fill_email_used").show();
                } else if (response == '4') {
                    $(".fill_username_short").show();
                } else if (response == '5') {
                    $(".fill_username_invalid").show();
                } else if (response == '6') {
                    $(".fill_email_invalid").show();
                } else if (response == '7') {
                    $(".fill_pass").show();
                } else if (response == '8') {
                    window.location.href = siteurl + 'settings';
                }
                $(".loaderWrapper").remove();
            }
        });
    });
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
    $(document).on("click", ".openShareMenu", function() {
        var ID = $(this).attr("id");
        $(".mnsBox" + ID).addClass("dblock");
    });
    $(document).on("mouseup touchend", function(e) {
        var boxContainer = $('.mnsBox , .mnoBox');
        if (!boxContainer.is(e.target) && boxContainer.has(e.target).length === 0) {
            boxContainer.removeClass('dblock');
        }
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
    /*Send Forgot Email*/
    $(document).on("click", ".i_forgot_button", function() {
        var type = 'forgotPass';
        var email = $("#i_nora_forgot_password").val();
        var data = 'f=' + type + '&email=' + encodeURIComponent(email);
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".i_modal_forgot").append(plreLoadingAnimationPlus);
            },
            success: function(response) {
                if (response == '200') {
                    $(".s_e").hide();
                    $(".s_e_success").show();
                } else if (response == '2') {
                    $(".no_this_email").show();
                } else if (response == '3') {
                    $(".system_no_send").show();
                }
                $(".loaderWrapper").remove();
            }
        });
    });
    $(document).on('submit', "#iresetpass", function(e) {
        e.preventDefault();
        var iresetpass = $('#iresetpass');
        jQuery.ajax({
            type: "POST",
            url: siteurl + "requests/request.php",
            data: iresetpass.serialize(),
            beforeSend: function() {
                $(".successNot , .warning_not_mach , .warning_not_correct , .warning_write_current_password , .no_new_password_wrote , .minimum_character_not , .not_contain_whitespace").hide();
                $(".i_become_creator_container").append(plreLoadingAnimationPlus);
                iresetpass.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    iresetpass.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '2') {
                    $(".warning_not_mach").show();
                } else if (data == '4') {
                    $(".no_new_password_wrote").show();
                } else if (data == '5') {
                    $(".minimum_character_not").show();
                } else if (data == '200') {
                    $(".i_settings_item_title_for").remove();
                    $(".warning_success").show();
                    $(".i_login_button").remove();
                }
                $(".loaderWrapper").remove();
            }
        });
    });
})(jQuery);