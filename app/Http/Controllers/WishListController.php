namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\WishList;

class WishListController extends Controller
{
    /**
     * Add the item to the user's wishlist.
     */
    public function addItemToList(Request $request, string $id)
    {
        $user = Auth::user();

        // Default quantity = 1 if not passed
        $quantity = (int) $request->input('quantity', 1);

        // Create wishlist if it doesn't exist
        $wishList = $user->wishList()->firstOrCreate([]);

        $item = Item::findOrFail($id);

        // Check if the item already exists in wishlist
        $exists = $wishList->items()->where('item_id', $id)->first();

        if ($exists) {
            // Increment the existing quantity
            $wishList->items()->updateExistingPivot($id, [
                'quantity' => $exists->pivot->quantity + $quantity,
            ]);
        } else {
            // Attach new item with initial quantity
            $wishList->items()->attach($id, [
                'quantity' => $quantity,
            ]);
        }

        // Option 1: redirect back to wishlist page
        return redirect()->route('wishlist.show')->with('success', 'Item added to wishlist.');

        // Option 2: if you want to return JSON (AJAX)
        // return response()->json(['success' => true]);
    }
}
