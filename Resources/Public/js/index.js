// modals
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var listContainer = document.querySelector('.rd-contact-plugin .contact-list-container');
    var buttonContainer = document.querySelector('.rd-contact-plugin .button-container');

    var iconIndex = 0,
        iconArr = buttonContainer.querySelector('.button-icon-container').children,
        iconArrLength = iconArr.length,
        interval = setInterval(nextIcon, 3000),
        openedList = false;

    // animate pulsing button after load
    addClass(buttonContainer, 'animate');

    // mouse hover on icon container block
    // buttonContainer.addEventListener('mouseenter', function() {
    //     console.log('mouseenter');

    //     toggleList();
    // });

    buttonContainer.addEventListener('click', function() {
        console.log('click');

        toggleList();
    });

    function toggleList() {
        // toggle show class for ListContainer
        
        if (!openedList) {
            // Open list
            openedList = true;
            addClass(listContainer, 'show');

            // restart interval
            removeClass(buttonContainer, 'animate');
            clearInterval(interval);

            // show close icon
            addClass(buttonContainer, 'show-close-button');
        } else {
            // Close list
            openedList = false;
            removeClass(listContainer, 'show');

            // show fading icons
            removeClass(buttonContainer, 'show-close-button');

            // start interval again
            addClass(buttonContainer, 'animate');
            interval = setInterval(nextIcon, 3000);
        }
    }

    function nextIcon() {
        if (!openedList) {
            removeClass(iconArr[iconIndex], 'show');
            iconIndex = (iconIndex + 1) % iconArrLength;
            addClass(iconArr[iconIndex], 'show');
        }
    }

    function hasClass(element, className) {
        return !!element.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
    }

    function addClass(element, className) {
        if (!hasClass(element, className)) element.className += ' ' + className;
    }

    function removeClass(element, className) {
        if (hasClass(element, className)) {
            var reg = new RegExp('(\\s|^)' + className + '(\\s|$)');
            element.className = element.className.replace(reg, '');
        }
    }

    // open modals
    Array.prototype.forEach.call(document.querySelectorAll('.rd-contact-plugin .open-modal-form'), function (link) {
        link.onclick = function () {
            var modalId = this.getAttribute('data-modal');
            var modal = document.getElementById(modalId);

            modal.style.display = 'flex';
        }
    });

    // close modal
    Array.prototype.forEach.call(document.querySelectorAll('.modal-content-rd .close-rd'), function (closeEl) {
        closeEl.onclick = function () {
            Array.prototype.forEach.call(document.querySelectorAll('.modal-rd'), function (e) {
                e.style.display = 'none';
            });
        }
    });


    // InputJs Mask
    Array.prototype.forEach.call(document.querySelectorAll('.input-mask-simple'), function (e) {
        var maskOptions = {
            mask: e.getAttribute('data-mask')
        };
        var mask = new IMask(e, maskOptions);
    });

});

