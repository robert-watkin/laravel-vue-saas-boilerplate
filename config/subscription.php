<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Subscription Tiers Configuration
    |--------------------------------------------------------------------------
    |
    | Complete configuration for all subscription tiers including:
    | - Pricing and Stripe IDs
    | - Feature limits
    | - Feature lists
    | - UI display options
    |
    */
    'tiers' => [
        'starter' => [
            'name' => 'Starter',
            'monthly' => [
                'price' => '$1',
                'stripe_id' => env('STRIPE_PRICE_STARTER_MONTHLY'),
            ],
            'yearly' => [
                'price' => '$10',
                'stripe_id' => env('STRIPE_PRICE_STARTER_YEARLY'),
            ],
            'mostPopular' => false,
            'features' => [
                '1 Website',
                'SSL (HTTPS)',
                'SiteFast Domain',
            ],
            'notFeatures' => [
                'SiteFast Branding Removal',
                'Google Analytics',
                'Email Integration',
            ],
        ],
        'basic' => [
            'name' => 'Basic',
            'monthly' => [
                'price' => '$29',
                'stripe_id' => env('STRIPE_PRICE_BASIC_MONTHLY'),
            ],
            'yearly' => [
                'price' => '$249',
                'stripe_id' => env('STRIPE_PRICE_BASIC_YEARLY'),
            ],
            'mostPopular' => true,
            'features' => [
                '15 Websites',
                'SSL (HTTPS)',
                'Custom Domain',
                'SiteFast Branding Removal',
            ],
            'notFeatures' => [
                'Google Analytics',
                'Email Integration',
            ],
        ],
        'plus' => [
            'name' => 'Plus',
            'monthly' => [
                'price' => '$49',
                'stripe_id' => env('STRIPE_PRICE_PLUS_MONTHLY'),
            ],
            'yearly' => [
                'price' => '$389',
                'stripe_id' => env('STRIPE_PRICE_PLUS_YEARLY'),
            ],
            'mostPopular' => false,
            'features' => [
                '50 Websites',
                'SSL (HTTPS)',
                'Custom Domain',
                'SiteFast Branding Removal',
                'Google Analytics',
                'Email Integration',
            ],
            'notFeatures' => [],
        ],
    ],
];