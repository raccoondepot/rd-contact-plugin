(function () {
    window.addEventListener('load', function () {
        var formHeaders = document.querySelectorAll('.rd-contact-plugin-modal-container .modal-body .form-page-header h2');
        if (formHeaders.length > 0) {
            for (var i = 0; i < formHeaders.length; i++) {
                var parentModalContainer = findAncestor(formHeaders[i], 'modal-content');
                if (parentModalContainer) {
                    var modalTitle = parentModalContainer.querySelector('.modal-header .modal-title');
                    if (modalTitle) {
                        modalTitle.innerHTML = formHeaders[i].innerHTML;
                        formHeaders[i].remove();
                    }
                }
            }
        }
    });
    function findAncestor (el, cls) {
        while ((el = el.parentElement) && !el.classList.contains(cls));
        return el;
    }
}());