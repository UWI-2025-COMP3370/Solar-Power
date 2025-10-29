<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::check() ? route('dashboard') : url('/') }}">
                        <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-9 w-auto">
                            <path d="M61.8548 14.6253C61.8778 14.7102 61.8899 14.7978 61.8908 14.8858V28.5615C61.8909 28.737 61.8435 28.9095 61.7542 29.0613C61.6649 29.2131 61.5368 29.3391 61.3836 29.4261L49.9105 36.0351V49.1714C49.9105 49.348 49.8623 49.5204 49.7717 49.6728C49.681 49.8252 49.5506 49.9523 49.3945 50.0403L25.6408 63.3347C25.5364 63.3923 25.4222 63.4314 25.3035 63.4504C25.1848 63.4694 25.0638 63.468 24.9456 63.4462C24.8273 63.4243 24.7135 63.3824 24.6099 63.3224C24.5063 63.2624 24.4146 63.1854 24.339 63.0957L12.8965 49.7832L1.43359 43.1742C1.28249 43.0867 1.1563 42.9607 1.06818 42.8089C0.98006 42.6571 0.932129 42.4848 0.929688 42.3097V28.5615C0.929629 28.3859 0.976974 28.2135 1.06627 28.0617C1.15556 27.9099 1.28369 27.7839 1.43691 27.6969L23.7191 14.8872C23.8716 14.7999 24.0447 14.7532 24.2217 14.7532C24.3986 14.7532 24.5717 14.7999 24.7242 14.8872L36.1973 21.4962L47.6719 14.8872C47.8239 14.7992 47.9963 14.7523 48.1726 14.7523C48.3489 14.7523 48.5213 14.7992 48.6733 14.8872L61.373 22.2742L61.8539 14.6253H61.8548Z" fill="#FF2D20"/>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link :href="Auth::check() ? route('dashboard') : url('/')"
                                :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(Auth::check())
                        @php $role = Auth::user()->role; @endphp

                        @if($role == 'piDSSSalesClerk' || $role == 'piDSSAdministrator')
                            <x-nav-link :href="route('customer.index')" :active="request()->routeIs('customer.index')">
                                {{ __('Customer Records') }}
                            </x-nav-link>
                        @endif

                        @if($role == 'piDSSAdministrator')
                            <x-nav-link :href="route('details')" :active="request()->routeIs('details')">
                                {{ __('Solar PV System') }}
                            </x-nav-link>
                        @endif

                        @if($role == 'Registered Customer')
                            <x-nav-link :href="route('item.index')" :active="request()->routeIs('item.index')">
                                {{ __('Catalog') }}
                            </x-nav-link>
                            <x-nav-link :href="route('details')" :active="request()->routeIs('details')">
                                {{ __('Solar PV System') }}
                            </x-nav-link>
                        @endif
                    @endif

                </div>
            </div>

            <!-- Right Side: Settings / Auth Links -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    @endif
                @else
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endguest
            </div>
        </div>
    </div>
</nav>
