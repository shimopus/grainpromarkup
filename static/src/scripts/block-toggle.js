(function() {
    var blocks = document.querySelectorAll(".jsBlockToggle"),
        forEach = Array.prototype.forEach,
        activeClass = "_active";

    forEach.call(blocks, function(block) {
        block.addEventListener("click", toggleHandler.bind(block));
    });

    function toggleHandler() {
        this.classList.toggle(activeClass);
    }
}) ();