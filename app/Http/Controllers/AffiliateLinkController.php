<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AffiliateLink;

class AffiliateLinkController extends Controller
{
    public function generate(Request $request)
    {
        $user = auth()->user();
        $productId = $request->product_id;

        $link = AffiliateLink::firstOrCreate(
            [
                'product_id' => $productId,
                'affiliate_id' => $user->id,
            ],
            [
                'link' => Str::random(10), // Example link generation
            ]
        );
        return response()->json(['link' => $link->link]);
        // After generating or retrieving the link, redirect back or to another page
        // Optionally, pass the link to the view if you wish to display it
        return redirect()->back()->with('success', 'Affiliate link generated successfully!');
    }

    public function listAffiliatedProductsByUser($userId)
    {
        $user = User::with('affiliateLinks.product')->find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Extracting the products from the affiliate links
        $affiliatedProducts = $user->affiliateLinks->map(function ($affiliateLink) {
            return $affiliateLink->product;
        });

        return view('your.view.path', compact('affiliatedProducts'));
    }

    public function listAffiliatedProducts(Request $request)
    {
        $user = auth()->user(); // Get the currently authenticated user

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to view affiliated products.');
        }

        $affiliateLinks = $user->affiliateLinks()->with('product')->paginate(10);

        return view('admin.affiliates.affiliates', ['affiliates' => $affiliateLinks]);
    }

    public function listAffiliatedUsers(Request $request)
    {
        $user = auth()->user(); // Get the currently authenticated user

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to view affiliated products.');
        }

        $affiliateLinks = $user->affiliateLinks()->with('product')->paginate(10);

        return view('admin.affiliates.users', ['affiliates' => $affiliateLinks]);
    }

}
