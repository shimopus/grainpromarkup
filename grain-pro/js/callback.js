(function ($) {
    var button = $(".jsCallBack");

    if (!button.prop("disabled")) {
        button.click(function (event) {
            event.preventDefault();
            $.post("wp-admin/admin-ajax.php", {action: 'callback', phone_number: $("#phone_number").val()})
                .done(function () {
                    button.addClass("_show-message");
                    button.prop("disabled", true);
                });
        });
    }
})(jQuery);