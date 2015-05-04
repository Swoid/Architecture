$('document').ready( function() {

    var oButton = document.querySelector('.messages');

    oButton.addEventListener( 'click', getMessages, false );

    /**
     * Recupère les notifications de type message
     */
    function getMessages() {
        $.get('http://swoid.dev/notifications/getMessages', function( data ) {
            $('.messages .popup').html(data);
        });
    }

    checkNotif();

    /**
     * Lance la fonction checkNotif toutes les 5 secondes
     */
    setInterval('checkNotif()',5000);

});

/**
 * Verifie le nombre de notifications
 */
function checkNotif() {
    $.get('http://swoid.dev/notifications/getMessageCount', function( data ) {
        console.log(data > 0);
        if( data > 0 ) {
            $('.messages button').addClass('hot');
        } else {
            $('.messages button').removeClass('hot');
        }
        $('.messages button').html(data);
    });
}
