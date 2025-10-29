<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\WishList;

class WishListController extends Controller
{
    /**
     * Display the user's wishlist
     */
    public function show()
    {
        $user = Auth::user();
        $wishList = $user->wishList; // Can be null if none exists

        return view('wishlist.show', compact('wishList'));
    }

    /**
     * Add an item to the user's wishlist
     */
    public function addItemToList(Request $request, string $id)
    {
        $user = Auth::user();

        // Default quantity = 1
        $quantity = (int) $request->input('quantity', 1);

        // Create wishlist if it doesn't exist
        $wishList = $user->wishList()->firstOrCreate([]);

        $item = Item::findOrFail($id);

        // Check if item already exists
        $exists = $wishList->items()->where('item_id', $id)->first();

        if ($exists) {
            // Increment quantity
            $wishList->items()->updateExistingPivot($id, [
                'quantity' => $exists->pivot->quantity + $quantity,
            ]);
        } else {
            // Attach new item with default quantity
            $wishList->items()->attach($id, ['quantity' => $quantity]);
        }

        return redirect()->route('wishlist.show')->with('success', 'Item added to wishlist.');
    }

    /**
     * Update the quantity of an item via AJAX
     */
    public function updateQuantity(Request $request, Item $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $user = Auth::user();
        $wishList = $user->wishList;

        // Update pivot table
        $wishList->items()->updateExistingPivot($item->id, [
            'quantity' => $request->quantity
        ]);

        $itemTotal = $item->price * $request->quantity;

        return response()->json(['itemTotal' => $itemTotal]);
    }

    /**
     * Remove an item from the wishlist
     */
    public function removeItem(string $id)
    {
        $user = Auth::user();
        $wishList = $user->wishList;

        $wishList->items()->detach($id);

        return redirect()->route('wishlist.show')->with('success', 'Item removed from wishlist.');
    }
}
