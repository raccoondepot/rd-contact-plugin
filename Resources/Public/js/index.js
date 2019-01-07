
// modals
document.addEventListener('DOMContentLoaded', function() {

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

    
    // modal forms handler
    //var url = '/?tx_rdcontactplugin_emailactions%5Baction%5D=callmeform&tx_rdcontactplugin_%20emailactions%5Bcontroller%5D=Email&type=453299';

    //var request = $.ajax({
    //    url: '/?' + controller + '&' + action + '&' + pagetype + '&' + search,
    //    dataType: 'html'
    //});

    //request.done(function( msg ) {
    //    console.log(msg);
    //    $list.html(msg);
    //});

    //request.fail(function( jqXHR, textStatus ) {
    //    console.log( "Request failed: " + textStatus );
    //    $list.html('');
    //});

});

