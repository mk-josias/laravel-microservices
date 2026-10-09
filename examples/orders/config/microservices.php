<?php

use Foundation\Billing\Shadows\CustomerShadow;

return [
    'name' => 'orders',

    'services' => [
        'billing' => ['host' => env('BILLING_HOST', 'http://127.0.0.1:8001'), 'namespace' => 'Foundation\Billing'],
    ],

    'shadows' => [CustomerShadow::class],
];
