<x-app-layout>
    @auth
        <form method="GET" action="{{ route('item.create') }}">
            @csrf
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Create') }}
            </x-primary-button>
        </form>
        @foreach ($items as $item)
            <div>{{ $item->name }}
                <form method="GET" action="{{ route('item.show', $item) }}" class="inline-block">
                    @csrf
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    <x-primary-button class="mt-4">{{ __('View') }}
                    </x-primary-button>
                </form>
                @if (Auth::user()->role == 'piDSSAdministrator')
                    <form method="GET" action="{{ route('item.edit', $item) }}" class="inline-block">
                        @csrf
                        <x-primary-button class="mt-4">
                            {{ __('Edit') }}
                        </x-primary-button>
                    </form>
                    <form method="POST" action="{{ route('item.destroy', $item) }}" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <x-primary-button class="mt-4">
                            {{ __('Delete') }}
                        </x-primary-button>
                    </form>
                @endif
                {{-- Add to Wishlist for Registered Customers --}}
                @if (Auth::user()->role == 'Registered Customer')
                    <form method="POST" action="{{ route('wishlist.add', ['item' => $item->id, 'quantity' => 1]) }}" class="inline-block">
                        @csrf
                        <x-primary-button class="mt-4 bg-pink-600 hover:bg-pink-700">
                            {{ __('Add to Wish List') }}
                        </x-primary-button>
                    </form>
                @endif
        @endforeach
    @endauth
</x-app-layout>
