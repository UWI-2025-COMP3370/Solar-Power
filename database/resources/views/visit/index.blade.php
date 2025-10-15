<x-app-layout>
    @auth
        <form method="GET"
            action="{{ route('visit.create') }}">
            @csrf
            <x-input-error :messages="$errors->get('message')"
                class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Create') }}
            </x-primary-button>
        </form>
        @foreach ($visits as $visit)
            <div>
                {{ $visit->technician_name }}, {{ $visit->customer_name }}
                <form method="GET"
                    action="{{ route('visit.show', $visit) }}"
                    class="inline-block">
                    @csrf
                    <x-input-error :messages="$errors->get('message')"
                        class="mt-2" />
                    <x-primary-button class="mt-4">{{ __('View') }}
                    </x-primary-button>
                </form>
                
                <form method="GET"
                    action="{{ route('visit.edit', $visit) }}"
                    class="inline-block">
                    @csrf
                    <x-primary-button class="mt-4">
                        {{ __('Edit') }}
                    </x-primary-button>
                </form>
                
                <form method="POST"
                    action="{{ route('visit.destroy', $visit) }}"
                    class="inline-block">
                    @csrf
                    @method('DELETE')
                    <x-input-error :messages="$errors->get('message')"
                        class="mt-2" />
                    <x-primary-button class="mt-4">
                        {{ __('Delete') }}
                    </x-primary-button>
                </form>
            </div>
        @endforeach
    @endauth
</x-app-layout>
