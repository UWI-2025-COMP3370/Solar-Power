<x-app-layout>
    @auth
        @php
            $user = Auth::user();
            $wishList = $user->wishList;
            $total = 0;
        @endphp

        <table class="dark:text-white w-full border-collapse">
            <thead>
                <tr>
                    <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-left">Product</th>
                    <th class="border-b border-gray-300 dark:border-gray-700 p-2 text-right">Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse(optional($wishList)->items ?? [] as $item)
                    <tr>
                        <td class="border-b border-gray-300 dark:border-gray-700 p-2">{{ $item->name }}</td>
                        <td class="border-b border-gray-300 dark:border-gray-700 p-2 text-right">${{ number_format($item->price, 2) }}</td>
                        @php $total += $item->price; @endphp
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-2">Your wishlist is empty.</td>
                    </tr>
                @endforelse
                @if(optional($wishList)->items->count())
                    <tr>
                        <td class="p-2 font-bold">Total:</td>
                        <td class="p-2 font-bold text-right">${{ number_format($total, 2) }}</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="mt-4 inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
            {{ __('Back') }}
        </a>
    @endauth
</x-app-layout>
