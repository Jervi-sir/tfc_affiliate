<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $trendyProducts = Product::take(6)->get();

        $products = Product::inRandomOrder()->paginate(8);

        return view('client.home.home',[
            'trendyProducts' => $trendyProducts,
            'products' => $products
        ]);
    }

    public function show(Product $product) {
        return view('client.products.show', ['product' => $product]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for products based on the query. Adjust the logic as needed.
        $products = Product::where('name', 'like', '%' . $query . '%')
                           ->orWhere('description', 'like', '%' . $query . '%')
                           ->paginate(10);

        return view('client.search.search', compact('products'));
    }
}
