(function() {

    var wrappers = document.querySelectorAll(".jsTabsWrapper"),
        forEach = Array.prototype.forEach;


    forEach.call(wrappers, function(wrapper) {
        wrapper.addEventListener("click", function(event) {
            var target = event.target,
                targetTabsName,
                tabs,
                links,
                targetTabs;

            if (target.classList.contains("jsTabsLink") || target.closest(".jsTabsLink")) {
                targetTabsName = target.getAttribute('href');
                tabs = wrapper.querySelectorAll(".jsTabsTab");
                links = wrapper.querySelectorAll(".jsTabsLink");

                forEach.call(tabs, function(tab) {
                    if (tab.dataset['tab'] === targetTabsName) {
                        tab.classList.add("_active");
                    } else {
                        tab.classList.remove("_active");
                    }
                });

                forEach.call(links, function(link) {
                    if (link === target) {
                        link.classList.add("_active");
                    } else {
                        link.classList.remove("_active");
                    }
                });
            }

            event.preventDefault();
        });
    });





}) ();