<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    public function create()
    {
        return view('store.add_product', [
            "categories" => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', Rule::unique('products', 'name')],
            'slug' => ['required', Rule::unique('products', 'slug')],
            'description' => ['required', Rule::unique('products', 'description')],
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['image'] = request()->file('image')->store('products_images');

        Product::create($attributes);
        return redirect('/');
    }

    public function index(Product $product)
    {
        return view('store.product_detail', [
            "product" => $product,
            "categories" => Category::all()
        ]);
    }
}
