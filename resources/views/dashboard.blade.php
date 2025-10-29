<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as a: ") . Auth::user()->role }}
                    @if (Auth::user()->role == 'piDSSSalesClerk' || Auth::user()->role == 'piDSSAdministrator')
                        <div>
                            <a href="{{ url('/customer') }}">Click to list customers in piDSS</a>
                        </div>
                    @endif
                    @if (Auth::user()->role == 'piDSSTechnician' || Auth::user()->role == 'piDSSAdministrator')
                        <div>
                            <a href="{{ url('/visit') }}">Click to list site visit information in piDSS</a>
                        </div>
                    @endif
                    @if (Auth::user()->role == 'Registered Customer')
                        <div style="display: flex;flex-direction:column">
                            <a href="{{ url('/item') }}">Click to view stock</a>
                            <a href="{{ url('/wishlist') }}">Click here to view wishlist</a>
                            <a href="{{ url('/details') }}"> Click here for information on Photovoltaic Systems</a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
