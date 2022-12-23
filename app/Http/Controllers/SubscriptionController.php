<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Payment;
use Exception;

class SubscriptionController extends Controller
{
    function subscription_payment()
    {
        $user_subscription = UserSubscription::latest('created_at')->where('user_id', Auth::user()->id)->first();
        if (!$user_subscription) {
            return redirect('/');
        }
        return view('gym.subscription_payment', [
            'user_subscription' => $user_subscription
        ]);
    }


    function payment_subscription(Request $request)
    {
        $attributes = $request->validate([
            'user_id' => ['required', Rule::exists('users', 'id')],
            'transID' => 'required',
            'payment_method' => 'required',
            'total' => 'required',
            'status' => 'required',
            'user_subscription' => ['required', Rule::exists('user_subscriptions', 'id')],
        ]);

        $payment = new Payment();
        $payment->user_id = $request->get('user_id');
        $payment->pay_id = $request->get("transID");
        $payment->payment_method = $request->get("payment_method");
        $payment->amount_paid = $request->get("total");
        $payment->status = $request->get("status");
        $payment->save();

        $user_subscription = UserSubscription::find($attributes['user_subscription']);
        $user_subscription->payment_id = $payment->id;
        $user_subscription->subscriped = true;
        $user_subscription->save();

        $data = [
            'user_subscription' => $user_subscription->id,
            'transID' => $payment->pay_id
        ];

        return response()->json($data);
    }


    function subscription_complete(Request $request)
    {
        $user_subscription_id = $request->get('user_subscription');
        $transID = $request->get('payment_id');

        try {
            $user_subscription = UserSubscription::where('id', $user_subscription_id)
                ->where('subscriped', true)->first();
            $payment = Payment::where('pay_id', $transID)->first();

            return view('gym.subscription_complete', [
                'user_subscription' => $user_subscription,
                'payment' => $payment
            ]);
        } catch (Exception $e) {
            return redirect('/');
        }
    }
}
