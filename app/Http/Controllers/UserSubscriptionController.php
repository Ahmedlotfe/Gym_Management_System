<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\UserSubscription;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;

class UserSubscriptionController extends Controller
{
    function home()
    {
        return view('gym.home', [
            'subscriptions' => Subscription::all(),
            'products' => Product::take(4)->get()
        ]);
    }


    function create_subscription(Subscription $subscription)
    {
        $user_subscription = new UserSubscription();
        $user_subscription->user_id = Auth::user()->id;
        $user_subscription->subscription_id = $subscription->id;
        $user_subscription->start_date = date("Y/m/d");
        $start_date = new DateTime('now');
        $end_date = $start_date->modify("+{$subscription->duration} month");
        $user_subscription->end_date = $end_date;
        $user_subscription->save();

        return redirect('/subscription_payment');
    }

    function my_subscriptions()
    {
        $user_subscriptions = UserSubscription::where('user_id', Auth::user()->id)
            ->where('subscriped', true)
            ->get();

        return view('user.my_subscriptions', [
            'user_subscriptions' => $user_subscriptions,
            'categories' => Category::all()
        ]);
    }
}
