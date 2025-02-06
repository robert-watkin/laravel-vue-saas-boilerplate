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
            'appName' => config('app.name'),
            // share subscription details
            'user' => fn() => $request->user() ? $request->user()->only('id', 'name', 'email') : null,
            'auth.user.subscription' => fn() => $request->user()?->subscribed() ? $request->user()->subscription('default') : null,
            // all subscription options
            'subscriptionOptions' => collect(config('subscription.tiers'))
                ->map(function ($tier) {
                    return [
                        'title' => $tier['name'],
                        'monthly' => $tier['monthly'],
                        'yearly' => $tier['yearly'],
                        'mostPopular' => $tier['mostPopular'],
                        'features' => $tier['features'],
                        'notFeatures' => $tier['notFeatures'],
                    ];
                })
                ->values()
                ->all(),
        ]);
    }
}
