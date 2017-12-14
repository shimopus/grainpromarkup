(function() {
    var questionBlocks = document.querySelectorAll(".jsQuestionBlock"),
        faqFilter = document.querySelectorAll(".jsFAQFilter"),
        forEach =
            Array.prototype.forEach,
        activeClass = "_active",
        hiddenClass = "_hidden",
        activeFilterItem;

    forEach.call(questionBlocks, function(question) {
        question.addEventListener("click", toggleQuestionHandler.bind(question));
    });

    function toggleQuestionHandler() {
        this.classList.toggle(activeClass);
    }

    activeFilterItem = faqFilter[0];
    if (activeFilterItem) {
        toggleFilterItem(activeFilterItem);
    }

    forEach.call(faqFilter, function(faqFilterItem) {
        faqFilterItem.addEventListener("click", toggleFAQFilterItemHandler.bind(faqFilterItem));
    });

    function toggleFAQFilterItemHandler() {
        toggleFilterItem(this);

        toggleFilterItem(activeFilterItem);

        activeFilterItem = this;
    }

    function toggleFilterItem(filterItemElement) {
        var contentId = filterItemElement.dataset["catid"];
        filterItemElement.classList.toggle(activeClass);
        document.getElementById(contentId).classList.toggle(hiddenClass);
    }

})();