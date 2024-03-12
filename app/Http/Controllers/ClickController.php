<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;
use App\Models\AffiliateLink;
use Illuminate\Support\Facades\Auth;

class ClickController extends Controller
{
    public function trackClick(Request $request, $affiliateLinkId)
    {
        // Find the affiliate link by ID
        $affiliateLink = AffiliateLink::where('link', $affiliateLinkId)->first();
        // Record the click
        $click = new Click;
        $click->affiliate_link_id = $affiliateLink->id;
        $click->affiliate_id = Auth::user() ? Auth::user()->id : null;
        $click->save();

        session(['affiliate_id' => $affiliateLinkId]);

        // Redirect to the actual link intended by the affiliate link
        return redirect('products/' . $affiliateLink->product->id);
    }
}
