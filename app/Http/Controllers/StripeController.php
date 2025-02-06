<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    // checkout function
    public function checkout(Request $request, string $price_id)
    {
        // handle when it doesn't exist
        if (!$price_id) {
            return redirect()->route('dashboard');
        }
        // handle when the user is already subscribed
        if ($request->user()->subscribed()) {
            return redirect()->route('dashboard');
        }

        return $request->user()
            ->newSubscription('default', $price_id)
            // ->trialDays(5)
            // ->allowPromotionCodes()
            ->checkout([
                'success_url' => route('checkout-success'),
                'cancel_url' => route('checkout-cancel'),
            ]);
    }
}
