<?php 

return [
    // Posts
    'posts/index', // Route par défaut !
    'posts/selfPublish',
    'posts/friendPublish',

    // Users
    'users/connect',
    'users/register',
    'users/logout',
    'users/clear',
    'users/index',
    'users/friends',

    // Messages
    'messages/conversation',
    'messages/send',

    // Notifications
    'notifications/getMessageCount',
    'notifications/getMessages',
];