(function() {

    var tabs = document.querySelectorAll(".jsRadioTabsTab"),
        contents = document.querySelectorAll(".jsRadioTabsContent"),
        classes = {
            active: "_active"
        },
        forEach = Array.prototype.forEach;

    forEach.call(tabs, function(tab) {
        tab.addEventListener("change", function() {
            if (tab.checked) {
                var name = tab.dataset['radioTabs'];
                forEach.call(contents, function(content) {
                    if (content.dataset['radioTabs'] === name) {
                       content.classList.add(classes.active);
                    } else {
                        content.classList.remove(classes.active);
                    }
                });
            }
        })
    });





}) ();