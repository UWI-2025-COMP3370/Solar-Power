<x-app-layout>
    @auth
        <!-- Create Item Button -->
        <form method="GET" action="{{ route('item.create') }}">
            @csrf
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
        </form>

        <!-- Items List -->
        @foreach ($items as $item)
            <div class="my-4">
                <span>{{ $item->name }}</span>

                <!-- View Item -->
                <form method="GET" action="{{ route('item.show', $item) }}" class="inline-block">
                    @csrf
                    <x-primary-button class="mt-4">{{ __('View') }}</x-primary-button>
                </form>

                <!-- Edit/Delete for Admin -->
                @if(Auth::user()->role == 'piDSSAdministrator')
                    <form method="GET" action="{{ route('item.edit', $item) }}" class="inline-block">
                        @csrf
                        <x-primary-button class="mt-4">{{ __('Edit') }}</x-primary-button>
                    </form>
                    <form method="POST" action="{{ route('item.destroy', $item) }}" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="mt-4">{{ __('Delete') }}</x-primary-button>
                    </form>
                @endif

                <!-- Add to Wishlist for Customer -->
                @if(Auth::user()->role == 'Registered Customer')
                    <form method="POST" action="{{ route('wishlist.add', $item->id) }}" class="inline-block">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <x-primary-button class="mt-4">{{ __('Add to Wish List') }}</x-primary-button>
                    </form>
                @endif
            </div>
        @endforeach

        <!-- Back Button -->
        <x-primary-button class="mt-4 bg-gray-500 hover:bg-gray-600">
            <a href="{{ url()->previous() }}">{{ __('Back') }}</a>
        </x-primary-button>
    @endauth
</x-app-layout>
