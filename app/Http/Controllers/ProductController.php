<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        dd($products);
        return view('products.index', compact('products'));
    }

    public function show(Product $product) {
        return view('products.show', ['product' => $product]);
    }

    public function addProductPage(Request $request) {
        return view('admin.products.add');
    }

    public function addNewProduct(Request $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads', $imageName, 'public'); // Stores in 'storage/app/public/uploads'
        }

        $user = Auth::user();
        $product = new Product();
        $product->merchant_id = $user->id ?? 1;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->thumbnail_url = url('storage/uploads/'.$imageName); // Use the path to the stored image
        $product->save();
        return redirect()->route('admin.product.list');
        return redirect()->back()->with('success', 'Product added successfully.');

        //return view('admin.products.add');
    }

    public function listProducts(Request $request) {
        $user = Auth::user();
        $perPage = $request->input('perPage', 10); // Default to 10 if not provided
        $products = $user->products()->paginate(10);
        //dd($products);
        return view('admin.products.list', [
            'products' => $products
        ]);
    }

    public function editProduct(Request $request, $id) {
        $product = Product::find($id);

        return view('admin.products.edit', [
            'product' => $product
        ]);
    }

    public function updateProduct(Request $request, $id) {

        $user = Auth::user();
        $product = Product::findOrFail($id); // Ensure the product exists or fail
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads', $imageName, 'public'); // Stores in 'storage/app/public/uploads'
            $product->thumbnail_url = url('storage/uploads/'.$imageName); // Update the thumbnail_url to the new image
        }

        $product->merchant_id = $user->id ?? 1; // Consider refining this logic for your actual application needs
        $product->name = $request->name;
        //$product->category_id = $request->category_id;
        $product->is_active = $request->is_active === 'on' ? true : false;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save(); // Save the updated product details

        return redirect()->back()->with('success', 'Product added successfully.');

        //return view('admin.products.add');
    }
}
