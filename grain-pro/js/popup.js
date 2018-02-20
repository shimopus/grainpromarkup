var GnPopup = (function() {

    var popups = document.querySelectorAll(".jsPopup"),
        dataNamespace = "popup",
        classes = {
            active: "_active",
            popup: "jsPopup",
            showButton: "jsPopupShow",
            hideButton: "jsPopupHide",
            popupOpened: "_popup-opened"
        },
        options = {
            animationTime: 300
        },
        body = document.body,
        some = Array.prototype.some,
        popupOpened = {};

    init();

    function init() {
        initHandlers();
    }

    function initHandlers() {
        document.addEventListener("click", clickHandler);
    }

    function clickHandler(event) {
        var target = event.target,
            clickedShowButton = target.classList.contains(classes.showButton) ?
                                target : target.closest("." + classes.showButton),
            clickedHideButton = target.classList.contains(classes.hideButton) ?
                                target : target.closest("." + classes.hideButton),
            clickedOverlay =    target.classList.contains(classes.popup) ? target : null;

        if (clickedShowButton) {
            showPopup(clickedShowButton);
        } else if (clickedHideButton) {
            hidePopup(clickedHideButton);
        } else if (clickedOverlay) {
            hidePopup(clickedOverlay);
        }
    }

    function showPopup(button) {
        var popupName = button.dataset[dataNamespace];
        showPopupByName(popupName);
    }

    function hidePopup(button) {
        var popupName = button.dataset[dataNamespace];
        if (!popupName) {
            var popup = button.closest("." + classes.popup);
            popupName = popup && popup.dataset[dataNamespace];
        }

        hidePopupByName(popupName);
    }

    function updateElementsOnShow() {
        var bodyOldWidth = body.scrollWidth;
        body.classList.add(classes.popupOpened);
        body.style.marginRight = (body.scrollWidth - bodyOldWidth) + "px";
    }

    function updateElementsOnHide(timeout) {
        setTimeout(function() {
            body.classList.remove(classes.popupOpened);
            body.style.marginRight = "0px";
        }, timeout);
    }

    function applyAction(popups, popupName, actionName) {
        some.call(popups, function(popup) {
            if (popup.dataset['popup'] === popupName) {
                popup.classList[actionName](classes.active);
                return true;
            }
            return false;
        });
    }

    function showPopupByName(popupName) {
        if (!popupOpened[popupName]) {
            applyAction(popups, popupName, 'add');
            updateElementsOnShow();
            popupOpened[popupName] = true;
        }
    }

    function hidePopupByName(popupName) {
        if (popupOpened[popupName]) {
            applyAction(popups, popupName, 'remove');
            updateElementsOnHide(options.animationTime);
            popupOpened[popupName] = false;
        }
    }

    // public API
    return {
        hide: hidePopupByName,
        show: showPopupByName
    };
}) ();