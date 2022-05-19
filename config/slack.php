<?php

return [
    // Webhook URL
    'url' => env('https://hooks.slack.com/services/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'),

     // チャンネル設定
    'default' => 'work',

    'channels' => [
        'work' => [
            'username' => '作業通知',
            'icon' => ':face_with_rolling_eyes:',
            'channel' => 'notice-work',
        ],
        'error' => [
            'username' => 'エラー通知',
            'icon' => ':scream:',
            'channel' => 'notice-error',
        ],
    ],
];
