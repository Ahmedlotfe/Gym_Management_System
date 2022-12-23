<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Jobs\SendOrderRecievedMail;

class PaymentController extends Controller
{
    public function payment_view()
    {
        $cart_items = CartItem::where('user_id', Auth::user()->id)->where('is_active', true)->get();
        if ($cart_items->count() <= 0) {
            return redirect('/store');
        }

        $order = Order::latest('created_at')
            ->where('user_id', Auth::user()->id)
            ->where('is_ordered', false)->first();

        $total = ($order->tax * 100) / 2;


        return view('store.payment', [
            "categories" => Category::all(),
            "order" => $order,
            "cart_items" => $cart_items,
            "total" => $total,
            "tax" => $order->tax,
            "grand_total" => $order->order_total,
            "user_id" => Auth::user()->id
        ]);

        return view('store.payment');
    }


    public function payment(Request $request)
    {

        $attributes = $request->validate([
            'user_id' => ['required', Rule::exists('users', 'id')],
            'transID' => 'required',
            'payment_method' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        $payment = new Payment();
        $payment->user_id = $request->get('user_id');
        $payment->pay_id = $request->get("transID");
        $payment->payment_method = $request->get("payment_method");
        $payment->amount_paid = $request->get("total");
        $payment->status = $request->get("status");
        $payment->save();

        $order = Order::latest('created_at')
            ->where('user_id', $request->get('user_id'))
            ->where('is_ordered', false)->first();

        $order->payment_id = $payment->id;
        $order->is_ordered = true;
        $order->save();

        // Move the cart items to Order Product table
        $cart_items = CartItem::where('user_id', $request->get('user_id'))->where('is_active', true)->get();


        foreach ($cart_items as $cart_item) {
            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->payment_id = $payment->id;
            $order_product->user_id = $request->get('user_id');
            $order_product->product_id = $cart_item->product->id;
            $order_product->quantity = $cart_item->quantity;
            $order_product->product_price = $cart_item->product->price;
            $order_product->ordered = true;
            $order_product->save();

            // Reduce the quantity of the sold products
            $product = Product::find($cart_item->product->id);
            $product->stock -= $cart_item->quantity;
            $product->save();
        }

        // Clear cart
        CartItem::where('user_id', $request->get('user_id'))->where('is_active', true)->delete();

        // Send order recieved mail to customer
        $user = User::find($request->get('user_id'));
        SendOrderRecievedMail::dispatch($user->email, $order->order_number);

        // Send order number and transaction id back to sendData methid via JsonResponse
        $data = [
            'order_number' => $order->order_number,
            'transID' => $payment->pay_id
        ];

        return response()->json($data);
    }
}
