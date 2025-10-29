<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use Illuminate\View\View;

class WishListController extends Controller
{
    /**
     * Add the item to the user's list.
     */
    public function addItemToList(string $id, string $quantity):view
    {
        // Gate::authorize('view', $item);
        $item = Item::find($id);
        $list_id = Auth::user()->wishList->id;
        $exists = Auth::user()->wishList->item()->where('item_id', $id)->first();

        if ($exists) {
            //$exists->increment('quantity');

Auth::user()->wishList->item()->increment('quantity', 1);
        } else {
            $item->wishList()->attach(
                $list_id,
                ['quantity' => $quantity]
            );
        }
        return view('wishlist.show', ['item' => $item]);
    }
}
