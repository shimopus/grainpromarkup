(function() {

    var wrappers = document.querySelectorAll(".gn-file"),
        forEach = Array.prototype.forEach,
        selectors = {
            input: ".gn-file__input",
            label: ".gn-file__label"
        },
        classes = {
            filled: "_filled"
        };

    forEach.call(wrappers, function(wrapper) {
        var input = wrapper.querySelector(selectors.input),
            label = wrapper.querySelector(selectors.label);
        input.addEventListener("change", changeLabel.bind(input, label));
    });

    function changeLabel(label) {
        if(this.files && this.files[0]) {
            label.classList.add(classes.filled);
            label.innerHTML = this.files[0].name;
        }
    }
}) ();