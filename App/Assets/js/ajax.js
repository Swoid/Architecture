$('document').ready( function() {

    var oMessages = document.querySelector('.messages');
    var oNotifs = document.querySelector('.notifications');

    oMessages.addEventListener( 'click', getMessages, false );
    oNotifs.addEventListener( 'click', getNotifications, false );

    /**
     * Recupère les notifications de type messages
     */
    function getMessages() {
        $.get('http://swoid.dev/notifications/getMessages', function( data ) {
            $('.messages .popup').html(data);
        });
    }

    /**
     * Recupère les notifications de type comments
     */
    function getNotifications() {
        $.get('http://swoid.dev/notifications/getNotifications', function( data ) {
            $('.notifications .popup').html(data);
        });
    }

    checkMessagesNotif();
    checkOtherNotif();

    /**
     * Lance la fonction checkNotif toutes les 5 secondes
     */
    setInterval('checkMessagesNotif()',5000);
    setInterval('checkOtherNotif()',5000);

});

/**
 * Verifie le nombre de notifications
 */
function checkMessagesNotif() {
    $.get('http://swoid.dev/notifications/getMessageCount', function( data ) {
        appendTo('messages', data);
    });
}

/**
 * Verifie le nombre de commentaires
 */
function checkOtherNotif() {
    // Nombre de commentaires
    $.get('http://swoid.dev/notifications/getOtherCount', function( data ) {
        appendTo('notifications', data);
    });
}

/**
 * On ajoute les données à un elements
 * @param element
 * @param data
 */
function appendTo(element, data) {
    if( data > 0 ) {
        $('.'+ element +' button').addClass('hot');
    } else {
        $('.'+ element +' button').removeClass('hot');
    }
    $('.'+ element +' button').html(data);
}