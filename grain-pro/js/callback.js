(function ($) {
    var button = $(".jsCallBack");
    var phoneNumber = $("#phone_number");

    if (!button.prop("disabled")) {
        button.click(function (event) {
            if (phoneNumber.get(0).validity.valid) {
                event.preventDefault();
                $.post("wp-admin/admin-ajax.php", {action: 'callback', phone_number: phoneNumber.val()})
                    .done(function () {
                        button.addClass("_show-message");
                        button.prop("disabled", true);
                    });
            }
        });
    }
})(jQuery);