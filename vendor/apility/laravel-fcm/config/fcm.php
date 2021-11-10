<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAv6BnKkA:APA91bGczQPD1Ir7Z8Zd7MXki8QfmyAWi5H99wfT8aKf2REuuLtb3ieNzoYGXI3P1o75KGBbYxHWqM5j21cBu2YVwstbRxauelnf1-UNZ6g_5PGqdAILKqrb01CLOwvj8ohGmvmQTlsB'),
        'sender_id' => env('FCM_SENDER_ID', '823029869120'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
