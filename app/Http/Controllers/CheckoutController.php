<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CartItem;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart_items = CartItem::where('user_id', Auth::user()->id)->where('is_active', true)->get();
        if ($cart_items->count() <= 0) {
            return redirect('/store');
        }
        $total = 0;
        foreach ($cart_items as $cart_item) {
            $total += ($cart_item->product->price * $cart_item->quantity);
        }
        $tax = (2 * $total) / 100;
        $grand_total = $total + $tax;
        return view('store.checkout', [
            "categories" => Category::all(),
            "cart_items" => $cart_items,
            "total" => $total,
            "tax" => $tax,
            "grand_total" => $grand_total
        ]);
    }

    public function place_order(Request $request)
    {

        $total = 0;
        $quantity = 0;

        $attributes = $request->validate([
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'phone' => 'required|integer',
            'address_line_1' => 'required|string|min:3|max:255',
            'address_line_2' => 'required|string|min:3|max:255',
            'city' => 'required|string|min:3|max:255',
            'state' => 'required|string|min:3|max:255',
            'country' => 'required|string|min:3|max:255',
            'order_note' => 'max:255'
        ]);

        $cart_items = CartItem::where('user_id', Auth::user()->id)->where('is_active', true)->get();
        foreach ($cart_items as $cart_item) {
            $total += ($cart_item->product->price * $cart_item->quantity);
            $quantity += $cart_item->quantity;
        };
        $tax = (2 * $total) / 100;
        $grand_total = $total + $tax;

        $attributes['order_total'] = $grand_total;
        $attributes['tax'] = $tax;
        $attributes['user_id'] = Auth::user()->id;

        $order = Order::create($attributes);

        $date = getdate();
        $d = $date['year'] . $date['mon'] . $date['mday'];
        $order_number = $d . strval($order->id);
        $order->order_number = $order_number;
        $order->save();

        return redirect('/payment');
    }
}
