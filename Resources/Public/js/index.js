
// modals
document.addEventListener('DOMContentLoaded', function() {

    // open modals
    Array.prototype.forEach.call(document.querySelectorAll(".open-modal-form"), function(e){
        e.onclick = function() {
            var modalId = this.getAttribute('data-modal');
            var modal = document.getElementById( modalId );

            modal.style.display = "flex";
        }
    });

    // close modal
    Array.prototype.forEach.call(document.querySelectorAll(".modal-content-rd .close-rd"), function(e){
        e.onclick = function() {
            Array.prototype.forEach.call(document.querySelectorAll(".modal-rd"), function(e){
                e.style.display = "none";
            });
        }
    });


    // InputJs Mask
    Array.prototype.forEach.call(document.querySelectorAll(".input-mask-simple"), function(e) {
        var maskOptions = {
            mask: e.getAttribute('data-mask')
        };
        var mask = new IMask(e, maskOptions);
    });

});

