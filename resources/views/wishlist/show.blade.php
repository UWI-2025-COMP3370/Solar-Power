<x-app-layout>
    @auth
        <table class="dark:text-white">
    <tr>
        <th>Product</th><th>Price</th>
@php
$total = 0
@endphp
    </tr>
@csrf
    @foreach(Auth::user()->wishList->item as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>${{ $item->price }}</td>
@php
$total +=$item->price;
@endphp
        </tr>
    @endforeach
<tr>
<td>
Total: ${{ $total }}
</td>
</tr>
</table>

@endauth
</x-app-layout>
