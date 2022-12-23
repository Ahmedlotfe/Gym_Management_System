<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{

    public function cart()
    {
        $cart_items = CartItem::where('user_id', Auth::user()->id)->where('is_active', true)->get();
        $total = 0;
        foreach ($cart_items as $cart_item) {
            $total += ($cart_item->product->price * $cart_item->quantity);
        }
        $tax = (2 * $total) / 100;
        $grand_total = $total + $tax;
        return view('store.cart', [
            "categories" => Category::all(),
            "cart_items" => $cart_items,
            "total" => $total,
            "tax" => $tax,
            "grand_total" => $grand_total
        ]);
    }

    public function add_cart(Product $product)
    {
        if ($product) {
            $cart_item = CartItem::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
            if ($cart_item) {
                $cart_item->quantity += 1;
                $cart_item->save();
            } else {
                $cart_item = new CartItem();
                $cart_item->product_id = $product->id;
                $cart_item->user_id = Auth::user()->id;
                $cart_item->quantity = 1;
                $cart_item->save();
            }
        }

        return redirect('/cart');
    }

    public function remove_cart(Product $product)
    {
        if ($product) {
            $cart_item = CartItem::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
            if ($cart_item) {
                if ($cart_item->quantity > 1) {
                    $cart_item->quantity -= 1;
                    $cart_item->save();
                } else {
                    $cart_item->delete();
                }
            }
        }

        return redirect('/cart');
    }

    public function remove_cart_item(Product $product)
    {
        if ($product) {
            $cart_item = CartItem::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
            if ($cart_item) {
                $cart_item->delete();
            }
            return redirect('/cart');
        }
    }
}
