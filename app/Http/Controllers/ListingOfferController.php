<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Response;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request): RedirectResponse
    {
        Gate::authorize('view', $listing);
        $listing->offers()->save(
            Offer::make(
                $request->validate([
                    'amount' => 'required|integer|min:1|max:50000000'
                ])
            )->bidder()->associate($request->user())
        );

        return redirect()->back()->with(
            'success',
            'Offer was made!'
        );
    }
}
