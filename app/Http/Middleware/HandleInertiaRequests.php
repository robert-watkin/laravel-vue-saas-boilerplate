<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            // share subscription details
            'user' => fn() => $request->user() ? $request->user()->only('id', 'name', 'email') : null,
            'auth.user.subscription' => fn() => $request->user()?->subscribed() ? $request->user()->subscription('default') : null,
            // all subscription options
            'subscriptionOptions' => [
                [
                    'title' => 'Starter',
                    'monthly' => [
                        'price' => '$1',
                        'stripe_id' => '',
                    ],
                    'yearly' => [
                        'price' => '$10',
                        'stripe_id' => ''
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
                    ]
                ],
                [
                    'title' => 'Basic',
                    'monthly' => [
                        'price' => '$29',
                        'stripe_id' => '',
                    ],
                    'yearly' => [
                        'price' => '$249',
                        'stripe_id' => ''
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
                    ]
                ],
                [
                    'title' => 'Plus',
                    'price' => '$49',
                    'monthly' => [
                        'price' => '$49',
                        'stripe_id' => '',
                    ],
                    'yearly' => [
                        'price' => '$389',
                        'stripe_id' => ''
                    ],
                    'mostPopular' => false,
                    'features' => [
                        '50 Websites',
                        'SSL (HTTPS)',
                        'Custom Domain',
                        'SiteFast Branding Removal',
                        'Google Analytics',
                        'Email Integration',
                    ]
                ]
            ],
        ]);
    }
}
