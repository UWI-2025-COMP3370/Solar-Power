<x-app-layout>
    @auth
        @php
            $user = Auth::user();
            $wishList = $user->wishList;
            $total = 0;
        @endphp

        <table class="dark:text-white w-full border-collapse">
            <tr>
                <th>Product</th>
                <th>Price</th>
            </tr>

            @csrf

            @if($wishList && $wishList->items->count())
                @foreach($wishList->items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        @php $total += $item->price; @endphp
                    </tr>
                @endforeach

                <tr>
                    <td><strong>Total:</strong></td>
                    <td><strong>${{ number_format($total, 2) }}</strong></td>
                </tr>
            @else
                <tr>
                    <td colspan="2">Your wishlist is empty.</td>
                </tr>
            @endif
        </table>
    @endauth
    <!-- Back Button -->
    <x-primary-button class="mt-4 bg-gray-500 hover:bg-gray-600">
        <a href="{{ url()->previous() }}">{{ __('Back') }}</a>
    </x-primary-button>
</x-app-layout>
