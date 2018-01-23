(function ($) {
    var form = $("form.jsAddBidForm");

    form.on("submit", function (event) {
            event.preventDefault();
            $.post("/wp-admin/admin-ajax.php", form.serialize())
                .done(function () {
                    var button = form.find("button[type=submit]");
                    button.addClass("_show-message");
                    button.prop("disabled", true);
                });
    });
})(jQuery);