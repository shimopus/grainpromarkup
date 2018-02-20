(function ($) {
    var form = $(".jsPopupMessage form");

    form.on("submit", function (event) {
        event.preventDefault();

        var submitBtn = $(this).find(".jsSubmitMessage"),
        messagePopup = submitBtn.closest(".jsPopupMessage"),
        className = "_show-submit-info";

        submitBtn.prop("disabled", true);

        $("input[name=theme]").val($("div.jsTabsLink._active").text());

        $.post("/wp-admin/admin-ajax.php", form.serialize())
            .done(function () {
                messagePopup.addClass(className);

                setTimeout(function() {
                    messagePopup.removeClass(className);
                    submitBtn.prop("disabled", false);
                    GnPopup && GnPopup.hide(messagePopup.data("popup"));
                }, 3000);
            });
    });
})(jQuery);