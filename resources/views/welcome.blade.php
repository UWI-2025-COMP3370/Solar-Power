<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                        @if (Route::has('details'))
                            <a href="{{ route('details') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
                        <path d="M61.8548 14.6253C61.8778 14.7102 61.8899 14.7978 61.8908 14.8858V28.5615C61.8909 28.737 61.8435 28.9095 61.7542 29.0613C61.6649 29.2131 61.5368 29.3391 61.3836 29.4261L49.9105 36.0351V49.1714C49.9105 49.348 49.8623 49.5204 49.7717 49.6728C49.681 49.8252 49.5506 49.9523 49.3945 50.0403L25.6408 63.3347C25.5364 63.3923 25.4222 63.4314 25.3035 63.4504C25.1848 63.4694 25.0638 63.468 24.9456 63.4462C24.8273 63.4243 24.7135 63.3824 24.6099 63.3224C24.5063 63.2624 24.4146 63.1854 24.339 63.0957L12.8965 49.7832L1.43359 43.1742C1.28249 43.0867 1.1563 42.9607 1.06818 42.8089C0.98006 42.6571 0.932129 42.4848 0.929688 42.3097V28.5615C0.929629 28.3859 0.976974 28.2135 1.06627 28.0617C1.15556 27.9099 1.28369 27.7839 1.43691 27.6969L23.7191 14.8872C23.8716 14.7999 24.0447 14.7532 24.2217 14.7532C24.3986 14.7532 24.5717 14.7999 24.7242 14.8872L36.1973 21.4962L47.6719 14.8872C47.8239 14.7992 47.9963 14.7523 48.1726 14.7523C48.3489 14.7523 48.5213 14.7992 48.6733 14.8872L61.373 22.2742L61.8539 14.6253H61.8548Z" fill="#FF2D20"/>
                    </svg>
                </div>

                <div class="mt-16">
                    <h1 class="text-4xl font-bold text-gray-800 dark:text-white text-center">Welcome to piDSS System</h1>
<a href="{{ url('/details') }}" class="dark:text-white text-center"> Click here for information on Photovoltaic Systems</a>

                </div>

            </div>
        </div>
    </body>
</html>
