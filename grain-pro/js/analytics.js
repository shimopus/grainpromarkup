(function () {
    window.fireAnalyticsEvent = function (event, data) {
        if (window.yaCounter36790005) {
            yaCounter36790005.reachGoal(event, data);
        } else {
            console.error("Analytics event has not been fired")
        }
    }
})();