(function ($) {
    var form = $(".jsPopupMessage form");
    var messagePopup = document.querySelector(".jsPopupMessage"),
        className = "_show-submit-info",
        submitBtn = document.querySelector(".jsSubmitMessage");

    form.on("submit", function (event) {
        event.preventDefault();
        submitBtn.disabled = true;

        $("input[name=theme]").val($("div.jsTabsLink._active").text());

        $.post("/wp-admin/admin-ajax.php", form.serialize())
            .done(function () {
                messagePopup.classList.add(className);

                setTimeout(function() {
                    messagePopup.classList.remove(className);
                    submitBtn.disabled = false;
                    GnPopup && GnPopup.hide("message");
                }, 3000);
            });
    });
})(jQuery);