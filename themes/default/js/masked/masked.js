// MaskedInput

jQuery(function($) {;

    $.mask.definitions['y'] = '[12]';
    $.mask.definitions['m'] = '[01]';
    $.mask.definitions['d'] = '[0-3]';
    $("#date1").mask("d9/m9/y999", { placeholder: "dd/mm/yyyy" });

    function verifyDate(datevalue, divID) {
        var done = false;
        if (datevalue != null || datevalue != '') {
            var tmp = datevalue.split('/');
            var year = tmp[0];
            var month = tmp[1];
            var day = tmp[2];
            var fromYear = 1900;
            var now = new Date();

            if (year >= fromYear && year <= now.getFullYear()) {
                if (month >= 1 && month <= 12) {
                    if (day >= 1 && day <= 31) {
                        clean($(divID));
                        done = true;
                    } else {
                        $(divID).css("background", "#fcf9f9");
                    }
                } else {
                    $(divID).css("background", "#fcf9f9");
                }
            } else {
                $(divID).css("background", "#fcf9f9");
            }

        }
        return done;
    }

    function clean(divID) {
        $(divID).css("background", "#ffffff");
    }

});