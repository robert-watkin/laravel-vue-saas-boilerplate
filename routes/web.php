<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Subscribed;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\StripeController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

// Auth routes - jetsream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Checkout routes
    Route::prefix('checkout')->group(function () {
        Route::get('/success', function () {
            return Inertia::render('CheckoutSuccess');
        })->name('checkout-success');

        Route::get('/cancel', function () {
            return Inertia::render('CheckoutCancel');
        })->name('checkout-cancel');

        Route::get('subscription/{price_id}', [StripeController::class, 'checkout'])->name('subscription');
    });




    // Only subscribed users can access here 
    Route::middleware([Subscribed::class])->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');

        // billing portal
        Route::get('/billing-portal', function (Request $request) {
            return $request->user()->redirectToBillingPortal(route('profile.show'));
        })->name('billing-portal');

        // ADD YOUR SUBSCRIBED ROUTES HERE

    });
});
