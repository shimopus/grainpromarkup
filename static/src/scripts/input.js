(function() {

    var wrappers = document.querySelectorAll(".gn-input"),
        forEach = Array.prototype.forEach,
        selectors = {
            input: ".gn-input__input",
            prefix: ".gn-input__prefix",
            frame: ".gn-input__frame"
        },
        classes = {
            filled: "_filled"
        };

    forEach.call(wrappers, function(wrapper) {
        var input = wrapper.querySelector(selectors.input);
        input.addEventListener("input", toggleFilled.bind(input, wrapper));
    });

    function toggleFilled(wrapper) {
        if(this.value) {
            wrapper.classList.add(classes.filled);
        } else {
            wrapper.classList.remove(classes.filled);
        }
    }
}) ();