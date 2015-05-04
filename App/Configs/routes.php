<?php 

return [
    // Posts
    'posts/index', // Route par défaut !
    'posts/selfPublish',
    'posts/friendPublish',
    'posts/view',

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
    'notifications/getCommentCount',
    'notifications/getFriendCount',
    'notifications/getComments',
];