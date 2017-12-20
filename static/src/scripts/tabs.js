(function() {

    var forEach = Array.prototype.forEach;

    document.addEventListener("click", function(event) {
        var target = event.target,
            targetTabsName,
            targetTabsGroup,
            tabs,
            links,
            targetTabs;

        if (target.classList.contains("jsTabsLink")) {
            targetTabsName = target.dataset['tab'];
            targetTabsGroup = target.dataset['tab-group'];
            tabs = document.querySelectorAll(".jsTabsTab");
            links = document.querySelectorAll(".jsTabsLink");

            forEach.call(tabs, function(tab) {
                if (!targetTabsGroup || tab.dataset['tab-group'] === targetTabsGroup) {
                    if (tab.dataset['tab'] === targetTabsName) {
                        tab.classList.add("_active");
                    } else {
                        tab.classList.remove("_active");
                    }
                }
            });

            forEach.call(links, function(link) {
                if (!targetTabsGroup || link.dataset['tab-group'] === targetTabsGroup) {
                    if (link.dataset['tab'] === targetTabsName) {
                        link.classList.add("_active");
                    } else {
                        link.classList.remove("_active");
                    }
                }
            });

            event.preventDefault();
        }
    });

}) ();