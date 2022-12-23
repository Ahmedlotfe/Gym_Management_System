<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $orders = Order::latest('created_at')
            ->where('user_id', Auth::user()->id)
            ->where('is_ordered', true)
            ->get();

        $orders_count = $orders->count();

        $user_subscriptions = UserSubscription::latest('created_at')
            ->where('user_id', Auth::user()->id)
            ->where('subscriped', true)
            ->get();

        $user_subscriptions_count = $user_subscriptions->count();

        return view('user.dashboard', [
            "categories" => Category::all(),
            "orders" => $orders,
            "orders_count" => $orders_count,
            "user_subscriptions_count" => $user_subscriptions_count
        ]);
    }

    public function my_orders()
    {
        $orders = Order::latest('created_at')
            ->where('user_id', Auth::user()->id)
            ->where('is_ordered', true)
            ->get();

        return view('user.my_orders', [
            "categories" => Category::all(),
            "orders" => $orders
        ]);
    }

    public function order_detail(Request $request)
    {
        $order = Order::find($request->get('id'));
        if ($order) {
            $order_products = OrderProduct::where('order_id', $order->id)->get();
            $sub_total = $order->order_total - $order->tax;

            return view('user.order_detail', [
                "order" => $order,
                "order_products" => $order_products,
                "sub_total" => $sub_total,
                "categories" => Category::all()
            ]);
        } else {
            abort(404);
        }
    }
}
