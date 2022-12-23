<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function welcome()
    {
        return view('store.welcome', [
            "products" => Product::filter(request(['category', 'search']))->where("is_available", true)->get(),
            "categories" => Category::all()
        ]);
    }

    public function store()
    {
        return view('store.store', [
            "products" => Product::filter(request(['category', 'search']))->where("is_available", true)->get(),
            "categories" => Category::all()
        ]);
    }
}
