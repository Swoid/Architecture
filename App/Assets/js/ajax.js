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
        $.get('http://swoid.dev/notifications/getComments', function( data ) {
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
        if( data > 0 ) {
            $('.messages button').addClass('hot');
        } else {
            $('.messages button').removeClass('hot');
        }
        $('.messages button').html(data);
    });
}

/**
 * Verifie le nombre de commentaires
 */
function checkOtherNotif() {
    var iCount = 0;
    // Nombre de commentaires
    $.get('http://swoid.dev/notifications/getCommentCount', function( data ) {
        iCount += parseInt(data);
    });

    // Nombre de demandes d'amis
    $.get('http://swoid.dev/notifications/getFriendCount', function( data ) {
        iCount += parseInt(data);
    });

    if( iCount > 0 ) {
        $('.notifications button').addClass('hot');
    } else {
        $('.notifications button').removeClass('hot');
    }
    $('.notifications button').html(iCount);
}
