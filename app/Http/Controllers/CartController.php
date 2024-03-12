<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $validated['user_id'] = auth()->id();

        Cart::create($validated);

        return redirect()->route('cart.show');
    }

    public function showCart()
    {
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)
                        ->where('status', 'unpaid')
                        ->with('product') // Assuming you want to show product details
                        ->orderByDesc('created_at')
                        ->get();
        return view('client.cart.cart', ['cartItems' => $cartItems]);
    }

    public function removeFromCart(Request $request, $cartItemId)
    {
        $cartItem = Cart::where('id', $cartItemId)->where('user_id', auth()->id())->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Failed to remove item.'], 404);
        }

        $cartItem->delete();
        return redirect()->route('cart.show')->with('success', 'Item removed successfully.');

        return back()->with('success', 'Item removed successfully.');
    }

    public function showCheckout(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->where('status', 'unpaid')->with('product')->get();

        $totalPrice = $cartItems->reduce(function ($carry, $item) {
            return $carry + ($item->product->price * $item->quantity);
        }, 0);

        return view('client.checkout.checkout', ['totalPrice' => $totalPrice]);
    }

    public function processCheckout(Request $request)
    {
        $user = auth()->user();
        $totalPrice = 0;
        $cartItems = Cart::where('user_id', $user->id)->where('status', 'unpaid')->get();
        foreach ($cartItems as $item) {
            $totalPrice += $item->product->price * $item->quantity;

            $product = $item->product;
            $product->quantity -= $product->quantity;
            $product->save();

            $item->status = 'paid';
            $item->save();
        }

        $order = new Order();
        $order->user_id = $user->id;
        $order->total = $totalPrice;
        $order->name = $request->input('firstName') . ' ' . $request->input('lastName');
        $order->phone = $request->input('phoneNumber');
        $order->wilaya = $request->input('wilaya');
        $order->zipcode = $request->input('zipCode');
        $order->save();

        return view('client.checkout.success')->with('success', 'Order placed successfully.');
    }
}
