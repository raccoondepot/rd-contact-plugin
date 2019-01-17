// rd-contact-plugin handling
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var listContainer = document.querySelector('.rd-contact-plugin .contact-list-container'),
        buttonContainer = document.querySelector('.rd-contact-plugin .button-container'),
        modalContainer = document.querySelector('.rd-contact-plugin .modal-container'),
        modalBox = modalContainer.querySelector('.modal-box'),
        modalContent = modalContainer.querySelector('.modal-box .modal-box-content');

    var iconIndex = 0,
        iconArr = buttonContainer.querySelector('.button-icon-container').children,
        iconArrLength = iconArr.length,
        interval = setInterval(nextIcon, 3000),
        openedList = false;

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

    // animate pulsing button after load
    addClass(buttonContainer, 'animate');

    // mouse hover on icon container block
    // buttonContainer.addEventListener('mouseenter', function() {
    //     console.log('mouseenter');

    //     toggleList();
    // });

    buttonContainer.addEventListener('click', function() {
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

    // open modalBox
    Array.prototype.forEach.call(document.querySelectorAll('.rd-contact-plugin .open-modal-form'), function (link) {
        link.onclick = function () {
            var formId = this.getAttribute('data-form');

            // show selected form
            showForm(formId);

            // show modal window
            addClass(modalBox, 'show');
        }
    });

    function showForm(selectedFormId) {
        Array.prototype.forEach.call(modalBox.querySelectorAll('.modal-box-content .form-container'), function(formContainer) {

            var formId = formContainer.getAttribute('data-form-id');
            if (formId === selectedFormId) {
                addClass(formContainer, 'show');
            } else {
                removeClass(formContainer, 'show');
            }
        });
    }

    // close modal
    modalBox.querySelector('.modal-box-close').addEventListener('click', function() {
        closeModal();
    });
    modalBox.addEventListener('click', function(event) {
        var isClickInside = modalContent.contains(event.target);

        if (!isClickInside) {
            closeModal();
        }
    });

    function closeModal() {
        removeClass(modalBox, 'show');

        Array.prototype.forEach.call(modalBox.querySelectorAll('.modal-box-content .form-container'), function(formContainer) {
            removeClass(formContainer, 'show');
        });
    }

    // InputJs Mask
    Array.prototype.forEach.call(document.querySelectorAll('.input-mask-simple'), function (e) {
        var maskOptions = {
            mask: e.getAttribute('data-mask')
        };
        var mask = new IMask(e, maskOptions);
    });
});
