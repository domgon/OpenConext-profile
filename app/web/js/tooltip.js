$(function () {
    const changeAriaExpanded = (element) => {
        const ariaExpanded = element.getAttribute('aria-expanded');
        const newValue = {
            false: true,
            true: false,
        };

        // We use the newValue object because ariaExpanded is a string containing either "true" or "false".
        // Casting that to a boolean will, in both instances, give us true.
        // By using an object we can use array notation to access the right value based on what we get back from the attribute.
        element.setAttribute('aria-expanded', newValue[ariaExpanded]);
    };

    const changeAriaPressed = (element) => {
        const ariaPressed = element.getAttribute('aria-pressed');
        const newValue = {
            false: true,
            true: false,
        };

        // We use the newValue object because ariaPressed is a string containing either "true" or "false".
        // Casting that to a boolean will, in both instances, give us true.
        // By using an object we can use array notation to access the right value based on what we get back from the attribute.
        element.setAttribute('aria-pressed', newValue[ariaPressed]);
    };

    const tooltips = $('label.tooltip');

    tooltips.on('click', function (e) {
        const id = $(e.target).attr('for');
        const checkbox = document.getElementById(id);
        const expanded = checkbox.getAttribute('aria-expanded');

        if (!!checkbox) {
            changeAriaExpanded(checkbox);
            changeAriaPressed(checkbox);
        }

        setTimeout(function () {
            const tooltipValue = document.querySelector(`[data-for="${id}"]`);
            if (expanded === 'false' && !!tooltipValue) {
                tooltipValue.focus();
            } else {
                $(e.target).focus();
            }
        }, 200);
    })

    tooltips.on('keydown', function (e) {
        const ENTER      = 13;
        const SPACE      = 32;

        switch (e.keyCode) {
            case ENTER:
            case SPACE:
                $(this).trigger('click');
                break;
        }
    });
});
