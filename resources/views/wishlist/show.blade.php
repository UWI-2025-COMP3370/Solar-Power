<x-app-layout>
    @auth
        @php
            $user = Auth::user();
            $wishList = $user->wishList;
        @endphp

        <div x-data="wishlist({{ $wishList->id ?? 'null' }})">
            <table class="dark:text-white w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">Product</th>
                        <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-center">Quantity</th>
                        <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-right">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(optional($wishList)->items ?? [] as $item)
                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <td class="p-2">{{ $item->name }}</td>
                            <td class="p-2 text-center">
                                <input type="number" min="1"
                                    x-model.number="quantities[{{ $item->id }}]"
                                    x-on:input.debounce.300ms="updateItem({{ $item->id }}, quantities[{{ $item->id }}])"
                                    class="w-16 text-center border rounded px-1 py-0.5">
                            </td>
                            <td class="p-2 text-right">
                                $<span x-text="formatPrice(itemTotals[{{ $item->id }}] ?? {{ $item->price * ($item->pivot->quantity ?? 1) }})"></span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-2">Your wishlist is empty.</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td class="p-2 font-bold">Total:</td>
                        <td></td>
                        <td class="p-2 font-bold text-right">$<span x-text="formatPrice(total)"></span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="mt-4 inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
            {{ __('Back') }}
        </a>

        <!-- Alpine.js -->
        <script src="//unpkg.com/alpinejs" defer></script>
        <script>
            function wishlist(wishListId) {
                return {
                    quantities: {
                        @foreach(optional($wishList)->items ?? [] as $item)
                            {{ $item->id }}: {{ $item->pivot->quantity ?? 1 }},
                        @endforeach
                    },
                    itemTotals: {
                        @foreach(optional($wishList)->items ?? [] as $item)
                            {{ $item->id }}: {{ $item->price * ($item->pivot->quantity ?? 1) }},
                        @endforeach
                    },
                    total: Object.values({
                        @foreach(optional($wishList)->items ?? [] as $item)
                            {{ $item->id }}: {{ $item->price * ($item->pivot->quantity ?? 1) }},
                        @endforeach
                    }).reduce((a,b) => a+b, 0),

                    formatPrice(value) {
                        return value.toFixed(2);
                    },

                    updateItem(itemId, quantity) {
                        fetch(`/wishlist/${itemId}/update`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ quantity })
                        })
                        .then(response => response.json())
                        .then(data => {
                            this.itemTotals[itemId] = data.itemTotal;
                            this.total = Object.values(this.itemTotals).reduce((a,b) => a+b, 0);
                        });
                    }
                }
            }
        </script>
    @endauth
</x-app-layout>
