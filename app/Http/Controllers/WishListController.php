<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\WishList;
use Illuminate\View\View;

class WishListController extends Controller
{
    /**
     * Add the item to the user's wishlist.
     */
    public function addItemToList(string $id, string $quantity): View
    {
        $user = Auth::user();

        // Create wishlist if it doesn't exist
        $wishList = $user->wishList()->firstOrCreate([]);

        $item = Item::findOrFail($id);

        // Check if the item already exists in wishlist
        $exists = $wishList->items()->where('item_id', $id)->first();

        if ($exists) {
            // Increment only this pivot record’s quantity
            $wishList->items()->updateExistingPivot($id, [
                'quantity' => $exists->pivot->quantity + $quantity,
            ]);
        } else {
            // Attach new item with initial quantity
            $wishList->items()->attach($id, [
                'quantity' => $quantity,
            ]);
        }

        // Reload wishlist items for the view
        $wishList->load('items');

        return view('wishlist.show', ['wishList' => $wishList]);
    }
}
