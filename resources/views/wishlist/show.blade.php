<x-app-layout>
    @auth
        @php
            $user = Auth::user();
            $wishList = $user->wishList;
            $total = 0;
        @endphp

        <form action="{{ route('wishlist.update') }}" method="POST">
            @csrf
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
                        @php
                            $itemTotal = $item->price * ($item->pivot->quantity ?? 1);
                            $total += $itemTotal;
                        @endphp
                        <tr>
                            <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $item->name }}</td>
                            <td class="border-b border-gray-300 dark:border-gray-700 p-2 text-center">
                                <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->pivot->quantity ?? 1 }}" min="1" class="w-16 text-center border rounded px-1 py-0.5">
                            </td>
                            <td class="border-b border-gray-300 dark:border-gray-700 p-2 text-right">
                                ${{ number_format($itemTotal, 2) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-2">Your wishlist is empty.</td>
                        </tr>
                    @endforelse

                    @if(optional($wishList)->items->count())
                        <tr>
                            <td class="p-2 font-bold">Total:</td>
                            <td></td>
                            <td class="p-2 font-bold text-right">${{ number_format($total, 2) }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            @if(optional($wishList)->items->count())
                <button type="submit" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Update Quantities
                </button>
            @endif
        </form>

        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="mt-4 inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
            {{ __('Back') }}
        </a>
    @endauth
</x-app-layout>
