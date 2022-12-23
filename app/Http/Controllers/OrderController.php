<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order_complete(Request $request)
    {
        $order_number = $request->get('order_number');
        $transID = $request->get('payment_id');

        try {
            $order = Order::where('order_number', $order_number)->where('is_ordered', true)->first();
            $order_products = OrderProduct::where('order_id', $order->id)->get();
            $payment = Payment::where('pay_id', $transID)->first();
            $sub_total = $order->order_total - $order->tax;

            return view('store.order_complete', [
                'order' => $order,
                'order_number' => $order->order_number,
                'order_products' => $order_products,
                'transID' => $payment->pay_id,
                'payment' => $payment,
                'sub_total' => $sub_total
            ]);
        } catch (Exception $e) {
            return redirect('/store');
        }
    }
}
